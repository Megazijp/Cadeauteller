<?php include('getdata.php'); ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Cadeau Teller</title>

        <link rel="shortcut icon" href="img/mijter.gif">
        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/clean-blog.min.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
        <!--Load the AJAX API-->
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script type="text/javascript">
            
            function areYouSure(){
                
            }
            // Load the Visualization API and the piechart package.
            google.load('visualization', '1.0', {
                'packages': ['corechart']
            });

            // Set a callback to run when the Google Visualization API is loaded.
            google.setOnLoadCallback(drawChart);

            // Callback that creates and populates a data table,
            // instantiates the pie chart, passes in the data and
            // draws it.
            function drawChart() {





                // Create the data table.
                var data = google.visualization.arrayToDataTable([
         ['Element', 'Cadeautjes', {
                        role: 'style'
                    }],
<?php 
foreach($personen as $item){
    if($item[2] == "zijp"){
        continue;
    }
    echo "['" . $item[0] . "', " . $item[1] . ", '#b87333'],";
}
?>
      ]);

                // Set chart options
                var options = {
                    width: '90%',
                    height: 350,
                    chxs: '0N*f0*',
                    'chartArea': {
                        'width': '70%',
                        'height': '90%'
                    },
                    animation: {
                        duration: 2000,
                        easing: 'out',
                        startup: true
                    },
                    bar: {
                        groupWidth: "95%"
                    },
                    legend: {
                        position: "none"
                    }
                };

                // Instantiate and draw our chart, passing in some options.
                var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
                chart.draw(data, options);
            }
        </script>
    </head>

    <body>

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-custom navbar-fixed-top">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">Cadeau Teller 2015</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li>
                            <a href="familiezijp.php">Familie Zijp</a>
                        </li>
                        <li>
                            <a href="familiepoot.php">Familie Poot</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>

        <!-- Page Header -->
        <!-- Set your background image for this header on the line below. -->
        <header class="intro-header" style="background-image: url('img/home-bg.jpg')">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                        <div class="site-heading">
                            <h1>Sinterklaas 2015</h1>
                            <hr class="small">
                            <span class="subheading">Een duidelijk overzicht van het aantal cadeautjes!</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="post-preview">
                        <h2 class="post-title">
                            Familie Poot
                        </h2>
                        <div id="chart_div" style="paddin-top: 0;"></div>
                        <p class="post-meta">Last changed on
                            <?php echo $lastchanged['poot'] ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="post-preview">
                        <h2 class="post-title">
                            Overzichts tabel
                        </h2>
                        <table class="table table-striped">
                            <tr>
                                <th>Voor</th>
                                <th>Van</th>
                            </tr>
                            <?php
foreach($personen as $item){
    if($item[2] == "zijp") continue;
    echo "<tr><td>" . $item[0] . "</td><td>";
    $giftpersons = array();
    foreach($cadeautjes as $cad){
        if($cad[1] == $item[0]){
            if(array_key_exists($cad[0], $giftpersons)){
                $giftpersons[$cad[0]] += 1;
            }else{
                $giftpersons[$cad[0]] = 1;
            }
        }
    }
    foreach($giftpersons as $key => $value){
        echo $key . ": " . $value . " cadeautjes<br />";
    }
    
    echo "</td></tr>";
}
?>

                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="post-preview">
                        <h2 class="post-title">
                            Cadeaau Toevoegen
                        </h2>
                        <form action="addentry.php" method="get" class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Van</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="van">
                                        <?php
    foreach($personen as $key => $item){
        echo "<option value='" . $key . "'>" . $item[0] . "</option>";
    }
?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Voor</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="voor">
                                        <?php
    foreach($personen as $key => $item){
        if($item[2] == "zijp") continue;
        echo "<option value='" . $key . "'>" . $item[0] . "</option>";
    }
?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-2"></div>
                            <div class="col-sm10">
                                <button type="submit" class="btn btn-primary">Toevoegen</button>
                            </div>
                        </form>

                    </div>
                    <div id="chart_div" style="paddin-top: 0;"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="post-preview">
                        <h2 class="post-title">
                            Cadeau Verwijderen
                        </h2>
                        <form action="removeentry.php" method="get" class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Van</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="van" id="delvan">
                                        <?php
    foreach($personen as $key => $item){
        echo "<option value='" . $key . "'>" . $item[0] . "</option>";
    }
?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Voor</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="voor" id="delvoor">
                                        <?php
    foreach($personen as $key => $item){
        if($item[2] == "zijp") continue;
        echo "<option value='" . $key . "'>" . $item[0] . "</option>";
    }
?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-2"></div>
                            <div class="col-sm10">
                                <button onclick="var van = document.getElementById('delvan').options[document.getElementById('delvan').selectedIndex].text; var voor = document.getElementById('delvoor').options[document.getElementById('delvoor').selectedIndex].text;return confirm('Je staat op het punt een cadeautje te verwijderen van '+van+' voor '+ voor+'. Weet je het zeker?');" type="submit" class="btn btn-danger">Verwijderen</button>
                            </div>
                        </form>
                        <br/>

                    </div>
                    <div id="chart_div" style="paddin-top: 0;"></div>
                </div>
            </div>
        </div>

        <hr>

        <!-- Footer -->
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                        <p class="copyright text-muted">Copyright &copy; Mark Zijp 2015</p>
                    </div>
                </div>
            </div>
        </footer>

        <!-- jQuery -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="js/clean-blog.min.js"></script>

    </body>

    </html>