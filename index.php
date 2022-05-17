<?php 

include 'config.php';

session_start();

error_reporting(0);

if (isset($_SESSION['username'])) {
    header("Location: records.php");
}

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['username'] = $row['username'];
		header('Location: records.php?status=logined');
	} else {
		echo "<script>alert('Woops! Username or Password is Wrong.')</script>";
	}
}

?>





<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-grid.min.css">
      <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="assets/style.css">

	<link rel="stylesheet" type="text/css" href="style.css">

	<title>Account Record</title>
</head>

<body>

	<div class="container" >
			                   <?php 
    if (isset($_GET['status']) && $_GET['status'] == 'register_success'){
      ?>
  <div
    aria-live="polite"
    aria-atomic="true"
    class="position-relative"
    style="z-index: 1300"
  >
    <div class="toast-container position-absolute top-0 end-0 p-3">
      
      <div
        class="toast toast hide"
        role="alert"
        aria-live="assertive"
        aria-atomic="true"
      >
        <div class="toast-header bg-danger text-light">
          <strong class="me-auto"><?= $_SESSION['username'];?></strong>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="toast"
            aria-label="Close"
          ></button>
        </div>
        <div class="toast-body">REGISTER SUCCESSFULLY</div>
      </div>
    </div>
  </div>

      <?php
    }
      ?>
    <div class="imgcontainer">
    <img src="ee.jpg" alt="Avatar" class="avatar" >
		<form action="" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Please sign in!</p>
			<div class="input-group">
				<input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Sign in</button>
			</div>
			<p class="login-register-text">Want to have an account click <a href="register.php">Register!</a>.</p>
		</form>
	</div>
</body>
	      <script src="assets/js/jquery.min.js"></script>
      <script src="assets/js/bootstrap.min.js"></script>
      <script  src="assets/js/lightbox-plus-jquery.min.js"></script>
    <script>
      window.onload = (event) => {
        let myAlert = document.querySelector(".toast");
        let bsAlert = new bootstrap.Toast(myAlert);
        bsAlert.show();
      };
    </script>
</html>