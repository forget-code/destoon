<?php
defined('IN_DESTOON') or exit('Access Denied');
include tpl('header');
$menus = array (
    array('��������'),
    array('��˾���'),
    array('�������'),
    array('֧���ӿ�'),
    array($DT['credit_name'].'����'),
    array('��Ա����'),
    array('�����ֶ�', '?file=fields&tb='.$table),
);
show_menu($menus);
?>
<form method="post" action="?">
<input type="hidden" name="moduleid" value="<?php echo $moduleid;?>"/>
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<input type="hidden" name="tab" id="tab" value="<?php echo $tab;?>"/>
<div id="Tabs0" style="display:">
<div class="tt">ע������</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl">���û�ע��</td>
<td>
<input type="radio" name="setting[enable_register]" value="1"  <?php if($enable_register) echo 'checked';?>/> ����&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[enable_register]" value="0"  <?php if(!$enable_register) echo 'checked';?>/> �ر�
</td>
</tr>
<tr>
<td class="tl">��ֹ���������ע��</td>
<td>
<input type="radio" name="setting[defend_proxy]" value="1"  <?php if($defend_proxy) echo 'checked';?>/> ����&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[defend_proxy]" value="0"  <?php if(!$defend_proxy) echo 'checked';?>/> �ر�
</td>
</tr>
<tr>
<td class="tl">IPע��������(Сʱ)</td>
<td>
<input type="text" size="3" name="setting[iptimeout]" value="<?php echo $iptimeout;?>"/><?php tips('ͬһIP�ڱ�ʱ�����ڽ�ֻ��ע��һ���ʺţ���0Ϊ������');?>
</td>
</tr>
<tr>
<td class="tl">�û�������</td>
<td>
<input type="text" size="3" name="setting[minusername]" value="<?php echo $minusername;?>"/>
��
<input type="text" size="3" name="setting[maxusername]" value="<?php echo $maxusername;?>"/>
�ַ�<?php tips('��������Ϊ4-20���ַ�֮��');?>
</td>
</tr>
<tr>
<td class="tl">�û����볤��</td>
<td>
<input type="text" size="3" name="setting[minpassword]" value="<?php echo $minpassword;?>"/>
��
<input type="text" size="3" name="setting[maxpassword]" value="<?php echo $maxpassword;?>"/>
�ַ�<?php tips('���̵����벻�����û����ʻ���ȫ<br/>��������Ϊ6-20���ַ�֮�䣬��Ҫ����31λ');?>
</td>
</tr>
<tr>
<td class="tl">�û��������ؼ���</td>
<td><textarea name="setting[banusername]" style="width:96%;height:50px;overflow:visible;"><?php echo $banusername;?></textarea><?php tips('���б����Ĺؼ��ֵ��û���������ֹʹ�ã�������������<br/>��������ؼ�������|����');?>
</td>
</tr>
<tr>
<td class="tl">���û�ע����֤</td>
<td>
<input type="radio" name="setting[checkuser]" value="0"  <?php if(!$checkuser) echo 'checked';?>> ������֤
&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[checkuser]" value="1"  <?php if($checkuser==1) echo 'checked';?>> �˹����&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[checkuser]" value="2"  <?php if($checkuser==2) echo 'checked';?>> �ʼ���֤
</td>
</tr>
<tr>
<td class="tl">ע�ᷢ�ͻ�ӭ��Ϣ</td>
<td>
<input type="radio" name="setting[welcome]" value="0"  <?php if(!$welcome) echo 'checked';?>/> ������
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[welcome]" value="1"  <?php if($welcome==1) echo 'checked';?>/> վ�ڶ���&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[welcome]" value="2"  <?php if($welcome==2) echo 'checked';?>/> �����ʼ�&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[welcome]" value="3"  <?php if($welcome==3) echo 'checked';?>/> վ�ڶ��ź͵����ʼ�
</td>
</tr>

<tr>
<td class="tl">ע������<?php echo $DT['money_name'];?></td>
<td>
<input type="text" size="3" name="setting[money_register]" value="<?php echo $money_register;?>"/> <?php echo $DT['money_unit'];?>
</td>
</tr>

