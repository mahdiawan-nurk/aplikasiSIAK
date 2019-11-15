<div class="col-md-12 col-lg-12 col-xl-4">

								<div class="row">

<?php foreach ($data as $prodi) {
?>									
									<div class="col-md-6 col-lg-6 col-xl-3">
								<section class="panel panel-featured-bottom panel-featured-primary">
									<div class="panel-body">
										<div class="widget-summary">
											<div class="widget-summary-col widget-summary-col-icon">
												<div class="summary-icon bg-primary">
													<i class="fa fa-users"></i>
												</div>
											</div>
											<div class="widget-summary-col">
												<div class="summary">
													<h4 class="title"><?=$prodi->nama_prodi?></h4>
													<div class="info">
														<strong class="amount"><?=$prodi->prodi?></strong>
														<span class="text-primary">Mahasiswa</span>
													</div>
													
												</div>
											</div>
										</div>
									</div>
								</section>
							</div>
						
<?php }?>
</div>



<div class="col-lg-12">
								
								<div class="row">
									
										<section class="panel">
											<header class="panel-heading">
												<div class="panel-actions">
													<a href="#" class="fa fa-caret-down"></a>
													<a href="#" class="fa fa-times"></a>
												</div>
						
												<h2 class="panel-title">Chart Registrasi<?=$jabatam?></h2>
												
											</header>
											<div class="panel-body">
												<div class="row text-center">
													<div class="col-md-4">
														<div class="circular-bar">
														<h3>Belum Mengajukan <span id=""></span> </h3>
															<div class="circular-bar-chart" data-percent="" data-plugin-options='{ "barColor": "#FF0000", "delay": 300 }' id="chart1">
																
																<label><span class="percent"></span>%</label>
															</div>
														</div>
													</div>
													<div class="col-md-4">
														<div class="circular-bar">
															<h3>Telah Mengajukan</h3>
															<div class="circular-bar-chart" data-percent="" data-plugin-options='{ "barColor": "#33CCFF", "delay": 300 }' id="chart2">
																
																<label><span class="percent">60</span>%</label>
															</div>
														</div>
													</div>
													<div class="col-md-4">
														<div class="circular-bar">
															<h3>Terdaftar</h3>
															<div class="circular-bar-chart" data-percent="60" data-plugin-options='{ "barColor": "#00CC00", "delay": 700 }' id="chart3">
																
																<label><span class="percent"></span>%</label>
															</div>
														</div>
													</div>
												</div>
											</div>
										</section>
									</div>
								
							</div>








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
	chart();
	function chart() {
		$.ajax({
                type : "POST",
                url  : "<?php echo base_url('c_chart/chart1')?>",
                dataType : "JSON",
                // data : {nim:nim,thun_a:thun_a,status:status},
                        success: function(data){
                        	var chr=data.data_mhs;
                        	var chr1=data.data_pengajuan;
                        	var hsl=chr-chr1;
                        	var chr2=data.data_terdaftar;
                       $('#chart1').attr('data-percent',hsl)
                       $('#chart2').attr('data-percent',chr1)
                       $('#chart3').attr('data-percent',chr2)
                
                    }
                });
	}
 

	setInterval(function(){ 
    chart();; 
  }, 5000);
  </script>