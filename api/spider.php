<?php
/*
	[Destoon B2B System] Copyright (c) 2008-2010 Destoon.COM
	This is NOT a freeware, use is subject to license.txt
*/

/* 
�ɼ�������ӿ� For Destoon
֧��POST��GET���ַ�ʽ��������
���磺
����ģ�����ɷ��� http://www.xxx.com/api/spider.php?moduleid=21&catid=1&title=���Ա���&content=��������
��ȡ��Ŀ��������� http://www.xxx.com/api/spider.php?moduleid=21&action=cat
����״̬��ֱ���������ע���ж�
Ϊ��ϵͳ��ȫ��ǿ�ҽ����޸�spider.php�ļ���
*/

$verify_mode = 4; //�����֤ģʽ
//1 ��֤�Ƿ�Ϊ��ʼ�ˣ���Ҫ��¼
//2 ��֤��Կ���������Ϊ2����������� �����Կ[�Ƽ�]
//3 ��֤IP���������Ϊ3����������� �����IP
//4 �رսӿ�

$spider_auth = '';   //�����Կ ����6λ
$spider_ip = '';     //�����IP
$spider_status = 3;  //��Ϣ״̬ 2Ϊ����� 3Ϊͨ�� 0Ϊͨ���������
$spider_errlog = 0;  //������־ 0�ر� 1���� ������ϵͳ����¼������־��api/spider/Ŀ¼,�Ա����(spiderĿ¼��Ҫ��д��)
$spider_mode = 0; //�������ģʽ
/*
�������ģʽΪ0ʱ
ϵͳ�������õ����ļ���⣬�Զ����������ֶ�

�������ģʽΪ1ʱ
ϵͳ���ݷ��͵����ݹ���SQL�����⣬���Է��͵��ֶν��д����ֶ��������ݱ���һ��
���緢��&title=���Ա���&catid=����ID������
 (title, catid) VALUES ('���Ա���', '����ID') �Ĳ������
*/

/*�������������޸�*/
if($verify_mode == 4) exit('�ӿ�δ����');
if(strpos($_SERVER['PHP_SELF'], '/spider.php') !== false) exit('Ϊ��ϵͳ��ȫ�����޸Ľӿ��ļ���');

$_DPOST = $_POST;
$_DGET = $_GET;

define('DT_ADMIN', true);
require '../common.inc.php';

//У�����
$pass = false;
if($verify_mode == 1) {
	if($_userid && $_userid == $CFG['founderid']) $pass = true;
} else if($verify_mode == 2) {
	$auth = $_DPOST ? $_DPOST['auth'] : $_DGET['auth'];
	if(strlen($auth) >= 6 && $auth == $spider_auth) $pass = true;
} if($verify_mode == 3) {
	if($DT_IP && $DT_IP == $spider_ip) $pass = true;
}
$pass or exit('���У��ʧ��');