<tr>
<td class="tl">�ͻ�������</td>
<td><textarea name="setting[banagent]" style="width:96%;height:50px;overflow:visible;"><?php echo $banagent;?></textarea><?php tips('Ⱥ���������α��IP�����ǲ���������͵Ŀͻ�����Ϣ��ͬ<br/>����ĳȺ������Ŀͻ�����Ϣȫ������ .NET CLR 1.0.3705<br/>���ڴ�ֱ�����κ��д���������Ŀͻ���ע��<br/>������������� | �ָ�<br/>�û�ע��Ŀͻ�����Ϣ�Ѽ�¼�����ڻ�Ա������鿴�ͷ���<br/>�û���¼��־��Ҳ��¼�˿ͻ�����Ϣ����ע�����');?>
</td>
</tr>
<tr>
<td class="tl">վ�ڶ���ͬʱ��෢����</td>
<td>
<input type="text" size="3" name="setting[maxtouser]" value="<?php echo $maxtouser;?>"/> λ��Ա<?php tips('��С��1��������5���ʾ��ͬһ�ż�һ��������ͬʱ���͸�5λ��Ա');?>
</td>
</tr>
<tr>
<td class="tl">����վ�ڶ���������֤��</td>
<td>
<input type="radio" name="setting[captcha_sendmessage]" value="2"  <?php if($captcha_sendmessage == 2) echo 'checked';?>> �̳л�Ա������&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[captcha_sendmessage]" value="1"  <?php if($captcha_sendmessage == 1) echo 'checked';?>> ȫ������&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[captcha_sendmessage]" value="0"  <?php if($captcha_sendmessage == 0) echo 'checked';?>> ȫ���ر�
</td>
</tr>
<tr>
<td class="tl">��¼ʧ�ܴ�������</td>
<td><input type="text" size="3" name="setting[login_times]" value="<?php echo $login_times;?>"/> �ε�¼ʧ�ܺ�������¼ <input type="text" size="3" name="setting[lock_hour]" value="<?php echo $lock_hour;?>"/> Сʱ
</td>
</tr>
<tr>
<td class="tl">��֤�ʼ���Ч��</td>
<td>
<input type="text" size="3" name="setting[auth_days]" value="<?php echo $auth_days;?>"/> ��<?php tips('��֤�����ӳ�����Ч��������ʧЧ ��0Ϊ������');?>
</td>
</tr>

