<?php
defined('IN_DESTOON') or exit('Access Denied');
include tpl('header');
show_menu($menus);
?>
<form action="?" method="post">
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<input type="hidden" name="action" value="order"/>
<div class="tt">ģ�����</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<th width="50">����</th>
<th width="50">ID</th>
<th>����</th>
<th width="70">����</th>
<th width="70">����</th>
<th width="120">ģ��</th>
<th width="100">��װ����</th>
<th width="100">����</th>
<th width="50">״̬</th>
</tr>
<?php foreach($modules as $k=>$v) {?>
<tr align="center" onmouseover="this.className='on';" onmouseout="this.className='';">
<td><input type="text" size="2" name="listorder[<?php echo $v['moduleid'];?>]" value="<?php echo $v['listorder'];?>"/></td>
<td><?php echo $v['moduleid'];?></td>
<td><a href="<?php echo $v['linkurl'];?>" target="_blank"><?php echo set_style($v['name'], $v['style']);?></a></td>
<td><?php echo $v['islink'] ? '<span class="f_red">����</span>' : '����';?></td>
<td><?php echo $v['ismenu'] ? '��' : '<span class="f_red">��</span>';?></td>
<td title="<?php echo $v['module'];?>"><?php echo $v['modulename'];?></td>
<td><?php echo $v['installdate'];?></td>
<td><a href="?file=<?php echo $file;?>&action=edit&modid=<?php echo $v['moduleid'];?>"><img src="admin/image/edit.png" width="16" height="16" title="�޸�" alt=""/></a>&nbsp;&nbsp;<a href="?file=<?php echo $file;?>&action=delete&modid=<?php echo $v['moduleid'];?>" onclick="return _delete();"><img src="admin/image/delete.png" width="16" height="16" title="ɾ��" alt=""/></a>&nbsp;&nbsp;<a href="?file=<?php echo $file;?>&action=remkdir&modid=<?php echo $v['moduleid'];?>"><img src="admin/image/remkdir.png" width="16" height="16" title="�ؽ�Ŀ¼" alt=""/></a>&nbsp;&nbsp;<a href="?file=setting&moduleid=<?php echo $v['moduleid'];?>"><img src="admin/image/set.png" width="16" height="16" title="����" alt=""/></a></td>
<td>
<?php if($v['disabled']) {?>
<a href="?file=<?php echo $file;?>&action=disable&value=0&modid=<?php echo $v['moduleid'];?>"><img src="admin/image/stop.png" width="16" height="16" title="�ѽ���,�������" alt=""/></a>
<?php } else {?>
<a href="javascript:Dconfirm('ȷ��Ҫ����[<?php echo $v['name'];?>]ģ����?', '?file=<?php echo $file;?>&action=disable&value=1&modid=<?php echo $v['moduleid'];?>');"><img src="admin/image/start.png" width="16" height="16" title="��������,�������" alt=""/></a>
<?php } ?>
</td>
</tr>
<?php }?>
</table>
<?php if($_modules) { ?>
<div class="tt">����ģ��</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<th width="50">����</th>
<th width="50">ID</th>
<th>����</th>
<th width="70">����</th>
<th width="70">����</th>
<th width="120">ģ��</th>
<th width="100">��װ����</th>
<th width="100">����</th>
<th width="50">״̬</th>
</tr>
<?php foreach($_modules as $k=>$v) {?>
<tr align="center" onmouseover="this.className='on';" onmouseout="this.className='';">
<td><input type="text" size="2" name="listorder[<?php echo $v['moduleid'];?>]" value="<?php echo $v['listorder'];?>"/></td>
<td><?php echo $v['moduleid'];?></td>
<td><a href="<?php echo $v['linkurl'];?>" target="_blank"><?php echo set_style($v['name'], $v['style']);?></a></td>
<td><?php echo $v['islink'] ? '<span class="f_red">����</span>' : '����';?></td>
<td><?php echo $v['ismenu'] ? '��' : '<span class="f_red">��</span>';?></td>
<td title="<?php echo $v['module'];?>"><?php echo $v['modulename'];?></td>
<td><?php echo $v['installdate'];?></td>
<td><a href="?file=<?php echo $file;?>&action=edit&modid=<?php echo $v['moduleid'];?>"><img src="admin/image/edit.png" width="16" height="16" title="�޸�" alt=""/></a>&nbsp;&nbsp;<a href="?file=<?php echo $file;?>&action=delete&modid=<?php echo $v['moduleid'];?>" onclick="return _delete();"><img src="admin/image/delete.png" width="16" height="16" title="ɾ��" alt=""/></a>&nbsp;&nbsp;<a href="?file=<?php echo $file;?>&action=remkdir&modid=<?php echo $v['moduleid'];?>"><img src="admin/image/remkdir.png" width="16" height="16" title="�ؽ�Ŀ¼" alt=""/></a>&nbsp;&nbsp;<a href="?file=setting&moduleid=<?php echo $v['moduleid'];?>"><img src="admin/image/set.png" width="16" height="16" title="����" alt=""/></a></td>
<td>
<?php if($v['disabled']) {?>
<a href="?file=<?php echo $file;?>&action=disable&value=0&modid=<?php echo $v['moduleid'];?>"><img src="admin/image/stop.png" width="16" height="16" title="�ѽ���,�������" alt=""/></a>
<?php } else {?>
<a href="javascript:Dconfirm('ȷ��Ҫ����[<?php echo $v['name'];?>]ģ����?', '?file=<?php echo $file;?>&action=disable&value=1&modid=<?php echo $v['moduleid'];?>');"><img src="admin/image/start.png" width="16" height="16" title="��������,�������" alt=""/></a>
<?php } ?>
</td>
</tr>
<?php }?>
</table>
<?php } ?>
<div class="btns">
<input type="submit" value=" �������� " class="btn"/>&nbsp;
</div>
</form>
<div class="tt">ϵͳģ��</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<th>ģ��</th>
<th width="70">�ɸ���</th>
<th width="70">��ж��</th>
<th width="120">����</th>
<th width="260">�ٷ���վ</th>
</tr>
<?php foreach($sysmodules as $k=>$v) {?>
<tr align="center">
<td align="left" title="λ��./module/<?php echo $v['module'];?>/">&nbsp;<img src="admin/image/folder.gif" align="absmiddle"/> <?php echo $v['name'];?> (<?php echo $v['module'];?>)</td>
<td><?php echo $v['copy'] ? '<span class="f_red">��</span>' : '��'; ?></td>
<td><?php echo $v['uninstall'] ? '<span class="f_red">��</span>' : '��'; ?></td>
<td><?php echo $v['author'];?></td>
<td><a href="<?php echo 'http://'.$v['homepage'];?>" target="_blank"><?php echo $v['homepage'];?></a></td>
</tr>
<?php
}
?>
</table>
<script type="text/javascript">Menuon(1);</script>
</body>
</html>