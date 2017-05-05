<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<?php
if(isset($this->session->userdata['session_array'])) {

	redirect('/Home', 'refresh');
}
?>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
</head>
<body>

Welcome to<br />
<strong>LMS</strong>
<br /><br />
<?php 
echo form_open('User_Authentication/user_auth_process'); 
echo validation_errors();
?>
User Name:    <input type="text" name="username" id="username"/><br />
Password:     <input type="password" name="password" id="password"/><br />
<input type="submit" value=" Log In " name="submit"/><br /><br />
<?php
echo form_close();

if (isset($error_message))
{
	echo $error_message;
}

?>

</body>
</html>