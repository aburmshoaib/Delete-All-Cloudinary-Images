<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="assets/ico/favicon.ico">

        <title>Cloudinary Manager :: Delete All Images</title>

        <!-- Bootstrap core CSS -->
        <link href="dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Bootstrap theme -->
        <link href="dist/css/bootstrap-theme.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="theme.css" rel="stylesheet">

        <style type="text/css">
            a, a:hover {
                color:inherit;
                text-decoration: none;
            }
        </style>


        <!-- Just for debugging purposes. Don't actually copy this line! -->
        <!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <?php
    require 'cloudinary_api/Cloudinary.php';
    require 'cloudinary_api/Uploader.php';
    require 'cloudinary_api/Api.php';
    ?>

    <body role="document">

        <!-- Fixed navbar -->
        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Cloudinary Manager</a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.php">Delete All Images</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </div>

        <div class="container theme-showcase" role="main">

            <div class="page-header" style="margin-top: -5px;">
                <h1><a class="navbar-brand" href=""><img src="logo.jpg" width="241" height="51" alt="" style="margin-top: -25px;"/></a> Delete All Images</h1>
            </div>
            <div class="panel-body" style="margin-top: -20px;">
                <div class="alert alert-warning">Please note that this deletes ALL images in the specified cloudinary account - this cannot be reversed!</div>
</br><div class="panel panel-default" style="margin-top: -25px;">
        <div class="panel-heading">
            <h3 class="panel-title">Delete All Images</h3>
        </div>
        <div class="panel-body">
            <!-- Single button -->

            <form class="form-horizontal" action="index.php" method="post">
                <fieldset>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="api_key">API Key</label>  
                        <div class="col-md-4">
                            <input id="api_key" name="api_key" placeholder="" class="form-control input-md" required="" type="text">

                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="api_secret">API Secret</label>  
                        <div class="col-md-4">
                            <input id="api_secret" name="api_secret" placeholder="" class="form-control input-md" required="" type="text">

                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="cloud_name">Cloud Name</label>  
                        <div class="col-md-4">
                            <input id="cloud_name" name="cloud_name" placeholder="" class="form-control input-md" required="" type="text">

                        </div>
                    </div>


                    <!-- Button -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="submit"></label>
                        <div class="col-md-4">
                            <button id="submit" name="submit" class="btn btn-danger"><span class="glyphicon glyphicon-exclamation-sign"></span>
                                Delete All Images</button>
                        </div>
                    </div>

                </fieldset>
            </form>

<?php
if (isset($_POST['cloud_name']) && isset($_POST['api_key']) && isset($_POST['api_secret'])) {

    \Cloudinary::config(array(
        "cloud_name" => $_POST['cloud_name'],
        "api_key" => $_POST['api_key'],
        "api_secret" => $_POST['api_secret']
    ));

    $api = new \Cloudinary\Api();
    

    try { $result = $api->delete_all_resources(); }

    catch (Exception $e){
        echo "<div class=\"alert alert-danger\"><center>Invalid Cloudinary Credentials, please try again...</center></div>"; die;
    }

    echo "<pre>";
    var_dump($result);
    echo "</pre>";
}
?>

                    </div>
                </div>
            </div>
        </div>
<!-- /container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="dist/js/bootstrap.min.js"></script>
<script src="assets/js/docs.min.js"></script>
</body>
</html>
