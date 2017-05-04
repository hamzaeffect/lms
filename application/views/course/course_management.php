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
    <h3><b><i class="fa fa-dashboard"></i> Course Manager</b></h3>
  </header>
  <div class="w3-row-padding w3-margin-bottom col-md-10">
		<a href="<?=site_url()?>/CreateCourse" class="btn btn-success">Create Course</a><br /><br />
		<?php
			if(isset($courses))
		{?>
			<table class="table table-bordered table-striped table-hover" style="text-align: center;">
				  <tr>
				    <th>#</th>
				    <th>Name</th> 
				    <th>Short Name</th>
				    <th>Code</th>
				    <th>Credit Hours</th>
				    <th>Teachers</th>
				    <!-- <th>Type</th> -->
				  </tr><?php
				  $i = 1;
			foreach ($courses as $key => $course) 
			{
				# code...?>
				  <tr>
				  	<td><?=$i++?></td>
				    <td><?=$course['name']?></td>
				    <td><?=$course['short_name']?></td> 
				    <td><?=$course['code']?></td>
				    <td><?=$course['credit_hours']?></td>
				    <td>
				    	<ul style="padding-left:15px;text-align: left;">
				    		
				    		<?php 
				    		$teachers = $this->db->get_where('teacher_courses',['course_id' => $course['id']]);
				    		$teachers = $teachers->result();
				    		if(empty($teachers)){
				    			echo "<li>No Teacher Added</li>";
				    		}
				    		foreach ($teachers as $t => $teacher) {
				    			$temp = $this->db->get_where('users',['id' => $teacher->teacher_id]);
				    			$temp = $temp->result();
				    		?>
				    		<li><?=$temp[0]->user_name?></li>
				    		<?php 
				    		}	
				    		?>
				    	</ul>
				    </td>
				    <td><a  href='<?=site_url();?>/DeleteCourse/<?=$course['id'];?>'" class="btn btn-danger">Delete</a></td>
				    <td><a  href='<?=site_url();?>/EditCourse/<?=$course['id'];?>'" class="btn btn-primary">Edit</a></td>
				  	<td><a href='<?=site_url();?>/AssignTeachers/<?=$course['id'];?>'" class="btn btn-success">Assign Teachers </a></td>
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
