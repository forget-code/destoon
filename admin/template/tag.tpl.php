<?php
defined('IN_DESTOON') or exit('Access Denied');
include tpl('header');
show_menu($menus);
?>
<div class="tt">��ǩ������</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl">����ģ��</td>
<td><input type="text" name="setting[moduleid]" size="20" id="moduleid" value="<?php echo $mid;?>"/>
<select onchange="mod(this.value);">
<option value="">��ѡ��</option>
<option value="$moduleid">����</option>
<?php foreach($MODULE as $k=>$v) {
	if($k > 4 && !$v['islink']) echo '<option value="'.$k.'"'.($k == $mid ? ' selected' : '').'>'.$v['name'].'</option>';
}
?>
</select>
</td>
<td width="100">moduleid</td>
</tr>
<tr>
<td class="tl">���ݱ�</td>
<td><input type="text" name="setting[table]" size="20" id="table"/>
<span id="stable"><select onchange="$('table').value=this.value">
<option value="">ѡ���</option>
<?php echo $table_select;?>
</select></span>
<a href="javascript:$('stable').innerHTML=$('alltable').value;void(0);" class="t">[��ʾ����]</a>
<?php tips('���ݱ��ǵ������ݵ���Դ<br>ϵͳ�������ͬ���ݿ������������');?>
<textarea style="display:none;" id="alltable">
<select onchange="$('table').value=this.value">
<option value="">ѡ���</option>
<?php echo $all_select;?>
</select>
</textarea>
</td>
<td>table</td>
</tr>
<tr>
<td class="tl">��������</td>
<td><input type="text" name="setting[condition]" size="50" value="1" id="condition"/>
<select onchange="$('condition').value=this.value">
<option value="">���õ�������</option>
<option value="1">��������</option>
<option value="status=3">�ѷ�������Ϣ</option>
<option value="status=3 and thumb<>''">��ͼ����Ϣ</option>
<option value="status=3 and vip>0"><?php echo VIP;?>��Ϣ</option>
</select>
<?php tips('1��ʾ��������<br>������Ҫ��MySQL�﷨��һ���˽�');?>
</td>
<td>condition</td>
</tr>
<tr>
<td class="tl">�������� <span class="f_red">*</span></td>
<td><input type="text" name="setting[pagesize]" size="10" value="10" id="pagesize"/></td>
<td>pagesize</td>
</tr>
<tr>
<td class="tl">����ʽ</td>
<td><input type="text" name="setting[order]" size="30" id="order"/>
<select onchange="$('order').value=this.value">
<option value="">��������ʽ</option>
<option value="itemid desc">����ϢID����</option>
<option value="edittime desc">���޸�ʱ������</option>
<option value="addtime desc">�����ʱ������</option>
<option value="vip desc">��VIP����</option>
<option value="hits desc">�������������</option>
<option value="rand() desc">���������</option>
</select>
<?php tips('��ǩģ��λ��ģ��Ŀ¼��tagĿ¼��');?>
</td>
<td>order</td>
</tr>
<tr>
<td class="tl">��������</td>
<td><input type="text" name="setting[catid]" size="30" id="catid"/>
<?php if($mid) { ?>
<?php echo ajax_category_select('catids', '���޷���', 0, $mid);?>
<a href="javascript:cat();" class="t">&larr;���</a>
<?php } else { ?>
<span id="scatid"><select onchange="$('catid').value=this.value;">
<option value="">���޷���</option>
<option value="$catid">����</option>
</select></span>
<?php } ?>
</td>
<td>catid</td>
</tr>
<tr>
<td class="tl">�����ӷ���</td>
<td>
<input type="radio" name="setting[child]" value="1" checked/> ��&nbsp;&nbsp;
<input type="radio" name="setting[child]" value="0" id="child"/> ��
</td>
<td>child</td>
</tr>
<tr>
<td class="tl">��������</td>
<td><input type="text" name="setting[areaid]" size="30" id="areaid"/>
<?php echo ajax_area_select('areaids', '���޵���');?>
<a href="javascript:are();" class="t">&larr;���</a>
</td>
<td>areaid</td>
</tr>
<tr>
<td class="tl">�����ӵ���</td>
<td>
<input type="radio" name="setting[areachild]" value="1" checked/> ��&nbsp;&nbsp;
<input type="radio" name="setting[areachild]" value="0" id="areachild"/> ��
</td>
<td>areachild</td>
</tr>
<tr>
<td class="tl">����ʱ��</td>
<td><input type="text" name="setting[expires]" size="10" id="expires"/>
<select onchange="$('expires').value=this.value">
<option value="">Ĭ�ϻ���</option>
<option value="-1">������</option>
<option value="-2">SQL����</option>
<option value="600">�Զ���ʱ��(��)</option>
</select>
</td>
<td>expires</td>
</tr>
<tr>
<td class="tl">��ʾ������Ϣ</td>
<td>
<input type="radio" name="setting[debug]" value="1" id="debug"/> ��&nbsp;&nbsp;
<input type="radio" name="setting[debug]" value="0" checked/> ��
</td>
<td>debug</td>
</tr>
<tr>
<td class="tl">��ǩģ�� <span class="f_red">*</span></td>
<td>
<?php echo tpl_select('', 'tag', 'setting[template]', '��ѡ��', '0', 'id="template"');?>
</td>
<td>template</td>
</tr>
<tr>
<td class="tl">

