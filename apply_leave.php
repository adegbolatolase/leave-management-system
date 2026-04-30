<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Leave</title>
    
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    
      <script defer src="assets/fontawesome/js/all.min.js"></script>
    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/css/app.css">
</head>
<?php include('session.php')?>
<body>
    <div id="app">
        <div id="sidebar" class='active'>
            <div class="sidebar-wrapper active">
    <div class="sidebar-header" style="height: 50px;margin-top: -30px">
                      <i class="fa fa-users text-success me-4"></i>
                        <span>NHRS</span>
                </div>
               <div class="sidebar-menu">
                  <ul class="menu">
                     <li class="sidebar-item ">
                        <a href="employee.php" class='sidebar-link'>
                        <i class="fa fa-home text-success"></i>
                        <span>Dashboard</span>
                        </a>
                     </li>
                     <li class="sidebar-item active">
                        <a href="apply_leave.php" class='sidebar-link'>
                        <i class="fa fa-plane text-success"></i>
                        <span>Apply Leave</span>
                        </a>
                     </li>
                     <li class="sidebar-item ">
                        <a href="leave_status.php" class='sidebar-link'>
                        <i class="fa fa-plane text-success"></i>
                        <span>Leave Status</span>
                        </a>
                     </li>
                  </ul>
    </div>
    <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
</div>
        </div>
        <div id="main">
            <nav class="navbar navbar-header navbar-expand navbar-light">
                <a class="sidebar-toggler" href="#"><span class="navbar-toggler-icon"></span></a>
                <button class="btn navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav d-flex align-items-center navbar-light ms-auto">
                      
                     <li class="dropdown">
                        <a href="#" data-bs-toggle="dropdown"
                           class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                           <div class="avatar me-1">
                              <img src="assets/images/admin.png" alt="" srcset="">
                           </div>
                           <div class="d-none d-md-block d-lg-inline-block">HI,<?php echo $_SESSION['alogin']; ?></div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                           <a class="dropdown-item" href="update.html"><i data-feather="user"></i> Account</a>
                           <a class="dropdown-item" href="update_password.html"><i data-feather="settings"></i> Settings</a>
                           <div class="dropdown-divider"></div>
                           <a class="dropdown-item" href="index.php"><i data-feather="log-out"></i> Logout</a>
                        </div>
                     </li>
                  </ul>
                </div>
            </nav>
            
<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Apply for Leave</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="admin.php" class="text-success">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Leave Application</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="" method="post">
                            <?php
                                    require_once('DBController.php');
                                     // SQL query
                                    $query = "SELECT firstname,lastname,email,staff_leave FROM employees WHERE emp_id = '$session_id'";

                                    // Execute the query (the recordset $rs contains the result)
                                    $result = mysqli_query($dbConnection, $query);

                                    // Loop the recordset $rs
                                    // Each row will be made into an array ($row) using mysqli_fetch_array
                                    while($row = mysqli_fetch_array($result)) {
                            ?>
                                <div class="row">   
                                    <div class="col-md-6">
										<div class="form-group">
											<label >First Name </label>
                                            <input name="lastname" type="text" class="form-control"  required="true" readonly autocomplete="off" value="<?php echo $row['firstname']; ?>">
										</div>
									</div> 
									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label >Last Name </label>
											<input name="lastname" type="text" class="form-control"  required="true" readonly autocomplete="off" value="<?php echo $row['lastname']; ?>">
										</div>
									</div>
									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label>Email Address</label>
											<input name="email" type="text" class="form-control" required="true" readonly autocomplete="off" value="<?php echo $row['email']; ?>" >
										</div>
									</div>
                                    <div class="col-md-6">
										<div class="form-group">
											<label>Available Leave Days </label>
											<input name="av_days" type="text" class="form-control" required="true" readonly autocomplete="off" value="<?php echo $row['staff_leave']; ?>">
										</div>
									</div>  
                                    <?php
                                     }
                                    ?>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="first-name-icon">Numbers of days already taken</label>
                                             <div class="form-group has-icon-left">
                                                 <input type="text" class="form-control" placeholder="" name="num_taken" id="num_taken">
                                             </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="first-name-icon">Number of day outstanding</label>
                                            <input type="text" class="form-control" placeholder="" name="num_out" id="num_out">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="first-name-icon">Numbers of days Requested</label>
                                             <div class="form-group has-icon-left">
                                                 <input type="text" class="form-control" placeholder="" name="num_request" id="num_request">
                                             </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                    <div class="form-group has-icon-left">
                                            <label for="first-name-icon">Select Leave Type</label>
                                            <div class="position-relative">
                                                <fieldset class="form-group">
                                                    <select class="form-select" name="leave_type" id="leave_type">
                                                        <option>General Leave</option>
                                                    </select>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="first-name-icon">DATE LEAVE STARTS</label>
                                            <div class="position-relative">
                                                <input type="date" class="form-control" placeholder="first name" name="leave_starts" id="leave_starts">
                                                <div class="form-control-icon">
                                                    <i class="fa fa-user"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="first-name-icon">DATE LEAVE ENDS</label>
                                            <div class="position-relative">
                                                <input type="date" class="form-control" placeholder="first name" name="leave_ends" id="leave_ends">
                                                <div class="form-control-icon">
                                                    <i class="fa fa-user"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="first-name-icon">RESUMPTION DATE</label>
                                            <div class="position-relative">
                                                <input type="date" class="form-control" placeholder="first name" name="resume_date" id="resume_date">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-sm-12">
										<div class="form-group">
											<label>Reason For Leave</label>
											<textarea id="textarea1" name="description" class="form-control" required length="150" maxlength="150" required="true" autocomplete="off"></textarea>
										</div>
									</div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- // Basic multiple Column Form section end -->
</div>

        </div>
    </div>
    <script src="assets/js/feather-icons/feather.min.js"></script>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/app.js"></script>
    
    <script src="assets/js/main.js"></script>
</body>
</html>
