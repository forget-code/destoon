<?php
defined('IN_DESTOON') or exit('Access Denied');
require MD_ROOT.'/friend.class.php';
$do = new friend();
$menus = array (
    array('�����б�', '?moduleid='.$moduleid.'&file='.$file),
);

switch($action) {
	case 'add':
		if($submit) {
			if($do->pass($post)) {
				$do->add($post);
				dmsg('��ӳɹ�', '?moduleid='.$moduleid.'&file='.$file.'&action='.$action.'&catid='.$post['catid']);
			} else {
				msg($do->errmsg);
			}
		} else {
			$addtime = timetodate($DT_TIME);
			include tpl('friend_add', $module);
		}
	break;
	case 'edit':
		$itemid or msg();
		$do->itemid = $itemid;
		if($submit) {
			if($do->pass($post)) {
				$do->edit($post);
				dmsg('�޸ĳɹ�', $forward);
			} else {
				msg($do->errmsg);
			}
		} else {
			extract($do->get_one());
			include tpl('friend_edit', $module);
		}
	break;
	case 'delete':
		$itemid or msg('��ѡ������');
		$do->delete($itemid);
		dmsg('ɾ���ɹ�', $forward);
	break;
	default:
		$sfields = array('������', '����', '��˾', 'ְλ', '�绰', '�ֻ�', '��ҳ', 'Email', 'MSN', 'QQ', '��Ա', '��ע');
		$dfields = array('company', 'truename', 'company', 'career', 'telephone', 'mobile', 'homepage', 'email', 'msn', 'qq', 'username', 'note');
		isset($fields) && isset($dfields[$fields]) or $fields = 0;
		$userid = isset($userid) ? intval($userid) : '';
		$fields_select = dselect($sfields, 'fields', '', $fields);
		$condition = '1';
		if($keyword) $condition .= " AND $dfields[$fields] LIKE '%$keyword%'";
		if($userid) $condition .= " AND userid=$userid";
		$lists = $do->get_list($condition);
		include tpl('friend', $module);
	break;
}
?>