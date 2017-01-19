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

$img = imagecreatetruecolor(80,110);

$purple = imagecolorallocate($img, 0xff, 0xff, 0xff);
imagefill($img, 0, 0, $purple);
imagecolortransparent($img, $purple);

file_put_contents('temp/'.$usuario.'-arma.png', getimg('http://www.habbo.com.br/habbo-imaging/avatarimage?user='.$usuario.'&direction=4&head_direction=4&action=crr=0'));

$habbo = imagecreatefrompng('temp/'.$usuario.'-arma.png') ;
imagecopy($img, $habbo, 16, 0, 0, 0, imagesx($habbo), imagesy($habbo));

$arma = imagecreatefrompng('images/arma.png');
imagecopy($img, $arma, 0, 0, 0, 0, imagesx($arma), imagesy($arma));


imagepng($img);
imagedestroy($img);
?>