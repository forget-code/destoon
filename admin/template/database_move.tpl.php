<?php
defined('IN_DESTOON') or exit('Access Denied');
include tpl('header');
show_menu($menus);
?>
<form method="post" action="?" onsubmit="return check();">
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<div class="tt">���ݻ�ת</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl">ת������ <span class="f_red">*</span></td>
<td class="c_p">
<table cellpadding="3" cellspacing="3" width="100%">
<tr onclick="$('t_1').checked=true;">
<td width="20"><input type="radio" name="type" value="1" id="t_1"/></td>
<td>��Ӧ &rarr; ��</td>
</tr>
<tr onclick="$('t_2').checked=true;">
<td><input type="radio" name="type" value="2" id="t_2"/></td>
<td>�� &rarr; ��Ӧ</td>
</tr>
<tr onclick="$('t_3').checked=true;">
<td><input type="radio" name="type" value="3" id="t_3"/></td>
<td>
<select name="afid" id="afid">
<option value="0">����</option>
<?php
foreach($MODULE as $m) {
	if($m['module'] == 'article') {
		echo '<option value="'.$m['moduleid'].'">'.$m['name'].'</option>';
	}
}
?>
</select>
&rarr;
<select name="atid" id="atid">
<option value="0">����</option>
<?php
foreach($MODULE as $m) {
	if($m['module'] == 'article') {
		echo '<option value="'.$m['moduleid'].'">'.$m['name'].'</option>';
	}
}
?>
</select>
</td>
</tr>
<tr onclick="$('t_4').checked=true;">
<td><input type="radio" name="type" value="4" id="t_4"/></td>
<td>
<select name="ifid" id="ifid">
<option value="0">��Ϣ</option>
<?php
foreach($MODULE as $m) {
	if($m['module'] == 'info') {
		echo '<option value="'.$m['moduleid'].'">'.$m['name'].'</option>';
	}
}
?>
</select>
&rarr;
<select name="itid" id="itid">
<option value="0">��Ϣ</option>
<?php
foreach($MODULE as $m) {
	if($m['module'] == 'info') {
		echo '<option value="'.$m['moduleid'].'">'.$m['name'].'</option>';
	}
}
?>
</select>
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td class="tl">ת������ <span class="f_red">*</span></td>
<td class="f_gray">&nbsp;
<input type="text" name="condition" value="" size="80" id="condition"/>
<br/>
&nbsp;- ���ת�Ƶ�����Ϣ����ֱ����д��ϢID������ <span class="f_blue">123</span><br/>
&nbsp;- ���ת�ƶ�����Ϣ��������,�ָ���ϢID������ <span class="f_blue">123,124,125</span> (��β�Ϳ�ͷ����Ҫ,)<br/>
&nbsp;- ��ֱ��дSQL����������������and��ͷ<br/>
&nbsp;&nbsp;���� <span class="f_blue">and catid=123</span> ��ʾ���÷���IDΪ123����Ϣ<br/>
&nbsp;&nbsp;���� <span class="f_blue">and itemid>0</span> ��ʾ����Դģ��������Ϣ<br/>
</td>
</tr>
<tr>
<td class="tl">�·���ID <span class="f_red">*</span></td>
<td>&nbsp;
<input type="text" name="catid" value="" size="5" id="catid"/>
<a href="javascript:getid();" class="t">��ѯ</a><?php tips('���ݽ���ת�Ƶ��˷�����');?>
</td>
</tr>
<tr>
<td class="tl">ɾ��Դ���� <span class="f_red">*</span></td>
<td>&nbsp;
<input type="radio" name="delete" value="1" id="d_1" checked/> ��&nbsp;&nbsp;&nbsp;
<input type="radio" name="delete" value="0" id="d_0"/> ��
</td>
</tr>
<tr>
<td class="tl">ע������</td>
<td class="f_gray">
&nbsp;- ת�Ƴɹ��������Ŀ��ģ�͹���������ת�Ƶ���Ϣ�����ģ��������������HTML����Ҫ����һ��<br/>
&nbsp;- ������Ҫ����ϢID���������ſ��Կ�����ת�Ƶ���Ϣ<br/>
</td>
</tr>
<tr>
<td class="tl">&nbsp;</td>
<td>&nbsp;<input type="submit" name="submit" value="ִ ��" class="btn"/></td> 
</tr>
</table>
</form>
<script type="text/javascript">
function getid() {
	var mid;
	if($('t_1').checked) {
		mid = 6;
	} else if($('t_2').checked) {
		mid = 5;
	} else if($('t_3').checked) {
		mid = $('atid').value;
		if(mid == 0) {
			alert('��ѡ������Ŀ��ģ��');
			$('atid').focus();
			return;
		}
	} else if($('t_4').checked) {
		mid = $('itid').value;
		if(mid == 0) {
			alert('��ѡ����ϢĿ��ģ��');
			$('itid').focus();
			return;
		}
	} else {
		alert('��ѡ��ת������');
		return;
	}
	window.open('?file=category&mid='+mid);
}
function check() {
	if($('t_1').checked) {
		//
	} else if($('t_2').checked) {
		//
	} else if($('t_3').checked) {
		if($('afid').value == 0) {
			alert('��ѡ��������Դģ��');
			$('afid').focus();
			return false;
		}
		if($('atid').value == 0) {
			alert('��ѡ������Ŀ��ģ��');
			$('atid').focus();
			return false;
		}
		if($('afid').value == $('atid').value) {
			alert('������Դģ�ͺ�Ŀ��ģ�Ͳ�����ͬ');
			$('atid').focus();
			return false;
		}
	} else if($('t_4').checked) {
		if($('ifid').value == 0) {
			alert('��ѡ����Ϣ��Դģ��');
			$('ifid').focus();
			return false;
		}
		if($('itid').value == 0) {
			alert('��ѡ����ϢĿ��ģ��');
			$('itid').focus();
			return false;
		}
		if($('ifid').value == $('itid').value) {
			alert('��Ϣ��Դģ�ͺ�Ŀ��ģ�Ͳ�����ͬ');
			$('itid').focus();
			return false;
		}
	} else {
		alert('��ѡ��ת������');
		return false;
	}
	if($('condition').value.length < 1) {		
		alert('����дת������');
		$('condition').focus();
		return false;
	}
	if($('catid').value.length < 1) {		
		alert('����д�·���ID');
		$('catid').focus();
		return false;
	}
	return confirm('ȷ��Ҫת���𣿴˲��������ɻָ�');
}
</script>
<script type="text/javascript">Menuon(4);</script>
</body>
</html>