<?php
/*
	[Destoon B2B System] Copyright (c) 2008-2010 Destoon.COM
	This is NOT a freeware, use is subject to license.txt
*/
defined('IN_DESTOON') or exit('Access Denied');
$menus = array (
    array('������־', '?file='.$file),
    array('��־����', '?file='.$file.'&action=delete', 'onclick="if(!confirm(\'Ϊ��ϵͳ��ȫ,ϵͳ��ɾ��30��֮ǰ����־\')) return false"'),
);
switch($action) {
	case 'delete':
		$time = $DT_TIME - 30*24*3600;
		$db->query("DELETE FROM {$DT_PRE}log WHERE logtime<$time");
		dmsg('����ɹ�', '?file='.$file);
	break;
	default:
		$sfields = array('������', '��ַ', '����Ա', 'IP');
		$dfields = array('qstring', 'qstring', 'username', 'ip');
		isset($fields) && isset($dfields[$fields]) or $fields = 0;
		$ip = isset($ip) ? $ip : '';
		$username = isset($username) ? $username : '';
		$fromdate = isset($fromdate) ? $fromdate : '';
		$fromtime = is_date($fromdate) ? strtotime($fromdate.' 0:0:0') : 0;
		$todate = isset($todate) ? $todate : '';
		$totime = is_date($todate) ? strtotime($todate.' 23:59:59') : 0;


		$fields_select = dselect($sfields, 'fields', '', $fields);

		$condition = '1';
		if($keyword) $condition .= " AND $dfields[$fields] LIKE '%$keyword%'";
		if($fromtime) $condition .= " AND logtime>$fromtime";
		if($totime) $condition .= " AND logtime<$totime";
		if($ip) $condition .= " AND ip='$ip'";
		if($username) $condition .= " AND username='$username'";
	
		$r = $db->get_one("SELECT COUNT(*) AS num FROM {$DT_PRE}log WHERE $condition");
		$pages = pages($r['num'], $page, $pagesize);
		
		$lists = array();
		$result = $db->query("SELECT * FROM {$DT_PRE}log WHERE $condition ORDER BY logid DESC LIMIT $offset,$pagesize");
		$F = array(
			'index' => '�б�',
			'setting' => '����',
			'category' => '����',
			'area' => '����',
			'template' => 'ģ��',
			'skin' => '���',
			'database' => '���ݿ�',
		);
		$A = array(
			'add' => '���',
			'edit' => '�޸�',
			'delete' => '<span class="f_red">ɾ��</span>',
			'check' => '���',
		);
		while($r = $db->fetch_array($result)) {
			parse_str($r['qstring'], $t);
			$m = isset($t['moduleid']) ? $t['moduleid'] : 1;
			$r['mid'] = $m;
			$r['module'] = $MODULE[$m]['name'];
			$f = isset($t['file']) ? $t['file'] : 'index';
			if(isset($F[$f])) $f = $F[$f];
			$r['file'] = $f;
			$a = isset($t['action']) ? $t['action'] : '';
			if(isset($A[$a])) $a = $A[$a];
			$r['action'] = $a;
			$i = isset($t['itemid']) ? $t['itemid'] : (isset($t['userid']) ? $t['userid'] : '');
			$r['itemid'] = $i;
			$r['logtime'] = timetodate($r['logtime'], 6);
			$lists[] = $r;
		}
		include tpl('log');
	break;
}
?>