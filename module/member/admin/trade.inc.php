<?php
defined('IN_DESTOON') or exit('Access Denied');
$menus = array (
    array('��ֵ��¼', '?moduleid='.$moduleid.'&file=charge'),
    array('���׼�¼', '?moduleid='.$moduleid.'&file=trade'),
    array('���ּ�¼', '?moduleid='.$moduleid.'&file=cash'),
    array('��Ϣ֧��', '?moduleid='.$moduleid.'&file=pay'),
);
$_status = array(
	'<span style="color:#0000FF;">��ҷ��𶩵�<br/>�ȴ�����ȷ��</span>',
	'<span style="color:#FF6600;">������ȷ�϶���<br/>�ȴ���Ҹ���</span>',
	'<span style="color:#008080;">����Ѹ���<br/>�ȴ����ҷ���</span>',
	'<span style="color:#FF0000;">�����ѷ���<br/>�ȴ����ȷ��</span>',
	'<span style="color:#008000;">���׳ɹ�</span>',
	'<span style="color:#FF0000;text-decoration:underline;">��������˿�</span>',
	'<span style="color:#0000FF;text-decoration:underline;">���˿�����</span>',
	'<span style="color:#FF6600;text-decoration:underline;">�Ѹ��������</span>',
	'<span style="color:#888888;text-decoration:line-through;">��ҹرս���</span>',
	'<span style="color:#888888;text-decoration:line-through;">���ҹرս���</span>',
);
$dstatus = array(
	'��ҷ��𶩵�,�ȴ�����ȷ��',
	'������ȷ�϶���,�ȴ���Ҹ���',
	'����Ѹ���,�ȴ����ҷ���',
	'�����ѷ���,�ȴ����ȷ��',
	'���׳ɹ�',
	'��������˿�',
	'���˿�����',
	'�Ѹ��������',
	'��ҹرս���',
	'���ҹرս���',
);
$table = $DT_PRE.'finance_trade';
if($action == 'refund' || $action == 'show') {
	$itemid or msg('δָ����¼');
	$item = $db->get_one("SELECT * FROM {$table} WHERE itemid=$itemid ");
	$item or msg('��¼������');
	$item['money'] = $item['amount'] + $item['fee'];
	$item['addtime'] = timetodate($item['addtime'], 5);
	$item['updatetime'] = timetodate($item['updatetime'], 5);
}
switch($action) {
	case 'refund':
		if($item['status'] != 5) msg('�˽�����������');
		if($submit) {
			isset($status) or msg('��ָ��������');
			$content or msg('����д��������');
			if($status == 6) {//���˿���ʤ �˿�
				$db->query("UPDATE {$DT_PRE}member SET money=money+$item[money],locking=locking-$item[money] WHERE username='$item[buyer]'");
				$msg = '����ɹ�������״̬�Ѿ��ı�Ϊ ���˿�����';
			} else if($status == 7) {//���˿����ʤ ����			
				locking($item['buyer'], -$item['money']);
				money_record($item['buyer'], -$item['money'], 'վ��', 'system', '������������', '������:'.$itemid);
				money_add($item['seller'], $item['money']);
				money_record($item['seller'], $item['money'], 'վ��', 'system', '������������', '������:'.$itemid);
				$msg = '����ɹ�������״̬�Ѿ��ı�Ϊ �Ѹ��������';
			} else {
				msg();
			}
			$db->query("UPDATE {$table} SET status=$status,editor='$_username',updatetime=$DT_TIME,refund_reason='$content' WHERE itemid=$itemid");
			msg($msg, $forward, 5);
		} else {
			include tpl('trade_refund', $module);
		}
	break;
	case 'show':
		include tpl('trade_show', $module);
	break;
	case 'delete':
		$itemid or msg('δѡ���¼');
		$itemids = is_array($itemid) ? implode(',', $itemid) : $itemid;
		$db->query("DELETE FROM {$table} WHERE itemid IN ($itemids)");
		dmsg('ɾ���ɹ�', $forward);
	break;
	default:
		$sfields = array('������', '��Ʒ/����', '����', '���', '�������', '���ӽ��', '��������', '�������', '��ҵ�ַ', '����ʱ�', '��ҵ绰', '�������', '��������', '��������', '��ע');
		$dfields = array('title', 'title', 'seller', 'buyer', 'amount', 'fee', 'fee_name', 'buyer_name', 'buyer_address', 'buyer_postcode', 'buyer_phone', 'buyer_receive', 'send_type', 'send_no', 'note');
		$sorder  = array('����ʽ', '�µ�ʱ�併��', '�µ�ʱ������', '����ʱ�併��', '����ʱ������', '��������', '�����������', '���ӽ���', '���ӽ������');
		$dorder  = array('itemid DESC', 'addtime DESC', 'addtime ASC', 'updatetime DESC', 'updatetime ASC', 'amount DESC', 'amount ASC', 'fee DESC', 'fee ASC');
		isset($fields) && isset($dfields[$fields]) or $fields = 0;
		$status = isset($status) && isset($dstatus[$status]) ? intval($status) : '';
		isset($seller) or $seller = '';
		isset($buyer) or $buyer = '';
		isset($amounts) or $amounts = '';
		isset($fromtime) or $fromtime = '';
		isset($totime) or $totime = '';
		isset($dfromtime) or $dfromtime = '';
		isset($dtotime) or $dtotime = '';
		isset($timetype) or $timetype = 'addtime';
		isset($mtype) or $mtype = 'money';
		isset($minamount) or $minamount = '';
		isset($maxamount) or $maxamount = '';
		isset($order) && isset($dorder[$order]) or $order = 0;
		$fields_select = dselect($sfields, 'fields', '', $fields);
		$status_select = dselect($dstatus, 'status', '״̬', $status, 'style="width:165px;"', 1, '', 1);
		$order_select = dselect($sorder, 'order', '', $order);
		$condition = '1';
		if($keyword) $condition .= " AND $dfields[$fields] LIKE '%$keyword%'";
		if($fromtime) $condition .= " AND $timetype>".(strtotime($fromtime.' 00:00:00'));
		if($totime) $condition .= " AND $timetype<".(strtotime($totime.' 23:59:59'));
		if($status !== '') $condition .= " AND status='$status'";
		if($seller) $condition .= " AND seller='$seller'";
		if($buyer) $condition .= " AND buyer='$buyer'";
		if($itemid) $condition .= " AND itemid=$itemid";
		//if($amounts) $condition .= " AND `amount`+`fee`=$amounts";
		if($mtype == 'money') $mtype = "`amount`+`fee`";
		if($minamount != '') $condition .= " AND $mtype>=$minamount";
		if($maxamount != '') $condition .= " AND $mtype<=$maxamount";
		$r = $db->get_one("SELECT COUNT(*) AS num FROM {$table} WHERE $condition");
		$pages = pages($r['num'], $page, $pagesize);		
		$trades = array();
		$result = $db->query("SELECT * FROM {$table} WHERE $condition ORDER BY $dorder[$order] LIMIT $offset,$pagesize");
		$amount = $fee = $money = 0;
		while($r = $db->fetch_array($result)) {
		$r['addtime'] = str_replace(' ', '<br/>', timetodate($r['addtime'], 5));
		$r['updatetime'] = str_replace(' ', '<br/>', timetodate($r['updatetime'], 5));
			$r['dstatus'] = $_status[$r['status']];
			$r['money'] = $r['amount'] + $r['fee'];
			$amount += $r['amount'];
			$fee += $r['fee'];
			$trades[] = $r;
		}
		$money = $amount + $fee;
		include tpl('trade', $module);
}
?>