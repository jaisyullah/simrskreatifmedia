<?php
function SC_Mail_Image($mens_orig, $Mens_Mail)
{
   $controle  = 0;
   $str_saida = "";
   while ($controle != 1)
   {
       $pos = strpos(strtolower($mens_orig), "<img ");
       if ($pos === false)
       {
           $str_saida .= $mens_orig;
           $controle = 1;
       }
       else
       {
           $parte1 = substr($mens_orig, 0, $pos);
           $parte2 = substr($mens_orig, $pos);
           $pos = strpos(strtolower($parte2), "src=");
           if ($pos === false)
           {
               $str_saida .= $parte1;
               $mens_orig  = $parte2;
           }
           else
           {
               $parte1 .= substr($parte2, 0, $pos + 4);
               $parte2  = trim(substr($parte2, $pos + 4));
               $delim   = substr($parte2, 0, 1);
               $parte1 .= $delim;
               $parte2  = trim(substr($parte2, 1));
               $pos = strpos($parte2, $delim);
               $str_saida .= $parte1;
               if ($pos === false)
               {
                   $mens_orig  = $parte2;
               }
               else
               {
                   $arq    = trim(substr($parte2, 0, $pos));
                   $parte2 = trim(substr($parte2, $pos));
                   if (strtolower(substr($arq, 0, 7) != "http://") && strtolower(substr($arq, 0, 8) != "https://"))
                   {
                       $type_img = explode(".", $arq);
                       $type_img = end($type_img);
                       $str_saida .= $Mens_Mail->embed(Swift_Image::newInstance($arr[2], 'image.'.$type_img, 'image/'.end($type_img)));
                   }
                   else
                   {
                       $str_saida .= $arq;
                   }
                   $mens_orig = $parte2;
               }
           }
       }
   }
   return $str_saida;
}

function SC_Mail_Address($addres_orig)
{
   $pos  = strpos($addres_orig, "<");
   $pos1 = strpos($addres_orig, ">");
   if ($pos === false || $pos1 === false)
   {
       return array($addres_orig, "");
   }
   else
   {
       return array(substr($addres_orig, $pos + 1, $pos1 - $pos - 1), substr($addres_orig, 0, $pos) . substr($addres_orig, $pos1 + 1));
   }
}
function SC_Mail_Address_array_api($addres_orig, $str_type)
{
  $arr_emails = array();

  $arr_to_ = explode(';', $addres_orig);        
  foreach ($arr_to_ as $str_to_)
  {
      $str_to_ = trim($str_to_);
      if (!empty($str_to_))
      {
          $str_to_ = SC_Mail_Address($str_to_);

          $arr_emails[] = array('email' => $str_to_[0], 'name' =>$str_to_[1], 'type' => $str_type);
      }
  }

  return $arr_emails;
}
?>