<!-- ================================================== VIEW ================================================== -->
<?php if ($action == 'view' || empty($action)){ ?>
<!-- Breadcrumb -->
<div class="page-head">
    <h3>Galeri <small>Foto</small></h3>
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
                                <a class="btn btn-primary" href="<?php echo site_url();?>website/galeri_foto/tambah"><i class="fa fa-plus-circle"></i> Tambah Galeri</a>
                            </div>  
                            <div class='pull-right'>
                                <a class="btn btn-primary" href="<?php echo site_url();?>website/galeri_foto"><i class="fa fa-times-circle"></i> Bersihkan Pencarian</a>
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
                                    <th>NAMA</th>
                                    <th width="200">ALBUM</th>
                                    <th width="140">TANGGAL</th>
                                    <th width="150">AKSI</th>
	                           </tr>
                            </thead>
                            <tbody>
	                           <?php 
	                           $i	= $page+1;
	                           $like_galeri[$cari] = $q;
	                        if ($jml_data > 0){
	                           foreach ($this->ADM->grid_all_album_galeri('*', 'galeri_judul', 'ASC', $batas, $page, '', $like_galeri) as $row){
	                           ?>
                                <tr>
    	                            <td align="center"><?php echo $i;?></td>
                                    <td><?php echo $row->galeri_judul;?></td>
                                    <td><?php echo $row->album_judul;?></td>
                                    <td align="center"><?php echo dateIndo($row->galeri_waktu);?></td>
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
                                                    <a href="<?php echo site_url();?>website/galeri_foto/edit/<?php echo $row->galeri_id; ?>" title="Edit"><i class='fa fa-pencil'></i> Edit</a>
                                                </li>
                                                <li>
                                                    <a data-toggle="modal" data-target="#mod-info" type="button"   href="<?php echo site_url();?>website/galeri_foto_detail/<?php echo $row->galeri_id;?>" rel="detail" title="Detail <?php echo $row->galeri_judul; ?>"><i class='fa fa-eye'></i> Detail</a>
                                                </li>
									            <li>
                                                    <a href="javascript:;" data-id="<?php echo $row->galeri_id;?>" data-toggle="modal" data-target="#modal-konfirmasi" title="Hapus <?php echo $row->galeri_judul; ?>"><i class='fa fa-trash-o'></i> Hapus</a>
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
                                    <td colspan="5">Belum ada data!.</td>
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
                                <?php if ($jml_halaman > 1) { echo pages($halaman, $jml_halaman, 'website/galeri_foto/view', $id=""); }?>
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
				<a href="javascript:;" class="btn btn-danger" id="hapus-galeri_foto">Ya</a>
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
        <li><a href="<?php echo base_url();?>website/galeri_foto"><?php echo $breadcrumb; ?></a></li>
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
                    <form role="form" class="form-horizontal" action="<?php echo site_url();?>website/galeri_foto/tambah" method="post" enctype="multipart/form-data" parsley-validate novalidate>
                        <div class="table-responsive">
                            <table class="table no-border hover">
                                <tbody class="no-border-y"> 
                                    <tr>
                                        <td width="130">
                                            <label for="galeri_judul" class="control-label">Nama Foto <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input name="galeri_judul" type="text" required class="form-control input-sm"  id="galeri_judul" value="<?php echo $galeri_judul;?>" size="80" maxlength="100" placeholder="Masukan Nama Foto"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="album_id" class="control-label">Album <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <?php $this->ADM->combo_box("SELECT * FROM album", 'album_id', 'album_id', 'album_judul', $album_id);?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="galeri_deskripsi" class="control-label">Deskripsi Foto <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <textarea class="form-control" rows="20" cols="60" id="galeri_deskripsi" name="galeri_deskripsi" >
                                            </textarea>
                                            <?php echo $ckeditor;?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label class="control-label" for="galeri_gambar" >Foto <span class="required">*</span></label>
                                        </td>
                                        <td><input type="file" required class="form-control btn-sm input-sm" name="galeri_gambar" id="galeri_gambar"  />
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class='center'>
                            <input class="btn btn-primary" type="submit" name="simpan" value="Simpan Data">
                            <input class="btn btn-default" type="reset" name="batal" value="Batalkan" onclick="location.href='<?php echo site_url(); ?>website/galeri_foto'"/>
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
        <li><a href="<?php echo base_url();?>website/galeri_foto"><?php echo $breadcrumb; ?></a></li>
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
                    <form role="form" class="form-horizontal" action="<?php echo site_url();?>website/galeri_foto/edit" method="post" enctype="multipart/form-data" parsley-validate novalidate>
                        <input type="hidden" name="galeri_id" value="<?php echo $galeri_id;?>" />
                        <div class="table-responsive">
                            <table class="table no-border hover">
                                <tbody class="no-border-y">
                                    <tr>
                                        <td width="130">
                                            <label for="galeri_judul" class="control-label">Nama Foto <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input name="galeri_judul" type="text" required class="form-control input-sm" id="galeri_judul" value="<?php echo $galeri_judul;?>" size="80" maxlength="100" placeholder="Masukan Nama Foto"/>
                                        </td>
                                    </tr> 
                                    <tr>
                                        <td>
                                            <label for="album_id" class="control-label">Album <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <?php $this->ADM->combo_box("SELECT * FROM album", 'album_id', 'album_id', 'album_judul', $album_id);?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="galeri_deskripsi" class="control-label">Deskripsi Foto <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <textarea class="form-control" rows="20" cols="60" id="galeri_deskripsi" name="galeri_deskripsi" >
                                                <?php echo $galeri_deskripsi; ?>
                                            </textarea>
                                            <?php echo $ckeditor;?>
                                        </td>
                                    </tr>
                                <?php if ($galeri_gambar){?>
                                    <tr>
                                        <td>
                                            <label for="galeri_gambar" class="control-label">Foto </label>
                                        </td>
                                        <td>
                                            <img src="<?php echo base_url()."assets/images/galeri/kecil_".$galeri_gambar;?>"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="galeri_gambar" class="control-label" >Edit Foto</label>
                                        </td>
                                        <td>
                                            <input type="file" class="form-control btn-sm input-sm" name="galeri_gambar" id="galeri_gambar"  />
                                        </td>
                                    </tr>
                                <?php } else {?>
                                    <tr>
                                        <td>
                                            <label for="galeri_gambar" class="control-label" >Edit Foto <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input type="file" required class="form-control btn-sm input-sm" name="galeri_gambar" id="galeri_gambar"  />
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class='center'>
                            <input class="btn btn-primary" type="submit" name="simpan" value="Simpan Data">
                            <input class="btn btn-default" type="reset" name="batal" value="Batalkan" onclick="location.href='<?php echo site_url(); ?>website/galeri_foto'"/>
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
    <h4 class="modal-title">Detail. Galeri Foto</h4>
</div>
<div class="modal-body">
    <div class="table-responsive">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" id="form_detail">
            <tr class="awal">
                <td width="110"><strong>ID Galeri</strong></td>
                <td>: <strong><?php echo $galeri->galeri_id;?></strong></td>
            </tr>
            <tr>
                <td>Nama Foto</td>
                <td>: <?php echo $galeri->galeri_judul;?></td>
            </tr>
            <tr class="awal">
                <td>Album</td>
                <td>: <?php echo $galeri->album_judul;?></td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td><span style="display: inline-block; float:left; margin-right: 4px;">:</span><p style="margin: 0px; padding: 0px; display: inline-block; float:left;"><?php echo $galeri->galeri_deskripsi;?></p></strong></td>
            </tr>
            <tr class="awal">
                <td>Foto</td>
                <td><img src="<?php echo site_url();?>assets/images/galeri/<?php echo $galeri->galeri_gambar;?>" style="height: 200px" /></td>
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
<!-- For Validation -->
<script type="text/javascript" src="<?php echo base_url();?>templates/admin/js/jquery.parsley/parsley.js"></script>	