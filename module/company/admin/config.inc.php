<?php
defined('IN_DESTOON') or exit('Access Denied');
$MCFG['module'] = 'company';
$MCFG['name'] = '��˾';
$MCFG['author'] = 'Destoon.COM';
$MCFG['homepage'] = 'www.destoon.com';
$MCFG['copy'] = false;
$MCFG['uninstall'] = false;

$RT = array();
$RT['file']['index'] = '��˾�б�';
$RT['file']['vip'] = VIP.'����';
$RT['file']['html'] = '������ҳ';

$RT['action']['vip']['add'] = '���'.VIP;
$RT['action']['vip']['edit'] = '�޸�'.VIP;
$RT['action']['vip']['delete'] = '����'.VIP;
$RT['action']['vip']['expire'] = '����'.VIP;
$RT['action']['vip']['show'] = '�鿴����';
$RT['action']['vip']['move'] = 'ɾ������';
$RT['action']['vip']['update'] = '����ָ��';

$CT = false;
?>