<?php
defined('IN_DESTOON') or exit('Access Denied');
include tpl('header');
show_menu($menus);
?>
<div class="tt">ע������</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td>&nbsp;&nbsp;&nbsp;1�����������<span class="f_red">�޸�</span>��<span class="f_red">ɾ��</span>���������Ϊ�˱�֤�����ٶȣ�ϵͳ���Զ��޸��ṹ������<span class="f_red">�������</span>��<span class="f_red">����ʧ��</span>ʱ������»������޸�����ṹ�����¡�</td>
</tr>
<tr>
<td>&nbsp;&nbsp;&nbsp;2��ɾ�����಻��ɾ�������µ����»���Ϣ������ɾ������֮ǰ�ֶ�����ɾ����</td>
</tr>
<tr>
<td>&nbsp;&nbsp;&nbsp;3���޸��ϼ�ID���Կ����޸ķ�����ϼ����࣬�ı����ṹ��</td>
</tr>
</table>
<div class="tt"><?php if($parentid) echo $CATEGORY[$parentid]['catname'];?>�������</div>
<form method="post">
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<th width="25"><input type="checkbox" onclick="checkall(this.form);"/></th>
<th>����</th>
<th>ID</th>
<th>�ϼ�ID</th>
<th>������</th>
<th>����Ŀ¼</th>
<th>����</th>
<th>����</th>
<th colspan="2">��Ϣ����</th>
<th>�ӷ���</th>
<th width="100">����</th>
</tr>
<?php foreach($DTCAT as $k=>$v) {?>
<tr onmouseover="this.className='on';" onmouseout="this.className='';" align="center">
<td><input type="checkbox" name="catids[]" value="<?php echo $v['catid'];?>"/></td>
<td><input name="category[<?php echo $v['catid'];?>][listorder]" type="text" size="3" value="<?php echo $v['listorder'];?>"/></td>
<td>&nbsp;<a href="<?php echo $MODULE[$mid]['linkurl'].$v['linkurl'];?>" target="_blank"><?php echo $v['catid'];?></a>&nbsp;</td>
<td><input name="category[<?php echo $v['catid'];?>][parentid]" type="text" size="5" value="<?php echo $v['parentid'];?>"/></td>
<td>
<input name="category[<?php echo $v['catid'];?>][catname]" type="text" value="<?php echo $v['catname'];?>" style="width:100px;color:<?php echo $v['style'];?>"/>
<?php echo dstyle('category['.$v['catid'].'][style]', $v['style']);?>
</td>
<td><input name="category[<?php echo $v['catid'];?>][catdir]" type="text" value="<?php echo $v['catdir'];?>" size="10"/></td>
<td>
<input name="category[<?php echo $v['catid'];?>][letter]" type="text" value="<?php echo $v['letter'];?>" size="1"/>
</td>
<td>
<input name="category[<?php echo $v['catid'];?>][level]" type="text" value="<?php echo $v['level'];?>" size="1"/>
</td>
<td><script type="text/javascript">perc(<?php echo $v['items'];?>,<?php echo $total;?>,'100px');</script></td>
<td><?php echo $v['items'];?></td>
<td><a href="?file=<?php echo $file;?>&mid=<?php echo $mid;?>&parentid=<?php echo $v['catid'];?>"><?php echo $v['childs'];?></a></td>
<td>
<a href="?file=<?php echo $file;?>&mid=<?php echo $mid;?>&parentid=<?php echo $v['catid'];?>"><img src="admin/image/child.png" width="16" height="16" title="�����ӷ��࣬��ǰ��<?php echo $v['childs'];?>���ӷ���" alt=""/></a>&nbsp;
<a href="?file=<?php echo $file;?>&action=add&mid=<?php echo $mid;?>&parentid=<?php echo $v['catid'];?>"><img src="admin/image/new.png" width="16" height="16" title="����ӷ���" alt=""/></a>&nbsp;
<a href="?file=<?php echo $file;?>&action=edit&mid=<?php echo $mid;?>&catid=<?php echo $v['catid'];?>"><img src="admin/image/edit.png" width="16" height="16" title="�޸�" alt=""/></a>&nbsp;
<a href="?file=<?php echo $file;?>&action=delete&mid=<?php echo $mid;?>&catid=<?php echo $v['catid'];?>&parentid=<?php echo $parentid;?>" onclick="return _delete();"><img src="admin/image/delete.png" width="16" height="16" title="ɾ��" alt=""/></a></td>
</tr>
<?php }?>
</table>
<div class="btns">
<span class="f_r">
��������:<strong class="f_red"><?php echo count($CATEGORY);?></strong>&nbsp;&nbsp;
��ǰĿ¼:<strong class="f_blue"><?php echo count($DTCAT);?></strong>&nbsp;&nbsp;
</span>
<input type="submit" name="submit" value="���·���" class="btn" onclick="this.form.action='?mid=<?php echo $mid;?>&file=<?php echo $file;?>&parentid=<?php echo $parentid;?>&action=update'"/>&nbsp;
<input type="submit" value="ɾ��ѡ��" class="btn" onclick="if(confirm('ȷ��Ҫɾ��ѡ�з����𣿴˲��������ɳ���')){this.form.action='?mid=<?php echo $mid;?>&file=<?php echo $file;?>&parentid=<?php echo $parentid;?>&action=delete'}else{return false;}"/>
<?php if($parentid) {?>&nbsp;
<input type="button" value="�ϼ�����" class="btn" onclick="window.location='?file=<?php echo $file;?>&mid=<?php echo $mid;?>&parentid=<?php echo $CATEGORY[$parentid]['parentid'];?>';"/>
<?php }?>
</div>
</form>
<form method="post" action="?">
<div class="tt">��ݲ���</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr align="center">
<td>
<div style="float:left;padding:10px;">
<?php echo category_select('cid', '����ṹ', $parentid, $mid, 'size="2" style="width:200px;height:130px;" id="cid"');?></div>
<div style="float:left;padding:10px;">
	<table>
	<tr>
	<td><input type="submit" value="�������" class="btn" onclick="this.form.action='?mid=<?php echo $mid;?>&file=<?php echo $file;?>&parentid='+$('cid').value;"/></td>
	</tr>
	<tr>
	<td><input type="submit" value="��ӷ���" class="btn" onclick="this.form.action='?mid=<?php echo $mid;?>&file=<?php echo $file;?>&action=add&parentid='+$('cid').value;"/></td>
	</tr>
	<tr>
	<td><input type="submit" value="�޸ķ���" class="btn" onclick="this.form.action='?mid=<?php echo $mid;?>&file=<?php echo $file;?>&action=edit&catid='+$('cid').value;"/></td>
	</tr>
	<tr>
	<td><input type="submit" value="ɾ������" class="btn" onclick="if(confirm('ȷ��Ҫɾ��ѡ�з����𣿴˲��������ɳ���')){this.form.action='?mid=<?php echo $mid;?>&file=<?php echo $file;?>&action=delete&catid='+$('cid').value;}else{return false;}"/></td>
	</tr>
	</table>
</div>
</td>
</tr>
</table>
</div>
</form>
<br/>
<br/>
<br/>
<script type="text/javascript">Menuon(1);</script>
</body>
</html>