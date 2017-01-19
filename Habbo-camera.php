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

$img = imagecreatetruecolor(64,110);

$purple = imagecolorallocate($img, 0xff, 0xff, 0xff);
imagefill($img, 0, 0, $purple);
imagecolortransparent($img, $purple);

file_put_contents('temp/'.$usuario.'-camera.png', getimg('http://www.habbo.com.br/habbo-imaging/avatarimage?user='.$usuario.'&gesture=sml'));

$habbo = imagecreatefrompng('temp/'.$usuario.'-camera.png') ;
imagecopy($img, $habbo, 0, 0, 0, 0, imagesx($habbo), imagesy($habbo));

$camera = imagecreatefrompng('images/camera.png');
imagecopy($img, $camera, 0, 0, 0, 0, imagesx($camera), imagesy($camera));


imagepng($img);
imagedestroy($img);
?>