<?php

//code by ferym (https://m.habr.com/ru/users/ferym/)                                                //adapted and modded by oposssum

set_time_limit(0); 
ob_implicit_flush();

function random_string($length)
{ 
$chars = "abcdefghijklmnopqrstuvwxyz1234567890";
$numChars = strlen($chars); 
$string = ''; 
for ($i = 0; $i < $length; $i++) {
  $string.= substr($chars, rand(1, $numChars) - 1, 1);
}
return $string;
}

function get_http_response_code($url) { 
$headers = get_headers($url);
return substr($headers[0], 9, 3);
}

echo "Enter storage to save pics to: ";
$storage = readline();

if (!file_exists($storage)) { 
mkdir($storage, 0777);
}

$options = array(
'http' => array(
  'method' => "GET",
  'header' => "Accept-language: en\r\n" . "User-Agent: Mozilla/5.0 (iPad; U; CPU OS 3_2 like Mac OS X; en-us) AppleWebKit/531.21.10 (KHTML, like Gecko) Version/4.0.4 Mobile/7B334b Safari/531.21.102011-10-16 20:23:10\r\n"
)
);
$context = stream_context_create($options);

while (1) {
$randstring = random_string(5); 
$htmldata = file_get_contents('https://prnt.sc/m' . $randstring, false, $context);
preg_match_all('/<meta name=\"twitter:image:src\" content=\"(.*?)\"\/>/is', $htmldata, $img_url);
if (strlen($img_url[1][0]) > 1) {
  $imgs = str_replace('//st.prntscr', 'https://st.prntscr', $img_url[1][0]);
  $localname = array_pop(explode('/', $img_url[1][0]));
  $localpath = $storage . $localname;
  if (get_http_response_code($imgs) != "200") {
	  echo "Error
";
  } else {
   file_put_contents($localpath, file_get_contents($imgs, false, $context));
   echo "Downloading...
";
  }
} else {
	echo "Error
";
}
}
?>
