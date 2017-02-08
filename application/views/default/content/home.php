<div id="page-content">
<!-- Slider -->
<div id="slider">
    <div class="container">
        <div class="slider-wrapper">
            <div class="row">
                <div class="col-md-9 col-sm-12">
                    <div class="row">
                        <div class="image-carousel">
                                       <div class="slide">
                                <div class="col-md-4 col-sm-4">
                                    <h1>Selamat Datang di Official Website</h1>
                                    <p><p>
    SMA NEGERI 1 BANJARSARI</p>
</p>
                                </div><!-- /.col-md-4 -->
                                <div class="col-md-8 col-sm-8">
                                    <div class="image-carousel-slide"><img src="<?php echo base_url();?>assets/images/slide/kecil_1470230985-selamat-datang-di-official-website.jpg" alt=""></div>
                                </div><!-- /.col-md-8 -->
                            </div><!-- /.slide -->
                                                         <div class="slide">
                                <div class="col-md-4 col-sm-4">
                                    <h1>Selamat Datang di Official Website</h1>
                                    <p><p>
    SMA NEGERI 1 BANJARSARI</p>
</p>
                                </div><!-- /.col-md-4 -->
                                <div class="col-md-8 col-sm-8">
                                    <div class="image-carousel-slide"><img src="<?php echo base_url();?>assets/images/slide/kecil_1470230997-selamat-datang-di-official-website.jpg" alt=""></div>
                                </div><!-- /.col-md-8 -->
                            </div><!-- /.slide -->

                        </div><!-- /.image-carousel -->
                    </div><!-- /.row -->
                </div><!-- /.col-md-9 -->

                <div class="col-md-3 col-sm-12">
                    <aside class="news-small" id="news-slider">
                        <header>
                            <h2>Pengumuman</h2>
                        </header>
                        <div class="section-content">
                                <?php 
                                $where['kategori_id'] = '1';
                            if ($this->ADM->count_all_berita2($where) > 0){
                                foreach ($this->ADM->grid_all_berita2('*', 'berita_waktu', 'DESC', 3, '', $where) as $row){ 
                            ?><article>
                                <header><i class="fa fa-file-o"></i><a href="<?php echo base_url();?>news/read/<?php echo $row->berita_id.'/'.$this->CONF->seo($row->berita_judul)?>"><?php echo $row->berita_judul;?></a></header>
                            </article><!-- /article -->
                                <h6></h6>
                            <?php } } else {  } ?>
                        </div><!-- /.section-content -->
                    </aside><!-- /.news-small -->
                </div><!-- /.col-md-3 -->

            </div><!-- /.row -->
        </div><!-- /.slider-wrapper -->
    </div><!-- /.container -->
</div>
<!-- end Slider -->

<!-- Content -->
<div class="block">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <section class="events small" id="events-small">
                    <header>
                        <h2>Agenda</h2>
                        <a href="#" class="link-calendar">Calendar</a>
                    </header>
                    <div class="section-content">
                       <?php 
                    $jml = $this->ADM->count_all_agenda();
                    if ($jml > 0) {
                    foreach ($this->ADM->grid_all_agenda('*', 'agenda_posting', 'DESC', 3, '', '', '') as $row){ ?>
                        <article class="event nearest-second">
                            <figure class="date">
                                <div class="month"><?php echo dateIndoAgenda($row->agenda_mulai); ?></div>
                                <div class="day"><?php echo dateIndo5($row->agenda_mulai); ?></div>
                            </figure>
                            <aside>
                                <header>
                                    <a href="<?php echo site_url()?>agenda/detail/<?php echo $row->agenda_id.'/'.$this->CONF->seo($row->agenda_tema)?>"><?php echo substr($row->agenda_tema,0,60); ?></a>
                                </header>
                                <div class="additional-info clearfix "></div>
                            </aside>
                        </article><!-- /article -->
                     <?php
                    }
                } else { ?>
                    <article>
                        <b>Tidak Ada Agenda</b>
                    <article>
                <?php 
                } ?> 
                        <a href="<?php echo base_url();?>agenda" class="read-more stick-to-bottom">Lihat Agenda</a>
                    </div><!-- /.section-content -->
                </section><!-- /.events-small -->
            </div><!-- /.col-md-3 -->

            <div class="col-md-6">
                <section id="main-content">
                    <header>
                        <h2>Sambutan Kepala Sekolah</h2>
                    </header>
                    <div class="section-content">
                        <p>Puji dan syukur kepada Tuhan yang Maha Kuasa oleh karena hikmat dan anugerahNya sehingga website sekolah SMAN 1 Banjarsari yang adalah bagian dari website Dinas Pendidikan Pemuda dan Olahraga (DIKPORA) Kabupaten Pangandaran ini boleh ada untuk menjawab akan setiap kebutuhan informasi dengan memanfaatkan sarana teknologi informasi yang ada. Perkembangan Ilmu Pegetahuan dan teknologi dari tahun ke tahun harus diakui terus mengalami peningkatan dan ini adalah bukti dari proses pendidikan yang dilakukan pada setiap jenjang pendidikan dan nyata dalam dunia kerja dewasa ini. Dari perkembangan ini kita dibawa untuk mampu beradaptasi, berprestasi dan bersaing di era kompetitif ini. SMAN 1 Banjarsari yang sebenarnya sudah memiliki nomenklatur sekolah yang  terus berupaya meningkatkan mutu dengan mengupayakan dan memanfaatkan setiap sarana dan prasarana termasuk melalui layanan media online ini yang sudah menyatu dengan website Dinas Pendidikan Pemuda dan Olahraga kabupaten Pangandaran serta link lainnya. Besar harapan, sarana ini dapat memberi manfaat bagi semua pihak yang ada dilingkup pendidikan dan bagi pemerhati pendidikan secara khusus bagi SMAN 1 Banjarsari.</p>
                </section><!-- /.main-content -->
            </div><!-- /.col-md-6 -->

            <div class="col-md-3">
                <section class="news-small" id="news-small">
                    <header>
                        <h2>Berita</h2>
                    </header>
                    <div class="section-content">
                    <?php 
                    $where['kategori_id'] = '2';
                $jml = $this->ADM->count_all_berita();
                if ($jml > 0) {
                    foreach ($this->ADM->grid_all_berita2('*', 'berita_waktu', 'DESC', 3, '',  $where) as $row){  ?>

                        <article>
                            <figure class="date"><i class="fa fa-file-o"></i><?php echo inday($row->berita_waktu); ?>, <?php echo dateIndoNews($row->berita_waktu); ?></figure>
                            <header><a href="<?php echo base_url();?>news/read/<?php echo $row->berita_id.'/'.$this->CONF->seo($row->berita_judul)?>"><?php echo $row->berita_judul; ?></a></header>
                        </article><!-- /article -->
                         <?php
                    }
                } else { ?>
                    <article>
                        <b>Tidak Ada Berita &amp; Kegiatan</b>
                    <article>
                <?php 
                } ?> 
                    </div><!-- /.section-content -->
                    <a href="<?php echo base_url();?>news" class="read-more">All News</a>
                </section><!-- /.news-small -->
            </div><!-- /.col-md-3 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div>
<!-- end Content -->
</div>
