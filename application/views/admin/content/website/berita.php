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
                                <a class="btn btn-primary" href="<?php echo site_url();?>website/berita/tambah"><i class="fa fa-plus-circle"></i> Tambah Berita</a>
                            </div>  
                            <div class='pull-right'>
                                <a class="btn btn-primary" href="<?php echo site_url();?>website/berita"><i class="fa fa-times-circle"></i> Bersihkan Pencarian</a>
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
                                    <th>JUDUL</th>
                                    <th width="200">KATEGORI</th>
                                    <th width="130">TANGGAL</th>
                                    <th width="120">AKSI</th>
	                           </tr>
                            </thead>
                            <tbody>
                                <?php 
	                            $i	= $page+1;
	                            $where_berita['admin_nama'] = $admin->admin_nama;
	                            $like_berita[$cari]	= $q;
                            if ($jml_data > 0){
	                            foreach ($this->ADM->grid_all_berita('', 'berita_waktu', 'DESC', $batas, $page, '', $like_berita) as $row){
	                            ?>
                                <tr>
    	                            <td align="center"><?php echo $i;?></td>
                                    <td><?php echo $row->berita_judul;?></td>
                                    <td><?php echo $row->kategori_judul;?></td>
                                    <td align="center"><?php echo dateIndo($row->berita_waktu);?></td>
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
                                                    <a href="<?php echo site_url();?>website/berita/edit/<?php echo $row->berita_id; ?>" title="Edit"><i class='fa fa-pencil'></i> Edit</a>
                                                </li>
									            <li>
                                                    <a data-toggle="modal" data-target="#mod-info" type="button"   href="<?php echo site_url();?>website/berita_detail/<?php echo $row->berita_id;?>" rel="detail" title="Detail <?php echo $row->berita_judul; ?>"><i class='fa fa-eye'></i> Detail</a>
                                                </li>
									            <li>
                                                    <a href="javascript:;" data-id="<?php echo $row->berita_id;?>" data-toggle="modal" data-target="#modal-konfirmasi" title="Hapus <?php echo $row->berita_judul; ?>"><i class='fa fa-trash-o'></i> Hapus</a>
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
                                    <td colspan="6">Belum ada data!.</td>
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
                                <?php if ($jml_halaman > 1) { echo pages($halaman, $jml_halaman, 'website/berita/view', $id=""); }?>
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
				<a href="javascript:;" class="btn btn-danger" id="hapus-berita">Ya</a>
				<button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
			</div>

		</div>
	</div>
</div>
<!-- ========== End Modal Konfirmasi ========== -->
<!-- END ADMINISTRATOR-->

<!-- ================================================== END VIEW ================================================== -->

<!-- ================================================== TAMBAH ================================================== -->
<?php } elseif ($action == 'tambah') { ?>
<!-- Breadcrumb -->
<div class="page-head">
    <h3>Tambah <small><?php echo $breadcrumb; ?></small></h3>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>admin"><i class='fa fa-home'></i> Dashboard</a></li>
        <li><a href="<?php echo base_url();?>website/berita"><?php echo $breadcrumb; ?></a></li>
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
                    <form role="form" class="form-horizontal" action="<?php echo site_url();?>website/berita/tambah" method="post" enctype="multipart/form-data" parsley-validate novalidate>
                        <div class="table-responsive">
                            <table class="table no-border hover">
                                <tbody class="no-border-y">
                                    <input type="hidden" name="berita_id" value="<?php echo $berita_id;?>" />
                                    <tr>
                                        <td width="130">
                                            <label for="berita_judul" class="control-label">Judul <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input type="text" name="berita_judul" id="berita_judul" required class="form-control input-sm" value="" size="80" maxlength="100" placeholder="Masukan Judul Berita"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="kategori_id" class="control-label">Kategori <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <?php $this->ADM->combo_box("SELECT * FROM kategori", 'kategori_id', 'kategori_id', 'kategori_judul', $kategori_id);?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="headline" class="control-label">Headline </label>
                                        </td>
                                        <td>
                                            <div id="icheck">
                                                <label class="radio-inline"> 
                                                    <input type="radio" name="headline" id="aktif" class="icheck" value="Y"> Ya
                                                </label> 
                                                <label class="radio-inline"> 
                                                    <input type="radio" checked="" name="headline" id="tidak_aktif" class="icheck" value="N"> Tidak
                                                </label> 
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="berita_deskripsi" class="control-label">Deskripsi <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <textarea rows="20" cols="20" id="berita_deskripsi" name="berita_deskripsi" class="form-control">
                                            </textarea>
                                            <?php echo $ckeditor;?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="berita_gambar" class="control-label">Gambar <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input type="file" name="berita_gambar" id="berita_gambar" required class="form-control btn-sm input-sm" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td valign="top">
                                            <label for="tag_id" class="control-label">Tags</label>
                                        </td>
                                        <td>
                                            <div id='icheck'>
                                                <span class='radio'><?php $this->ADM->checkbox("SELECT * FROM tags ORDER BY tag_judul ASC", 'tag[]', 'tag_id', 'tag_judul', $tags);?></span>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class='center'>
                            <input class="btn btn-primary" type="submit" name="simpan" value="Simpan Data">
                            <input class="btn btn-default" type="reset" name="batal" value="Batalkan" onclick="location.href='<?php echo site_url(); ?>website/berita'"/>
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
        <li><a href="<?php echo base_url();?>website/berita"><?php echo $breadcrumb; ?></a></li>
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
                    <form role="form" class="form-horizontal" action="<?php echo site_url();?>website/berita/edit/<?php echo $berita_id; ?>" method="post" enctype="multipart/form-data" parsley-validate novalidate>
                        <input type="hidden" name="berita_id" value="<?php echo $berita_id;?>" />
                        <div class="table-responsive">
                            <table class="table no-border hover">
                                <tbody class="no-border-y"> 
                                    <tr>
                                        <td width="130">
                                            <label for="berita_judul" class="control-label">Judul <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input name="berita_judul" type="text" required class="form-control input-sm" id="berita_judul" value="<?php echo $berita_judul;?>" size="80" maxlength="100" placeholder="Masukan Judul Berita"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="kategori_id" class="control-label">Kategori <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <?php $this->ADM->combo_box("SELECT * FROM kategori ORDER BY kategori_judul ASC", 'kategori_id', 'kategori_id', 'kategori_judul', $kategori_id);?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="headline" class="control-label">Headline </label>
                                        </td>
                                        <td>
                                             <div id="icheck">
                                                 <label class="radio-inline">
                                                    <input type="radio" class='icheck' name="headline" value="Y" id="aktif" <?php echo $yes = ($headline=='Y')?'checked':'';?>/> Ya
                                                 </label>
                                                 <label class="radio-inline">
                                                    <input type="radio" class='icheck' name="headline" value="N" id="tidak_aktif" <?php echo $no = ($headline=='N')?'checked':'';?>/> Tidak
                                                 </label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="berita_deskripsi" class="control-label">Deskripsi <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <textarea rows="40" cols="60" id="berita_deskripsi" name="berita_deskripsi" class="form-control">
                                                <?php echo $berita_deskripsi;?>
                                            </textarea>
                                            <?php echo $ckeditor;?>
                                        </td>
                                    </tr>
                                <?php if ($berita_gambar){?>
                                    <tr>
                                        <td>
                                            <label for="berita_gambar" class="control-label">Gambar</label>
                                        </td>
                                        <td>
                                            <img src="<?php echo base_url()."assets/images/berita/kecil_".$berita_gambar;?>"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="berita_gambar" class="control-label">Edit Gambar</label>
                                        </td>
                                        <td>
                                            <input type="file" name="berita_gambar" id="berita_gambar" class="form-control btn-sm input-sm" />
                                        </td>
                                    </tr>
                               <?php } else {?>
                                    <tr>
                                        <td>
                                            <label for="berita_gambar" class="control-label">Gambar <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input type="file" name="berita_gambar" id="berita_gambar" required class="form-control btn-sm input-sm" />
                                        </td>
                                    </tr>
                                <?php } ?>
                                    <tr>
                                        <td valign="top">
                                            <label for="tag" class="control-label">Tags</label>
                                        </td>
                                        <td>
                                            <div id='icheck'>
                                                <?php $this->ADM->checkbox("SELECT * FROM tags ORDER BY tag_judul ASC", 'tag[]', 'tag_id', 'tag_judul', $tags);?>                       </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class='center'>
                            <input class="btn btn-primary" type="submit" name="simpan" value="Simpan Data">
                            <input class="btn btn-default" type="reset" name="batal" value="Batalkan" onclick="location.href='<?php echo site_url(); ?>website/berita'"/>
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
    <h4 class="modal-title">Detail. Berita</h4>
</div>
<div class="modal-body">
    <div class="table-responsive">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" id="form_detail">
            <tr class="awal">
                <td><strong>Kode</strong></td>
                <td>: <strong><?php echo $berita->berita_id;?></strong></td>
            </tr>
            <tr>
                <td width="110">Judul</td>
                <td>: <?php echo $berita->berita_judul;?></td>
            </tr>
            <tr class="awal">
                <td>Kategori</td>
                <td>: <?php echo $berita->kategori_judul;?></td>
            </tr>
            <tr>
                <td>Headline</td>
                <td>: <?php echo ($berita->headline == 'Y')?'Ya':'Tidak'; ?></td>
            </tr>
            <tr class="awal">
                <td>Deskripsi</td>
                <td>: </td>
            </tr>
            <tr>
                <td colspan="2" ><textarea rows="20" cols="60" id="berita_deskripsi" name="berita_deskripsi" readonly ><?php echo $berita->berita_deskripsi;?></textarea><?php echo $ckeditor;?></td>
            </tr>
            <tr class="awal">
                <td>Gambar</td>
                <td>: <img src="<?php echo base_url()."assets/images/berita/kecil_".$berita->berita_gambar;?>"/></td>
            </tr>
            <tr>
                <td>Tags</td>
                <td>: <?php $this->ADM->listarray("SELECT * FROM tags ORDER BY tag_judul ASC", 'tag[]', 'tag_id', 'tag_judul', $berita->tags);?></td>
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
