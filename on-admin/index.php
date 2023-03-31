<?php
session_start();
include ('conn/koneksi.php');
include ('conn/fungsi.php');
?>
<!DOCTYPE html>
<html>
<head>   
<script src="bundle/jquery-1.3.2.min.js"></script>
<script>
$(document).ready(function() {
$("#responsecontainer").load("response.php");
var refreshId = setInterval(function() {
$("#responsecontainer").load('response.php?randval='+ Math.random());
}, 60000);
});
</script>
    <meta charset="utf-8">
    <title>USPBK</title>
	<link href="../js/sweetalert.css" rel="stylesheet" type="text/css"/>
	<script src="../aset/plugins/ckeditor/ckeditor.js"></script>
	<script>
	    CKEDITOR.env.isCompatible = true;
	</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

	<?php
		include "bundle/index_css.php";
	?>
	<style>
	    #blink {
	        animation: blink 2s ease-in infinite;
	    }

@keyframes blink {
  from, to { opacity: 1 }
  50% { opacity: 0 }
}
#mburi {
    z-index:3;
}
#mburidewe {
    z-index:1;
}
#ngarep {
    z-index:4;
}
#garis {
    padding:0;
    padding-left:10px;
    padding-right:20px;
}
#ngarep:hover {color:black;}
.alert-success {
	border-radius:0;
	font-size:12px;	
	position: fixed;
	right: 5px;
	top: 4.5em;
	z-index:999999999999999;
	}
	</style>
  </head>
