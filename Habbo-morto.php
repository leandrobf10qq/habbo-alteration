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

$img = imagecreatetruecolor(110,79);

$purple = imagecolorallocate($img, 0xff, 0xff, 0xff);
imagefill($img, 0, 0, $purple);
imagecolortransparent($img, $purple);

file_put_contents('temp/'.$usuario.'-morto.png', getimg('http://www.habbo.com.br/habbo-imaging/avatarimage?user='.$usuario.'&direction=4&head_direction=4&action=lay&gesture=eyb'));

$habbo = imagecreatefrompng('temp/'.$usuario.'-morto.png') ;
imagecopy($img, $habbo, -2, 14, 0, 0, imagesx($habbo), imagesy($habbo));

$morto = imagecreatefrompng('images/morto.png');
imagecopy($img, $morto, 0, 0, 0, 0, imagesx($morto), imagesy($morto));





imagepng($img);
imagedestroy($img);
?>