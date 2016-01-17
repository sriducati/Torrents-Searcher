<?php

//$url = file_get_contents("https://torrentz.eu/search?f='.$_POST['name'].'&p='.$_POST['page']");
//$url = file_get_html("https://torrentz.eu/search?q=film");


function get_dataa($url) {
  $ch = curl_init();
  $timeout = 5;
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0)");
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,false);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);
  curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
  $data = curl_exec($ch);
  curl_close($ch);
  return $data;
}
$variableee = get_dataa('https://torrentz.eu/'.$_POST["name"]);


echo $variableee;
//return $variableee;



?>