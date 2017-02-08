<?php
date_default_timezone_set('Asia/Jakarta'); 
$s=date("Y-m-d h:i:s");
if ($web->identitas_aktif<$s) {
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo $web->identitas_website;?> <?php echo $title; ?></title>
<meta name="google-site-verification" content="" />
<meta name="description" content="<?php echo $web->identitas_deskripsi;?>" />
<meta name="keywords" content="<?php echo $web->identitas_keyword;?>" />
<meta name="author" content="<?php echo $web->identitas_author;?>" />
<meta property="og:title" content="<?php echo $web->identitas_website;?>" />
<meta property="og:url" content="<?php echo base_url();?>" />
<meta property="og:description" content="<?php echo $web->identitas_deskripsi;?>" />
<meta property="og:site_name" content="<?php echo $web->identitas_website;?>" />
<meta property="og:image" content="<?php echo base_url();?>assets/<?php echo $web->identitas_favicon;?>" />
<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>assets/<?php echo $web->identitas_favicon;?>" sizes="16x16" />
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href="<?php echo base_url();?>templates/default/assets/css/font-awesome.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="<?php echo base_url();?>templates/default/assets/css/bootstrap.css" type="text/css">
<link rel="stylesheet" href="<?php echo base_url();?>templates/default/assets/css/selectize.css" type="text/css">
<link rel="stylesheet" href="<?php echo base_url();?>templates/default/assets/css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="<?php echo base_url();?>templates/default/assets/css/vanillabox.css" type="text/css">
<link rel="stylesheet" href="<?php echo base_url();?>templates/default/assets/css/vanillabox.css" type="text/css">
<link rel="stylesheet" href="<?php echo base_url();?>templates/default/assets/css/style.css" type="text/css">
<style type="text/css">
    body {
    background:url(<?php echo base_url();?>templates/admin/images/login.jpg);
    background-attachment:fixed;
    background-size:cover;  
    }
</style>
</head>


<body class="page-homepage-courses">
<!-- Homepage Slider -->
<section id="homepage-slider">
    <div class="flexslider">
                <figure>
                    <div class="slide-wrapper">
                        <div class="inner">
                            <div class="container"><br><br><br><br><br><br>
                                <h2><?php echo $web->identitas_website;?></h2>
                                <h1><?php echo $web->identitas_warning;?></h1>
                                <div><a href="http://<?php echo $web->identitas_author;?>" class="btn" target="_blank"><?php echo $web->identitas_author;?></a></div>
                            </div>
                        </div><!-- /.inner -->
                    </div><!-- /.wrapper -->
                </figure>
    </div>
</section>

</div>
</body>
</html>
<?php  } else { ?>    
<!DOCTYPE html>
<html lang="en-US">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo $web->identitas_website;?> <?php echo $title; ?></title>
<meta name="google-site-verification" content="" />
<meta name="description" content="<?php echo $web->identitas_deskripsi;?>" />
<meta name="keywords" content="<?php echo $web->identitas_keyword;?>" />
<meta name="author" content="<?php echo $web->identitas_author;?>" />
<meta property="og:title" content="<?php echo $web->identitas_website;?>" />
<meta property="og:url" content="<?php echo base_url();?>" />
<meta property="og:description" content="<?php echo $web->identitas_deskripsi;?>" />
<meta property="og:site_name" content="<?php echo $web->identitas_website;?>" />
<meta property="og:image" content="<?php echo base_url();?>assets/<?php echo $web->identitas_favicon;?>" />
<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>assets/<?php echo $web->identitas_favicon;?>" sizes="16x16" />
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href="<?php echo base_url();?>templates/default/assets/css/font-awesome.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="<?php echo base_url();?>templates/default/assets/css/bootstrap.css" type="text/css">
<link rel="stylesheet" href="<?php echo base_url();?>templates/default/assets/css/selectize.css" type="text/css">
<link rel="stylesheet" href="<?php echo base_url();?>templates/default/assets/css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="<?php echo base_url();?>templates/default/assets/css/vanillabox.css" type="text/css">
<link rel="stylesheet" href="<?php echo base_url();?>templates/default/assets/css/vanillabox.css" type="text/css">
<link rel="stylesheet" href="<?php echo base_url();?>templates/default/assets/css/style.css" type="text/css">

</head>

<body class="page-sub-page page-microsite">
<!-- Wrapper -->
<div class="wrapper">
<!-- Header -->
<div class="navigation-wrapper">
    <div class="secondary-navigation-wrapper">
        <div class="container">
            <div class="navigation-contact pull-left">Telepon:  <span class="opacity-70"><?php echo $web->identitas_notelp;?></span></div>
        </div>
    </div><!-- /.secondary-navigation -->

    <div class="branding">
        <div class="container">
            <div class="navbar-brand nav" id="brand">
                        <a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>templates/default/assets/img/logo.png" alt="brand"></a>
            </div>
            <div class="search pull-right">
                <form action="<?php echo site_url(); ?>search" method="post">
                <div class="input-group">
        <input type="search" class="form-control" name="q" placeholder="Search">
          <span class="input-group-btn"><button type="submit" id="search-submit"  value=" " class="btn"><i class="fa fa-search"></i></button></span>     
                </div><!-- /.input-group -->       
                    </form>
            </div><!-- /.pull-right -->
        </div>
    </div>

    <div class="primary-navigation-wrapper">
        <header class="navbar" id="top" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <nav class="collapse navbar-collapse bs-navbar-collapse navbar-left" role="navigation">
                    <ul class="nav navbar-nav">
                      
                 <?php echo $this->load->view('default/box/navigasi'); ?>
                    </ul>
                </nav><!-- /.navbar collapse-->
                <div class="social">
                    <div class="icons">
                        <a href="<?php echo $web->identitas_tw;?>"><i class="fa fa-twitter"></i></a>
                        <a href="<?php echo $web->identitas_fb;?>"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-pinterest"></i></a>
                        <a href="<?php echo $web->identitas_yb?>"><i class="fa fa-youtube-play"></i></a>
                    </div><!-- /.icons -->
                </div>
            </div><!-- /.container -->
        </header><!-- /.navbar -->
    </div><!-- /.primary-navigation -->
</div>
<!-- end Header -->


<?php echo $this->load->view($content); ?>


<!-- Footer -->
<footer id="page-footer">
    <section id="footer-top">
        <div class="container">
            <div class="footer-inner">
                <div class="footer-social">
                    <figure>Follow us on social media</figure>
                    <div class="icons">
                        <a href="<?php echo $web->identitas_tw;?>" target="_blank"><i class="fa fa-twitter"></i></a>
                        <a href="<?php echo $web->identitas_fb;?>" target="_blank"><i class="fa fa-facebook"></i></a>
                        <a href="<?php echo $web->identitas_yb;?>" target="_blank"><i class="fa fa-youtube-play"></i></a>
                    </div><!-- /.icons -->
                </div><!-- /.social -->
                <div class="search pull-right">
        <form action="<?php echo site_url(); ?>search" method="post">
                <div class="input-group">
        <input type="search" name="q"  class="form-control" placeholder="Search"/>
                    <span class="input-group-btn">
                        <button type="submit" class="btn"><i class="fa fa-search"></i></button>
                    </span>

                    </div><!-- /input-group -->
                </div><!-- /.pull-right -->
            </div><!-- /.footer-inner -->
        </div><!-- /.container -->
    </section><!-- /#footer-top -->

    <section id="footer-bottom">
        <div class="container">
            <div class="footer-inner">
                <div class="copyright">
              
				<?php echo date('Y');?> © <?php echo $web->identitas_website;?>, All rights reserved. Design and Development </a>                
                </div><!-- /.copyright -->

            </div><!-- /.footer-inner -->
        </div><!-- /.container -->
    </section><!-- /#footer-bottom -->

</footer>
<!-- end Footer -->

</div>
<!-- end Wrapper -->

<script type="text/javascript" src="<?php echo base_url();?>templates/default/assets/js/jquery-2.1.0.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>templates/default/assets/js/jquery-migrate-1.2.1.min.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>templates/default/assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>templates/default/assets/js/selectize.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>templates/default/assets/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>templates/default/assets/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>templates/default/assets/js/jquery.placeholder.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>templates/default/assets/js/jQuery.equalHeights.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>templates/default/assets/js/icheck.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>templates/default/assets/js/jquery.vanillabox-0.1.5.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>templates/default/assets/js/retina-1.1.0.min.js"></script>



<script src="http://platform.twitter.com/widgets.js" type="text/javascript"/></script>

<script type="text/javascript" src="<?php echo base_url();?>templates/default/assets/js/custom.js"></script>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.4&appId=530737950380626";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<script type="text/javascript">
	$(document).ready(function() {
 
  		$("#owl-demo").owlCarousel({
 			autoPlay: 1000, //Set AutoPlay to 3 seconds
 
      		items :4,
      		itemsDesktop : [1199,3],
      		itemsDesktopSmall : [979,3]
 
		});
 	});
    </script>

</body>
</html>
<?php } ?>