<?php
defined('IN_DESTOON') or exit('Access Denied');
$TYPE = get_type('ask', 1);
$TYPE or msg('���ÿͷ����ģ����������������', '?file=type&item=ask');
$menus = array (
    array('�ͷ�����', '?moduleid='.$moduleid.'&file='.$file),
    array('�������', '?file=type&item=ask'),
);
$stars = array('', '<span style="color:red;">������</span>', '��������', '<span style="color:green;">�ǳ�����</span>');
switch($action) {
	case 'edit':
		$itemid or msg();
		if($submit) {
			if($status == 2 && !$reply) msg('�ظ����ݲ���Ϊ��');
			$db->query("UPDATE {$DT_PRE}ask SET status=$status,admin='$_username',admintime='$DT_TIME',reply='$reply' WHERE itemid=$itemid");
			dmsg('�����ɹ�', $forward);
		} else {
			$r = $db->get_one("SELECT * FROM {$DT_PRE}ask WHERE itemid=$itemid");
			$r or msg();
			extract($r);
			$addtime = timetodate($addtime, 5);
			$admintime = timetodate($admintime, 5);
			include tpl('ask_edit', $module);
		}
	break;
	case 'delete':
		$itemid or msg();
		$db->query("DELETE FROM {$DT_PRE}ask WHERE itemid=$itemid ");
		dmsg('ɾ���ɹ�', '?moduleid='.$moduleid.'&file='.$file);
	break;
	default:
		$_status = array('������', '<span style="color:blue;">������</span>', '<span style="color:green;">�ѽ��</span>', '<span style="color:red;">δ���</span>');
		$sfields = array('������', '����', '����', '��Ա��', '�ظ�', '������');
		$dfields = array('title', 'title', 'content', 'username', 'reply', 'admin');
		$dstatus = array('������', '������', '�ѽ��', 'δ���');
		$sorder  = array('�������ʽ', '�ύʱ�併��', '�ύʱ������', '����ʱ�併��', '����ʱ������', '��Ա���ֽ���', '��Ա��������');
		$dorder  = array('itemid DESC', 'itemid DESC', 'itemid ASC', 'admintime DESC', 'admintime ASC', 'star DESC', 'star ASC');
		isset($fields) && isset($dfields[$fields]) or $fields = 0;
		isset($typeid) or $typeid = 0;
		$status = isset($status) && isset($dstatus[$status]) ? intval($status) : '';
		isset($order) && isset($dorder[$order]) or $order = 0;
		$fields_select = dselect($sfields, 'fields', '', $fields);
		$type_select   = type_select('ask', 1, 'typeid', '��ѡ�����', $typeid);
		$status_select = dselect($dstatus, 'status', '����״̬', $status, '', 1, '', 1);
		$order_select  = dselect($sorder, 'order', '', $order);
		$condition = '1';
		if($keyword) $condition .= " AND $dfields[$fields] LIKE '%$keyword%'";
		if($typeid > 0) $condition .= " AND typeid=$typeid";
		if($status !== '') $condition .= " AND status=$status";
		$r = $db->get_one("SELECT COUNT(*) AS num FROM {$DT_PRE}ask WHERE $condition");
		$pages = pages($r['num'], $page, $pagesize);		
		$asks = array();
		$result = $db->query("SELECT * FROM {$DT_PRE}ask WHERE $condition ORDER BY $dorder[$order] LIMIT $offset,$pagesize");
		while($r = $db->fetch_array($result)) {
			$r['addtime'] = timetodate($r['addtime'], 5);
			$r['dstatus'] = $_status[$r['status']];
			$r['type'] = $r['typeid'] && isset($TYPE[$r['typeid']]) ? set_style($TYPE[$r['typeid']]['typename'], $TYPE[$r['typeid']]['style']) : 'Ĭ��';
			$asks[] = $r;
		}
		include tpl('ask', $module);
	break;
}
?>