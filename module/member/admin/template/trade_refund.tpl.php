<?php
defined('IN_DESTOON') or exit('Access Denied');
include tpl('header');
show_menu($menus);
?>
<div class="tt">�����˿�</div>
<form method="post" action="?" id="dform">
<input type="hidden" name="moduleid" value="<?php echo $moduleid;?>"/>
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="itemid" value="<?php echo $itemid;?>"/>
<input type="hidden" name="forward" value="<?php echo $forward;?>"/>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl">��ˮ��</td>
<td><?php echo $item['itemid'];?></td>
</tr>
<tr>
<td class="tl">��Ʒ�����</td>
<td>
<?php if($item['linkurl']) { ?>
<a href="<?php echo $item['linkurl'];?>" target="_blank">
<?php } ?>
<?php echo $item['title'];?>
<?php if($item['linkurl']) { ?>
</a>
<?php } ?>
</td>
</tr>
<?php if($item['thumb']) { ?>
<tr>
<td class="tl">����ͼ</td>
<td><img src="<?php echo $item['thumb'];?>"/></td>
</tr>
<?php } ?>
<tr>
<td class="tl">����</td>
<td><a href="<?php echo $MODULE[3]['linkurl'];?>redirect.php?username=<?php echo $item['seller'];?>" target="_blank" class="t"><?php echo $item['seller'];?></a></td>
</tr>
<tr>
<td class="tl">���</td>
<td><a href="<?php echo $MODULE[3]['linkurl'];?>redirect.php?username=<?php echo $item['buyer'];?>" target="_blank" class="t"><?php echo $item['buyer'];?></a></td>
</tr>
<tr>
<td class="tl">�ʱ�</td>
<td><?php echo $item['buyer_postcode'];?></td>
</tr>
<tr>
<td class="tl">��ַ</td>
<td><?php echo $item['buyer_address'];?></td>
</tr>
<tr>
<td class="tl">�ջ���</td>
<td><?php echo $item['buyer_name'];?></td>
</tr>
<tr>
<td class="tl">�绰</td>
<td><?php echo $item['buyer_phone'];?></td>
</tr>
<tr>
<td class="tl">�µ�ʱ��</td>
<td><?php echo $item['addtime'];?></td>
</tr>
<tr>
<td class="tl">����ʱ��</td>
<td><?php echo $item['updatetime'];?></td>
</tr>
<tr>
<td class="tl">��ע˵��</td>
<td><?php echo $item['note'];?></td>
</tr>
<tr>
<td class="tl">���</td>
<td class="f_red"><?php echo $item['amount'];?></td>
</tr>
<?php if($item['fee']) { ?>
<tr>
<td class="tl"><?php echo $item['fee_name'];?></td>
<td class="f_blue"><?php echo $item['fee'];?></td>
</tr>
<?php } ?>

<tr>
<td class="tl">�ܶ�</td>
<td class="f_red f_b"><?php echo $item['money'];?></td>
</tr>

<tr>
<td class="tl">��������</td>
<td><?php echo $item['send_type'];?></td>
</tr>
<tr>
<td class="tl">��������</td>
<td><?php echo $item['send_no'];?></td>
</tr>
<tr>
<td class="tl">����ʱ��</td>
<td><?php echo $item['send_time'];?></td>
</tr>

<tr>
<td class="tl">����״̬</td>
<td><?php echo $_status[$item['status']];?></td>
</tr>
<?php if($item['buyer_reason']) { ?>
<tr>
<td class="tl">������ɻ�֤��</td>
<td><?php echo $item['buyer_reason'];?></td>
</tr>
<?php } ?>
<tr>
<td class="tl">�������</td>
<td>
<input type="radio" name="status" value="6"/> �����׽���˻������<br/>
<input type="radio" name="status" value="7"/> �����׽��֧��������
</td>
</tr>
<tr>
<td class="tl">��������</td>
<td>
<textarea name="content" id="content" class="dsn"></textarea>
<?php echo deditor($moduleid, 'content', 'Simple', '92%', 200);?>
<br/>�������д��һ���ύ�����ɸ���
</td>
</tr>
</table>
<div class="sbt"><input type="submit" name="submit" value=" ȷ �� " class="btn"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value=" �� �� " class="btn" onclick="history.back(-1);"/></div>
</form>
<script type="text/javascript">Menuon(1);</script>
</body>
</html>