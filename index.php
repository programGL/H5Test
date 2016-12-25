<?php
	define("TOKEN", "guoweixin");
	$wechatObj=new wechat_php();
	$wechatObj->valid();
	class wechat_php{
		public function valid(){
			$echoStr=$_GET['echoStr'];
			if($this->checkSignature()){
				echo $echoStr;
				exit;
			}
		}
		private function checkSignature(){
			$signature=$_GET['signature'];
			$timestamp=$_GET['timestamp'];
			$nonce=$_GET['nonce'];
			$token=TOKEN;
			$tmpArr=array($token,$timestamp,$nonce);
			sort($tmpArr);
			$tmpStr=implode($tmpArr);
			$tmpStr=shal($tmpStr);
			if($tmpStr==$signature){
				return true;
			}else{
				return false;
			}
		}
	}
?>