
<div class="row">
	<div class="panel-body">
	

									<div class="col-xs-12">
	<?php $d=$data_mhs->row(); ?>
									<table>
		<tr>
			<td><label><b>Program Studi </b></label></td>
			<td><b>&emsp;:&nbsp;<?=$d->prodi?></b></td>
		</tr>
		<tr>
			<td><label> <b>Semester </b></label></td>
			<td><b>&emsp;:&nbsp;<?=$d->semester?></b></td>
		</tr>
	</table>
	<br>	
                                        
                                     <div class="table-responsive">
									<table class="table table-bordered table-striped table-condensed mb-none">
											<thead >
												<tr style="background-color:red;color: black; ">
													
													<th class="detail-col">NO</th>
													<th>NIM</th>
													<th>Nama</th>
                                                   
													<th class="hidden-480">Gender</th>

													<th>
														Agama
													</th>
													<th class="hidden-480">E-mail</th>

													
												</tr>
											</thead>

											<tbody id="show_data">
                                                <?php $no=0; foreach ($data_mhs->result() as $key) {$no++;?>
												<tr>
													<td><?=$no;?></td>
													<td><?=$key->nim;?></td>
													<td><?=$key->nama_mhs;?></td>
													
                                                    <?php if ($key->gender=='P') {
                                                     ?><td>Perempuan</td>
                                                     <?php }else{?>
													<td>Laki-laki</td>
                                                    <?php }?>
                                                    <td><?=$key->agama;?></td>
                                                    <td><?=$key->email;?></td>

												</tr>
                                                    <?php }?>

												

											</tbody>
										</table>
									</div>
                                    </div>
									</div><!-- /.span -->
								</div><!-- /.row -->



							
<!-- <script src="<?php echo base_url();?>assets/js/jquery-2.1.4.min.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#mydata').DataTable( {
        "processing": true,
        "serverSide": false,
        
       
    } );
} );
</script> -->