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
                            <div class='btn-navigation'> 
                                <!--<div class='pull-right'>
                                    <a class="btn btn-primary" href="<?php echo site_url();?>website/komentar/tambah"><i class="fa fa-plus-circle"></i> Tambah Komentar</a>
                                </div>-->
                                <div class='pull-right2'>
                                    <a class="btn btn-primary" href="<?php echo site_url();?>website/komentar"><i class="fa fa-times-circle"></i> Bersihkan Pencarian</a>
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
                                    <th width="150">NAMA PENGIRIM</th>
                                    <th>KOMENTAR</th>
                                    <th width="140">TANGGAL</th>
                                    <th width="150">AKSI</th>
	                           </tr>
                            </thead>
                            <tbody>
                                <?php 
	                            $i	= $page+1;
	                            $like_komentar[$cari] = $q;
	                   		    if ($jml_data > 0){
	                           foreach ($this->ADM->grid_all_komentar('*', 'komentar_waktu', 'DESC', $batas, $page, '', $like_komentar) as $row){
		                      $status = ($row->komentar_status == 'Y')?'enable':'disable'; ?>
                                <tr>
    	                            <td align="center"><?php echo $i;?></td>
                                    <td><?php echo $row->komentar_pengirim;?></td>
                                    <td><?php echo $row->komentar_deskripsi;?></td>        
                                    <td align="center"><?php echo dateIndo($row->komentar_waktu);?></td>
                                    <td align="center">
                                        <!-- ========== EDIT DETAIL HAPUS ========== -->
                                        <div class="btn-group">
								            <button type="button" class="btn btn-default btn-xs">Actions</button>
								            <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">
									            <span class="caret"></span>
									            <span class="sr-only">Toggle Dropdown</span>
								            </button>
								            <ul class="dropdown-menu pull-right" role="menu">
									            <!--<li>
                                                    <a href="<?php echo site_url();?>website/komentar/edit/<?php echo $row->komentar_id; ?>" title="Edit"><i class='fa fa-pencil'></i> Edit</a>
                                                </li>-->
                                                <li>
                                                    <a data-toggle="modal" data-target="#mod-info" type="button"   href="<?php echo site_url();?>website/komentar_detail/<?php echo $row->komentar_id;?>" rel="detail" title="Detail <?php echo $row->komentar_pengirim; ?>"><i class='fa fa-eye'></i> Detail</a>
                                                </li>
                                                <li>
                                                    <a href="<?php echo site_url();?>website/komentar/edit/<?php echo $row->komentar_id;?>/<?php echo $row->komentar_status; ?>" class="<?php echo $status; ?>" title="Konfirmasi"><i class='fa fa-check'></i> Konfirmasi</a>
                                                </li>
									            <li>
                                                    <a href="javascript:;" data-id="<?php echo $row->komentar_id;?>" data-toggle="modal" data-target="#modal-konfirmasi" title="Hapus <?php echo $row->komentar_pengirim; ?>"><i class='fa fa-trash-o'></i> Hapus</a>
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
                                <?php if ($jml_halaman > 1) { echo pages($halaman, $jml_halaman, 'website/komentar/view', $id=""); }?>
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
				<a href="javascript:;" class="btn btn-danger" id="hapus-komentar">Ya</a>
				<button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
			</div>

		</div>
	</div>
</div>
<!-- ========== End Modal Konfirmasi ========== -->
<!-- ================================================== END VIEW ================================================== -->

<!-- ================================================== DETAIL ================================================== -->
<?php } elseif ($action == 'detail') { ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>templates/admin/css/formstyle.css"/>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Detail. Komentar</h4>
</div>
<div class="modal-body">
    <div class="table-responsive">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" id="form_detail">
            <tr class="awal">
                <td width="110"><strong>Judul Berita</strong></td>
                <td>: <strong><?php echo $komentar->berita_judul;?></strong></td>
            </tr>
            <tr>
                <td>Nama Pengirim</td>
                <td>: <?php echo $komentar->komentar_pengirim;?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td>: <?php echo $komentar->komentar_email;?></td>
            </tr>
            <tr  class="awal">
                <td>Deskripsi</td>
                <td>: <?php echo $komentar->komentar_deskripsi;?></td>
            </tr>
            <tr>
                <td>Waktu</td>
                <td>: <?php echo dateIndo($komentar->komentar_waktu).' WIB';?></td>
            </tr>  
            <tr>
                <td>Status</td>
                <td>: <?php echo $komentar->komentar_status;?></td>
            </tr>
        </table>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
</div>
<?php } ?>
<!-- ================================================== END DETAIL ================================================== -->