<?php
include "config.php";
session_start();
$id = $_SESSION['user'];
$type = $_SESSION['type'];


 ?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
	<link rel="icon" type="image/png" href="../assets/img/favicon.png" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Material Dashboard by Creative Tim</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />

    <!--  Material Dashboard CSS    -->
    <link href="../assets/css/material-dashboard.css" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="../assets/css/demo.css" rel="stylesheet" />

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
</head>

<body>

	<div class="wrapper">
	    <div class="sidebar" data-color="purple" data-image="../assets/img/sidebar-1.jpg">
			<!--
	        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"
		    Tip 2: you can also add an image using data-image tag

			-->

			<div class="logo">
				<a href="..\..\home.php" class="simple-text">
					BOLEH
				</a>
			</div>


	    	<div class="sidebar-wrapper">
				<ul class="nav">
	                <li>
	                    <a href="dashboard.php">
	                        <i class="material-icons">dashboard</i>
	                        <p>Dashboard</p>
	                    </a>
	                </li>
	                <li>
	                    <a href="user.php">
	                        <i class="material-icons">person</i>
	                        <p>User Profile</p>
	                    </a>
	                </li>
                  <li class="active">
	                    <a href="transaction.php">
	                        <i class="material-icons">library_books</i>
	                        <p>Transaksi Saya</p>
	                    </a>
	                </li>
	            </ul>
	    	</div>
		</div>

	    <div class="main-panel">
			<nav class="navbar navbar-transparent navbar-absolute">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="#">Transaksi</a>
					</div>
					<div class="collapse navbar-collapse">
						<ul class="nav navbar-nav navbar-right">
							<li>
								<a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
									<i class="material-icons">dashboard</i>
									<p class="hidden-lg hidden-md">Dashboard</p>
								</a>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<i class="material-icons">notifications</i>
									<span class="notification">5</span>
									<p class="hidden-lg hidden-md">Notifications</p>
								</a>
								<ul class="dropdown-menu">
									<li><a href="#">Mike John responded to your email</a></li>
									<li><a href="#">You have 5 new tasks</a></li>
									<li><a href="#">You're now friend with Andrew</a></li>
									<li><a href="#">Another Notification</a></li>
									<li><a href="#">Another One</a></li>
								</ul>
							</li>
              <li>
								<a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
	 							   <i class="material-icons">person</i>
	 							   <p class="hidden-lg hidden-md">Profile</p>
	 						   </a>
								 <ul class="dropdown-menu">
 									<li><a href="../../logout.php?logout">Logout</a></li>
 								</ul>
							</li>
						</ul>

						<form class="navbar-form navbar-right" role="search">
							<div class="form-group  is-empty">
	                        	<input type="text" class="form-control" placeholder="Search">
	                        	<span class="material-input"></span>
							</div>
							<button type="submit" class="btn btn-white btn-round btn-just-icon">
								<i class="material-icons">search</i><div class="ripple-container"></div>
							</button>
	                    </form>
					</div>
				</div>
			</nav>

	        <div class="content">
	            <div class="container-fluid">
	                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                          <div class="card-header col-md-12" data-background-color="purple">
                              <div class="col-md-4">
                                <h4 class="title">Transaksi Saya</h4>
                                <p class="category">Konfirmasi Pembayaran Anda</p>
                              </div>
                              <div class="col-md-4">
                              </div>
                          </div>
                            <div class="card-content table-responsive">
                                <table class="table">
                                    <thead class="text-primary">
                                      <th>No</th>
                                      <th>Foto</th>
                                      <th>Nama Barang</th>
                                      <th>Harga</th>
                                      <th>Kuantitas</th>
                                      <th>Harga Total</th>
                                      <th>Tanggal Order</th>
                                      <th>Action</th>
                                    </thead>
                                    <tbody>

                                      <!-- SHOWING TABLE -->
                                        <?php
                                        $query = mysqli_query($conn, "SELECT * FROM  orders JOIN items WHERE orders.id_item = items.id_item AND orders.id_user = $id");
                                        $count = 1;

                                        while($result = mysqli_fetch_array($query)){ //selama masih bisa fetch data

                                          echo
                                          '<tr>
                                            <td>'.$count++.'</td>
                                            <td><img src="images/'.$result['pic'].'" width="40" height="50" alt="" style="width:50px; margin-right:20px; margin-bottom:50px;"></td>
                                            <td>'.$result['item_name'].'</td>
                                            <td>'.$result['price'].'</td>
                                            <td>'.$result['order_total'].'</td>
                                            <td>'.$result['price_total'].'</td>
                                            <td>'.$result['order_date'].'</td>
                                            <td> </td>';
                                            if($result['paid']==0){
                                              ?>
                                            <form action="verification.php" method="post">
                                            <input type="hidden" name="iditem" value="<?php echo $result['id_item']; ?>">
                                            <input type="hidden" name="idorder" value="<?php echo $result['id_order']; ?>">
                                            <td><button type="submit" class="btn btn-warning">Konfirmasi</button></td></form>
                                          </tr>
                                            <?php
                                          }else if ($result['paid']==1){
                                            echo '<td><a href=""><button type="button" class="btn btn-default">Tunggu Konfirmasi</button></a>

                                            </tr>';
                                          }else{
                                            ?>
                                            <td><a href=""><button type="button" class="btn btn-success">Terbayar</button></a></td>
                                            <td>
                                              <form action="modules/rate-proses.php" method="post">
                                              <input type="hidden" name="iditem" value="<?php echo $result['id_item']; ?>"> </br>
                                              <input type="number" min=1 max=5 name="rating" onkeypress="return event.charCode >=48" value="5">
                                              <button type="submit" class="btn btn-warning">Rate it !</button>
                                              </form>
                                            </td>


                                        <?php
                                          }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

	        <footer class="footer">
	            <div class="container-fluid">
	                <nav class="pull-left">
	                    <ul>
	                        <li>
	                            <a href="#">
	                                Home
	                            </a>
	                        </li>
	                        <li>
	                            <a href="#">
	                                Company
	                            </a>
	                        </li>
	                        <li>
	                            <a href="#">
	                                Portfolio
	                            </a>
	                        </li>
	                        <li>
	                            <a href="#">
	                               Blog
	                            </a>
	                        </li>
	                    </ul>
	                </nav>
	                <p class="copyright pull-right">
	                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
	                </p>
	            </div>
	        </footer>
	    </div>
	</div>

</body>

	<!--   Core JS Files   -->
	<script src="../assets/js/jquery-3.1.0.min.js" type="text/javascript"></script>
	<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="../assets/js/material.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="../assets/js/chartist.min.js"></script>

	<!--  Notifications Plugin    -->
	<script src="../assets/js/bootstrap-notify.js"></script>

	<!--  Google Maps Plugin    -->
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

	<!-- Material Dashboard javascript methods -->
	<script src="../assets/js/material-dashboard.js"></script>

	<!-- Material Dashboard DEMO methods, don't include it in your project! -->
	<script src="../assets/js/demo.js"></script>

</html>
