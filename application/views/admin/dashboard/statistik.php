<!-- Breadcrumb -->
<div class="page-head">
    <h3>Dashboard <small>Control Panel</small></h3>
    <ol class="breadcrumb">
        <li class="active"><i class='fa fa-home'></i> Dashboard</li>
    </ol>	
</div> 
<!-- End Breadcrumb -->
<!-- Content -->
<div class="cl-mcont">
    <div class='row'>
        <div class="col-md-12">
            <div class="block-flat">
                <div class="header">
				    <h4>Selamat datang di Halaman Administrator <?php echo $web->identitas_website;?></h4>
				</div>
				<div class="content">
                    <div class='blockquote'>
				        <div class='text-orange'><h5>Hallo, <?php echo $admin->admin_nama; ?></h5></div>
                        <p>Sistem informasi ini untuk administrator atau operator menjalankan data yang akan dibuat</p>
                    </div>
                </div>
            </div>
        </div><!-- /.col-md-12 --> 	
    		</div>
       
<!-- End Content -->

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>templates/admin/js/jquery.easypiechart/jquery.easy-pie-chart.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>templates/admin/js/bootstrap.switch/bootstrap-switch.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>templates/admin/js/bootstrap.datetimepicker/css/bootstrap-datetimepicker.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>templates/admin/js/jquery.select2/select2.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>templates/admin/js/bootstrap.slider/css/slider.css" />

	<script type="text/javascript" src="<?php echo base_url();?>templates/admin/js/jquery.sparkline/jquery.sparkline.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>templates/admin/js/jquery.easypiechart/jquery.easy-pie-chart.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>templates/admin/js/jquery.nestable/jquery.nestable.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>templates/admin/js/bootstrap.switch/bootstrap-switch.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>templates/admin/js/bootstrap.datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
  <script src="<?php echo base_url();?>templates/admin/js/jquery.select2/select2.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url();?>templates/admin/js/skycons/skycons.js" type="text/javascript"></script>
  <script src="<?php echo base_url();?>templates/admin/js/bootstrap.slider/js/bootstrap-slider.js" type="text/javascript"></script>
  <script src="<?php echo base_url();?>templates/admin/js/intro.js/intro.js" type="text/javascript"></script>
        <link rel="stylesheet" href="<?php echo base_url();?>templates/admin/css/calendar.css" />

  <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
              
//              menentukan koordinat titik tengah peta
              var myLatlng = new google.maps.LatLng(<?php echo $web->identitas_maps;?>);

//              pengaturan zoom dan titik tengah peta
              var myOptions = {
                  zoom: 15,
                  center: myLatlng
              };
              
//              menampilkan output pada element
              var map = new google.maps.Map(document.getElementById("map"), myOptions);
              
//              menambahkan marker
              var marker = new google.maps.Marker({
                   position: myLatlng,
                   map: map,
                   title:"Monas"
              });
        </script> 

  