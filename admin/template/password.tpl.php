<?php
defined('IN_DESTOON') or exit('Access Denied');
include tpl('header');
show_menu($menus);
?>
<div class="tt">�޸�����</div>
<form method="post" action="?" onsubmit="return check();">
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl">�µ�¼���� <span class="f_red">*</span></td>
<td><input type="password" name="password" size="30" id="password"/> <span id="dpassword" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">�ظ������� <span class="f_red">*</span></td>
<td><input type="password" name="cpassword" size="30" id="cpassword"/> <span id="dcpassword" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">�������� <span class="f_red">*</span></td>
<td><input type="password" name="oldpassword" size="30" id="oldpassword"/> <span id="doldpassword" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"> </td>
<td><input type="submit" name="submit" value="�� ��" class="btn"/></td>
</tr>
</form>
</table>
<script type="text/javascript">
function check() {
	var l;
	var f;
	f = 'password';
	l = $(f).value.length;
	if(l < 6) {
		Dmsg('�µ�¼��������6λ����ǰ������'+l+'λ', f);
		return false;
	}
	f = 'cpassword';
	l = $(f).value;
	if(l != $('password').value) {
		Dmsg('�ظ����������µ�¼���벻һ��', f);
		return false;
	}
	f = 'oldpassword';
	l = $(f).value.length;
	if(l < 6) {
		Dmsg('������������6λ����ǰ������'+l+'λ', f);
		return false;
	}
	return true;
}
</script>
<script type="text/javascript">Menuon(2);</script>
</body>
</html>