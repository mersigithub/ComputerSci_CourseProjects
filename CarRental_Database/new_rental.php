<?php include("connex.php");

$page_name = "tasks";

// Start PHP session at the beginning
session_start();
// This page can be accessed only after login
// Redirect user to login page, if user email is not available in session
if (!isset($_SESSION["email"])) {
    header("location: index");
}

?>
<?php

if(isset($_POST['submit']) && $_POST['submit'] == "Submit") {

  $duration = $_POST['duration'];
  $durationType = $_POST['durationType'];
  $startDate = $_POST['startDate'];
  if ($durationType == 'daily') {
    $endDate = date("Y-m-d", strtotime($date . "+$duration day"));
  }
  elseif($durationType == 'weekly')
  {
    $endDate = date("Y-m-d", strtotime($date . "+$duration week"));
  }
  $carIdNo = $_POST['carIdNo'];
  $customerIdNo = $_POST['customerIdNo'];




  $insert_task = mysqli_query($dbCon, "INSERT into `rentals` (`duration`, `durationType`, `startDate`, `endDate`, `carIdNo`, `customerIdNo`, `dateEntered`) VALUES ('$duration', '$durationType', '$startDate', '$endDate', '$carIdNo', '$customerIdNo', NOW())") or die(mysqli_error($dbCon));

  header("Location: rentals");


}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include("meta.php"); ?>

</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <?php include("nav.php");?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include("sidebar.php");?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add New Rental</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index">Home</a></li>
              <li class="breadcrumb-item"><a href="tasks">Rentals</a></li>
              <li class="breadcrumb-item active">Add New Rental</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <form name="add_task" action="new-rental.php" method="post">
      <div class="row">
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title"></h3>


              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="inputStatus">Duration</label>
                <input type="text" id="duration" class="form-control" name="duration" value="">

              </div>
              <div class="form-group">
                <label for="task_name">Duration Type</label>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="durationType" value="daily" checked>
                  <label class="form-check-label">Daily</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="durationType" value="weekly">
                  <label class="form-check-label">Weekly</label>
                </div>
              </div>

              <div class="form-group">
                <label>Date:</label>
                  <div class="input-group date" id="startDate" data-target-input="nearest">
                      <input type="text" class="form-control datepicker-input" data-target="#startDate" name="startDate" id="startDate"/>
                      <div class="input-group-append" data-target="#startDate" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                      </div>
                  </div>
              </div>
              <div class="form-group">
                <label for="task">Car</label>
                <select id="carIdNo" name="carIdNo" class="form-control custom-select">


                  <option selected  disabled>Select one</option>
                  <?php

                    do {
                  ?>
                  <option value="<?php echo $car_row['carIdNo']?>"><?php echo $car_row['carVehicleId']?> <?php echo $car_row['carType']?> </option>
                <?php }while($car_row = mysqli_fetch_array($car_query));?>

                </select>
              </div>

              <div class="form-group">
                <label for="task">Customer</label>
                <select id="customerIdNo" name="customerIdNo" class="form-control custom-select">




                  <option selected disabled>Select one</option>
                  <?php
                    do {
                  ?>
                  <option value="<?php echo $customer_row['customerIdNo']?>"><?php echo $customer_row['customerName']?> </option>
                <?php }while($customer_row = mysqli_fetch_array($customer_query));?>

                </select>
              </div>

              <!-- <div class="form-group">
                <label for="inputClientCompany">Client Company</label>
                <input type="text" id="inputClientCompany" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputProjectLeader">Project Leader</label>
                <input type="text" id="inputProjectLeader" class="form-control">
              </div> -->
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>

      </div>
      <div class="row">
        <div class="col-6">
          <input type="reset" name="Reset" id="button" value="Cancel" class="btn btn-secondary" onClick="return confirmSubmit()"/>
          <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-success float-right" onClick="return confirmSubmit()"/>
        </div>
      </div>
    </form>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php include("footer.php")?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->




<?php include("footer_scripts.php")?>

</body>
</html>
