<?php
defined('IN_DESTOON') or exit('Access Denied');
include tpl('header');
show_menu($menus);
?>
<div class="tt">��¼����</div>
<form action="?">
<input type="hidden" name="moduleid" value="<?php echo $moduleid;?>"/>
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td>&nbsp;
<?php echo $fields_select;?>&nbsp;
<input type="text" size="15" name="kw" value="<?php echo $kw;?>"/>&nbsp;
<?php echo $status_select;?>&nbsp;
<?php echo $order_select;?>&nbsp;
<input type="text" name="psize" value="<?php echo $pagesize;?>" size="2" class="t_c" title="��/ҳ"/>&nbsp;
��ˮ�ţ�<input type="text" name="itemid" value="<?php echo $itemid;?>" size="10"/>&nbsp;
<input type="submit" value="�� ��" class="btn"/>&nbsp;
<input type="button" value="�� ��" class="btn" onclick="window.location='?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=<?php echo $action;?>';"/>
</td>
</tr>
<tr>
<td>&nbsp;
<select name="timetype">
<option value="addtime" <?php if($timetype == 'addtime') echo 'selected';?>>�µ�ʱ��</option>
<option value="updatetime" <?php if($timetype == 'updatetime') echo 'selected';?>>����ʱ��</option>
</select>&nbsp;
<?php echo dcalendar('fromtime', $fromtime);?> �� <?php echo dcalendar('totime', $totime);?>&nbsp;
<select name="mtype">
<option value="money" <?php if($mtype == 'money') echo 'selected';?>>�����ܶ�</option>
<option value="amount" <?php if($mtype == 'amount') echo 'selected';?>>�µ����</option>
<option value="fee" <?php if($mtype == 'fee') echo 'selected';?>>���ӷ���</option>
</select>&nbsp;
<input type="text" name="minamount" value="<?php echo $minamount;?>" size="5"/> �� 
<input type="text" name="maxamount" value="<?php echo $maxamount;?>" size="5"/>&nbsp;
���ң�<input type="text" name="seller" value="<?php echo $seller;?>" size="10"/>&nbsp;
��ң�<input type="text" name="buyer" value="<?php echo $buyer;?>" size="10"/>&nbsp;
</td>
</tr>
</table>
</form>
<form method="post">
<div class="tt">���׼�¼</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<th width="25"><input type="checkbox" onclick="checkall(this.form);"/></th>
<th>��ˮ��</th>
<th>��Ʒ�����</th>
<th>�����ܶ�</th>
<th>����</th>
<th>���</th>
<th width="75">�µ�ʱ��</th>
<th width="75">����ʱ��</th>
<th>״̬</th>
<th>����</th>
</tr>
<?php foreach($trades as $k=>$v) {?>
<tr onmouseover="this.className='on';" onmouseout="this.className='';" align="center">
<td><input type="checkbox" name="itemid[]" value="<?php echo $v['itemid'];?>"/></td>
<td class="px11"><?php echo $v['itemid'];?></td>
<td align="left">
<?php if($v['linkurl']) {?>
<a href="<?php echo $v['linkurl'];?>" target="_blank" class="t">
<?php } ?>
<?php echo $v['title'];?>
<?php if($v['linkurl']) {?>
</a>
<?php } ?>
</td>
<td class="f_red px11"><?php echo $v['money'];?></td>
<td class="px11"><a href="javascript:_user('<?php echo $v['seller'];?>');"><?php echo $v['seller'];?></a></td>
<td class="px11"><a href="javascript:_user('<?php echo $v['buyer'];?>');"><?php echo $v['buyer'];?></a></td>
<td class="px11"><?php echo $v['addtime'];?></td>
<td class="px11"><?php echo $v['updatetime'];?></td>
<td><?php echo $v['dstatus'];?></td>
<td>
<?php if($v['status'] == 5) {?>
<a href="?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=refund&itemid=<?php echo $v['itemid'];?>">����</a>
<?php } else { ?>
<a href="?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=show&itemid=<?php echo $v['itemid'];?>">�鿴</a>
<?php } ?>
</td>
</tr>
<?php }?>
<tr align="center">
<td></td>
<td><strong>С��</strong></td>
<td></td>
<td class="f_red f_b"><?php echo $money;?></td>
<td colspan="7">&nbsp;</td>
</tr>
</table>
<div class="btns">
<input type="submit" value=" ����ɾ�� " class="btn" onclick="if(confirm('ȷ��Ҫɾ��ѡ�м�¼�𣿴˲��������ɳ���')){this.form.action='?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=delete'}else{return false;}"/>&nbsp;
<input type="button" value="����SQL" class="btn" onclick="Go('?file=database&action=export&table=<?php echo $table;?>');"/>
</div>
</form>
<div class="pages"><?php echo $pages;?></div>
<script type="text/javascript">Menuon(1);</script>
<br/>
</body>
</html>