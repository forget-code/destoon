<?php
defined('IN_DESTOON') or exit('Access Denied');
include tpl('header');
show_menu($menus);
?>
<div class="tt">���ģ��</div>
<form method="post" action="?" onsubmit="return check();">
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<input type="hidden" name="action" value="add"/>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl">ģ������</td>
<td><input type="radio" name="post[islink]" value="0" onclick="$('link0').style.display='';$('link1').style.display='none';" id="islink" checked/> ����ģ�� <input type="radio" name="post[islink]" value="1" onclick="$('link0').style.display='none';$('link1').style.display='';"/> �ⲿ����</td>
</tr>
<tr>
<td class="tl">ģ������ <span class="f_red">*</span></td>
<td><input name="post[name]" type="text" id="name" size="10" /> <?php echo dstyle('post[style]');?> <span id="dname" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">�����˵�</td>
<td><input type="radio" name="post[ismenu]" value="1" checked/> ��&nbsp;&nbsp;&nbsp;&nbsp; <input type="radio" name="post[ismenu]" value="0" /> ��</td>
</tr>
<tr>
<td class="tl">�´��ڴ�</td>
<td><input type="radio" name="post[isblank]" value="1"/> ��&nbsp;&nbsp;&nbsp;&nbsp; <input type="radio" name="post[isblank]" value="0" checked /> ��</td>
</tr>
<tbody id="link1" style="display:none;">
<tr>
<td class="tl">���ӵ�ַ <span class="f_red">*</span></td>
<td><input name="post[linkurl]" type="text" id="linkurl" size="40" /> <span id="dlinkurl" class="f_red"></span></td>
</tr>
</tbody>
<tbody id="link0" style="display:;">
<tr>
<td class="tl">����ģ�� <span class="f_red">*</span></td>
<td><?php echo $module_select;?> <span id="dmodule" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">��װĿ¼ <span class="f_red">*</span></td>
<td><input name="post[moduledir]" type="text" id="moduledir" size="30" /> <input type="button" class="btn" value="Ŀ¼���" onclick="ckDir();"><?php tips('��Ӣ�ġ����֡��л��ߡ��»���');?> <span id="dmoduledir" class="f_red"></span> </td>
</tr>
<tr>
<td class="tl">������</td>
<td><input name="post[domain]" type="text" id="domain" size="30" /><?php tips('����http://sell.destoon.com/,�� / ��β<br/>�������������д');?></td>
</tr>
</tbody>
</table>
<div class="sbt"><input type="submit" name="submit" value="ȷ ��" class="btn">&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" name="reset" value="�� ��" class="btn"></div>
</form>
<script type="text/javascript">
function ckDir() {
	if($('moduledir').value == '') {
		Dalert('����д��װĿ¼');
		$('moduledir').focus();
		return false;
	}
	var url = '?file=module&action=ckdir&moduledir='+$('moduledir').value;
	Diframe(url, 0, 0, 1);
}
function check() {
	var l;
	var f;
	f = 'name';
	l = $(f).value;
	if(l == '') {
		Dmsg('����дģ������', f);
		return false;
	}
	if($('islink').checked) {
		f = 'module';
		l = $(f).value;
		if(l == 0) {
			Dmsg('��ѡ������ģ��', f);
			return false;
		}
		f = 'moduledir';
		l = $(f).value;
		if(l == '') {
			Dmsg('����д��װĿ¼', f);
			return false;
		}
	} else {
		f = 'linkurl';
		l = $(f).value.length;
		if(l < 2) {
			Dmsg('����д���ӵ�ַ', f);
			return false;
		}
	}
	return true;
}
</script>
<script type="text/javascript">Menuon(0);</script>
</body>
</html>