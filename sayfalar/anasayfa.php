
   
        <!-- Slider -->
          <div class=>
         <?php
		 include("sayfalar/slider.php");
		 ?>
    </div>
        <!--end slider -->



<h2 class="page-heading heading--outcontainer">Popüler Yerler</h2>

<div class="col-sm-8 col-md-9">
                     <?php
					 $sorgu=mysql_query("Select * from tbl_tanitim limit 6");
					
					 while($sonuc=mysql_fetch_object($sorgu))
					 {
					
					 ?>
                        <!-- Movie variant with time -->
                      
                            <div class="movie movie--test movie--test--dark movie--test--left ">
							
                                <div class="movie__images resimarka">
                           
                                        <img alt='' src="resimler/tanitimResimleri/<?php echo  $sonuc->resimUrl?>" width="500px" height="250px">
                                 
                                </div>
                                     
                                <div class="movie__info ">
                                   
                             <a class="movie__title"><?php echo cevir($sonuc->adi); ?>  </a>

                                  <div class="preview-footer">
                             <a href="index.php?s=tanitimBilgi.php&id=<?php echo $sonuc->tanitim_id; ?>"class="read-more butonrenk">Detay</a>

                            </div>
                      
                            
					<!--$tursorgu=mysql_query("Select * from tbl_turler where tbl_turler.turId='{$sonuc->turId}'");
					// while($tursonuc=mysql_fetch_object($tursorgu))-->
					
			
					 
                         
                                   
                                     
                                </div>
                            </div>
                         <!-- Movie variant with time -->
                          <?php } ?>
                       
                         
                        
                    </div>
                  