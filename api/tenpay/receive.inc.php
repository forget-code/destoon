<?php
defined('IN_DESTOON') or exit('Access Denied');
//---------------------------------------------------------
//�Ƹ�ͨ��ʱ����֧��Ӧ�𣨴���ص���ʾ�����̻����մ��ĵ����п�������
//---------------------------------------------------------

require_once (DT_ROOT."/api/tenpay/classes/PayResponseHandler.class.php");

/* ��Կ */
$key = $PAY[$bank]['keycode'];

/* ����֧��Ӧ����� */
$resHandler = new PayResponseHandler();
$resHandler->setKey($key);

//�ж�ǩ��
if($resHandler->isTenpaySign()) {
	
	//���׵���
	$transaction_id = $resHandler->getParameter("transaction_id");
	
	//���,�Է�Ϊ��λ
	$total_fee = $resHandler->getParameter("total_fee");
	
	//֧�����
	$pay_result = $resHandler->getParameter("pay_result");

	$out_trade_no = $resHandler->getParameter("sp_billno");
	$total_fee = $total_fee/100;
	
	if( "0" == $pay_result ) {
	
		//------------------------------
		//����ҵ��ʼ
		//------------------------------
		
		//ע�⽻�׵���Ҫ�ظ�����
		//ע���жϷ��ؽ��
		
		//------------------------------
		//����ҵ�����
		//------------------------------
		if($out_trade_no != $charge_orderid) {
		$charge_status = 2;
		$charge_errcode = '�����Ų�ƥ��';
		$note = $charge_errcode.'S:'.$charge_orderid.'R:'.$out_trade_no;
		log_write($note, 'rtenpay');
	} else if($total_fee != $charge_money) {
		$charge_status = 2;
		$charge_errcode = '��ֵ��ƥ��';
		$note = $charge_errcode.'S:'.$charge_money.'R:'.$total_fee;
		log_write($note, 'rtenpay');
	} else {
		$charge_status = 1;
		$db->query("UPDATE {$DT_PRE}finance_charge SET status=3,money=$charge_money,receivetime='$DT_TIME',editor='$editor' WHERE itemid=$charge_orderid");
		money_add($r['username'], $r['amount']);
		money_record($r['username'], $r['amount'], $PAY[$bank]['name'], 'system', '���߳�ֵ', '����ID:'.$charge_orderid);
		$show = linkurl($MOD['linkurl'], 1).'charge.php';
		$resHandler->doShow($show);
	}
		
		//����doShow, ��ӡmetaֵ��js����,���߲Ƹ�ͨ����ɹ�,�����û��������ʾ$showҳ��.
	
	} else {
		//�������ɹ�����
		//echo "<br/>" . "֧��ʧ��" . "<br/>";
	}
	
} else {
	//echo "<br/>" . "��֤ǩ��ʧ��" . "<br/>";
}

//echo $resHandler->getDebugInfo();

?>