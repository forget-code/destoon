<?php
defined('IN_DESTOON') or exit('Access Denied');
include tpl('header');
show_menu($menus);
load('profile.js');
?>
<div class="tt">��Ա�����޸�</div>
<form method="post" action="?" onsubmit="return Dcheck();" id="dform">
<input type="hidden" name="moduleid" value="<?php echo $moduleid;?>"/>
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="userid" value="<?php echo $userid;?>"/>
<input type="hidden" name="username" value="<?php echo $username;?>"/>
<input type="hidden" name="gid" value="<?php echo $groupid;?>"/>
<input type="hidden" name="forward" value="<?php echo $forward;?>"/>
<input type="hidden" name="member[regid]" value="<?php echo $regid;?>"/>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl">��Ա��¼��</td>
<td><strong><?php echo $username;?></strong></td>
</tr>

<tr>
<td class="tl">ͨ��֤���� <span class="f_red">*</span></td>
<td><input type="text" size="30" name="member[passport]" id="passport" value="<?php echo $passport;?>"/>&nbsp;<span id="dpassport" class="f_red"></span></td>
</tr>

<tr>
<td class="tl">��Ա�� <span class="f_red">*</span></td>
<td><?php echo group_select('member[groupid]', '��Ա��', $groupid, 'id="groupid"');?>&nbsp;<span id="dgroupid" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">��¼����</td>
<td><input type="password" size="20" name="member[password]" id="password" onblur="validator('password');"/>&nbsp;<span id="dpassword" class="f_red"></span> <span class="f_gray">�粻����,������</span></td>
</tr>
<tr>
<td class="tl">�ظ���������</td>
<td><input type="password" size="20" name="member[cpassword]" id="cpassword"/>&nbsp;<span id="cpassword" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">֧������</td>
<td><input type="password" size="20" name="member[payword]" id="payword" onblur="validator('payword');"/>&nbsp;<span id="dpayword" class="f_red"></span> <span class="f_gray">�粻����,������</span></td>
</tr>
<tr>
<td class="tl">�ظ�֧������</td>
<td><input type="password" size="20" name="member[cpayword]" id="cpassword"/>&nbsp;<span id="cpayword" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">Email <span class="f_red">*</span></td>
<td><input type="text" size="30" name="member[email]" id="email" value="<?php echo $email;?>" onblur="validator('email');"/>&nbsp;<a href="#vv"><img src="<?php echo $MOD['linkurl'];?>image/<?php echo $vemail ? 'v' : 'u';?>_email.gif" width="16" height="16" title="<?php echo $vemail ? '��ͨ��' : 'δͨ��';?>�ʼ���֤" align="absmiddle"/></a>&nbsp;<span id="demail" class="f_red"></span> <span class="f_gray">[������]</span></td>
</tr>
<tr>
<td class="tl">��ʵ���� <span class="f_red">*</span></td>
<td><input type="text" size="10" name="member[truename]" id="truename" value="<?php echo $truename;?>"/>&nbsp;<a href="#vv"><img src="<?php echo $MOD['linkurl'];?>image/<?php echo $vtruename ? 'v' : 'u';?>_truename.gif" width="16" height="16" title="<?php echo $vtruename ? '��ͨ��' : 'δͨ��';?>ʵ����֤" align="absmiddle"/></a></td>
</tr>
<tr>
<td class="tl">���ڵ��� <span class="f_red">*</span></td>
<td><?php echo ajax_area_select('member[areaid]', '��ѡ��', $areaid);?>&nbsp;<span id="dareaid" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">�Ա� <span class="f_red">*</span></td>
<td>
<input type="radio" name="member[gender]" value="1" <?php if($gender == 1) echo 'checked="checked"';?>/> ����
<input type="radio" name="member[gender]" value="2" <?php if($gender == 2) echo 'checked="checked"';?>/> Ůʿ
</td>
</tr>
<tr>
<td class="tl">����</td>
<td><input type="text" size="20" name="member[department]" id="department" value="<?php echo $department;?>"/></td>
</tr>
<tr>
<td class="tl">ְλ</td>
<td><input type="text" size="20" name="member[career]" id="career" value="<?php echo $career;?>"/></td>
</tr>
<tr>
<td class="tl">�ֻ�����</td>
<td><input type="text" size="20" name="member[mobile]" id="mobile" value="<?php echo $mobile;?>"/>&nbsp;<a href="#vv"><img src="<?php echo $MOD['linkurl'];?>image/<?php echo $vmobile ? 'v' : 'u';?>_mobile.gif" width="16" height="16" title="<?php echo $vmobile ? '��ͨ��' : 'δͨ��';?>�ֻ���֤" align="absmiddle"/></a></td>
</tr>
<tr>
<td class="tl">QQ</td>
<td><input type="text" size="20" name="member[qq]" id="qq" value="<?php echo $qq;?>"/></td>
</tr>
<tr>
<td class="tl">��������</td>
<td><input type="text" size="20" name="member[ali]" id="ali" value="<?php echo $ali;?>"/></td>
</tr>
<tr>
<td class="tl">MSN</td>
<td><input type="text" size="30" name="member[msn]" id="msn" value="<?php echo $msn;?>"/></td>
</tr>
<tr>
<td class="tl">Skype</td>
<td><input type="text" size="20" name="member[skype]" id="skype" value="<?php echo $skype;?>"/></td>
</tr>
<tr>
<td class="tl">�տ�����</td>
<td>
<select name="bank">
<option value="">�տʽ</option>
<?php foreach($BANKS as $v) { ?>
<option value="<?php echo $v;?>" <?php if($bank == $v) { ?>selected<?php } ?>><?php echo $v;?></option>;
<?php } ?>
</select>
</td>
</tr>
<tr>
<td class="tl">�տ��ʺ�</td>
<td><input type="text" size="30" name="member[account]" id="account" value="<?php echo $account;?>"/>&nbsp;<a href="#vv"><img src="<?php echo $MOD['linkurl'];?>image/<?php echo $vbank ? 'v' : 'u';?>_bank.gif" width="16" height="16" title="<?php echo $vbank ? '��ͨ��' : 'δͨ��';?>�����ʺ���֤" align="absmiddle"/></a></td>
</tr>
<?php echo $MFD ? fields_html('<td class="tl">', '<td>', $user, $MFD) : '';?>
</table>
<div class="tt">��˾����</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl">��˾���� <span class="f_red">*</span></td>
<td><input type="text" size="60" name="member[company]" id="company" value="<?php echo $company;?>" onblur="validator('company');"/>&nbsp;<a href="#vv"><img src="<?php echo $MOD['linkurl'];?>image/<?php echo $vcompany ? 'v' : 'u';?>_company.gif" width="16" height="16" title="<?php echo $vcompany ? '��ͨ��' : 'δͨ��';?>������֤" align="absmiddle"/></a></td>
</tr>
<tr>
<td class="tl">��˾���� <span class="f_red">*</span></td>
<td><?php echo dselect($COM_TYPE, 'member[type]', '��ѡ��', $type, 'id="type"', 0);?>&nbsp;<span id="dtype" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">����ͼƬ</td>
<td><input name="member[thumb]" type="text" size="60" id="thumb" value="<?php echo $thumb;?>"/>&nbsp;&nbsp;<span onclick="Dthumb(<?php echo $moduleid;?>,<?php echo $MOD['thumb_width'];?>,<?php echo $MOD['thumb_height'];?>, $('thumb').value);" class="jt">[�ϴ�]</span>&nbsp;&nbsp;<span onclick="_preview($('thumb').value);" class="jt">[Ԥ��]</span>&nbsp;&nbsp;<span onclick="$('thumb').value='';" class="jt">[ɾ��]</span><br/>
<span class="f_gray">����ʹ��LOGO���칫�����ȱ�־��ͼƬ����Ѵ�СΪ<?php echo $MOD['thumb_width'];?>px*<?php echo $MOD['thumb_height'];?>px</span></td>
</tr>
<tr>
<td class="tl">��Ӫ��ҵ <span class="f_red">*</span></td>
<td>
<div id="catesch"></div><div id="cate"><?php echo ajax_category_select('', '', 0, 4, 'size="2" style="height:80px;width:160px;"');?></div>
<input type="button" value=" ��ӡ� " class="btn" onclick="addcate(<?php echo $MOD['cate_max'];?>);"/>
<input type="button" value=" ��ɾ�� " class="btn" onclick="delcate();"/>
<?php if($DT['schcate_limit']) { ?><input type="button" class="btn" value=" ���� " onclick="schcate(4);"/><?php } ?>
&nbsp;������� <strong class="f_red"><?php echo $MOD['cate_max'];?></strong> ����Ӫ��ҵ
<br/><select name="cates" id="cates" size="2" style="height:100px;width:380px;margin-top:5px;">
<?php if(is_array($cates)) { foreach($cates as $c) { ?>
<option value="<?php echo $c;?>"><?php echo strip_tags(cat_pos($c, '/'));?></option>
<?php } } ?>
</select>
<input type="hidden" name="member[catid]" value="<?php echo $catid;?>" id="catid"/><br/>
<span id="dcatid" class="f_red"></span>
</td>
</tr>
<tr>
<td class="tl">��Ҫ��Ӫ��Χ <span class="f_red">*</span></td>
<td><input type="text" size="80" name="member[business]" id="business" value="<?php echo $business;?>"/>&nbsp;<span id="dbusiness" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">��Ӫģʽ</td>
<td>
<span id="com_mode"><?php echo dcheckbox($COM_MODE, 'member[mode][]', $mode, 'onclick="check_mode(this,'.$MOD['mode_max'].');"', 0);?></span> <span class="f_gray">(����ѡ<?php echo $MOD['mode_max'];?>��)</span></td>
</tr>
<tr>
<td class="tl">��˾��ģ</td>
<td><?php echo dselect($COM_SIZE, 'member[size]', '��ѡ���ģ', $size, '', 0);?></td>
</tr>
<tr>
<td class="tl">ע���ʱ�</td>
<td><?php echo dselect($MONEY_UNIT, 'member[regunit]', '', $regunit, '', 0);?> <input type="text" size="6" name="member[capital]" id="capital" value="<?php echo $capital;?>"/> ��</td>
</tr>
<tr>
<td class="tl">��˾������� <span class="f_red">*</span></td>
<td><input type="text" size="15" name="member[regyear]" id="regyear" value="<?php echo $regyear;?>"/>&nbsp;<span id="dregyear" class="f_red"></span> <span class="f_gray">(��ݣ��磺2004)</span></td>
</tr>
<tr>
<td class="tl">��Ҫ��Ӫ�ص� <span class="f_red">*</span></td>
<td><input type="text" size="60" name="member[address]" id="address" value="<?php echo $address;?>"/>&nbsp;<span id="daddress" class="f_red"></span></td>
</tr>

