<?php
defined('IN_DESTOON') or exit('Access Denied');
//---------------------------------------------------------
//�Ƹ�ͨ��ʱ����֧������ʾ�����̻����մ��ĵ����п�������
//---------------------------------------------------------
define('CS', DT_CHARSET);
require_once (DT_ROOT."/api/tenpay/classes/PayRequestHandler.class.php");

/* �̻��� */
$bargainor_id = $PAY[$bank]['partnerid'];

/* ��Կ */
$key = $PAY[$bank]['keycode'];

/* ���ش����ַ */
$return_url = $receive_url;

//date_default_timezone_set(PRC);
$strDate = date("Ymd");
$strTime = date("His");

//4λ�����
$randNum = rand(1000, 9999);

//10λ���к�,�������е�����
$strReq = $strTime . $randNum;

/* �̼Ҷ�����,����������32λ��ȡǰ32λ���Ƹ�ֻͨ��¼�̼Ҷ����ţ�����֤Ψһ�� */
$sp_billno = $orderid;

/* �Ƹ�ͨ���׵��ţ�����Ϊ��10λ�̻���+8λʱ�䣨YYYYmmdd)+10λ��ˮ�� */
$transaction_id = $bargainor_id . $strDate . $strReq;

/* ��Ʒ�۸񣨰����˷ѣ����Է�Ϊ��λ */
$total_fee = $charge*100;

/* ��Ʒ���� */
$desc = '��Ա('.$_username.')�ʻ���ֵ(������:'.$orderid.')';

/* ����֧��������� */
$reqHandler = new PayRequestHandler();
$reqHandler->init();
$reqHandler->setKey($key);

//----------------------------------------
//����֧������
//----------------------------------------
$reqHandler->setParameter("bargainor_id", $bargainor_id);			//�̻���
$reqHandler->setParameter("sp_billno", $sp_billno);					//�̻�������
$reqHandler->setParameter("transaction_id", $transaction_id);		//�Ƹ�ͨ���׵���
$reqHandler->setParameter("total_fee", $total_fee);					//��Ʒ�ܽ��,�Է�Ϊ��λ
$reqHandler->setParameter("return_url", $return_url);				//���ش����ַ
$reqHandler->setParameter("desc", $desc);	//��Ʒ����

//�û�ip,���Ի���ʱ��Ҫ�����ip��������ʽ�����ټӴ˲���
$reqHandler->setParameter("spbill_create_ip", $DT_IP);

//�����URL
$reqUrl = $reqHandler->getRequestURL();

//debug��Ϣ
//$debugInfo = $reqHandler->getDebugInfo();

//echo "<br/>" . $reqUrl . "<br/>";
//echo "<br/>" . $debugInfo . "<br/>";

//�ض��򵽲Ƹ�֧ͨ��
//$reqHandler->doSend();

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=<?php echo DT_CHARSET;?>">
<title>������ת��<?php echo $PAY[$bank]['name'];?>����֧��ƽ̨...</title>
</head>
<body onload="document.getElementById('pay').submit();">
<?php
$tmp = parse_url($reqUrl);
parse_str($tmp['query'], $par);
$act = $tmp['scheme'].'://'.$tmp['host'].$tmp['path'];
echo '<form method="post" action="'.$act.'" id="pay">';
foreach($par as $k=>$v) {
	echo '<input type="hidden" name="'.$k.'" value="'.$v.'"/>';
}
echo '</form>';
?>
</body>
</html>