<?php
include "tema/tema.php";
?>
    <div class="wrapper">
      <?php
        include "navbar/content_header.php";  
      ?>
      <aside class="main-sidebar">
      <section class="sidebar">
	  <?php
        include "navbar/userpanel.php";  
      ?>
      		<ul class="sidebar-menu" data-widget="tree">
      			<li class="header">MAIN MENU</li>
				<li class="active"><a href="index.php"><i class="fa fa-tachometer"></i><span> Dashboard</span></a></li>
				<li><a href="siswa.php"><i class="fa fa-graduation-cap"></i><span> Management Siswa</span></a></li>

				<li class="treeview">
                  <a href="#">
                    <i class="fa fa-book"></i>
                    <span> Management Ujian</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                  </a>
                  <ul class="treeview-menu">
                            <li><a href="soal.php"><i class="fa fa-book"></i> Bank Soal</a></li>
    						<li><a href="kartuujian.php"><i class="fa fa-print"></i><span> Kartu Peserta</span></a></li>
    						<li><a href="daftarhadir.php"><i class="fa fa-print"></i><span> Daftar Hadir</span></a></li>
    						<li><a href="beritaacara.php"><i class="fa fa-print"></i><span> Berita Acara</span></a></li>
    						<li><a href="up-gbrsoal.php"><i class="fa fa-upload"></i><span> Upload Gbr / Audio Soal</span></a></li>
                  </ul>
                </li>
                
			    <li><a href="hasiltest.php"><i class="fa fa-area-chart"></i><span> Hasil Test</span></a></li>
				<li><a href="monitor.php"><i class="fa fa-laptop"></i><span> Monitoring Ujian</span></a></li>						
				<li><a href="laporan.php"><i class="fa fa-upload"></i><span> Laporan</span></a></li>	
            </ul>
				
				
		</section>
        <!-- /.sidebar -->
		</aside>
		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <?php  
        include	"navbar/content_footer.php";
      ?>
					<section id="mburidewe" class="content-header">
					    <h4><i class="fa fa-tachometer"></i> Dashboard</h4>
								        <ol class="breadcrumb">
								        <li><a href="#"> Home</a></li>
									    <li><i class="fa fa-home"></i> Dashboard </li>
                                    </ol>
                                    <?php 
                    if (!empty($_GET['token'])) { 
                    echo "
                        <div class='col-lg-3 col-md-4 alert alert-success alert-dismissible fade-in'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <i class='icon fa fa-check'></i> sukses !!! token update.
                        </div>
                        "; 
                        }
                     ?>
							        <br> 
							         
                                    <div class='col-md-9'>
                                     

                                        <!-- Statistik kartu -->
                                       <div class='col-lg-12 col-md-12 col-xs-12'>
                                          <!-- small box -->
                                          <div id="ngarep" class='small-box bg-default'>
                                            <div class='inner'>
											<?php
													$query = mysqli_query($konek, "SELECT * FROM token WHERE username ='$nama' ORDER BY id DESC LIMIT 1;");
													$data = mysqli_fetch_array($query);
													
													// Cek apakah data berhasil diambil dari database
													if ($data) {
														// Jika data ditemukan, tampilkan informasi yang diperlukan
														echo "Token terakhir untuk username $nama adalah: " . $data['token'];
													} else {
														// Jika data tidak ditemukan, berikan pesan error
														echo "Tidak ada data yang ditemukan untuk username $nama";
													}
													?>

												<p>tgl/waktu terakhir token dibuat:<?php echo $data['waktu'] ?></p>
												<input type="hidden" id="waktu" value="<?php echo $data['waktu'] ?>">
                                            <script>
												$(document).ready(function(){
													// Tanggal dan waktu awal (diisi sesuai kebutuhan)
													var startDateTime = document.getElementById('waktu').value;
													let addTime = 2; // waktu yang ingin ditambahkan dalam menit

													let newDateTime = new Date(Date.parse(startDateTime) + addTime * 60000).toISOString().slice(0, 19).replace('T', ' ');
													console.log(newDateTime); // Output: "2023-03-20 20:32:51"


													// Konversi tanggal dan waktu awal ke dalam format timestamp
													var startTimeStamp = Date.parse(newDateTime)/1000;

													// Hitung tanggal dan waktu akhir (2 menit setelah tanggal dan waktu awal)
													var endDateTime = new Date(startDateTime);
													endDateTime.setMinutes(endDateTime.getMinutes()+2);

													// Konversi tanggal dan waktu akhir ke dalam format timestamp
													var endTimeStamp = endDateTime.getTime()/1000;

													// Hitung selisih waktu (dalam detik) antara tanggal dan waktu akhir dan sekarang
													var x = setInterval(function() {
														var now = new Date().getTime()/1000;
														var timeLeft = endTimeStamp - now;

														// Konversi selisih waktu menjadi menit dan detik
														var minutesLeft = Math.floor(timeLeft / 60);
														var secondsLeft = Math.floor(timeLeft % 60);

														// Update tampilan hitung mundur
														$('#countdown').html('Hitung mundur selama 2 menit dari ' + startDateTime + ':<br>' + minutesLeft + ' menit ' + secondsLeft + ' detik');
														document.getElementById("btnproses").style.display = 'none';
														
														// Hentikan hitung mundur jika waktu telah habis
														if (timeLeft < 0) {
															clearInterval(x);
															$('#countdown').html('Waktu habis token kedaluarsa');
														document.getElementById("btnproses").style.display = 'inline';
														}
													}, 1000);
												});
											</script>
											<div id="countdown"></div>
											<a href="update_token.php"><button type="submit" style="margin-left:-5px;padding:8px;" id="btnproses" class="btn btn-flat btn-success btn-sm"><i class="fa fa-refresh fa-spin"></i>&emsp; Buat Token</button></a>
	
												<input type="text" name=""  id="inputField" value="<?php 
												  $query = mysqli_query($konek, "SELECT * FROM token WHERE username ='$nama' ORDER BY id DESC LIMIT 1;");
												  $data = mysqli_fetch_array($query);
												  // Tampilkan data
												  echo $data['hasil_token'];
												?>">
                                                <!-- <input readonly style="font-weight: bold;letter-spacing: 3px;padding:8px;background:#222;color:white;border:#333 solid 0.5px;text-align: center;" type="text" value=" -->
												<!-- "/> -->
												<button onclick="copyInput()">Salin</button>
												<script>
												function copyInput() {
													// Dapatkan nilai dari input field
													const inputVal = document.getElementById("inputField").value;

													// Salin nilai ke clipboard
													navigator.clipboard.writeText(inputVal).then(() => {
													console.log("Berhasil menyalin nilai ke clipboard: " + inputVal);
													alert("Berhasil menyalin nilai ke clipboard: " + inputVal);
													}, () => {
													console.log("Gagal menyalin nilai ke clipboard.");
													alert("Gagal menyalin nilai ke clipboard.");
													});
												}
												</script>

                                                <!-- <a href="clear_token.php"><button type="submit" style="margin-left:-5px;padding:8px;" class="btn btn-flat btn-default btn-sm"><i class="fa fa-trash"></i></button></a> -->
                                                        <h1><b>V.5 <!-- <?php include ('versi/aktif/versi.txt'); ?> --> </b></h1>
                                                   <p>USBK | <a href='update.php'><button class="btn btn-flat bg-navy btn-xs"><i class="fa fa-history"></i> check update</button></a> 
                                                   <a href='patching.php'><button class="btn btn-flat bg-navy btn-xs"><i class="fa fa-history"></i> check patching</button></a>
                                                   <a href='https://smkpgri1jombang.sch.id/' target="blank"><button class="btn btn-flat bg-orange btn-xs"><i class="fa fa-globe"></i> visit website</button></a></p>
                                       
                                            </div>
                                                <div class='icon'>
                                                  <i class="fa fa-history"></i>
                                                </div>
                                          </div>
                                        </div>

										 
                                        
                                       <div class='col-lg-3 col-md-6 col-xs-6'>
                                          <!-- small box -->
                                          <div id="ngarep" class='small-box bg-aqua'>
                                            <div class='inner'>
                                                        <?php
                                						$result = mysqli_query($konek, "SELECT * FROM ujian WHERE aktif='1'");
                                						$num_rows = mysqli_num_rows($result);
                                						if ($num_rows > 0)
                                						{
                                						$soal=mysqli_num_rows($result);
                                						}
                                						else
                                						{
                                						$soal="0";    
                                						}
						                                ?>
                                                        <h1><b><?php echo $soal; ?></b></h1>
                                                        <?php  ?>
                                                      
										<p>Soal Aktif</p>
                                            </div>
                                                <div class='icon'>
                                                  <i class='fa fa-laptop'></i>
                                                </div>
                                                <a href='monitor.php' class='small-box-footer'>
                                                  Monitoring ujian <i class='fa fa-arrow-circle-right'></i>
                                                </a>
                                          </div>
                                        </div>
                                       
                                       
									   
                                       <!-- Statistik Siswa -->
                                       <div class='col-lg-3 col-md-6 col-xs-6'>
                                          <!-- small box -->
                                          <div id="ngarep" class='small-box bg-red'>
                                            <div class='inner'>
                                                         <?php
                                						$result = mysqli_query($konek, "SELECT * FROM siswa WHERE online='1'");
                                						$num_rows = mysqli_num_rows($result);
                                						if ($num_rows > 0)
                                						{
                                						$online=mysqli_num_rows($result);
                                						}
                                						else
                                						{
                                						$online="0";    
                                						}
                                						?>
                                                        <h1><b><?php echo $online; ?></b></h1>
                                                        <?php  ?>
                                                   <p>Online</p>
                                            </div>
                                                <div class='icon'>
                                                  <i class='fa fa-users'></i>
                                                </div>
                                                <a href='#' data-target="#Modalonline" data-toggle="modal" class='small-box-footer'>
                                                  Who's online <i class='fa fa-arrow-circle-right'></i>
                                                </a>
                                          </div>
                                        </div>
                                    
                                       <!-- Statistik Mapel -->
                                      <div class='col-lg-3 col-md-6 col-xs-6'>
                                          <!-- small box -->
                                          <div id="ngarep" class='small-box bg-orange'>
                                            <div class='inner'>
                                                        <?php
                                						$result = mysqli_query($konek,"SELECT * FROM ujian");
                                						$num_rows = mysqli_num_rows($result);
                                						if ($num_rows > 0)
                                						{
                                						$bank=mysqli_num_rows($result);
                                						}
                                						else
                                						{
                                						$bank="0";    
                                						}
                                						?>
                                                        <h1><b><?php echo $bank; ?></b></h1>
                                                        <?php  ?>
                                                   <p>Bank Soal</p>
                                            </div>
                                                <div class='icon'>
                                                  <i class='fa fa-book'></i>
                                                </div>
                                                <a href='soal.php' class='small-box-footer'>
                                                  Manage Soal <i class='fa fa-arrow-circle-right'></i>
                                                </a>
                                          </div>
                                        </div>
                                             
                                       <!-- Statistik kartu -->
                                       <div class='col-lg-3 col-md-6 col-xs-6'>
                                          <!-- small box -->
                                          <div id="ngarep" class='small-box bg-green'>
                                            <div class='inner'>
                                                      <?php
                                						$result = mysqli_query($konek, "SELECT * FROM nilaihasil");
                                						$num_rows = mysqli_num_rows($result);
                                						if ($num_rows > 0)
                                						{
                                						$hasil=mysqli_num_rows($result);
                                						}
                                						else
                                						{
                                						$hasil="0";    
                                						}
                                						?>
                                                        <h1><b><?php echo $hasil; ?></b></h1>
                                                        <?php  ?>
                                                   <p>Nilai Test</p>
                                            </div>
                                                <div class='icon'>
                                                  <i class='fa fa-area-chart'></i>
                                                </div>
                                                <a href='hasiltest.php' class='small-box-footer'>
                                                  Hasil Ujian <i class='fa fa-arrow-circle-right'></i>
                                                </a>
                                          </div>
                                        </div>
                                        
                                    </div>
                    <div class='col-md-3'>
                    <div class="box">
                        <div class="box-header with-border">
                            <h4 class="box-title" style="font-size:13px;background-color:#d2d6de;color:black;padding:15px;width:220%;margin-left:-40px;margin-right:0px;margin-top:-10px;">&emsp;<i class='fa fa-download' aria-hidden='true'></i>  Download Berkas</h4>
                        </div>
                    </div>
                        <?php 
                        $dir = "upload/";
                        chdir($dir);
                        array_multisort(array_map('filemtime', ($files = glob("*.{doc,docx,xlsx,xls,csv,xml,pdf,et,ppt,pptx,zip,rar,rtf,txt,sql,apk}", GLOB_BRACE))), SORT_DESC, $files);
                        foreach($files as $data)
                        {
                        $filesize = filesize($data);
                        $filesizeKB = round($filesize / 1024, 2);
                        $filesizeMB = round($filesize / 1024 / 1024, 2);
                        $tgl = date('d-m-Y',filemtime($data));
                        $jam = date('H:i',filemtime($data));
                        $tanda=explode(".",$data);
                        $file = $tanda[0];
                        $dok = $tanda[1];
                        	if($dok == "xls" OR $dok == "xlsx" OR  $dok == "csv" OR  $dok == "xml" OR  $dok == "et"){
                        	$co="red";
                        	} elseif ($dok == "doc" OR $dok == "docx" OR  $dok == "sql" OR  $dok == "csv" OR  $dok == "xml") {
                        	$co="aqua";
                        	} elseif ($dok == "pdf" OR $dok == "ppt" OR  $dok == "pptx") {
                        	$co="yellow";
                        	}  elseif ($dok == "rar" OR $dok == "zip" ) {
                        	$co="green";
                        	} else {
                        	$co="#111";
                        	}
                        echo "
                                        <div class='row'>
                                            <h6><a href='".upload."/".$data."' target='new_tab'><i class='fa fa-file-zip-o' aria-hidden='true'></i> ".$data."</a>
                                          </div>
                        ";
                        echo "</tr>";
                        }
                        ?>

                </div>
					</section>
					<section class="content-header">
                	<div class="row">
                        <div class="col-xs-12">
                            <div class="col-xs-12">
                              <h4>Preview Ujian Aktif</h4>
                                <?php include ('response.php'); ?>
                                </div>
                        </div>
                      </div>
                    </section>
                    <br><br><br><br><br>
      </div><!-- ./wrapper -->	
	</section>
		<!-- Modal Popup untuk delete--> 
		<div class="modal" id="modal_delete">
			<div class="modal-dialog">
				<div class="modal-content" style="margin-top:100px;">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" style="text-align:center;">yakin menghapus pengumuman ini ?</h4>
					</div>    
					<div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
						<a href="#" class="btn btn-danger" id="delete_link">Hapus</a>
						<button type="button" class="btn btn-success" data-dismiss="modal">Batal</button>
					</div>
				</div>
			</div>
		</div>

		<!-- Modal Popup pengumuman Edit -->
		<div id="ModalEditDosen" class="modal" tabindex="-1" role="dialog"></div>		
		<!-- Modal Popup Tambah pengumuman -->
		<div id="ModalAdd" class="modal fade" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Tambah Pengumuman</h4>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<form action="page/article_add.php" enctype="multipart/form-data" method="post">
							<div class="form-group">
								<div class="input-group">
								<input name="date" type="hidden" value="<?php echo $nama;?>" />
								</div>
							</div>
							<div class="form-group">
								<label>Pengumuman</label>
									<div class="input-group">
									<textarea id='editor4' name="content" rows="10" cols="90" class="form-control" placeholder="Isi Pengumuman" required ></textarea>
									<script>
										    CKEDITOR.replace( "editor4",{ } );
										</script>
									</div>
							</div>
							<div class="modal-footer">
							<button id="alert" class="btn btn-warning" type="submit">Proses</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Modal who's online -->
		<div id="Modalonline" class="modal fade" tabindex="-1" role="dialog">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-body">
					    <h4 class="modal-title">Who's Online now <i class="fa fa-users"></i></h4>
					  <div class="box">
					    <div class="box-header">
                              <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="minimize"><i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="box-refresh" data-source="dt_online.php" data-toggle="tooltip" title="refresh data"><i class="fa fa-refresh"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button>
                                <div class="btn-group">
                                </div>
                              </div>
                        </div>
                        <br><br>
                            <div class="box-body"  style="overflow-x:auto;">
                            </div>
                        </div>
					</div>
					</div>
				</div>
			</div>
		</div>
<!-- Library Scripts -->
<?php
include "bundle/index_script.php";
?>
<script>
setTimeout(function() {
$('.alert-success').fadeOut();
}, 1500);
</script>


  </body>
</html>