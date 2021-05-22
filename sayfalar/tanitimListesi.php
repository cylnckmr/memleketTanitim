<html lang="tr">
    <div class="wrapper">

        <!-- Search bar -->
        <div class="search-wrapper">
		<div class="araplan">
            <div class="container container--add">
            
                <form  name="ara"method='post' action="index.php?s=arama.php" class="search">
                    <input type="text" name="kelime" value="" onFocus="this.value=''" onBlur="this.value=''"class="search__field" placeholder="Aramak istediğinizi buraya yazın">
                    
                   
        </div>          
                </form>
            </div>
        </div>
        
        <!-- Main content -->
        <section class="container">
            <div class="col-sm-12">
                <h2 class="page-heading">Ağrı Tanıtımı</h2>
                
                
   
        <!-- Movie preview item -->
                <?php 
				
				 $sorgu=mysql_query("Select * from tbl_tanitim");
					
					 while($sonuc=mysql_fetch_object($sorgu))
					 {
				?>
               
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
                             <a href="index.php?s=tanitimBilgi.php&id=<?php echo $sonuc->tanitim_id; ?>" class="read-more butonrenk">Detay</a>

                       
                            </div>
                    </div>

                    <div class="clearfix"></div>
                    
               
                </div>
           
               
                
                <?php }?>
                <!-- end movie preview item -->
            
               
               


            </div>

        </section>
      

     
    </div>

  
	
		
		<script type="text/javascript">
            $(document).ready(function() {
                init_MovieList();
            });
		</script>

