<?php
defined('IN_DESTOON') or exit('Access Denied');
include tpl('header');
show_menu($menus);
?>
<div class="tt">�����ʼ�</div>
<form method="post" action="?" id="dform" onsubmit="return check();">
<input type="hidden" name="moduleid" value="<?php echo $moduleid;?>"/>
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="send" value="1"/>
<input type="hidden" name="preview" id="preview" value="0"/>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl">�ռ��� <span class="f_red">*</span></td>
<td>
	<input type="radio" name="sendtype" value="1" id="s1" onclick="ck(1);" checked/> <label for="s1">���ռ���</label>
	<input type="radio" name="sendtype" value="2" id="s2" onclick="ck(2);"/> <label for="s2">���ռ���</label>
	<input type="radio" name="sendtype" value="3" id="s3" onclick="ck(3);"/> <label for="s3">�б�Ⱥ��</label>
</td>
</tr>
<tbody id="t1" style="display:;">
<tr>
<td class="tl">�ʼ���ַ <span class="f_red">*</span></td>
<td><input type="text" size="30" name="email" value="<?php echo $email;?>"/></td>
</tr>
</tbody>
<tbody id="t2" style="display:none;">
<tr>
<td class="tl">�ʼ���ַ <span class="f_red">*</span></td>
<td class="f_gray"><textarea name="emails" rows="4" cols="50"></textarea> [һ��һ���ʼ���ַ]</td>
</tr>
</tbody>
<tbody id="t3" style="display:none;">
<tr>
<td class="tl">�ʼ��б� <span class="f_red">*</span></td>
<td class="f_red">
<?php
	$mails = glob(DT_ROOT.'/file/email/*.txt');
	echo '<select name="maillist" id="maillist"><option value="0">��ѡ���ʼ��б�</option>';
	if($mails) {
		foreach($mails as $m) {
			$tmp = basename($m);
			echo '<option value="'.$tmp.'">'.$tmp.'</option>';
		}
	} else {
		echo '<option value="">���ʼ��б�</option>';
	}
	echo '</select>';
?>
&nbsp;&nbsp;<a href="javascript:" onclick="if($('maillist').value != 0){window.open('file/email/'+$('maillist').value);}else{alert('����ѡ���ʼ��б�');$('maillist').focus();}" class="t">[�鿴ѡ��]</a>&nbsp;&nbsp;<a href="?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=make" class="t">[��ȡ�б�]</a>
</td>
</tr>
<tr>
<td class="tl">ÿ�ַ����ʼ��� <span class="f_red">*</span></td>
<td><input type="text" size="5" name="pernum" id="pernum" value="5"/></td>
</tr>
</tbody>
<tr>
<td class="tl">�ʼ����� <span class="f_red">*</span></td>
<td><input type="text" size="60" name="title" id="title"/> <span id="dtitle" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">����������</td>
<td><input type="text" size="30" name="sender" id="sender" value="<?php echo $DT['mail_sender'];?>"/></td>
</tr>
<tr>
<td class="tl">����������</td>
<td><input type="text" size="30" name="name" id="name" value="<?php echo $DT['mail_name'];?>"/></td>
</tr>
<tr>
<td class="tl">�ʼ����� <span class="f_red">*</span></td>
<td>
<textarea name="content" id="content" class="dsn"></textarea><?php echo deditor($moduleid, 'content', 'Destoon', '98%', 350);?><span id="dcontent" class="f_red"></span>
</td>
</tr>
<tr>
<td class="tl">ѡ��ģ��</td>
<td><?php echo tpl_select('email', 'mail', 'template', '��ѡ��', '', 'onchange=Ds(\'fd\');');?><span id="dtemplate" class="f_red"></span><br/>
<span class="f_gray">
- ģ��Ϊģ��Ŀ¼/mail/Ŀ¼�µ�emailģ��ϵ�У����ڷ���֮ǰ����ģ������<br/>
- ģ��֧��ϵͳ�����ͻ�Ա���ϣ���Ա���ϱ�����$user���飬����{$user[username]}��ʾ��Ա��<br/>
- ���ѡ����ģ�壬�ʼ���ַ�������Ѵ��ڻ�Ա���ʼ���ַ����ʱ�ʼ�����֧�ֲ������<br/>
- ����Ǹ��ǻ�Ա�����ʼ����벻Ҫʹ�ñ���<br/>
</span>
</td>
</tr>
<tr id="fd" style="display:none;">
<td class="tl">�ʼ��ֶ�</td>
<td><input type="text" size="5" name="fields" value="email"/> ��Ҫ���ʼ�����ʱһ�£�Ĭ��Ϊemail</td>
</tr>
</table>
<div class="sbt"><input type="submit" name="submit" value=" ȷ �� " class="btn" onclick="$('preview').value=0;this.form.target='';"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value=" Ԥ �� " class="btn" onclick="$('preview').value=1;this.form.target='_blank';"/></div>
</form>
<?php load('clear.js'); ?>
<script type="text/javascript">
var i = 1;
function ck(id) {
	$('t'+i).style.display='none';
	$('t'+id).style.display='';
	i = id;
}
function check() {
	var l;
	var f;
	f = 'title';
	l = $(f).value.length;
	if(l < 2) {
		Dmsg('��������2�֣���ǰ������'+l+'��', f);
		return false;
	}
	f = 'content';
	l = FCKLen();
	if(l < 5) {
		Dmsg('��������5�֣���ǰ������'+l+'��', f);
		return false;
	}
	return true;
}
</script>
<script type="text/javascript">Menuon(0);</script>
</body>
</html>