<tr>
<td class="tl">ó������ģ��ID</td>
<td>
<input type="text" size="20" name="setting[alertid]" value="<?php echo $alertid;?>"/> <?php tips('����5|6���� ��Ӧ|�󹺣�ģ��ID����Ϊ5');?>
</td>
</tr>
<tr>
<td class="tl">ó�����������</td>
<td>
<input type="radio" name="setting[alert_check]" value="2"  <?php if($alert_check == 2) echo 'checked';?>> �̳л�Ա������&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[alert_check]" value="1"  <?php if($alert_check == 1) echo 'checked';?>> ȫ������&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[alert_check]" value="0"  <?php if($alert_check == 0) echo 'checked';?>> ȫ���ر�
</td>
</tr>
<tr>
<td class="tl">��Ա������֤</td>
<td>
<input type="radio" name="setting[vmember]" value="1"  <?php if($vmember){ ?>checked <?php } ?> onclick="Ds('dvm');"/> ����&nbsp;&nbsp;
<input type="radio" name="setting[vmember]" value="0"  <?php if(!$vmember){ ?>checked <?php } ?> onclick="Dh('dvm');"/> �ر�
</td>
</tr>
<tbody id="dvm" style="display:<?php if(!$vmember) echo 'none';?>">
<tr>
<td class="tl">�ʼ���֤</td>
<td>
<input type="radio" name="setting[vemail]" value="1"  <?php if($vemail){ ?>checked <?php } ?>/> ����&nbsp;&nbsp;
<input type="radio" name="setting[vemail]" value="0"  <?php if(!$vemail){ ?>checked <?php } ?>/> �ر�
</td>
</tr>
<tr>
<td class="tl">�ֻ���֤</td>
<td>
<input type="radio" name="setting[vmobile]" value="1"  <?php if($vmobile){ ?>checked <?php } ?>/> ����&nbsp;&nbsp;
<input type="radio" name="setting[vmobile]" value="0"  <?php if(!$vmobile){ ?>checked <?php } ?>/> �ر�
</td>
</tr>
<tr>
<td class="tl">������֤</td>
<td>
<input type="radio" name="setting[vtruename]" value="1"  <?php if($vtruename){ ?>checked <?php } ?>/> ����&nbsp;&nbsp;
<input type="radio" name="setting[vtruename]" value="0"  <?php if(!$vtruename){ ?>checked <?php } ?>/> �ر�
</td>
</tr>
<tr>
<td class="tl">�����ʺ���֤</td>
<td>
<input type="radio" name="setting[vbank]" value="1"  <?php if($vbank){ ?>checked <?php } ?>/> ����&nbsp;&nbsp;
<input type="radio" name="setting[vbank]" value="0"  <?php if(!$vbank){ ?>checked <?php } ?>/> �ر�
</td>
</tr>
<tr>
<td class="tl">��˾��֤</td>
<td>
<input type="radio" name="setting[vcompany]" value="1"  <?php if($vcompany){ ?>checked <?php } ?>/> ����&nbsp;&nbsp;
<input type="radio" name="setting[vcompany]" value="0"  <?php if(!$vcompany){ ?>checked <?php } ?>/> �ر�
</td>
</tr>
<tr>
<td class="tl">��֤ר�ô������</td>
<td>
<input type="text" size="30" name="setting[vfax]" value="<?php echo $vfax;?>"/> <?php tips('������ô��棬����ʾ�û�����ѡ����֤��������֤');?>
</td>
</tr>
</tbody>
<tr>
<td class="tl">�༭�����߰�ť</td>
<td>
<select name="setting[editor]">
<option value="Default"<?php if($editor == 'Default') echo ' selected';?>>ȫ��</option>
<option value="Destoon"<?php if($editor == 'Destoon') echo ' selected';?>>����</option>
<option value="Simple"<?php if($editor == 'Simple') echo ' selected';?>>���</option>
<option value="Basic"<?php if($editor == 'Basic') echo ' selected';?>>����</option>
</select>
</td>
</tr>
<tr>
<td class="tl">����������ʾ���в˵�</td>
<td>
<input type="radio" name="setting[show_menu]" value="1"  <?php if($show_menu) echo 'checked';?>/> ����&nbsp;&nbsp;
<input type="radio" name="setting[show_menu]" value="0"  <?php if(!$show_menu) echo 'checked';?>/> �ر�<?php tips('ѡ��ر� ��������Ȩ�޷��ʵĲ˵�');?>
</td>
</tr>
<tr>
<td class="tl">�û�ע���ʼ���֤��</td>
<td>
<input type="radio" name="setting[emailcode_register]" value="1"  <?php if($emailcode_register) echo 'checked';?>/> ����&nbsp;&nbsp;
<input type="radio" name="setting[emailcode_register]" value="0"  <?php if(!$emailcode_register) echo 'checked';?>/> �ر�
</td>
</tr>
<tr>
<td class="tl">�û�ע����֤��</td>
<td>
<input type="radio" name="setting[captcha_register]" value="1"  <?php if($captcha_register) echo 'checked';?>/> ����&nbsp;&nbsp;
<input type="radio" name="setting[captcha_register]" value="0"  <?php if(!$captcha_register) echo 'checked';?>/> �ر�
</td>
</tr>
<tr>
<td class="tl">�û�ע����֤����</td>
<td>
<input type="radio" name="setting[question_register]" value="1"  <?php if($question_register) echo 'checked';?>/> ����&nbsp;&nbsp;
<input type="radio" name="setting[question_register]" value="0"  <?php if(!$question_register) echo 'checked';?>/> �ر�
</td>
</tr>
<!--
<tr>
<td class="tl">�û�ע��������</td>
<td>
<input type="radio" name="setting[promo_register]" value="1"  <?php if($promo_register) echo 'checked';?>/> ����&nbsp;&nbsp;
<input type="radio" name="setting[promo_register]" value="0"  <?php if(!$promo_register) echo 'checked';?>/> �ر�
</td>
</tr>
-->
<tr>
<td class="tl">�û���¼������֤��</td>
<td>
<input type="radio" name="setting[captcha_login]" value="1"  <?php if($captcha_login) echo 'checked';?>/> ����&nbsp;&nbsp;
<input type="radio" name="setting[captcha_login]" value="0"  <?php if(!$captcha_login) echo 'checked';?>/> �ر�
</td>
</tr>
<tr>
<td class="tl">�û���¼Ĭ�ϼ�ס��Ա</td>
<td>
<input type="radio" name="setting[login_remember]" value="1"  <?php if($login_remember) echo 'checked';?>/> ����&nbsp;&nbsp;
<input type="radio" name="setting[login_remember]" value="0"  <?php if(!$login_remember) echo 'checked';?>/> �ر�
</td>
</tr>
<tr>
<td class="tl">�û���¼Ĭ�Ͻ���������</td>
<td>
<input type="radio" name="setting[login_goto]" value="1"  <?php if($login_goto) echo 'checked';?>/> ����&nbsp;&nbsp;
<input type="radio" name="setting[login_goto]" value="0"  <?php if(!$login_goto) echo 'checked';?>/> �ر�
</td>
</tr>
</table>
</div>

