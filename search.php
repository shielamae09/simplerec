<?php 
session_start();

$existuser = $_GET['id'];
include 'template/header.php';
include 'config.php';

?>


<nav class="navbar hc p-2">
  <div class="float-start">
      <h3  class="navbar-brand ms-4 mt-2"><i class="fa fa-cube"></i>Shie<b class="border-bottom border-warning">MiniWebSystem</b></h3>
  </div>

  <div class="float-end me-5">

  <div class="dropdown ">
  <button class="btn text-light border border-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
    
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <li><a class="dropdown-item" href="logout.php">log out</a></li>
   
  </ul>
</div>
  </div>

</nav>

<div class="container d-flex justify-content-center ">
	<!-- content -->
<div class="card m-5  " style="width:28rem;height: 400px;">
  <div class="card-header hc1 text-white">
    -ShieMiniWebSystem -
  </div>
  <div class="card-body design1" >
<!-- table -->

<?php

$query_user = "SELECT * FROM users WHERE username='$existuser' ";

$result = $conn->query($query_user);
$num=1;

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
?>

<div class="container row mt-5">
	<div class="col-3 m-1">
			<img src="assets/pictures/info.png">
	</div>
	<div class="col" style="height: 300px;">
	<form>
<div class="input-group input-group-sm mb-3">
  <span class="input-group-text" id="basic-addon3" style="font-size:10px;">Full Name</span>
  <input type="text" class="form-control " placeholder="<?=$row['Firstname']." ".$row['Lastname']?>" id="basic-url" aria-describedby="basic-addon3">
</div>

<div class="input-group input-group-sm mb-3">
  <span class="input-group-text" id="basic-addon3" style="font-size:10px;">Username</span>
  <input type="text" class="form-control " placeholder="<?=$row['username']?>" id="basic-url" aria-describedby="basic-addon3">
</div>

	</form>

	<a  href="records.php" class="btn btn-sm btn-primary float-end shadow">Back</a>

	</div>

</div>




<?php 
}

}





 ?>



</div>
</div>
</div>



<?php
include 'template/footer.php';
?>

