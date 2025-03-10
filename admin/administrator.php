<?php
include"../system/koneksi.php";

session_start();
if($_SESSION['level'] !="admin" || $_SESSION['status'] !="login"){
    header('location:index.php');
}

?>
<!DOCTYPE HTML>
<html>
<head>
<title>Administrator</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Modern Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
<link href="../css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="../css/administrator.css" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="../css/lines.css" rel='stylesheet' type='text/css' />
<link href="../css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<script src="../js/jquery.min.js"></script>
<!----webfonts--->
<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
<!---//webfonts--->  
<!-- Nav CSS -->
<link href="../css/custom.css" rel="stylesheet">
<!-- Metis Menu Plugin JavaScript -->
<script src="../js/metisMenu.min.js"></script>
<script src="../js/custom.js"></script>
<!-- Graph JavaScript -->
<script src="../js/d3.v3.js"></script>
<script src="../js/rickshaw.js"></script>
</head>
<body>
<div id="wrapper">
     <!-- Navigation -->
        <nav class="top1 navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="">Sistem Informasi Arsip Perpustakaan</a>
            </div>
            <!-- /.navbar-header -->
            <ul class="nav navbar-nav navbar-right">
                <button style="margin-top: 15%" class="m_2"><a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a></button>
            </ul>
            
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="administrator.php"><i class="fa fa-dashboard fa-fw nav_icon"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-book nav_icon"></i>Jenis Koleksi<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="koleksiKP.php">Arsip KP</a>
                                    <a href="koleksiTA.php">Arsip TA</a>
                                    <a href="koleksiEBOOK.php">E-Book</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                       <li>
                            <a href="#"><i class="fa fa-bookmark nav-icon"></i> Pustakawan<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="koleksikpPUS.php"><i class="fa fa-min nav-icon"></i> Arsip KP</a>
                                        <a href="koleksitaPUS.php"><i class="fa fa-min nav-icon"></i> Arsip TA</a>
                                        <a href="koleksiebookPUS.php"><i class="fa fa-min nav-icon"></i> EBOOK</a>
                                </li>   
                            </ul>
                        </li>
                        <li>
                            <a href="pengguna.php"><i class="fa fa-user nav_icon"></i>Pengguna</a>                
                        </li>
                        
                        <li>
                            <a href="saran.php"><i class="fa fa-comment nav_icon"></i>Saran</a> 
                        </li>    
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
        <div id="page-wrapper">
        <div class="graphs">
        <div class="col_3">
            <div class="widget_2">
              <div class="col-sm-3 widget_1_box"><a href="reportKPHarian.php">
                <div class="wid-social twitter">
                    <div class="social-icon">
                        <i class="fa fa-users text-light icon-xlg pull-right"></i>
                    </div>
                    <div class="social-info">
                        <?php
                        $jumlah = mysqli_query($con,"SELECT COUNT(*) FROM log JOIN koleksikp ON log.id_koleksi=koleksikp.id_koleksiKP");
                        $jum    = mysqli_fetch_array($jumlah);
                        ?>
                        <h3 class="number_counter bold count text-light start_timer counted"><?php echo $jum[0];?></h3>
                        <h4 class="counttype text-light">Informasi Pengunjung</h4>
                        <span class="percent">Arsip Kerja Praktek</span>
                    </div>
                </div>
                </a>
              </div>
              <div class="col-sm-3 widget_1_box"><a href="reportTAHarian.php">
                <div class="wid-social linkedin">
                    <div class="social-icon">
                        <i class="fa fa-users text-light icon-xlg pull-right"></i>
                    </div>
                    <div class="social-info">
                        <?php
                        $jumlah = mysqli_query($con,"SELECT COUNT(*) FROM log JOIN koleksita ON log.id_koleksi=koleksita.id_koleksiTA");
                        $jum    = mysqli_fetch_array($jumlah);
                        ?>
                        <h3 class="number_counter bold count text-light start_timer counted"><?php echo $jum[0];?></h3>
                        <h4 class="counttype text-light">Informasi Pengunjung</h4>
                        <span class="percent">Arsip Tugas Akhir</span>
                    </div>
                </div></a>
              </div>
              <div class="col-sm-3 widget_1_box"><a href="reportEBOOKHARIAN.php">
                <div class="wid-social facebook">
                    <div class="social-icon">
                        <i class="fa fa-users text-light icon-xlg pull-right"></i>
                    </div>
                    <div class="social-info">
                        <?php
                        $jumlah = mysqli_query($con,"SELECT COUNT(*) FROM log JOIN koleksiebook ON log.id_koleksi=koleksiebook.id_koleksiEBOOK");
                        $jum    = mysqli_fetch_array($jumlah);
                        ?>
                        <h3 class="number_counter bold count text-light start_timer counted"><?php echo $jum[0];?></h3>
                        <h4 class="counttype text-light">Informasi Pengunjung</h4>
                        <span class="percent">Arsip E-Book</span>
                    </div>
                </div>
                </a>
              </div>
              <div class="clearfix"> </div>
              <div class="col-sm-3 widget_1_box"><a href="koleksiKP.php">
                <div class="wid-social dribbble">
                    <div class="social-icon">
                        <i class="fa fa-book text-light icon-xlg pull-right"></i>
                    </div>
                    <div class="social-info">
                        <?php
                        $jumlah = mysqli_query($con,"SELECT COUNT(*) FROM koleksikp");
                        $jum    = mysqli_fetch_array($jumlah);
                        ?>
                        <h3 class="number_counter bold count text-light start_timer counted"><?php echo $jum[0];?></h3>
                        <h4 class="counttype text-light">Informasi Jumlah</h4>
                        <span class="percent">Arsip Kerja Praktek</span>
                    </div>
                </div>
                </a>
              </div>
              <div class="col-sm-3 widget_1_box"><a href="koleksiTA.php">
                <div class="wid-social flickr">
                    <div class="social-icon">
                        <i class="fa fa-book text-light icon-xlg pull-right"></i>
                    </div>
                    <div class="social-info">
                        <?php
                        $jumlah = mysqli_query($con,"SELECT COUNT(*) FROM koleksita");
                        $jum    = mysqli_fetch_array($jumlah);
                        ?>
                        <h3 class="number_counter bold count text-light start_timer counted"><?php echo $jum[0];?></h3>
                        <h4 class="counttype text-light">Informasi Jumlah</h4>
                        <span class="percent">Arsip Tugas Akhir</span>
                    </div>
                </div>
                </a>
              </div>
              <div class="col-sm-3 widget_1_box"><a href="koleksiEBOOK.php">
                <div class="wid-social youtube">
                    <div class="social-icon">
                        <i class="fa fa-book text-light icon-xlg pull-right"></i>
                    </div>
                    <div class="social-info">
                        <?php
                        $jumlah = mysqli_query($con,"SELECT COUNT(*) FROM koleksiebook");
                        $jum    = mysqli_fetch_array($jumlah);
                        ?>
                        <h3 class="number_counter bold count text-light start_timer counted"><?php echo $jum[0];?></h3>
                        <h4 class="counttype text-light">Informasi Jumlah</h4>
                        <span class="percent">Arsip E-Book</span>
                    </div>
                </div>
                </a>
              </div>
              <div class="clearfix"> </div>
              <div class="col-sm-3 widget_1_box"><a href="pengguna.php">
                <div class="wid-social google-plus">
                    <div class="social-icon">
                        <i class="fa fa-user text-light icon-xlg pull-right"></i>
                    </div>
                    <div class="social-info">
                         <?php
                        $jumlah = mysqli_query($con,"SELECT COUNT(*) FROM user WHERE level!='admin' AND level!='pustakawan'");
                        $jum    = mysqli_fetch_array($jumlah);
                        ?>
                        <h3 class="number_counter bold count text-light start_timer counted"><?php echo $jum[0];?></h3>
                        <h4 class="counttype text-light">Pengguna</h4>
                        <span class="percent">Sistem Informasi Arsip Perpustakaan</span>
                    </div>
                </div>
            </a>
        </div>

              
    
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>
<?php
$con -> close();
?>
