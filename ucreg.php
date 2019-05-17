<?php
include '../config/config_ucenter.php';
include "../uc_client/client.php";
require_once('./res.php');
/**
 * UCenter API接口开发 Example
 *
 * 应用程序无数据库，用户注册的 API接口 代码
 * uc_user_register()	必须，注册用户数据
 * uc_authcode()	可选，借用用户中心的函数加解密 Cookie
 * 使用方式 http://yoururl/ucreg.php?username=user001&password=12345678&email=123456@qq.com
 * 输入参数1.username   2.password    3.email
 */

	//在UCenter注册用户信息
	$uid = uc_user_register($_GET['username'], $_GET['password'], $_GET['email']);
$msg= '';
	if($uid <= 0) {
		if($uid == -1) {
			$msg= '用户名不合法';
		} elseif($uid == -2) {
			$msg= '包含要允许注册的词语';
		} elseif($uid == -3) {
			$msg= '用户名已经存在';
		} elseif($uid == -4) {
			$msg= 'Email 格式有误';
		} elseif($uid == -5) {
			$msg= 'Email 不允许注册';
		} elseif($uid == -6) {
			$msg= '该 Email 已经被注册';
		} else {
			$msg= '未定义';
		}
	} else {
		setcookie('Elvns_auth', uc_authcode($uid."\t".$_GET['username'], 'ENCODE'));
		$msg= '注册成功';
	}

      $arr =array(
          'uid' => $uid,
          'username' => $_GET['username'],
          'email' => $_GET['email'],
          'msg' => $msg

        );
Response::json(200, 'OK', $arr);
?>