<?php
defined('IN_DESTOON') or exit('Access Denied');
include tpl('header');
show_menu($menus);
?>
<form action="?">
<div class="tt">���λ����</div>
<input type="hidden" name="moduleid" value="<?php echo $moduleid;?>"/>
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td>
&nbsp;<?php echo $type_select;?>&nbsp;
<input type="text" size="50" name="kw" value="<?php echo $kw;?>" title="�ؼ���"/>
&nbsp;
<input type="text" name="psize" value="<?php echo $pagesize;?>" size="2" class="t_c" title="��/ҳ"/>
<input type="submit" value="�� ��" class="btn"/>&nbsp;
<input type="button" value="�� ��" class="btn" onclick="window.location='?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>';"/>
</td>
</tr>
</table>
</form>
<form method="post">
<div class="tt">������λ</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<th width="25"><input type="checkbox" onclick="checkall(this.form);"/></th>
<th width="40">����</th>
<th>ID</th>
<th>�������</th>
<th>���λ����</th>
<th>���(px)</th>
<th title="(<?php echo $DT['money_unit'];?>/��)">�۸�</th>
<th>ǰ̨</th>
<th>���</th>
<th>HTML���ô���</th>
<th>JS���ô���</th>
<th>����</th>
</tr>
<?php foreach($places as $k=>$v) {?>
<tr onmouseover="this.className='on';" onmouseout="this.className='';" align="center" name="�༭:<?php echo $v['editor'];?>&#10;����ʱ��:<?php echo $v['editdate'];?>">
<td><input type="checkbox" name="pids[]" value="<?php echo $v['pid'];?>"/></td>
<td><input type="text" size="2" name="listorder[<?php echo $v['pid'];?>]" value="<?php echo $v['listorder'];?>"/></td>
<td><?php echo $v['pid'];?></td>
<td><a href="<?php echo $v['typeurl'];?>" target="_blank"><?php echo $v['typename'];?></td>
<td align="left" title="���ʱ��:<?php echo $v['adddate'];?>&#10;�༭:<?php echo $v['editor'];?>&#10;�ϴ��޸�:<?php echo $v['editdate'];?>"><a href="?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=list&pid=<?php echo $v['pid'];?>"><?php echo $v['name'];?></td>
<td><?php echo $v['width'];?> x <?php echo $v['height'];?></td>
<td><?php echo $v['price'] ? $v['price'].$unit : '����';?></td>
<td><?php echo $v['open'] ? '��ʾ' : '<span class="f_blue">����</span>';?></td>
<td><a href="?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=list&pid=<?php echo $v['pid'];?>"><?php echo $v['ads'];?></a></td>
<td><input type="text" size="12" <?php if($v['typeid'] == 6 || $v['typeid'] == 7) { ?>value="{ad($moduleid,$catid,$kw,<?php echo $v['typeid'];?>)}"<?php } else { ?>value="{ad(<?php echo $v['pid'];?>)}"<?php } ?> onmouseover="this.select();"/></td>
<td><input type="text" size="12" <?php if($v['typeid'] > 1 && $v['typeid'] < 6) { ?>value="<script type=&quot;text/javascript&quot; src=&quot;<?php echo DT_PATH;?>file/script/A<?php echo $v['pid'];?>.js&quot;></script>"<?php } else { ?>value="��֧��" disabled<?php } ?> onmouseover="this.select();"/></td>
<td>
<a href="?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=add&pid=<?php echo $v['pid'];?>"><img src="admin/image/new.png" width="16" height="16" title="��˹��λ��ӹ��" alt=""/></a>&nbsp;
<a href="?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=list&pid=<?php echo $v['pid'];?>"><img src="admin/image/child.png" width="16" height="16" title="�˹��λ����б�" alt=""/></a>&nbsp;
<a href="?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=list&job=check&pid=<?php echo $v['pid'];?>"><img src="admin/image/import.png" width="16" height="16" title="�˹��λ��������б�" alt=""/></a>&nbsp;
<a href="?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=view&pid=<?php echo $v['pid'];?>" target="_blank"/><img src="admin/image/view.png" width="16" height="16" title="Ԥ���˹��λ" alt=""></a>&nbsp;
<a href="?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=edit_place&pid=<?php echo $v['pid'];?>"><img src="admin/image/edit.png" width="16" height="16" title="�޸Ĵ˹��λ" alt=""/></a>&nbsp;
<a href="?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=delete_place&pids=<?php echo $v['pid'];?>" onclick="return _delete();"><img src="admin/image/delete.png" width="16" height="16" title="ɾ���˹��λ" alt=""/></a>
</td>
</tr>
<?php }?>
</table>
<div class="btns">
<input type="submit" value=" �������� " class="btn" onclick="this.form.action='?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=order_place';"/>&nbsp;
<input type="submit" value=" ɾ �� " class="btn" onclick="if(confirm('ȷ��Ҫɾ��ѡ�й��λ��\n\n���λ�µ����й��Ҳ����ɾ��\n\n�˲������ɳ���\n\nǿ�ҽ��鲻Ҫɾ��ϵͳ�Դ��Ĺ��λ')){this.form.action='?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=delete_place'}else{return false;}"/>&nbsp;&nbsp;&nbsp;
��ʾ��ϵͳ�ᶨ���Զ����¹�棬�����Ҫ��������Ч���������¹��
</div>
</form>
<div class="pages"><?php echo $pages;?></div>
<br/>
<script type="text/javascript">Menuon(1);</script>
</body>
</html>