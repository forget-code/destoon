<?php
defined('IN_DESTOON') or exit('Access Denied');
include tpl('header');
if(isset($dialog)) {
?>
<script type="text/javascript">
var new_top = Number(parent.$('Dtop').style.top.replace('px', ''));
if(new_top > 100) new_top -= 50;
try{parent.$('Dtop').style.top=new_top+'px';}catch(e){}
</script>
<?php
} else {
	show_menu($menus);
}
?>
<div class="tt">��Ա����</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl">��ԱID</td>
<td>&nbsp;<?php echo $userid;?>&nbsp;&nbsp;
<a href="?moduleid=2&file=message&action=send&touser=<?php echo $username;?>" target="_blank"><img width="16" height="16" src="<?php echo DT_SKIN;?>image/msg.gif" title="����վ����" align="absmiddle"/></a>
<a href="?moduleid=2&file=sendmail&email=<?php echo $email;?>" target="_blank"><img width="16" height="16" src="<?php echo DT_SKIN;?>image/email.gif" title="����Email <?php echo $email;?>" align="absmiddle"/></a> 
<?php if($mobile) { ?><a href="?moduleid=2&file=sms&mobile=<?php echo $mobile;?>" target="_blank"><img src="<?php echo DT_SKIN;?>image/mobile.gif" title="���Ͷ���" align="absmiddle"/></a> <?php } ?>
<?php echo im_qq($qq);?>  
<?php echo im_ali($ali);?> 
<?php echo im_msn($msn);?> 
<?php echo im_skype($skype);?> 
<a href="<?php echo $linkurl;?>" target="_blank"><img width="16" height="16" src="<?php echo DT_SKIN;?>image/homepage.gif" title="��˾��ҳ" align="absmiddle"/></a> 
</td>
<td class="tl">��Ա��</td>
<td>&nbsp;<?php echo $GROUP[$groupid]['groupname'];?></td>
</tr>
<tr>
<td class="tl">��Ա��</td>
<td>&nbsp;<a href="<?php echo $linkurl;?>" target="_blank"><?php echo $username;?></a>
<a href="?moduleid=<?php echo $moduleid;?>&action=login&userid=<?php echo $userid;?>" class="t" target="_blank">[��Ա����]</a>

