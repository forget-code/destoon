<?php
defined('IN_DESTOON') or exit('Access Denied');
$menu = array(
	array('����ά��', '?file=database'),
	array('ģ����', '?file=template'),
	array('��ǩ��', '?file=tag'),
	array('��̨����', '?file=search'),
	array('ľ��ɨ��', '?file=scan'),
	array('��̨��־', '?file=log'),
	array('�ϴ���¼', '?file=upload'),
	array('404��־', '?file=404'),
	array('������¼', '?file=keyword'),
	array('������֤', '?file=question'),
	array('�������', '?file=banword'),
	array('�������', '?file=repeat'),
	array('��ֹIP', '?file=banip'),
	array('��ҳ�ɱ�', '?file=fetch'),
);
if(!$_founder) unset($menu[0],$menu[1],$menu[3]);
$menu_help = array(
	array('ʹ��Э��', '?file=destoon&action=license'),
	array('�����ĵ�', '?file=destoon&action=doc'),
	array('����֧��', '?file=destoon&action=support'),
	array('�ٷ���̳', '?file=destoon&action=bbs'),
	array('��Ϣ����', '?file=destoon&action=feedback'),
	array('������', '?file=destoon&action=update'),
	array('�������', '?file=destoon&action=about'),
);
$menu_system = array(
	array('��վ����', '?file=setting'),
	array('ģ�����', '?file=module'),
	array('��������', '?file=area'),
	array('����Ա����', '?file=admin'),
);
?>