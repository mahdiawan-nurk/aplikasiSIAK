<div class="col-xs-12 col-sm-4">
                                            <div class="widget-box">
                                                <div class="widget-header">
                                                    <h4 class="widget-title"></h4>

                                                    <div class="widget-toolbar">
                                                        <a href="#" data-action="collapse">
                                                            <i class="ace-icon fa fa-chevron-up"></i>
                                                        </a>

                                                        <a href="#" data-action="close">
                                                            <i class="ace-icon fa fa-times"></i>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="widget-body">
                                                    <div class="widget-main">
                                                        <div>
                                                            <label for="form-field-8">Hak Akses</label>

                                                            <input class="form-control" id="form-field-8" placeholder="Default Text" value="<?=$jabatan->jabatan; ?>">
                                                        </div>

                                                        <hr />

                                                        

                                                       
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
<div class="col-sm-6">
                                        <div class="dd dd-draghandle">
                                            <ol class="dd-list">
            <?php $level=$jabatan->id_jabatan;  $main_menu = $this->db->query("SELECT * FROM tbl_menu Where main_menu='0' ORDER BY nama_menu ASC");
            foreach ($main_menu->result() as $main) {
                $akses_s =$this->db->query("SELECT *FROM tbl_menu WHERE main_menu='".$main->id_menu."' ORDER BY nama_menu ASC");
                 if ($akses_s->num_rows() > 0) { ?>
                                                <li class="dd-item dd2-item" data-id="15">
                                                    <div class="dd-handle dd2-handle">
                                                        <i class="normal-icon ace-icon fa fa-signal orange bigger-130"></i>

                                                        <i class="drag-icon ace-icon fa fa-arrows bigger-125"></i>
                                                    </div>
                                                    <div class="dd2-content"><input name="form-field-checkbox" type="checkbox" class="check" <?= cek_akses_main($level,$main->id_menu); ?> data-level="<?=$level?>" data-id="<?=$main->id_menu?>"/> &nbsp;<?php echo strtoupper($main->nama_menu) ?></div>

                                                    <ol class="dd-list">
                                                    <?php foreach ($akses_s->result() as $sub) {?>
                                                        <li class="dd-item dd2-item" data-id="16">
                                                            <div class="dd-handle dd2-handle">
                                                                <i class="normal-icon ace-icon fa fa-user red bigger-130"></i>

                                                                <i class="drag-icon ace-icon fa fa-arrows bigger-125"></i>
                                                            </div>
                                                            <div class="dd2-content"><input name="form-field-checkbox" type="checkbox" class="check" <?= cek_akses_sub($level,$sub->id_menu);?> data-lev="<?=$level?>" data-sub="<?=$main->id_menu?>" id="id_sub"/> &nbsp;<?php echo $sub->nama_menu;?></div>
                                                        </li>
                                                         <?php  } ?>
                                                    </ol>
                                                </li>
                                                <?php }else{?>
                                                <li class="dd-item dd2-item" data-id="19">
                                                    <div class="dd-handle dd2-handle">
                                                        <i class="normal-icon ace-icon fa fa-bars blue bigger-130"></i>

                                                        <i class="drag-icon ace-icon fa fa-arrows bigger-125"></i>
                                                    </div>
                                                    <div class="dd2-content"><input name="form-field-checkbox" type="checkbox" class="check" <?= cek_akses_main($level,$main->id_menu);?> data-level="<?=$level?>" data-id="<?=$main->id_menu?>"/> &nbsp;<?php echo strtoupper($main->nama_menu) ?></div>
                                                </li>

                        <?php } }?>
                                            </ol>
                                        </div>
                                    </div>

               
<script src="<?php echo base_url();?>assets/js/jquery-2.1.4.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#mydata').DataTable( {
        "scrollY":        "300px",
        "scrollCollapse": false,
        "paging":         false
    } );
} );
</script>
<script type="text/javascript">
    function refreshPage() { 
        location.reload(); 
    }
    $('.check').on('click',function(){
        const akseslvl = $(this).data('level');
        const aksesid = $(this).data('id');
        $.ajax({
            url: "<?php echo base_url('user_akses/ubah_akses');?>",
            type:"POST",
            data:{
                'akseslvl':akseslvl,
                'aksesid':aksesid
            },
            success: function(response) {
                if (response.status == "insert") {
                    // document.location.href="<?= base_url('index.php/user_akses/view_hak_akses/')?>"+akseslvl;
                    location.reload();
                    notify_success(response.pesan); 
                    // alert(response.status);
                } else {
                    location.reload();
                    notify_success(response.pesan);
                }
            }
        });
        
        
    });
</script>
<script type="text/javascript">
    function refreshPage() { 
        location.reload(); 
    }
    $('#id_sub').on('click',function(){
        const akseslvl = $(this).data('lev');
        const aksesid = $(this).data('sub');
        // $.ajax({
        //     url: "<?php echo base_url('user_akses/ubah_akses');?>",
        //     type:"POST",
        //     data:{
        //         'akseslvl':akseslvl,
        //         'aksesid':aksesid
        //     },
        //     success: function(response) {
        //         if (response.status == "insert") {
        //             // document.location.href="<?= base_url('index.php/user_akses/view_hak_akses/')?>"+akseslvl;
        //             location.reload();
        //             notify_success(response.pesan); 
        //             // alert(response.status);
        //         } else {
        //             location.reload();
        //             notify_success(response.pesan);
        //         }
        //     }
        // });
        alert(aksesid);
        
    });
</script>