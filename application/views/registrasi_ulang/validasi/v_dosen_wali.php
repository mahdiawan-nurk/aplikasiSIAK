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
                                       <!--  <div class="form-group">
                                            <label class="col-sm-3 control-label">Filter By Prog. Studi:</label>
                                            <div class="col-sm-9">
                                               <?php echo form_dropdown('prodi', $prodi, $d['kode_prodi'], 'class="form-control" id="prodi" required'); ?>
                                            </div>
                                        </div> -->
                                    <input type="hidden" name="sems" id="sems" value="1">
                                       <table id="mydata" class="table  table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    
                                                    <th class="detail-col">NO</th>
                                                    <th>NIM</th>
                                                    <th>Nama</th>
                                                   

                                                    <th>
                                                        Semester
                                                    </th>
                                                    <th class="hidden-480">Tgl Pengajuan</th>

                                                     <th>Status</th>
                                                    <th>Act Kompensasi</th>
                                                    <th>Act KHS</th>
                                                   
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
                                                    <td></td>
                                                    <td></td>
                                                </tr>

                                                

                                            </tbody>
                                        </table>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                                </div>
<!-- /.row -->

<!--MODAL HAPUS-->
        <div class="modal fade" id="Modalkomp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header btn-danger">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                        <h4 class="modal-title" id="myModalLabel">Konfirmasi</h4>
                    </div>
                    <form class="form-horizontal">
                    <div class="modal-body">
                                          
                            <input type="hidden" name="kode" id="nim" value="">
                            <input type="hidden" name="sem" id="sem" value="">
                            <div class="alert alert-warning" id="test"><p>Apakah Anda yakin Akan Menvalidasi?</p></div>
                                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button class="btn_hapus btn btn-danger" id="btn_validasi_komp">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

         <div class="modal fade" id="Modalkhs" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header btn-danger">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                        <h4 class="modal-title" id="myModalLabel">Konfrimasi</h4>
                    </div>
                    <form class="form-horizontal">
                    <div class="modal-body">
                                          
                            <input type="hidden" name="kode" id="nim" value="">
                            <input type="hidden" name="sem" id="sem" value="">
                            <div class="alert alert-warning" id="test"><p>Apakah Anda yakin Akan Menvalidasi?</p></div>
                                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button class="btn_hapus btn btn-danger" id="btn_validasi_khs">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!--END MODAL HAPUS-->
                            
<script src="<?php echo base_url();?>assets/js/jquery-2.1.4.min.js"></script>
<script type="text/javascript">
    var table;
    $(document).ready(function() {

        //datatables
        table = $('#mydata').DataTable({
                  "paging": true,
                  // "iDisplayLength":10,
                "processing": true, 
                 
                "order": [], 
                  "sAjaxSource": "<?php echo site_url('index.php/v_dosenw/data_dosenw')?>",
                  // "autoWidth": false,
                  "fnServerParams": function ( aoData ) {
                    aoData.push( { "name": "sems", "value": $('#sems').val()} );
                    
                  }
         });    
        $('#refresh').on('click',function(){
            table.ajax.reload(); 
            });

      $('#show_data').on('click','.item_unvalid_komp',function(){
            var id=$(this).attr('data');
             var v=$(this).attr('data-s');
             $("#test").html('<p>Apakah Anda yakin Akan Unvalidasi?</p>');
            $('#Modalkomp').modal('show');
            $('[name="kode"]').val(id);
            $('[name="sem"]').val(v);
        });
      $('#show_data').on('click','.item_valid_komp',function(){
            var id=$(this).attr('data');
          var v=$(this).attr('data-s');
             $("#test").html('<p>Apakah Anda yakin Akan Menvalidasi?</p>');
            $('#Modalkomp').modal('show');
            $('[name="kode"]').val(id);
            $('[name="sem"]').val(v);
        });
      $('#show_data').on('click','.item_unvalid_khs',function(){
            var id=$(this).attr('data');
             var v=$(this).attr('data-s');
             $("#test").html('<p>Apakah Anda yakin Akan Unvalidasi?</p>');
            $('#Modalkhs').modal('show');
            $('[name="kode"]').val(id);
            $('[name="sem"]').val(v);
        });
      $('#show_data').on('click','.item_valid_khs',function(){
            var id=$(this).attr('data');
             var v=$(this).attr('data-s');
             $("#test").html('<p>Apakah Anda yakin Akan Menvalidasi?</p>');
            $('#Modalkhs').modal('show');
            $('[name="kode"]').val(id);
            $('[name="sem"]').val(v);
        });

       $('#btn_validasi_komp').on('click',function(){
            var nim=$('#nim').val();
            var sem=$('#sem').val();
            $.ajax({
            type : "POST",
            url  : "<?php echo base_url('index.php/v_dosenw/simpan_validasi_komp')?>",
            dataType : "JSON",
                    data : {nim: nim, sem:sem},
                    success: function(data){
                          
                    $('#Modalkomp').modal('hide');
                    table.ajax.reload();
                    notify_success(data.pesan);
                
                    }
                });
                return false;
            // alert(nim+valid);
            });
       $('#btn_validasi_khs').on('click',function(){
            var nim=$('#nim').val();
            var sem=$('#sem').val();
            $.ajax({
            type : "POST",
            url  : "<?php echo base_url('index.php/v_dosenw/simpan_validasi_khs')?>",
            dataType : "JSON",
                    data : {nim: nim, sem:sem},
                    success: function(data){
                          
                    $('#Modalkhs').modal('hide');
                    table.ajax.reload();
                    notify_success(data.pesan);
                
                    }
                });
                return false;
            // alert(nim+valid);
            });
});

 function cek($id){
$('#sems').val($id);
table.ajax.reload();
// alert($id);
}
</script>