<?php
defined('IN_DESTOON') or exit('Access Denied');
function im_qq($id, $style = 0) {
	return $id ? '<a href="tencent://message/?uin='.$id.'&Menu=yes"><img src="http://wpa.qq.com/pa?p=1:'.$id.':4" title="���QQ��̸/����" align="absmiddle" onerror="this.src=SKPath+\'image/qq-off.gif\'"/></a>' : '';
}

function im_ali($id, $style = 0) {
	return $id ? '<a target="_blank" href="http://amos.im.alisoft.com/msg.aw?v=2&uid='.$id.'&site=cnalichn&s=6"><img src="http://amos.im.alisoft.com/online.aw?v=2&uid='.$id.'&site=cnalichn&s=6" title="���������̸/����" align="absmiddle" onerror="this.src=SKPath+\'image/ali-off.gif\'" onload="if(this.width>20)this.src=SKPath+\'image/ali-off.gif\'"/></a>' : '';
}

function im_msn($id, $style = 0) {
	return $id ? '<a href="msnim:chat?contact='.$id.'"><img src="'.DT_SKIN.'image/msn.gif" width="16" height="16" title="���MSN��̸/����" align="absmiddle"/></a>' : '';
}

function im_skype($id, $style = 0) {
	return $id ? '<a href="callto://'.$id.'"><img src="http://mystatus.skype.com/smallicon/'.$id.'" title="���Skypeͨ��" align="absmiddle" onerror="this.src=SKPath+\'image/skype-off.gif\'"/></a>' : '';
}
?>