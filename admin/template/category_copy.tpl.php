<?php
defined('IN_DESTOON') or exit('Access Denied');
include tpl('header');
show_menu($menus);
?>
<form method="post" action="?" onsubmit="return check();">
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="mid" value="<?php echo $mid;?>"/>
<div class="tt">���ิ��</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl">Դģ��ID <span class="f_red">*</span></td>
<td><input name="fromid" type="text" id="fromid" size="10"/>&nbsp;
<span id="dfromid" class="f_red"></span>
<a href="?file=module" target="_blank">��ѯģ��ID</a>
</td>
</tr>
<tr>
<td class="tl">��ǰģ��������� <span class="f_red">*</span></td>
<td>
<input type="radio" name="save" value="1" checked/> ����
<input type="radio" name="save" value="0"/> ɾ��
</td>
</tr>
</table>
<div class="sbt"><input type="submit" name="submit" value="�� ��" class="btn"/></div>
</form>
<script type="text/javascript">
function check() {
	if($('fromid').value == '') {
		Dmsg('����дԴģ��ID', 'fromid');
		return false;
	}
	return confirm('�˲������ɳ�����ȷ��Ҫִ����');
}
</script>
<script type="text/javascript">Menuon(2);</script>
</body>
</html>