</td>
<td class="tl">ͨ��֤��</td>
<td>&nbsp;<?php echo $passport;?></td>
</tr>
<tr>
<td class="tl">�� ��</td>
<td>&nbsp;<?php echo $truename;?></td>
<td class="tl">�� ��</td>
<td>&nbsp;<?php echo $gender == 1 ? '����' : 'Ůʿ';?></td>
</tr>
<tr>
<td class="tl"><?php echo VIP;?>ָ��</td>
<td>&nbsp;<img src="<?php echo DT_SKIN;?>image/vip_<?php echo $vip;?>.gif"/></td>
<td class="tl">��¼����</td>
<td>&nbsp;<?php echo $logintimes;?></td>
</tr>
<?php if($vip) { ?>
<tr>
<td class="tl">����ʼ����</td>
<td>&nbsp;<?php echo timetodate($fromtime, 3);?></td>
<td class="tl">�����������</td>
<td>&nbsp;<?php echo timetodate($totime, 3);?></td>
</tr>
<?php } ?>
<tr>
<td class="tl">�ϴε�¼</td>
<td>&nbsp;<?php echo timetodate($logintime, 5);?></td>
<td class="tl">��¼IP</td>
<td>&nbsp;<?php echo $loginip;?> - <?php echo ip2area($loginip);?></td>
</tr>
<tr>
<td class="tl">ע��ʱ��</td>
<td>&nbsp;<?php echo timetodate($regtime, 5);?></td>
<td class="tl">ע��IP</td>
<td>&nbsp;<?php echo $regip;?> - <?php echo ip2area($regip);?></td>
</tr>
<tr>
<td class="tl"><?php echo $DT['money_name'];?>���</td>
<td>&nbsp;<a href="?moduleid=<?php echo $moduleid;?>&file=record&username=<?php echo $username;?>" target="_blank"><strong class="f_red"><?php echo $money;?></strong></a> <?php echo $DT['money_unit'];?></td>
<td class="tl"><?php echo $DT['money_name'];?>����</td>
<td>&nbsp;<a href="?moduleid=<?php echo $moduleid;?>&file=record&username=<?php echo $username;?>" target="_blank"><strong class="f_gray"><?php echo $locking;?></strong></a> <?php echo $DT['money_unit'];?></td>
</tr>
<tr>
<td class="tl">�������</td>
<td>&nbsp;<a href="?moduleid=<?php echo $moduleid;?>&file=sms&action=record&username=<?php echo $username;?>" target="_blank"><strong class="f_red"><?php echo $sms;?></strong></a> ��</td>
<td class="tl">��Ա<?php echo $DT['credit_name'];?></td>
<td>&nbsp;<a href="?moduleid=<?php echo $moduleid;?>&file=credits&kw=<?php echo $username;?>" target="_blank"><strong class="f_blue"><?php echo $credit;?></strong></a> <?php echo $DT['credit_unit'];?></td>
</tr>
</table>
<div class="tt">��˾����</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl">��˾��ҳ</td>
<td colspan="3">&nbsp;<a href="<?php echo $linkurl;?>" target="_blank" style="color:red;"><?php echo $linkurl;?></a></td>
</tr>
<tr>
<td class="tl">��˾��</td>
<td>&nbsp;<?php echo $company;?></td>
<td class="tl">��˾����</td>
<td>&nbsp;<?php echo $type;?></td>
</tr>
<td class="tl">��Ӫģʽ</td>
<td>&nbsp;<?php echo $mode;?></td>
<td class="tl">��Ӫ��Χ</td>
<td>&nbsp;<?php echo $business;?></td>
</tr>
<tr>
<td class="tl">ע���ʱ�</td>
<td>&nbsp;<?php echo $capital;?>��<?php echo $regunit;?></td>
<td class="tl">��˾��ģ</td>
<td>&nbsp;<?php echo $size;?></td>
</tr>
<tr>
<td class="tl">�������</td>
<td>&nbsp;<?php echo $regyear;?></td>
<td class="tl">��˾���ڵ�</td>
<td>&nbsp;<?php echo area_pos($areaid, '/');?></td>
</tr>
<tr>
<td class="tl">���۵Ĳ�Ʒ (�ṩ�ķ���)</td>
<td>&nbsp;<?php echo $sell;?></td>
<td class="tl">�ɹ��Ĳ�Ʒ (��Ҫ�ķ���)</td>
<td>&nbsp;<?php echo $buy;?></td>
</tr>
<?php if($catid) { ?>
<?php $MOD['linkurl'] = $MODULE[4]['linkurl'];?>
<tr>
<td class="tl">��Ӫ��ҵ��</td>
<td colspan="3">
	<?php $catids = explode(',', substr($catid, 1, -1));?>
	<table cellpadding="2" cellspacing="2" width="100%">
	<?php foreach($catids as $i=>$c) { ?>
	<?php if($i%3==0) echo '<tr>';?>
	<td width="33%"><?php echo cat_pos($c, ' / ', '_blank');?></td>
	<?php if($i%3==2) echo '</tr>';?>
	<?php } ?>
	</table>
</td>
</tr>
<?php } ?>
</table>

