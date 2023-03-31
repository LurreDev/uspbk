				<thead>
					<tr>
						<th width="3%">No</th>
						<th width="20%">Mapel</th>
						<th width="5%">Jumlah Soal</th>
						<th width="5%">Jawaban Benar</th>
						<th width="5%">Jawaban Salah</th>
						<th width="5%">Total Nilai</th>
						<th width="10%">analisa</th>
						<th width="30%">Jawaban Siswa</th>
					</tr>
				</thead>
				<tbody>
				    <?php
					$querydosen = mysqli_query ($konek, "SELECT * FROM nilaihasil WHERE nama='$nama'");
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
								<tr>
									<td align=center><h6 style='font-size:12px;'>$i</h6></td>
									<td><h6 style='font-size:12px;'>$r[kodemapel]</h6></td>
									<td><h6 style='font-size:12px;'>$r[jumlahsoal]</h6></td>
									<td><h6 style='font-size:12px;'>$benar</h6></td>
									<td><h6 style='font-size:12px;'>$salah</h6></td>
									<td><button id='co' class='btn btn-success' style='font-size:10px;width:50px;'><b>$score</b></button></td>
									<td>
									<a class='open_modal' style='font-decoration:none;color:#222;' id='$r[id]'><button  type='button' class='btn btn-flat btn-success btn-sm' style='font-size:10px;width:50px;'><i class='fa fa-pencil-square-o'></i></button></a>
									</td>
									<td><h6 style='font-size:10px;'>$r[jawabansiswa]</h6></td>
									";
						$i++;		
					}
					?>
</tbody>