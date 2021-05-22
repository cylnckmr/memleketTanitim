<?php
  $kelime=trim(mysql_real_escape_string(strip_tags($_POST['kelime'])));
 
 if(isset($kelime)&& !empty($kelime)&& strlen($kelime)>2)
 {
	  $sorgu=mysql_query("Select * from tbl_tanitim where tbl_tanitim.adi like '%$kelime%' or  tbl_tanitim.ozet like '%$kelime%'");
	  
	   
				
				
					
					 while($sonuc=mysql_fetch_object($sorgu))
					 { ?>
				
                      
                     <div class="movie movie--preview movie--full release">
                   <div class="col-sm-3 col-md-2 col-lg-2">
                            <div class="movie__images">
                                <img alt='' src="resimler/tanitimResimleri/<?php echo  $sonuc->resimUrl?>" width="250px" height="250px">
                            </div>
                        
                    </div>

                    <div class="col-sm-9 col-md-10 col-lg-10 movie__about">
                             <p class="movie__option"><strong>ADI:</strong><?php echo cevir($sonuc->adi); ?></p>
                            
  
                               <p class="movie__option"><strong>Tur:</strong></strong><a><?php echo $sonuc->kategori; ?></a></p>
                                  
                                    
                       
                         

                            <div class="preview-footer">
                             <a href="index.php?s=tanitimBilgi.php&id=<?php echo $sonuc->tanitim_id; ?>" class="read-more">Detay</a>

                       
                            </div>
                    </div>

                    <div class="clearfix"></div>
                    
               
                </div>
           
               
                
                <?php }?>
   <?php }
   else {echo "Anime Bulunamadı";}
  
   ?>

