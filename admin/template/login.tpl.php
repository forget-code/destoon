<?php 
defined('IN_DESTOON') or exit('Access Denied');
$edition = edition(1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=<?php echo DT_CHARSET; ?>" />
<meta name="robots" content="noindex,nofollow"/>
<title>����Ա��¼ - Powered By Destoon B2B <?php echo $edition;?></title>
<meta name="generator" content="Destoon B2B,www.destoon.com"/>
<link rel="stylesheet" href="admin/image/login.css" type="text/css" />
<script type="text/javascript" src="lang/<?php echo DT_LANG;?>/lang.js"></script>
<script type="text/javascript" src="file/script/config.js"></script>
<script type="text/javascript" src="file/script/common.js"></script>
</head>
</body>
<noscript><br/><br/><br/><center><h1>�����������֧��JavaScript,�����֧��JavaScript�������</h1></center></noscript>
<noframes><br/><br/><br/><center><h1>�����������֧�ֿ��,�����֧�ֿ�ܵ������</h1></center></noframes>
<table cellpadding="0" cellspacing="0" width="400"  align="center">
<tr>
<td height="100"></td>
</tr>
<tr>
<td>
	<div class="msg">
		<div class="head"><div class="mr">&nbsp;</div><div class="ml">����Ա��¼ IP:<?php echo $DT_IP;?></div></div>
		<div class="content">
		<form method="post" action="?"  onsubmit="return Dcheck();">
		<input type="hidden" name="file" value="<?php echo $file;?>"/>
		<input name="forward" type="hidden" value="<?php echo $forward;?>"/>
		<table cellpadding="2" cellspacing="1" width="100%">
		<tr>
		<td colspan="2" height="50"><a href="http://www.destoon.com/" target="_blank"><img src="admin/image/spacer.gif" width="290" height="30" title="Powered By www.destoon.com" alt=""/></a></td>
		</tr>
		<tr>
		<td height="20" colspan="2" class="tip"><img src="admin/image/lock.gif"/> ����δ��¼���¼��ʱ�����¼���������...</td>
		</tr>
		<tr>
		<td>&nbsp;��&nbsp;&nbsp;&nbsp;��</td>
		<td><input name="username" type="text" id="username" class="inp" style="width:140px;" value="<?php echo $username;?>"/></td>
		</tr>
		<tr>
		<td>&nbsp;��&nbsp;&nbsp;&nbsp;��</td>
		<td><?php include template('password', 'chip');?></td>
		</tr>
		<?php if($DT['captcha_admin']) { ?>
		<tr>
		<td>&nbsp;��֤��</td>
		<td><?php include template('captcha', 'chip');?></td>
		</tr>
		<?php } ?>
		<tr>
		<td></td>
		<td><input type="submit" name="submit" value="�� ¼" class="btn" tabindex="4"/>&nbsp;&nbsp;<input type="button" value="�� ��" class="btn" onclick="top.window.location='<?php echo DT_PATH;?>';"/>
		</td>
		</tr>
		</table>
		</form>
		</div>
	</div>
	<?php if(strpos(get_env('self'), '/admin.php') !== false) { ?>
	<div style="margin:10px 40px 0 40px;border:#FF8D21 1px solid;background:#FFFFDD;padding:8px;"><img src="admin/image/notice.gif" align="absmiddle"/> ��ʾ��Ϊ��ϵͳ��ȫ�����޸ĺ�̨�ļ���admin.php</div>
	<?php } ?>
</td>
</tr>
</table>
<script type="text/javascript">
if($('username').value == '') {
	$('username').focus();
} else {
	$('password').focus();
}
function Dcheck() {
	if($('username').value == '') {
		confirm('����д��Ա��');
		$('username').focus();
		return false;
	}
	if($('password').value == '') {
		confirm('����д����');
		$('password').focus();
		return false;
	}
	<?php if($DT['captcha_admin']) { ?>
	if(!is_captcha($('captcha').value)) {
		confirm('����д��֤��');
		$('captcha').focus();
		return false;
	}
	<?php } ?>
	return true;
}
</script>
</body>
</html>