</td>
<td>
<input type="button" value="���ɱ�ǩ" class="btn" onclick="mk_tag();"/>
</td>
<td> </td>
</table>
<form method="post" action="?" target="destoon_tag" onsubmit="return check();">
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<input type="hidden" name="action" value="preview"/>
<input type="hidden" id="tag_expires" name="tag_expires"/>
<div class="tt">��ǩ����</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl">�Զ���CSS</td>
<td><textarea name="tag_css" id="tag_css"  style="width:98%;height:40px;font-family:Fixedsys,verdana;overflow:visible;color:green;"></textarea> 
</td>
</tr>
<tr>
<td class="tl">HTML��ʼ��ǩ</td>
<td><input type="text" name="tag_html_s" id="tag_html_s" size="30" value="" style="font-family:Fixedsys,verdana;"/></td>
</tr>
<tr>
<td class="tl">��ǩ���� <span class="f_red">*</span></td>
<td><textarea name="tag_code" id="tag_code"  style="width:98%;height:40px;font-family:Fixedsys,verdana;overflow:visible;color:blue;"></textarea> 
</td>
</tr>
<tr>
<td class="tl">JS����</td>
<td><textarea name="tag_js" id="tag_js"  style="width:98%;height:40px;font-family:Fixedsys,verdana;overflow:visible;color:#800000;"></textarea> 
</td>
</tr>
<tr>
<td class="tl">HTML������ǩ</td>
<td><input type="text" name="tag_html_e" id="tag_html_e" size="10" value="" style="font-family:Fixedsys,verdana;"/></td>
</tr>
<tr>
<td class="tl"></td>
<td>
<input type="submit" name="submit" value="Ԥ����ǩ" class="btn"/>
<input type="button" value="���Ʊ�ǩ" class="btn" onclick="copy_tag();"/>
<input type="button" value="��ձ�ǩ" class="btn" onclick="$('tag_code').value='';"/>
<input type="button" value="���CSS" class="btn" onclick="$('tag_css').value='';"/>
<input type="button" value="���HTML" class="btn" onclick="$('tag_html_s').value='';$('tag_html_e').value='';"/>
</td>
</tr>
</table>
</form>
<div class="tt">�����ֲ�</div>
<table cellpadding="2" cellspacing="1" class="tb" style="line-height:200%;">
<tr>
<td class="tl">ǰ��</td>
<td>
��ǩ������������Ҫ��վ������Ա��һ����HTML+CSS֪ʶ������PHP+MySQL�г������˽⡣<br/>
<strong>���ù���</strong>ʵ���ǰ���<span style="color:#006699;">��������</span>��<span style="color:#006699;">���ݱ�</span>��ȡ<span style="color:#006699;">��������</span>�����ݣ�����<span style="color:#006699;">����ʽ</span>��������ͨ��<span style="color:#006699;">��ǩģ��</span>�Ĳ���������ݡ�<br/>
��ҳ�������ޣ���Ϊ���������෽���������ע�ٷ��̳̼���̳��<a href="http://help.destoon.com/faq/tag.php?tc=client" target="_blank">http://help.destoon.com/faq/tag.php</a><br/>
</td>
</tr>
<tr>
<td class="tl">����ԭ��</td>
<td>
<strong>tag</strong>($parameter, $expires = 0)<br/>
$parameter ��ʾ���ݸ�tag�������ַ�����ϵͳ�Զ�����ת��Ϊ�������<br/>
���紫�� table=destoon&pagesize=10��ϵͳ�൱�ڵõ�$table = 'destoon'��$pagesize = 10����������<br/>
$expires ��ʾ�������ʱ��<br/>
<span style="color:blue;">>0</span>  ����$expires�룻<span style="color:blue;">0</span> - ϵͳĬ��ʱ�䣻<span style="color:blue;">-1</span> - �����棻<span style="color:blue;">-2</span> - ����SQL��һ���������Ĭ�ϼ��ɡ�<br/>
</td>
</tr>
<tr>
<td class="tl">����</td>
<td>
<strong>{DT_SKIN}</strong><br/>
ϵͳ�����ַ��<br/>
<strong>{DT_PATH}</strong><br/>
��վ��ҳ��ַ��<br/>
</td>
</tr>
<tr>
<td class="tl">����</td>
<td>
<strong>$tags</strong><br/>
���������ͱ����ǩ���õ����ݣ���ͨ��loop�﷨������ʾ��<br/>
<strong>$pages</strong><br/>
�������ݷ�ҳ���룬���ڵ����˷�ҳʱ��Ч��<br/>
<strong>$MODULE[5][name]</strong><br/>
IDΪ5��ģ�����ơ�<br/>
<strong>$MODULE[5][linkurl]</strong><br/>
IDΪ5��ģ����ַ��<br/>
<strong>$CATEGORY[5][catname]</strong><br/>
IDΪ5�ķ�������(������$CATEGORY����ʱ��Ч)��<br/>
<strong>$CATEGORY[5][linkurl]</strong><br/>
IDΪ5�ķ�����ַ(������$CATEGORY����ʱ��Ч)��<br/>
</td>
</tr>
<tr>
<td class="tl">�����ֶ�</td>
<td>
<strong>title</strong> ���⣻ <strong>linkurl</strong> ���ӣ� <strong>catid</strong> ����ID�� <strong>introduce</strong> ��飻 <strong>addtime</strong> ���ʱ�䣻
</td>
</tr>
<tr>
<td class="tl">���ú���</td>
<td>
<strong>dsubstr</strong>($string, $length, $suffix = '')<br/>
���ַ���$string��ȡΪ$length��,β��׷��$suffix(����..)<br/>
<strong>date</strong>($format, $timestamp)<br/>
��ʱ���$timestampת��Ϊ$format(����Y-m-d)��ʽ<br/>
</td>
</tr>
<tr>
<td class="tl">��ǩģ��</td>
<td>
ģ�屣����./template/<?php echo $CFG['template'];?>/tag/Ŀ¼��<br/>
���鲻Ҫɾ�������޸��Դ���ģ�壬�Ƽ����Դ�ģ��������½�ģ�岢Ӧ�á�<br/>
</td>
</tr>
</table>
</div>
<script type="text/javascript">
function mk_tag() {
	var tag = js = '';
	if($('moduleid').value == '' && $('table').value == '') {
		alert('����ģ�� �� ���ݱ� ����ָ��һ��');
		return false;
	}
	if($('moduleid').value != '') tag += '&moduleid='+$('moduleid').value;
	if($('table').value != '') tag += '&table='+$('table').value;
	if($('catid').value != '') tag += '&catid='+$('catid').value;
	if($('catid').value != '' && $('child').checked) tag += '&child=0';
	if($('areaid').value != '') tag += '&areaid='+$('areaid').value;
	if($('areaid').value != '' && $('areachild').checked) tag += '&areachild=0';
	if($('condition').value != '' && $('condition').value != '1') tag += '&condition='+$('condition').value;
	if($('pagesize').value == '') {
		alert('����д��������');
		$('pagesize').focus();
		return;
	} else {
		tag += '&pagesize='+$('pagesize').value;
	}
	if($('order').value != '') tag += '&order='+$('order').value;
	if($('template').value != 0) tag += '&template='+$('template').value;
	if($('debug').checked) tag += '&debug=1';
	tag = tag.substr(1);
	var rp = false;
	for(var i=0;i<tag.length;i++) {
		if(tag.charAt(i) == '$') {
			js += '{$'
			rp = true;
		} else if(rp && tag.charAt(i) == '&') {
			js += '}&';
			rp = false;
		} else {
			js += tag.charAt(i);
		}
	}
	js = '<script type="text/javascript" src="<?php echo DT_PATH;?>api/js.php?'+js;
	tag = '<!--{tag("'+tag+'"';
	if($('expires').value != '') {
		tag += ', '+$('expires').value;
		js += '&tag_expires='+$('expires').value;
	}
	js = js+'"><\/script>';
	tag = tag+')}-->';
	$('tag_code').value = tag;
	$('tag_js').value = js;
}
function copy_tag() {
	if(!$('tag_code').value) return;
	$('tag_code').select();
	if(isIE) {
		clipboardData.setData('text', $('tag_code').value);
	} else {
		prompt('Press Ctrl+C Copy to Clipboard', $('tag_code').value);
	}
}
function check() {
	if($('expires').value != '') $('tag_expires').value = $('expires').value
	if($('tag_code').value == '') {
		if(confirm('��ǩ������δ���ɣ�����������')) mk_tag();
		return false;
	}
}
function mod(m) {
	$('moduleid').value = m;
	if(m == '' || m == '$moduleid') return false;
	Go('?file=<?php echo $file;?>&mid='+m);
}
function cat() {
	if($('catid_1').value > 0) {
		toinp($('catid_1').value, 'catid');
	} else {
		$('catid').value = '';
	}
}
function are() {
	if($('areaid_1').value > 0) {
		toinp($('areaid_1').value, 'areaid');
	} else {
		$('areaid').value = '';
	}
}
function toinp(s, i, p) {
	if($(i).value) {
		var p = p ? p : ',';
		var a = $(i).value.split(p);
		for (var j=0; j<a.length; j++) {if(s == a[j]) return;}
		$(i).value += p+s;
	} else {
		$(i).value = s;
	}
}
</script>
<script type="text/javascript">Menuon(0);</script>
</body>
</html>