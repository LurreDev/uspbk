                            <div class='col-sm-12' style="border:0;">  
                                <div style="border:0;" class='panel panel-warning'>
                                             <div style="background-color:#192227;" class='panel-heading'>
                                                 <b style="color:white;">Cetak Semua Kartu Peserta</b>
                                                 <br>
                                                <div class='row'>
                                                   <div style="border:0;" class='col-xs-6 text-left'>
                                                       <select class="form-control" id="mySelect" name="kelas" required >
                                                       <option value="">SEMUA PESERTA -</option>
                                                       </select>
                                                   </div>
                                                </div>
                                             </div>
                                             <div style="border:0;" class='panel-footer'>
                                        <button id="clot" type="button" class="btn btn-success" data-target="#Modalprint" data-toggle="modal"><i class="fa fa-check" aria-hidden="true"></i> Proses</button>
                                        </div>
                            </div>
                            </div>
                            
                            <div class='col-sm-6' style="border:0;">     
                                 <div style="border:0;" class='panel panel-primary'>
                                             <div class='panel-heading'>
                                                 <b>Cetak kartu per siswa</b>
                                                 <br>
                                                <div class='row'>
                                                   <div style="border:0;" class='col-xs-6 text-left'>
                                                      <div>
                                                      <form action="#" method="post">
                                                     <select class="form-control" id="mySelect" name="cari" onchange="this.form.submit()" >  
                                                         <option value="<?php echo $ar[nama]; ?>"><i class="fa fa-angle-down"></i>NAMA / USERNAME</option>
                                                           <?php
                                                            $kelas = mysqli_query ($konek, "SELECT * FROM siswa");
                                                            if($kelas == false){
                                                                die ("Terjadi Kesalahan : ". mysqli_error($konek));
                                                            }
                                                            $i=1;
                                                            while ($ar = mysqli_fetch_array ($kelas)){
                                                            ?>
                                                                             <option value="<?php echo $ar[nis]; ?>"><?php echo $ar[nis]; ?>-<?php echo $ar[nama]; ?></option>
                                                                         
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
                            
                            <div class='col-sm-6' style="border:0;">     
                                 <div style="border:0;" class='panel panel-primary'>
                                             <div class='panel-heading'>
                                                 <b>Cetak kartu per kelas</b>
                                                 <br>
                                                <div class='row'>
                                                   <div style="border:0;" class='col-xs-6 text-left'>
                                                      <div>
                                                      <form action="#" method="post">
                                                     <select class="form-control" id="mySelect" name="kelas" onchange="this.form.submit()">  
                                                         <option value="<?php echo $ar[kelas]; ?>"><i class="fa fa-angle-down"></i>PILIH KELAS - </option>
                                                         
                                                           <?php
                                                            $kelas = mysqli_query ($konek, "SELECT DISTINCT kelas FROM siswa");
                                                            if($kelas == false){
                                                                die ("Terjadi Kesalahan : ". mysqli_error($konek));
                                                            }
                                                            $i=1;
                                                            while ($ar = mysqli_fetch_array ($kelas)){
                                                            ?>
                                                                             <option value="<?php echo $ar[kelas]; ?>"><?php echo $ar[kelas]; ?></option>
                                                                         
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
<?php 
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
<div id="ndelik<?php echo $cul ?>">
                &emsp;<button id="clot" class="btn btn-default" float:right onclick="printDiv('printableArea')"><i class="fa fa-print"></i> Cetak Kartu Peserta <?php echo $_POST['kelas']; ?></button>
                <br><br>
                <div class="col-xs-12">
                    <div class="row" id="printableArea" style="width:100%;height:700px;overflow-y:scroll;">    
                        <?php
                        $kelas = $_POST['kelas'];
                        $cari = $_POST['cari'];
                        $querydosen = mysqli_query ($konek, "SELECT * FROM siswa WHERE kelas='$kelas' or nis='$cari' ORDER by nis ASC");
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
                                echo "
                                <div id='border' class='col-sm-6 col-xs-8'>
                                        <table>
                                                <td colspan='3' style='border-bottom:1px solid #666; padding: 0;'>
                                                    <table width='100%' class='kartu'>
                                                        <tr>
                                                            <td align='center' style='padding: 4px'><img src='../aset/foto/$xx[logo]' height='40'></td>
                                                            <td align='center' style='font-weight:bold; padding: 4px;'>KARTU PESERTA <BR> UJIAN $xx[n_sekolah] <?php echo date ('Y') ?></td>
                                                            <td align='center' style='padding: 4px'><img src='../aset/foto/$xx[logo_kota]' height='45'></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                    <tr><td height='70' width='115'>Nama Peserta</td><td width='1'> :</td><td width='290'>&emsp;<i>$ar[nama]</i></td></tr>
                                                    <tr><td>Username</td><td> :</td><td>&emsp;$ar[nis]</td></tr>
                                                    <tr><td>Password</td><td> :</td><td>&emsp;$ar[pass]</td></tr>
                                                    <tr><td>Kelas</td><td> :</td><td>&emsp;$ar[kelas]</td></tr>
                                                    <tr><td>Sesi / Ruang</td><td> :</td><td>&emsp;$ar[sesi] / $ar[ruang]</td></tr>
                                        </table>
                                        <img id='plotro' src='../aset/foto/avatar.gif' width=70px height=auto/>
                                </div>";
                        }}
                        ?>
                    </div>
                    <br><br>
                </div>
            </div>