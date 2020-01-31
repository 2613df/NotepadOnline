<?php ($visit) ? ("") : (header('location: /'));?>
<?php
/*这是NPO的库文件
**------------------
**如果您不了解PHP或程序的功能实现方式及内容架构，请勿修改内容*/

class note{
	function __construct($name,$mode){//share的name应该经过处理
		$this->name = $name;
		$this->mode = $mode;//0为编辑页,1为分享页
		$this->pathData = "../".$GLOBALS['tmpFolder']."/".$this->name.".data";
	}
	function getUnixTimestamp(){
		list($s1, $s2) = explode(' ', microtime());
		return (float)sprintf('%.0f',(floatval($s1) + floatval($s2)) * 1000);
	}
	public function noteRead(){
		if(!$this->isExist()) return json_encode(array("status"=>"notExist"));
		$asciiProcess = new ascii;
		$result = $asciiProcess->decode(json_decode(file_get_contents($this->pathData),true)["data"]);
		if($this->notePermission()==1) return json_encode(array("status"=>"OK","result"=>$result));
		if($this->notePermission()==-1) return json_encode(array("status"=>"shareClosed"));
		return json_encode(array("status"=>"permissionDenied"));
	}
	function noteChange($data,$lastEditTime='00000000'){
		$data=(string)$data;//强转字符串,防止其他类型变量引入导致错误
		$asciiProcess = new ascii;
		$data = $asciiProcess->encode($data);
		if(!$this->isExist()){//初次创建
			file_put_contents($this->pathData, json_encode(array("name"=>$this->name,"creatTime"=>$lastEditTime,"editTime"=>$lastEditTime,"epw"=>"","spw"=>"","share"=>'0',"data"=>$data)));
			return json_encode(array("status"=>"OK"));
		}else{
			if($this->notePermission()!=1) return json_encode(array("status"=>"permissionDenied"));
			$json=json_decode(file_get_contents($this->pathData),true);
			$json["editTime"]=time();
			$json["data"]=$data;
			$json["editTime"]=$lastEditTime;
			file_put_contents($this->pathData, json_encode($json));
			return json_encode(array("status"=>"OK"));
		}
		return json_encode(array("status"=>"error"));
	}
	public function isExist(){
		return file_exists($this->pathData);
	}
	function pwJudge($pw){//前提是文件存在
		if(!$this->isExist()) return 1;
		$espw = $this->mode ? "spw" : "epw";
		$json=json_decode(file_get_contents($this->pathData),true);
		switch($json[$espw]==$pw){		
			case 1:	//写入SESSION
					$es = $this->mode ? "s" : "e";$_SESSION[$es.dencrypt(1,$this->name)] = "1";
					return 1;
			case 0:	return 0;
		}
	}
	function shareOperate($oc="OPEN"){
		//先判断文件存在，不存在则创建	
		if(!$this->isExist()){
			$this->noteChange('');
		}
		if($this->notePermission()==1){
			$json=json_decode(file_get_contents($this->pathData),true);
			$json["share"] = $oc =="OPEN" ? 1 : 0;
			file_put_contents($this->pathData, json_encode($json));
			return json_encode(array("status"=>"OK"));
		}
		return json_encode(array("status"=>"permissionDenied"));
	}
	function pwChange($opw,$npw){
		//先判断文件存在，不存在则创建	
		if(!$this->isExist()){
			$this->noteChange('');
		}
		$json=json_decode(file_get_contents($this->pathData),true);
		$espw = $this->mode ? "spw" : "epw";
		//有无权限均可，只要旧密码正确
		if(!$this->pwJudge($opw) and $json[$espw]!='' ) return json_encode(array("status"=>"permissionDenied1"));
		$json["editTime"]=time();
		$json[$espw]=$npw;
		file_put_contents($this->pathData, json_encode($json));
		$this->logout();
		return json_encode(array("status"=>"OK"));
	}
	function logout(){
		$es = $this->mode ? "s" : "e";
		$_SESSION[$es.dencrypt(1,$this->name)]=0;
	}
	function notePermission(){
		if(!$this->isExist()) return 1;
		$espw = $this->mode ? "spw" : "epw";
		$es = $this->mode ? "s" : "e";
		$json=json_decode(file_get_contents($this->pathData),true);
		if($es=='s' and $json['share']=='0') return -1;
		if(!$json[$espw]) return 1;
		//读取Session
		if($_SESSION[$es.dencrypt(1,$this->name)]=="1") return 1;

		return 0;
	}
	function getLastTime(){
		if(!$this->isExist()) return '00000000';
		$json=json_decode(file_get_contents($this->pathData),true);
		return $json['editTime'];
	}
}
?>