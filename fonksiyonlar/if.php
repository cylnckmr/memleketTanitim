<?php
ob_start();
if(isset($_GET['s']))
{
	$s=$_GET['s'];
	switch($s)
	   {
		  
			   case 'logout.php':
		     include("sayfalar/logout.php");
			 break;
		       case 'arama.php':
		     include("sayfalar/arama.php");
			 break;
			 case 'tanitimListesi.php':
		     include("sayfalar/tanitimListesi.php");
			 break;
			  case 'kayitol.php':
		     include("sayfalar/kayitol.php");
			 break;
			  case 'iletisim.php':
		     include("sayfalar/iletisim.php");
			 break;
			   case 'tanitimBilgi.php':
		     include("sayfalar/tanitimBilgi.php");
			 break;
			  case 'login.php':
		     include("sayfalar/login.php");
			 break;
		  default:
		    include("sayfalar/anasayfa.php");
			break;
	   }
	
}else
{
	include("sayfalar/anasayfa.php");
}
?>