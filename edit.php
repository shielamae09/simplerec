<?php 
session_start();

$existuser = $_GET['id'];
include 'template/header.php';
include 'config.php';

?>

<?php 

include 'config.php';

if (isset($_POST['submit'])) {
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $username = $_POST['username'];
  $gender = $_POST['gender'];
  $address = $_POST['address'];
  $birth_month = $_POST['birth_month'];
  $birth_day = $_POST['birth_day'];
  $birth_year = $_POST['birth_year'];

  $update_sql = "UPDATE users SET firstname='$firstname',lastname='$lastname',username='$username', gender='$gender', address='$address', birth_month='$birth_month', birth_day='$birth_day', birth_year='$birth_year' WHERE id='$existuser'";

  $update = mysqli_query($conn,$update_sql);

  if ($update) {
    header('Location: records.php?status=update_success');
  }
  else{
    header('Location: records.php?status=update_error');
  }
}
?>


<nav class="navbar hc p-2">
  <div class="float-start">
      <h3  class="navbar-brand ms-4 mt-2"><i class="fa fa-cube"></i>Shie<b class="border-bottom border-warning">MiniWebSystem</b></h3>
  </div>

  <div class="float-end me-5">

  <div class="dropdown ">
  <button class="btn text-light border border-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
    
  </button>
  <nav class="navbar hc p-2">
  
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <li><a class="dropdown-item" href="logout.php">Sign out</a></li>
   
  </ul>
</div>
  </div>

</nav>

<div class="container d-flex justify-content-center ">
    <!-- content -->
<div class="card m-5  " style="width:28rem;height: 400px;">
  <div class="card-header hc1 text-white">
    -Edit Account -
  </div>
  <div class="card-body design1" >
<!-- table -->

<?php

$query_user = "SELECT * FROM users WHERE id='$existuser'";

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
    <form method="POST">
<div class="input-group input-group-sm mb-3">
  <span class="input-group-text" id="basic-addon3" style="font-size:10px;">First Name</span>
  <input type="text" class="form-control" name="firstname"  value="<?=$row['firstname']?>"  placeholder="<?=" ".$row['firstname']?>" id="basic-url" aria-describedby="basic-addon3">
</div>

<div class="input-group input-group-sm mb-3">
  <span class="input-group-text" id="basic-addon3" style="font-size:10px;">Last Name</span>
  <input type="text" class="form-control" name="lastname"  value="<?=$row['lastname']?>"  placeholder="<?=" ".$row['lastname']?>" id="basic-url" aria-describedby="basic-addon3">
</div>

<div class="input-group input-group-sm mb-3">
  <span class="input-group-text" id="basic-addon3" style="font-size:10px;">Username</span>
  <input type="text" class="form-control" name="username" value="<?=$row['username']?>" placeholder="<?=$row['username']?>" id="basic-url" aria-describedby="basic-addon3">
</div>
<div class="input-group input-group-sm mb-3">
  <span class="input-group-text" id="basic-addon3" style="font-size:10px;">Gender</span>
  <input type="text" class="form-control" name="gender" value="<?=$row['gender']?>" placeholder="<?=$row['gender']?>" id="basic-url" aria-describedby="basic-addon3">
</div>
<div class="input-group input-group-sm mb-3">
  <span class="input-group-text" id="basic-addon3" style="font-size:10px;">Address</span>
  <input type="text" class="form-control" name="address" value="<?=$row['address']?>" placeholder="<?=$row['address']?>" id="basic-url" aria-describedby="basic-addon3">
</div>

	        <div style="height: 20px"></div>
	        <label for="email"><b>Birthdate</b></label>
	        <div class="field">
	        	<select style="width: 100%; border: none; height: 50px; padding-left: 10px; background-color: rgba(0,0,0,0.08)" name="birth_month">
		               	<option value="NS">Select Month</option>
		                <option value="January" <?php if($row['birth_month'] == 'January') { echo "selected"; } ?>>1</option>
		                <option value="February" <?php if($row['birth_month'] == 'February') { echo "selected"; } ?>>2</option>
		                <option value="March" <?php if($row['birth_month'] == 'March') { echo "selected"; } ?>>3</option>
		                <option value="April" <?php if($row['birth_month'] == 'April') { echo "selected"; } ?>>4</option>
		                <option value="May" <?php if($row['birth_month'] == 'May') { echo "selected"; } ?>>5</option>
		                <option value="June" <?php if($row['birth_month'] == 'June') { echo "selected"; } ?>>6</option>
		                <option value="July" <?php if($row['birth_month'] == 'July') { echo "selected"; } ?>>7</option>
		                <option value="August" <?php if($row['birth_month'] == 'August') { echo "selected"; } ?>>8</option>
		                <option value="September" <?php if($row['birth_month'] == 'September') { echo "selected"; } ?>>9</option>
		                <option value="October" <?php if($row['birth_month'] == 'October') { echo "selected"; } ?>>10</option>
		                <option value="November" <?php if($row['birth_month'] == 'November') { echo "selected"; } ?>>11</option>
		                <option value="December" <?php if($row['birth_month'] == 'December') { echo "selected"; } ?>>12</option>
		           </select>
	        </div>

	        <div style="height: 20px"></div>
	        <label for="email"><b>Day</b></label>

	        <div class="field">
	          	<input type="text" name="birth_day" value="<?php echo $row['birth_day']; ?>" required placeholder="Birth Day">
	        </div>

	        <div style="height: 10px"></div>
	        <label for="email"><b>Year</b></label>
	        	<div class="field">
	        		<select style="width: 100%; border: none; height: 50px; padding-left: 10px; background-color: rgba(0,0,0,0.08)" name="birth_year">
		               	<option value="NS">Select Year</option>
		                <?php 
			                $i = 2000;
			                while ($i <= 2022) {
		                ?>
		                	<option value="<?php echo $i; ?>" <?php if($row['birth_year'] == $i) { echo "selected"; } ?>>
		                		<?php echo $i; ?>
		                	</option>
		                <?php $i++; } ?>
		            </select>
	        	</div>

    <button type="submit" name="submit" class="btn btn-success btn-sm">UPDATE</button>
    <a  href="records.php" class="btn btn-sm btn-primary float-end shadow">Back</a>
    </form>



    </div>

</div>




<?php 
}

}





 ?>

<!-- UPDATE -->

}

</div>
</div>
</div>



<?php
include 'template/footer.php';
?>

