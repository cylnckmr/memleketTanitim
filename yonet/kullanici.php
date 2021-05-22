<?php
  include("../fonksiyonlar/config.php");
?>

  
<table height="100%" >
            <tr > 
            <th>Üye ID</th>
            <th>Adı ve Soyadı</th>
            <th>Email</th> 
            <th>Üye TArihi</th>
            <th>Rütbesi</th>
            <th colspan="2">Kullanıcı Düzenle</th>
     </tr>
    <?php 
	
				 $sorgu=mysql_query("Select * from tbl_uyeler");

					 while($sonuc=mysql_fetch_object($sorgu))
					 {
		
				?>	
          <form action="kullanici.php?kullanici=duzenle" method="post">
     <tr>
         <td><input  type="text" value="<?php echo $sonuc->uyeId;?>" name="uyeId"></td>
            <td><input name="uyeAdSoyad" value="<?php echo $sonuc->uyeAdSoyad;?>"></td>
            
            <td><input name="email" value="<?php echo $sonuc->email;?>"></td> 
              <td><input name="uyeTarihi" value="<?php echo $sonuc->uyeTarihi;?>"></td>
           <td>
            <select name="rutbe">
               <option value="<?php echo $sonuc->rutbe;?>"><?php echo $sonuc->rutbe; ?></option>
               <option value="yonetici">Yönetici</option>
               <option value="kullanici">Kullanıcı</option>
            </select>
        </td>   
          
           <td><input type="submit" value="Değiştir" >|<a href="kullanici.php?kullanici&uyeId=<?php echo $sonuc->uyeId; ?>">Sil</a>
         
    </tr>
    </form>
   <?php 
   }
   
   ?>
            
</table>
<?php
   if($_GET["kullanici"]=="duzenle")
   {
	   $uyeId=$_POST["uyeId"];
	  
	   $uyeAdSoyad=$_POST["uyeAdSoyad"];
	   $email=$_POST["email"];
	   $uyeTarihi=$_POST["uyeTarihi"];
	   $rutbe=$_POST["rutbe"];
	    echo $uyeId;
		 echo $uyeAdSoyad;
		  echo $rutbe;
		   echo $uyeTarihi;
		   echo $uyeId;
		   
		   
	   $duzenle=mysql_query("update tbl_uyeler set
	   tbl_uyeler.uyeAdSoyad='$uyeAdSoyad'
	   tbl_uyeler.email='$email'
	   tbl_uyeler.uyeTarihi='$uyeTarihi'
	   tbl_uyeler.rutbe='$rutbe' where tbl.uyeler.uyeId='$uyeId'");
	   if($duzenle)
	   {?>
	  <script language="javascript">
	  alert("Başarılı Bir Şekilde Değiştirildi.");
	  </script>
	<?php }
    else {?> 
	   <script language="javascript">
	  alert("Başarısız.");
	  </script>
	<?php   }
	} 
 ?>
