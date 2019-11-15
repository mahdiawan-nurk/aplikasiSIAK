<div class="row">
<div class="panel-body">
										<div class="table-responsive">
											<table class="table table-bordered table-striped mb-none dt-responsive nowrap">
											
													<tr>
														<th>#</th>
														<th>Tgl Peminjaman</th>
														<th>Matakuliah</th>
														<th>dosen Pembimbing</th>
														<th>Actions</th>
													</tr>
												<?php $no=1; foreach ($data_peminjam as $d): ?>
                                  <tr class="la expand">
                                  <td><?=$no?></td>
                                  <td><?=$d->tgl_peminjaman?></td>
                                  <td><?=$d->nama_makul?></td>
                                  <td><?=$d->nama_dsn?></td>
                                  <td><button class="look btn-primary btn-sm ">Lihat</button></td>
                                </tr>
                                 <tr>
              <td colspan="5">
                <table class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Alat</th>
                      <th>Spesifikiasi Alat</th>
                      <th>Jumlah</th>
                      <th>Kondisi Awal</th>
                      <th>Tanggal Kembali</th>
                      <th>Kondisi Akhir</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $n=1; $barang_peminjam=$this->db->query("SELECT * FROM app_peminjaman_barang a INNER JOIN app_aset_prodi b ON a.kode_barang=b.kode_barang WHERE a.id_peminjam='".$d->id_peminjam."' ")->result();
                    foreach ($barang_peminjam as $b): ?>
                      <tr>
                      <td><?=$n?></td>
                      <td><?=$b->nama_barang?></td>
                      <td><?=$b->spesifikasi_barang?></td>
                      <td><?=$b->jumlah?></td>
                      <td><?=$b->kondisi_awal?></td>
                      <?php if ($b->tgl_kembali=="0000-00-00"): ?>
                        <td>Belum Di Kembalikan</td>
                      <?php endif ?>
                       <?php if ($b->tgl_kembali!="0000-00-00"): ?>
                         <td><?=$b->tgl_kembali?></td>
                      <?php endif ?>
                     
                      <td><?=$b->kondisi_akhir?></td>
                    </tr>
                    <?php $n++; endforeach ?>
                    
                    
                  </tbody>
                </table>
              </td>
            </tr>
                        <?php $no++; endforeach ?>
									
										
												
											</table>
										</div>
									</div>
                  </div>

<script src="<?php echo base_url();?>assets/vendor/jquery/jquery.js"></script> 
  <script type="text/javascript">
      $( document ).ready(function() { 
  
  $('.la').click(function(){
       $(this).toggleClass('expand').nextUntil('tr.la').slideToggle(100);
  });
$('.la').click();
  
});
    </script>