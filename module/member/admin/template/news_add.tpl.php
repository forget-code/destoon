<?php
defined('IN_DESTOON') or exit('Access Denied');
include tpl('header');
show_menu($menus);
?>
<form method="post" action="?" id="dform" onsubmit="return check();">
<input type="hidden" name="moduleid" value="<?php echo $moduleid;?>"/>
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<div class="tt">�������</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl">��Ա�� <span class="f_red">*</span></td>
<td><input name="post[username]" type="text"  id="username" size="20" value="<?php echo $_username;?>"/> <span id="dusername" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">���ű��� <span class="f_red">*</span></td>
<td><input name="post[title]" type="text" id="title" size="40" /> <?php echo level_select('post[level]', '����');?>  <?php echo dstyle('post[style]');?> <span id="dtitle" class="f_red"></span></td>
</tr>

<tr>
<td class="tl">
�������� <span class="f_red">*</span>
</td>
<td><textarea name="post[content]" id="content" class="dsn"></textarea>
<?php echo deditor($moduleid, 'content', 'Default', '98%', 350);?><span id="dcontent" class="f_red"></span>
</td>
</tr>

<tr>
<td class="tl">����״̬</td>
<td>
<input type="radio" name="post[status]" value="3" checked/> ͨ��
<input type="radio" name="post[status]" value="2" /> ����
</td>
</tr>
<tr title="�뱣��ʱ���ʽ">
<td class="tl">���ʱ��</td>
<td><input type="text" size="22" name="post[addtime]" value="<?php echo $addtime;?>"/></td>
</tr>
</table>
<div class="sbt"><input type="submit" name="submit" value=" ȷ �� " class="btn"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" name="reset" value=" �� �� " class="btn"/></div>
</form>
<?php load('clear.js'); ?>
<script type="text/javascript">
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
	if(l < 5 ) {
		Dmsg('��������5�֣���ǰ������'+l+'��', f);
		return false;
	}
	return true;
}
</script>
<script type="text/javascript">Menuon(0);</script>
</body>
</html>