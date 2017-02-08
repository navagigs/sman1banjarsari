<!-- Breadcrumb -->
<div class="container">
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>">Home</a></li>
        <li class="active"><?php echo $judul;?></li>
    </ol>
</div>
<!-- end Breadcrumb -->

<!-- Page Content -->
<div id="page-content">
    <div class="container">
        <div class="row">
            <!--MAIN Content-->
            <div class="col-md-8" style="margin-bottom:30px;">
                <div id="page-main">
                    <section id="right-sidebar">
                        <header><h2><?php echo $judul;?></h2></header>
 					 <?php if ($gambar){?>
                        <div id="page-img"><img src="<?php echo base_url()."assets/images/statis/kecil_".$gambar;?>" /></div>
                  <?php } else { }?>
						<div style="text-align: justify; margin-left:4px;">
						<p><?php echo $deskripsi;?></p>
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