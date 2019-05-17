# Ucenter_Json_Api
UCENTER 的JSON接口 用户注册登录


用户用户登录的 API接口 代码
 * 使用到的接口函数：
 * uc_user_login()	必须，判断登录用户的有效性
 * uc_authcode()	可选，借用用户中心的函数加解密 Cookie
 * uc_user_synlogin()	可选，生成同步登录的代码
 * 使用方式 http://yoururl/uclogin.php?username=user001&password=12345678
 * 输入参数1.username   2.password  
 
用户注册的 API接口 代码
 * uc_user_register()	必须，注册用户数据
 * uc_authcode()	可选，借用用户中心的函数加解密 Cookie
 * 使用方式 http://yoururl/ucreg.php?username=user001&password=12345678&email=123456@qq.com
 * 输入参数1.username   2.password    3.email
