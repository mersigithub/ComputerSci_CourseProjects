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

  $customerName = $_POST['customerName'];
  $customerPhone = $_POST['customerPhone'];



//echo "INSERT into `customer` (`customerName`, `customerPhone`, `dateEntered`) VALUES ('$customerName', '$customerPhone', NOW())";


  $insert_task = mysqli_query($dbCon, "INSERT into `customer` (`customerName`, `customerPhone`, `dateEntered`) VALUES ('$customerName', '$customerPhone', NOW())") or die(mysqli_error($dbCon));

  header("Location: customers");


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
            <h1>Add New Customer</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index">Home</a></li>
              <li class="breadcrumb-item"><a href="customers">Customers</a></li>
              <li class="breadcrumb-item active">Add New Customer</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <form name="add_task" action="new-customer.php" method="post">
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
                <label for="inputStatus">Customer Name</label>
                <input type="text" id="customerName" class="form-control" name="customerName" value="">

              </div>
              <div class="form-group">
                <label for="task_name">Customer Phone</label>
                <input type="text" id="customerPhone" class="form-control" name="customerPhone" value="">
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