<div class="tt">��ϵ��ʽ</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl">�� ��</td>
<td>&nbsp;<?php echo $truename;?></td>
<td class="tl">�� ��</td>
<td>&nbsp;<?php if($mobile) { ?><a href="?moduleid=2&file=sms&mobile=<?php echo $mobile;?>" target="_blank"><img src="<?php echo DT_SKIN;?>image/mobile.gif" title="���Ͷ���" align="absmiddle"/></a> <?php } ?><?php echo $mobile;?></td>
</tr>
<tr>
<td class="tl">�� ��</td>
<td>&nbsp;<?php echo $department;?></td>
<td class="tl">ְ λ</td>
<td>&nbsp;<?php echo $career;?></td>
</tr>
<tr>
<td class="tl">�� ��</td>
<td>&nbsp;<?php echo $telephone;?></td>
<td class="tl">�� ��</td>
<td>&nbsp;<?php echo $fax;?></td>
</tr>
<tr>
<td class="tl">Email (������)</td>
<td>&nbsp;<a href="?moduleid=2&file=sendmail&email=<?php echo $email;?>" target="_blank"><img width="16" height="16" src="<?php echo DT_SKIN;?>image/email.gif" title="����Email <?php echo $email;?>" alt="" align="absmiddle"/></a> <?php echo $email;?></td>
<td class="tl">Email (����)</td>
<td>&nbsp;<?php if($mail) { ?><a href="?moduleid=2&file=sendmail&email=<?php echo $email;?>" target="_blank"><img width="16" height="16" src="<?php echo DT_SKIN;?>image/email.gif" title="����Email <?php echo $mail;?>" alt="" align="absmiddle"/></a> <?php } ?><?php echo $mail;?></td>
</tr>
<tr>
<td class="tl">QQ</td>
<td>&nbsp;<?php echo im_qq($qq);?> <?php echo $qq;?></td>
<td class="tl">��������</td>
<td>&nbsp;<?php echo im_ali($ali);?> <?php echo $ali;?></td>
</tr>
<tr>
<td class="tl">MSN</td>
<td>&nbsp;<?php echo im_msn($msn);?> <?php echo $msn;?></td>
<td class="tl">Skype</td>
<td>&nbsp;<?php echo im_skype($skype);?> <?php echo $skype;?></td>
</tr>
<tr>
<td class="tl">�� ַ</td>
<td>&nbsp;<?php echo $homepage;?></td>
<td class="tl">�� ��</td>
<td>&nbsp;<?php echo $postcode;?></td>
</tr>
<tr>
<td class="tl">��˾��Ӫ��ַ</td>
<td colspan="3">&nbsp;<?php echo $address;?></td>
</tr>
</table>
<div class="tt">������Ϣ</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl">�Ƽ�ע����</td>
<td>&nbsp;<a href="?moduleid=<?php echo $moduleid;?>&action=show&username=<?php echo $inviter;?>" target="_blank"><?php echo $inviter;?></a></td>
</tr>
<tr>
<td class="tl">��ҵ�����Ƿ�ͨ����֤</td>
<td>&nbsp;<?php echo $validated ? '��' : '��';?></td>
</tr>
<tr>
<td class="tl">��֤���ƻ����</td>
<td>&nbsp;<?php echo $validator;?></td>
</tr>
<tr>
<td class="tl">��֤����</td>
<td>&nbsp;<?php echo $validtime ? timetodate($validtime, 3) : '';?></td>
</tr>
<tr>
<td class="tl">��ҳ���Ŀ¼ </td>
<td>&nbsp;<?php echo $skin;?></td>
</tr>
<tr>
<td class="tl">��ҳģ��Ŀ¼ </td>
<td>&nbsp;<?php echo $template;?></td>
</tr>
<tr>
<td class="tl">��������</td>
<td>&nbsp;<?php echo $domain;?></td>
</tr>
<tr>
<td class="tl">Flash���</td>
<td>&nbsp;<?php echo $banner;?></td>
</tr>
<tr>
<td class="tl">ICP������</td>
<td>&nbsp;<?php echo $icp;?></td>
</tr>
<tr>
<td class="tl">������</td>
<td>&nbsp;<?php echo $black;?></td>
</tr>
<?php if(!isset($dialog)) { ?>
<tr>
<td class="tl"> </td>
<td colspan="3" height="30"><input type="button" value=" �� �� " class="btn" onclick="window.location='?moduleid=<?php echo $moduleid;?>&action=edit&userid=<?php echo $userid;?>&forward=<?php echo urlencode($DT_URL);?>';"/>&nbsp;&nbsp;<input type="button" value=" ǰ ̨ " class="btn" onclick="window.open('?moduleid=<?php echo $moduleid;?>&action=login&userid=<?php echo $userid;?>');"/>&nbsp;&nbsp;<input type="button" value=" �� �� " class="btn" onclick="history.back(-1);"/></td>
</tr>
<?php } ?>
</table>
<br/>
<script type="text/javascript">Menuon(1);</script>
</body>
</html>