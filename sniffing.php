<! DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
       <?php

$mobile_browser= '0';

if(preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|android)/i',  
strtolower($_SERVER['HTTP_USER_AGENT']))){  
$mobile_browser++;  
}

if((strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml')>0) or   
((isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE'])))){  
$mobile_browser++;  
}  
  
$mobile_ua= strtolower(substr($_SERVER['HTTP_USER_AGENT'],0,4));  
$mobile_agents= array(  
'w3c ','acs-','alav','alca','amoi','audi','avan','benq','bird','blac',  
'blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno',  
'ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-',  
'maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-',  
'newt','noki','oper','palm','pana','pant','phil','play','port','prox',  
'qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar',  
'sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-',  
'tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp',
'wapr','webc','winw','winw','xda','xda-'); 

if(in_array($mobile_ua,$mobile_agents)){ 
$mobile_browser++; 
} 
if (strpos(strtolower($_SERVER['ALL_HTTP']),'OperaMini')>0) { 
$mobile_browser++; 
} 
if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']),'windows')>0) { 
$mobile_browser=0; 
} 
if($mobile_browser>0){ 
echo "<div><img src='Images/phones.jpg' alt='phone'></div>";
} else { 
echo "<div><img src='Images/laptop.jpg'  alt='laptop'></div>";
} 
        ?>
    </body>
</html>
