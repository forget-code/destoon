<?php
defined('IN_DESTOON') or exit('Access Denied');
$menus = array (
    array('��ֵ��¼', '?moduleid='.$moduleid.'&file=charge'),
    array('���׼�¼', '?moduleid='.$moduleid.'&file=trade'),
    array('���ּ�¼', '?moduleid='.$moduleid.'&file=cash'),
    array('��Ϣ֧��', '?moduleid='.$moduleid.'&file=pay'),
);
$table = $DT_PRE.'finance_pay';
$MODULE[-9]['name'] = '����';
$MODULE[-9]['islink'] = 0;
$MODULE[-9]['linkurl'] = $MODULE[9]['linkurl'];
switch($action) {
	case 'delete':
		$itemid or msg('δѡ���¼');
		$pids = is_array($itemid) ? implode(',', $itemid) : $itemid;
		$db->query("DELETE FROM {$table} WHERE pid IN ($pids)");
		dmsg('ɾ���ɹ�', $forward);
	break;
	default:
		$sfields = array('������', '����', '��Ա��', '���', 'IP');
		$dfields = array('title', 'title', 'fee', 'ip');
		$sorder  = array('����ʽ', '����', '�������', 'ʱ�併��', 'ʱ������');
		$dorder  = array('pid DESC', 'fee DESC', 'fee ASC', 'paytime DESC', 'paytime ASC');
		isset($fields) && isset($dfields[$fields]) or $fields = 0;
		isset($username) or $username = '';
		isset($pid) or $pid = '';
		isset($fromtime) or $fromtime = '';
		isset($totime) or $totime = '';
		isset($dfromtime) or $dfromtime = '';
		isset($dtotime) or $dtotime = '';
		isset($mid) or $mid = 0;
		isset($currency) or $currency = '';
		isset($minamount) or $minamount = '';
		isset($maxamount) or $maxamount = '';
		isset($order) && isset($dorder[$order]) or $order = 0;
		$fields_select = dselect($sfields, 'fields', '', $fields);
		$module_select = module_select('mid', 'ģ��', $mid);
		$order_select = dselect($sorder, 'order', '', $order);
		$condition = '1';
		if($keyword) $condition .= " AND $dfields[$fields] LIKE '%$keyword%'";
		if($fromtime) $condition .= " AND paytime>".(strtotime($fromtime.' 00:00:00'));
		if($totime) $condition .= " AND paytime<".(strtotime($totime.' 23:59:59'));
		if($mid) $condition .= " AND moduleid=$mid";
		if($currency) $condition .= " AND currency='$currency'";
		if($username) $condition .= " AND username='$username'";
		if($itemid) $condition .= " AND itemid=$itemid";
		if($minamount != '') $condition .= " AND fee>=$minamount";
		if($maxamount != '') $condition .= " AND fee<=$maxamount";
		if($pid) $condition .= " AND pid=$pid";
		$r = $db->get_one("SELECT COUNT(*) AS num FROM {$table} WHERE $condition");
		$pages = pages($r['num'], $page, $pagesize);		
		$lists = array();
		$result = $db->query("SELECT * FROM {$table} WHERE $condition ORDER BY $dorder[$order] LIMIT $offset,$pagesize");
		$fee = 0;
		while($r = $db->fetch_array($result)) {
			$r['paytime'] = timetodate($r['paytime'], 5);
			$fee += $r['fee'];
			$lists[] = $r;
		}
		include tpl('pay', $module);
	break;
}
?>