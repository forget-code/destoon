<?php
defined('IN_DESTOON') or exit('Access Denied');
$menu = array(
	array('��ӻ�Ա', '?moduleid=2&action=add'),
	array('��Ա�б�', '?moduleid=2'),
	array('��˻�Ա', '?moduleid=2&action=check'),
	array('��ϵ��Ա', '?moduleid=2&file=contact'),
	array(VIP.'����', '?moduleid=4&file=vip'),
	array('��Ա����', '?moduleid=2&file=grade&action=check'),
	array('��Ա�����', '?moduleid=2&file=group'),
	array('ģ������', '?moduleid=2&file=setting'),
);
$menu_finance = array(
	array($DT['money_name'].'����', '?moduleid=2&file=record'),
	array($DT['credit_name'].'����', '?moduleid=2&file=credits'),
	array('��ֵ��¼', '?moduleid=2&file=charge'),
	array('���׼�¼', '?moduleid=2&file=trade'),
	array('���ּ�¼', '?moduleid=2&file=cash'),
	array('��Ϣ֧��', '?moduleid=2&file=pay'),
	array('��ֵ������', '?moduleid=2&file=card'),
	array('�Ż������', '?moduleid=2&file=promo'),
);
$menu_relate = array(
	array('�ͷ�����', '?moduleid=2&file=ask'),
	array('������֤', '?moduleid=2&file=validate'),
	array('�����ʼ�', '?moduleid=2&file=sendmail'),
	array('�ֻ�����', '?moduleid=2&file=sms'),
	array('ó������', '?moduleid=2&file=alert'),
	array('�ʼ�����', '?moduleid=2&file=mail'),
	array('վ���ż�', '?moduleid=2&file=message'),
	array('�̻��ղ�', '?moduleid=2&file=favorite'),
	array('��Ա����', '?moduleid=2&file=friend'),
	array('��¼��־', '?moduleid=2&file=loginlog'),
);
if(!$_founder) unset($menu_relate[7]);
?>