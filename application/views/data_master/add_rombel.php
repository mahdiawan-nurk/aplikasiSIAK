<div class="row panel-body">

<div class="col-md-6 col-xl-12" >
<section class="panel">
                      <div class="panel-body bg-quartenary">
                        <div class="widget-summary">
                          <div class="widget-summary-col widget-summary-col-icon">
                            <div class="summary-icon">
                              <i class="fa fa-users"></i>
                            </div>
                          </div>
                          <div class="widget-summary-col">
                            <div class="col-xl-12" >
                              
                              <table>
                                <tr><td><h4 class="title">Rombel &nbsp;</h4></td><td>&nbsp;<input name="nama" id="nama" class="form-control" type="text" required></td></tr>
                                <tr><td><h4 class="title">Angkatan&nbsp; </h4></td><td>&nbsp;<?php echo form_dropdown('angkatan', $angkatan, $d['id_angkatan'], 'class="form-control" id="angkatan" required'); ?></td></tr>
                                <tr><td><h4 class="title">Prodi&nbsp; </h4></td><td>&nbsp;<input name="nama" id="nama" class="form-control" type="hidden" value="<?=$prodi->id_prodi?>" disabled><input name="id_prodi" id="id_prodi" class="form-control" type="text" value="<?=$prodi->nama_prodi?>" disabled></td></tr>
                                <tr><td><h4 class="title">Dosen Wali&nbsp; </h4></td><td>&nbsp;<?php echo form_dropdown('dosen', $dosen, $d['nrp'], 'class="form-control" id="dosen" required'); ?></td></tr>
                              </table>
                            </div>
                            <div class="summary-footer">
                           <button type="button" class="mb-xs mt-xs mr-xs btn btn-sm btn-primary" id="btn-add"><i class="fa fa-floppy-o "></i> Simpan</button>
                            
                          </div>
                        

                          </div>
                        </div>
                      </div>
                    </section>
										
									</div>
									<div class="col-md-6 col-lg-6 col-xl-3">
								     
										<div class="table-responsive">

                                                        <div>
                                                            <label for="form-field-9">semester</label>

                                                            <?php echo form_dropdown('semester', $semester, $d['id'], 'class="form-control" id="semester" required'); ?>
                                                        </div>
                      <form>

											<table class="table table-striped mb-none" id="datatable-default">
												<thead>
													<tr>
													
														<th>NiM</th>
														<th>Nama</th>
														<th>Semester</th>
														<th></th>
													</tr>
												</thead>
												<tbody id="show_data">
													<tr>
														<td>1</td>
														<td>Mark</td>
														<td>Otto</td>
														<td>@mdo</td>
													</tr>
													
												</tbody>
											</table>
                      <div class="summary-footer">
                           <button type="button" class="mb-xs mt-xs mr-xs btn btn-sm btn-primary" id="btn-add"><i class="fa fa-floppy-o "></i> Simpan</button>
                            
                          </div>
                      </form>
										</div>
							</div>
								</div>
<script src="<?php echo base_url();?>assets/vendor/jquery/jquery.js"></script> 
<script type="text/javascript">
	var table;
 $(document).ready(function() {

//datatables
        table = $('#datatable-default').DataTable({
                  "scrollY":        "350px",
                  "scrollX":        "350px",
                  "scrollCollapse": false,
                  "paging":         false,
                  "searching":false,
                "order": [], 
                  "sAjaxSource": "<?php echo site_url('index.php/b_rombel/data_mhs')?>",
                  // "autoWidth": false,
                  "fnServerParams": function ( aoData ) {
                    aoData.push( { "name": "semester", "value": $('#semester').val()} );
                    
                  }
         });      

$("#semester").change(function(){
          table.ajax.reload();
  });

 
 $('#btn-add').on('click',function(){
          var rombel=$('#nama').val();
          alert(rombel);
         
        });
$('#show_data').on('click','#radioExample1',function(){
   var id_rom=$('#radioExample1').attr('data');
   var nim=$('#radioExample1').attr('data-nim');
           alert(nim);
        });
});
  </script>