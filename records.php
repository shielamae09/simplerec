<?php 
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}
include 'template/header.php';

?>


<nav class="navbar hc p-2">
  <div class="float-start">
      <h3  class="navbar-brand ms-4 mt-2"><i class="fa fa-cube"></i>Shie<b class="border-bottom border-warning">MiniWebSystem</b></h3>
  </div>

  <div class="float-end me-5">

  <div class="dropdown ">
  <button class="btn text-light border border-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
    <?= $_SESSION['username'];?>
    <img src="assets/pictures/profile.png" height="25px">
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <li><a class="dropdown-item" href="logout.php">Sign out</a></li>
  </ul>
</div>
  </div>

</nav>


<!-- alert -->

<!-- login alert -->

                    <?php 
    if (isset($_GET['status']) && $_GET['status'] == 'logined'){
      ?>
  <div
    aria-live="polite"
    aria-atomic="true"
    class="position-relative"
    style="z-index: 1300"
  >
    <div class="toast-container position-absolute top-0 end-0 p-3">
      <!-- Then put toasts within -->
      <div
        class="toast toast hide"
        role="alert"
        aria-live="assertive"
        aria-atomic="true"
      >
        <div class="toast-header bg-danger text-light">
          <strong class="me-auto"><?=$_SESSION['username']?></strong>
          <small>just now</small>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="toast"
            aria-label="Close"
          ></button>
        </div>
        <div class="toast-body">SUCCESSFULLY LOGINED!</div>
      </div>
    </div>
  </div>

      <?php
    }
      ?>

<!-- update alert -->


                    <?php 
    if (isset($_GET['status']) && $_GET['status'] == 'update_success'){
      ?>
  <div
    aria-live="polite"
    aria-atomic="true"
    class="position-relative"
    style="z-index: 1300"
  >
    <div class="toast-container position-absolute top-0 end-0 p-3">
      <!-- Then put toasts within -->
      <div
        class="toast toast hide"
        role="alert"
        aria-live="assertive"
        aria-atomic="true"
      >
        <div class="toast-header bg-danger text-light">
          <strong class="me-auto"><?=$_SESSION['username']?></strong>
          <small>just now</small>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="toast"
            aria-label="Close"
          ></button>
        </div>
        <div class="toast-body">SUCCESSFULLY UPDATED</div>
      </div>
    </div>
  </div>

      <?php
    }
      ?>



<!-- delete alert -->
                   <?php 
    if (isset($_GET['status']) && $_GET['status'] == 'delete_success'){
      ?>
  <div
    aria-live="polite"
    aria-atomic="true"
    class="position-relative"
    style="z-index: 1300"
  >
    <div class="toast-container position-absolute top-0 end-0 p-3">
      <!-- Then put toasts within -->
      <div
        class="toast toast hide"
        role="alert"
        aria-live="assertive"
        aria-atomic="true"
      >
        <div class="toast-header bg-danger text-light">
          <strong class="me-auto"><?= $_SESSION['username'];?></strong>
          <small>just now</small>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="toast"
            aria-label="Close"
          ></button>
        </div>
        <div class="toast-body">RECORD DELETE</div>
      </div>
    </div>
  </div>

      <?php
    }
      ?>

<!--  -->


<div class="d-flex justify-content-center">

<div class="card m-5 " style="width:45rem;">
  <div class="card-header hc1 text-white">
    Account Record 
  </div>
  <div class="card-body">
<!-- table -->
<table class="table p-5 ">
  <thead class="hc2 text-light">
            <tr>
     
      <td class="table-active text-center text-light w-50">Full Name</td>
      <td class="table-active text-center text-light w-50">User Name</td>
      <td class="table-active text-center text-light w-50">Gender</td>
      <td class="table-active text-center text-light w-50">Address</td>
      <td class="table-active text-center text-light w-50">BirthDate</td>
      <td class="text-center " >Action</td>
    </tr>
  </thead>
  <tbody class="p-5 m-5">

<?php 

include 'config.php';

$current_user = $_SESSION['username'];

// getting current user

$query_user = "SELECT * FROM users";

$result = $conn->query($query_user);
$num=1;

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

      if ($row['username'] == $current_user) {
        ?>
        <!-- fetch current user login only view action-->
                <tr class="text-center">

      <td class="table-active text-capitalize"><?=$row['firstname']."  ".$row['lastname']?></td>
      <td class="table-active text-capitalize"><?=$row['username']?></td>
      <td class="table-active text-capitalize"><?=$row['gender']?></td>
      <td class="table-active text-capitalize"><?=$row['address']?></td>
      <td class="table-active text-capitalize"><?=$row['birth_month']."  ".$row['birth_day']."  ".$row['birth_year']?></td>
           <td class="table-active d-flex justify-content-around ">
            <div class="col-sm-auto "><a href="edit.php?id=<?=$row["id"]?>"><button class="btn" type="submit" name="save" >Edit</button><button class="btn" type="submit" name="save" >Delete</button></a></div>
           </td>
    </tr>

        <?php
      }

      else{
        ?>

    <tr class="text-center">
      <td class=" text-capitalize"><?=$row['firstname']."  ".$row['lastname']?></td>
      <td class="text-capitalize "><?=$row['username']?></td>
      <td class="table-active text-capitalize"><?=$row['gender']?></td>
      <td class="table-active text-capitalize"><?=$row['address']?></td>
      <td class="table-active text-capitalize"><?=$row['birth_month']."  ".$row['birth_day']."  ".$row['birth_year']?></td>
      <td class="d-flex justify-content-around "> 
        <div class="col-sm-auto "><a href='edit.php?id=<?=$row["id"]?>'><button class="btn" type="submit" name="save" >Edit</button></a></div>
        <div class="col-sm-auto "><a href='delete.php?id=<?=$row["id"]?>' onclick="return confirm('are you sure you want to delete this record ?')"><button class="btn" type="submit" name="save" >Delete</button></a></div>
      </td>
    </tr>


        <?php
      }
  }
}


?>



  </tbody>
</table>
<p>Powered by: Shiela Mae Narido BSIT-3B EVSU-STUDENT</p>
  </div>
</div>




</div>




  </body>
  <?php include 'template/footer.php'; ?>
</html> 
    
                
            

