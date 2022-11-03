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

  $carType = $_POST['carType'];
  $carVehicleId = $_POST['carVehicleId'];
  $carYear = $_POST['carYear'];
  $carModelMake = $_POST['carModelMake'];
  $carDailyRate = $_POST['carDailyRate'];
  $carWeeklyRate = $_POST['carWeeklyRate'];



  $insert_task = mysqli_query($dbCon, "INSERT into `car` (`carType`, `carVehicleId`, `carYear`, `carModelMake`, `carDailyRate`, `carWeeklyRate`, `dateEntered`) VALUES ('$carType', '$carVehicleId', '$carYear', '$carModelMake', '$carDailyRate', '$carWeeklyRate', NOW())") or die(mysqli_error($dbCon));

  header("Location: cars");


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
            <h1>Add New Car</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index">Home</a></li>
              <li class="breadcrumb-item"><a href="cars">Cars</a></li>
              <li class="breadcrumb-item active">Add New Car</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <form name="add_task" action="new-car.php" method="post">
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
                <label for="inputStatus">Car Type</label>
                <select id="carType" name="carType" class="form-control custom-select">



                  <option selected disabled>Select one</option>

                  <option value="compact">Compact</option>
                  <option value="medium">Medium</option>
                  <option value="large">Large</option>
                  <option value="suv">SUV</option>
                  <option value="truck">Truck</option>
                  <option value="van">Van</option>


                </select>

              </div>
              <div class="form-group">
                <label for="task_name">Vehicle Id</label>
                <input type="text" id="carVehicleId" class="form-control" name="carVehicleId" value="">
              </div>

              <div class="form-group">
                <label for="task">Year</label>
                <input type="text" id="carYear" class="form-control" name="carYear" value="">
                </div>

              <div class="form-group">
                <label for="task">Model/Make</label>
                <input type="text" id="carModelMake" class="form-control" name="carModelMake" value="">

              </div>
              <div class="form-group">
                <label for="task">Daily Rate</label>
                <input type="text" id="carDailyRate" class="form-control" name="carDailyRate" value="">

              </div>
              <div class="form-group">
                <label for="task">Weekly Rate</label>
                <input type="text" id="carWeeklyRate" class="form-control" name="carWeeklyRate" value="">
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

