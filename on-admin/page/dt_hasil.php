<style>
    table thead tr {
                background-color: #364247;
                color:white;
            }
            table tfoot tr {
                background-color: #192227;
                color:black;
            }
            tfoot {
    display: table-header-group;
}
#foo { 
  pointer-events: none;
  cursor: default;
  opacity: 0;
	    }
</style>        
    <div id="printableArea">  
    <form action="#" method="post">
        <label>Pilih kode soal</label>
        <br>
                                                     <select class="form-control" id="mySelect" name="cari" onchange="this.form.submit()" style='width:50%;' >  
                                                         <option value="<?php echo $ar[kodesoal]; ?>"><i class="fa fa-angle-down"></i>Kode Soal <?php echo $cari; ?></option>
                                                           <?php
                                                            $kelas = mysqli_query ($konek, "SELECT DISTINCT kodesoal FROM nilaihasil");
                                                            if($kelas == false){
                                                                die ("Terjadi Kesalahan : ". mysqli_error($konek));
                                                            }
                                                            $i=1;
                                                            while ($ar = mysqli_fetch_array ($kelas)){
                                                            ?>
                                                                             <option value="<?php echo $ar[kodesoal]; ?>"><?php echo $ar[kodesoal]; ?></option>
                                                                         
                                                            <?php } ?>
                                                    </select> 
                                                    <input type="hidden" name="show" value="1" />
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                        </form>
           
			</div>  
	</div>
	<br>
                          <?php 
$cari = $_POST['cari'];
$show   = $_POST['show']; 
if(!$show=='')
                        {
                        $cul = "1";
                        }
                        else
                        {
                        $cul = "";
                        }
?>
<div class="col-xs-12" style="overflow-x:auto;">
    <div id="ndelik<?php echo $cul ?>" > 
     <table id="data" class="table table-bordered table-striped">   
                <thead style="font-size:10px;">
					<tr>
						<th id="garis" width="3%">No</th>
						<th id="garis" width="20%">Kode User</th>
						<th id="garis" width="20%">Nama</th>
						<th id="garis" width="3%">Kelas</th>
						<th id="garis" width="3%">Mapel</th>
						<th id="garis" width="12%">Jmlh Soal</th>
						<th id="garis" width="3%">Benar</th>
						<th id="garis" width="3%">Salah</th>
						<th id="garis" width="3%">kosong</th>
						<th id="garis" width="5%">Nilai</th>
						<th id="garis" width="5%">Jawaban siswa</th>
						<th id="garis" width="5%">Kunci Jawaban</th>
						<th id="garis" width="12%">Waktu</th>
						<th id="garis" width="30%">Action</th>
					</tr>
				</thead>
				<tfoot>
                    <tr>
                        <th id="foo"></th>
                        <th id="foo"></th>
                        <th>kelas</th>
                        <th id="foo"></th>
                        <th id="foo"></th>
                        <th id="foo"></th>
                        <th id="foo"></th>
                        <th id="foo"></th>
                        <th id="foo"></th>
                        <th id="foo"></th>
                        <th id="foo"></th>
                        <th id="foo"></th>
                        <th id="foo"></th>
                    </tr>
                </tfoot>
				<tbody>
					<?php
						$querydosen = mysqli_query ($konek, "SELECT * FROM nilaihasil where kodesoal='$cari' ORDER by nilai DESC");
						if($querydosen == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						$i=1;
						while ($r = mysqli_fetch_array ($querydosen)){
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
							echo "
								<tr style='font-size:13px;'>
									<td id='garis' align=center>$i</td>
									<td id='garis'>$r[nis]</td>
									<td id='garis'>$r[nama]</td>
									<td id='garis'>$r[kelas]</td>
									<td id='garis'>$r[kodemapel] | $r[kodesoal]</td>
									<td id='garis' align=center>$r[jumlahsoal]</td>
									<td id='garis' align=center>$benar</td>
									<td id='garis' align=center>$salah</td>
									<td id='garis' align=center>$xhasil</td>
									<td id='garis' align=center style='background-color:#2764aa;color:white'><b>$score</b></td>
									<td id='garis'><h6>$r[jawabansiswa]</h6></td>
									<td id='garis'><h6>$r[kuncisoal]</h6></td>
									<td id='garis'><h6>$r[benar] | $r[salah]</h6></td>
									<td id='garis' align=center>
									<a class='noprint' href='analisa-soal.php?nis=$r[nis]'><button id='ti' type='button' class='btn btn-success btn-xs'><i class='fa fa-eye'></i> Lihat Hasil</button></a>
									<a style='font-decoration:none;color:#222;' onClick='confirm_delete(\"page/hasil_delete.php?id=$r[id]\")'><button id='ti' type='button' class='btn btn-danger btn-xs'><i class='fa fa-trash-o'></i></button></a> 
									</td>
								</tr>";
						$i++;		
						}
					?>
				</tbody>
				</table>
                            <div style="width: 700px;margin: 0px auto;">
		                        <canvas id="myChart"></canvas>
		                        
	                        </div>
    </div>
</div>