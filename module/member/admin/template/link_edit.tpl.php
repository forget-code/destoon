<?php
defined('IN_DESTOON') or exit('Access Denied');
include tpl('header');
show_menu($menus);
?>
<form method="post" action="?" id="dform" onsubmit="return check();">
<input type="hidden" name="moduleid" value="<?php echo $moduleid;?>"/>
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="itemid" value="<?php echo $itemid;?>"/>
<input type="hidden" name="forward" value="<?php echo $forward;?>"/>
<div class="tt"><?php echo $action == 'add' ? '����' : '�޸�';?>����</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl">��Ա�� <span class="f_red">*</span></td>
<td><input name="post[username]" type="text" size="20" value="<?php echo $username;?>"/></td>
</tr>
<tr>
<td class="tl">��վ���� <span class="f_red">*</span></td>
<td><input name="post[title]" type="text" id="title" size="40" value="<?php echo $title;?>"/> <?php echo dstyle('post[style]', $style);?> <span id="dtitle" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">��վ��ַ <span class="f_red">*</span></td>
<td><input name="post[linkurl]" type="text" id="linkurl" size="40" value="<?php echo $linkurl;?>"/> <span id="dlinkurl" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">����״̬</td>
<td>
<input type="radio" name="post[status]" value="3" <?php if($status==3) echo 'checked';?>/> ͨ��
<input type="radio" name="post[status]" value="2" <?php if($status==2) echo 'checked';?>/> ����
</td>
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
		Dmsg('��������վ����', f);
		return false;
	}
	f = 'linkurl';
	l = $(f).value.length;
	if(l < 12) {
		Dmsg('��������վ��ַ', f);
		return false;
	}
}
</script>
<script type="text/javascript">Menuon(<?php echo $menuid;?>);</script>
</body>
</html>