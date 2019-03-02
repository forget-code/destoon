<?php
defined('IN_DESTOON') or exit('Access Denied');
$menus = array (
    array('�����ʼ�', '?moduleid='.$moduleid.'&file='.$file),
    array('��ȡ�б�', '?moduleid='.$moduleid.'&file='.$file.'&action=make'),
    array('�ʼ��б�', '?moduleid='.$moduleid.'&file='.$file.'&action=list'),
);
function _userinfo($fields, $email) {
	global $db, $DT_PRE;
	if($fields == 'mail') {
		return $db->get_one("SELECT * FROM {$DT_PRE}member m,{$DT_PRE}company c WHERE m.userid=c.userid AND c.mail='$email'");
	} else {
		return $db->get_one("SELECT * FROM {$DT_PRE}member m,{$DT_PRE}company c WHERE m.userid=c.userid AND m.email='$email'");
	}
}
switch($action) {
	case 'list':		 
		$others = array();
		$mailfiles = glob(DT_ROOT.'/file/email/*.txt');
		$mail = $mails = array();
		if(is_array($mailfiles)) {
			$class = 1;
			foreach($mailfiles as $id=>$mailfile)	{
				$tmp = basename($mailfile);
					$mail['filename'] = $tmp;
					$mail['filesize'] = round(filesize($mailfile)/(1024), 2);
					$mail['mtime'] = timetodate(filemtime($mailfile), 5);
					$mail['count'] = substr_count(file_get($mailfile), "\n") + 1;	
					$mails[] = $mail;
			}
		}
		include tpl('sendmail_list', $module);
	break;
	case 'make':
		if(isset($make)) {
			$tb or $tb = $DT_PRE.'member';
			$field or $field = 'email';
			$sql or $sql = 'groupid>4';
			$sql = stripslashes($sql);
			$num or $num = 1000;
			$pagesize = $num;
			$offset = ($page-1)*$pagesize;
			if($page == 1) $random = $title ? $title : mt_rand(1000, 9999);
			$mail = '';
			$query = "SELECT $field FROM $tb WHERE $sql LIMIT $offset,$pagesize";
			$key = strpos($field, '.') === false ? $field : file_ext($field);
			$result = $db->query($query);
			while($r = $db->fetch_array($result)) {
				if($r[$key]) $mail .= $r[$key]."\n";
			}
			if($mail) {
				$filename = timetodate($DT_TIME, 'Ymd').'_'.$random.'_'.$page.'.txt';
				file_put(DT_ROOT.'/file/email/'.$filename, trim($mail));
				$page++;
				msg('�ļ�'.$filename.'��ȡ�ɹ���<br/>���Ժ򣬳����Զ�����...', '?moduleid='.$moduleid.'&file='.$file.'&action='.$action.'&tb='.urlencode($tb).'&field='.urlencode($field).'&sql='.urlencode($sql).'&num='.$num.'&page='.$page.'&random='.urlencode($random).'&make=1');
			} else {
				msg('�б��ȡ�ɹ�', '?moduleid='.$moduleid.'&file='.$file.'&action=list');
			}
		} else {
			include tpl('sendmail_make', $module);
		}
	break;
	case 'download':
		$file_ext = file_ext($filename);
		$file_ext == 'txt' or msg('ֻ������TxT�ļ�');
		file_down(DT_ROOT.'/file/email/'.$filename);
	break;
	case 'upload':
		require DT_ROOT.'/include/upload.class.php';
		$upload = new upload($_FILES, 'file/email/', $uploadfile_name, 'txt');	
		$upload->adduserid = false;
		if($upload->uploadfile()) dmsg('�ϴ��ɹ�', '?moduleid='.$moduleid.'&file='.$file.'&action=list');
		msg($upload->errmsg);
	break;
	case 'delete':
		 if(is_array($filenames)) {
			 foreach($filenames as $filename) {
				 if(file_ext($filename) == 'txt') @unlink(DT_ROOT.'/file/email/'.$filename);
			 }
		 } else {
			 if(file_ext($filenames) == 'txt') @unlink(DT_ROOT.'/file/email/'.$filenames);
		 }
		 dmsg('ɾ���ɹ�', '?moduleid='.$moduleid.'&file='.$file.'&action=list');
	break;
	default:
		if(isset($send)) {
			if(isset($preview) && $preview) {
				$content = stripslashes($content);
				if($template) {
					if($sendtype == 2) {
						$emails = explode("\n", $emails);
						$email = trim($emails[0]);
					} else if($sendtype == 3) {
						$emails = explode("\n", file_get(DT_ROOT.'/file/email/'.$mail));
						$email = trim($emails[0]);
					}
					$user = _userinfo($fields, $email);
					eval("\$title = \"$title\";");
					$content = ob_template($template, 'mail');
				}
				echo '<br/><strong>�ʼ����⣺</strong>'.$title.'<br/><br/>';
				echo '<strong>�ʼ����ģ�</strong><br/><br/>';
				echo $content;
				exit;
			}
			if($sendtype == 1) {
				$title or msg('����д�ʼ�����');
				$content or msg('����д�ʼ�����');
				$email or msg('����д�ʼ���ַ');
				$email = trim($email);
				$DT['mail_name'] = $name;
				if(is_email($email)) {
					if($template) {
						$user = _userinfo($fields, $email);
						if($user) {
							eval("\$title = \"$title\";");
							$content = ob_template($template, 'mail');
							send_mail($email, $title, $content, $sender);
						}
					} else {
						send_mail($email, $title, $content, $sender);
					}
				}
			} else if($sendtype == 2) {
				$title or msg('����д�ʼ�����');
				$content or msg('����д�ʼ�����');
				$emails or msg('����д�ʼ���ַ');
				$emails = explode("\n", $emails);
				$DT['mail_name'] = $name;
				$_content = $content;
				foreach($emails as $email) {
					$email = trim($email);
					if(is_email($email)) {
					    $content = $_content;
						if($template) {
							$user = _userinfo($fields, $email);
							if($user) {
								eval("\$title = \"$title\";");
								$content = ob_template($template, 'mail');
								send_mail($email, $title, $content, $sender);
							}
						} else {
							send_mail($email, $title, $content, $sender);
						}
					}
				}
			} else if($sendtype == 3) {
				if(isset($id)) {
					$data = cache_read($_username.'_sendmail.php');
					$title = $data['title'];
					$content = $data['content'];
					$sender = $data['sender'];
					$name = $data['name'];
					$template = $data['template'];
					$maillist = $data['maillist'];
					$fields = $data['fields'];
				} else {
					$id = 0;
					$title or msg('����д�ʼ�����');
					$content or msg('����д�ʼ�����');
					$maillist or msg('��ѡ���ʼ��б�');
					$data = array();
					$data['title'] = $title;
					$data['content'] = $content;
					$data['sender'] = $sender;
					$data['name'] = $name;
					$data['template'] = $template;
					$data['maillist'] = $maillist;
					$data['fields'] = $fields;
					cache_write($_username.'_sendmail.php', $data);
				}
				$_content = $content;
				$pernum = intval($pernum);
				if(!$pernum) $pernum = 10;			
				$DT['mail_name'] = $name;
				$emails = file_get(DT_ROOT.'/file/email/'.$maillist);
				$emails = explode("\n", $emails);
				for($i = 1; $i <= $pernum; $i++) {
					$email = trim($emails[$id++]);
					if(is_email($email)) {						
						$content = $_content;
						if($template) {
							$user = _userinfo($fields, $email);
							if($user) {
								eval("\$title = \"$title\";");
								$content = ob_template($template, 'mail');
								send_mail($email, $title, $content, $sender);
							}
						} else {
							send_mail($email, $title, $content, $sender);
						}
					}
				}
				if($id < count($emails)) {
					msg('�ѷ��� '.$id.' ���ʼ���ϵͳ���Զ����������Ժ�...', '?moduleid='.$moduleid.'&file='.$file.'&sendtype=3&id='.$id.'&pernum='.$pernum.'&send=1', 3);
				}
				cache_delete($_username.'_sendmail.php');
				$forward = '?moduleid='.$moduleid.'&file='.$file;
			}
			dmsg('�ʼ����ͳɹ�', $forward);
		} else {
			isset($email) or $email = '';
			include tpl('sendmail', $module);
		}
	break;
}
?>