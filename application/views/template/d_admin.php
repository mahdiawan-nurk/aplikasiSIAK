<!doctype html>
<html class="fixed sidebar-left-collapsed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<title>Sistem Informasi Akademik</title>
		<meta name="keywords" content="HTML5 Admin Template" />
		<meta name="description" content="JSOFT Admin - Responsive HTML5 Template">
		<meta name="author" content="JSOFT.net">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/bootstrap-datepicker/css/datepicker3.css" />

		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/morris/morris.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/select2/select2.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/animate.min.css">

 		<link rel="stylesheet" href="<?php echo base_url();?>assets/coundown/css/vegas.min.css">
     <link rel="stylesheet" href="<?php echo base_url();?>assets/coundown/css/font-awesome.min.css">

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="<?php echo base_url();?>assets/coundown/css/templatemo-style.css">

		<!-- Theme CSS -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/stylesheets/theme.css" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/stylesheets/skins/default.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/stylesheets/theme-custom.css">
		<link href="<?php echo base_url();?>assets/css/demo.css" rel="stylesheet">
		<link href="<?php echo base_url();?>assets/css/buttons.css" rel="stylesheet">
		<!-- <link rel="stylesheet" href="<?php echo base_url();?>assets/css/custom-button.min.css"> -->

		<!-- Head Libs -->
		<script src="<?php echo base_url();?>assets/vendor/jquery/jquery.js"></script> 
		<script src="<?php echo base_url();?>assets/vendor/modernizr/modernizr.js"></script>
		<!-- <script src="<?php echo base_url();?>assets/datatables/dataTables.bootstrap.css"></script> -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/pnotify/pnotify.custom.css" />
		<!-- <link rel="stylesheet" href="<?php echo base_url();?>assets/datatables/dataTables.bootstrap.css" /> -->

		    <style type="text/css">
    .preloader {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: 9999;
      background-color: #fff;
    }
    .preloader .loading {
      position: absolute;
      left: 50%;
      top: 50%;
      transform: translate(-50%,-50%);
      font: 14px arial;
    }
    </style><script>
   $(window).load(function() {
    $(".preloader").fadeOut("slow");
});
    </script>
	</head>
		<body onload="timer()">

			 <div class="preloader">
      <div class="loading">
       <!--  <div><img src="" width="500px" class="animated infinite zoomIn" ></div> -->
        <div><img src="<?php echo base_url('assets/preloader/loder.gif')?>" width="90"></div>
        
        <label>Harap Tunggu</label>
      </div>
    </div>

		<section class="body">

			<!-- start: header -->
			<header class="header">
				<div class="logo-container">
					<a href="../" class="logo" style="height: 10px">
						<img src="<?php echo base_url();?>assets/img/logo.png" width="180px" alt="Porto Admin" />
					</a>
					<div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
						<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
					</div>
				</div>
			
				<!-- start: search & user box -->
				<div class="header-right">
			
					<form action="pages-search-results.html" class="search nav-form">
						<div class="input-group input-search">
							<input type="text" class="form-control" name="q" id="q" placeholder="Search...">
							<span class="input-group-btn">
								<button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
							</span>
						</div>
					</form>
			
					<span class="separator"></span>
			
					<ul class="notifications">
						<!-- -->
						<!--  -->
						<li>
							<a href="#" class="sidebar-right-toggle notification-icon look" data-open="sidebar-right" onclick="notif();">
								<i class="fa fa-bell"></i>
								<div class="badge count" id="noot">0</div>
							</a>
			
								
						</li>

						<!--  -->
						<li>
							<a href="#" class="sidebar-right-toggle notification-icon look" data-open="sidebar-right" onclick="pengumuman()">
								<i class="fa fa-info"></i>

							</a>
						</li>
					</ul>
			
					<span class="separator"></span>
			
					<div id="userbox" class="userbox">
						<a href="#" data-toggle="dropdown">
							<figure class="profile-picture">
								<img src="<?php echo base_url();?>assets/images/default.png" alt="Joseph Doe" class="img-circle" data-lock-picture="assets/images/!logged-user.jpg" />
							</figure>
							<div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@okler.com">
								<span class="name"><?php echo $this->session->userdata('nama'); ?></span>
								<span class="role">administrator</span>
							</div>
			
							<i class="fa custom-caret"></i>
						</a>
			
						<div class="dropdown-menu">
							<ul class="list-unstyled">
								<li class="divider"></li>
								<li>
									<a role="menuitem" tabindex="-1" href="pages-user-profile.html"><i class="fa fa-user"></i> My Profile</a>
								</li>
								<li>
									<a role="menuitem" tabindex="-1" href="#" data-lock-screen="true"><i class="fa fa-lock"></i> Lock Screen</a>
								</li>
								<li>
									<a role="menuitem" tabindex="-1" href="<?php echo base_url()?>index.php/secure/logout"><i class="fa fa-power-off"></i> Logout</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- end: search & user box -->
			</header>
			<!-- end: header -->

			<div class="inner-wrapper">
				<!-- start: sidebar -->
				<aside id="sidebar-left" class="sidebar-left">
				
					<div class="sidebar-header">
						<div class="sidebar-title">
							Navigation
						</div>
						<div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
							<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
						</div>
					</div>
				
					<div class="nano">
						<div class="nano-content">
							<nav id="menu" class="nav-main" role="navigation">
								
