<?php
defined('IN_DESTOON') or exit('Access Denied');
include tpl('header');
show_menu($menus);
?>
<form method="post" action="?" id="dform" onsubmit="return check();">
<input type="hidden" name="moduleid" value="<?php echo $moduleid;?>"/>
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<div class="tt">��װģ��</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl">ģ�����</td>
<td><?php echo type_select('style', 1, 'post[typeid]', '��ѡ�����', 0, 'id="typeid"');?> <span id="dtypeid" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">ģ������ <span class="f_red">*</span></td>
<td><input name="post[title]" type="text" id="title" size="30" /> <span id="dtitle" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">���Ŀ¼ <span class="f_red">*</span></td>
<td><input name="post[skin]" id="skin" type="text" size="30" /><?php tips('���ϴ�Ŀ¼�� ./'.$MODULE[4]['moduledir'].'/skin/ ����Ϊ���֡���ĸ���');?> <span id="dskin" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">ģ��Ŀ¼ <span class="f_red">*</span></td>
<td><input name="post[template]" id="template" type="text" size="30" /><?php tips('���ϴ�Ŀ¼�� ./template/'.$CFG['template'].'/ ����Ϊ���֡���ĸ���');?> <span id="dtemplate" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">ģ������</td>
<td><input name="post[author]" type="text" size="20" /></td>
</tr>
<tr>
<td class="tl">��Ա�� <span class="f_red">*</span></td>
<td><?php echo group_checkbox('post[groupid][]', '6,7', '1,2,3,4');?></td>
</tr>
<tr>
<td class="tl">�۸�(/��)</td>
<td>
<input name="post[fee]" type="text" size="5" value="0"/>&nbsp;&nbsp;
<input type="radio" name="post[currency]" value="money" checked/> <?php echo $DT['money_name'];?>&nbsp;&nbsp;
<input type="radio" name="post[currency]" value="credit"/> <?php echo $DT['credit_name'];?> 
</td>
</tr>
<tr title="�뱣��ʱ���ʽ">
<td class="tl">����ʱ��</td>
<td><input type="text" size="22" name="post[addtime]" value="<?php echo $addtime;?>"/></td>
</tr>
</table>
<div class="sbt"><input type="submit" name="submit" value=" ȷ �� " class="btn"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" name="reset" value=" �� �� " class="btn"/></div>
</form>
<script type="text/javascript">
function check() {
	var f;
	f = 'title';
	if($(f).value == '') {
		Dmsg('����дģ������', f);
		return false;
	}
	f = 'skin';
	if($(f).value == '') {
		Dmsg('����д���Ŀ¼', f);
		return false;
	}
	f = 'template';
	if($(f).value == '') {
		Dmsg('����дģ��Ŀ¼', f);
		return false;
	}
	return true;
}
</script>
<script type="text/javascript">Menuon(0);</script>
</body>
</html>