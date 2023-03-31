<?php 
include ('koneksi.php');
	                    $querydosen = mysqli_query ($konek, "SELECT * FROM profil where id='1'");
						if($querydosen == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						while ($ar = mysqli_fetch_array ($querydosen)){
                        ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login Peserta</title>
	<link rel="shortcut icon" href="aset/foto/<?php echo $ar['logo'];?>">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="aset/fa/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<style>
		
		#logo {
	margin-left: 20px;
	position: fixed;
    bottom: 10px; 
    font-size: 0.600em;
	}
.row {
    background-color: #3c80b7;
    color: white;
    padding: 5px;
    margin-top: -320px;
    margin-bottom: 300px;
    margin-right: 150px;
    margin-left: -70px;
} 
.row2 {
    background-color: #e5e5e5;
    width:800%;
    color: white;
    margin-top: -400px;
    margin-bottom: 180px;
    margin-right: -150px;
    margin-left: -70px;
}
#server {
    font-family: sans-serif;
    box-shadow: 4px 4px 2px grey;
    
}
.field-icon {
    color: #a8a8a8;
    float: right;
    margin-left: -25px;
    margin-top: -25px;
    position: relative;
    z-index: 2;
}
.fav {
    font-family: sans-serif;
    color: #ffffff;
    text-decoration: none;
}
.login {
    font-family: sans-serif;
    margin-top: -265px; 
    color:#515151;
    font-size: 35px;
}
@media only screen and (max-width: 700px) {
    .row2 {
        display: none;
    }
}
@media only screen and (max-width: 700px) {
    .login {
        display: none;
    }
}
@media only screen and (max-width: 700px) {
    .row {
        display: none;
    }
}
@media only screen and (max-width: 700px) {
    #server {
        display: none;
    }
}
</style>
</head>
<body>
	
	<div class="limiter">
	    
		<div class="container-login100">
		    
			<div class="wrap-login100">
			    
			    <div class="login100-more" style="background-image: url('images/<?php echo $ar['bg_login'];?>');">
            
							<div class="txt3"><img  href="<?php echo $ar['web'];?>" src="aset/foto/<?php echo $ar['logo'];?>"  width=60 ></div>
							<div id="logo"> &copy; <?php echo date ('Y') ?> Version.5 <!-- <?php include ('on-admin/versi/aktif/versi.txt'); ?> --> </div>
				</div>
				
			    <form action="vl_siswa.php" method="post" class="login100-form ">
			        <div class="row2 col-lg-12">
                    </div>
                    <div id="server" class="row col-md-3">
                        <div class="col-md-3 col-md-pull-9" style="padding-left:60px;padding-right:30px;"><?php echo $ar['kode_sekolah'];?></a></div>
                    </div>
                    <span class="login">
				    <h5 style="color:#595959;"><?php echo $ar['n_sekolah'];?></h5><br>
				    </span>
					<span class="login100-form-title p-b-34">
				    CBT School Login<br>
				    </span>
					<span class="login100-form-subtitle p-b-34">
				    Selamat datang di aplikasi CBT E - School , silahkan masukan nomer peserta dan password untuk login<br>
				    </span>
				    
					<?php if (!empty($_GET['salah'])) { echo "<span class='login100-form-alert p-b-34'><font class='blink'>
					<b><h3>Peringatan</h3><br><br>
					&emsp;&#8226; Nomer peserta atau Password tidak ditemukan di database
					</b></font></span>"; }?>
					<?php if (!empty($_GET['token'])) { echo "<span class='login100-form-alert p-b-34'><font class='blink'>
					<b><h3>Peringatan</h3><br><br>
					&emsp;&#8226; Token Kedaluarsa
					</b></font></span>"; }?>
					
					<div class="wrap-input100 rs1-wrap-input100 validate-input m-b-20">
						<input id="first-name" class="input100" type="text" name="username" autocomplete="off" placeholder="No. Peserta">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 rs2-wrap-input100 validate-input m-b-20">
						<input id="password-field" class="input100" type="password" autocomplete="off" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
					</div>
					<div class="wrap-input101 rs1-wrap-input101 validate-input m-b-20">
						<input class="input100" type="text" maxlength="6" name="token" autocomplete="off" placeholder="Token"/>
						<span class="focus-input100"></span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn btn-success" type="submit">
							<b>SUBMIT</b>
						</button>
					</div>
					<div class="w-full text-left p-t-27 p-b-239">
						<span class="txt1">
							<a class="txt1" href="admin/index.php">Akses CBT admin</a>
						</span>
					</div>
				</form>
				
			</div>
		</div>
	</div>
<script src='admin/js/jquery.min.js'></script>	
<script>
$(".toggle-password").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});
</script>	

	<div id="dropDownSelect1"></div>

</body>
</html>
<?php } ?>