<ul class="nav nav-main">
              

<?php
                        $level=$this->session->userdata('id_users');
                        
                        $akses =$this->db->query("SELECT *FROM tr_akses WHERE email='".$level."' ")->result();
                        foreach ($akses as $key) {
                         $main_menu = $this->db->query("SELECT * FROM jabatan Where id_jabatan='$key->id_jabatan'");
                        foreach ($main_menu->result() as $main) {
                            $sub_menu = $this->db->query("SELECT * FROM hak_akses,tbl_menu Where hak_akses.id_jabatan='$key->id_jabatan' AND tbl_menu.id_menu=hak_akses.id_menu AND tbl_menu.main_menu='0'");
                            foreach ($sub_menu->result() as $ma ) {
                            $sub_menu_tree = $this->db->query("SELECT * FROM hak_akses,tbl_menu Where hak_akses.id_jabatan='$key->id_jabatan' AND tbl_menu.id_menu=hak_akses.id_menu AND tbl_menu.main_menu='$ma->id_menu' ORDER BY nama_menu ASC");
                             if($sub_menu_tree->num_rows()>0)
                                    {
                                        //looping
                                        echo "<li class='nav-parent'>
                                    <a href='#' >
                                     <i class='".$ma->icon."'></i> <span>".  strtoupper($ma->nama_menu)."</span></a>
                                    <ul class='nav nav-children'>";
                                        foreach ($sub_menu_tree->result() as $s)
                                        {
                                            echo "<li>".  anchor($s->link,  '<i class="'.$s->icon.'"></i> '.strtoupper($s->nama_menu))."</li>";
                                        }
                                    echo"</ul>
                                </li>";
                                        // end looping
                                    }
                                    else
                                    {
                                        echo "<li>".  anchor($ma->link,  '<i class="'.$ma->icon.'"></i><span>'.strtoupper($ma->nama_menu))."</spam></li>";
                                    }
                                }
                            
                            }
                        
                        }

                            
                        
                        ?>
   
                                </ul>
							</nav>
				
							
						</div>
				
					</div>
				
				</aside>
				<!-- end: sidebar -->

				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Dashboard</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Dashboard</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>	

					<!-- start: page -->
						<?php $this->load->view($p); ?>
					<!-- end: page -->
				</section>
			</div>

			<aside id="sidebar-right" class="sidebar-right">
				<div class="nano">
					<div class="nano-content">
						<a href="#" class="mobile-close visible-xs">
							Collapse <i class="fa fa-chevron-right"></i>
						</a>
			
						<div class="sidebar-right-wrapper">
			
							<div class="sidebar-widget widget-calendar">
								<span id="txt"></span>
								
							
							</div>
			
							<div class="sidebar-widget widget-friends">
							
								<ul>
									<div id="list"></div>
									
									
								</ul>
							</div>
			
						</div>
					</div>
				</div>
			</aside>


		</section>

		<!-- Vendor -->
		<script src="<?php echo base_url();?>assets/vendor/jquery/jquery.js"></script>
		<script src="<?php echo base_url();?>assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="<?php echo base_url();?>assets/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="<?php echo base_url();?>assets/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="<?php echo base_url();?>assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="<?php echo base_url();?>assets/vendor/magnific-popup/magnific-popup.js"></script>
		<script src="<?php echo base_url();?>assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
		
		<!-- Specific Page Vendor -->
		<script src="<?php echo base_url();?>assets/vendor/jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>
		<script src="<?php echo base_url();?>assets/vendor/jquery-ui-touch-punch/jquery.ui.touch-punch.js"></script>
		<script src="<?php echo base_url();?>assets/vendor/jquery-appear/jquery.appear.js"></script>
		<script src="<?php echo base_url();?>assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>
		<script src="<?php echo base_url();?>assets/vendor/jquery-easypiechart/jquery.easypiechart.js"></script>
		<script src="<?php echo base_url();?>assets/vendor/flot/jquery.flot.js"></script>
		<script src="<?php echo base_url();?>assets/vendor/flot-tooltip/jquery.flot.tooltip.js"></script>
		<script src="<?php echo base_url();?>assets/vendor/flot/jquery.flot.pie.js"></script>
		<script src="<?php echo base_url();?>assets/vendor/flot/jquery.flot.categories.js"></script>
		<script src="<?php echo base_url();?>assets/vendor/flot/jquery.flot.resize.js"></script>
		<script src="<?php echo base_url();?>assets/vendor/jquery-sparkline/jquery.sparkline.js"></script>
		<script src="<?php echo base_url();?>assets/vendor/raphael/raphael.js"></script>
		<script src="<?php echo base_url();?>assets/vendor/morris/morris.js"></script>
		<script src="<?php echo base_url();?>assets/vendor/gauge/gauge.js"></script>
		<script src="<?php echo base_url();?>assets/vendor/snap-svg/snap.svg.js"></script>
		<script src="<?php echo base_url();?>assets/vendor/liquid-meter/liquid.meter.js"></script>

		<script src="<?php echo base_url();?>assets/vendor/select2/select2.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="<?php echo base_url();?>assets/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="<?php echo base_url();?>assets/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="<?php echo base_url();?>assets/javascripts/theme.init.js"></script>


		<!-- Examples -->
		<script src="<?php echo base_url();?>assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
		<!-- <script src="<?php echo base_url();?>assets/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js"></script> -->
		<script src="<?php echo base_url();?>assets/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>

		<!-- <script src="<?php echo base_url();?>assets/datatables/jquery.dataTables.min.js"></script>
		<script src="<?php echo base_url();?>assets/datatables/jquery.dataTables.bootstrap.min.js"></script> -->
		<script src="<?php echo base_url();?>assets/vendor/pnotify/pnotify.custom.js"></script>
		<script src="<?php echo base_url();?>assets/javascripts/theme.js"></script>
		<!-- <script src="<?php echo base_url();?>assets/javascripts/theme.custom.js"></script> -->
		<script src="<?php echo base_url();?>assets/app/mhs.js"></script> 
		<!-- <script src="<?php echo base_url();?>assets/javascripts/ui-elements/examples.modals.js"></script> -->

		<script src="<?php echo base_url();?>assets/ckeditor/ckeditor.js"></script>
        <script src="<?php echo base_url();?>assets/ckeditor/config.js"></script>
        <script src="<?php echo base_url();?>assets/ckeditor/adapters/jquery.js"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/date/css/jquery.datetimepicker.min.css"/>
	<script src="<?php echo base_url();?>assets/date/js/jquery.datetimepicker.js"></script>
	<script src="<?php echo base_url();?>assets/vendor/jquery-validation/jquery.validate.js"></script>
