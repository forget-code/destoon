<?php
defined('IN_DESTOON') or exit('Access Denied');
$MCFG['module'] = 'sell';
$MCFG['name'] = '��Ӧ';
$MCFG['author'] = 'Destoon.COM';
$MCFG['homepage'] = 'www.destoon.com';
$MCFG['copy'] = false;
$MCFG['uninstall'] = true;
$MCFG['moduleid'] = 5;

$RT = array();
$RT['file']['index'] = '��Ӧ����';
$RT['file']['html'] = '������ҳ';

$RT['action']['index']['add'] = '���ӹ�Ӧ';
$RT['action']['index']['edit'] = '�޸Ĺ�Ӧ';
$RT['action']['index']['delete'] = 'ɾ����Ӧ';
$RT['action']['index']['check'] = '��˹�Ӧ';
$RT['action']['index']['expire'] = '���ڹ�Ӧ';
$RT['action']['index']['reject'] = 'δͨ����Ӧ';
$RT['action']['index']['recycle'] = '����վ';
$RT['action']['index']['move'] = '�ƶ���Ӧ';
$RT['action']['index']['level'] = '��Ϣ����';

$CT = 1;
?>