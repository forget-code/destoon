<?php
defined('IN_DESTOON') or exit('Access Denied');
include tpl('header');
show_menu($menus);
?>
<script type="text/javascript">
var _del = 0;
</script>
<form action="?">
<div class="tt">��������</div>
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<input type="hidden" name="item" value="<?php echo $item;?>"/>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td>&nbsp;
<input type="text" size="50" name="kw" value="<?php echo $kw;?>" title="�ؼ��ʻ����ӵ�ַ"/>
&nbsp;
<input type="text" name="psize" value="<?php echo $pagesize;?>" size="2" class="t_c" title="��/ҳ"/>&nbsp;
<input type="submit" value="�� ��" class="btn"/>&nbsp;
<input type="button" value="�� ��" class="btn" onclick="window.location='?file=<?php echo $file;?>&item=<?php echo $item;?>';"/>
</td>
</tr>
</table>
</form>
<form method="post" action="?">
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<input type="hidden" name="item" value="<?php echo $item;?>"/>
<div class="tt">��������</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<th width="40">ɾ��</th>
<th>�ؼ���</th>
<th>����</th>
</tr>
<?php foreach($lists as $k=>$v) { ?>
<tr onmouseover="this.className='on';" onmouseout="this.className='';" align="center">
<td><input name="post[<?php echo $v['itemid'];?>][delete]" type="checkbox" value="1" onclick="if(this.checked){_del++;}else{_del--;}"/></td>
<td><input name="post[<?php echo $v['itemid'];?>][title]" type="text" size="30" value="<?php echo $v['title'];?>"/></td>
<td><input name="post[<?php echo $v['itemid'];?>][url]" type="text" size="50" value="<?php echo $v['url'];?>"/></td>
</tr>
<?php } ?>
<tr onmouseover="this.className='on';" onmouseout="this.className='';" align="center">
<td class="f_red">����</td>
<td><input name="post[0][title]" type="text" size="30" value=""/></td>
<td><input name="post[0][url]" type="text" size="50" value="http://"/></td>
</tr>
<tr>
<td> </td>
<td height="30" colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="submit" value="�� ��" onclick="if(_del && !confirm('��ʾ:��ѡ��ɾ��'+_del+'���������ӣ�ȷ��Ҫɾ����')) return false;" class="btn"/>&nbsp;&nbsp;&nbsp;��ʾ������Ĺ������ӻ�Ӱ��ҳ��򿪻������ٶ�</td>
</tr>
</table>
</form>
<div class="pages"><?php echo $pages;?></div>
<script type="text/javascript">Menuon(0);</script>
</body>
</html>