<script src="<?php echo base_url();?>assets/vendor/bootstrap-wizard/jquery.bootstrap.wizard.js"></script>
	<script src="<?php echo base_url();?>assets/javascripts/forms/examples.wizard.js"></script>
	<script src="<?php echo base_url();?>assets/js/autoNumeric.js"></script>
	<!--  -->




		<script type="text/javascript">
		count();
			function reset(id_notif) {
				var id=id_notif;
				$.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/k_notif/update_notif')?>",
                 data : {id:id},
                dataType : "JSON",
                success: function(data){             
             	if (data.status==true) {
             		count();
             		notif();
             	}
               
                }
            });
			}
			function count() {
				$.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/k_notif/list_notif')?>",
                dataType : "JSON",
                success: function(data){             
             	if (data.jml==true) {
             		 $('#noot').html('new');
             	}else{
             		 $('#noot').html('0');
             	}
               
                }
            });
			}
			function notif(){
			$('#txt').html('<h6>Notification</h6>');
			 $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/k_notif/list_notif')?>",
                dataType : "JSON",
                success: function(data){             
                $('#list').html(data.notif);

                }
            });
			}

			function pengumuman(){
			$('#txt').html('<h6>Pengumuman</h6>');
			 $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/welcome/list_pengumuman')?>",
                dataType : "JSON",
                success: function(data){             
                $('#list').html(data.html);
                }
            });
			}
   setInterval(function(){ 
    count();; 
  }, 1000);
   
  function lihat($id){
  // window.open("<?php echo site_url()?>welcome/isi_pengumuman/"+$id,"_self");
  	
  	$("#pdf").html('<iframe src="<?php echo base_url();?>welcome/isi_pengumuman/'+$id+'" frameborder=true width="100%" height="730px"></iframe>');
  	$('#ModalaP').modal('show');
  	
  }
 
     
   var stack_bar_top = {"dir1": "down", "dir2": "right", "push": "top", "spacing1": 0, "spacing2": 0};
    function notify_success(pesan){
       new PNotify({
			title: 'Succes',
			text: pesan,
			type: 'success',
			addclass: 'stack-bar-top',
			stack: stack_bar_top,
			width: "100%",
			 history: false,
        	delay:2000
		});
    }
        
        function notify_info(pesan){
      new PNotify({
        title: 'Informasi',
        text: pesan,
        type: 'info',
        history: true,
        delay:9000
      });
    }
    
    function notify_error(pesan){
       new PNotify({
			title: 'Gagal',
			text: pesan,
			type: 'error',
			addclass: 'stack-bar-top',
			stack: stack_bar_top,
			width: "100%",
			 history: false,
        delay:2000
		});
    } 

     
  </script>

	</body>
</html>