<?php
defined('IN_DESTOON') or exit('Access Denied');
$menus = array (
    array($DT['money_name'].'����', '?moduleid='.$moduleid.'&file='.$file.'&action=add'),
    array($DT['money_name'].'��ˮ', '?moduleid='.$moduleid.'&file='.$file),
);
$BANKS = explode('|', trim($MOD['pay_banks']));
$table = $DT_PRE.'finance_record';
switch($action) {
	case 'add':
		if($submit) {
			$username or msg('����д��Ա��');
			$amount or msg('����д���');
			$bank or msg('��ѡ��֧����ʽ');
			$reason or msg('����д����');
			$amount = dround($amount);
			if($amount <= 0) msg('����ʽ����');
			$username = trim($username);
			$bank = trim($bank);
			$r = $db->get_one("SELECT username,money FROM {$DT_PRE}member WHERE username='$username'");
			if(!$r) msg('��Ա������');
			if(!$type) {
				if($r['money'] < $amount) msg('��Ա���㣬��ǰ���Ϊ:'.$r['money']);
				$amount = -$amount;
			}
			$reason or $reason = '�ֽ�';
			$note or $note = '�ֹ�';
			money_add($username, $amount);
			money_record($username, $amount, $bank, $_username, $reason, $note);
			dmsg('��ӳɹ�', '?moduleid='.$moduleid.'&file='.$file);
		} else {
			isset($username) or $username = '';
			include tpl('record_add', $module);
		}
	break;
	case 'delete':
		$itemid or msg('δѡ���¼');
		$itemids = is_array($itemid) ? implode(',', $itemid) : $itemid;
		$db->query("DELETE FROM {$table} WHERE itemid IN ($itemids)");
		dmsg('ɾ���ɹ�', $forward);
	break;
	default:
		$sfields = array('������', '��Ա��', '���', '����', '����', '��ע', '������');
		$dfields = array('username', 'username', 'amount', 'bank', 'reason', 'note', 'editor');
		$sorder  = array('����ʽ', '����', '�������', 'ʱ�併��', 'ʱ������');
		$dorder  = array('itemid DESC', 'amount DESC', 'amount ASC', 'addtime DESC', 'addtime ASC');
		isset($fields) && isset($dfields[$fields]) or $fields = 0;
		isset($username) or $username = '';
		isset($fromtime) or $fromtime = '';
		isset($totime) or $totime = '';
		isset($dfromtime) or $dfromtime = '';
		isset($dtotime) or $dtotime = '';
		isset($bank) or $bank = '';
		isset($type) or $type = 0;
		isset($mtype) or $mtype = 'amount';
		isset($minamount) or $minamount = '';
		isset($maxamount) or $maxamount = '';
		isset($order) && isset($dorder[$order]) or $order = 0;
		$fields_select = dselect($sfields, 'fields', '', $fields);
		$order_select = dselect($sorder, 'order', '', $order);
		$condition = '1';
		if($keyword) $condition .= " AND $dfields[$fields] LIKE '%$keyword%'";
		if($bank) $condition .= " AND bank='$bank'";
		if($fromtime) $condition .= " AND addtime>".(strtotime($fromtime.' 00:00:00'));
		if($totime) $condition .= " AND addtime<".(strtotime($totime.' 23:59:59'));
		if($type) $condition .= $type == 1 ? " AND amount>0" : " AND amount<0";
		if($username) $condition .= " AND username='$username'";
		if($itemid) $condition .= " AND itemid=$itemid";
		if($minamount != '') $condition .= " AND $mtype>=$minamount";
		if($maxamount != '') $condition .= " AND $mtype<=$maxamount";
		$r = $db->get_one("SELECT COUNT(*) AS num FROM {$table} WHERE $condition");
		$pages = pages($r['num'], $page, $pagesize);		
		$records = array();
		$result = $db->query("SELECT * FROM {$table} WHERE $condition ORDER BY $dorder[$order] LIMIT $offset,$pagesize");
		$income = $expense = 0;
		while($r = $db->fetch_array($result)) {
			$r['addtime'] = timetodate($r['addtime'], 5);
			$r['amount'] > 0 ? $income += $r['amount'] : $expense += $r['amount'];
			$records[] = $r;
		}
		include tpl('record', $module);
	break;
}
?>