<?php
session_start();
include ('conn/koneksi.php');
include ('conn/fungsi.php');
?>
<!DOCTYPE html>
<html>
 <head>
    <meta charset="utf-8">
    <title>E - School</title>
	<!-- Library CSS -->
	<script src="../aset/plugins/ckeditor/ckeditor.js"></script>
		<script>
	    CKEDITOR.env.isCompatible = true;
	</script>
	<?php
		include "bundle/chat_css.php";
	?>
	<style>
     #ti { 
    outline: 1;
    border-radius: 0px;
    }
    #clok { 
    border-radius: 0px;
    background-color:white;
    }
	</style>
	<style>
	     #cog {
    border-radius:0; 
    background-color:#222d32;
    color:white;
    border:0;
    }
    #cogi {
    border-radius:0; 
    background-color:#ff8f0a;
    color:white;
    border:0;
    }
    #cog:hover {
    border-radius:0; 
    background-color:#ff8f0a;
    color:white;
    border:0;
    }
	</style>
  </head>
<?php
include "tema/tema.php";
?>
    <div class="wrapper">
      <?php
        include 'navbar/content_header.php';
       ?>
      <aside class="main-sidebar">
      <section class="sidebar">
      <?php
        include "navbar/userpanel.php";  
      ?>
          <ul class="sidebar-menu" data-widget="tree">
              <li class="header">MAIN MENU</li>
              <li><a href="index.php"><i class="fa fa-tachometer"></i><span> Dashboard</span></a></li>
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
    						<li><a href="up-gbrsoal.php"><i class="fa fa-upload"></i><span> Upload Gbr Soal</span></a></li>
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
	<div class="content-wrapper"  style="background-color:#222d32;">	
        </section>
		<section class="content"  style="background-color:#222d32;">
			<div class="row">
				<div class="col-sm-12"  style="background-color:#222d32;">
					<div class="box"  style="background-color:#222d32;">
						<div class="box-header"  style="background-color:#222d32;">
							<div class="row"  style="background-color:#222d32;">
							    <div class="col-sm-8" style="background-color:#222d32;">
                                            <div class="table table-bordered" id="load" style="width: 100%; height: 529px; overflow-y: auto;">
                							<tbody>
                                            <div id="responsecontainer"></div>
                                            </tbody>
			                                </div>
								        </div>
                                <div class="col-sm-4" style="background-color:#222d32;">
                                    <form action="page/chat_add.php" enctype="multipart/form-data" method="post">
								        <div class="form-group">
									        <div class="input-group">
									        <input name="user" type="hidden" value="<?php echo $nama;?>" />
									        </div>
								        </div>
								        <div class="form-group" style="color:white;">
									        <label>comment</label>
									            <div class="input-group">
									                <textarea id='editor6' name="comment" rows="19" cols="95" class="form-control" placeholder="comment...." required ></textarea>
									                    <script>
										                    //CKEDITOR.replace( "editor6",{ } );//
										                </script>
									            </div>
								        </div>
								    <button id="ti"  class="btn btn-warning" type="submit">Kirim <i class="fa fa-paper-plane"></i></button>
							        </form>
							        <br>
							        <!-- /.smiley -->
							        <button id="clok" data-toggle="collapse" data-target="#demo">Input Emoticon <i class="fa fa-smile-o" aria-hidden="true"></i></button>
                                    <div id="demo" class="collapse"  style="color:white;">
                                    <br>
                                    copy atau ketik kode berikut di kolom komentar lalu tekan tombol kirim
                                    <hr width="0%" align="center">
                                    <div class="col-xs-12">
    							        <div class="col-xs-4">
    							        :wow <img src="smiley/wow.gif" width="40px">
    							        </div>
    							        <div class="col-xs-4">
    							        :wkwk <img src="smiley/wkwk.gif" width="40px">
    							        </div>
    							        <div class="col-xs-4">
    							        :bingung <img src="smiley/bingung.gif" width="30px">
    							        </div>
    							    </div>
    							    <hr width="0%" align="center">
    							    <div class="col-xs-12">
    							        <div class="col-xs-4">
    							        :ngakak <img src="smiley/ngakak.gif" width="40px">
    							        </div>
    							        <div class="col-xs-4">
    							        :marah <img src="smiley/marah.gif" width="40px">
    							        </div>
    							        <div class="col-xs-4">
    							        :top <img src="smiley/top.gif" width="50px">
    							        </div>
    							     </div>
    							     <hr width="0%" align="center">
    							     <div class="col-xs-12">
    							        <div class="col-xs-4">
    							        :hoax <img src="smiley/hoax.gif" width="40px">
    							        </div>
    							        <div class="col-xs-4">
    							        :malu <img src="smiley/malu.gif" width="40px">
    							        </div>
    							        <div class="col-xs-4">
    							        :capede <img src="smiley/capede.gif" width="40px">
    							        </div>
    							     </div>
    							     <hr width="0%" align="center">
    							     <!-- /.end smiley -->
                                    </div>
							        <br><br>
							     </div>
                                        
                            </div>
						</div>
					</div>
				</div>
			  </div>
		   </div>
		</section>
	</div><!-- ./wrapper -->
	<!-- Library Scripts -->
	<?php
		include "bundle/chat_script.php";
	?>
  </body>
</html>