<?php
defined('IN_DESTOON') or exit('Access Denied');
include tpl('header');
show_menu($menus);
?>
<form method="post" action="?" id="dform" onsubmit="return check();">
<input type="hidden" name="moduleid" value="<?php echo $moduleid;?>"/>
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<div class="tt">���֤��</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl">��Ա�� <span class="f_red">*</span></td>
<td><input name="post[username]" type="text"  size="20" value="<?php echo $_username;?>"/></td>
</tr>
<tr>
<td class="tl">֤����� <span class="f_red">*</span></td>
<td><input name="post[title]" type="text" id="title" size="40" /> <?php echo dstyle('post[style]');?> <span id="dtitle" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">��֤���� <span class="f_red">*</span></td>
<td><input type="text" size="40" id="authority" name="post[authority]"/> <span id="dauthority" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">��֤���� <span class="f_red">*</span></td>
<td><?php echo dcalendar('post[fromtime]');?> <span id="dpostfromtime" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">��������</td>
<td><?php echo dcalendar('post[totime]');?> <span id="dposttotime" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">֤��ͼƬ <span class="f_red">*</span></td>
<td>
	<input type="hidden" name="post[thumb]" id="thumb"/>
	<table width="120">
	<tr align="center" height="120" class="c_p">
	<td width="120"><img src="<?php echo DT_SKIN;?>image/waitpic.gif" id="showthumb" title="Ԥ��ͼƬ" alt="" onclick="if(this.src.indexOf('waitpic.gif') == -1){_preview($('showthumb').src, 1);}else{Dalbum('',<?php echo $moduleid;?>,100, 100, $('thumb').value, true);}"/></td>
	</tr>
	<tr align="center" height="25">
	<td><span onclick="Dalbum('',<?php echo $moduleid;?>,100, 100, $('thumb').value, true);" class="jt">[�ϴ�]</span>&nbsp;<span onclick="delAlbum('','wait');" class="jt">[ɾ��]</span></td>
	</tr>
	</table>
	<span id="dthumb" class="f_red"></span>
</td>
</tr>
<tr>
<td class="tl">֤�����</td>
<td class="tr"><textarea name="post[content]" id="content" class="dsn"></textarea>
<?php echo deditor($moduleid, 'content', 'Default', '98%', 350);?><span id="dcontent" class="f_red"></span>
</td>
</tr>
<tr>
<td class="tl">֤��״̬</td>
<td>
<input type="radio" name="post[status]" value="3" checked/> ͨ��
<input type="radio" name="post[status]" value="2" /> ����
</td>
</tr>
<tr title="�뱣��ʱ���ʽ">
<td class="tl">���ʱ��</td>
<td><input type="text" size="22" name="post[addtime]" value="<?php echo $addtime;?>"/></td>
</tr>
</table>
<div class="sbt"><input type="submit" name="submit" value=" ȷ �� " class="btn"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" name="reset" value=" �� �� " class="btn"/></div>
</form>
<?php load('clear.js'); ?>
<script type="text/javascript">
function check() {
	if($('title').value == '') {
		Dmsg('����д֤������', 'title');
		return false;
	}
	if($('authority').value == '') {
		Dmsg('����д��֤����', 'authority');
		return false;
	}
	if($('postfromtime').value == '') {
		Dmsg('��ѡ��֤����', 'postfromtime');
		return false;
	}
	if($('thumb').value == '') {
		Dmsg('���ϴ�֤��ͼƬ', 'thumb', 1);
		return false;
	}
	return true;
}
</script>
<script type="text/javascript">Menuon(0);</script>
</body>
</html>