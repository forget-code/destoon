<?php
/*
	[Destoon B2B System] Copyright (c) 2008-2010 Destoon.COM
	This is NOT a freeware, use is subject to license.txt
*/
defined('IN_DESTOON') or exit('Access Denied');
$menus = array (
array('ϵͳ��ҳ', '?action=main'),
array('ͳ����Ϣ', '?action=count'),
array('�޸�����', '?action=password'),
array('��������', $MODULE[2]['linkurl'], 'target="_blank"'),
array('��վ��ҳ', DT_PATH, 'target="_blank"'),
array('��ȫ�˳�', '?file=logout','target="_top" onclick="return confirm(\'ȷ��Ҫ�˳�������?\');"'),
);
if($_admin > 1) unset($menus[1]);
switch($action) {
	case 'cache':
		isset($step) or $step = 0;
		if($step == 1) {
			cache_clear('module');
			cache_module();
			msg('ϵͳ���ø��³ɹ�', '?action='.$action.'&step='.($step+1));
		} else if($step == 2) {
			cache_clear_tag(1);
			msg('��ǩ���û�����³ɹ�', '?action='.$action.'&step='.($step+1));
		} else if($step == 3) {
			cache_clear('php', 'dir', 'tpl');
			msg('ģ�建����³ɹ�', '?action='.$action.'&step='.($step+1));
		} else if($step == 4) {
			cache_clear('cat');
			cache_category();
			msg('���໺����³ɹ�', '?action='.$action.'&step='.($step+1));
		} else if($step == 5) {
			cache_clear('area');
			cache_area();
			msg('����������³ɹ�', '?action='.$action.'&step='.($step+1));
		} else if($step == 6) {
			cache_clear('fields');
			cache_fields();
			cache_clear('option');
			cache_option();
			if(isset($MODULE[5])) cache_product();
			if(isset($MODULE[7])) cache_quote_product();
			msg('�Զ����ֶθ��³ɹ�', '?action='.$action.'&step='.($step+1));
		} else if($step == 7) {
			cache_clear_ad();
			tohtml('index');
			msg('��վ��ҳ���³ɹ�', '?action='.$action.'&step='.($step+1));
		} else if($step == 8) {
			cache_clear('group');
			cache_group();
			cache_clear('type');
			cache_type();
			cache_clear('keylink');
			cache_keylink();
			cache_pay();
			cache_banip();
			cache_banword();
			cache_bancomment();
			cache_clear_count();
			msg('ȫ��������³ɹ�');
		} else {
			msg('���ڿ�ʼ���»���', '?action='.$action.'&step='.($step+1));
		}
	break;
	case 'tag':
		cache_clear_count();
		cache_clear_tag(1);
		msg('��ǩ���û�����³ɹ�');
	break;
	case 'html':
		cache_clear_count();
		$db->expires = $CFG['db_expires'] = $CFG['tag_expires'] = 0;
		tohtml('index');
		$filename = $CFG['com_dir'] ? DT_ROOT.'/'.$DT['index'].'.'.$DT['file_ext'] : DT_CACHE.'/index.inc.html';
		msg('��ҳ���³ɹ� '.(is_file($filename) ? dround(filesize($filename)/1024).'Kb ' : '').'&nbsp;&nbsp;<a href="'.DT_PATH.'" target="_blank">����鿴</a>');
	break;
	case 'phpinfo':
		phpinfo();
	break;
	case 'password':
		if($submit) {
			if(!$oldpassword) msg('��������������');
			if(!$password) msg('������������');
			if(strlen($password) < 6) msg('����������6λ�����޸�');
			if($password != $cpassword) msg('������������벻һ�£�����');
			$r = $db->get_one("SELECT password FROM {$DT_PRE}member WHERE userid='$_userid'");
			if($r['password'] != md5(md5($oldpassword)))  msg('���������������');
			if($password == $oldpassword) msg('�����벻��������������ͬ');
			$password = md5(md5($password));
			$db->query("UPDATE {$DT_PRE}member SET password='$password' WHERE userid='$_userid'");
			msg('����Ա�����޸ĳɹ�', '?action=main');
		} else {
			include tpl('password');
		}
	break;
	case 'side':
		$files = glob(DT_CACHE.'/*.part');
		if($files) {
			foreach($files as $f) {
				$mid = basename($f, '.part');
				$fd = $mid == 4 ? 'userid' : 'itemid';
				$r = $db->get_one("SELECT MAX($fd) AS maxid FROM ".get_table($mid));
				$part = $r['maxid'] ? ceil($r['maxid']/500000) : 1;
				split_create($mid, $part);
				split_create($mid, $part+1);
			}
		}
		cache_clear_sql(strtolower(random(2)));
		include tpl('side');
	break;
	case 'main':
		if($submit) {
			$note = '<?php exit;?>'.stripslashes($note);
			file_put(DT_ROOT.'/file/user/'.dalloc($_userid).'/'.$_userid.'/note.php', $note);
			dmsg('���³ɹ�', '?action=main');
		} else {
			$user = $db->get_one("SELECT loginip,logintime,logintimes FROM {$DT_PRE}member WHERE userid=$_userid");
			$note = DT_ROOT.'/file/user/'.dalloc($_userid).'/'.$_userid.'/note.php';
			$note = file_get($note);
			if($note) {
				$note = substr($note, 13);
			} else {
				$note = '';
			}
			$install = file_get(DT_CACHE.'/install.lock');
			if(!$install) {
				$install = $DT_TIME;
				file_put(DT_CACHE.'/install.lock', $DT_TIME);
			}
			$r = $db->get_one("SELECT item_value FROM {$DT_PRE}setting WHERE item='destoon' AND item_key='backtime'");
			$backtime = $r['item_value'];
			$backdays = intval(($DT_TIME - $backtime)/86400);
			$backtime = timetodate($backtime, 6);
			$notice_url = decrypt('B2BVIgIhAicINwUtD3MFcgUjV3dccFM9C2IFJ1EiVzQCYlY7AHkBNwBqAWtRLQFiAD0BP1QzAmYOdlQrBXJRNQd4', 'destoon').'?action=notice&product=b2b&version='.DT_VERSION.'&release='.DT_RELEASE.'&lang='.DT_LANG.'&charset='.DT_CHARSET.'&install='.$install.'&os='.PHP_OS.'&soft='.urlencode($_SERVER['SERVER_SOFTWARE']).'&php='.urlencode(phpversion()).'&mysql='.urlencode(mysql_get_server_info()).'&url='.urlencode($DT_URL).'&site='.urlencode($DT['sitename']).'&auth='.strtoupper(md5($DT_URL.$install.$_SERVER['SERVER_SOFTWARE']));
			$install = timetodate($install, 5);			
			$edition = edition(1);
			include tpl('main');
		}
	break;
	case 'count':
		$year = isset($year) ? intval($year) : date('Y');
		$month = isset($month) ? intval($month) : 0;
		$mid = isset($mid) ? intval($mid) : 0;
		include tpl('count');
	break;
	case 'counter':
		$today = strtotime(timetodate($DT_TIME, 3).' 00:00:00');
		//
		//������ͷ�����
		$num = $db->count($DT_PRE.'ask', "status=0", 60);
		$num = $num ? '<strong class=\"f_red\">'.$num.'</strong>' : 0;
		echo 'try{document.getElementById("ask").innerHTML="'.$num.'";}catch(e){}';

		$num = $db->count($DT_PRE.'finance_charge', "status=0", 60);
		$num = $num ? '<strong class=\"f_red\">'.$num.'</strong>' : 0;
		echo 'try{document.getElementById("charge").innerHTML="'.$num.'";}catch(e){}';

		$num = $db->count($DT_PRE.'finance_cash', "status=0", 60);
		$num = $num ? '<strong class=\"f_red\">'.$num.'</strong>' : 0;
		echo 'try{document.getElementById("cash").innerHTML="'.$num.'";}catch(e){}';

		$num = $db->count($DT_PRE.'finance_trade', "status=5", 60);
		$num = $num ? '<strong class=\"f_red\">'.$num.'</strong>' : 0;
		echo 'try{document.getElementById("trade").innerHTML="'.$num.'";}catch(e){}';

		//����������ƹ�

		$num = $db->count($DT_PRE.'spread', "status=2", 60);
		$num = $num ? '<strong class=\"f_red\">'.$num.'</strong>' : 0;
		echo 'try{document.getElementById("spread").innerHTML="'.$num.'";}catch(e){}';

		$num = $db->count($DT_PRE.'guestbook', "edittime=0", 60);
		$num = $num ? '<strong class=\"f_red\">'.$num.'</strong>' : 0;
		echo 'try{document.getElementById("guestbook").innerHTML="'.$num.'";}catch(e){}';

		$num = $db->count($DT_PRE.'comment', "status=2", 60);
		$num = $num ? '<strong class=\"f_red\">'.$num.'</strong>' : 0;
		echo 'try{document.getElementById("comment").innerHTML="'.$num.'";}catch(e){}';

		$num = $db->count($DT_PRE.'link', "status=2 AND username=''", 60);
		$num = $num ? '<strong class=\"f_red\">'.$num.'</strong>' : 0;
		echo 'try{document.getElementById("link").innerHTML="'.$num.'";}catch(e){}';


		//����˴����湺��

		$num = $db->count($DT_PRE.'ad', "status=2", 60);
		$num = $num ? '<strong class=\"f_red\">'.$num.'</strong>' : 0;
		echo 'try{document.getElementById("ad").innerHTML="'.$num.'";}catch(e){}';

		$num = $db->count($DT_PRE.'know_answer', "status=2", 60);
		$num = $num ? '<strong class=\"f_red\">'.$num.'</strong>' : 0;
		echo 'try{document.getElementById("answer").innerHTML="'.$num.'";}catch(e){}';

		//����˹�˾����
		$num = $db->count($DT_PRE.'news', "status=2", 60);
		$num = $num ? '<strong class=\"f_red\">'.$num.'</strong>' : 0;
		echo 'try{document.getElementById("news").innerHTML="'.$num.'";}catch(e){}';

		$num = $db->count($DT_PRE.'credit', "status=2", 60);
		$num = $num ? '<strong class=\"f_red\">'.$num.'</strong>' : 0;
		echo 'try{document.getElementById("credit").innerHTML="'.$num.'";}catch(e){}';

		$num = $db->count($DT_PRE.'link', "status=2 AND username!=''", 60);
		$num = $num ? '<strong class=\"f_red\">'.$num.'</strong>' : 0;
		echo 'try{document.getElementById("comlink").innerHTML="'.$num.'";}catch(e){}';

		$num = $db->count($DT_PRE.'keyword', "status=2", 60);
		$num = $num ? '<strong class=\"f_red\">'.$num.'</strong>' : 0;
		echo 'try{document.getElementById("keyword").innerHTML="'.$num.'";}catch(e){}';

		//��Ա
		$num = $db->count($DT_PRE.'member');
		echo 'try{document.getElementById("member").innerHTML="'.$num.'";}catch(e){}';

		$num = $db->count($DT_PRE.'upgrade', "status=2");
		$num = $num ? '<strong class=\"f_red\">'.$num.'</strong>' : 0;
		echo 'try{document.getElementById("member_vip").innerHTML="'.$num.'";}catch(e){}';

		$num = $db->count($DT_PRE.'member', "groupid=4", 60);
		$num = $num ? '<strong class=\"f_red\">'.$num.'</strong>' : 0;
		echo 'try{document.getElementById("member_check").innerHTML="'.$num.'";}catch(e){}';

		$num = $db->count($DT_PRE.'member', "regtime>$today", 60);
		echo 'try{document.getElementById("member_new").innerHTML="'.$num.'";}catch(e){}';

		foreach($MODULE as $m) {
			if($m['moduleid'] < 5 || $m['islink']) continue;
			$table = get_table($m['moduleid']);
			//ALL
			$num = $db->count($table, '1', 60);
			echo 'try{$("m_'.$m['moduleid'].'").innerHTML="'.$num.'";}catch(e){}';
			//PUB
			$num = $db->count($table, "status=3", 60);
			echo 'try{$("m_'.$m['moduleid'].'_1").innerHTML="'.$num.'";}catch(e){}';
			//CHECK
			$num = $db->count($table, "status=2", 60);
			$num = $num ? '<strong class=\"f_red\">'.$num.'</strong>' : 0;
			echo 'try{$("m_'.$m['moduleid'].'_2").innerHTML="'.$num.'";}catch(e){}';
			//NEW
			$num = $db->count($table, "addtime>$today", 30);
			echo 'try{$("m_'.$m['moduleid'].'_3").innerHTML="'.$num.'";}catch(e){}';

			if($m['moduleid'] == 9) {
				$table = $DT_PRE.'resume';
				//ALL
				$num = $db->count($table, '1', 60);
				echo 'try{$("m_resume").innerHTML="'.$num.'";}catch(e){}';
				//PUB
				$num = $db->count($table, "status=3", 60);
				echo 'try{$("m_resume_1").innerHTML="'.$num.'";}catch(e){}';
				//CHECK
				$num = $db->count($table, "status=2", 60);
				$num = $num ? '<strong class=\"f_red\">'.$num.'</strong>' : 0;
				echo 'try{$("m_resume_2").innerHTML="'.$num.'";}catch(e){}';
				//NEW
				$num = $db->count($table, "addtime>$today", 30);
				echo 'try{$("m_resume_3").innerHTML="'.$num.'";}catch(e){}';
			}
		}
	break;
	case 'left':
		$mymenu = cache_read('menu-'.$_userid.'.php');
		include tpl('left');
	break;
	default:
		include tpl('index');
	break;
}
?>