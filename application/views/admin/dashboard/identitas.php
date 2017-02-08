
<!-- ================================================== VIEW ================================================== -->
<?php if ($action == 'view' || empty($action)){ ?>
<!-- ================================================== END VIEW ================================================== -->

<!-- ================================================== EDIT ================================================== -->
<?php } elseif ($action == 'edit') { ?>
<!-- Breadcrumb -->
<div class="page-head">
    <h3>Identitas <small>Website</small></h3>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>admin"><i class='fa fa-home'></i> Dashboard</a></li>
        <li class="active"><?php echo $breadcrumb; ?></li>
	</ol>	
</div>
<!-- End Breadcrumb -->
<!-- Content -->
<div class="cl-mcont">
    <div class="row">
        <div class="col-md-12">
            <div class="block-flat">
                <div class="content">
                        <?php if ($this->session->flashdata('success') || $this->session->flashdata('error')) { ?>
                            <?php if ($this->session->flashdata('success')) { ?>
                                <div class="alert alert-success">
								    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								    <i class="fa fa-check sign"></i><?php echo $this->session->flashdata('success'); ?>
                                </div>
                            <?php } else { ?>
                                <div class="alert alert-warning">
								    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								    <i class="fa fa-warning sign"></i><?php echo $this->session->flashdata('error'); ?>
                                </div>
                            <?php } ?>
                        <?php } ?>
                        <form  role="form" class="form-horizontal" action="<?php echo site_url();?>sitenav/identitas/edit/<?php echo $identitas_id;?>" method="post" enctype="multipart/form-data" parsley-validate novalidate>
                            <input type="hidden" name="identitas_id" value="<?php echo $identitas_id;?>" />
                            <div class="table-responsive">
                                <table class="table no-border hover">
                                    <tbody class="no-border-y">
                                        <tr>
                                            <td>
                                                <label for="identitas_website" class="control-label">Nama Website <span class="required">*</span></label>
                                            </td>
                                            <td>
                                                <input type="text" required class="form-control input-sm" placeholder="Masukan Nama Website" size="100" name="identitas_website" id="identitas_website" value="<?php echo $identitas_website; ?>">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="identitas_deskripsi" class="control-label">Meta Deskripsi <span class="required">*</span></label>
                                            </td>
                                            <td>
                                                <input type="text" required class="form-control input-sm" placeholder="Masukan Nama Website" size="100" name="identitas_deskripsi" id="identitas_deskripsi" value="<?php echo $identitas_deskripsi; ?>">
                                            </td>
                                        </tr>
                                        <tr>
        	                               <td>
                                                <label for="identitas_keyword" class="control-label">Meta Keyword <span class="required">*</span></label>
                                            </td>
                                            <td>
                                                <input type="text" required class="form-control input-sm" placeholder="Masukan Meta Keyword" size="100" name="identitas_keyword" id="identitas_keyword" value="<?php echo $identitas_keyword; ?>">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="identitas_alamat" class="control-label">Alamat <span class="required">*</span></label>
                                            </td>
                                            <td>    
                                                <input type="text" required class="form-control input-sm" placeholder="Masukan Alamat" size="100" name="identitas_alamat" id="identitas_alamat" value="<?php echo $identitas_alamat; ?>">
                                            </td>
                                        </tr>
                                        <tr>
        	                               <td>
                                               <label for="identitas_notelp" class="control-label">No.Telepon <span class="required">*</span></label>
                                            </td>
                                            <td>
                                                <input type="text" required parsley-maxlength="15" class="form-control input-sm" placeholder="Masukan Alamat" size="100" name="identitas_notelp" id="identitas_notelp" value="<?php echo $identitas_notelp; ?>">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="identitas_email" class="control-label">Email <span class="required">*</span></label>
                                            </td>
                                            <td>
                                                <input type="email" required class="form-control input-sm" placeholder="Masukan Email" size="100" name="identitas_email" id="identitas_email" value="<?php echo $identitas_email; ?>">
                                            </td>
                                        </tr>
                                        <tr>
        	                                <td>
                                               <label for="identitas_fb" class="control-label">Facebook <span class="required">*</span></label>
                                            </td>
                                            <td>
                                                <input type="text" required class="form-control input-sm" placeholder="Masukan Akun Facebook" size="100" name="identitas_fb" id="identitas_email" value="<?php echo $identitas_fb; ?>">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="identitas_tw" class="control-label">Twitter <span class="required">*</span></label>
                                            </td>
                                            <td>
                                                <input type="text" required class="form-control input-sm" placeholder="Masukan Akun Twitter" size="100" name="identitas_tw" id="identitas_tw" value="<?php echo $identitas_tw; ?>">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="identitas_gp" class="control-label">Google Plus <span class="required">*</span></label>
                                            </td>
                                            <td>
                                                <input type="text" required class="form-control input-sm" placeholder="Masukan Akun Google Plus" size="100" name="identitas_gp" id="identitas_gp" value="<?php echo $identitas_gp; ?>">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="identitas_email" class="control-label">Youtube <span class="required">*</span></label>
                                            </td>
                                            <td>
                                                <input type="text" required class="form-control input-sm" placeholder="Masukan Akun Youtube" size="100" name="identitas_yb" id="identitas_yb" value="<?php echo $identitas_yb; ?>">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="identitas_maps" class="control-label">Koordinat Google Maps <span class="required">*</span></label>
                                            </td>
                                            <td>
                                                <input type="text" required class="form-control input-sm" placeholder="Masukan Koordinat Google Maps" size="100" name="identitas_maps" id="identitas_maps" value="<?php echo $identitas_maps; ?>">
                                            </td>
                                        </tr>                                        
                                        <tr>
                                            <td>
                                                <label for="identitas_author" class="control-label">Author<span class="required">*</span></label>
                                            </td>
                                            <td>
                                                <input type="text" required class="form-control input-sm" placeholder="Masukan Author" size="100" name="identitas_author" id="identitas_author" value="<?php echo $identitas_author; ?>">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="identitas_warning" class="control-label">Warning<span class="required">*</span></label>
                                            </td>
                                            <td>
                                                <input type="text" required class="form-control input-sm" placeholder="Masukan Warning" size="100" name="identitas_warning" id="identitas_warning" value="<?php echo $identitas_warning; ?>">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="identitas_aktif" class="control-label">Aktif<span class="required">*</span></label>
                                            </td>
                                            <td>
                                                <input type="text" required class="form-control input-sm" id="identitas_aktif"  placeholder="Masukan Aktif" size="100" name="identitas_aktif" id="identitas_aktif" value="<?php echo $identitas_aktif;?>">
                                            </td>
                                        </tr>
                                    <?php if ($identitas_favicon){?>
                                        <tr>
        	                               <td>
                                               <label for="identitas_favicon" class="control-label">Favicon</label>
                                            </td>
                                            <td>
                                                <img src="<?php echo base_url(); ?>assets/<?php echo $identitas_favicon; ?>" style="width:50px;"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="identitas_favicon" class="control-label">Ganti Favicon</label>
                                            </td>
                                            <td>
                                                <input type="file" class="form-control btn-sm input-sm" size="100" name="identitas_favicon" id="identitas_favicon" value="<?php echo $identitas_favicon; ?>">
                                            </td>
                                        </tr>    
                                        <?php } else {?>
                                        <tr>
                                            <td>
                                                <label for="identitas_favicon" class="control-label">Favicon <span class="required">*</span></label>
                                            </td>
                                            <td>
                                                <input type="file" required class="form-control" size="100" name="identitas_favicon" id="identitas_favicon" value="<?php echo $identitas_favicon; ?>">
                                            </td>
                                        </tr>
                                    <?php }?>             
                                    </tbody>
                                </table>
                            </div>
                            <div class='center'>
                                <input class="btn btn-primary" type="submit" name="simpan" value="Simpan Data">
                                <input class="btn btn-default" type="reset" name="batal" value="Batalkan" onclick="location.href='<?php echo site_url(); ?>admin'"/>
                            </div>                            
                        </form>
                    </div>
                </div>				
            </div>
        </div>
    </div>
<?php } ?>
<!-- End Content -->
<!-- ================================================== END EDIT ================================================== -->
<!-- Include More Js For This Content -->                
<!-- For Validation -->
<script type="text/javascript" src="<?php echo base_url();?>templates/admin/js/jquery.parsley/parsley.js"></script>	
