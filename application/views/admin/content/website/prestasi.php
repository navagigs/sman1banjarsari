<!-- Include More Css For This Content -->
<link href="<?php echo base_url();?>templates/admin/js/jquery.icheck/skins/square/blue.css" rel="stylesheet">
<!-- ================================================== VIEW ================================================== -->
<?php if ($action == 'view' || empty($action)){ ?>
<!-- Breadcrumb -->
<div class="page-head">
    <h3><?php echo $breadcrumb; ?></h3>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>admin"><i class='fa fa-home'></i> Dashboard</a></li>
        <li class="active"><?php echo $breadcrumb; ?></li>
	</ol>	
</div>
<!-- End Breadcrumb -->
<!-- Content -->
<div class="cl-mcont">
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="block-flat">
                <div class="content">
                    <!-- ========== Flashdata ========== -->
                    <?php if ($this->session->flashdata('success') || $this->session->flashdata('warning') || $this->session->flashdata('error')) { ?>
                        <?php if ($this->session->flashdata('success')) { ?>
                            <div class="alert alert-success">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<i class="fa fa-check sign"></i><?php echo $this->session->flashdata('success'); ?>
                            </div>
                        <?php } else if ($this->session->flashdata('warning')) { ?>
                            <div class="alert alert-warning">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<i class="fa fa-check sign"></i><?php echo $this->session->flashdata('warning'); ?>
                            </div>
                        <?php } else { ?>
                            <div class="alert alert-danger">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<i class="fa fa-warning sign"></i><?php echo $this->session->flashdata('error'); ?>
                            </div>
                        <?php } ?>
                    <?php } ?>
                    <!-- ========== End Flashdata ========== -->
                    <!-- ========== Button ========== -->
                    <form action="" method="post" id="form">
                        <div class='btn-navigation'> 
                            <div class='pull-right'>
                                <a class="btn btn-primary" href="<?php echo site_url();?>website/prestasi/tambah"><i class="fa fa-plus-circle"></i> Tambah Prestasi</a>
                            </div>  
                            <div class='pull-right'>
                                <a class="btn btn-primary" href="<?php echo site_url();?>website/prestasi"><i class="fa fa-times-circle"></i> Bersihkan Pencarian</a>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='btn-search'>Cari Berdasarkan :</div>
                            <div class='col-md-3 col-sm-12'>
                                <div class='button-search'><?php array_pilihan('cari', $berdasarkan, $cari);?></div>
                            </div>
                            <div class='col-md-3 col-sm-12'>
                                <div class="input-group">
                                    <input type="text" name="q" class="form-control" value="<?php echo $q;?>"/>
                                    <span class="input-group-btn">
                                        <button type="submit" name="kirim" class="btn btn-primary" type="button">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- ========== End Button ========== -->
                    <!-- ========== Table ========== -->
                    <div class="table-responsive">
                        <table class="hover">
                            <thead class="primary-emphasis">
                                <tr>
    	                            <th width="30">#</th>
                                    <th>NIS</th>
                                    <th width="200">FOTO</th>
                                    <th width="200">NAMA</th>
                                    <th width="200">PENGHARGAAN</th>
                                    <th>TAHUN</th>
                                    <th width="150">TANGGAL</th>
                                    <th width="150">AKSI</th>
	                           </tr>
                            </thead>
                            <tbody>
                                <?php 
	                            $i	= $page+1;
	                            $like_prestasi[$cari]	= $q;
	                        if ($jml_data > 0){
	                            foreach ($this->ADM->grid_all_prestasi('', 'prestasi_post', 'DESC', $batas, $page, '', $like_prestasi) as $row){
	                            ?>
                                <tr>
    	                            <td align="center"><?php echo $i;?></td>
                                    <td><?php echo $row->prestasi_nis?></td>
                                    <td align="center"><img src="<?php echo base_url()."assets/images/prestasi/kecil_".$row->prestasi_foto;?>" width="80" height="100"/></td>
                                    <td><?php echo $row->prestasi_nama;?></td>
                                    <td><?php echo $row->prestasi_penghargaan;?></td>
                                    <td><?php echo $row->tahun_nama;?></td>
                                    <td align="center"><?php echo dateIndo($row->prestasi_post);?></td>
                                    <td align="center">
                                        <!-- ========== EDIT DETAIL HAPUS ========== -->
                                        <div class="btn-group">
								            <button type="button" class="btn btn-default btn-xs">Actions</button>
								            <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">
									            <span class="caret"></span>
									            <span class="sr-only">Toggle Dropdown</span>
								            </button>
								            <ul class="dropdown-menu pull-right" role="menu">
									            <li>
                                                    <a href="<?php echo site_url();?>website/prestasi/edit/<?php echo $row->prestasi_id; ?>" title="Edit"><i class='fa fa-pencil'></i> Edit</a>
                                                </li>
                                                <li>
                                                    <a data-toggle="modal" data-target="#mod-info" type="button"  href="<?php echo site_url();?>website/prestasi_detail/<?php echo $row->prestasi_id;?>" rel="detail" title="Detail <?php echo $row->prestasi_nama; ?>"><i class='fa fa-eye'></i> Detail</a>
                                                </li>
									            <li>
                                                    <a href="javascript:;" data-id="<?php echo $row->prestasi_id;?>" data-toggle="modal" data-target="#modal-konfirmasi" title="Hapus <?php echo $row->prestasi_nama; ?>"><i class='fa fa-trash-o'></i> Hapus</a>
                                                </li>
								            </ul>
								        </div>	
                                        <!-- ========== End EDIT DETAIL HAPUS ========== -->
                                    </td>
                                </tr>
                                <?php
                                    $i++;
	                            } 
	                        } else {
                                ?>
                                <tr>
                                    <td colspan="7">Belum ada data!.</td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                        <!-- ========== End Table ========== -->
                    </div>
                    <div id='pagination'>
                        <div class='pagination-left'>Total : <?php echo $jml_data;?></div>
                        <div class='pagination-right'>
                            <ul class="pagination">
                                <?php if ($jml_halaman > 1) { echo pages($halaman, $jml_halaman, 'website/prestasi/view', $id=""); }?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Content -->

<!-- ========== Modal Detail ========== -->
<div class="modal fade" id="mod-info" tabindex="-1" role="dialog">
   <div class="modal-dialog">
       <div class="modal-content">                
            <script type="text/javascript" src="<?php echo base_url();?>editor/ckeditor.js"></script>
            <script type="text/javascript">
            var editor = CKEDITOR.replace("berita_deskripsi",
                {
                    filebrowserBrowseUrl      : "<?php echo base_url();?>finder/ckfinder.html",
                    filebrowserImageBrowseUrl : "<?php echo base_url();?>finder/ckfinder.html?Type=Images",
                    filebrowserFlashBrowseUrl : "<?php echo base_url();?>finder/ckfinder.html?Type=Flash",
                    filebrowserUploadUrl      : "<?php echo base_url();?>finder/core/connector/php/connector.php?command=QuickUpload&type=Files",
                    filebrowserImageUploadUrl : "<?php echo base_url();?>finder/core/connector/php/connector.php?command=QuickUpload&type=Images",
                    filebrowserFlashUploadUrl : "<?php echo base_url();?>finder/core/connector/php/connector.php?command=QuickUpload&type=Flash",
                    filebrowserWindowWidth    : 900,
                    filebrowserWindowHeight   : 700,
                    toolbarStartupExpanded    : false,
                    height                    : 400 
                }
                );
            </script>   
         </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- ========== End Modal Detail ========== -->

<!-- ========== Modal Konfirmasi ========== -->
<div id="modal-konfirmasi" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Konfirmasi</h4>
			</div>

			<div class="modal-body" style="background:#d9534f;color:#fff">
				Apakah Anda yakin ingin menghapus data ini?
			</div>

			<div class="modal-footer">
				<a href="javascript:;" class="btn btn-danger" id="hapus-prestasi">Ya</a>
				<button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
			</div>

		</div>
	</div>
</div>
<!-- ========== End Modal Konfirmasi ========== -->
<!-- ================================================== END VIEW ================================================== -->

<!-- ================================================== TAMBAH ================================================== -->
<?php } elseif ($action == 'tambah') { ?>
<!-- Breadcrumb -->
<div class="page-head">
    <h3>Tambah <small><?php echo $breadcrumb; ?></small></h3>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>admin"><i class='fa fa-home'></i> Dashboard</a></li>
        <li><a href="<?php echo base_url();?>website/prestasi"><?php echo $breadcrumb; ?></a></li>
        <li class="active">Tambah</li>
	</ol>	
</div>
<!-- End Breadcrumb -->
<!-- Content -->
<div class="cl-mcont">
    <div class="row">
        <div class="col-md-12">
            <div class="block-flat">
                <div class="content">
                    <form role="form" class="form-horizontal" action="<?php echo site_url();?>website/prestasi/tambah" method="post" enctype="multipart/form-data" parsley-validate novalidate>
                        <div class="table-responsive">
                            <table class="table no-border hover">
                                <tbody class="no-border-y">
                                    <tr>
                                        <td width="160">
                                            <label for="prestasi_nis" class="control-label">NIS <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input name="prestasi_nis" required class="form-control input-sm" type="text" id="prestasi_nis" value="" size="50"  placeholder="Masukan NIS"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="160">
                                            <label for="prestasi_nama" class="control-label">Nama <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input name="prestasi_nama" required class="form-control input-sm" type="text" id="prestasi_nama" value="" size="50"  placeholder="Masukan Nama"/>
                                        </td>
                                    </tr>
                                      <tr>
                                        <td>
                                            <label for="prestasi_jk" class="control-label">Jenis Kelamin</label>
                                        </td>
                                        <td>
                                            <div id="icheck">
                                                <label class="radio-inline"> 
                                                    <input type="radio" class="icheck"  checked=""  name="prestasi_jk" id="L" value="L"> Laki-laki
                                                </label> 
                                                <label class="radio-inline"> 
                                                    <input type="radio" class="icheck" name="prestasi_jk" id="P" value="P"> Perempuan
                                                </label> 
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="160">
                                            <label for="prestasi_penghargaan" class="control-label">Penghargaan <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input name="prestasi_penghargaan" required class="form-control input-sm" type="text" id="prestasi_penghargaan" value="" size="50"  placeholder="Masukan Penghargaan yang diraih"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="tahun_id" class="control-label">Tahun <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <?php $this->ADM->combo_box("SELECT * FROM tahun", 'tahun_id', 'tahun_id', 'tahun_nama', $tahun_id);?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="prestasi_foto" class="control-label">Foto <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input type="file" name="prestasi_foto" required class="form-control btn-sm input-sm" id="prestasi_foto"  />
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class='center'>
                            <input class="btn btn-primary" type="submit" name="simpan" value="Simpan Data">
                            <input class="btn btn-default" type="reset" name="batal" value="Batalkan" onclick="location.href='<?php echo site_url(); ?>website/prestasi'"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Content -->
<!-- ================================================== END TAMBAH ================================================== -->

<!-- ================================================== EDIT ================================================== -->
<?php } elseif ($action == 'edit') { ?>
<!-- Breadcrumb -->
<div class="page-head">
    <h3>Edit <small><?php echo $breadcrumb; ?></small></h3>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>admin"><i class='fa fa-home'></i> Dashboard</a></li>
        <li><a href="<?php echo base_url();?>website/prestasi"><?php echo $breadcrumb; ?></a></li>
        <li class="active">Edit</li>
	</ol>	
</div>
<!-- End Breadcrumb -->
<!-- Content -->
<div class="cl-mcont">
    <div class="row">
        <div class="col-md-12">
            <div class="block-flat">
                <div class="content">
                    <form role="form" class="form-horizontal" action="<?php echo site_url();?>website/prestasi/edit/<?php echo $prestasi_id; ?>" method="post" enctype="multipart/form-data" parsley-validate novalidate>
                        <input type="hidden" name="prestasi_id" value="<?php echo $prestasi_id;?>">
                        <div class="table-responsive">
                            <table class="table no-border hover">
                                <t  <tr>
                                        <td width="160">
                                            <label for="prestasi_nis" class="control-label">NIS <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input name="prestasi_nis" required class="form-control input-sm" type="text" id="prestasi_nis" value="<?php echo $prestasi_nis;?>" size="50"  placeholder="Masukan NIS"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="160">
                                            <label for="prestasi_nama" class="control-label">Nama <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input name="prestasi_nama" required class="form-control input-sm" type="text" id="prestasi_nama" value="<?php echo $prestasi_nama;?>" size="50"  placeholder="Masukan Nama"/>
                                        </td>
                                    </tr>
                                      <tr>
                                        <td>
                                            <label for="prestasi_jk" class="control-label">Jenis Kelamin</label>
                                        </td>
                                        <td>
                                            <div id="icheck">
                                                <label class="radio-inline"> 
                                                    <input type="radio" <?php echo $yes = ($prestasi_jk=='L')?'checked':'';?> class="icheck"  checked=""  name="prestasi_jk" id="L" value="L"> Laki-laki
                                                </label> 
                                                <label class="radio-inline"> 
                                                    <input type="radio" <?php echo $no = ($prestasi_jk=='P')?'checked':'';?> class="icheck" name="prestasi_jk" id="P" value="P"> Perempuan
                                                </label> 
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="160">
                                            <label for="prestasi_penghargaan" class="control-label">Penghargaan <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input name="prestasi_penghargaan" required class="form-control input-sm" type="text" id="prestasi_penghargaan" value="<?php echo $prestasi_penghargaan;?>" size="50"  placeholder="Masukan Penghargaan yang diraih"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="tahun_id" class="control-label">Tahun <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <?php $this->ADM->combo_box("SELECT * FROM tahun", 'tahun_id', 'tahun_id', 'tahun_nama', $tahun_id);?>
                                        </td>
                                    </tr>
                                <?php if ($prestasi_foto){?>
                                    <tr>
                                        <td>   
                                            <label for="prestasi_foto" class="control-label">Foto</label>
                                        </td>
                                        <td>
                                            <img src="<?php echo base_url()."assets/images/prestasi/kecil_".$prestasi_foto;?>"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="prestasi_foto" class="control-label">Edit Foto</label>
                                        </td>
                                        <td>
                                            <input class="form-control btn-sm input-sm" type="file" name="prestasi_foto" id="prestasi_foto" />
                                        </td>
                                    </tr>
                                <?php } else {?>
                                    <tr>
                                        <td>   
                                            <label for="prestasi_foto" class="control-label">Foto <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input required class="form-control btn-sm input-sm" type="file" name="prestasi_foto" id="prestasi_foto"  />
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class='center'>
                            <input class="btn btn-primary" type="submit" name="simpan" value="Simpan Data">
                            <input class="btn btn-default" type="reset" name="batal" value="Batalkan" onclick="location.href='<?php echo site_url(); ?>website/prestasi'"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Content --> 
<!-- ================================================== END EDIT ================================================== -->

<!-- ================================================== DETAIL ================================================== -->
<?php } elseif ($action == 'detail') { ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>templates/admin/css/formstyle.css"/>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Detail. Prestasi</h4>
</div>
<div class="modal-body">
    <div class="table-responsive">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" id="form_detail">
            <tr class="awal">
                <td><strong>Kode</strong></td>
                <td>: <strong><?php echo $prestasi->prestasi_id;?></strong></td>
            </tr>
            <tr>
                <td width="110">NIS</td>
                <td>: <?php echo $prestasi->prestasi_nis;?></td>
            </tr>
            <tr class="awal">
                <td width="110">Nama</td>
                <td>: <?php echo $prestasi->prestasi_nama;?></td>
            </tr>
          <tr>
              <td width="130">Jenis Kelamin</td>
                <td>: <?php  $jk = ($prestasi->prestasi_jk == 'L')?'Laki-laki':'Perempuan';  echo 
                                $jk;  ?></td>
          </tr>
            <tr class="awal">
                <td width="110">Penghargaan</td>
                <td>: <?php echo $prestasi->prestasi_penghargaan;?></td>
            </tr>
            <tr>
                <td width="110">Tahun</td>
                <td>: <?php echo $prestasi->tahun_nama;?></td>
            </tr>
            <tr class="awal">
                <td>foto</td>
                <td>: <img src="<?php echo base_url()."assets/images/prestasi/kecil_".$prestasi->prestasi_foto;?>"/></td>
           </tr>
        </table>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
</div>
<?php } ?>
<!-- ================================================== END DETAIL ================================================== -->
<!-- Include More Js For This Content -->                
<script type="text/javascript" src="<?php echo base_url();?>templates/admin/js/jquery.nestable/jquery.nestable.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>templates/admin/js/bootstrap.switch/bootstrap-switch.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>templates/admin/js/jquery.select2/select2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>templates/admin/js/bootstrap.slider/js/bootstrap-slider.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>templates/admin/js/jquery.icheck/icheck.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>templates/admin/js/bootstrap.datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<!-- For Validation -->
<script type="text/javascript" src="<?php echo base_url();?>templates/admin/js/jquery.parsley/parsley.js"></script>	