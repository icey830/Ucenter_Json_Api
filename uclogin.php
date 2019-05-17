<?php 
/**
 * UCenter API接口开发
 *
 * 应用程序无数据库，用户用户登录的 API接口 代码
 * 使用到的接口函数：
 * uc_user_register()	必须，注册用户数据
 * uc_authcode()	可选，借用用户中心的函数加解密 Cookie
 * 使用方式 http://yoururl/uclogin.php?username=user001&password=12345678
 * 输入参数1.username   2.password
 */

include '../config/config_ucenter.php';
include "../uc_client/client.php";
require_once('./res.php');
list($uid, $username, $password, $email) = uc_user_login($_GET['username'], $_GET['password']);
setcookie('Elvns_auth', '', -86400);

$msg= '';
	if($uid > 0) {
      setcookie('Elvns_auth', uc_authcode($uid."\t".$username, 'ENCODE'));
      $ucsynlogin = uc_user_synlogin($uid);
		$msg= 'login ok';
	} elseif($uid == -1) {
		$msg= 'no user';
	} elseif($uid == -2) {
		$msg= 'pass not ok';
	} else {
		$msg= 'underfind';
	}

$arr =array(
  'uid' => $uid,
  'username' => $username,
//  'password' => $password,
   'email' => $email,
   'msg' => $msg

);
Response::json(200, 'OK', $arr);

?>