<?php
defined('IN_DESTOON') or exit('Access Denied');
$MCFG['module'] = 'member';
$MCFG['name'] = '��Ա';
$MCFG['author'] = 'Destoon.COM';
$MCFG['homepage'] = 'www.destoon.com';
$MCFG['copy'] = false;
$MCFG['uninstall'] = false;

$RT = array();
$RT['file']['index'] = '��Ա����';
$RT['file']['group'] = '��Ա�����';
$RT['file']['grade'] = '��Ա����';
$RT['file']['record'] = '�ʽ���ˮ';
$RT['file']['credits'] = '���ֽ���';
$RT['file']['charge'] = '��ֵ��¼';
$RT['file']['trade'] = '���׼�¼';
$RT['file']['cash'] = '���ּ�¼';
$RT['file']['ask'] = '�ͷ�����';
$RT['file']['card'] = '��ֵ������';
$RT['file']['promo'] = '�Ż������';
$RT['file']['sendmail'] = '�����ʼ�';
$RT['file']['sms'] = '���Ͷ���';
$RT['file']['mail'] = '�ʼ�����';
$RT['file']['message'] = 'վ���ż�';
$RT['file']['credit'] = '��������';
$RT['file']['news'] = '��˾����';
$RT['file']['link'] = '��������';
$RT['file']['style'] = '��˾ģ��';

$RT['action']['index']['add'] = '��Ա���';
$RT['action']['index']['edit'] = '��Ա�޸�';
$RT['action']['index']['delete'] = '��Աɾ��';
$RT['action']['index']['check'] = '��Ա���';
$RT['action']['index']['move'] = '��Ա�ƶ�';
$RT['action']['index']['show'] = '��Ա�鿴';

$RT['action']['group']['add'] = '��Ա�����';
$RT['action']['group']['edit'] = '��Ա���޸�';
$RT['action']['group']['delete'] = '��Ա��ɾ��';

$RT['action']['record']['add'] = '��ˮ���';
$RT['action']['record']['export'] = '��ˮ����';

$RT['action']['charge']['check'] = '��˼�¼';
$RT['action']['charge']['recycle'] = '���ϼ�¼';
$RT['action']['charge']['delete'] = 'ɾ����¼';
$RT['action']['charge']['export'] = '������¼';

$RT['action']['trade']['show'] = '�鿴����';
$RT['action']['trade']['refund'] = '�˿�����';
$RT['action']['trade']['export'] = '������¼';

$RT['action']['cash']['show'] = '�鿴����';
$RT['action']['cash']['edit'] = '��������';
$RT['action']['cash']['export'] = '������¼';

$RT['action']['ask']['edit'] = '��������';
$RT['action']['ask']['delete'] = 'ɾ������';

$RT['action']['sendmail']['list'] = '�ʼ��б�';
$RT['action']['sendmail']['make'] = '��ȡ�б�';
$RT['action']['sendmail']['download'] = '�����б�';
$RT['action']['sendmail']['delete'] = 'ɾ���б�';

$RT['action']['sendsms']['list'] = '�����б�';
$RT['action']['sendsms']['make'] = '��ȡ����';
$RT['action']['sendsms']['download'] = '�����б�';
$RT['action']['sendsms']['delete'] = 'ɾ���б�';

$RT['action']['mail']['send'] = '�����ʼ�';
$RT['action']['mail']['add'] = '����ʼ�';
$RT['action']['mail']['edit'] = '�޸��ʼ�';
$RT['action']['mail']['delete'] = 'ɾ���ʼ�';
$RT['action']['mail']['list'] = '�鿴�б�';
$RT['action']['mail']['list_delete'] = 'ȡ������';

$RT['action']['message']['send'] = '�����ż�';
$RT['action']['message']['edit'] = '�޸��ż�';
$RT['action']['message']['delete'] = 'ɾ���ż�';
$RT['action']['message']['mail'] = '�ż�ת��';
$RT['action']['message']['clear'] = '�ż�����';

$RT['action']['credit']['add'] = '���֤��';
$RT['action']['credit']['edit'] = '�޸�֤��';
$RT['action']['credit']['delete'] = 'ɾ��֤��';
$RT['action']['credit']['check'] = '���֤��';
$RT['action']['credit']['expire'] = '����֤��';
$RT['action']['credit']['reject'] = 'δͨ��֤��';
$RT['action']['credit']['recycle'] = '����վ';
$RT['action']['credit']['clear'] = '��ջ���վ';
$RT['action']['credit']['update'] = '���µ�ַ';

$RT['action']['news']['add'] = '�������';
$RT['action']['news']['edit'] = '�޸�����';
$RT['action']['news']['delete'] = 'ɾ������';
$RT['action']['news']['check'] = '�������';
$RT['action']['news']['reject'] = 'δͨ������';
$RT['action']['news']['recycle'] = '����վ';
$RT['action']['news']['clear'] = '��ջ���վ';

$RT['action']['link']['add'] = '�������';
$RT['action']['link']['edit'] = '�޸�����';
$RT['action']['link']['delete'] = 'ɾ������';
$RT['action']['link']['check'] = '�������';

$RT['action']['style']['add'] = '���ģ��';
$RT['action']['style']['edit'] = '�޸�ģ��';
$RT['action']['style']['delete'] = 'ɾ��ģ��';
$RT['action']['style']['order'] = '��������';

$CT = false;
?>