<?php
defined('IN_DESTOON') or exit('Access Denied');
include tpl('header');
show_menu($menus);
?>
<div class="tt"><?php echo $MOD['name'];?>[<?php echo $item['title'];?>]ͼƬ�б�</div>
<form method="post" action="?" id="dform">
<input type="hidden" name="moduleid" value="<?php echo $moduleid;?>"/>
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="itemid" value="<?php echo $itemid;?>"/>
<input type="hidden" name="forward" value="<?php echo $forward;?>"/>
<input type="hidden" name="update" value="1"/>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td>
<?php foreach($lists as $k=>$v) { ?>
<div style="width:130px;float:left;">
	<input type="hidden" name="post[<?php echo $v['itemid'];?>][thumb]" id="thumb<?php echo $v['itemid'];?>" value="<?php echo $v['thumb'];?>"/>
	<table width="120">
	<tr align="center" height="110" class="c_p">
	<td width="120"><img src="<?php echo $v['thumb'];?>" id="showthumb<?php echo $v['itemid'];?>" title="Ԥ��ͼƬ" alt="" onclick="if(this.src.indexOf('waitpic.gif') == -1){_preview(this.src, 1);}else{Dphoto(<?php echo $v['itemid'];?>,<?php echo $moduleid;?>,100,100, $('thumb<?php echo $v['itemid'];?>').value, true);}"/></td>
	</tr>
	<tr align="center">
	<td><span onclick="Dphoto(<?php echo $v['itemid'];?>,<?php echo $moduleid;?>,100,100, $('thumb<?php echo $v['itemid'];?>').value, true);" class="jt">[�ϴ�]</span>&nbsp;<a href="?moduleid=<?php echo $moduleid;?>&action=item_delete&itemid=<?php echo $v['itemid'];?>" onclick="return _delete();" class="t">[ɾ��]</a></td>
	</tr>
	<tr align="center" title="<?php echo $v['introduce'];?>">
	<td><textarea name="post[<?php echo $v['itemid'];?>][introduce]" style="width:90px;height:40px;" onfocus="if(this.value=='��飺')this.value='';"><?php echo $v['introduce'];?></textarea></td>
	</tr>
	<tr align="center" title="����">
	<td><input type="text" size="3" name="post[<?php echo $v['itemid'];?>][listorder]" value="<?php echo $v['listorder'];?>"/></td>
	</tr>
	</table>
</div>
<?php } ?>
<?php if($items < $MOD['maxitem']) { ?>
<div style="width:130px;float:left;">
	<input type="hidden" name="post[0][thumb]" id="thumb0"/>
	<table width="120">
	<tr align="center" height="110" class="c_p">
	<td width="120"><img src="<?php echo DT_SKIN?>image/waitpic.gif" id="showthumb0" title="Ԥ��ͼƬ" alt="" onclick="if(this.src.indexOf('waitpic.gif') == -1){_preview(this.src, 1);}else{Dphoto(0,<?php echo $moduleid;?>,100,100, $('thumb0').value, true);}"/></td>
	</tr>
	<tr align="center">
	<td><span onclick="Dphoto(0,<?php echo $moduleid;?>,100,100, $('thumb0').value, true);" class="jt">[�ϴ�]</span>&nbsp;<span onclick="delAlbum('', 'wait');" class="jt">[ɾ��]</span></td>
	</tr>
	<tr align="center" title="���">
	<td><textarea name="post[0][introduce]" style="width:90px;height:40px;" onfocus="if(this.value=='��飺')this.value='';">��飺</textarea></td>
	</tr>
	<tr align="center" title="����">
	<td><input type="text" size="3" name="post[0][listorder]" value="0"/></td>
	</tr>
	</table>
</div>
<?php } ?>
</td>
</tr>
</table>
<div class="sbt"><input type="submit" value=" �� �� " class="btn"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value=" Ԥ �� " class="btn" onclick="window.open('<?php echo $MOD['linkurl'].$item['linkurl'];?>');"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value=" ͼ �� " class="btn" onclick="window.location='?moduleid=<?php echo $moduleid;?>&action=edit&itemid=<?php echo $itemid;?>&forward=<?php echo urlencode($DT_URL);?>';"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value=" �� �� " class="btn" onclick="window.location='?moduleid=<?php echo $moduleid;?>';"/></div>
</form>
<div class="pages"><?php echo $pages;?></div>
<?php load('clear.js'); ?>
<div class="tt">���������ϴ�zipѹ���ļ�</div>
<form method="post" action="?" enctype="multipart/form-data">
<input type="hidden" name="moduleid" value="<?php echo $moduleid;?>"/>
<input type="hidden" name="action" value="zip"/>
<input type="hidden" name="itemid" value="<?php echo $itemid;?>"/>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl">ѡ���ļ�</td>
<td>
&nbsp;<input name="uploadfile" type="file" size="25"/>&nbsp;&nbsp;
<input type="submit" value=" �� �� " class="btn"/>
</td>
</tr>
<tr>
<td class="tl">��ʾ��Ϣ</td>
<td class="f_gray">&nbsp;���ͬʱ�ϴ�����ͼƬ�����Խ�ͼƬѹ��Ϊzip��ʽ�ϴ���Ŀ¼�ṹ����</td>
</tr>
</table>
</form>
<div class="tt">���������ϴ�Ŀ¼</div>
<form method="post" action="?">
<input type="hidden" name="moduleid" value="<?php echo $moduleid;?>"/>
<input type="hidden" name="action" value="dir"/>
<input type="hidden" name="itemid" value="<?php echo $itemid;?>"/>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl">Ŀ¼����</td>
<td>
&nbsp;<strong>./file/temp/</strong><input type="text" size="22" name="name"/>&nbsp;&nbsp;
<input type="submit" value=" �� ȡ " class="btn"/>
</td>
</tr>
<tr>
<td class="tl">��ʾ��Ϣ</td>
<td class="f_gray">&nbsp;���ͬʱ�ϴ�����ͼƬ�����Դ���Ŀ¼���ͼƬ����FTP�ϴ�Ŀ¼�� file/temp/ Ŀ¼</td>
</tr>
</table>
</form>
<script type="text/javascript">Menuon(<?php echo $menuid;?>);</script>
</body>
</html>