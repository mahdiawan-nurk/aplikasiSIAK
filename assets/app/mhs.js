 var table;

    $(document).ready(function() {


        //datatables
        table = $('#datatable-default').DataTable({
                  "paging": true,
                  // "iDisplayLength":10,
                "processing": true, 
                "serverSide": false, 
                "order": [], 
                  "sAjaxSource":  base_url+"index.php/data_mhs/datatable",
                  // "autoWidth": false,
                  "fnServerParams": function ( aoData ) {
                    aoData.push( { "name": "prodi", "value": $('#prodi_id').val()},{ "name": "semester", "value": $('#semester').val()},{ "name": "angkatan", "value": $('#angkatan').val()} );
                    
                  }
         });         

         
      

  $("#prodi_id").change(function(){
          table.ajax.reload();
  });
 $("#semester").change(function(){
          table.ajax.reload();
  });
 $("#angkatan").change(function(){
          table.ajax.reload();
  });

        //GET UPDATE
    $('#show_data').on('click','.item_edit',function(){
            var id=$(this).attr('data');
            // $('#ModalEdit').modal('show');
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/data_mhs/get_data_mhs')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                  $.each(data,function(nim, nama, prodi, semester){
                      $('#ModalEdit').modal('show');
                       $('[name="nim"]').val(data.nim);
                         $('[name="nama"]').val(data.nama);
                         $('[name="prodi"]').val(data.prodi);
                         $('[name="semester"]').val(data.semester);
                         
                });
                }
            });
            return false;
            // // alert(id);
        });
        $('#btn-add').on('click',function(){
           $('#form')[0].reset();
        $("#ModalaAdd").modal('show');
         
        });
        // $('#show_data').on('click','.item_edit',function(){
        //    $("#ModalEdit").modal('show');
        // });
        $('#btn_simpan').on('click',function(){
        
            var nim=$('#nim').val();
            var nama=$('#nama').val();
             var prodi=$('#prodi').val();
            var semester=$('#semestera').val();

            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/data_mhs/save_data')?>",
                data : {nim:nim ,nama:nama, prodi:prodi, semester:semester},
                // dataType:"JSON",
                success: function(data){
                    $('#ModalaAdd').modal('hide');
                    table.ajax.reload();
                    notify_success(data.pesan);
                }
            });
            return false;
            // alert(semester);
            
        
        });
        //Update Barang
    $('#btn_update').on('click',function(){
            var nim=$('#enim').val();
             var nama=$('#enama').val();
            var prodi=$('#eprodi').val();
            var semester=$('#esemester').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/data_mhs/update_data_mhs')?>",
                data : {nim:nim , nama:nama, prodi:prodi, semester:semester},
                // dataType:"JSON",
                success: function(data){
                    $('#ModalEdit').modal('hide');
                    table.ajax.reload();
                    notify_success(data.pesan);
                }
            });
            return false;
            // alert(email);
        });
         $('#show_data').on('click','.item_hapus',function(){
            var id=$(this).attr('data');
            $('#ModalHapus').modal('show');
            $('[name="kode"]').val(id);
        });
         $('#btn_hapus').on('click',function(){
            var nim=$('#textkode').val();
            $.ajax({
            type : "POST",
            url  : "<?php echo base_url('index.php/data_mhs/delete_data')?>",
            dataType : "JSON",
                    data : {nim: nim},
                    success: function(data){
                           if (data.status== "hapus") {
                    $('#ModalHapus').modal('hide');
                    table.ajax.reload();
                     $('#messages').addClass("active");
                    notify_success(data.pesan);
                }
                    }
                });
                return false;
            });

        $('#refresh').on('click',function(){
             table.ajax.reload();
           
                
            });

    });
