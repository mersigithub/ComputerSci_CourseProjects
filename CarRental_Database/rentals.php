<?php include("connex.php");

$page_name = "rentals";


// Start PHP session at the beginning
session_start();
// This page can be accessed only after login
// Redirect user to login page, if user email is not available in session
if (!isset($_SESSION["email"])) {
    header("location: index");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php include("meta.php"); ?>
  <?php


  $rental_query = mysqli_query($dbCon, "SELECT rentalId, duration, durationType, startDate, endDate, carIdNo, customerIdNo, DATE_FORMAT(`startDate`, '%M %d %Y') as `startDate`, DATE_FORMAT(`endDate`, '%M %d %Y') as `endDate` FROM `rentals`") or die(mysqli_error($dbCon));

  $rental_row = mysqli_fetch_array($rental_query);

  

  ?>
</head>
<body class="hold-transition sidebar-mini">
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
            <h1>Rentals</h1> <button type="button" class="btn btn-primary" ><a href="new-rental" style="color:#fff">Add New Rental</a></button>

            <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-primary">
                  Add New rental
                </button> -->
          </div>

          <div class="modal fade" id="modal-primary">
                  <div class="modal-dialog">
                    <div class="modal-content bg-default">
                      <div class="modal-header">
                        <h4 class="modal-title">Select type of rental</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <p><a href="rental-add?type=oneoff">One off rental</a> | <a href="rental-add?type=recur">Recurring rental</a></p>
                      </div>
                      <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-outline-light">Save changes</button>
                      </div>
                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div>

          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Rentals</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Rentals</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#NO</th>
                    <th>Customer</th>
                    <th>Car</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Duration</th>
                    <th>Duration Type</th>
                    <th>Cost</th>
                    <th>Amount Due</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 0;

                    do {
                      $no++;



                      //Get Customer
                      $this_customer = $rental_row['customerIdNo'];
                      $customer_query = mysqli_query($dbCon, "SELECT * FROM `customer` WHERE `customerIdNo` = '$this_customer'") or die(mysqli_error($dbCon));
                      $customer_row = mysqli_fetch_array($customer_query);

                      //Get Car


                      $this_car = $rental_row['carIdNo'];
                      $car_query = mysqli_query($dbCon, "SELECT * FROM `car` WHERE `carIdNo` = '$this_car'") or die(mysqli_error($dbCon));
                      $car_row = mysqli_fetch_array($car_query);


                      ?>
                  <tr>
                    <td><?php echo $no;?></td>
                    <td><?php echo $customer_row['customerName']?> </td>
                    <td><?php echo $car_row['carVehicleId']?> (<?php echo $car_row['carType']?>)</td>
                    <td><?php echo $rental_row['startDate']; ?></td>
                    <td><?php echo $rental_row['endDate']; ?></td>
                    <td><?php echo $rental_row['duration']; ?></td>
                    <td><?php echo $rental_row['durationType']; ?></td>
                    <td><?php
                    if ($rental_row['durationType'] == 'weekly') {
                      echo $car_row['carWeeklyRate'];
                    }
                    elseif ($rental_row['durationType'] == 'daily') {
                      echo $car_row['carDailyRate'];
                    }
                  ?></td>
                    <td><?php
                    if ($rental_row['durationType'] == 'weekly') {
                      echo $car_row['carWeeklyRate'] * $rental_row['duration'];
                    }
                    elseif ($rental_row['durationType'] == 'daily') {
                      echo $car_row['carDailyRate'] * $rental_row['duration'];
                    }
                  ?></td>
                    <td>

<!--
                    <a class="btn btn-primary btn-sm" href="rental-detail?rental_id=<?php echo $rental_row['rental_id'];?>">
                      <i class="fas fa-folder">
                      </i>
                      View
                  </a>
                    <a class="btn btn-info btn-sm" href="rental-add?action=e&rental_id=<?php echo $rental_row['rental_id'];?>">
                        <i class="fas fa-pencil-alt">
                        </i>
                        Edit
                    </a>
                    <a class="btn btn-danger btn-sm" href="#">
                        <i class="fas fa-trash">
                        </i>
                        Delete
                    </a> -->

                  </td>
                  </tr>
                <?php }while($rental_row = mysqli_fetch_array($rental_query));?>

                  </tbody>
                  <tfoot>
                  <tr>
                    <th>#NO</th>
                    <th>Customer</th>
                    <th>Car</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Duration</th>
                    <th>Duration Type</th>
                    <th>Cost</th>
                    <th>Amount Due</th>
                    <th>Actions</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
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

<!-- jQuery -->
<?php include("footer_scripts.php")?>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": true, "autoWidth": true,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
      "aLengthMenu": [[ 50, 75, 100, -1], [50, 75, 100, "All"]],
      "iDisplayLength": 50
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });



</script>
</body>
</html>