<div id="Tabs1" style="display:none;">
<div class="tt">��˾���</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl">��˾����</td>
<td><input type="text" name="setting[com_type]" style="width:98%;" value="<?php echo $com_type;?>"/></td>
</tr>
<tr>
<td class="tl">��˾��ģ</td>
<td><input type="text" name="setting[com_size]" style="width:98%;" value="<?php echo $com_size;?>"/></td>
</tr>
<tr>
<td class="tl">��Ӫģʽ</td>
<td><input type="text" name="setting[com_mode]" style="width:98%;" value="<?php echo $com_mode;?>"/></td>
</tr>
<tr>
<td class="tl">��˾ע���ʱ���������</td>
<td><input type="text" name="setting[money_unit]" style="width:98%;" value="<?php echo $money_unit;?>"/></td>
</tr>
<tr>
<td class="tl"></td>
<td class="f_red">������������ | �ָ����ͣ���β����Ҫ |</td>
</tr>
<tr>
<td class="tl">��Ӫģʽ����ѡ</td>
<td>
<input type="text" size="3" name="setting[mode_max]" value="<?php echo $mode_max;?>"/>
</td>
</tr>
<tr>
<td class="tl">��Ӫ��ҵ����ѡ</td>
<td>
<input type="text" size="3" name="setting[cate_max]" value="<?php echo $cate_max;?>"/>
</td>
</tr>
<tr>
<td class="tl">Ĭ������ͼ[��X��]</td>
<td>
<input type="text" size="3" name="setting[thumb_width]" value="<?php echo $thumb_width;?>"/>
X
<input type="text" size="3" name="setting[thumb_height]" value="<?php echo $thumb_height;?>"/> px
</td>
</tr>
<tr>
<td class="tl">��ȡ��˾���������</td>
<td>Ĭ�Ͻ�ȡ <input type="text" size="3" name="setting[introduce_length]" value="<?php echo $introduce_length;?>"/> �ַ�
</td>
</tr>
<tr>
<td class="tl">���ع�˾����Զ��ͼƬ</td>
<td>
<input type="radio" name="setting[introduce_save]" value="1"  <?php if($introduce_save) echo 'checked';?>/> ����&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[introduce_save]" value="0"  <?php if(!$introduce_save) echo 'checked';?>/> �ر�
</td>
</tr>

<tr>
<td class="tl">�����˾������������</td>
<td>
<input type="radio" name="setting[introduce_clear]" value="1"  <?php if($introduce_clear) echo 'checked';?>/> ����&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[introduce_clear]" value="0"  <?php if(!$introduce_clear) echo 'checked';?>/> �ر�
</td>
</tr>

<tr>
<td class="tl">��˾���������</td>
<td>
<input type="radio" name="setting[news_check]" value="2"  <?php if($news_check == 2) echo 'checked';?>> �̳л�Ա������&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[news_check]" value="1"  <?php if($news_check == 1) echo 'checked';?>> ȫ������&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[news_check]" value="0"  <?php if($news_check == 0) echo 'checked';?>> ȫ���ر�

</td>
</tr>

<tr>
<td class="tl">������������Զ��ͼƬ</td>
<td>
<input type="radio" name="setting[news_save]" value="1"  <?php if($news_save) echo 'checked';?>/> ����&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[news_save]" value="0"  <?php if(!$news_save) echo 'checked';?>/> �ر�
</td>
</tr>

<tr>
<td class="tl">�������������������</td>
<td>
<input type="radio" name="setting[news_clear]" value="1"  <?php if($news_clear) echo 'checked';?>/> ����&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[news_clear]" value="0"  <?php if(!$news_clear) echo 'checked';?>/> �ر�
</td>
</tr>

<tr>
<td class="tl">�������������</td>
<td>
<input type="radio" name="setting[credit_check]" value="2"  <?php if($credit_check == 2) echo 'checked';?>> �̳л�Ա������&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[credit_check]" value="1"  <?php if($credit_check == 1) echo 'checked';?>> ȫ������&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[credit_check]" value="0"  <?php if($credit_check == 0) echo 'checked';?>> ȫ���ر�
</td>
</tr>

