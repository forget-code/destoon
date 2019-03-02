<?php
/*
	[Destoon B2C System] Copyright (c) 2009 Destoon.COM
	This is NOT a freeware, use is subject to license.txt
*/
defined('IN_DESTOON') or exit('Access Denied');
$pid = isset($pid) ? intval($pid) : 0;
$menus = array (
    array('��Ʒ����', '?moduleid='.$moduleid.'&file='.$file.'&pid='.$pid),
    array('�������', '?moduleid='.$moduleid.'&file='.$file.'&pid='.$pid.'&action=add'),
    array('���Բ���', '?moduleid='.$moduleid.'&file='.$file.'&pid='.$pid.'&action=manage'),
    array('���»���', '?moduleid='.$moduleid.'&file='.$file.'&pid='.$pid.'&action=cache'),
);
$TYPE = array('�ָ���', '�����ı�(text)', '�����ı�(textarea)', '�б�ѡ��(select)', '��ѡ��(checkbox)');
require MD_ROOT.'/product.class.php';
$do = new product;
switch($action) {
	case 'add':
		if($submit) {
			if($do->pass($post)) {
				$do->add($post);
				dmsg('��ӳɹ�', '?moduleid='.$moduleid.'&file='.$file.'&action='.$action.'&pid='.$post['pid']);
			} else {
				msg($do->errmsg);
			}
		} else {
			$product_select = product_select('post[pid]', '��Ʒ����', $pid, 'id="pid"');
			$type = 1;
			$required = 0;
			$name = $value = $extend = '';
			include tpl('option_edit', $module);
		}
	break;
	case 'edit':
		$oid or msg();
		$do->oid = $oid;
		if($submit) {
			if($do->pass($post)) {
				$do->edit($post);
				dmsg('�޸ĳɹ�', $forward);
			} else {
				msg($do->errmsg);
			}
		} else {
			extract($do->get_one($oid));
			$product_select = product_select('post[pid]', '��Ʒ����', $pid, 'id="pid"');
			include tpl('option_edit', $module);
		}
	break;
	case 'order':
		$do->order($listorder, $pid);
		dmsg('����ɹ�', $forward);
	break;
	case 'delete':
		$oid or msg();
		$do->oid = $oid;
		$do->delete($pid);
		dmsg('ɾ���ɹ�', '?moduleid='.$moduleid.'&file='.$file.'&action=manage&pid='.$pid);
	break;
	case 'manage':
		$PRODUCT = cache_read('product.php');
		$lists = $do->get_list($pid);
		include tpl('option', $module);
	break;
	case 'cache':
		cache_product();
		cache_option();
		dmsg('���³ɹ�', $forward);
	break;
	case 'copy':
		$fpid or msg('����дԴ��ƷID');
		$tpid or msg('����дĿ���ƷID');
		$F = cache_read('option-'.$fpid.'.php');
		count($F) > 0 or msg('������Դ��Ʒ����');
		$tpid = explode(',', $tpid);
		foreach($tpid as $pid) {
			$pid = intval($pid);
			if(!$pid) continue;
			foreach($F as $f) {
				$r = $db->get_one("SELECT * FROM {$DT_PRE}sell_option WHERE pid='$pid' AND name='$f[name]'");
				$f = daddslashes($f);
				if($r) {
					$db->query("UPDATE {$DT_PRE}sell_option SET type='$f[type]',required='$f[required]',value='$f[value]',extend='$f[extend]',listorder='$f[listorder]' WHERE oid=$r[oid]");
				} else {
					$db->query("INSERT INTO {$DT_PRE}sell_option (pid,type,required,name,value,extend,listorder) VALUES ('$pid','$f[type]','$f[required]','$f[name]','$f[value]','$f[extend]','$f[listorder]')");
				}
			}
			cache_option($pid);
		}
		dmsg('ͬ���ɹ�', $forward);
	break;
	default:
		if($submit) {
			$do->update($post);
			dmsg('���³ɹ�', '?moduleid='.$moduleid.'&file='.$file);
		} else {
			$condition = "1";
			if($keyword) $condition = "title LIKE '%$keyword%'";
			$lists = $do->_get_list($condition);
			include tpl('product', $module);
		}
	break;
}
?>