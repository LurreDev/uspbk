					<?php
						$querydosen = mysqli_query ($konek, "SELECT * FROM siswa ORDER by nis ASC");
						if($querydosen == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						$i=1;
						while ($ar = mysqli_fetch_array ($querydosen)){
						$qq = mysqli_query ($konek, "SELECT * FROM profil where id='1'");
						if($qq == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						while ($xx = mysqli_fetch_array ($qq)){	

						?>
<div id='border' class="col-xs-6">
	            <table>
		                <td colspan="3" style="border-bottom:1px solid #666; padding: 0;">
                			<table width="100%" class="kartu">
                				<tr>
                				    <td align='center' style='padding: 4px'><img src='../aset/foto/<?php echo $xx['logo'];?>' height='40'></td>
                                    <td align='center' style='font-weight:bold; padding: 4px;'>KARTU PESERTA <BR> UJIAN <?php echo $xx['n_sekolah'];?> <?php echo date ('Y') ?></td>
                                    <td align='center' style='padding: 4px'><img src='../aset/foto/<?php echo $xx['logo_kota'];?>' height='45'></td>
                				</tr>
                			</table>
                		</td>
                			<tr><td height="70" width="115">Nama Peserta</td><td width="1"> :</td><td width="290"> <i>&emsp;<?php echo $ar[nama]; ?></i></td></tr>
                			<tr><td>Username</td><td> :</td><td>&emsp;<?php echo $ar[nis]; ?></td></tr>
                			<tr><td>Password</td><td> :</td><td>&emsp;<?php echo $ar[pass]; ?></td></tr>
                			<tr><td>Kelas</td><td> :</td><td>&emsp;<?php echo $ar[kelas]; ?></td></tr>
                			<tr><td>Sesi / Ruang</td><td> :</td><td>&emsp;<?php echo $ar[sesi]; ?> / <?php echo $ar[ruang]; ?></td></tr>
	            </table>
	            <img id='plotro' src='../aset/foto/avatar.gif' width=70px height=auto/>
</div>
<?php }} ?>