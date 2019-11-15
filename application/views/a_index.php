<div class="row" id="forprodi">
<div class="col-md-6 col-xl-12">
										<section class="panel">
											<div class="panel-body bg-quartenary">
												<div class="widget-summary">
													<div class="widget-summary-col widget-summary-col-icon">
														<div class="summary-icon">
															<i class="fa fa-users"></i>
														</div>
													</div>
													<div class="widget-summary-col">
														<div class="summary">
															<h4 class="title" id="nama_prodi"></h4>
															<div class="info">
																<strong class="amount" id="jml_mhs"></strong>
																<strong class="text-uppercase">Mahasiswa</strong>
															</div>
														</div>
														<div class="summary-footer">
															
														</div>
													</div>
												</div>
											</div>
										</section>
									</div>
<div class="col-md-6 col-xl-12">
<section class="panel panel-featured-top panel-featured-primary">
									<div class="panel-body">
										<div class="widget-summary">
											<div class="widget-summary-col widget-summary-col-icon">
												<div class="summary-icon bg-primary">
													<i class="fa fa-users"></i>
												</div>
											</div>
											<div class="widget-summary-col">
												<div class="summary">
													<h4 class="title">Jumlah Rombel Prodi</h4>
													<div class="info">
														<strong class="amount" id="jml_rmb"></strong>
														<span class="text-primary">Rombel</span>
													</div>
												</div>
												<div class="summary-footer">
													<a class="text-muted text-uppercase">(view all)</a>
												</div>
											</div>
										</div>
									</div>
								</section>
							</div>

<div id="rombel0"></div>
<div id="rombel1"></div>
<div id="rombel2"></div>
<div id="rombel3"></div>
<div id="rombel4"></div>
<div id="rombel5"></div>
</div>
<div class="col-md-12 col-lg-12 col-xl-4">

								<div class="row" >

							<div id="tml0"></div>
							<div id="tml1"></div>
							<div id="tml2"></div>
							<div id="tml3"></div>
								

</div>

<div class="col-lg-12" id="charte">
								
								<div class="row">
									
										<section class="panel">
											<header class="panel-heading">
												<div class="panel-actions">
													<a href="#" class="fa fa-caret-down"></a>
													<a href="#" class="fa fa-times"></a>
												</div>
						
												<h2 class="panel-title">Chart Registrasi</h2>
												
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


<center id="logo"><img src="<?php echo base_url();?>assets/img/POLKAM.png" width="500px"></center>





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
	chart1();
	chart2();
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
                        	if (data.status==true) {
                        		$('#forprodi').hide();
                       $('#chart1').attr('data-percent',hsl)
                       $('#chart2').attr('data-percent',chr1)
                       $('#chart3').attr('data-percent',chr2)
                }else{
				$('#charte').hide();
				$('#logo').hide();
				$('#forprodi').hide();
                    }
                }
                });
		
	}
 
 function chart1(){
 	$.ajax({
                type : "POST",
                url  : "<?php echo base_url('c_chart/chart2')?>",
                dataType : "JSON",
                // data : {nim:nim,thun_a:thun_a,status:status},
                        success: function(data){
                        	var jml=data.jml_prodi;
                        	var prodi=data.prodi;
                        	var nama=data.nama;
                        	if (data.status==true) {
                        		$('#forprodi').hide();
                        		$('#logo').hide();
                        	 for (var i =0; i < jml; i++) {
                 				$('#tml'+i).html('<div class="col-md-6 col-lg-6 col-xl-3"><section class="panel panel-featured-bottom panel-featured-primary"><div class="panel-body"><div class="widget-summary"><div class="widget-summary-col widget-summary-col-icon"><div class="summary-icon bg-primary"><i class="fa fa-users"></i></div></div><div class="widget-summary-col"><div class="summary"><h4 class="title">'+nama[i]+'</h4><div class="info"><strong class="amount"> '+prodi[i]+'</strong><span class="text-primary">Mahasiswa</span></div></div></div></div></div></section></div>');
                 				 }
                        	
                        		   }
                        		   
                        		 
                        	
                  
                
                    }
                });
 }

 function chart2(){
 	$.ajax({
                type : "POST",
                url  : "<?php echo base_url('c_chart/chart3')?>",
                dataType : "JSON",
                // data : {nim:nim,thun_a:thun_a,status:status},
                        success: function(data){
                        	var nama_prodi=data.nama_prodi;
                        	var nama_rombel=data.nama_rombel;
                        	var jml_mhs=data.jml_mhs;
                        	var jml_rmb=data.jml_rmbl;
                        	var jml_rmb_mhs=data.jml_rombel_mhs;
                     
                        	if (data.status==true) {
                        		$('#forprodi').show();
                        		$('#logo').hide();
                        		$('#nama_prodi').text(nama_prodi);
                        		$('#jml_mhs').text(jml_mhs);
                        		$('#jml_rmb').text(jml_rmb);
                        		for (var i = 0; i <jml_rmb; i++) {
                        		$('#rombel'+i).html('<div class="col-md-6 col-lg-6 col-xl-3"><section class="panel panel-featured-bottom panel-featured-primary"><div class="panel-body"><div class="widget-summary"><div class="widget-summary-col widget-summary-col-icon"><div class="summary-icon bg-primary"><i class="fa fa-users"></i></div></div><div class="widget-summary-col"><div class="summary"><h4 class="title">'+nama_rombel[i]+'</h4><div class="info"><strong class="amount">'+jml_rmb_mhs[i]+' </strong><span class="text-primary">Mahasiswa</span></div></div></div></div></div></section></div>');
                        		}

						}else{
							$('#logo').hide();
						}
                    }
                });
 }


	// setInterval(function(){ 
 //    chart();; 
 //  }, 5000);
  </script>