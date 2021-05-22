<?php 
if(isset($_SESSION['token'])&& isset($_SESSION['email']))
  {
	    header("location:index.php");
  }
  $token=md5(uniqid(rand()));
  if(isset($_POST['submit']))
  {
	  $email=temizle(trim(mysql_real_escape_string($_POST['email'])));
	  $sifre=temizle(trim(mysql_real_escape_string($_POST['sifre'])));
	  $token=$_POST['token'];
	  $benihatirla=@$_POST['benihatirla'];
	 
	
		  $sifre=md5($sifre);
	      $uyeSorgu=mysql_query("Select * from tbl_uyeler where email='{$email}' and sifre='{$sifre}'");
		  $uyeSonuc=mysql_fetch_object($uyeSorgu);
		  if(mysql_num_rows($uyeSorgu)>0)
		 {
		   $uyeId=$uyeSonuc->uyeId;
		   $_SESSION['uyeId']=$uyeId;
		   $_SESSION['email']=$uyeSonuc->email;
		   $_SESSION['md5Id']=$uyeSonuc->md5Id;
		   $_SESSION['uyeAdSoyad']=$uyeSonuc->uyeAdSoyad;
		   $_SESSION['token']=$token;
		   $aktiveAd="Üye Giriş Yaptı";
		   $ipAdresi=$_SERVER['REMOTE_ADDR'];
		  
	     $tarih   =date("Y-m-d H:m:s");
		 date_default_timezone_set("Europe/Istanbul");
		   if($benihatirla="on")
		     {
				 
			   setcookie('uyeId',$_SESSION['uyeId'],time()+3600);
				setcookie('email', $_SESSION['email'],time()+3600);
				 setcookie('md5Id', $_SESSION['md5Id'],time()+3600);
				 setcookie('uyeAdSoyad',$_SESSION['uyeAdSoyad'],time()+3600);
				 setcookie('token',$_SESSION['token'],time()+3600);
			
					 
		     }
			 $aktiviteEke=mysql_query("insert into tbl_avtiviteler(ipAdresi,tarih,aktiviteAd,uyeId) 
			values ('$ipAdresi','$tarih','$aktiveAd','$uyeId');");
			echo "<Script> alert('Başarılı Bir Şekilde Giriş Yapıldı');</script>";
		     header("refresh:0;url=index.php");
	   	}
		else
		{
			 $hata="Email veya Şifre Bilgisi Yanlış";
           	    
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
	if (f.sifre.value.trim() == '' || f.sifre.value.length<5) hatalar = hatalar + '<font color="black" size="3"><bold>- En az 5 karekterli parola giriniz.<br></font>';
	if (hatalar!='') {
		uyari_div.visible=true;
		uyari_div.innerHTML=hatalar;		
		return false;
	} else {return true;}
 }
</script>
     <div class="container">
                    <div class="col-sm-12 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
                        <form  class="form row"  name="giris_form" id="giris_form" action="index.php?s=login.php"  onsubmit="return kayit_kontrol();" method='post'>
                        <p class="form__title uyeyazi">Giriş Yap</p>
                         <div class="uyari_div" id="uyari_div" text-a align="left"></div>   
                         <p text-a align="left"><?php echo @$hata ?></p>
                           <div class="col-sm-8">
                               
                                <p text-a align="left">E-Posta:  <input type='text'  name='email' class="form__mail"> 
                               Şifre: <input type='password'  name='sifre' class="form__name">  </p>
                                 
                           <input type="hidden" name="token" value="<?php echo $token; ?>"/>
                          <button type="submit" value="submit" name="submit" class='btn btn-md btn--danger'>Giriş Yap</button>
                            </div>
                        </form>
                    </div>
                </div>
          



 