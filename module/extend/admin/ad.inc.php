<?php
defined('IN_DESTOON') or exit('Access Denied');
$TYPE = $L['ad_type'];
require MD_ROOT.'/ad.class.php';
isset($pid) or $pid = 0;
isset($aid) or $aid = 0;
$menus = array (
    array('��ӹ��λ', '?moduleid='.$moduleid.'&file='.$file.'&action=add_place'),
    array('���λ����', '?moduleid='.$moduleid.'&file='.$file),
    array('������', '?moduleid='.$moduleid.'&file='.$file.'&action=list'),
    array('������', '?moduleid='.$moduleid.'&file='.$file.'&action=list&job=check'),
    array('���¹��', '?moduleid='.$moduleid.'&file='.$file.'&action=tohtml'),
);
$do = new ad();
$do->pid = $pid;
$do->aid = $aid;
$currency = $MOD['ad_currency'];
$unit = $currency == 'money' ? $DT['money_unit'] : $DT['credit_unit'];
$this_forward = '?moduleid='.$moduleid.'&file='.$file.'&action=list&pid='.$pid.'&page='.$page;
$this_place_forward = '?moduleid='.$moduleid.'&file='.$file.'&page='.$page;
switch($action) {
	case 'add':
		$pid or msg();
		if($submit) {
			if($do->is_ad($ad)) {
				$do->add($ad);
				$aid = $do->aid;
				if($ad['typeid'] == 6) {
					$CATEGORY = cache_read('category-'.$ad['key_moduleid'].'.php');
					$MOD['linkurl'] = $MODULE[$ad['key_moduleid']]['linkurl'];
				}
				tohtml('ad', $module);
				dmsg('��ӳɹ�', $this_forward);
			} else {
				msg($do->errmsg);
			}
		} else {
			$p = $do->get_one_place();
			$fromtime = timetodate($DT_TIME, 3);
			include tpl('ad_add', $module);
		}
	break;
	case 'edit':
		$aid or msg();
		if($submit) {
			if($do->is_ad($ad)) {
				$do->edit($ad);
				if($pid != $ad['pid']) {
					$db->query("UPDATE {$DT_PRE}ad_place SET ads=ads+1 WHERE pid=$ad[pid]");
					$db->query("UPDATE {$DT_PRE}ad_place SET ads=ads-1 WHERE pid=$pid");
				}
				if($ad['typeid'] == 6) {
					$CATEGORY = cache_read('category-'.$ad['key_moduleid'].'.php');
					$MOD['linkurl'] = $MODULE[$ad['key_moduleid']]['linkurl'];
				}
				tohtml('ad', $module);
				dmsg('�޸ĳɹ�', $forward);
			} else {
				msg($do->errmsg);
			}
		} else {
			extract($do->get_one());
			$do->pid = $pid;
			$p = $do->get_one_place();
			$fromtime = timetodate($fromtime, 3);
			$totime = timetodate($totime, 3);
			include tpl('ad_edit', $module);
		}
	break;
	case 'delete':
		$aids or msg('��ѡ����');
		$do->delete($aids);
		dmsg('ɾ���ɹ�', $forward);
	break;
	case 'order_ad':
		$do->order_ad($listorder);
		dmsg('����ɹ�', $forward);
	break;
	case 'list':
		$job = isset($job) ? $job : '';
		$P = $do->get_place();
		$sfields = array('������', '�������', '������', '��Ա��');
		$dfields = array('title', 'title', 'introduce', 'username');
		$sorder  = array('�������ʽ', '���ʱ�併��', '���ʱ������', '��ʼʱ�併��', '��ʼʱ������', '����ʱ�併��', '����ʱ������', '�����������', '�����������');
		$dorder  = array('pid DESC,listorder ASC,addtime ASC', 'addtime DESC', 'addtime ASC', 'fromtime DESC', 'fromtime ASC', 'totime DESC', 'totime ASC', 'hits DESC', 'hits ASC');
		isset($fields) && isset($dfields[$fields]) or $fields = 0;
		isset($order) && isset($dorder[$order]) or $order = 0;
		isset($typeid) or $typeid = 0;
		$fields_select = dselect($sfields, 'fields', '', $fields);
		$order_select  = dselect($sorder, 'order', '', $order);
		$condition = $job == 'check' ? "status=2" : "status=3";
		if($pid) $condition .= " AND pid=$pid";
		if($typeid) $condition .= " AND typeid=$typeid";
		$type_select  = dselect($TYPE, 'typeid', '�������', $typeid);
		if($keyword) $condition .= " AND $dfields[$fields] LIKE '%$keyword%'";
		$ads = $do->get_list($condition, $dorder[$order]);
		include tpl('ad_list', $module);
	break;
	case 'add_place':
		if($submit) {
			if($do->is_place($place)) {
				$do->add_place($place);
				dmsg('��ӳɹ�', $forward);
			} else {
				msg($do->errmsg);
			}
		} else {
			include tpl('ad_add_place', $module);
		}
	break;
	case 'edit_place':
		$pid or msg();
		if($submit) {
			if($do->is_place($place)) {
				$do->edit_place($place);
				dmsg('�޸ĳɹ�', $forward);
			} else {
				msg($do->errmsg);
			}
		} else {
			$r = $do->get_one_place();
			$mid = $r['moduleid'];
			unset($r['moduleid']);
			extract($r);
			include tpl('ad_edit_place', $module);
		}
	break;
	case 'view':
		$destoon_task = '';
		$filename = '';
		$ad_moduleid = 0;
		if($pid) {
			$p = $do->get_one_place();
			$head_title = '���λ ['.$p['name'].'] Ԥ��';
			$typeid = $p['typeid'];
			if($typeid > 5) {
				//
			} else {
				$filename = 'ad_'.$pid.'.htm';
				if(!is_file(DT_CACHE.'/htm/'.$filename)) $filename = 'ad_'.$pid.'.htm.htm';
			}
		} else if($aid) {
			$a = $do->get_one();
			$head_title = '��� ['.$a['title'].'] Ԥ��';
			$typeid = $a['typeid'];
			if($typeid > 5) {
				$ad_moduleid = $a['key_moduleid'];
				$ad_catid = $a['key_catid'];
				$ad_kw = $a['key_word'];
			} else {
				$filename = 'ad_'.$a['pid'].'.htm';
			}
		}
		include template('ad_view', $module);
	break;
	case 'runcode':
		$destoon_task = '';
		$codes = stripslashes($codes);
		include tpl('ad_runcode', $module);
	break;
	case 'delete_place':
		$pids or msg('��ѡ����λ');
		$do->delete_place($pids);
		dmsg('ɾ���ɹ�', $this_place_forward);
	break;
	case 'order_place':
		$do->order_place($listorder);
		dmsg('����ɹ�', $this_place_forward);
	break;
	case 'tohtml':
		if(!isset($num)) {
			$num = 50;
			cache_clear_ad(1);
			$result = $db->query("SELECT * FROM {$DT_PRE}ad_place WHERE ads=0 AND code<>''");
			$totime = $DT_TIME+86400*365*10;
			while($r = $db->fetch_array($result)) {
				if($r['typeid'] > 5) {
					$filename = 'ad_t'.$r['typeid'].'_m'.$r['moduleid'].'.htm.htm';
				} else {
					$filename = 'ad_'.$r['pid'].'.htm.htm';
				}
				$data = '<!--'.$totime.'-->'.$r['code'];
				file_put(DT_CACHE.'/htm/'.$filename, $data);
				if($r['typeid'] > 1 && $r['typeid'] < 6) {
					$data = 'document.write(\''.dtrim($r['code'], true).'\');';
					file_put(DT_ROOT.'/file/script/A'.$r['pid'].'.js', $data);
				}
			}
		}
		if(!isset($fid)) {
			$r = $db->get_one("SELECT min(aid) AS fid FROM {$DT_PRE}ad");
			$fid = $r['fid'] ? $r['fid'] : 0;
		}
		isset($sid) or $sid = $fid;
		if(!isset($tid)) {
			$r = $db->get_one("SELECT max(aid) AS tid FROM {$DT_PRE}ad");
			$tid = $r['tid'] ? $r['tid'] : 0;
		}
		$_moduleid = $moduleid;
		if($fid <= $tid) {
			$_result = $db->query("SELECT * FROM {$DT_PRE}ad WHERE aid>=$fid ORDER BY aid LIMIT 0,$num");
			if($db->affected_rows($_result)) {
				while($a = $db->fetch_array($_result)) {
					$aid = $a['aid'];
					if($a['typeid'] == 6) {
						$CATEGORY = cache_read('category-'.$a['key_moduleid'].'.php');
						$MOD['linkurl'] = $MODULE[$a['key_moduleid']]['linkurl'];
					}
					tohtml('ad', $module);
				}
				$aid += 1;
			} else {
				$aid = $fid + $num;
			}
		} else {
			dmsg('���ɳɹ�', "?moduleid=$_moduleid&file=$file");
		}
		msg('ID��'.$fid.'��'.($aid-1).'���ɳɹ�'.progress($sid, $fid, $tid), "?moduleid=$_moduleid&file=$file&action=$action&sid=$sid&fid=$aid&tid=$tid&num=$num");
	break;
	default:
		isset($typeid) or $typeid = 0;
		$condition = '1';
		$type_select  = dselect($TYPE, 'typeid', '', $typeid);
		if($keyword) $condition .= " AND name LIKE '%$keyword%'";
		if($typeid) $condition .= " AND typeid=$typeid";
		$places = $do->get_list_place($condition);
		include tpl('ad', $module);
	break;
}
?>