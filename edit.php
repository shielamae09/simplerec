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
    <form method="POST">
<div class="input-group input-group-sm mb-3">
  <span class="input-group-text" id="basic-addon3" style="font-size:10px;">First Name</span>
  <input type="text" class="form-control" name="Firstname"  value="<?=$row['Firstname']?>"  placeholder="<?=" ".$row['Firstname']?>" id="basic-url" aria-describedby="basic-addon3">
</div>

<div class="input-group input-group-sm mb-3">
  <span class="input-group-text" id="basic-addon3" style="font-size:10px;">Last Name</span>
  <input type="text" class="form-control" name="Lastname"  value="<?=$row['Lastname']?>"  placeholder="<?=" ".$row['Lastname']?>" id="basic-url" aria-describedby="basic-addon3">
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
	        	<select style="width: 100%; border: none; height: 50px; padding-left: 10px; background-color: rgba(0,0,0,0.08)" name="month">
		               	<option value="NS">Select Month</option>
		                <option value="January" <?php if($account['month'] == 'January') { echo "selected='true'"; } ?>>1</option>
		                <option value="February" <?php if($account['month'] == 'February') { echo "selected='true'"; } ?>>2</option>
		                <option value="March" <?php if($account['month'] == 'March') { echo "selected='true'"; } ?>>3</option>
		                <option value="April" <?php if($account['month'] == 'April') { echo "selected='true'"; } ?>>4</option>
		                <option value="May" <?php if($account['month'] == 'May') { echo "selected='true'"; } ?>>5</option>
		                <option value="June" <?php if($account['month'] == 'June') { echo "selected='true'"; } ?>>6</option>
		                <option value="July" <?php if($account['month'] == 'July') { echo "selected='true'"; } ?>>7</option>
		                <option value="August" <?php if($account['month'] == 'August') { echo "selected='true'"; } ?>>8</option>
		                <option value="September" <?php if($account['month'] == 'September') { echo "selected='true'"; } ?>>9</option>
		                <option value="October" <?php if($account['month'] == 'October') { echo "selected='true'"; } ?>>10</option>
		                <option value="November" <?php if($account['month'] == 'November') { echo "selected='true'"; } ?>>11</option>
		                <option value="December" <?php if($account['month'] == 'December') { echo "selected='true'"; } ?>>12</option>
		           </select>
	        </div>

	        <div style="height: 20px"></div>
	        <label for="email"><b>Day</b></label>

	        <div class="field">
	          	<input type="text" name = "day" value="<?php echo $account['day']; ?>" required placeholder="Day">
	        </div>

	        <div style="height: 10px"></div>
	        <label for="email"><b>Year</b></label>
	        	<div class="field">
	        		<select style="width: 100%; border: none; height: 50px; padding-left: 10px; background-color: rgba(0,0,0,0.08)" name="year">
		               	<option value="NS">Select Year</option>
		                <?php 
			                $i = 2000;
			                while ($i <= 2022) {
		                ?>
		                	<option value="<?php echo $i; ?>" <?php if($account['year'] == $i) { echo "selected='true'"; } ?>>
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

<?php 

include 'config.php';

if (isset($_POST['submit'])) {
 
$Firstname = $_POST['Firstname'];
$Lastname = $_POST['Lastname'];
$username = $_POST['username'];
$gender = $_POST['gender'];
$address = $_POST['address'];
$month = $_POST['month'];
$day = $_POST['day'];
$day = $_POST['year'];

 $update_sql = "UPDATE users SET Firstname='$Firstname',Lastname='$Lastname',username='$username', gender='$gender', adddress='$address', month='$month', day='$day', year='$year' WHERE username='$existuser'  ";


 $update = mysqli_query($conn,$update_sql);

 if ($update) {
        header('Location: records.php?status=update_success');
 }
 else{
        header('Location: records.php?status=update_error');
 }


}

// $sql = "UPDATE users SET lastname='Doe' WHERE id=2";



?>

</div>
</div>
</div>



<?php
include 'template/footer.php';
?>