<tr>
<td class="tl">����֤�����Զ��ͼƬ</td>
<td>
<input type="radio" name="setting[credit_save]" value="1"  <?php if($credit_save) echo 'checked';?>/> ����&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[credit_save]" value="0"  <?php if(!$credit_save) echo 'checked';?>/> �ر�
</td>
</tr>

<tr>
<td class="tl">���֤���������</td>
<td>
<input type="radio" name="setting[credit_clear]" value="1"  <?php if($credit_clear) echo 'checked';?>/> ����&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[credit_clear]" value="0"  <?php if(!$credit_clear) echo 'checked';?>/> �ر�
</td>
</tr>

<tr>
<td class="tl">�������������</td>
<td>
<input type="radio" name="setting[link_check]" value="2"  <?php if($link_check == 2) echo 'checked';?>> �̳л�Ա������&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[link_check]" value="1"  <?php if($link_check == 1) echo 'checked';?>> ȫ������&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[link_check]" value="0"  <?php if($link_check == 0) echo 'checked';?>> ȫ���ر�
</td>
</tr>
</table>
</div>
<div id="Tabs2" style="display:none">
<div class="tt">�������</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl">��Ա���߳�ֵ</td>
<td>
<input type="radio" name="setting[pay_online]" value="1"  <?php if($pay_online) echo 'checked';?>/> ����&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[pay_online]" value="0"  <?php if(!$pay_online) echo 'checked';?>/> �ر�
</td>
</tr>
<tr>
<td class="tl">��С��ֵ���</td>
<td><input type="text" size="20" name="setting[mincharge]" value="<?php echo $mincharge;?>"/> 0��ʾ���ޣ������ֱ�ʾ��С��ȣ�����������|�ָ��ʾѡ����</td>
<tr>
<td class="tl">���¸��ʽ��ҳ��ַ</td>
<td><input type="text" size="60" name="setting[pay_url]" value="<?php echo $pay_url;?>"/><?php tips('���δ���û�Ա���߳�ֵ����ϵͳ�Զ���ת���˵�ַ�鿴��ͨ���ʽ�������ò���ĵ���ҳ���ܽ���');?></td>
</tr>
<tr>
<td class="tl">��Ա����</td>
<td>
<input type="radio" name="setting[cash_enable]" value="1"  <?php if($cash_enable) echo 'checked';?>/> ����&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[cash_enable]" value="0"  <?php if(!$cash_enable) echo 'checked';?>/> �ر�
</td>
</tr>
<tr>
<td class="tl">���ַ�ʽ</td>
<td><input type="text" name="setting[cash_banks]" style="width:95%;" value="<?php echo $cash_banks;?>"/><?php tips('��ͬ��ʽ���� | �ָ�');?></td>
</tr>
<tr>
<td class="tl">24Сʱ���ִ���</td>
<td><input type="text" size="5" name="setting[cash_times]" value="<?php echo $cash_times;?>"/> 0Ϊ����</td>
</tr>
<tr>
<td class="tl">����������С���</td>
<td><input type="text" size="5" name="setting[cash_min]" value="<?php echo $cash_min;?>"/> 0Ϊ����</td>
</tr>
<tr>
<td class="tl">�������������</td>
<td><input type="text" size="5" name="setting[cash_max]" value="<?php echo $cash_max;?>"/> 0Ϊ����</td>
</tr>
<tr>
<td class="tl">���ַ���</td>
<td><input type="text" size="2" name="setting[cash_fee]" value="<?php echo $cash_fee;?>"/> %</td>
</tr>
<tr>
<td class="tl">������Сֵ</td>
<td><input type="text" size="5" name="setting[cash_fee_min]" value="<?php echo $cash_fee_min;?>"/> 0Ϊ����</td>
</tr>
<tr>
<td class="tl">���ʷⶥֵ</td>
<td><input type="text" size="5" name="setting[cash_fee_max]" value="<?php echo $cash_fee_max;?>"/> 0Ϊ����</td>
</tr>
<tr>
<td class="tl">���Ĭ��ȷ���ջ�ʱ��</td>
<td><input type="text" size="2" name="setting[trade_day]" value="<?php echo $trade_day;?>"/> ��<?php tips('����ڴ�ʱ����δȷ���ջ��������ٲã���ϵͳ�Զ���������ң����׳ɹ�');?></td>
</tr>
<tr>
<td class="tl">����֧����ʽ</td>
<td><input type="text" name="setting[pay_banks]" style="width:95%;" value="<?php echo $pay_banks;?>"/><?php tips('�ֶ����'.$DT['money_name'].'��ˮʱ��ѡ��');?></td>
</tr>
<tr>
<td class="tl">����������ʽ</td>
<td><input type="text" name="setting[send_types]" style="width:95%;" value="<?php echo $send_types;?>"/></td>
</tr>
</table>
</div>
<div id="Tabs3" style="display:none">
<div class="tt">֧���ӿ�</div>
<?php include DT_ROOT.'/api/pay.inc.php';?>
</div>
<div id="Tabs4" style="display:none;">
<div class="tt"><?php echo $DT['credit_name'];?>����</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl">���û�ע�ά��</td>
<td>
<input type="text" size="5" name="setting[credit_register]" value="<?php echo $credit_register;?>"/>
</td>
</tr>
<tr>
<td class="tl">���Ƹ������Ͻ���</td>
<td>
<input type="text" size="5" name="setting[credit_edit]" value="<?php echo $credit_edit;?>"/>
</td>
</tr>
<tr>
<td class="tl">24Сʱ��¼һ�ν���</td>
<td>
<input type="text" size="5" name="setting[credit_login]" value="<?php echo $credit_login;?>"/>
</td>
</tr>
<tr>
<td class="tl">����һλ��Աע�ά��</td>
<td>
<input type="text" size="5" name="setting[credit_user]" value="<?php echo $credit_user;?>"/>
</td>
</tr>
<tr>
<td class="tl">����һ��IP���ʽ���</td>
<td>
<input type="text" size="5" name="setting[credit_ip]" value="<?php echo $credit_ip;?>"/>
</td>
</tr>
<tr>
<td class="tl">24Сʱ����<?php echo $DT['credit_name'];?>����</td>
<td>
<input type="text" size="5" name="setting[credit_maxip]" value="<?php echo $credit_maxip;?>"/>
<?php tips('Ϊ�˷�ֹ���ף�����'.$DT['credit_name'].'���޽����ټ���');?>
</td>
</tr>
<tr>
<td class="tl">���߳�ֵ1<?php echo $DT['money_unit'];?>����</td>
<td>
<input type="text" size="5" name="setting[credit_charge]" value="<?php echo $credit_charge;?>"/> <?php tips('ÿ��ֵ1'.$DT['money_unit'].' ������Ӧ������'.$DT['credit_name']);?>
</td>
</tr>
<tr>
<td class="tl">�ϴ�����֤�齱��</td>
<td>
<input type="text" size="5" name="setting[credit_add_credit]" value="<?php echo $credit_add_credit;?>"/>
</td>
</tr>
<tr>
<td class="tl">����֤�鱻ɾ���۳�</td>
<td>
<input type="text" size="5" name="setting[credit_del_credit]" value="<?php echo $credit_del_credit;?>"/>
</td>
</tr>
<tr>
<td class="tl">������ҵ���Ž���</td>
<td>
<input type="text" size="5" name="setting[credit_add_news]" value="<?php echo $credit_add_news;?>"/>
</td>
</tr>
<tr>
<td class="tl">��ҵ���ű�ɾ���۳�</td>
<td>
<input type="text" size="5" name="setting[credit_del_news]" value="<?php echo $credit_del_news;?>"/>
</td>
</tr>
</table>
<div class="tt"><?php echo $DT['credit_name'];?>����</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl"><?php echo $DT['credit_name'];?>������</td>
<td>
<input type="text" size="50" name="setting[credit_buy]" value="<?php echo $credit_buy;?>"/>
</td>
</tr>
<tr>
<td class="tl"><?php echo $DT['credit_name'];?>��Ӧ�۸�</td>
<td>
<input type="text" size="50" name="setting[credit_price]" value="<?php echo $credit_price;?>"/><br/>
<span class="f_gray"><?php echo $DT['credit_name'];?>�ͼ۸���|�ָ���߱���һһ��Ӧ</span>
</td>
</tr>
</table>
</div>
<div id="Tabs5" style="display:none">
<div class="tt">��Ա����</div>
<table cellpadding="2" cellspacing="1" class="tb">
<tr>
<td class="tl">���û�Ա����</td>
<td>
<input type="radio" name="setting[passport]" value="0"  <?php if(!$passport) echo 'checked';?> onclick="Dh('p_s');Dh('u_c');"/> �ر�&nbsp;&nbsp;
<input type="radio" name="setting[passport]" value="phpwind" <?php if($passport == 'phpwind') echo 'checked';?> onclick="Ds('p_s');Dh('u_c');"/> PHPWind&nbsp;&nbsp;
<input type="radio" name="setting[passport]" value="discuz" <?php if($passport == 'discuz') echo 'checked';?> onclick="Ds('p_s');Dh('u_c');"/> Discuz!(5.x,6.x)&nbsp;&nbsp;
<input type="radio" name="setting[passport]" value="uc" <?php if($passport == 'uc') echo 'checked';?> onclick="Dh('p_s');Ds('u_c');"/> Ucenter(Discuz!7.x,Discuz! X)
</td>
</tr>
<tbody id="p_s" style="display:<?php echo $passport && $passport != 'uc' ? '' : 'none';?>">
<tr>
<td class="tl">���ϳ����ַ�����</td>
<td>
<select name="setting[passport_charset]">
<option value="gbk"<?php if($passport_charset == 'gbk') echo ' selected';?>>GBK/GB2312</option>
<option value="utf-8"<?php if($passport_charset == 'utf-8') echo ' selected';?>>UTF-8</option>
</select>
</td>
</tr>
<tr>
<td class="tl">���ϳ����ַ</td>
<td><input name="setting[passport_url]" type="text" size="50" value="<?php echo $passport_url;?>"/><?php tips('���ϳ���ӿڵ�ַ ����:http://bbs.destoon.com ��β��Ҫ��б��');?></td>
</tr>
<tr>
<td class="tl">������Կ</td>
<td><input name="setting[passport_key]" id="passport_key" type="text" size="30" value="<?php echo $passport_key;?>"/> <a href="javascript:$('passport_key').value=RandStr();void(0);" class="t">[���]</a> </td>
</tr>
</tbody>
<tbody id="u_c" style="display:<?php echo $passport && $passport == 'uc' ? '' : 'none';?>">
<tr>
<td class="tl">API ��ַ</td>
<td><input name="setting[uc_api]" type="text" size="50" value="<?php echo $uc_api;?>"/><?php tips('���ϳ���ӿڵ�ַ ����:http://bbs.destoon.com ��β��Ҫ��б��');?></td>
</tr>
<tr>
<td class="tl">����IP</td>
<td><input name="setting[uc_ip]" type="text" size="50" value="<?php echo $uc_ip;?>"/><?php tips('һ�㲻����д,�����޷�ͬ��ʱ,����дUcenter������IP��ַ');?></td>
</tr>
<tr>
<td class="tl">���Ϸ�ʽ</td>
<td>
<input type="radio" name="setting[uc_mysql]" value="1" <?php if($uc_mysql) echo 'checked';?> onclick="Ds('u_c_m');"/> MySQL
<input type="radio" name="setting[uc_mysql]" value="0" <?php if(!$uc_mysql) echo 'checked';?> onclick="Dh('u_c_m');"/> Զ������
</td>
</tr>
<tr id="u_c_m" style="display:<?php echo $uc_mysql ? '' : 'none';?>">
<td colspan="2" style="padding:10px;">
	<table cellpadding="2" cellspacing="1" class="tb">
	<tr>
	<td class="tl">���ݿ�������</td>
	<td><input name="setting[uc_dbhost]" type="text" size="30" value="<?php echo $uc_dbhost;?>"/></td>
	</tr>
	<tr>
	<td class="tl">���ݿ��û���</td>
	<td><input name="setting[uc_dbuser]" type="text" size="30" value="<?php echo $uc_dbuser;?>"/></td>
	</tr>
	<tr>
	<td class="tl">���ݿ�����</td>
	<td><input name="setting[uc_dbpwd]" type="text" size="30" value="<?php echo $uc_dbpwd;?>" onfocus="if(this.value.indexOf('**')!=-1)this.value='';"/></td>
	</tr>
	<tr>
	<td class="tl">���ݿ���</td>
	<td><input name="setting[uc_dbname]" type="text" size="30" value="<?php echo $uc_dbname;?>"/></td>
	</tr>
	<tr>
	<td class="tl">���ݱ�ǰ׺</td>
	<td><input name="setting[uc_dbpre]" type="text" size="30" value="<?php echo $uc_dbpre;?>"/></td>
	</tr>
	<tr>
	<td class="tl">���ݿ��ַ���</td>
	<td>
	<select name="setting[uc_charset]">
	<option value="gbk"<?php if($uc_charset == 'gbk') echo ' selected';?>>GBK/GB2312</option>
	<option value="utf8"<?php if($uc_charset == 'utf8') echo ' selected';?>>UTF-8</option>
	</select>
	</td>
	</tr>
	</table>