$class = DT_ROOT.'/module/'.$module.'/'.$module.'.class.php';
if($MODULE[$moduleid]) {
	$CATEGORY = cache_read('category-'.($moduleid == 2 ? 4 : $moduleid).'.php');
	if($action == 'cat') {//��ȡ��ĿID
		echo '<select name="catid">';
		foreach($CATEGORY as $k=>$v) {
			echo '<option value="'.$v['catid'].'">'.$v['catname'].'</option>';
		}
		echo '</select>';
	} else {
		$post = array();
		if($_DPOST) {
			$post = $_DPOST;
		} else if($_DGET) {
			$post = $_DGET;
		} else {
			exit('δ���յ�����');
		}		
		if(isset($post['username'])) $_username = $post['username'];
		if(in_array($module, array('article', 'info'))) {
			$table = $DT_PRE.$module.'_'.$moduleid;
			$table_data = $DT_PRE.$module.'_data_'.$moduleid;
		} else {
			$table = $DT_PRE.$module;
			$table_data = $DT_PRE.$module.'_data';
		}
		if($spider_mode) {
			get_magic_quotes_gpc() or $post = array_map('addslashes', $post);
			if($moduleid == 2) {
				$table_member = $DT_PRE.'member';
				$table_company = $DT_PRE.'company';
				$table_company_data = $DT_PRE.'company_data';
				$mfs = cache_read($table_member.'.php');
				if(!$mfs) {
					$mfs = array();
					$result = $db->query("SHOW COLUMNS FROM `$table_member`");
					while($r = $db->fetch_array($result)) {
						$mfs[] = $r['Field'];
					}
					cache_write($table_member.'.php', $mfs);
				}
				$cfs = cache_read($table_company.'.php');
				if(!$cfs) {
					$cfs = array();
					$result = $db->query("SHOW COLUMNS FROM `$table_company`");
					while($r = $db->fetch_array($result)) {
						$cfs[] = $r['Field'];
					}
					cache_write($table_company.'.php', $cfs);
				}
				$sqlk = $sqlv = '';
				foreach($post as $k=>$v) {
					if(!in_array($k, $mfs)) continue;
					$sqlk .= ','.$k; $sqlv .= ",'$v'";
				}
				if(!$sqlk) exit('��Ч����');
				$sqlk = substr($sqlk, 1);
				$sqlv = substr($sqlv, 1);
				$db->query("INSERT INTO {$table_member} ($sqlk) VALUES ($sqlv)");
				$userid = $db->insert_id();
				$post['userid'] = $userid;
				$sqlk = $sqlv = '';
				isset($post['addtime']) or $post['addtime'] = $DT_TIME;
				$post['adddate'] = date("Y-m-d", $post['addtime']);
				isset($post['edittime']) or $post['edittime'] = $DT_TIME;
				$post['editdate'] = date("Y-m-d", $post['edittime']);
				foreach($post as $k=>$v) {
					if(!in_array($k, $cfs)) continue;
					$sqlk .= ','.$k; $sqlv .= ",'$v'";
				}
				$sqlk = substr($sqlk, 1);
				$sqlv = substr($sqlv, 1);
				$db->query("INSERT INTO {$table_company} ($sqlk) VALUES ($sqlv)");
				$content = $post['content'];
				$content_table = content_table(4, $userid, is_file(DT_CACHE.'/4.part'), $table_company_data);
				$db->query("INSERT INTO {$content_table} (userid,content)  VALUES ('$userid', '$content')");
				exit('�����ɹ�');
			} else {
				$fs = cache_read($table.'.php');
				if(!$fs) {
					$fs = array();
					$result = $db->query("SHOW COLUMNS FROM `$table`");
					while($r = $db->fetch_array($result)) {
						$fs[] = $r['Field'];
					}
					cache_write($table.'.php', $fs);
				}
				$sqlk = $sqlv = '';
				foreach($post as $k=>$v) {
					if(!in_array($k, $fs)) continue;
					$sqlk .= ','.$k; $sqlv .= ",'$v'";
				}
				if(!$sqlk) exit('��Ч����');
				$sqlk = substr($sqlk, 1);
				$sqlv = substr($sqlv, 1);
				$db->query("INSERT INTO {$table} ($sqlk) VALUES ($sqlv)");
				$itemid = $db->insert_id();
				$content = $post['content'];
				$db->query("INSERT INTO {$table_data} (itemid,content)  VALUES ('$itemid', '$content')");
				exit('�����ɹ�');
			}
		} else if(is_file($class)) {
			$AREA = cache_read('area.php');
			require DT_ROOT.'/include/module.func.php';
			require DT_ROOT.'/include/post.func.php';
			require $class;
			$do = new $module($moduleid);	
			foreach($do->fields as $v) {
				isset($post[$v]) or $post[$v] = '';
			}
			if(isset($post['islink'])) unset($post['islink']);
			if($spider_status) $post['status'] = $spider_status;
			get_magic_quotes_gpc() or $post = array_map('addslashes', $post);
			if($module == 'article') $post['save_remotepic'] = $MOD['save_remotepic'];
			if($moduleid == 2) {
				if($do->add($post)) {
					exit('�����ɹ�');
				} else {
					if($spider_errlog) file_put_contents('spider/'.date('Ymd-His-').mt_rand(10, 99).'.txt', $do->errmsg);
					exit($do->errmsg);
				}
			}
			if($do->pass($post)) {
				$do->add($post);
				exit('�����ɹ�');
			} else {
				if($spider_errlog) file_put_contents('spider/'.date('Ymd-His-').mt_rand(10, 99).'.txt', $do->errmsg);
				exit($do->errmsg);
			}
		} else {
			exit('ģ�Ͳ�֧�����');
		}
	}
} else {
	exit('ģ�Ͳ�����');
}
?>