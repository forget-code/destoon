<?php
defined('IN_DESTOON') or exit('Access Denied');
include tpl('header');
show_menu($menus);
?>
<form method="post" action="?" id="dform" onsubmit="return check();">
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="tb" value="<?php echo $tb;?>"/>
<input type="hidden" name="post[tb]" value="<?php echo $tb;?>"/>
<div class="tt">����ֶ�</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl">�ֶ� <span class="f_red">*</span></td>
<td><input name="post[name]" type="text" id="name" size="20"/>
<span id="dname" class="f_red"></span>
Сд��ĸ(a-z),����(0-9) �Ƽ�ʹ����ĸ,���������ֿ�ͷ
</td>
</tr>
<tr>
<td class="tl">�ֶ����� <span class="f_red">*</span></td>
<td><input name="post[title]" type="text" id="title" size="20" /> <?php tips('����ʹ������');?> 
<span id="dtitle" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">��ʾ��Ϣ</td>
<td><input name="post[note]" type="text" id="note" size="50" /></td>
</tr>
<tr>
<td class="tl">�ֶ����� <span class="f_red">*</span></td>
<td>
<select name="post[type]" onchange="dtype(this.value)">
<option value="varchar">�ַ�(Varchar)</option>
<option value="int">����(Int)</option>
<option value="float">С��(Float)</option>
<option value="text">�ı�(Text)</option>
</select>
</td>
</tr>
<tr id="tr_length" style="display:">
<td class="tl">�ֶγ���</td>
<td><input name="post[length]" type="text" id="length" size="20" value="255"/></td>
</tr>
<tr>
<td class="tl">������ <span class="f_red">*</span></td>
<td>
<select name="post[html]" onchange="dhtml(this.value)">
<option value="text" selected>�����ı�(text)</option>
<option value="textarea">�����ı�(textarea)</option>
<option value="select">������(select)</option>
<option value="radio">��ѡ��(radio)</option>
<option value="checkbox">��ѡ��(checkbox)</option>
<option value="hidden">������(hidden)</option>
<option value="date">����ѡ��</option>
<option value="thumb">����ͼ�ϴ�</option>
<option value="file">�ļ��ϴ�</option>
<option value="editor">��ҳ�༭��</option>
</select>
</td>
</tr>
<tr>
<td class="tl">Ĭ��ֵ</td>
<td><input name="post[default_value]" type="text" size="40" /> ֧��PHP���������� $_username</td>
</tr>
<tr id="tr_option" style="display:none;">
<td class="tl">ѡ��ֵ</td>
<td>
<textarea name="post[option_value]" style="width:250px;height:80px;overflow:visible;">
ѡ��ֵA|ѡ����A*
ѡ��ֵB|ѡ����B*
ѡ��ֵC|ѡ����C*
</textarea><br/>
һ��һ�� ѡ��ֵ|ѡ������* ע��*Ϊ��β��־��
</td>
</tr>
<tr id="tr_wh" style="display:none;">
<td class="tl">Ĭ�Ͽ��</td>
<td><input name="post[width]" type="text" id="width" size="5" value="120"/> X <input name="post[height]" type="text" id="height" size="5" value="90"/></td>
</tr>
<tr>
<td class="tl">��������</td>
<td><input name="post[input_limit]" type="text" id="input_limit" size="40" />
<select onchange="dlimit(this.value)">
<option value="">������</option>
<option value="notnull">����Ϊ��</option>
<option value="numeric">������</option>
<option value="letter">����ĸ</option>
<option value="nl">�����ֺ���ĸ</option>
<option value="email">��E-mail��ַ</option>
<option value="date">�����ڸ�ʽ</option>
</select><br/>
ֱ�������ֱ�ʾ������С����,���Ҫ���Ƴ��ȷ�Χ����6��20֮��,����д 6-20<br/>
����ֱ����д����js��php��������ʽ<br/>
���ڵ�ѡ��(radio),���0���ֱ�ʾ��ѡ<br/>
���ڶ�ѡ��(checkbox),���0���ֱ�ʾ��ѡ���� ��ȷ�Χ��ʾ��ѡ������Χ<br/>
</td>
</tr>
<tr>
<td class="tl">��������</td>
<td>
<input name="post[addition]" type="text" size="60" id="addition" value=""/> <?php tips('������ӱ����ԡ�JS�¼���CSS��ʽ ����е�������� \\');?>
</td>
</tr>
<tr>
<td class="tl">ֱ����ʾ <span class="f_red">*</span></td>
<td>
<input type="radio" name="post[display]" value="1" checked/> ��
<input type="radio" name="post[display]" value="0"/> �� <?php tips('���ѡ��񣬿����ֶ������ֶμ��뵽��Ӧ��ģ���ļ��ϵͳ����ֱ����ʾ');?>
</td>
</tr>
<tr>
<td class="tl">ǰ̨��ʾ <span class="f_red">*</span></td>
<td>
<input type="radio" name="post[front]" value="1" checked/> ��
<input type="radio" name="post[front]" value="0"/> �� <?php tips('���ѡ���ǣ������ǰ̨��ʾ����Ա�����޸�');?>
</td>
</tr>
</table>
<div class="sbt"><input type="submit" name="submit" value="ȷ ��" class="btn"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" name="reset" value="�� ��" class="btn"/></div>
</form>
<script type="text/javascript">
function dhtml(id) {
	if(id == 'select' || id == 'radio' || id == 'checkbox') {
		$('tr_option').style.display = '';
		$('tr_wh').style.display = 'none';		
	} else if(id == 'thumb' || id == 'editor') {
		$('tr_option').style.display = 'none';
		$('tr_wh').style.display = '';
		if(id == 'editor') {
			$('width').value = '600';
			$('height').value = '300';
		}
	} else {
		$('tr_option').style.display = 'none';
		$('tr_wh').style.display = 'none';
	}

	if(id == 'text') {
		$('addition').value = 'size="30"';
	} else if(id == 'textarea') {
		$('addition').value = 'rows="5" cols="80"';
	} else {
		$('addition').value = '';
	}
}
$('addition').value = 'size="30"';
function dtype(id) {
	if(id == 'varchar') {
		$('tr_length').style.display = '';
		$('length').value = '255';
	} else if(id == 'int') {
		$('tr_length').style.display = '';
		$('length').value = '10';
	} else if(id == 'float') {
		$('tr_length').style.display = 'none';
		$('length').value = '';
	} else if(id == 'text') {
		$('tr_length').style.display = 'none';
		$('length').value = '';
	}
}
function dlimit(id) {
	if(id == 'notnull') {
		$('input_limit').value = '1';
	} else if(id == 'numeric') {
		$('input_limit').value = '[0-9]{1,}';
	} else if(id == 'letter') {
		$('input_limit').value = '[a-z]{1,}';
	} else if(id == 'nl') {
		$('input_limit').value = '[a-z0-9]{1,}';
	} else if(id == 'email') {
		$('input_limit').value = 'is_email';
	} else if(id == 'date') {
		$('input_limit').value = 'is_date';
	} else {
		$('input_limit').value = '';
	}
}
function check() {
	if($('name').value == '') {
		Dmsg('����д�ֶ�', 'name');
		return false;
	}
	if($('title').value == '') {
		Dmsg('����д�ֶ�����', 'title');
		return false;
	}
	return true;
}
</script>
<script type="text/javascript">Menuon(0);</script>
</body>
</html>