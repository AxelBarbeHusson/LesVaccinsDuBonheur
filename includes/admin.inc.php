<?php if (!empty($_SESSION['login']['role']=== 'Admin')){?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Simple Responsive Admin</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="assetsAdmin/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assetsAdmin/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="assetsAdmin/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>


<div id="wrapper">

    <!-- /. NAV TOP  -->
    <nav class="navbar-default navbar-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="main-menu">


                <li>
                    <a href="index.php?page=addVaccins" ><i class="fa fa-qrcode "></i>Add Vaccins</a>
                </li>
                <li>
                    <a href="index.php?page=editVaccins"><i class="fa fa-bar-chart-o"></i>Edit Vaccins</a>
                </li>
                <li>
                    <a href="index.php?page=rendezvousAdmin"><i class="fa fa-bar-chart-o"></i>Rdv Admin</a>
                </li>
            </ul>
        </div>

    </nav>
    <!-- /. NAV SIDE  -->
    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-lg-12">
                    <h2>ADMIN DASHBOARD</h2>
                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <div class="row">
                <div class="col-lg-12 ">
                    <div class="alert alert-info">
                        <strong>Welcome Admin ! </strong>
                    </div>

                </div>
            </div>
            <!-- /. ROW  -->
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                    <div class="div-square">
                        <a href="index.php?page=manageUsers" >
                            <i class="fa fa-users fa-5x"></i>
                            <h4>See Users</h4>
                        </a>
                    </div>


                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                    <div class="div-square">
                        <a href="index.php?page=backDeleteUser" >
                            <i class="fa fa-key fa-5x"></i>
                            <h4>Admin </h4>
                        </a>
                    </div>


                </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                <div class="div-square">
                    <a href="index.php?page=inscriptions" >
                        <i class="fa fa-user fa-5x"></i>
                        <h4>Register User</h4>
                    </a>
                </div>



            </div>


            </div>
            </div>
            <!-- /. ROW  -->
            <
        <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
</div>



<!-- /. WRAPPER  -->
<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
<!-- JQUERY SCRIPTS -->
<script src="../assetsAdmin/js/jquery-1.10.2.js"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="../assetsAdmin/js/bootstrap.min.js"></script>
<!-- CUSTOM SCRIPTS -->
<script src="../assetsAdmin/js/custom.js"></script>


</body>
</html>
<?php }else{
    echo "Erreur 403, vous n'avez pas accès a cette fonctionnalité";
}?>