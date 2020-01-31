<?php //($visit) ? ("") : (header('location: /'));?>
<?
/*这是NPO的操作文件
**------------------
**如果您不了解PHP或程序的功能实现方式及内容架构，请勿修改内容*/

header('Content-Type:application/json;charset=utf-8');
$visit = true;
include_once "./config.php";
include_once "./general.func.php";
include_once "./ascii.class.php";
include_once "./note.class.php";

if($_GET['api']==1){
	if($_GET['es']!='e' and $_GET['es']!='s'){echo json_encode(array("status"=>"paraError1"));die();}
	if($_GET['name']=='' or !$_GET['name']){echo json_encode(array("status"=>"paraError2"));die();}
	if($_GET['do']=='' or !$_GET['do']){echo json_encode(array("status"=>"paraError3"));die();}
	$api=1;
	$name = $_GET['name'];
	$es = $_GET['es'];

	//$do = $_GET['es']=='e' ? 'getUAID':'isExist';
	$doapi = $_GET['do'];

}else{
	if($_POST['es']!='e' and $_POST['es']!='s'){echo json_encode(array("status"=>"paraError4"));die();}
	if($_POST['name']=='' or !$_POST['name']){echo json_encode(array("status"=>"paraError5"));die();}
	if($_POST['do']=='' or !$_POST['do']){echo json_encode(array("status"=>"paraError6"));die();}
	$name = $_POST['name'];
	$es = $_POST['es'];
	$do = $_POST['do'];
	$data = $_POST['data'];
	$opw = $_POST['opw'];
	$npw = $_POST['npw'];
	$pw = $_POST['pw'];
	$lastEditTime = $_POST['lastEditTime'];
}
$esN = $es != 'e' ? 1 : 0;

//判断name参数
$namePed = str_replace(array("/"," ",".","*",":","|"),"",trim($name));
if($es=='e') $namePed = mb_substr($namePed,0,12);
if($name!=$namePed){
	echo json_encode(array("status"=>"paraError6"));die();
}
if($es=='s') $name = dencrypt(-1,$name);
$noteE = new note($name,$esN);
switch($do){
	case 'noteRead':echo $noteE->noteRead();break;
	case 'noteChange':if($es=='s'){echo json_encode(array("status"=>"paraError7"));die();}echo $noteE->noteChange($data,$lastEditTime);break;
	case 'pwJudge':	if($noteE->pwJudge($pw)){
						echo json_encode(array("status"=>"OK"));
						break;
					}else{
						echo json_encode(array("status"=>"permissionDenied"));
						break;
					}
	case 'pwChange':echo $noteE->pwChange($opw,$npw);break;
	case 'shareOpen':if($es=='s'){echo json_encode(array("status"=>"paraError8"));die();}echo $noteE->shareOperate("OPEN");break;
	case 'shareClose':if($es=='s'){echo json_encode(array("status"=>"paraError9"));die();}echo $noteE->shareOperate("CLOSE");break;
	case 'pwChange':echo $noteE->pwChange($opw,$npw);break;
	case 'isExist':	if($noteE->isExist()){
						echo json_encode(array("status"=>"OK","result"=>"1"));
						break;
					}else{
						echo json_encode(array("status"=>"OK","result"=>"0"));
						break;
					}
	case 'getLastTime':echo json_encode(array("status"=>"OK","result"=>$noteE->getLastTime()));break;
	default:echo json_encode(array("status"=>"paraError0"));break;
}
?>