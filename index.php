<?php ob_start();
include("fonksiyonlar/config.php");
 include("fonksiyonlar/kontrol.php");
 
 if(isset($_COOKIE['email'])&&isset($_COOKIE['token']))
 {
	        $_SESSION['uyeId']=$_COOKIE['uyeId'];
	 	   $_SESSION['email']=$_COOKIE['email'];
		   $_SESSION['md5Id']=$_COOKIE['md5Id'];
		   $_SESSION['uyeAdSoyad']=$_COOKIE['uyeAdSoyad'];
		   $_SESSION['token']=$_COOKIE['token'];;
  }

 ?>
<!doctype html>
<html lang="tr"><head>
	<!-- Basic Page Needs -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
       
        <title>Ağrı Tanıtımı</title>
        
    
      
    
    <!-- Mobile Specific Metas-->
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="telephone=no" name="format-detection">
       
    

    <!-- Fonts -->
        <!-- Font awesome - icon font -->
        <link href="css/font-awesome.min.css" rel="stylesheet" media="screen" type="text/css">
        <!-- Roboto -->
        <link href="css/roboto.css" rel="stylesheet" type="text/css" media="screen">
        <!-- Open Sans -->
        <link href="css/opensans.css" rel="stylesheet" type="text/css" media="screen">
    
    <!-- Stylesheets -->

        <!-- Mobile menu -->
        <link href="css/gozha-nav.css" rel="stylesheet" type="text/css">
        
          <!-- bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet"  type="text/css">
        
        <!-- REVOLUTION BANNER CSS SETTINGS -->
        <link rel="stylesheet" type="text/css" href="rs-plugin/css/settings.css" media="screen" >
      
     
      <!-- jQuery UI -->
       <link href="css/jquery-ui.css" rel="stylesheet" type="text/css">
      
        
      <!-- Magnific-popup -->
        <link href="css/external/magnific-popup.css" rel="stylesheet" type="text/css">
      <!-- Custom -->
        <link href="css/style.css?v=1" rel="stylesheet" type="text/css">
          <link href="css/mystyle.css" rel="stylesheet" type="text/css">

   <!-- JavaScript-->
       
     
        <!-- jQuery 2.2.3.1--> 
        <script src="js/jquery.jquery-2.2.3.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/jquery-2.2.3.min.js"><\/script>')</script>
        <!-- Migrate --> 
        <script src="js/external/jquery-migrate-1.2.1.min.js"></script>
            <!-- jQuery UI -->
        <script src="js/jquery-ui.js"></script>
      
        <!-- jQuery REVOLUTION Slider -->
        <script type="text/javascript" src="rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
        <script type="text/javascript" src="rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

        <!-- Mobile menu -->
        <script src="js/jquery.mobile.menu.js"></script>
         <!-- Select -->
        <script src="js/external/jquery.selectbox-0.2.min.js"></script>
     
        <!-- Form element -->
        <script src="js/external/form-element.js"></script>
        <!-- Form validation -->
        <script src="js/form.js"></script>

        <!-- Twitter feed -->
        <script src="js/external/twitterfeed.js"></script>

        
		 <!-- Modernizr --> 
        <script src="js/external/modernizr.custom.js"></script>
        <!-- Custom -->
        <script src="js/custom.js"></script>
	       <!-- Bootstrap 3--> 
        <script src="js/bootstrap.min.js"></script>

    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries --> 
    <!--[if lt IE 9]> 
    	<script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7/html5shiv.js"></script> 
		<script src="http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.3.0/respond.js"></script>		
    <![endif]-->
    
</head>

<body class="renk">
      
        
        <!-- Header section -->
        <header class="navbar navbar-inverse navbar-fixed-top menu">
  <div class="container >
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    
               
    </div>

	

                

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
   
                        <li>
                          
                            <a class="hyazi" href="index.php?s=anasayfa.php">Anasayfa</a>
                           
                        </li>
                        <li>
                       
                            <a class="hyazi" href="index.php?s=tanitimListesi.php">Tanıtımlar</a>
               
                        </li>
                      
                        <li>
                         
                            <a  class="hyazi" href="index.php?s=iletisim.php">İletişim</a>
                           
                        </li>
                          <?php
						   if(isset($_COOKIE['email'])&&isset($_COOKIE['token']))
                            {
						  ?>
							<li>
                            
                         
	   <a   class="hyazi" href="yonetim.php">Admin Paneli</a>
                            
                      
                        
                         </li>
                         <li>
                               
                          
                            
	   <a class="hyazi" href="index.php?s=logout.php">Çıkış(<?php echo $_SESSION['uyeAdSoyad'];?>)</a>  
                         
                        </li>
                          <?php
							}
							else
							{
						   ?>
                      
                        <li>
                        
                           
	   <a class="hyazi" href="index.php?s=kayitol.php">Üye Ol</a> 
                    
                    
                       <li>
                       
                   
	   <a class="hyazi" href="index.php?s=login.php">Giriş</a> 
                          
                         
                        </li>
                         <?php }?>
                        </li>
                   
      </ul>
     
     
   
	 
	  
	
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container -->

	</header>
        
        
        <!-- Main content -->
        <section class="container">


            <div class="col-sm-12 asagi">
                <div class="row">
                         <?php
                    include("fonksiyonlar/if.php");
                   ?>

                 
                </div>
            </div>

                
        </section>
        
 

        <footer class="footer">
            <section class="container">
                
       
                <div class="col-xs-12 col-md-6">
                    <div class="footer-info">
                   

                     
                        
                        <div class="clearfix"></div>
                        <p class="copy">&copy; Ağrı Tanıtımı, 2017. All rights reserved.</p>
                    </div>
                </div>
            </section>
        </footer>
    </div>


	 <script type="text/javascript">
              $(document).ready(function() {
                init_Home();
              });
		    </script>

</body>
</html>
