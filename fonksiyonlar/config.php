<?php
$host="localhost";
$username="root";
$vt="memleketim";
$baglan=mysql_connect($host,$username,"")or die("Sunucuya bağlanılamadı".mysql_error());
mysql_select_db($vt,$baglan)or die("Veritabanı bulunamadı".mysql_error());
mysql_query("SET NAME 'UTF8'");
mysql_query("SET character_set_connection='UTF8'");
mysql_query("SET character_set_client='UTF8'");
mysql_query("SET character_set_results='UTF8'");
?>