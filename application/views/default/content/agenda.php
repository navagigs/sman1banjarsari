<?php if( $action == 'detail') {?> 
<!-- Breadcrumb -->
<div class="container">
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>">Home</a></li>
        <li><a href="<?php echo base_url();?>agenda">Agenda</a></li>
        <li class="active"><?php echo $agenda->agenda_tema; ?></li>
    </ol>
</div>
<!-- end Breadcrumb -->

<!-- Page Content -->
<div id="page-content">
    <div class="container">
        <header><h2>Detail Agenda</h2></header>
        <div class="row">
            <!-- Course Image -->
            <div class="col-md-2 col-sm-3">
                <figure class="event-image">
                    <div class="image-wrapper"><img src="<?php echo base_url();?>assets/images/agenda/<?php echo $agenda->agenda_gambar; ?>"></div>
                </figure>
            </div><!-- end Course Image -->
            <!--MAIN Content-->
            <div class="col-md-6 col-sm-9">
                <div id="page-main">
                    <section id="event-detail">
                        <article class="event-detail">
                            <section id="event-header">
                                <header>
                                    <h2 class="event-date"><?php echo $agenda->agenda_tema; ?></h2>
                                </header>
                                <hr>
                                <figure>
                                    <span class="author"><span class="fa fa-user"></span> <?php echo $agenda->admin_nama; ?></span>  
                                      <span class="date"><span class="fa fa-calendar"></span> <?php echo dateIndo($agenda->agenda_posting);?></span>
                                </figure>
                            </section><!-- /#course-header -->
                            <section id="course-info">
                                <header>
                                <h2>Agenda Deskripsi</h2><br />
                                
                                    Pukul :  <?php echo $agenda->agenda_jam; ?><br />
                                    Tanggal Mulai :  <?php echo dateIndo1($agenda->agenda_mulai); ?> s/d <?php echo dateIndo1($agenda->agenda_selesai); ?><br />
                                    Tempat :  <?php echo $agenda->agenda_tempat; ?><br />
                              </header>
                                <p><?php echo $agenda->agenda_deskripsi; ?></p>
                            </section><!-- /#course-info -->


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


<?php } else { ?>
<!-- Breadcrumb -->
<div class="container">
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>">Home</a></li>
        <li class="active">Agenda</li>
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
                    <section class="events grid" id="events">
                        <header><h1>Agenda</h1></header>
                        <div class="row">
                        <?php 
                            $i	= $page+1;
                            if ($jml_data > 0){
                     foreach ($this->ADM->grid_all_agenda('*', 'agenda_posting', 'DESC', $batas, $page, '', '') as $row){
                        ?>  
                            <div class="col-md-6 col-sm-6">
                                <article class="event">
                                    <figure class="date">
                                        <div class="month"><?php echo dateIndoAgenda($row->agenda_mulai); ?></div>
                                        <div class="day"><?php echo dateIndo5($row->agenda_mulai); ?></div>
                                    </figure>
                                    <aside>
                                        <header>
                                            <a href="<?php echo base_url();?>agenda/detail/<?php echo $row->agenda_id.'/'.$this->CONF->seo($row->agenda_tema)?>"><?php echo substr($row->agenda_tema,0,40); ?></a>
                                        </header>
                                        <div class="additional-info"><span class="fa fa-map-marker"></span> <?php echo $row->agenda_tempat; ?></div>
                                        <div class="description">
                                            <p><?php echo substr($row->agenda_deskripsi,0,350).'...';?> </p>
                                        </div>
                                        <a href="<?php echo base_url();?>agenda/detail/<?php echo $row->agenda_id.'/'.$this->CONF->seo($row->agenda_tema)?>" class="btn btn-framed btn-color-grey btn-small">Selengkapnya</a>
                                    </aside>
                                </article><!-- /article -->                                
                            </div><!-- /.col-md-6 -->
                            <?php 
                            $i++; 
                            } 												
							?>                                                        
                            <?php
                            } else { 
                            ?>
                           <header> Tidak Ada Agenda</header>
                            <?php } ?>
   						
                        </div><!-- /.row -->
                        
                    </section><!-- /.events grid -->
                    <div class="center">
                        <ul class="pagination">
                          <?php if ($jml_halaman > 1){ echo pages2($halaman, $jml_halaman, 'news/pages', $id=""); }?>
                        </ul>
                    </div>
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

<?php } ?>