<!-- ================================================== VIEW ================================================== -->
<?php if ($action == 'view' || empty($action)){ ?>
<!-- Breadcrumb -->
<div class="page-head">
    <h3>Download <small>File</small></h3>
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
                                <a class="btn btn-primary" href="<?php echo site_url();?>website/download_file/tambah"><i class="fa fa-plus-circle"></i> Tambah File</a>
                            </div>  
                            <div class='pull-right'>
                                <a class="btn btn-primary" href="<?php echo site_url();?>website/download_file"><i class="fa fa-times-circle"></i> Bersihkan Pencarian</a>
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
                                    <th>JUDUL FILE</th>
                                    <th>FILE</th>
                                    <th width="150">AKSI</th>
	                           </tr>
                            </thead>
                            <tbody>
                                <?php 
	                            $i	= $page+1;
	                            $like_down[$cari]	= $q;
	                        if ($jml_data > 0){
	                            foreach ($this->ADM->grid_all_downloads('', 'download_waktu', 'DESC', $batas, $page, '', $like_down) as $row){
	                            ?>
                                <tr>
    	                            <td align="center"><?php echo $i;?></td>
                                    <td><?php echo $row->download_judul;?></td>
                                    <td><?php echo $row->download_file;?></td>
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
                                                    <a href="<?php echo site_url();?>website/download_file/edit/<?php echo $row->download_id; ?>" title="Edit"><i class='fa fa-pencil'></i> Edit</a>
                                                </li>
                                                <li>
                                                    <a data-toggle="modal" data-target="#mod-info" type="button"   href="<?php echo site_url();?>website/download_file_detail/<?php echo $row->download_id;?>" rel="detail" title="Detail <?php echo $row->download_judul; ?>"><i class='fa fa-eye'></i> Detail</a>
                                                </li>
									            <li>
                                                    <a href="javascript:;" data-id="<?php echo $row->download_id;?>" data-toggle="modal" data-target="#modal-konfirmasi" title="Hapus <?php echo $row->download_judul; ?>"><i class='fa fa-trash-o'></i> Hapus</a>
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
                                    <td colspan="4">Belum ada data!.</td>
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
                                <?php if ($jml_halaman > 1) { echo pages($halaman, $jml_halaman, 'website/download_file/view', $id=""); }?>
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
				<a href="javascript:;" class="btn btn-danger" id="hapus-download_file">Ya</a>
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
        <li><a href="<?php echo base_url();?>website/download_file"><?php echo $breadcrumb; ?></a></li>
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
                    <form role="form" class="form-horizontal" action="<?php echo site_url();?>website/download_file/tambah" method="post" enctype="multipart/form-data" parsley-validate novalidate>
                        <div class="table-responsive">
                            <table class="table no-border hover">
                                <tbody class="no-border-y"> 
                                    <tr>
                                        <td width="130">
                                            <label for="download_judul" class="control-label">Judul File <span class="required">*</span></label
                                        ></td>
                                        <td>
                                            <input name="download_judul" type="text" required class="form-control input-sm" id="download_judul" value="" placeholder="Masukan Judul Download" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="130">
                                            <label for="download_deskripsi" class="control-label">Deskripsi File <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input name="download_deskripsi" type="text" required class="form-control input-sm" id="download_deskripsi" value="" placeholder="Masukan Deskripsi Judul"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="download_file" class="control-label">File <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input type="file" name="download_file" required class="form-control btn-sm input-sm" id="download_file"   />
                                            <div class="ket">Max. data 4MB</div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class='center'>
                            <input class="btn btn-primary" type="submit" name="simpan" value="Simpan Data">
                            <input class="btn btn-default" type="reset" name="batal" value="Batalkan" onclick="location.href='<?php echo site_url(); ?>website/download_file'"/>
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
        <li><a href="<?php echo base_url();?>website/download_file"><?php echo $breadcrumb; ?></a></li>
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
                    <form role="form" class="form-horizontal" action="<?php echo site_url();?>website/download_file/edit" method="post" enctype="multipart/form-data" parsley-validate novalidate>
                        <input type="hidden" name="download_id" value="<?php echo $download_id;?>" />
                        <div class="table-responsive">
                            <table class="table no-border hover">
                                <tbody class="no-border-y">
                                    <tr>
                                        <td width="130">
                                            <label for="download_judul" class="control-label">Judul File <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input name="download_judul" type="text" id="download_judul" value="<?php echo $download_judul;?>" required class="form-control input-sm" placeholder="Masukan Judul Download" />
                                        </td>
                                    </tr>  
                                    <tr>
                                        <td width="130">
                                            <label for="download_deskripsi" class="control-label">Deskripsi File <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input name="download_deskripsi" type="text" id="download_deskripsi" value="<?php echo $download_deskripsi;?>" required class="form-control input-sm" placeholder="Masukan Deskripsi Judul"/>
                                        </td>
                                    </tr>
                                <?php if ($download_file){?>
                                    <tr>
                                        <td>
                                            <label for="download_file" class="control-label">File</label>
                                        </td>
                                        <td>
                                            <input readonly="" type="text" value="<?php echo $download_file; ?>" class="form-control input-sm">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="download_file" class="control-label">Edit File</label>
                                        </td>
                                        <td>
                                            <input type="file" name="download_file" id="download_file" class="form-control btn-sm input-sm" />
                                            <div class="ket">Max. data 4MB</div> 
                                        </td>
                                    </tr>
                                <?php } else {?>
                                    <tr>
                                        <td>
                                            <label for="download_file" class="control-label">File <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input type="file" name="download_file" id="download_file" required class="form-control btn-sm input-sm" />
                                            <div class="ket">Max. data 4MB</div> 
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class='center'>
                            <input class="btn btn-primary" type="submit" name="simpan" value="Simpan Data">
                            <input class="btn btn-default" type="reset" name="batal" value="Batalkan" onclick="location.href='<?php echo site_url(); ?>website/download_file'"/>
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
    <h4 class="modal-title">Detail. Download File</h4>
</div>
<div class="modal-body">
    <div class="table-responsive">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" id="form_detail">
            <tr class="awal">
                <td><strong>Kode</strong></td>
                <td>: <strong><?php echo $download->download_id;?></strong></td>
            </tr>
            <tr>
                <td width="110">Judul File</td>
                <td>: <?php echo $download->download_judul;?></td>
            </tr>
            <tr class="awal">
                <td width="110">Deskripsi File</td>
                <td>: <?php echo $download->download_deskripsi;?></td>
            </tr>
            <tr>
                <td>File</td>
                <td>: <?php echo $download->download_file;?></td>
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