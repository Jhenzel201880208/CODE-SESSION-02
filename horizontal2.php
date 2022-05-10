<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Light Bootstrap Dashboard by Creative Tim</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text">
                    Creative Tim
                </a>
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="dashboard.php">
                        <i class="pe-7s-graph"></i>
                        <p>HORIZONTAL 2</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Dashboard</a>
                </div>
            </div>
        </nav>
<div class="col-md-10">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">HORIZONTAL BAR 02</h4>
                                <p class="category">Number of Assisted Orders by every Employee</p>
                            </div>
                            <div class="content">
                            <canvas id="chart02"></canvas>
                            <?php
                            require('config/config.php');
                            require('config/db.php');
                            $query02 = "SELECT LastName, count(*) as order_count 
                            FROM northwind.orders, northwind.employees 
                            WHERE orders.EmployeeID = employees.EmployeeID 
                            GROUP BY LastName ";
                            $result02 = mysqli_query($conn, $query02);
                                if(mysqli_num_rows($result02) > 0){
                                    $LastName = array();
                                    $order_count = array();
                                 while ($row = mysqli_fetch_array($result02)){
                                    $LastName[] = $row['LastName'];
                                    $order_count[] = $row['order_count'];
                                    }
                                    mysqli_free_result($result02);
                                    mysqli_close($conn);
                                }else{
                                    echo "No records matching your query were found."; }
                                ?>
                            
                          
                            <script>
                                   //<!--setup block-->
                                   const LastName = <?php echo json_encode($LastName); ?>;
                                   const order_count = <?php echo json_encode($order_count); ?>;
                                   const data2 ={
                                            labels: LastName,
                                                datasets: [{
                                                    label: 'Number of Assisted Order of Employees',
                                                    data: order_count,
                                                    backgroundColor: ['rgb(255, 255, 100)'],
                                                    hoverOffset: 4
                                            }]
                                        };
                                    // <!-- config block -->
                                        const config2 = {
                                            type: 'bar',
                                            data: data2,
                                            options: {
                                                indexAxis:'y'       
                                            },
                                        };
                                        // <!-- render block -->
                                        const chart02 = new Chart(document.getElementById('chart02'),config2);
    
                                </script>

                               

    </div>
</div>
                                  



</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>

	<script type="text/javascript">
    	$(document).ready(function(){

        	demo.initChartist();

        	$.notify({
            	icon: 'pe-7s-gift',
            	message: "Welcome to <b>Light Bootstrap Dashboard</b> - a beautiful freebie for every web developer."

            },{
                type: 'info',
                timer: 4000
            });

    	});
	</script>

</html>
