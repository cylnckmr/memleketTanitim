<? ob_start(); ?>
<?php 

  if(isset($_SESSION['token'])&& isset($_SESSION['name']))
  {
	  header("location:index.php");
  }

  if(isset($_POST['submit']))
  {
	  $adsoyad     =temizle2(trim(mysql_real_escape_string($_POST['name'])));
	  $sifre       =temizle(trim(mysql_real_escape_string($_POST['sifre'])));
	  $sifret      =temizle(trim(mysql_real_escape_string($_POST['sifre2'])));
	  $email       =temizle(trim(mysql_real_escape_string($_POST['email'])));
	  $ipAdresi    =$_SERVER['REMOTE_ADDR'];
	    date_default_timezone_set("Europe/Istanbul");
	  $tarih       =date("Y-m-d H:m:s");
	
	  $aktiviteAd  ="Üye Oldu";
	  $resimIsmi   ="user.jpg";
	  
	if(empty($adsoyad) ||empty($sifre) ||empty($sifret)||empty($email))
	{
		$hata="Gerekli Alanları doldurunuz!";
	}
	else if($sifre!=$sifret)
    {
		$hata="Şifreler Aynı Değil!";
    }
    else if(strlen($sifre)<5)
	{
		$hata="Şifre Beş Karekterden Küçük Olamaz!";
    }
	else 
	{
		$emailsorgu=mysql_query("Select*from tbl_uyeler where tbl_uyeler.email='{$email}'");
		if(mysql_num_rows($emailsorgu)>0)
		{
			$hata="Bu email sistemde mevcut lütfen başka bir email adresi deneyiniz.";
			
		}
	    else
		{  
		     $sifre=md5($sifre);
			 $md5Id=md5(rand()+$adsoyad);
			$ekle=mysql_query("insert into tbl_uyeler(uyeAdSoyad,email,sifre,uyeTarihi,uyeResimUrl,md5Id) 
			values('$adsoyad','$email','$sifre','$tarih','$resimIsmi','$md5Id');");
			$uyeId=mysql_insert_id();
			$aktiviteEkle=mysql_query("insert into tbl_avtiviteler(ipAdresi,tarih,aktiviteAd,uyeId) 
			values ('$ipAdresi','$tarih','$aktiviteAd','$uyeId');");
			
			if($ekle && $aktiviteEkle)
			{
			   echo "<Script> alert('Üyeliğiniz Başarı ile Gerçekleşti.Lütfen Giriş Yapınız');</script>";
			    header("refresh:0;url=index.php?s=index.php");
			}
			else
			{
				 echo "<Script> alert('Üyeliğiniz Gerçekleşemedi.Lütfen Tekrar Deneyiniz.');</script>";
			    header("refresh:0;url=index.php?s=kayitol.php");
			}	
		}
	}
}
?>
<script>
 function kayit_kontrol(){
	f = document.forms['giris_form'];
	uyari_div= document.getElementById('uyari_div'); 
	var uyari = '';
	var hatalar = '';
	var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
	
    if (f.email.value.trim() == '' || reg.test(f.email.value) == false) hatalar = hatalar + '<font color="black" size="3" ><bold>- E-posta adresinizi düzgün giriniz.<br></font>';
	if (f.name.value.trim() == '') hatalar = hatalar + '<font color="black" size="3"><bold>- Ad Alanı Boş Geçilemez.<br></font>';
if (f.sifre.value.trim() == '' || f.sifre.value.length<5) hatalar = hatalar + '<font color="black" size="3"><bold>- En az 5 karekterli Şifre giriniz.<br></font>';
if (f.sifre2.value.trim()!= f.sifre.value.trim()) hatalar = hatalar + '<font color="black" size="3"><bold>- Şifreler Aynı Olmalıdır<br></font>';
	if (hatalar!='') {
		uyari_div.visible=true;
		uyari_div.innerHTML=hatalar;		
		return false;
	} else {return true;}
 }
</script>
            <div class="container">
                    <div class="col-sm-12 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
                        <form  class="form row" name="giris_form" id="giris_form"   onsubmit="return kayit_kontrol();"action="index.php?s=kayitol.php" method='post'>
                        <p class="form__title uyeyazi">Üye Ol</p>
                        <div class="uyari_div" id="uyari_div" text-a align="left"></div>   
                         <p text-a align="left"><?php echo @$hata ?></p>
                         
                           <div class="col-sm-8">
                                <p text-a align="left">Ad ve Soyad<input type='text'  name='name' class="form__name">
                                E-Posta   <input type='text'  name='email' class="form__mail">  
                                Şifre <input type='password'  name='sifre' class="form__name">  
                                Şifre Tekrar <input type='password' name='sifre2' class="form__name"> </p> 
                            <p text-a align="center">  <button type="submit" value="submit" name="submit" class='btn btn-md btn--danger'>Kaydet</button></p>
                            </div>
                        </form>
                    </div>
                </div>
 <? ob_end_flush(); ?>