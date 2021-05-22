<?php 
$id=$_GET['id'];
$icerikSorgu=mysql_query("Select * from tbl_tanitim where tbl_tanitim.tanitim_id=$id");
$icerikSonuc=mysql_fetch_object($icerikSorgu);

?>
        
        <!-- Main content -->
        <section class="container">
            <div class="col-sm-8 col-md-9">
                <div class="movie">
                    <h2 class="page-heading"><?php echo cevir($icerikSonuc->adi);?></h2>
                    
                    <div class="movie__info">
                        <div class="col-sm-6 col-md-4 movie-mobile">
                            <div class="movie__images">
                               
                                <img alt='' src="resimler/tanitimResimleri/<?php echo  $icerikSonuc->resimUrl?>" width="500px" height="250px">
                            </div>
                       
                        </div>

                        <div class="col-sm-6 col-md-8">
        
 
                                <p class="movie__option"><strong>Tur: </strong><a ><?php echo $icerikSonuc->kategori; ?></a></p>
                            
                           
                          
							

    
                            
                        </div>
                    </div>
                    
                    <div class="clearfix"></div>
                    
                    <h2 class="page-heading">Özet</h2>

                    <p class="movie__describe"><?php echo $icerikSonuc->ozet ?> </p>

                  
                    
             

                </div>

              
            </div>


        </section>
         <?php 
		 $tYorum=mysql_query("Select count(yorumId)as tYorum from tbl_yorumlar  where tbl_yorumlar.tanitim_id='{$icerikSonuc->tanitim_id}'");
		  $tYorumSonuc=mysql_fetch_object($tYorum);
		 ?>
        
     <h2 class="page-heading">Yorumlar(<?php echo $tYorumSonuc->tYorum ;?>)</h2>
          <?php 
			$yorumSorgu=mysql_query("Select * from tbl_yorumlar as y left join tbl_uyeler as u on u.uyeId=y.uyeId where y.tanitim_id='{$id}'");         
			if(mysql_num_rows($yorumSorgu)>0)
			     {
				   while($yorumSonuc=mysql_fetch_object($yorumSorgu))
						{
						 ?>
									<div class="comment-wrapper">
										<div class="container">
											<div class="comment">
											<div class="comment__images">
											<img alt='' src="resimler/uyeResimleri/<?php echo  $yorumSonuc->uyeResimUrl?>" >
										</div>
			
											  <a ><span><strong><?php  echo $yorumSonuc->uyeAdSoyad;?></strong></span></a>
											  <p ><?php echo $yorumSonuc->yorumTarihi;?></p>
											  <p class="comment__message"><?php echo $yorumSonuc->yorum;?></p>
											
										  </div>
									   </div>
								   </div>          
						 <?php 
						 }
				 }else 
							{
								echo "Henüz yorum yapılmamış.İlk yorumu siz yapabilirsiniz";
							}
					 ?>
                     
                    
                    <?php 
					 if(isset($_POST['submit']))
					 {
							 $yorum=trim(mysql_real_escape_string($_POST['yorum']));
							 if(!empty($yorum) || $yorum="")
							 {
									  $ipAdresi    =$_SERVER['REMOTE_ADDR'];
									  date_default_timezone_set("Europe/Istanbul");
									  $tarih       =date("Y-m-d H:m:s");
									  $uyeId=$_SESSION['uyeId'];
									  $tanitim_id=$id;
									  $aktiviteAd="Yorum Yapıldı".$yorum;
									  $yEkle=mysql_query("insert into tbl_yorumlar(yorum,uyeId,yorumTarihi,tanitim_id,onay) 
					values ('$yorum','$uyeId','$tarih','$tanitim_id',0);");
					$aktiviteEkle=mysql_query("insert into tbl_avtiviteler(ipAdresi,tarih,aktiviteAd,uyeId) 
					values ('$ipAdresi','$tarih','$aktiviteAd','$uyeId');");
					
								if($yEkle && $aktiviteEkle)
									  {
											 echo "<Script> alert('Yorumunuz Başarı ile eklendi.');</script>";
											 header("refresh:0;url=index.php?s=tanitimBilgi.php&id=".$id);
									   }
								  else
									  {
											 echo "<Script> alert('Yorumunuz Eklenemedi.Lütfen Tekrar Deneyiniz..');</script>";
											 header("refresh:0;url=index.php?s=tanitimBilgi.php&id=".$id);
									  }	
				
							 }
							  else
									 {
										 echo "<Script> alert('Yorum Alanını Boş Bırakamazsınız..');</script>";
									 }
							
					 }
					
					?>
                    
                    
                    
                    
                    
                    
                    <!--Üye girşi olmuşsa -->
                    <?php
					
					 if(isset($_SESSION['token'])&& isset($_SESSION['email']))
						 {
								?>
									 <form id="comment-form" class="comment-form" method='post'>
										<textarea name="yorum" class="comment-form__text" placeholder='Yorumunuzu Buraya Ekleyin'></textarea>
                                        
										<button type="submit" name="submit" class="btn btn-md btn--danger comment-form__btn">Yorum Ekle</button>
									</form>
							  <?php 
						  }
                       else
							   {
									echo "Üye Girişi Olmadan Yorum yapılamaz";
								 }			  
				  ?>
	
		
		<script type="text/javascript">
            $(document).ready(function() {
                init_MoviePage();
            });
		</script>



