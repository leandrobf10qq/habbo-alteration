<?php

//
// Desenvolvido por. Leandro ( whats: 61 9>84936862 )
// Deixar creditos, demorou para ser desenvolvido
//


error_reporting(0);

header("Content-type:image/png");


if (isset($_GET['usuario'])) {
  $usuario = $_GET['usuario'];
} else {
  $usuario = 'malocopo';
}


function getimg($url) {
    $options = array(
        'http'=>array(
            'method'=> "GET",
            'header'=> "Accept-language: en\r\n" .
            'User-Agent: ' .$_SERVER['HTTP_USER_AGENT']. "\r\n"
        )
    );
    $context = stream_context_create($options);
    return file_get_contents($url, false, $context);
}

$img = imagecreatetruecolor(102,112);

$purple = imagecolorallocate($img, 0xff, 0xff, 0xff);
imagefill($img, 0, 0, $purple);
imagecolortransparent($img, $purple);

file_put_contents('temp/'.$usuario.'-cavalo.png', getimg('http://www.habbo.com.br/habbo-imaging/avatarimage?user='.$usuario.'&action=sit,drk=0&gesture=sml&headonly=1'));


$cavalo = imagecreatefrompng('images/cavalo.png');
imagecopy($img, $cavalo, 0, 0, 0, 0, imagesx($cavalo), imagesy($cavalo));

$habbo = imagecreatefrompng('temp/'.$usuario.'-cavalo.png') ;
imagecopy($img, $habbo, 13, 10, 0, 0, imagesx($habbo), imagesy($habbo));

imagepng($img);
imagedestroy($img);
?>