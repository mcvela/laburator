<?php
class UrlFriendly
{
   
    public static function stringToUrl($string)
    {
	    //if (mb_detect_encoding($string)!="utf-8") $string=utf8_encode($string);
		$url =$string;
		$url = strtolower($url);
		$find = array('á', 'é', 'í', 'ó', 'ú', 'ñ');
		$repl = array('a', 'e', 'i', 'o', 'u', 'n');
		$url = str_replace ($find, $repl, $url);
		$find = array(' ', '&', '\r\n', '\n', '+');
		$url = str_replace ($find, '-', $url);
		$find = array('/[^a-z0-9\-<>]/', '/[\-]+/', '/<[^>]*>/');
		$repl = array('', '-', '');
		$url = preg_replace ($find, $repl, $url);
		$slug=$url;
		 
		 //$slug=$slug."_".mb_detect_encoding($string);
	    //$slug = preg_replace('@[\s!:;_\?=\\\+\*/%&#]+@', '-', $string);
		
	
        //this will replace all non alphanumeric char with '-'
		$slug = mb_strtolower($slug);
			  //convert string to lowercase
		$slug = trim($slug, '-');
			  //trim whitespaces
		//echo $slug;	

        return $slug;
        
    }
	

    
}
