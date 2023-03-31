<?php
include "../conn/koneksi.php";
$id	= $_GET["id"];
$query = mysqli_query($konek, "SELECT * FROM siswa WHERE id='$id'");
if($query == false){
die ("Terjadi Kesalahan : ". mysqli_error($konek));
}
while($r = mysqli_fetch_array($query)){
?>
	
<!-- Modal Popup siswa edit -->
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Edit Siswa</h4>
					</div>
					<div class="modal-body">
						<form action="page/siswa_edit.php" name="modal_popup" enctype="multipart/form-data" method="post">
							<input name="id" type="hidden" value="<?php echo $r["id"]; ?>"/>
							<div class="form-group col-sm-6">
								<label>username</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-info"></i>
										</div>
										<input name="nis" type="text" class="form-control" value="<?php echo $r["nis"]; ?>"/>
									</div>
							</div>
							<div class="form-group col-sm-6">
								<label>nama</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-user-circle"></i>
										</div>
										<input name="nama" type="text" class="form-control" value="<?php echo $r["nama"]; ?>"/>
									</div>
							</div>
							<div class="form-group col-sm-6">
								<label>kelas</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-book"></i>
										</div>
										<input name="kelas" type="text" class="form-control" value="<?php echo $r["kelas"]; ?>"/>
									</div>
							</div>
							<div class="form-group col-sm-6">
								<label>password</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-sign-in"></i>
										</div>
										<input name="pass" type="password" class="form-control" value="<?php echo $r["pass"]; ?>"/>
									</div>
							</div>
							<div class="form-group col-sm-6">
								<label>Sesi</label>
                             <br>
							 <form action="" method="post">   
                                 <select class="form-control" name="sesi">  
                                     <option value="<?php echo $r["sesi"]; ?>"><?php echo $r["sesi"]; ?></option>
                                         <option value="0">0</option>
                                         <option value="1">1</option>  
                                         <option value="2">2</option>  
                                         <option value="3">3</option>  
                                         <option value="4">4</option>
                                         <option value="5">5</option>
                                     </select> 
                             </div>
                             <div class="form-group col-sm-6">
							<label>Ruang</label>
							 <form action="" method="post">   
                                 <select class="form-control" name="ruang"> 
                                     <option value="<?php echo $r["ruang"]; ?>"><?php echo $r["ruang"]; ?></option>
                                         <option value="Ruang-1">Ruang 1</option>  
                                         <option value="Ruang-2">Ruang 2</option>  
                                         <option value="Ruang-3">Ruang 3</option>  
                                         <option value="Ruang-4">Ruang 4</option>
                                         <option value="Ruang-5">Ruang 5</option>
                                         <option value="Ruang-6">Ruang 6</option>
                                         <option value="Ruang-7">Ruang 7</option>
                                         <option value="Ruang-8">Ruang 8</option>
                                         <option value="Ruang-9">Ruang 9</option>
                                         <option value="Ruang-10">Ruang 10</option>
                                         <option value="Ruang-11">Ruang 11</option>
                                         <option value="Ruang-12">Ruang 12</option>
                                         <option value="Ruang-13">Ruang 13</option>
                                         <option value="Ruang-14">Ruang 14</option>
                                         <option value="Ruang-15">Ruang 15</option>
                                         <option value="Ruang-16">Ruang 16</option>
                                         <option value="Ruang-17">Ruang 17</option>
                                         <option value="Ruang-18">Ruang 18</option>
                                         <option value="Ruang-19">Ruang 19</option>
                                         <option value="Ruang-20">Ruang 20</option>
                                     </select> 
                             </div>
							<div class="modal-footer">
								<button class="btn btn-success" type="submit">
									Save
								</button>
								<button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
									Cancel
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			
			
<?php
			}

?>