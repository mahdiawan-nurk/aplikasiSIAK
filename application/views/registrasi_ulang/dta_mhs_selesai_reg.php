
<div class="row">
                    
                    <div class="col-md-12" style="padding-left: 0px;padding-right: 0">
                            <div class="tabs">
                                <ul class="nav nav-tabs nav-justified">
                                    <?php foreach ($semester as $key){ 
                                        if ($key->id=="1"){
                                            $active='active';
                                        }else{
                                            $active='';
                                        }

                                            ?>
                                         
                                    <li class="<?=$active;?>">
                                        <a href="#data" data-toggle="tab" class="text-center" onclick="cek(<?=$key->id;?>);" ><?=$key->nama;?></a>
                                    </li>
                                    <?php } ?>
                                   
                                    
                                </ul>
                                <div class="tab-content">
                                    <div id="data" class="tab-pane active"> 
                                        <?php if ($user>0): ?>
                                              <div class="btn-group" style="margin-bottom: 10px;">
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><i class="fa fa-print"> </i> Cetak Laporan <span class="caret"></span> </button>
                                        <ul class="dropdown-menu">
                                            <li><a href="#" class="item_cetak" data="0">Seluruh Prodi</a></li>
                                        <?php foreach ($prodi as $data): ?>
                                          <li><a href="#" class="item_cetak" data="<?=$data->kode_prodi;?>"><?=$data->nama_prodi?></a></li>
                                        <?php endforeach ?>
                                        </ul>
                                                    </div>
                                        <?php endif ?>
                                      
                                                    <br>
                                                    
                                        

                                    <input type="hidden" name="sems" id="sems" value="1">
                                       <table id="mydata" class="table table-bordered table-striped mb-none">
                                            <thead>
                                                <tr>
                                                     <th class="detail-col">NO</th>
                                                    <th>NIM</th>
                                                    <th>Nama</th>
                                                    <th class="hidden-480">Prodi</th>
                                                    <th>Semester Terdaftar</th>
                                                    <th class="detail-col">tgl Terdaftar</th>
                                                    <th>Status Pendaftaran</th>
                                                    <th>Status Mahasiswa</th>
                                                  
                                                    

                                                   
                                                </tr>
                                            </thead>

                                            <tbody id="show_data">
                                                <tr>
                                                    

                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                     <td></td>
                                                    <td></td>
                                                    <td></td>
                                                   
                                                </tr>

                                                

                                            </tbody>
                                        </table>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                                </div><!-- /.row -->
<!-- MODAL ADD -->
        <div class="modal fade" id="ModalaAdd" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Tambah Mahasiswa</h3>
            </div>
            <form class="form-horizontal" >
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-xs-3" >NIM Mahasiswa</label>
                        <div class="col-xs-9">
                            <input name="nim" id="nim" class="form-control" type="number" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Mahasiswa</label>
                        <div class="col-xs-9">
                            <input name="nama" id="nama" class="form-control" type="text" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Program Studi</label>
                        <div class="col-xs-9">
                            <?php echo form_dropdown('prodi', $prodi, $d['id_prodi'], 'class="form-control" id="prodi" required'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Semester</label>
                        <div class="col-xs-9">
                           <?php echo form_dropdown('semester', $semester, $d['id'], 'class="form-control" id="semester" required'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Gender</label>
                        <div class="col-xs-9">
                            <select class="form-control" name="gender" id="gender">

                            	<option >-</option>
                            	<option value="L">Laki-laki</option>
                            	<option value="P">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Agama</label>
                        <div class="col-xs-9">
                            <select class="form-control" name="agama" id="agama">

                            	<option >-</option>
                            	<option value="Islam">Islam</option>
                            	<option value="Kristen">Kristen</option>
                            	<option value="Hindu">Hindu</option>
                            	<option value="Budha">Budha</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >E-mail</label>
                        <div class="col-xs-9">
                            <input name="email" id="email" class="form-control" type="email"  required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >alamat</label>
                        <div class="col-xs-9">
                            <textarea class="form-control" name="alamat" id="alamat"></textarea>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info" id="btn_simpan">Simpan</button>
                </div>
            </form>
            </div>
            </div>
        </div>
        <!--END MODAL ADD-->
<!--MODAL HAPUS-->
        <div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                        <h4 class="modal-title" id="myModalLabel">Hapus Barang</h4>
                    </div>
                    <form class="form-horizontal">
                    <div class="modal-body">
                                          
                            <input type="text" name="kode" id="textkode" value="">
                            <div class="alert alert-warning"><p>Apakah Anda yakin mau memhapus barang ini?</p></div>
                                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button class="btn_hapus btn btn-danger" id="btn_hapus">Hapus</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!--END MODAL HAPUS-->
							
<script src="<?php echo base_url();?>assets/vendor/jquery/jquery.js"></script> 
<script type="text/javascript">
	 var table;
    $(document).ready(function() {

    table = $('#mydata').DataTable({
                  "paging": true,
                  // "iDisplayLength":10,
                "processing": false, 
                "serverSide": false, 
                "order": [], 
                  "sAjaxSource": "<?php echo site_url('index.php/r_selesai_daftar/data_selesai_reg')?>",
                  // "autoWidth": false,
                  "fnServerParams": function ( aoData ) {
                    aoData.push( { "name": "sems", "value": $('#sems').val()} );
                    
                  }
         }); 

$('.item_cetak').on('click',function(){
           var kode=$(this).attr('data');
           var sems=$('#sems').val();
           if (kode==0) {
             window.open("<?php echo site_url()?>laporan/cetak_all_terdaftar/"+sems,"_blank");
             // alert(kode+'-'+sems);
         }else{
            window.open("<?php echo site_url()?>laporan/cetak_by_prodi_terdaftar/"+kode+"/"+sems,"_blank");
            // alert(kode+'-'+sems);
         }
            
            });
  
    
});
      function cek($id){
$('#sems').val($id);
table.ajax.reload();
}
</script>