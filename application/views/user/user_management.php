<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

<style>
	table th{
		color:#2e6da4;
	}

	.w3-container h3{
		color:#2e6da4;
	}
</style>
  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h3><b><i class="fa fa-dashboard"></i> My Dashboard</b></h3>
  </header>
  <div class="w3-row-padding w3-margin-bottom col-md-10">
		<a href="<?=site_url()?>/CreateUser" class="btn btn-success">Create User</a><br /><br />
		<?php
			if(isset($users))
		{?>
			<table class="table table-bordered table-striped table-hover">
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
				    <td><a  href='<?=site_url();?>/DeleteUser/<?=$user['id'];?>'" class="btn btn-danger">Delete</button></td>
				    <td><a  href='<?=site_url();?>/EditUser/<?=$user['id'];?>'" class="btn btn-primary">Edit</button></td>
				  </tr><?php
			}?>
			</table><?php
		}

		if(isset($message))
			echo $message;
		?>

  <!-- Footer -->
  <!-- <footer class="w3-container w3-padding-16 w3-light-grey">
    <h4>FOOTER</h4>
    <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
  </footer> -->

  <!-- End page content -->
</div>

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
    if (mySidebar.style.display === 'block') {
        mySidebar.style.display = 'none';
        overlayBg.style.display = "none";
    } else {
        mySidebar.style.display = 'block';
        overlayBg.style.display = "block";
    }
}

// Close the sidebar with the close button
function w3_close() {
    mySidebar.style.display = "none";
    overlayBg.style.display = "none";
}
</script>

</body>
</html>
