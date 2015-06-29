<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2015-05-31 09:19:33 --> 404 Page Not Found: Users/register
ERROR - 2015-05-31 09:21:58 --> Severity: Notice --> Undefined property: Users::$session C:\Users\Chris\Projects\www\ampd\public_html\application\controllers\users.php 14
ERROR - 2015-05-31 09:21:58 --> Severity: Error --> Call to a member function userdata() on a non-object C:\Users\Chris\Projects\www\ampd\public_html\application\controllers\users.php 14
ERROR - 2015-05-31 09:22:33 --> Severity: Notice --> Undefined property: Signin::$session C:\Users\Chris\Projects\www\ampd\public_html\application\controllers\signin.php 19
ERROR - 2015-05-31 09:22:33 --> Severity: Error --> Call to a member function userdata() on a non-object C:\Users\Chris\Projects\www\ampd\public_html\application\controllers\signin.php 19
ERROR - 2015-05-31 09:26:20 --> Query error: Unknown column 'data' in 'field list' - Invalid query: SELECT `data`
FROM `sessions`
WHERE `id` = '456393c053522ff7f1f7883df27d34400c9d4f87'
AND `ip_address` = '127.0.0.1'
ERROR - 2015-05-31 09:49:17 --> Query error: Unknown column 'data' in 'field list' - Invalid query: SELECT `data`
FROM `sessions`
WHERE `id` = 'fc430c89957d754e1a2f44b1a8cda075e7ed0597'
AND `ip_address` = '127.0.0.1'
ERROR - 2015-05-31 10:02:13 --> Severity: Error --> Call to undefined method CI_Encrypt::sha1() C:\Users\Chris\Projects\www\ampd\public_html\application\controllers\register.php 65
ERROR - 2015-05-31 10:06:45 --> Severity: Warning --> Missing argument 2 for password_hash(), called in C:\Users\Chris\Projects\www\ampd\public_html\application\controllers\register.php on line 65 and defined C:\Users\Chris\Projects\www\ampd\system\core\compat\password.php 95
ERROR - 2015-05-31 10:06:45 --> Severity: Notice --> Undefined variable: algo C:\Users\Chris\Projects\www\ampd\system\core\compat\password.php 100
ERROR - 2015-05-31 10:06:45 --> Severity: Notice --> Undefined variable: algo C:\Users\Chris\Projects\www\ampd\system\core\compat\password.php 102
ERROR - 2015-05-31 10:06:45 --> Severity: User Warning --> password_hash(): Unknown hashing algorithm: 0 C:\Users\Chris\Projects\www\ampd\system\core\compat\password.php 102
ERROR - 2015-05-31 10:06:45 --> Query error: Column 'user_hash' cannot be null - Invalid query: INSERT INTO `register` (`user_first_name`, `user_last_name`, `user_email`, `user_hash`) VALUES ('Chris', 'Spear', 'ichris.spear@googlemail.com', NULL)
ERROR - 2015-05-31 10:15:53 --> Severity: Parsing Error --> syntax error, unexpected '[' C:\Users\Chris\Projects\www\ampd\public_html\application\controllers\register.php 65
ERROR - 2015-05-31 10:16:50 --> Severity: Parsing Error --> syntax error, unexpected '[' C:\Users\Chris\Projects\www\ampd\public_html\application\controllers\signin.php 63
ERROR - 2015-05-31 10:19:18 --> Severity: User Warning --> password_hash(): Provided salt is too short: 6 expecting 22 C:\Users\Chris\Projects\www\ampd\system\core\compat\password.php 114
ERROR - 2015-05-31 10:19:39 --> Severity: User Warning --> password_hash(): Provided salt is too short: 5 expecting 22 C:\Users\Chris\Projects\www\ampd\system\core\compat\password.php 114
ERROR - 2015-05-31 10:42:32 --> Severity: Error --> Class 'AMPD_controller' not found C:\Users\Chris\Projects\www\ampd\public_html\application\controllers\users.php 5
ERROR - 2015-05-31 10:42:47 --> Severity: Error --> Class 'AMPD_controller' not found C:\Users\Chris\Projects\www\ampd\public_html\application\controllers\users.php 5
ERROR - 2015-05-31 10:42:49 --> Severity: Error --> Class 'AMPD_controller' not found C:\Users\Chris\Projects\www\ampd\public_html\application\controllers\users.php 5
ERROR - 2015-05-31 10:42:50 --> Severity: Error --> Class 'AMPD_controller' not found C:\Users\Chris\Projects\www\ampd\public_html\application\controllers\users.php 5
ERROR - 2015-05-31 10:45:45 --> Severity: Error --> Class 'ampd_Controller' not found C:\Users\Chris\Projects\www\ampd\public_html\application\controllers\users.php 5
ERROR - 2015-05-31 10:47:09 --> Severity: Notice --> Undefined property: Users::$sesson C:\Users\Chris\Projects\www\ampd\public_html\application\core\MY_Controller.php 12
ERROR - 2015-05-31 10:47:09 --> Severity: Notice --> Trying to get property of non-object C:\Users\Chris\Projects\www\ampd\public_html\application\core\MY_Controller.php 12
ERROR - 2015-05-31 10:47:23 --> Severity: Notice --> Undefined property: Users::$sesson C:\Users\Chris\Projects\www\ampd\public_html\application\core\MY_Controller.php 12
ERROR - 2015-05-31 10:47:23 --> Severity: Error --> Call to a member function userdata() on a non-object C:\Users\Chris\Projects\www\ampd\public_html\application\core\MY_Controller.php 12
ERROR - 2015-05-31 11:07:11 --> Severity: Notice --> Undefined variable: email C:\Users\Chris\Projects\www\ampd\public_html\application\controllers\register.php 66
