<?php
include ('../conn/koneksi.php');
$id	= $_GET["id"];
$query = mysqli_query($konek, "SELECT * FROM nilaihasil WHERE id='$id'");
if($query == false){
die ("Terjadi Kesalahan : ". mysqli_error($konek));
}
while($r = mysqli_fetch_array($query)){
    $qq = mysqli_query ($konek, "SELECT * FROM profil where id='1'");
						if($qq == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						while ($xx = mysqli_fetch_array ($qq)){
						    	$x=$r['jawabansiswa'];
						$xhasil=substr_count($x, "X");
						
						$key=$r['kuncisoal'];
						$jumlah=$r['jumlahsoal'];
						$score=0;
                        $benar=0;
                        $salaht=0;
                        $kosong=0;
                    for ($no=0;$no<$jumlah;$no++){
                        
                    if($key[$no]==$x[$no]){
                        //jika jawaban cocok (benar)
                        $benar++;
                    }
					else
					{
                        //jika salah
                        $salaht++;
                    
                    }  
					$salah=$salaht-$xhasil;
}
$score = 100/$jumlah*$benar;            
?>

<!-- Modal Popup siswa edit -->
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Hasil Ujian Siswa</h4>
					</div>
					<div class="modal-body" id="printableArea2">
			 <button class="btn btn-default" float:right onclick="printDiv('printableArea2')"><i class="fa fa-print"></i> Cetak </button>		
            <div class="col-xs-12">
                    <center><img src="../aset/foto/<?php echo $xx['logo'];?>"  width=100 alt="...">
                    <br><h3><b><u><?php echo $xx['n_sekolah'];?></u></b></h3><br></center>
                    <center><h5 id="tutu"><?php echo $xx['sub_n_sekolah'];?></h5></center>
                    <br><br>
            </div>
            <div id="tuti" class="col-xs-12">
                <div class="col-xs-8">
                    <table class="cetakan full">
            			<tr>
            				<td width="30px" rowspan="4" valign="top"></td>
            				<td width="200px">NAMA</td>
            				<td width="10px">:</td>
            				<td><span class="full"><?php echo $r['nama'];?></span></td>
            			</tr>
            			<tr>
            				<td>KELAS</td>
            				<td>:</td>
            				<td><span class="full"><?php echo $r['kelas'];?></span></td>
            			</tr>
            			<tr>
            				<td>MATA PELAJARAN</td>
            				<td>:</td>
            				<td>
            				<span style="width:250px"><?php echo $r['kodemapel'];?></span></td>
            			</tr>
            			<tr>
            				<td>KODE SOAL</td>
            				<td>:</td>
            				<td>
            				<span style="width:250px"><?php echo $r['kodesoal'];?></span></td>
            			</tr>
                	</table>
                </div>
                <div class="col-xs-4">
                    <a class="btn btn-default" style="float:right;">NILAI : <h3><?php echo number_format($score,2);?></h3></a>
                </div>
            </div>
            <div class="col-xs-12">
                <hr class="style2">
                <tbody>
					<?php
					$qu = mysqli_query ($konek, "SELECT * FROM ujian where kodesoal='$r[kodesoal]'");
						if($qu == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						while ($rr = mysqli_fetch_array ($qu)){
						$query = mysqli_query ($konek, "SELECT * FROM soal WHERE kodesoal='$r[kodesoal]' ORDER by nomersoal ASC");
						if($query == false){
						die ("Terjadi Kesalahan : ". mysqli_error($konek));
						$i=1;
						}
						while ($ar = mysqli_fetch_array ($query)){
						    if(!$ar['audio']=='')
				        {
					    $audio = "<audio src='../on-admin/images/$ar[audio]' controls controlsList='nodownload'></audio>";
				        }
				        else
				        {
					    $audio = "";
				        }	
						if(!$ar['soal']=='')
				        {
					    $soal = "<b>$ar[soal]</b><br><br>";
				        }
				        else
				        {
					    $soal = "";
				        }
						$jwbsis=$r[jawabansiswa][($ar[nomersoal]-1)];
				        if(!$ar['gambarsoal']=='')
				        {
					    $gambarsoal = "<img class='max' src='../on-admin/images/$ar[gambarsoal]' align=center style='max-width:300pk;height:auto' ><br>";
				        }
				        else
				        {
					    $gambarsoal = "";
				        }
				        
				        if(!$ar['gambar_a']=='')
				        {
					    $gambar_a = "<img src='../on-admin/images/$ar[gambar_a]' align=center style='max-width:300pk;height:auto' >";
				        }
				        else
				        {
					    $gambar_a = "";
				        }
				        if(!$ar['pilihan1']=='')
				        {
					    $pilihan_a = "$ar[pilihan1]";
				        }
				        else
				        {
					    $pilihan_a = "";
				        }
				        if(!$ar['gambar_b']=='')
				        {
					    $gambar_b = "<img src='../on-admin/images/$ar[gambar_b]' align=center style='max-width:300pk;height:auto' >";
				        }
				        else
				        {
					    $gambar_b = "";
				        }
				        if(!$ar['pilihan2']=='')
				        {
					    $pilihan_b = "$ar[pilihan2]";
				        }
				        else
				        {
					    $pilihan_b = "";
				        }
				        if(!$ar['gambar_c']=='')
				        {
					    $gambar_c = "<img src='../on-admin/images/$ar[gambar_c]' align=center style='max-width:300pk;height:auto' >";
				        }
				        else
				        {
					    $gambar_c = "";
				        }
				        if(!$ar['pilihan3']=='')
				        {
					    $pilihan_c = "$ar[pilihan3]";
				        }
				        else
				        {
					    $pilihan_c = "";
				        }
				        if(!$ar['gambar_d']=='')
				        {
					    $gambar_d = "<img src='../on-admin/images/$ar[gambar_d]' align=center style='max-width:300pk;height:auto' >";
				        }
				        else
				        {
					    $gambar_d = "";
				        }
				        if(!$ar['pilihan4']=='')
				        {
					    $pilihan_d = "$ar[pilihan4]";
				        }
				        else
				        {
					    $pilihan_d = "";
				        }
				        if(!$ar['gambar_e']=='')
				        {
					    $gambar_e = "<img src='../on-admin/images/$ar[gambar_e]' align=center style='max-width:300pk;height:auto' >";
				        }
				        else
				        {
					    $gambar_e = "";
				        }
				        if(!$ar['pilihan5']=='')
				        {
					    $pilihan_e = "$ar[pilihan5]";
				        }
				        else
				        {
					    $pilihan_e = "";
				        }
				        if($jwbsis==$ar[kunci])
				        {
					    $benar = "<i class='fa fa-check' style='font-size:28px;color:green'></i>";
				        }
				        else
				        {
					    $benar = "<i class='fa fa-close' style='font-size:28px;color:red'></i>";
				        }
				        if($ar[kunci]=="A")
				        {
					    $pilihan = "<br>
    								&emsp;<p>a. &emsp;$pilihan_a $gambar_a &emsp;<i class='fa fa-star' style='font-size:15px;color:green'></i></p>
    								&emsp;<p>b. &emsp;$pilihan_b $gambar_b</p>
                                    &emsp;<p>c. &emsp;$pilihan_c $gambar_c</p>
                                    &emsp;<p>d. &emsp;$pilihan_d $gambar_d</p>
    								&emsp;<p class='$rr[opsi]'>e. &emsp;$pilihan_e $gambar_e</p>";
				        }
				        else if($ar[kunci]=="B")
				        {
					    $pilihan = "<br>
    								&emsp;<p>a. &emsp;$pilihan_a $gambar_a</p>
    								&emsp;<p>b. &emsp;$pilihan_b $gambar_b &emsp;<i class='fa fa-star' style='font-size:15px;color:green'></i></p>
                                    &emsp;<p>c. &emsp;$pilihan_c $gambar_c</p>
                                    &emsp;<p>d. &emsp;$pilihan_d $gambar_d</p>
    								&emsp;<p class='$rr[opsi]'>e. &emsp;$pilihan_e $gambar_e</p>";
				        }
				        else if($ar[kunci]=="C")
				        {
					    $pilihan = "<br>
    								&emsp;<p>a. &emsp;$pilihan_a $gambar_a</p>
    								&emsp;<p>b. &emsp;$pilihan_b $gambar_b</p>
                                    &emsp;<p>c. &emsp;$pilihan_c $gambar_c &emsp;<i class='fa fa-star' style='font-size:15px;color:green'></i></p>
                                    &emsp;<p>d. &emsp;$pilihan_d $gambar_d</p>
    								&emsp;<p class='$rr[opsi]'>e. &emsp;$pilihan_e $gambar_e</p>";
				        }
				        else if($ar[kunci]=="D")
				        {
					    $pilihan = "<br>
    								&emsp;<p>a. &emsp;$pilihan_a $gambar_a</p>
    								&emsp;<p>b. &emsp;$pilihan_b $gambar_b</p>
                                    &emsp;<p>c. &emsp;$pilihan_c $gambar_c</p>
                                    &emsp;<p>d. &emsp;$pilihan_d $gambar_d &emsp;<i class='fa fa-star' style='font-size:15px;color:green'></i></p>
    								&emsp;<p class='$rr[opsi]'>e. &emsp;$pilihan_e $gambar_e</p>";
				        }
				        else
				        {
					    $pilihan = "<br>
    								&emsp;<p>a. &emsp;$pilihan_a $gambar_a</p>
    								&emsp;<p>b. &emsp;$pilihan_b $gambar_b</p>
                                    &emsp;<p>c. &emsp;$pilihan_c $gambar_c</p>
                                    &emsp;<p>d. &emsp;$pilihan_d $gambar_d</p>
    								&emsp;<p>e. &emsp;$pilihan_e $gambar_e &emsp;<i class='fa fa-star' style='font-size:15px;color:green'></i></p>";
				        }

							echo "

								<tr>
								
								$ar[nomersoal]. <b>$ar[soal]</b>
							    <br>
								&emsp;$gambarsoal<br>$audio
								$pilihan
								<br><br>
                                <i><u>Jawaban siswa</u></i> : $jwbsis $benar
                                <br>
                                <hr class='style1'>
								</tr>";
						}
					?>
					<hr class="style2">
					<center><h5><b> --------- &copy; <?php echo date ('Y') ?> <?php echo $xx['n_sekolah'];?> --------- </b></h5></center>
				</tbody>
			</div>
							<div class="modal-footer">

							</div>
						</form>
					</div>
				</div>
			</div>
			
			
<?php
			}}}
?>