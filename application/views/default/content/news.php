<?php if( $action == 'detail' ) {?>
<!-- Breadcrumb -->
<div class="container">
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>">Home</a></li>
        <li><a href="<?php echo base_url();?>news">Berita &amp; Kegiatan</a></li>
        <li class="active"><?php echo $berita->berita_judul; ?></li>
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
                    <section id="blog-detail">
                        <header><h1>Detail Berita &amp; Kegiatan</h1></header>
                        <article class="blog-detail">
                            <header class="blog-detail-header">
                                <img src="<?php echo base_url(); ?>assets/images/berita/<?php echo $berita->berita_gambar; ?>" width="750" height="300">
                                <h2><?php echo $berita->berita_judul; ?></h2>
                                <div class="blog-detail-meta">
                                    <span class="date"><span class="fa fa-calendar"></span><?php echo inday($berita->berita_waktu); ?>, <?php echo dateIndoNews($berita->berita_waktu); ?></span>
                                  
                                    <span class="category"><span class="fa fa-folder-open"></span><?php echo $berita->kategori_judul; ?></span>
                                    <span class="hits"><span class="fa fa-share"></span> Dibaca : <b><?php echo $berita->berita_hits; ?></b> x</span>
                                 <!--   <span class="comments"><span class="fa fa-comment-o"></span>6 comments</span>-->
                                </div>
                            </header>
                            <hr>
                            <p><?php echo $berita->berita_deskripsi; ?></p>
                            <footer>
                               <section id="share-post">
                                    <style>
                                    @media screen and (max-width:700px) {
                                    .icons {
                                        font-size:9px;
                                    }
                                    }
                                    </style>
                                    <div class="twitt-share"><!--<a class='twitter-share-button' data-count='horizontal' data-related='' data-via='' expr:data-text='data:post.title' expr:data-url='data:post.url' href='http://twitter.com/share'>Tweet</a>-->
                                    
                                    <div class="fb-like" data-href="<?php echo base_url();?>news/read/<?php echo $berita->berita_id.'/'.$this->CONF->seo($berita->berita_judul)?>" data-layout="button" data-action="like" data-show-faces="true" data-share="true"></div>     
                                    </div><!-- /.icons -->
                                </section><!-- /share -->
                                <hr>
                                <section id="tags">
                                    <?php $this->ADM->tagsberita("SELECT * FROM tags ORDER BY tag_judul ASC", 'tag[]', 'tag_id', 'tag_judul', $berita->tags);?>
                                </section><!-- /tags -->
                              <hr>
                    <section id="related-articles">
                        <header><h2>Berita &amp; Kegiatan Terbaru</h2></header>
                        <div class="row">
                        <?php                             
                            $query = $this->db->query("SELECT * FROM berita ORDER BY berita_waktu DESC LIMIT 2");
                            foreach ($query->result() as $row3){ 
                        ?>
                            <div class="col-md-6 col-sm-6">
                     <article class="blog-listing-post">
                                    <figure class="blog-thumbnail">
                                        <figure class="blog-meta"><span class="fa fa-calendar"></span><?php echo dateIndoNews($row3->berita_waktu); ?></figure>
                                        <div class="image-wrapper"><a href="<?php echo base_url();?>news/read/<?php echo $row3->berita_id.'/'.$this->CONF->seo($row3->berita_judul)?>"><img src="<?php echo base_url(); ?>assets/images/berita/<?php echo $row3->berita_gambar; ?>"></a></div>
                                    </figure>
                                    <aside>
                                        <header>
                                            <a href="<?php echo base_url();?>news/read/<?php echo $row3->berita_id.'/'.$this->CONF->seo($row3->berita_judul)?>"><h3><?php echo $row3->berita_judul; ?></h3></a>
                                        </header>
                                    </aside>
                                </article><!-- /article -->
                            </div><!-- /.col-md-6 -->
                <?php  } ?> 
                        </div><!-- /.row -->
                    </section><!-- /related articles -->
                    <hr>
                     <section id="leave-reply">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-group">
                                         <div class="table-responsive">
                        <table class="hover">
                 <tr><td>       
<div class="fb-comments" data-href="<?php echo base_url();?>news/<?php echo $berita->berita_id; ?>" data-numposts="5" data-width="755"></div></td></tr> </table>
                                        </div><!-- /.controls -->
                                    </div><!-- /.control-group -->
                                </div><!-- /.col-md-4 -->
                            </div><!-- /.row -->
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

<?php }  else { ?>


<!-- Breadcrumb -->
<div class="container">
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>">Home</a></li>
        <li class="active">Berita &amp; Kegiatan</li>
    </ol>
</div>
<!-- end Breadcrumb -->

<!-- Page Content -->
<div id="page-content">
    <div class="container">
        <div class="row">
            <!--MAIN Content-->
            <div class="col-md-8" style="min-height: 1060px;">
                <div id="page-main">
                    <section id="right-sidebar">
                        <header><h1>Berita &amp; Kegiatan</h1></header>
                        <div class="row">    
                        <?php 
                            $i  = $page+1;
                            if ($jml_data > 0){
                            foreach ($this->ADM->grid_all_berita('*', 'berita_waktu', 'DESC', $batas, $page, '', '') as $row){
                            ?>  
                            <div class="col-md-6 col-sm-6">
                                <article class="blog-listing-post">
                                    <figure class="blog-thumbnail">
                                        <figure class="blog-meta"><span class="fa fa-calendar"></span><?php echo dateIndoNews($row->berita_waktu); ?></figure>
                                        <div class="image-wrapper"><a href="<?php echo base_url();?>news/read/<?php echo $row->berita_id.'/'.$this->CONF->seo($row->berita_judul)?>"><img src="<?php echo base_url(); ?>assets/images/berita/kecil_<?php echo $row->berita_gambar; ?>" width="750" height="200"></a></div>
                                    </figure>
                                    <aside>
                                        <header>
                                            <a href="<?php echo base_url();?>news/read/<?php echo $row->berita_id.'/'.$this->CONF->seo($row->berita_judul)?>"><h3><?php echo substr($row->berita_judul,0,90); ?></h3></a>
                                        </header>
                                        <div class="description">
                                            <p><?php echo substr($row->berita_deskripsi,0,150).'...';?></p>
                                        </div>
                                        <a href="<?php echo base_url();?>news/read/<?php echo $row->berita_id.'/'.$this->CONF->seo($row->berita_judul)?>" class="read-more stick-to-bottom" >Selengkapnya</a>
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
                           <header> Tidak Ada Berita &amp; Kegiatan</header>
                            <?php } ?>
                        
                        </div><!-- /.row -->

                    </section><!-- /.blog-listing -->
                   
                    <div class="center">
                        <ul class="pagination">
                        
                        <?php if ($jml_halaman > 1){ echo pages2($halaman, $jml_halaman, 'news/index', $id=""); }?>
                    
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