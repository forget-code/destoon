<?php
defined('IN_DESTOON') or exit('Access Denied');
include tpl('header');
show_menu($menus);
?>
<form action="?">
<div class="tt">��Ա����</div>
<input type="hidden" name="moduleid" value="<?php echo $moduleid;?>"/>
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<input type="hidden" name="export" id="export" value="<?php echo $export;?>"/>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td>&nbsp;
<?php echo $fields_select;?>&nbsp;
<input type="text" size="20" name="kw" value="<?php echo $kw;?>" title="�ؼ���"/>&nbsp;
<?php echo $group_select;?>&nbsp;
<?php echo $gender_select;?>&nbsp;
<?php echo $order_select;?>
&nbsp;
<input type="text" name="psize" value="<?php echo $pagesize;?>" size="2" class="t_c" title="��/ҳ"/>
<input type="submit" value="�� ��" class="btn" onclick="$('export').value=0;"/>&nbsp;
<input type="button" value="�� ��" class="btn" onclick="window.location='?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>';"/>&nbsp;
<input type="submit" value="����CSV" class="btn" onclick="$('export').value=1;"/>
</td>
</tr>
<tr>
<td>&nbsp;
<select name="timetype">
<option value="m.regtime" <?php if($timetype == 'm.regtime') echo 'selected';?>>ע��ʱ��</option>
<option value="m.logintime" <?php if($timetype == 'm.logintime') echo 'selected';?>>��¼ʱ��</option>
<option value="c.totime" <?php if($timetype == 'c.totime') echo 'selected';?>>������</option>
<option value="c.fromtime" <?php if($timetype == 'c.fromtime') echo 'selected';?>>����ʼ</option>
<option value="c.validtime" <?php if($timetype == 'c.validtime') echo 'selected';?>>��֤ʱ��</option>
<option value="c.styletime" <?php if($timetype == 'c.styletime') echo 'selected';?>>ģ�嵽��</option>
</select>&nbsp;
<?php echo dcalendar('fromtime', $fromtime);?> �� <?php echo dcalendar('totime', $totime);?>&nbsp;
<?php echo $DT['money_name'];?>��<input type="text" size="3" name="minmoney" value="<?php echo $minmoney;?>"/> ~ <input type="text" size="3" name="maxmoney" value="<?php echo $maxmoney;?>"/>&nbsp;
<?php echo $DT['credit_name'];?>��<input type="text" size="3" name="mincredit" value="<?php echo $mincredit;?>"/> ~ <input type="text" size="3" name="maxcredit" value="<?php echo $maxcredit;?>"/>&nbsp;
���ţ�<input type="text" size="3" name="minsms" value="<?php echo $minsms;?>"/> ~ <input type="text" size="3" name="maxsms" value="<?php echo $maxsms;?>"/>&nbsp;
</td>
</tr>
<tr>
<td>&nbsp;
<?php echo category_select('catid', '������ҵ', $catid, 4);?>&nbsp;
<?php echo ajax_area_select('areaid', '���ڵ���', $areaid);?>&nbsp;
<?php echo $mode_select;?>&nbsp;
<?php echo $type_select;?>&nbsp;
<?php echo $size_select;?>&nbsp;
<select name="vip">
<option value=""><?php echo VIP;?>����</option>
<?php 
for($i = 0; $i < 11; $i++) {
	echo '<option value="'.$i.'"'.($i == $vip ? ' selected' : '').'>'.$i.' ��</option>';
}
?>
</select>&nbsp;
<input type="checkbox" name="thumb" value="1"<?php echo $thumb ? ' checked' : '';?>/>ͼƬ&nbsp;
</td>
</tr>
<tr>
<td>&nbsp;
<?php echo $valid_select;?>&nbsp;
<?php echo $vprofile_select;?>&nbsp;
<?php echo $vemail_select;?>&nbsp;
<?php echo $vmobile_select;?>&nbsp;
<?php echo $vtruename_select;?>&nbsp;
<?php echo $vbank_select;?>&nbsp;
<?php echo $vcompany_select;?>&nbsp;
��Ա����<input type="text" name="username" value="<?php echo $username;?>" size="10"/>&nbsp;
��ԱID��<input type="text" name="uid" value="<?php echo $uid;?>" size="10"/>&nbsp;
</td>
</tr>
</table>
</form>
<div class="tt">��ϵ��Ա</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<th>��˾</th>
<th>����</th>
<th>ְλ</th>
<th>�Ա�</th>
<th>�绰</th>
<th>�ֻ�</th>
<th colspan="7">��ϵ��ʽ</th>
<th width="50">����</th>
</tr>
<?php foreach($members as $k=>$v) {?>
<tr onmouseover="this.className='on';" onmouseout="this.className='';" align="center" title="��Ա��:<?php echo $v['username'];?>&#10;��ԱID:<?php echo $v['userid'];?>&#10;��Ա��:<?php echo $GROUP[$v['groupid']]['groupname'];?>">
<td align="left">&nbsp;<a href="<?php echo $v['linkurl'];?>" target="_blank"><?php echo $v['company'];?></a><?php if($v['vip']) {?> <img src="<?php echo DT_SKIN;?>image/vip.gif" title="<?php echo VIP;?>:<?php echo $v['vip'];?>"/><?php } ?></td>
<td><?php echo $v['truename'];?></td>
<td><?php echo $v['career'];?></td>
<td><?php echo gender($v['gender']);?></td>
<td><?php echo $v['telephone'];?></td>
<td><?php echo $v['mobile'];?></td>

<td width="20"><?php if($v['mobile']) { ?><a href="?moduleid=2&file=sms&mobile=<?php echo $v['mobile'];?>" target="_blank"><img src="<?php echo DT_SKIN;?>image/mobile.gif" alt=""/></a><?php } else { ?>&nbsp;<?php } ?></td>

<td width="20"><a href="?moduleid=2&file=message&action=send&touser=<?php echo $v['username'];?>" target="_blank"><img width="16" height="16" src="<?php echo DT_SKIN;?>image/msg.gif" title="����վ����" alt=""/></a></td> 

<td width="20"><a href="?moduleid=2&file=sendmail&email=<?php echo $v['email'];?>" target="_blank"><img width="16" height="16" src="<?php echo DT_SKIN;?>image/email.gif" title="����Email <?php echo $v['email'];?>" alt=""/></a></td>

<td width="20"><?php if($v['qq']) { echo im_qq($v['qq']); } else { echo '&nbsp;'; } ?></td>

<td width="20"><?php if($v['ali']) { echo im_ali($v['ali']); } else { echo '&nbsp;'; } ?></td>

<td width="20"><?php if($v['msn']) { echo im_msn($v['msn']); } else { echo '&nbsp;'; } ?></td>

<td width="20"><?php if($v['skype']) { echo im_skype($v['skype']); } else { echo '&nbsp;'; } ?></td>

<td>
<a href="javascript:_user('<?php echo $v['username'];?>')"><img src="admin/image/view.png" width="16" height="16" title="��Ա[<?php echo $v['username'];?>]��ϸ����" alt=""/></a> 
<a href="?moduleid=<?php echo $moduleid;?>&action=login&userid=<?php echo $v['userid'];?>" target="_blank"><img src="admin/image/set.png" width="16" height="16" title="�����Ա��������" alt=""/></a> 
</td>
</tr>
<?php }?>
</table>
<div class="pages"><?php echo $pages;?></div>
<br/>
<script type="text/javascript">Menuon(4);</script>
</body>
</html>