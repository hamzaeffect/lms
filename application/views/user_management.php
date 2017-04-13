
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>User Management</title>
</head>

<body>
<a href="<?=site_url()?>/CreateUser">Create User</a><br /><br />
<?php
if(isset($users))
{?>
	<table style="width:50%">
		  <tr>
		    <th>Username</th>
		    <th>Created On</th> 
		    <th>Modified On</th>
		    <th>Active</th>
		    <th>Type</th>
		  </tr><?php
	foreach ($users as $key => $user) 
	{
		# code...?>
		  <tr>
		    <td><?=$user['user_name']?></td>
		    <td><?=$user['date_entered']?></td> 
		    <td><?=$user['date_modified']?></td>
		    <td><?=$user['active']?></td>
		    <td><?=$user['type']?></td>
		    <td><button type="button" onclick="location.href='<?=site_url();?>/DeleteUser/<?=$user['id'];?>'">Delete</button></td>
		    <td><button type="button" onclick="location.href='<?=site_url();?>/EditUser/<?=$user['id'];?>'">Edit</button></td>
		  </tr><?php
	}?>
	</table><?php
}

if(isset($message))
	echo $message;
?>
</body>
</html>