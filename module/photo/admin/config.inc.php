<?php
defined('IN_DESTOON') or exit('Access Denied');
$MCFG = array();
$MCFG['module'] = 'photo';
$MCFG['name'] = 'ͼ��';
$MCFG['author'] = 'Destoon.COM';
$MCFG['homepage'] = 'www.destoon.com';
$MCFG['copy'] = false;
$MCFG['uninstall'] = true;
$MCFG['moduleid'] = 12;

$RT = array();
$RT['file']['index'] = 'ͼ�����';
$RT['file']['html'] = '������ҳ';

$RT['action']['index']['add'] = '���ͼ��';
$RT['action']['index']['edit'] = '�޸�ͼ��';
$RT['action']['index']['delete'] = 'ɾ��ͼ��';
$RT['action']['index']['check'] = '���ͼ��';
$RT['action']['index']['recycle'] = '����վ';
$RT['action']['index']['move'] = 'ͼ���ƶ�';
$RT['action']['index']['level'] = '��Ϣ����';

$CT = true;
?>