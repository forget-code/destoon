<?php
defined('IN_DESTOON') or exit('Access Denied');
include tpl('header');
show_menu($menus);
?>
<form method="post">
<input type="hidden" name="forward" value="<?php echo $DT_URL;?>"/>
<div class="tt">���Բ���</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<th width="40">����</th>
<th>��������</th>
<th>����</th>
<th>��Ʒ����</th>
<th>��ӷ�ʽ</th>
<th>Ĭ��(��ѡ)ֵ</th>
<th width="50">����</th>
</tr>
<?php foreach($lists as $k=>$v) { ?>
<tr onmouseover="this.className='on';" onmouseout="this.className='';" align="center">
<td><input type="text" size="2" name="listorder[<?php echo $v['oid'];?>]" value="<?php echo $v['listorder'];?>"/></td>
<td><?php echo $v['name'];?></td>
<td><?php echo $v['required'] ? '<span class="f_red">��</span>' : '��';?></td>
<td><a href="?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=<?php echo $action;?>&pid=<?php echo $v['pid'];?>"><?php echo $PRODUCT[$v['pid']]['title'];?></a></td>
<td><?php echo $TYPE[$v['type']];?></td>
<td><?php echo $v['value'];?></td>
<td>
<a href="?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=edit&pid=<?php echo $v['pid'];?>&oid=<?php echo $v['oid'];?>"><img src="admin/image/edit.png" width="16" height="16" title="�޸�" alt=""/></a>&nbsp;
<a href="?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&action=delete&pid=<?php echo $v['pid'];?>&oid=<?php echo $v['oid'];?>" onclick="return _delete();"><img src="admin/image/delete.png" width="16" height="16" title="ɾ��" alt=""/></a>
</td>
</tr>
<?php } ?>
</table>
<div class="btns">
<input type="submit" value=" �������� " class="btn" onclick="this.form.action='?moduleid=<?php echo $moduleid;?>&file=<?php echo $file;?>&pid=<?php echo $pid;?>&action=order';"/>
</div>
</form>
<div class="pages"><?php echo $pages;?></div>
<script type="text/javascript">Menuon(2);</script>
</body>
</html>