</td>
</tr>
<tr>
<td class="tl">Ӧ��ID(APP ID)</td>
<td><input name="setting[uc_appid]" type="text" size="30" value="<?php echo $uc_appid;?>"/></td>
</tr>
<tr>
<td class="tl">ͨ����Կ</td>
<td><input name="setting[uc_key]" id="uc_key" type="text" size="30" value="<?php echo $uc_key;?>"/> <a href="javascript:$('uc_key').value=RandStr();void(0);" class="t">[���]</a></td>
</tr>
</tbody>
<tr>
<td class="tl">��Ա���ֶһ�</td>
<td>
<input type="radio" name="setting[credit_exchange]" value="0"  <?php if(!$credit_exchange) echo 'checked';?> onclick="Dh('e_x');"/> �ر�&nbsp;&nbsp;
<input type="radio" name="setting[credit_exchange]" value="1"  <?php if($credit_exchange) echo 'checked';?> onclick="Ds('e_x');"/> ����
</td>
</tr>
<tbody id="e_x" style="display:<?php echo $credit_exchange ? '' : 'none';?>">
<tr>
<td class="tl">��̳����</td>
<td>
<select name="setting[ex_type]">
<option value="DZX"<?php if($ex_type == 'DZX') echo ' selected';?>>Discuz!X</option>
<option value="DZ"<?php if($ex_type == 'DZ') echo ' selected';?>>Discuz!</option>
<option value="PW"<?php if($ex_type == 'PW') echo ' selected';?>>PHPWind</option>
</select>
</td>
</tr>
<tr>
<td class="tl">���ݿ�����</td>
<td><input name="setting[ex_host]" type="text" size="30" value="<?php echo $ex_host;?>"/></td>
</tr>
<tr>
<td class="tl">���ݿ⻧��</td>
<td><input name="setting[ex_user]" type="text" size="15" value="<?php echo $ex_user;?>"/></td>
</tr>
<tr>
<td class="tl">���ݿ�����</td>
<td><input name="setting[ex_pass]" type="text" size="15" value="<?php echo $ex_pass;?>" onfocus="if(this.value.indexOf('**')!=-1)this.value='';"/></td>
</tr>
<tr>
<td class="tl">���ݿ�����</td>
<td><input name="setting[ex_data]" type="text" size="15" value="<?php echo $ex_data;?>"/></td>
</tr>
<tr>
<td class="tl">���ݱ�ǰ׺</td>
<td><input name="setting[ex_prex]" type="text" size="15" value="<?php echo $ex_prex;?>"/></td>
</tr>
<tr>
<td class="tl">���ݱ��ֶ�</td>
<td><input name="setting[ex_fdnm]" type="text" size="15" value="<?php echo $ex_fdnm;?>"/><?php tips('DZ��̳һ��Ϊextcredits1��extcredits2...<br/>PW��̳һ��Ϊcredit');?></td>
</tr>
<tr>
<td class="tl">�һ�����</td>
<td><input name="setting[ex_rate]" type="text" size="15" value="<?php echo $ex_rate;?>"/><?php tips('������5��ʾ1����̳���ֿɶһ�5��'.$DT['credit_name']);?></td>
</tr>
<tr>
<td class="tl">��̳��������</td>
<td><input name="setting[ex_name]" type="text" size="15" value="<?php echo $ex_name;?>"/></td>
</tr>
</tbody>
</table>
</div>
<div class="sbt">
<input type="submit" name="submit" value="ȷ ��" class="btn"/>&nbsp;&nbsp;&nbsp;&nbsp;
<input type="button" value="չ ��" id="ShowAll" class="btn" onclick="TabAll();" title="չ��/�ϲ�����ѡ��"/>
</div>
</form>
<script type="text/javascript">
var tab = <?php echo $tab;?>;
var all = <?php echo $all;?>;
function TabAll() {
	var i = 0;
	while(1) {
		if($('Tabs'+i) == null) break;
		$('Tabs'+i).style.display = all ? (i == tab ? '' : 'none') : '';
		i++;
	}
	$('ShowAll').value = all ? 'չ ��' : '�� ��';
	all = all ? 0 : 1;
}
window.onload=function() {
	if(tab) Tab(tab);
	if(all) {all = 0; TabAll();}
}
</script>
</body>
</html>