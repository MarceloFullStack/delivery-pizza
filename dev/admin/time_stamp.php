
<?php
//Srinivas Tamada http://9lessons.info
//Loading Comments link with load_updates.php 
function time_stamp($session_time) 
{ 
 
$time_difference = time() - $session_time ; 
$seconds = $time_difference ; 
$minutes = round($time_difference / 60 );
$hours = round($time_difference / 3600 ); 
$days = round($time_difference / 86400 ); 
$weeks = round($time_difference / 604800 ); 
$months = round($time_difference / 2419200 ); 
$years = round($time_difference / 29030400 ); 

if($seconds <= 60)
{
echo"h&aacute; $seconds segundos"; 
}
else if($minutes <=60)
{
   if($minutes==1)
   {
     echo" h&aacute; 1 minuto"; 
    }
   else
   {
   echo"h&aacute; $minutes minutos"; 
   }
}
else if($hours <=24)
{
   if($hours==1)
   {
   echo"h&aacute; 1 hora";
   }
  else
  {
  echo"h&aacute; $hours horas";
  }
}
else if($days <=7)
{
  if($days==1)
   {
   echo"h&aacute; 1 dia";
   }
  else
  {
  echo"h&aacute; $days dias";
  }


  
}
else if($weeks <=4)
{
  if($weeks==1)
   {
   echo"h&aacute; 1 semana";
   }
  else
  {
  echo"h&aacute; $weeks semanas";
  }
 }
else if($months <=12)
{
   if($months==1)
   {
   echo"h&aacute; 1 m&ecirc;s";
   }
  else
  {
  echo"h&aacute; $months meses";
  }
 
   
}

else
{
if($years==1)
   {
   echo"h&aacute; 1 ano";
   }
  else
  {
  echo"h&aacute; $years anos";
  }


}
 


} 



?>
