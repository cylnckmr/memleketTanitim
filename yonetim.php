<?php
    include("fonksiyonlar/config.php");
	 if(isset($_COOKIE['email'])&&isset($_COOKIE['token']))
 {
	        $_SESSION['uyeId']=$_COOKIE['uyeId'];
	 	   $_SESSION['email']=$_COOKIE['email'];
		   $_SESSION['md5Id']=$_COOKIE['md5Id'];
		   $_SESSION['uyeAdSoyad']=$_COOKIE['uyeAdSoyad'];
		   $_SESSION['token']=$_COOKIE['token'];
 
?>
<html>
<head>

<title>Yönetim Paneli</title>
<link href="css/mystyle.css" rel="stylesheet" type="text/css">
</head>

<body>

<table border="2px" width="100%"  height="100%" >
     <tr>
         <td><h1>Site Yönetim Paneli</h1></td>
         <td align="right"><a href="index.php" target="_blank">Siteye Dön</a>
         <a href="sayfalar/logout.php">Çıkış Yap</a></td>
     </tr>
      <tr >
        <td>
         
          <iframe style="border:0px;" width="100%" src="yonet/anasayfa.php" name="icerik"></iframe>
          </td>
         <td width="300px" height="500px" >
         
          <li><a href="yonet/anasayfa.php" target="icerik">Anasayfa</a></li> 
          <li><a href="yonet/kullanici.php" target="icerik">Kullanıcı Yönetimi</a></li>
		  <li><a href="yonet/animeekle.php" target="icerik">Slider yönetimi</a></li>
		  <li><a href="yonet/animeekle.php" target="icerik">Site yönetimi</a></li>
         </td>
        
         
     </tr>
</table>

</body>
</html>
<?php } else{ echo "Yetkisiz erişim";}
    