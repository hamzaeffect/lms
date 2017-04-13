<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit User</title>

<strong>Edit User</strong>
<br /><br />
<?php 
echo form_open('User_Management/edit_user/'.$user[0]['id']); 
echo validation_errors();
?>
Username
<input type="text" name="user_name" id="user_name" value="<?=$user['0']['user_name'];?>"/>
<br /><br />
Active
<select name="active" id="active">
<?php 
if($user[0]['active'] == '1')
{?>
	<option value="1">Yes</option>
	<option value="0">No</option><?php
}
else
{?>
	<option value="0">No</option>
	<option value="1">Yes</option><?php
}?>
</select>
<br /><br />
User Type
<select name="type" id="type">
<option value="student">Student</option>
<option value="teacher">Teacher</option>
<option value="parent">Parent</option>
</select>
<br /><br />
<input type="submit" value="Save" name="submit" id="submit">
<button type="button" onclick="location.href='<?=site_url();?>/User_Management'">Cancel</button>
<?php form_close(); ?>
<br /><br />
<?php
?>
</body>
</html>