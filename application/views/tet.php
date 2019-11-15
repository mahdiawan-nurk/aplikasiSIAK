<!-- <ul class="nav nav-main">
                    

<?php
                        $level=$this->session->userdata('id_users');
                        
                      $akses =$this->db->query("SELECT *FROM tr_akses WHERE email='".$level."' ")->result();
                        foreach ($akses as $key) {
                                //  $main_menu = $this->db->get_where('tbl_menu', array('is_main_menu' => 0,'id_menu'=>$key->id_menu));
                                                             $main_menu = $this->db->query("SELECT * FROM jabatan Where id_jabatan='$key->id_jabatan'");
                        foreach ($main_menu->result() as $main) {
                            $sub_menu = $this->db->query("SELECT * FROM hak_akses,tbl_menu Where hak_akses.id_jabatan='$key->id_jabatan' AND tbl_menu.id_menu=hak_akses.id_menu AND tbl_menu.main_menu='0'  ");
                             if ($sub_menu->num_rows() > 0) {
                            echo "<li class='nav-parent'>
                                    <a href='#' >
                                      <i class='fa fa-list'></i><span> ".  strtoupper($main->jabatan)."</span></a>";
                                       echo "<ul class='nav nav-main'>";
                                foreach ($sub_menu->result() as $sub) {
                                     $sub_menu_tree = $this->db->query("SELECT * FROM hak_akses,tbl_menu Where hak_akses.id_jabatan='$key->id_jabatan' AND tbl_menu.id_menu=hak_akses.id_menu AND tbl_menu.main_menu='$sub->id_menu' ");
                                    if ($sub_menu_tree->num_rows() > 0) {
                            echo "<li class='nav-parent'>
                                    <a href='".$sub->link."'>
                                     <i class='fa fa-list'></i><span > ".  strtoupper($sub->nama_menu)."</span></a>";
                                       echo "<ul class='nav nav-children'>";
                                foreach ($sub_menu_tree->result() as $suba) {
                                    echo "<li >" . anchor($suba->link, '<i class="fa fa-list"></i>'."&nbsp;". $suba->nama_menu) . "</li>";
                                }
                                echo"</ul>
                                </li>";
                            }    else
                                    {
                                        echo "<li>".  anchor($sub->link,  '<i class="fa fa-list"></i><span> ' .$sub->nama_menu)."</span></li>";
                                    }   

                                }
                                echo"</ul>
                                </li>";
                            } 
                             else
                                    {
                                        echo "<li>".  anchor($m->link,  '<i class="fa fa-list"></i><span> '.strtoupper($main->jabatan))."</span></li>";
                                    }   

                            }
                        }
                        
                        ?>
      </ul> -->
   <!--   <div class="panel-body">
                <div class="table-responsive">
                  <table class="table table-bordered table-striped table-condensed mb-none" id="mydata">
                    <thead>
                      <tr>
                        <th rowspan="3">No</th>
                        <th rowspan="3">Nim</th>
                        <th rowspan="3">Nama Mahasiswa</th>
                        <th rowspan="3">prodi</th>
                       
                      </tr>
                      <tr>
                         <td colspan="2">Semester 1</td>
                        <td colspan="2">Semester 2</td>
                        <td colspan="2">Semester 3</td>
                        <td colspan="2">Semester 4</td>
                        <td colspan="2">Semester 5</td>
                        <td colspan="2">Semester 6</td>
                        <td colspan="2">Semester 7</td>
                        <td colspan="2">Semester 8</td>
                      </tr>
                      <tr>
                        <td>tgl Pengajuan</td>
                        <td>status</td>
                         <td>tgl Pengajuan</td>
                        <td>status</td>
                        <td>tgl Pengajuan</td>
                        <td>status</td>
                        <td>tgl Pengajuan</td>
                        <td>status</td>
                        <td>tgl Pengajuan</td>
                        <td>status</td>
                        <td>tgl Pengajuan</td>
                        <td>status</td>
                        <td>tgl Pengajuan</td>
                        <td>status</td>
                        <td>tgl Pengajuan</td>
                        <td>status</td>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        
                      </tr>
                    
                    </tbody>
                  </table>
                </div>
              </div>

<script src="<?php echo base_url();?>assets/vendor/jquery/jquery.js"></script> 
<script type="text/javascript">
  $(document).ready(function() {
    $('#mydata').DataTable({

        "ajax": {

            url : "<?php echo base_url('index.php/r_utama/contoh_ajax')?>",

            type : 'GET'

        },

    });
    
});
</script> -->

 <div class="modal fade" id="ModalaP" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog" style="width: 75%">
            <div class="modal-content" >
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Pengumuman</h3>
            </div>
            <form class="form-horizontal" >
                <div class="modal-body" id="pdf">

                    
                   
                </div>

                <div class="modal-footer">
                  <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                   
          
                </div>
            </form>
            </div>
            </div>
        </div>
<center><img src="<?php echo base_url('assets/img/POLKAM.png')?>" width="700px"></center>
<script src="<?php echo base_url();?>assets/vendor/jquery/jquery.js"></script>
<script type="text/javascript">
       $(document).ready(function () {
    $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/welcome/tampil_pengumuman')?>",
                dataType : "JSON",
               
                success: function(data){
                 if (data.status == "2") {
                  var id=data.pengumuman;
                  var dat=data.id;
                  var jdl=data.jdl;
                  for (var i =0; i < id; i++) {
                 notify_info( jdl[i]+'<button onclick="lihat('+dat[i]+');" class="btn btn-info">Clik untuk lihat</button>');
                  }
                
        
           
                 
                      
           
           }else{
             $('#ModalaP').modal('hide');
           }
                        
                
                }
            });
  
          });
    //       </script>