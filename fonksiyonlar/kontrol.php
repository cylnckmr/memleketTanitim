<?php
function temizle($metin)
{
	$gDeger=array("Ş","ş","Ç","ç","İ","ı","Ö","ö","Ü","?","<",">","\\");
	$dDeger=array("S","s","C","c","i","I","O","o","U","","","","");
    $gidenKod=str_replace($gDeger,$dDeger,$metin);
	return $gidenKod;
}
function temizle2($metin)
{
	$gDeger=array("?","<",">","'",'\"');
	$dDeger=array("","","","","");
    $gidenKod=str_replace($gDeger,$dDeger,$metin);
	return $gidenKod;
}
function cevir($metin)
{
	
	 $gDeger=array("i","ş","ç","ö","ı");
	 $dDeger=array("İ","Ş","Ç","Ö","I");
	 $gidenKod=str_replace($gDeger,$dDeger,$metin);
	 $dMetin=strtoupper($gidenKod);
	return  $dMetin;
}
?>