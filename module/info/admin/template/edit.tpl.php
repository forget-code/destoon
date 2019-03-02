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
<div class="tt"><?php echo $tname;?></div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl">�������� <span class="f_red">*</span></td>
<td><?php echo category_select('post[catid]', 'ѡ�����', $catid, $moduleid);?>&nbsp;&nbsp;<input type="checkbox" name="post[islink]" value="1" id="islink" onclick="_islink();" <?php if($islink) echo 'checked';?>/> �ⲿ���� <span id="dcatid" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"><?php echo $MOD['name'];?>���� <span class="f_red">*</span></td>
<td><input name="post[title]" type="text" id="title" size="60" value="<?php echo $title;?>"/> <?php echo level_select('post[level]', '����', $level);?> <?php echo dstyle('post[style]', $style);?> <br/><span id="dtitle" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">����ͼƬ</td>
<td><input name="post[thumb]" id="thumb" type="text" size="60" value="<?php echo $thumb;?>"/>&nbsp;&nbsp;<span onclick="Dthumb(<?php echo $moduleid;?>,<?php echo $MOD['thumb_width'];?>,<?php echo $MOD['thumb_height'];?>, $('thumb').value);" class="jt">[�ϴ�]</span>&nbsp;&nbsp;<span onclick="_preview($('thumb').value);" class="jt">[Ԥ��]</span>&nbsp;&nbsp;<span onclick="$('thumb').value='';" class="jt">[ɾ��]</span></td>
</tr>
<tr>
<td class="tl">����ʱ��</td>
<td><?php echo dcalendar('post[totime]', $totime);?>&nbsp;
<select onchange="$('posttotime').value=this.value;">
<option value="">���ѡ��</option>
<option value="">������Ч</option>
<option value="<?php echo timetodate($DT_TIME+86400*3, 3);?>">3��</option>
<option value="<?php echo timetodate($DT_TIME+86400*7, 3);?>">һ��</option>
<option value="<?php echo timetodate($DT_TIME+86400*15, 3);?>">����</option>
<option value="<?php echo timetodate($DT_TIME+86400*30, 3);?>">һ��</option>
<option value="<?php echo timetodate($DT_TIME+86400*182, 3);?>">����</option>
<option value="<?php echo timetodate($DT_TIME+86400*365, 3);?>">һ��</option>
</select>&nbsp;
<span id="dposttotime" class="f_red"></span> ��ѡ��ʾ������Ч</td>
</tr>
<?php echo $FD ? fields_html('<td class="tl">', '<td>', $item) : '';?>
<tr id="link" style="display:<?php echo $islink ? '' : 'none';?>;">
<td class="tl">���ӵ�ַ <span class="f_red">*</span></td>
<td><input name="post[linkurl]" type="text" id="linkurl" size="50" value="<?php echo $linkurl;?>"/> <span id="dlinkurl" class="f_red"></span></td>
</tr>
<tbody id="basic" style="display:<?php echo $islink ? 'none' : '';?>;">
<tr>
<td class="tl">��ϸ˵�� <span class="f_red">*</span></td>
<td><textarea name="post[content]" id="content" class="dsn"><?php echo $content;?></textarea>
<?php echo deditor($moduleid, 'content', $MOD['editor'], '98%', 350);?><span id="dcontent" class="f_red"></span>
</td>
</tr>
<tr>
<td class="tl" height="30">����ѡ��</td>
<td><input type="checkbox" name="post[save_remotepic]" value="1"<?php if($MOD['save_remotepic']) echo 'checked';?>/>����Զ��ͼƬ&nbsp;&nbsp;
<input type="checkbox" name="post[clear_link]" value="1"<?php if($MOD['clear_link']) echo 'checked';?>/>�������&nbsp;&nbsp;
�������ݵ� <input name="post[thumb_no]" type="text" size="2" value=""/> ��ͼƬΪ����ͼ
</td>
</tr>
</tbody>
<tr>
<td class="tl">��Ա��Ϣ</td>
<td>
<input type="radio" name="ismember" value="1" <?php if($username) echo 'checked';?> onclick="Dh('d_guest');Ds('d_member');$('username').value='<?php echo $username;?>';" id="ismember_1"/><label for="ismember_1"> ��</label>&nbsp;&nbsp;&nbsp;
<input type="radio" name="ismember" value="0" <?php if(!$username) echo 'checked';?> onclick="Dh('d_member');Ds('d_guest');$('username').value='';" id="ismember_0"/><label for="ismember_0"> ��</label>
</td>
</tr>
<tbody id="d_member" style="display:<?php echo $username ? '' : 'none';?>">
<tr>
<td class="tl">��Ա�� <span class="f_red">*</span></td>
<td><input name="post[username]" type="text"  size="20" value="<?php echo $username;?>" id="username"/> <a href="javascript:_user($('username').value);" class="t">[����]</a> <span id="dusername" class="f_red"></span></td>
</tr>
</tbody>
<tbody id="d_guest" style="display:<?php echo $username ? 'none' : '';?>">
<tr>
<td class="tl">��˾���� <span class="f_red">*</span></td>
<td class="tr"><input name="post[company]" type="text" id="company" size="50" value="<?php echo $company;?>" /> �������� ����(����) ���磺����(����)<br/><span id="dcompany" class="f_red"></span> </td>
</tr>
<tr>
<td class="tl">���ڵ��� <span class="f_red">*</span></td>
<td class="tr"><?php echo ajax_area_select('post[areaid]', '��ѡ��', $areaid);?> <span id="dareaid" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">��ϵ�� <span class="f_red">*</span></td>
<td class="tr"><input name="post[truename]" type="text" id="truename" size="20" value="<?php echo $truename;?>" /> <span id="dtruename" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">��ϵ�ֻ� <span class="f_red">*</span></td>
<td class="tr"><input name="post[mobile]" id="mobile" type="text" size="30" value="<?php echo $mobile;?>"/> <span id="dmobile" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">�����ʼ�</td>
<td class="tr"><input name="post[email]" id="email" type="text" size="30" value="<?php echo $email;?>" /> <span id="demail" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">��ϵ�绰</td>
<td class="tr"><input name="post[telephone]" id="telephone" type="text" size="30" value="<?php echo $telephone;?>"/> <span id="dtelephone" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">��ϵ��ַ</td>
<td class="tr"><input name="post[address]" type="text" size="60" value="<?php echo $address;?>"/></td>
</tr>
<?php if($DT['im_qq']) { ?>
<tr>
<td class="tl">QQ</td>
<td class="tr"><input name="post[qq]" type="text" size="30" value="<?php echo $qq;?>"/></td>
</tr>
<?php } ?>
<?php if($DT['im_ali']) { ?>
<tr>
<td class="tl">��������</td>
<td class="tr"><input name="post[ali]" type="text" size="30" value="<?php echo $ali;?>"/></td>
</tr>
<?php } ?>
<?php if($DT['im_msn']) { ?>
<tr>
<td class="tl">MSN</td>
<td class="tr"><input name="post[msn]" type="text" size="30" value="<?php echo $msn;?>"/></td>
</tr>
<?php } ?>
<?php if($DT['im_skype']) { ?>
<tr>
<td class="tl">Skype</td>
<td class="tr"><input name="post[skype]" type="text" size="30" value="<?php echo $skype;?>"/></td>
</tr>
<?php } ?>
</tbody>
<tr>
<td class="tl"><?php echo $MOD['name'];?>״̬</td>
<td>
<input type="radio" name="post[status]" value="3" <?php if($status == 3) echo 'checked';?>/> ͨ��
<input type="radio" name="post[status]" value="2" <?php if($status == 2) echo 'checked';?>/> ����
<input type="radio" name="post[status]" value="1" <?php if($status == 1) echo 'checked';?> onclick="if(this.checked) $('note').style.display='';"/> �ܾ�
<input type="radio" name="post[status]" value="4" <?php if($status == 4) echo 'checked';?>/> ����
<input type="radio" name="post[status]" value="0" <?php if($status == 0) echo 'checked';?>/> ɾ��
</td>
</tr>
<tr id="note" style="display:<?php echo $status==1 ? '' : 'none';?>">
<td class="tl">�ܾ����� <span class="f_red">*</span></td>
<td><input name="post[note]" type="text"  size="40" value="<?php echo $note;?>"/></td>
</tr>
<tr>
<td class="tl">���ʱ��</td>
<td><input type="text" size="22" name="post[addtime]" value="<?php echo $addtime;?>"/></td>
</tr>
<tr>
<td class="tl">�������</td>
<td><input name="post[hits]" type="text" size="10" value="<?php echo $hits;?>"/></td>
</tr>
<tr>
<td class="tl">�����շ�</td>
<td><input name="post[fee]" type="text" size="5" value="<?php echo $fee;?>"/><?php tips('�������0��ʾ�̳�ģ�����ü۸�-1��ʾ���շ�<br/>����0�����ֱ�ʾ�����շѼ۸�');?>
</td>
</tr>
<tr>
<td class="tl">����ģ��</td>
<td><?php echo tpl_select('show', $module, 'post[template]', 'Ĭ��ģ��', $template, 'id="template"');?><?php tips('���û��������Ҫ��һ�㲻��Ҫѡ��<br/>ϵͳ���Զ��̳з����ģ������');?></td>
</tr>
<?php if($MOD['show_html']) { ?>
<tr>
<td class="tl">�Զ����ļ�·��</td>
<td><input type="text" size="50" name="post[filepath]" value="<?php echo $filepath;?>" id="filepath"/>&nbsp;<input type="button" value="�������" onclick="ckpath(<?php echo $moduleid;?>, <?php echo $itemid;?>);" class="btn"/>&nbsp;<?php tips('���԰���Ŀ¼���ļ� ���� destoon/b2b.html<br/>��ȷ��Ŀ¼���ļ����Ϸ��ҿ�д�룬�����������ʧ��');?>&nbsp; <span id="dfilepath" class="f_red"></span></td>
</tr>
<?php } ?>
</table>
<div class="sbt"><input type="submit" name="submit" value=" ȷ �� " class="btn"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" name="reset" value=" �� �� " class="btn"/></div>
</form>
<?php load('clear.js'); ?>
<?php if($action == 'add') { ?>
<form method="post" action="?">
<input type="hidden" name="moduleid" value="<?php echo $moduleid;?>"/>
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<div class="tt">��ҳ�ɱ�</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl">Ŀ����ַ</td>
<td><input name="url" type="text" size="80" value="<?php echo $url;?>"/>&nbsp;&nbsp;<input type="submit" value=" �� ȡ " class="btn"/>&nbsp;&nbsp;<input type="button" value=" ������� " class="btn" onclick="window.open('?file=fetch');"/></td>
</tr>
</table>
</form>
<?php } ?>
<script type="text/javascript">
function check() {
	var l;
	var f;
	f = 'catid_1';
	if($(f).value == 0) {
		Dmsg('��ѡ����������', 'catid', 1);
		return false;
	}
	f = 'title';
	l = $(f).value.length;
	if(l < 5) {
		Dmsg('��������5�֣���ǰ������'+l+'��', f);
		return false;
	}
	if($('islink').checked) {
		f = 'linkurl';
		l = $(f).value.length;
		if(l < 12) {
			Dmsg('��������ȷ�����ӵ�ַ', f);
			return false;
		}
	} else {
		f = 'content';
		l = FCKLen();
		if(l < 15) {
			Dmsg('��������15�֣���ǰ������'+l+'��', f);
			return false;
		}
	}
	if($('ismember_1').checked) {
		f = 'username';
		l = $(f).value.length;
		if(l < 2) {
			Dmsg('����д��Ա��', f);
			return false;
		}
	} else {
		f = 'company';
		l = $(f).value.length;
		if(l < 2) {
			Dmsg('����д��˾����', f);
			return false;
		}
		if($('areaid_1').value == 0) {
			Dmsg('��ѡ�����ڵ���', 'areaid', 1);
			return false;
		}
		f = 'truename';
		l = $(f).value.length;
		if(l < 2) {
			Dmsg('����д��ϵ��', f);
			return false;
		}
		f = 'mobile';
		l = $(f).value.length;
		if(l < 7) {
			Dmsg('����д�ֻ�', f);
			return false;
		}
	}
	<?php echo $FD ? fields_js() : '';?>
	return true;
}
</script>
<script type="text/javascript">Menuon(<?php echo $menuid;?>);</script>
</body>
</html>