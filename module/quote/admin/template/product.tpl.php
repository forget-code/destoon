<?php
defined('IN_DESTOON') or exit('Access Denied');
include tpl('header');
show_menu($menus);
?>
<script type="text/javascript">
var _del = 0;
</script>
<form method="post" action="?">
<input type="hidden" name="moduleid" value="<?php echo $moduleid;?>"/>
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<div class="tt">��Ʒ����</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<th width="40">ɾ��</th>
<th>����</th>
<th>��Ʒ����</th>
<th>����ID</th>
<th>��������</th>
</tr>
<?php foreach($lists as $k=>$v) { ?>
<tr onmouseover="this.className='on';" onmouseout="this.className='';" align="center">
<td><input name="post[<?php echo $v['pid'];?>][delete]" type="checkbox" value="1" onclick="if(this.checked){_del++;}else{_del--;}"/></td>
<td><input name="post[<?php echo $v['pid'];?>][listorder]" type="text" size="3" value="<?php echo $v['listorder'];?>"/></td>
<td><input name="post[<?php echo $v['pid'];?>][title]" type="text" size="20" value="<?php echo $v['title'];?>"/></td>
<td><input name="post[<?php echo $v['pid'];?>][catid]" type="text" size="5" value="<?php echo $v['catid'];?>"/></td>
<td><?php echo cat_pos($v['catid']);?></td>
</tr>
<?php } ?>
<tr onmouseover="this.className='on';" onmouseout="this.className='';" align="center">
<td class="f_red">����</td>
<td><input name="post[0][listorder]" type="text" size="3" value=""/></td>
<td><input name="post[0][title]" type="text" size="20" value=""/></td>
<td colspan="4" align="left">&nbsp;&nbsp;<?php echo category_select('post[0][catid]', 'ѡ�����', $catid, $moduleid);?></td>
</tr>
<tr>
<td> </td>
<td height="30" colspan="7">&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="submit" value=" �� �� " onclick="if(_del && !confirm('��ʾ:��ѡ��ɾ��'+_del+'����Ʒ���ͣ�ȷ��Ҫɾ����')) return false;" class="btn"/></td>
</tr>
</table>
</form>
<div class="pages"><?php echo $pages;?></div>
<script type="text/javascript">Menuon(0);</script>
</body>
</html>