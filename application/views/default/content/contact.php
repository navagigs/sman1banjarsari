 <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<!-- Breadcrumb -->
<div class="container">
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>">Home</a></li>
        <li class="active">Hubungi Kami</li>
    </ol>
</div>
<!-- end Breadcrumb -->

<!-- Page Content -->
<div id="page-content">
    <div class="container">
        <div class="row">
            <!--MAIN Content-->
            <div class="col-md-8">
                <div id="page-main">
                    <section id="contact">
                        <header><h1>Hubungi Kami</h1></header>
                        <div class="row">
                            <div class="col-md-6">
                                <address>
                                    <h3><?php echo $web->identitas_website;?></h3><br>
                                    <span><?php echo $web->identitas_alamat;?></span>
                                    <br>
                                    <abbr title="Telephone">Telp:</abbr> <?php echo $web->identitas_notelp;?>
                                    <br>
                                    <abbr title="Email">Email:</abbr> <?php echo $web->identitas_email;?>
                                </address>
                                <div class="icons">
                                 <a href="https://twitter.com/BemPoltekpos" target="_blank"><i class="fa fa-twitter"></i></a>
                        <a href="https://www.facebook.com/pages/Politeknik-Pos-Indonesia/1579965585624129?fref=ts" target="_blank"><i class="fa fa-facebook"></i></a>
                        <a href="https://www.youtube.com/results?search_query=politeknik+pos+indonesia" target="_blank"><i class="fa fa-youtube-play"></i></a>
                                </div><!-- /.icons -->
                                <hr>
                            </div>
                            <div class="col-md-6">
                                <div class="map-wrapper">
        							<div id="map" style="width:auto; height: 300px;"></div> 
                                </div>
                            </div>
                        </div>
                    </section>
                </div><!-- /#page-main -->
            </div><!-- /.col-md-8 -->

            <!--SIDEBAR Content-->
            <div class="col-md-4" style="min-height: 1060px;">
                <div id="page-sidebar" class="sidebar">
                     <?php 
                        if ($boxberita == TRUE) {
                            $this->load->view('default/box/box-berita');
                        } 
                        ?>
                </div><!-- /#sidebar -->
            </div><!-- /.col-md-4 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div>
<!-- end Page Content -->

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