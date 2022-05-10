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
                        <p>Doughnut</p>
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


<div class="row">
                    <div class="col-md-6">
                        <div class="card ">
                            <div class="header">
                                <h4 class="title">DOUGNUT 03</h4>
                                <p class="category">Customers' total count of orders with more than 15 orders.</p>
                            </div>
                            <div class="content">
                            <canvas id="chart03"></canvas>
                            <?php
                            require('config/config.php');
                            require('config/db.php');
                            $query03 = "SELECT CompanyName, count(*) as total_count
                                        FROM customers, orders
                                        WHERE customers.CustomerID = orders.CustomerID 
                                        GROUP BY CompanyName HAVING total_count> 15 ";
                            $result03 = mysqli_query($conn, $query03);
                                if(mysqli_num_rows($result03) > 0){
                                    $CompanyName = array();
                                    $total_count = array();
                                 while ($row = mysqli_fetch_array($result03)){
                                    $CompanyName[] = $row['CompanyName'];
                                    $total_count[] = $row['total_count'];
                                    }
                                    mysqli_free_result($result03);
                                    mysqli_close($conn);
                                }else{
                                    echo "No records matching your query were found."; }
                                ?>
                            
                            <script>
                               // <!-- setup block -->
                               const CompanyName = <?php echo json_encode($CompanyName); ?>;
                               const total_count = <?php echo json_encode($total_count); ?>;
                               const data3 = {
                               labels: CompanyName,
                               datasets: [{
                                   label: 'My First Dataset',
                                   data:  total_count,
                                   backgroundColor: [
                                       'rgb(255, 99, 132)',
                                       'rgb(54, 162, 235)',
                                       'rgb(255,165,0)',
                                       'rgb(187, 233, 0)',
                                       'rgb(187, 84, 0)',
                                       'rgb(187, 84, 179)',
                                       'rgb(7, 84, 53)',
                                       'rgb(7, 251, 133)',
                                       'rgb(187, 12, 78)'
                                    ],
                                    hoverOffset: 4
                                }]
                            };
                            // <!-- config block -->
                            const config3 = {
                                type: 'doughnut',
                                data: data3,
                            };
                            // <!-- render block -->
                            const chart03 = new Chart(
                                document.getElementById('chart03'),
                                config3
);
        
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
