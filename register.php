<?php 

include 'config.php';

error_reporting(0);

session_start();

if (isset($_SESSION['username'])) {
    header("Location: index.php");
}

if (isset($_POST['submit'])) {
	$Firstname = $_POST['firstname'];
	$Lastname = $_POST['lastname'];
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$gender = $_POST['gender'];
	$address = $_POST['address'];
	$month = $_POST['monthh'];
	$day = $_POST['day'];
	$year = $_POST['year'];
	

	if ($password == $password) {
		$sql = "SELECT * FROM users WHERE firstname='$Firstname' AND lastname='$Lastname' AND username='$username' AND gender='$gender' AND address='$address' AND month='$month' AND day='$day' AND year='$year' ";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO users (firstname, lastname, username, password, gender, address, month, day, year)
					VALUES ('$Firstname', '$Lastname', '$username', '$password', '$gender', '$address', '$month', '$day', '$year')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('Wow! User Registration Completed.')</script>";
				$Firstname = "";
				$Lastname = "";
				$username = "";
				$_POST['password'] = "";
				$gender = "";
				$address = "";
				$month = "";
				$day = "";
				$year = "";
				header('Location: index.php?status=register_success');


			} else {
				echo "<script>alert('Woops! Something Went Wrong.')</script>";
			}

		} else {
			echo "<script>alert('Woops! Username Already Exists.')</script>";
		}
		
	} else {
		echo "<script>alert('Password Not Matched.')</script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="style.css">

	<title>Registration</title>
</head>
<body>
	<div class="container">
	<nav class="navbar navbar-expand-xl navbar-dark bg-dark">
	<a href="#" class="navbar-brand"><i class="fa fa-cube"></i>Shie<b>MiniWebSystem</b></a></nav>		
	</button>
		<form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Registration</p>
			<div class="input-group">
				<input type="text" placeholder="First Name" name="firstname" value="<?php echo $Firstname; ?>" required>
			</div>
			<div class="input-group">
				<input type="text" placeholder="Last Name" name="lastname" value="<?php echo $Lastname; ?>" required>
			</div>
			<div class="input-group">
				<input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>
<div class="row"><label class="control-label" >Gender:</label>
  <div class="col-md-6" >
    <label class="radio-inline">
      <input type="radio" name="gender" value="Male" <?php if ($gender != "Female") echo "checked"; ?> />Male
    </label>
    <label class="radio-inline">
      <input type="radio" name="gender" value="Female" <?php if ($gender == "Female") echo "checked"; ?> />Female
    </label>
	<div class="input-group">
				<input type="text" placeholder="Address" name="address" value="<?php echo $address; ?>" required>
			</div>
			<div class="row"><label class="control-label" >BirthDate:</label>
			<div class="field">
	        		<select style="width: 100%; height: 50px; border-radius: 30px; padding-left: 10px; border: 1px solid lightgray" name="month" value="<?php echo $_POST['month']; ?>"required>
		               	<option value="NS">Select Month</option>
		                <option value="January">1</option>
		                <option value="February">2</option>
		                <option value="March">3</option>
		                <option value="April">4</option>
		                <option value="May">5</option>
		                <option value="June">6</option>
		                <option value="July">7</option>
		                <option value="August">8</option>
		                <option value="September">9</option>
		                <option value="October">10</option>
		                <option value="November">11</option>
		                <option value="December">12</option>
		            </select>
	        	</div>	
		
	        	<div class="input-group">
				<input type="text" placeholder="Day" name="day" value="<?php echo $_POST['day']; ?>" required>
            </div>

	        	<div class="field">
	        		<select style="width: 100%; height: 50px; border-radius: 30px; padding-left: 10px; border: 1px solid lightgray" name="year">
		               	<option value="NS">Select Year</option>
		                <?php 
			                $i = 2000;
			                while ($i <= 2022) {
		                ?>
		                	<option value="<?php echo $i; ?>">
		                		<?php echo $i; ?>
		                	</option>
		                <?php $i++; } ?>
		            </select>
	        	</div>
  </div>
</div>
			<div class="input-group">
				<button name="submit" class="btn">Register</button>
				<a href="index.php" class="btn">Back</a>
			</div><br>
			<p class="login-register-text">Already have an account click<a href="index.php">Login</a>.</p>
			<p>Powered By: Narido, Shiela Mae BSIT-3B EVSU</p>
		</form>
	</div>
</body>
</html>