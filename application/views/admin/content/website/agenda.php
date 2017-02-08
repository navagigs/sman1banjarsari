<!-- Include More Css For This Content -->
<link href="<?php echo base_url();?>templates/admin/js/jquery.icheck/skins/square/blue.css" rel="stylesheet">
 <link rel="stylesheet" href="<?php echo base_url();?>templates/admin/css/date/jquery-ui-1.8.17.custom.css" />
<!-- ================================================== VIEW ================================================== -->
<?php if ($action == 'view' || empty($action)){ ?>
<!-- ADMINISTRATOR-->
<?php if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('admin_level') == '1') { ?>
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
                                <a class="btn btn-primary" href="<?php echo site_url();?>website/agenda/tambah"><i class="fa fa-plus-circle"></i> Tambah Agenda</a>
                            </div>  
                            <div class='pull-right'>
                                <a class="btn btn-primary" href="<?php echo site_url();?>website/agenda"><i class="fa fa-times-circle"></i> Bersihkan Pencarian</a>
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
                                    <th width="423">TEMA</th>
                                    <th width="225">TEMPAT</th>
                                    <th width="269">TANGGAL</th>
                                    <th width="120">AKSI</th>
	                           </tr>
                            </thead>
                            <tbody>
                                <?php 
	                            $i	= $page+1;
	                            $like_agenda[$cari]	= $q;
	                        if ($jml_data > 0){
	                            foreach ($this->ADM->grid_all_agenda('*', 'agenda_tema', 'ASC', $batas, $page, '', $like_agenda) as $row){
	                        ?>
                                <tr>
    	                            <td align="center"><?php echo $i;?></td>
                                    <td class="capitalize"><?php echo $row->agenda_tema;?></td>
                                    <td class="capitalize"><?php echo $row->agenda_tempat;?></td>
                                    <td><?php echo dateIndo($row->agenda_mulai).' s/d '.dateIndo($row->agenda_selesai);?></td>
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
                                                    <a href="<?php echo site_url();?>website/agenda/edit/<?php echo $row->agenda_id; ?>" title="Edit"><i class='fa fa-pencil'></i> Edit</a>
                                                </li>
                                                <li>
                                                    <a data-toggle="modal" data-target="#mod-info" type="button"   href="<?php echo site_url();?>website/agenda_detail/<?php echo $row->agenda_id;?>" rel="detail" title="Detail <?php echo $row->agenda_tema; ?>"><i class='fa fa-eye'></i> Detail</a>
                                                </li>
									            <li>
                                                    <a href="javascript:;" data-id="<?php echo $row->agenda_id;?>" data-toggle="modal" data-target="#modal-konfirmasi" title="Hapus <?php echo $row->agenda_tema; ?>"><i class='fa fa-trash-o'></i> Hapus</a>
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
                            </tbody>
                            <?php } ?>
                        </table>
                        <!-- ========== End Table ========== -->
                    </div>
                    <div id='pagination'>
                        <div class='pagination-left'>Total : <?php echo $jml_data;?></div>
                        <div class='pagination-right'>
                            <ul class="pagination">
                                <?php if ($jml_halaman > 1) { echo pages($halaman, $jml_halaman, 'website/agenda/view', $id=""); }?>
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
				<a href="javascript:;" class="btn btn-danger" id="hapus-agenda">Ya</a>
				<button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
			</div>

		</div>
	</div>
</div>
<!-- ========== End Modal Konfirmasi ========== -->
<!-- END ADMINISTRATOR-->
<?php } else { ?>
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
                                <a class="btn btn-primary" href="<?php echo site_url();?>website/agenda/tambah"><i class="fa fa-plus-circle"></i> Tambah Agenda</a>
                            </div>  
                            <div class='pull-right'>
                                <a class="btn btn-primary" href="<?php echo site_url();?>website/agenda"><i class="fa fa-times-circle"></i> Bersihkan Pencarian</a>
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
                                    <th width="423">TEMA</th>
                                    <th width="225">TEMPAT</th>
                                    <th width="269">TANGGAL</th>
                                    <th width="120">AKSI</th>
	                           </tr>
                            </thead>
                        <tbody>
                            <?php 
	                        $i	= $page+1;
	                        $where_agenda['admin_nama'] = $admin->admin_nama;
	                        $like_agenda[$cari]	= $q;
	                    if ($jml_data > 0){
	                        foreach ($this->ADM->grid_all_agenda('*', 'agenda_tema', 'ASC', $batas, $page, $where_agenda, $like_agenda) as $row){
	                        ?>
                            <tr>
    	                        <td align="center"><?php echo $i;?></td>
                                <td class="capitalize"><?php echo $row->agenda_tema;?></td>
                                <td class="capitalize"><?php echo $row->agenda_tempat;?></td>
                                <td><?php echo dateIndo($row->agenda_mulai).' s/d '.dateIndo($row->agenda_selesai);?></td>
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
                                                    <a href="<?php echo site_url();?>website/agenda/edit/<?php echo $row->agenda_id; ?>" title="Edit"><i class='fa fa-pencil'></i> Edit</a>
                                                </li>
                                                <li>
                                                    <a data-toggle="modal" data-target="#mod-info" type="button"   href="<?php echo site_url();?>website/agenda_detail/<?php echo $row->agenda_id;?>" rel="detail" title="Detail <?php echo $row->agenda_tema; ?>"><i class='fa fa-eye'></i> Detail</a>
                                                </li>
									            <li>
                                                    <a href="javascript:;" data-id="<?php echo $row->agenda_id;?>" data-toggle="modal" data-target="#modal-konfirmasi" title="Hapus <?php echo $row->agenda_tema; ?>"><i class='fa fa-trash-o'></i> Hapus</a>
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
                            </tbody>
                            <?php } ?>
                        </table>
                        <!-- ========== End Table ========== -->
                    </div>
                    <div id='pagination'>
                        <div class='pagination-left'>Total : <?php echo $jml_data;?></div>
                        <div class='pagination-right'>
                            <ul class="pagination">
                                <?php if ($jml_halaman > 1) { echo pages($halaman, $jml_halaman, 'website/agenda/view', $id=""); }?>
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
				<a href="javascript:;" class="btn btn-danger" id="hapus-agenda">Ya</a>
				<button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
			</div>

		</div>
	</div>
</div>
<!-- ========== End Modal Konfirmasi ========== -->
<?php } ?>
<!-- ================================================== END VIEW ================================================== -->

<!-- ================================================== TAMBAH ================================================== -->
<?php } elseif ($action == 'tambah') { ?>
<!-- Breadcrumb -->
<div class="page-head">
    <h3>Tambah <small><?php echo $breadcrumb; ?></small></h3>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>admin"><i class='fa fa-home'></i> Dashboard</a></li>
        <li><a href="<?php echo base_url();?>website/agenda"><?php echo $breadcrumb; ?></a></li>
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
                    <form role="form" class="form-horizontal" action="<?php echo site_url();?>website/agenda/tambah" method="post" enctype="multipart/form-data" parsley-validate novalidate>
                        <div class="table-responsive">
                            <table class="table no-border hover">
                                <tbody class="no-border-y">
                                    <tr>
                                        <td width="130">
                                            <label for="agenda_tema" class="control-label">Tema Agenda <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input name="agenda_tema" type="text" id="agenda_tema" value="" required class="form-control input-sm" size="80" maxlength="255" placeholder="Masukan Tema Agenda"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="agenda_deskripsi" class="control-label">Deskripsi <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <textarea rows="20" cols="20" id="agenda_deskripsi" class="form-control input-sm" name="agenda_deskripsi" >
                                            </textarea>
                                            <?php echo $ckeditor;?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="agenda_gambar" class="control-label">Gambar <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input type="file" required class="form-control btn-sm input-sm" name="agenda_gambar" id="agenda_gambar"  />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="agenda_mulai" class="control-label">Tanggal Mulai <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <div id="datetime">
                                                <div class="col-md-3">
                                                    <input name="agenda_mulai" required class="form-control input-sm" type="text" id="agenda_mulai" value="" size="15" maxlength="15" readonly="readonly"/>
                                                </div>
                                                <div class="control-label2">s/d</div>
                                                <div class="col-md-3">
                                                    <input name="agenda_selesai" required class="form-control input-sm" type="text" id="agenda_selesai" value="" size="15" maxlength="15" readonly="readonly"/>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="agenda_tempat" class="control-label">Tempat <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input name="agenda_tempat" required class="form-control input-sm" type="text" id="agenda_tempat" value="" size="30" maxlength="255" placeholder="Masukan Tempat Agenda"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="agenda_jam" class="control-label">Pukul <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input name="agenda_jam" required class="form-control input-sm" type="text" id="agenda_jam" value="" size="30" maxlength="225" placeholder="Masukan Jam Agenda"/>
                                        </td>
                                    </tr>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class='center'>
                            <input class="btn btn-primary" type="submit" name="simpan" value="Simpan Data">
                            <input class="btn btn-default" type="reset" name="batal" value="Batalkan" onclick="location.href='<?php echo site_url(); ?>website/agenda'"/>
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
        <li><a href="<?php echo base_url();?>website/agenda"><?php echo $breadcrumb; ?></a></li>
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
                    <form role="form" class="form-horizontal" action="<?php echo site_url();?>website/agenda/edit/<?php echo $agenda_id; ?>" method="post" enctype="multipart/form-data" parsley-validate novalidate>
                        <input type="hidden" name="agenda_id" value="<?php echo $agenda_id;?>" />
                        <div class="table-responsive">
                            <table class="table no-border hover">
                                <tbody class="no-border-y"> 
                                    <tr>
                                        <td width="130">
                                            <label for="agenda_tema">Tema Agenda <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input name="agenda_tema" type="text" required class="form-control input-sm"  id="agenda_tema" value="<?php echo $agenda_tema;?>" placeholder="Masukan Tema Agenda"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="agenda_deskripsi" class="control-label">Deskripsi <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <textarea class="form-control" rows="20" cols="60" id="agenda_deskripsi" name="agenda_deskripsi" ><?php echo $agenda_deskripsi;?>
                                            </textarea>

                                            <?php echo $ckeditor;?>
                                        </td>
                                    </tr>
                                <?php if ($agenda_gambar){?>
                                    <tr>
                                        <td>
                                            <label for="agenda_gambar" class="control-label">Gambar</label>
                                        </td>
                                        <td>
                                            <img src="<?php echo base_url()."assets/images/agenda/kecil_".$agenda_gambar;?>"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="agenda_gambar" class="control-label">Edit Gambar</label>
                                        </td>
                                        <td>
                                            <input class="form-control btn-sm input-sm" type="file" name="agenda_gambar" id="agenda_gambar" 
                                        </td>
                                    </tr>
                                <?php } else {?>
                                    <tr>
                                        <td>
                                            <label for="agenda_gambar" class="control-label">Gambar <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input required class="form-control btn-sm input-sm" type="file" name="agenda_gambar" id="agenda_gambar"  />
                                        </td>
                                    </tr>
                                <?php } ?>
                                    <tr>
                                        <td>
                                            <label for="agenda_mulai" class="control-label">Tanggal Mulai <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <div id="datetime">
                                                <div class="col-md-3">
                                                    <input required class="form-control input-sm" name="agenda_mulai" type="text" id="agenda_mulai" value="<?php echo dateIndo4($agenda_mulai);?>" size="10" maxlength="15" data-min-view="2" data-date-format="dd-mm-yyyy" placeholder="Tanggal Mulai"/>
                                                </div>
                                                <div class="control-label2">s/d</div>
                                                <div class="col-md-3">
                                                    <input required class="form-control input-sm" name="agenda_selesai" type="text" id="agenda_selesai" value="<?php echo dateIndo4($agenda_selesai);?>" size="10" maxlength="15" data-min-view="2" data-date-format="dd-mm-yyyy" placeholder="Tanggal Selesai"/>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="agenda_tempat" class="control-label">Tempat <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input required class="form-control input-sm" name="agenda_tempat" type="text" id="agenda_tempat" value="<?php echo $agenda_tempat;?>" size="30" maxlength="255" placeholder="Masukan Tempat Agenda"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="agenda_jam" class="control-label">Pukul <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input required class="form-control input-sm" name="agenda_jam" type="text" id="agenda_jam" value="<?php echo $agenda_jam;?>" size="30" maxlength="255" placeholder="Masukan Pukul Agenda"/>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class='center'>
                            <input class="btn btn-primary" type="submit" name="simpan" value="Simpan Data">
                            <input class="btn btn-default" type="reset" name="batal" value="Batalkan" onclick="location.href='<?php echo site_url(); ?>website/agenda'"/>
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
    <h4 class="modal-title">Detail. Agenda</h4>
</div>
<div class="modal-body">
    <div class="table-responsive">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" id="form_detail">
            <tr class="awal">
                <td><strong>Kode</strong></td>
                <td>: <strong><?php echo $agenda->agenda_id;?></strong></td>
            </tr>
            <tr>
                <td width="110">Tema Agenda</td>
                <td>: <?php echo $agenda->agenda_tema;?></td>
            </tr>
            <tr class="awal">
                <td>Deskripsi</td>
                <td>:</td>
            </tr>
            <tr>
                <td colspan="2" ><textarea rows="20" cols="60" id="berita_deskripsi" name="agenda_deskripsi" ><?php echo $agenda->agenda_deskripsi;?></textarea><?php echo $ckeditor;?></td>
            </tr>
            <tr>
                <td>Tanggal Mulai </td>
                <td>: <?php echo dateIndo($agenda->agenda_mulai). " s/d ".dateIndo($agenda->agenda_selesai);?></td>
            </tr>
            <tr class="awal">
                <td>Tempat</td>
                <td>: <?php echo $agenda->agenda_tempat;?></td>
            </tr>
            <tr>
                <td>Pukul</td>
                <td>: <?php echo $agenda->agenda_jam;?></td>
            </tr>
            <tr class="awal">
                <td>Gambar</td>
                <td> <img src="<?php echo site_url();?>assets/images/agenda/<?php echo $agenda->agenda_gambar;?>" style="height: 200px" /></td>
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
<script> 
  $(document).ready(function(){  
  $('#agenda_selesai' ).datepicker({ minDate: -0, maxDate: "+1M +3D",
		changeMonth: true,
		changeYear:true,
		dateFormat: "dd-mm-yy",
		dayNamesMin:['Mg','Sn','Se','Ra','Ka','Jm','Sb'],
		monthNamesShort:['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Ags','Sep','Okt','Nov','Des'],
		showAnim:'fade',
		maxDate: "+1Y"
   });
 });
</script>
<script>
 $(document).ready(function(){  
 $('#agenda_mulai').datepicker({
		changeMonth: true,
		changeYear:true,
		dateFormat: "dd-mm-yy",
		dayNamesMin:['Mg','Sn','Se','Ra','Ka','Jm','Sb'],
		monthNamesShort:['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Ags','Sep','Okt','Nov','Des'],
		showAnim:'fade',
		minDate: "-1Y", 
		maxDate: "+1Y"
	});

});
</script>