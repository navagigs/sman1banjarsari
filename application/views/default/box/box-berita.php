                   <aside class="news-small" id="news-small">
                        <header>
                            <h2>Berita &amp; Pengumuman</h2>
                        </header>
                        <div class="section-content">
						<?php 
                            
                            $query = $this->db->query("SELECT * FROM berita ORDER BY berita_waktu DESC LIMIT 5");
                            foreach ($query->result() as $row){ 
					  	?>
                      <article>
                        <figure class="date"><i class="fa fa-calendar"></i> <?php echo dateIndoNews($row->berita_waktu); ?></figure>						
                            <header>
                            <a href="<?php echo base_url();?>news/read/<?php echo $row->berita_id.'/'.$this->CONF->seo($row->berita_judul)?>"><?php echo $row->berita_judul; ?></a></header>
                       </article><!-- /article -->
                         <?php } ?>                          
                        </div><!-- /.section-content -->
                        <a href="<?php echo base_url();?>news" class="read-more">Lihat Semua</a>

                    </aside><!-- /.news-small -->
                   
