<?php
defined('IN_DESTOON') or exit('Access Denied');
include tpl('header');
show_menu($menus);
?>
<form method="post" action="?" id="dform">
<input type="hidden" name="moduleid" value="<?php echo $moduleid;?>"/>
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="itemid" value="<?php echo $itemid;?>"/>
<input type="hidden" name="forward" value="<?php echo $forward;?>"/>
<div class="tt">��������</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl">��Ա��</td>
<td><?php echo $item['username'];?> <a href="<?php echo $MODULE[3]['linkurl'];?>redirect.php?username=<?php echo $item['username'];?>" target="_blank" class="t">[��ҳ]</a></td>
</tr>
<tr>
<td class="tl">���ֽ��</td>
<td class="f_red"><strong><?php echo $item['amount'];?></strong></td>
</tr>
<tr>
<td class="tl">������</td>
<td class="f_blue"><strong><?php echo $item['fee'];?></strong></td>
</tr>
<tr class="on">
<td class="tl">�տʽ</td>
<td><?php echo $item['bank'];?></td>
</tr>
<tr>
<td class="tl">�տ��ʺ�</td>
<td><?php echo $item['account'];?></td>
</tr>
<tr>
<td class="tl">�տ���</td>
<td><?php echo $item['truename'];?></td>
</tr>
<tr>
<td class="tl">�ֻ�</td>
<td><?php echo $member['mobile'];?></td>
</tr>
<?php if($member['qq']) { ?>
<tr>
<td class="tl">QQ</td>
<td><a href="tencent://message/?uin=<?php echo $member['qq'];?>&Site=<?php echo $DT['sitename'];?>&Menu=yes"><img src="http://wpa.qq.com/pa?p=1:<?php echo $member['qq'];?>:17" width="25" height="17" title="���QQ��̸/����" alt=""/></a> <?php echo $member['qq'];?></td>
</tr>
<?php } ?>
<?php if($member['msn']) { ?>
<tr>
<td class="tl">MSN</td>
<td><a href="msnim:chat?contact=<?php echo $member['msn'];?>"><img src="<?php echo DT_SKIN;?>image/msnchat.gif" width="25" height="17" title="���MSN��̸/����" alt=""/></a> <?php echo $member['msn'];?></td>
</tr>
<?php } ?>
<tr>
<td class="tl">����ʱ��</td>
<td><?php echo $item['addtime'];?></td>
</tr>
<tr>
<td class="tl">����IP</td>
<td><?php echo $item['ip'];?></td>
</tr>
<tr class="on">
<td class="tl">������ <span class="f_red">*</span></td>
<td>
<?php
unset($_status[0]);
foreach($_status as $k=>$v) {
?>
<input name="status" type="radio" value="<?php echo $k;?>"/> <?php echo $v;?>&nbsp;
<?php } ?>
</td>
</tr>
<tr>
<td class="tl">ԭ�򼰱�ע</td>
<td><input name="note" type="text" size="40"/></td>
</tr>
<tr>
<td class="tl">ע��</td>
<td class="f_red">�˱�һ���ύ�����������޸Ļ�ɾ��������ؽ�������</td>
</tr>
</table>
<div class="sbt"><input type="submit" name="submit" value=" ȷ �� " class="btn"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value=" �� �� " class="btn" onclick="history.back(-1);"/></div>
</form>
<script type="text/javascript">Menuon(2);</script>
</body>
</html>