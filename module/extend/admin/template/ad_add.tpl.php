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
<input type="hidden" name="forward" value="<?php echo $forward;?>"/>
<input type="hidden" name="pid" value="<?php echo $p['pid'];?>"/>
<input type="hidden" name="ad[pid]" value="<?php echo $p['pid'];?>"/>
<input type="hidden" name="ad[typeid]" value="<?php echo $p['typeid'];?>"/>
<input type="hidden" name="ad[key_moduleid]" value="<?php echo $p['moduleid'];?>"/>
<div class="tt">��ӹ��</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl">���λ</td>
<td class="f_b">&nbsp;<?php echo $p['name'];?></td>
</tr>
<tr>
<td class="tl">�������</td>
<td class="f_gray">&nbsp;<?php echo $TYPE[$p['typeid']];?></td>
</tr>
<tr>
<td class="tl">������� <span class="f_red">*</span></td>
<td><input name="ad[title]" id="title" type="text" size="30" /> <span id="dtitle" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">������</td>
<td><input name="ad[introduce]" type="text" size="60" /></td>
</tr>
<?php if($p['typeid'] == 1) { ?>
<tr>
<td class="tl">������ <span class="f_red">*</span></td>
<td><textarea name="ad[code]" id="code" style="width:98%;height:150px;overflow:visible;font-family:Fixedsys,verdana;"></textarea><br/>
<input type="button" value=" ���д��� " class="btn" onclick="runcode();"/> <span id="dcode" class="f_red"></span>
</td>
</tr>
<tr>
<td class="tl">�ϴ��ļ�</td>
<td class="f_gray"><input type="text" size="60" id="upload"/>&nbsp;&nbsp;<span onclick="Dfile(<?php echo $moduleid;?>, $('upload').value, 'upload');" class="jt">[�ϴ�]</span>&nbsp;&nbsp;<span onclick="if($('upload').value) window.open($('upload').value);" class="jt">[Ԥ��]</span>&nbsp;&nbsp;<span onclick="$('upload').value='';" class="jt">[ɾ��]</span><?php tips('�������ϴ��ļ��󣬰ѵ�ַ���Ƶ������Ｔ��ʹ��');?></td>
</tr>
<?php } ?>
<?php if($p['typeid'] == 2) { ?>
<tr>
<td class="tl">�������� <span class="f_red">*</span></td>
<td class="f_gray"><input type="text" size="30" name="ad[text_name]" id="text_name"/> [֧��HTML�﷨] <span id="dtext_name" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">���ӵ�ַ <span class="f_red">*</span></td>
<td><input type="text" size="30" name="ad[text_url]" id="text_url"/> <span id="dtext_url" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">Title��ʾ</td>
<td><input type="text" size="30" name="ad[text_title]"/></td>
</tr>
<?php } ?>
<?php if($p['typeid'] == 3 || $p['typeid'] == 5) { ?>
<tr>
<td class="tl">ͼƬ��ַ <span class="f_red">*</span></td>
<td class="f_gray"><input type="text" size="60" name="ad[image_src]" id="thumb"/>&nbsp;&nbsp;<span onclick="Dthumb(<?php echo $moduleid;?>,<?php echo $p['width'];?>,<?php echo $p['height'];?>, $('thumb').value);" class="jt">[�ϴ�]</span>&nbsp;&nbsp;<span onclick="_preview($('thumb').value);" class="jt">[Ԥ��]</span>&nbsp;&nbsp;<span onclick="$('thumb').value='';" class="jt">[ɾ��]</span> <span id="dthumb" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">���ӵ�ַ</td>
<td><input type="text" size="30" name="ad[image_url]" id="image_url"/> <span id="dimage_url" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">����</td>
<td><input type="text" size="30" name="ad[image_alt]"/></td>
</tr>
<?php } ?>
<?php if($p['typeid'] == 4) { ?>
<tr>
<td class="tl">Flash��ַ <span class="f_red">*</span></td>
<td class="f_gray"><input type="text" size="60" name="ad[flash_src]" id="flash"/>&nbsp;&nbsp;<span onclick="Dfile(<?php echo $moduleid;?>, $('flash').value, 'flash');" class="jt">[�ϴ�]</span>&nbsp;&nbsp;<span onclick="if($('flash').value) window.open($('flash').value);" class="jt">[Ԥ��]</span>&nbsp;&nbsp;<span onclick="$('flash').value='';" class="jt">[ɾ��]</span> <span id="dflash" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">���ӵ�ַ</td>
<td><input type="text" size="30" name="ad[flash_url]"/></td>
</tr>
<?php } ?>
<?php if($p['typeid'] == 6) { ?>
<tr>
<td class="tl">����ģ��</td>
<td class="f_gray">&nbsp;<?php echo $MODULE[$p['moduleid']]['name'];?><?php tips('�����ҵ��ؼ���δ���ã������'.$MODULE[$p['moduleid']]['name'].'��ҳ�б�����');?>
</td>
</tr>
<tr>
<td class="tl">��������</td>
<td><?php echo ajax_category_select('ad[key_catid]', '��ѡ��', 0, $p['moduleid']);?><?php tips('���ѡ���������ҵ�б�����');?></td>
</tr>
<tr>
<td class="tl">�ؼ���</td>
<td><input type="text" size="30" name="ad[key_word]"/><?php tips('�����д������������������<br/>����������������10��������');?></td>
</tr>
<tr>
<td class="tl">��ϢID <span class="f_red">*</span></td>
<td><input type="text" size="10" name="ad[key_id]" id="key_id" onfocus="select_item(<?php echo $p['moduleid'];?>);"/> <a href="javascript:select_item(<?php echo $p['moduleid'];?>);" class="t">ѡ��..</a>  <span id="dkey_id" class="f_red"></span></td>
</tr>
<?php } ?>
<?php if($p['typeid'] == 7) { ?>
<tr>
<td class="tl">����ģ��</td>
<td class="f_gray">&nbsp;<?php echo $MODULE[$p['moduleid']]['name'];?><?php tips('�����ҵ��ؼ���δ���ã�����ʾ��'.$MODULE[$p['moduleid']]['name'].'��ҳ');?>
</td>
</tr>
<tr>
<td class="tl">��������</td>
<td><?php echo ajax_category_select('ad[key_catid]', '��ѡ��', 0, $p['moduleid']);?><?php tips('���ѡ������ʾ���б�ҳ');?></td>
</tr>
<tr>
<td class="tl">�ؼ���</td>
<td><input type="text" size="30" name="ad[key_word]"/><?php tips('�����д������ʾ���������<br/>����������������10��������');?></td>
</tr>
<tr>
<td class="tl">������ <span class="f_red">*</span></td>
<td><textarea name="ad[code]" id="code" style="width:98%;height:150px;overflow:visible;font-family:Fixedsys,verdana;"></textarea><br/>
<input type="button" value=" ���д��� " class="btn" onclick="runcode();"/> <span id="dcode" class="f_red"></span>
</td>
</tr>
<tr>
<td class="tl">�ϴ��ļ�</td>
<td class="f_gray"><input type="text" size="60" id="upload"/>&nbsp;&nbsp;<span onclick="Dfile(<?php echo $moduleid;?>, $('upload').value, 'upload');" class="jt">[�ϴ�]</span>&nbsp;&nbsp;<span onclick="if($('upload').value) window.open($('upload').value);" class="jt">[Ԥ��]</span>&nbsp;&nbsp;<span onclick="$('upload').value='';" class="jt">[ɾ��]</span><?php tips('�������ϴ��ļ��󣬰ѵ�ַ���Ƶ������Ｔ��ʹ��');?></td>
</tr>
<?php } ?>
<tr>
<td class="tl">Ͷ��ʱ�� <span class="f_red">*</span></td>
<td><?php echo dcalendar('ad[fromtime]', $fromtime);?> �� <?php echo dcalendar('ad[totime]');?>&nbsp;
<select onchange="$('adtotime').value=this.value;">
<option value="">���ѡ��</option>
<?php $FTIME = strtotime($fromtime);?>
<option value="<?php echo timetodate($FTIME+86400*7, 3);?>">һ��</option>
<option value="<?php echo timetodate($FTIME+86400*15, 3);?>">����</option>
<option value="<?php echo timetodate($FTIME+86400*30, 3);?>">һ��</option>
<option value="<?php echo timetodate($FTIME+86400*91, 3);?>">����</option>
<option value="<?php echo timetodate($FTIME+86400*182, 3);?>">����</option>
<option value="<?php echo timetodate($FTIME+86400*365, 3);?>">һ��</option>
<option value="<?php echo timetodate($FTIME+86400*365*2, 3);?>">����</option>
<option value="<?php echo timetodate($FTIME+86400*365*3, 3);?>">����</option>
</select>&nbsp;<span id="dtime" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">��Ա��</td>
<td><input name="ad[username]" type="text" size="20"/></td>
</tr>
<tr>
<td class="tl">��ע</td>
<td><input name="ad[note]" type="text" size="60" /></td>
</tr>
<tr style="display:<?php if($p['typeid'] < 2 || $p['typeid'] > 6) echo 'none';?>">
<td class="tl">���ͳ��</td>
<td>
<input type="radio" name="ad[stat]" value="1"/> ����&nbsp;&nbsp;&nbsp;
<input type="radio" name="ad[stat]" value="0" checked/> �ر�
</td>
</tr>
<tr>
<td class="tl">���״̬</td>
<td>
<input type="radio" name="ad[status]" value="3" checked/> ��ͨ��
<input type="radio" name="ad[status]" value="2"/> �����
</td>
</tr>
</table>
<div class="sbt"><input type="submit" name="submit" value=" ȷ �� " class="btn"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value=" �� �� " class="btn" onclick="history.back(-1);"/></div>
</form>
<?php load('clear.js'); ?>
<script type="text/javascript">
function check() {
	var l;
	var f;
	var t = <?php echo $p['typeid'];?>;
	f = 'title';
	l = $(f).value.length;
	if(l < 1) {
		Dmsg('����д�������', f);
		return false;
	}
	if($('adfromtime').value.length != 10 || $('adtotime').value.length != 10) {
		Dmsg('����дͶ��ʱ��', 'time');
		return false;
	}
	if(t == 1 || t == 7) {
		f = 'code';
		l = $(f).value.length;
		if(l < 5) {
			Dmsg('����д������', f);
			return false;
		}
	} else if(t == 2) {
		f = 'text_name';
		l = $(f).value.length;
		if(l < 2) {
			Dmsg('����д��������', f);
			return false;
		}
		f = 'text_url';
		l = $(f).value.length;
		if(l < 12) {
			Dmsg('����д���ӵ�ַ', f);
			return false;
		}
	} else if(t == 3 || t == 5) {
		f = 'thumb';
		l = $(f).value.length;
		if(l < 2) {
			Dmsg('����дͼƬ��ַ', f);
			return false;
		}
		if(t == 5 && ext($(f).value) != 'jpg') {
			Dmsg('��֧��JPG��ʽͼƬ', f);
			return false;
		}
	} else if(t == 4) {
		f = 'flash';
		l = $(f).value.length;
		if(l < 5) {
			Dmsg('����дFlash��ַ', f);
			return false;
		}
	} else if(t == 6) {
		f = 'key_id';
		l = $(f).value.length;
		if(l < 1) {
			Dmsg('����д��ϢID', f);
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
<script type="text/javascript">Menuon(2);</script>
</body>
</html>