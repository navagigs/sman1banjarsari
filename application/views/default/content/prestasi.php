<!-- Breadcrumb -->
<div class="container">
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>">Home</a></li>
        <li class="active">Prestasi</li>
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
                    <br />
                    <script type="text/javascript" src="<?php echo base_url();?>templates/default/assets/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>templates/default/assets/js/highcharts.js"></script>
<script src="<?php echo base_url();?>templates/default/assets/js/exporting.js"></script>

 <script type="text/javascript">
    var chart1; // globally available
$(document).ready(function() {
      chart1 = new Highcharts.Chart({
         chart: {
            renderTo: 'grafik2',
            type: 'column'
         },   
         title: {
            text: 'Grafik Prestasi SMAN 1 Banjarsari'
         },
         xAxis: {
            categories: ['Tahun']
         },
         yAxis: {
            title: {
               text: 'Prestasi yang didapat'
           }
         },
              series:             
            [      <?php   
        $sql = $this->db->query("SELECT * FROM tahun ORDER BY tahun_id");
        foreach ($sql->result() as $row){ 
                $tahun_nama=$row->tahun_nama;        
        $sql_jumlah = $this->db->query("SELECT count( * ) as  prestasi_angka FROM prestasi p inner join tahun b on p.tahun_id=b.tahun_id WHERE tahun_nama='$tahun_nama'");         
        foreach ($sql_jumlah->result() as $row2){ 
                    $prestasi_angka= $row2->prestasi_angka;                 
                  }             
                  ?>     
           
                  {
                      name: '<?php echo $tahun_nama; ?>',
                      data: [<?php echo $prestasi_angka; ?>]
                  },
                  <?php } ?>
                              ]
      });
   });  
</script>
<div id='grafik2'></div> 
<br><br> 
 <!--MAIN Content-->
            <div class="col-md-12">
                <div id="page-main">
                     <div class="table-responsive">
                            <table class="table table-hover course-list-table tablesorter">
                                <thead>
                                <tr>
                                    <th width=50>No</th>
                                    <th>NIS</th>
                                    <th class="starts">#</th>
                                    <th class="starts"  width=180>Nama</th>
                                    <th width=240>Penghargaan</th>
                                    <th>Tahun</th>
                                </tr>
                                </thead>
                                <tbody>
                                  <?php 
                                  $no=1;
                           $sql = $this->db->query("SELECT * FROM prestasi INNER JOIN tahun ON tahun.tahun_id = prestasi.tahun_id ORDER BY prestasi_post DESC");
                         foreach ($sql->result() as $row){ 
                            ?> 
                                <tr>
                                    <th class="course-title"><?php echo $no; ?></th>
                                    <th><?php echo $row->prestasi_nis;?></th>
                                    <th><img src="<?php echo base_url()."assets/images/prestasi/kecil_".$row->prestasi_foto;?>" width="80" height="100"/></th>
                                    <th class="course-category"><?php echo $row->prestasi_nama;?></th>
                                    <th><?php echo $row->prestasi_penghargaan;?></th>
                                    <th><?php echo $row->tahun_nama;?></th>
                                 <th></th>
                                               
                                </tr>
                                      <?php 
                                $no++;
                            }                                               
                            ?>             
                                </tbody>
                            </table>
                        </div>
               
                </div><!-- /#page-main -->
            </div><!-- /.col-md-8 -->

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