<tr>
<td class="tl">��������</td>
<td><input type="text" size="8" name="member[postcode]" id="postcode" value="<?php echo $postcode;?>"/></td>
</tr>

<tr>
<td class="tl">��˾�绰 <span class="f_red">*</span></td>
<td><input type="text" size="20" name="member[telephone]" id="telephone" value="<?php echo $telephone;?>"/>&nbsp;<span id="dtelephone" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">��˾����</td>
<td><input type="text" size="20" name="member[fax]" id="fax" value="<?php echo $fax;?>"/></td>
</tr><tr>
<td class="tl">��˾Email</td>
<td><input type="text" size="30" name="member[mail]" id="mail" value="<?php echo $mail;?>"/> <span class="f_gray">[����]</span></td>
</tr>
<tr>
<td class="tl">��˾��ַ</td>
<td><input type="text" size="30" name="member[homepage]" id="homepage" value="<?php echo $homepage;?>"/></td>
</tr>
<tr>
<td class="tl">���۵Ĳ�Ʒ(�ṩ�ķ���)</td>
<td><input type="text" size="50" name="member[sell]" id="sell" value="<?php echo $sell;?>"/> <span class="f_gray">�����Ʒ���������'|'�Ÿ���</span></td>
</tr>
<tr>
<td class="tl">�ɹ��Ĳ�Ʒ(��Ҫ�ķ���)</td>
<td><input type="text" size="50" name="member[buy]" id="buy" value="<?php echo $buy;?>"/> <span class="f_gray">�����Ʒ���������'|'�Ÿ���</span></td>
</tr>
<tr>
<td class="tl">��˾���� <span class="f_red">*</span></td>
<td><textarea name="member[introduce]" id="introduce" class="dsn"><?php echo $introduce;?></textarea>
<?php echo deditor($moduleid, 'introduce', $MOD['editor'], '95%', 300);?><br/><span id="dintroduce" class="f_red"></span></td>
</tr>
<?php echo $CFD ? fields_html('<td class="tl">', '<td>', $user, $CFD) : '';?>
</table>
<div class="tt">������֤</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl">��ҵ�����Ƿ�ͨ����֤</td>
<td>
<input type="radio" name="member[validated]" value="1" <?php if($validated) echo 'checked';?>/> ��&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="member[validated]" value="0" <?php if(!$validated) echo 'checked';?>/> ��
<?php tips('һ���ɵ�������֤��������վ�Ի�Ա�������ϵ���֤');?><a name="vv"></a>
</td>
</tr>
<tr>
<td class="tl">��֤���ƻ����</td>
<td><input type="text" name="member[validator]" size="30" value="<?php echo $validator;?>"/></td>
</tr>
<tr>
<td class="tl">��֤����</td>
<td><?php echo dcalendar('member[validtime]', $validtime);?></td>
</tr>
<tr>
<td class="tl">�ʼ���֤</td>
<td>
<input type="radio" name="member[vemail]" value="1" <?php if($vemail) echo 'checked';?>/> ��&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="member[vemail]" value="0" <?php if(!$vemail) echo 'checked';?>/> ��
<?php tips('�����ʼ����ͺ󣬴����ɻ�Ա������֤');?>
</td>
</tr>
<tr>
<td class="tl">�ֻ���֤</td>
<td>
<input type="radio" name="member[vmobile]" value="1" <?php if($vmobile) echo 'checked';?>/> ��&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="member[vmobile]" value="0" <?php if(!$vmobile) echo 'checked';?>/> ��
<?php tips('�������ŷ��ͺ󣬴����ɻ�Ա������֤');?>
</td>
</tr>
<tr>
<td class="tl">������֤</td>
<td>
<input type="radio" name="member[vbank]" value="1" <?php if($vbank) echo 'checked';?>/> ��&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="member[vbank]" value="0" <?php if(!$vbank) echo 'checked';?>/> ��
<?php tips('һ���ڻ�Ա����֮������վ���и�����֤����֤֮���Ա���տ���Ϣ�������޸�');?>
</td>
</tr>
<tr>
<td class="tl">ʵ����֤</td>
<td>
<input type="radio" name="member[vtruename]" value="1" <?php if($vtruename) echo 'checked';?>/> ��&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="member[vtruename]" value="0" <?php if(!$vtruename) echo 'checked';?>/> ��
<?php tips('һ���ɻ�Ա�����ύ���֤������֤�������ĵ������������վ������֤');?>
</td>
</tr>
<tr>
<td class="tl">��˾��֤</td>
<td>
<input type="radio" name="member[vcompany]" value="1" <?php if($vcompany) echo 'checked';?>/> ��&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="member[vcompany]" value="0" <?php if(!$vcompany) echo 'checked';?>/> ��
<?php tips('һ���ɻ�Ա�����ύӪҵִ�ա���֯��������֤�ȵ����ĵ������������վ������֤');?>
</td>
</tr>
</table>
<div class="tt">�߼�����</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl">��ҳ���Ŀ¼ </td>
<td><input type="text" size="20" name="member[skin]" value="<?php echo $skin;?>"/></td>
</tr>
<tr>
<td class="tl">��ҳģ��Ŀ¼ </td>
<td><input type="text" size="20" name="member[template]" value="<?php echo $template;?>"/></td>
</tr>
<tr>
<td class="tl">������ </td>
<td><input type="text" size="30" name="member[domain]" id="domain" value="<?php echo $domain;?>"/><?php tips('���� www.destoon.com ����http<br/>ͬʱ��Ҫ��Ա��������IPָ��վ������');?></td>
</tr>
<tr>
<td class="tl">����ICP������ </td>
<td><input type="text" size="30" name="member[icp]" id="icp" value="<?php echo $icp;?>"/></td>
</tr>
<tr>
<td class="tl">Flash��� </td>
<td class="f_gray"><input type="text" size="60" name="member[banner]" id="flash" value="<?php echo $banner;?>"/>&nbsp;&nbsp;<span onclick="Dfile(<?php echo $moduleid;?>, $('flash').value, 'flash');" class="jt">[�ϴ�]</span>&nbsp;&nbsp;<span onclick="if($('flash').value) window.open($('flash').value);" class="jt">[Ԥ��]</span>&nbsp;&nbsp;<span onclick="$('flash').value='';" class="jt">[ɾ��]</span> <span id="dflash" class="f_red"></span><?php tips('���ڰ�ȫԭ��ϵͳ��ֹ��Աֱ���ϴ�Flash���<br/>����Ա���Դ��������Ա�ϴ�<br/>�ϴ�����ʾ�ڻ�Ա��ҳ���ͼƬλ��');?></td>
</tr>
<tr>
<td class="tl">վ���ź����� </td>
<td><input type="text" size="60" name="member[black]" id="black" value="<?php echo $black;?>"/></td>
</tr>
<tr>
<td class="tl">��Ա�����Ƿ�����</td>
<td>
<input type="radio" name="member[edittime]" value="1"<?php if($edittime) echo ' checked';?>/> ��&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="member[edittime]" value="0"<?php if(!$edittime) echo ' checked';?>/> ��&nbsp;&nbsp;
<span class="f_gray">���ѡ���ǣ�ϵͳ��������ʾ��Ա��������</span>
</td>
</tr>
</table>
<div class="sbt"><input type="submit" name="submit" value=" ȷ �� " class="btn">&nbsp;&nbsp;<input type="button" value=" ǰ ̨ " class="btn" onclick="window.open('?moduleid=<?php echo $moduleid;?>&action=login&userid=<?php echo $userid;?>');"/>&nbsp;&nbsp;<input type="button" value=" �� �� " class="btn" onclick="history.back(-1);"/></div>
</form>
<?php load('clear.js'); ?>
<script type="text/javascript">
var vid = '';
function validator(id) {
	if(!$(id).value) return false;
	vid = id;
	makeRequest('moduleid=<?php echo $moduleid;?>&action=member&job='+id+'&value='+$(id).value+'&userid=<?php echo $userid;?>', AJPath, 'dvalidator')
}
function dvalidator() {    
	if(xmlHttp.readyState==4 && xmlHttp.status==200) {
		$('d'+vid).innerHTML = xmlHttp.responseText ? xmlHttp.responseText : '';
	}
}
function Dcheck() {
	if($('groupid').value == 0) {
		Dmsg('��ѡ���Ա��', 'groupid');
		return false;
	}
	if($('password').value != '') {
		if($('cpassword').value == '') {
			Dmsg('���ظ���������', 'cpassword');
			return false;
		}
		if($('password').value != $('cpassword').value) {
			Dmsg('������������벻һ��', 'password');
			return false;
		}
	}
	if($('passport').value == '') {
		Dmsg('����дͨ��֤', 'passport');
		return false;
	}
	if($('email').value == '') {
		Dmsg('����д��������', 'email');
		return false;
	}
	if($('truename').value == '') {
		Dmsg('����д��ʵ����', 'truename');
		return false;
	}
	if($('areaid_1').value == 0) {
		Dmsg('��ѡ�����ڵ�', 'areaid');
		return false;
	}
	<?php echo $MFD ? fields_js($MFD) : '';?>
	<?php if($groupid > 5) { ?>
	<?php echo $CFD ? fields_js($CFD) : '';?>
	if($('company').value == '') {
		Dmsg('����д��˾����', 'company');
		return false;
	}
	if($('type').value == '') {
		Dmsg('��ѡ��˾����', 'type');
		return false;
	}
	if($('catid').value.length < 2) {
		Dmsg('��ѡ��˾��Ӫ��ҵ', 'catid');
		return false;
	}
	if($('business').value.length < 2) {
		Dmsg('����д��Ҫ��Ӫ��Χ', 'business');
		return false;
	}
	if($('regyear').value.length < 4) {
		Dmsg('����д��˾�������', 'regyear');
		return false;
	}
	if($('address').value.length < 2) {
		Dmsg('����дҵ���Ź����ص�', 'address');
		return false;
	}
	if($('telephone').value.length < 6) {
		Dmsg('����д��˾�绰', 'telephone');
		return false;
	}
	if(FCKLen('introduce') < 5) {
		Dmsg('��˾���ܲ�������5�֣���ǰ�Ѿ�����'+FCKLen('introduce')+'��', 'introduce');
		return false;
	}
	<?php } ?>
	return true;
}
</script>
<script type="text/javascript">Menuon(1);</script>
</body>
</html>