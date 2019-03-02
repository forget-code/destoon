<?php
defined('IN_DESTOON') or exit('Access Denied');
include tpl('header');
show_menu($menus);
?>
<form method="post" action="?" id="runcode_form" target="_blank">
<input type="hidden" name="moduleid" value="<?php echo $moduleid;?>"/>
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<input type="hidden" name="action" value="runcode"/>
<input type="hidden" name="codes" value=""/>
</form>
<form method="post" action="?" id="dform" onsubmit="return check();">
<input type="hidden" name="moduleid" value="<?php echo $moduleid;?>"/>
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="pid" value="<?php echo $pid;?>"/>
<input type="hidden" name="forward" value="<?php echo $forward;?>"/>
<div class="tt">�޸Ĺ��λ</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl">���λID</td>
<td><input name="place[pid]" type="text" size="5" value="<?php echo $pid;?>"/> <a href="?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>" target="_blank" class="t">[�鿴]</a>
<br/><span class="f_gray">[ע��]�޸Ĺ��λID���Իָ���ɾ���Ĺ��λ���������д��ID���ڣ����ܵ���һ��SQL����</span>
</td>
</tr>
<tr>
<td class="tl">���λ���� <span class="f_red">*</span></td>
<td><input name="place[name]" id="name" type="text" size="30" value="<?php echo $name;?>"/> <?php echo dstyle('place[style]', $style);?> <span id="dname" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">���λ����</td>
<td><input name="place[introduce]" type="text" size="60" value="<?php echo $introduce;?>"/></td>
</tr>
<tr>
<td class="tl">���λ���� <span class="f_red">*</span></td>
<td>
<?php foreach($TYPE as $k=>$v) {
	if($k) echo '<input name="place[typeid]" type="radio" value="'.$k.'" '.($k == $typeid ? 'checked' : '').' id="p'.$k.'" onclick="sh('.$k.');"/> <label for="p'.$k.'">'.$v.'&nbsp;</label>';
}
?>
<br/><span class="f_gray">[ע��] ����޸��˹��λ���ͣ�������޸Ĵ˹��λ�����й��</span>
</td>
</tr>
<tr id="wh" style="display:<?php echo $typeid == 3 || $typeid == 4 || $typeid == 5 ? '' : 'none';?>">
<td class="tl">���λ��С <span class="f_red">*</span></td>
<td><input name="place[width]" id="width" type="text" size="5" value="<?php echo $width;?>"/> X <input name="place[height]" id="height" type="text" size="5" value="<?php echo $height;?>"/> <span class="f_gray">[�� X �� px]</span> <span id="dsize" class="f_red"></span>
</td>
</tr>
<tr id="md" style="display:<?php echo $typeid == 6 || $typeid == 7 ? '' : 'none';?>">
<td class="tl">����ģ�� <span class="f_red">*</span></td>
<td><?php echo module_select('place[moduleid]', '��ѡ��', $mid, 'id="mid"');?> <span id="dmid" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">���λ�۸� <span class="f_red">*</span></td>
<td><input name="place[price]" type="text" size="5" value="<?php echo $price;?>"/> <?php echo $unit;?>/�� <span class="f_gray">[0�����ʾ����]</span></td>
</tr>
<tr>
<td class="tl">Ĭ�Ϲ�����</td>
<td><textarea name="place[code]" id="code" style="width:98%;height:50px;overflow:visible;font-family:Fixedsys,verdana;"><?php echo $code;?></textarea><br/>
<input type="button" value=" ���д��� " class="btn" onclick="runcode();"/><span class="f_gray">&nbsp;�����λ���޹��ʱ����ʾ�˴��룬֧��html��css��js ������λ����js���ã��˴�������ʹ��js����</span><span id="dcode" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">��վǰ̨��ʾ</td>
<td>
<input type="radio" name="place[open]" value="1" <?php if($open) echo 'checked';?>/> ��&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="place[open]" value="0" <?php if(!$open) echo 'checked';?>/> ��
</td>
</tr>
</table>
<div class="sbt"><input type="submit" name="submit" value=" ȷ �� " class="btn"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" name="reset" value=" �� �� " class="btn"/></div>
</form>
<script type="text/javascript">
function sh(id) {
	if(id == 6 || id == 7) {
		Ds('md');Dh('wh');
	} else if(id == 3 || id == 4 || id == 5) {
		Dh('md');Ds('wh');
	} else {
		Dh('md');Dh('wh');
	}
}
function check() {
	var l;
	var f;
	f = 'name';
	l = $(f).value.length;
	if(l < 1) {
		Dmsg('����д���λ����', f);
		return false;
	}
	if($('p3').checked || $('p4').checked || $('p5').checked) {
		if($('width').value.length < 2 || $('height').value.length < 2) {
			Dmsg('����д���λ��С', 'size');
			return false;
		}
	}
	if($('p6').checked || $('p7').checked) {
		if($('mid').value == 0) {
			Dmsg('��ѡ������ģ��', 'mid');
			return false;
		}
	}
	return true;
}
function runcode() {
	if($('code').value.length < 3) {
		Dmsg('����д����', 'code');
		return false;
	}
	$('codes').value = $('code').value;
	$('runcode_form').submit();
}
</script>
<script type="text/javascript">Menuon(1);</script>
</body>
</html>