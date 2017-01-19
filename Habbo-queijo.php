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

$img = imagecreatetruecolor(145,150);

$purple = imagecolorallocate($img, 200, 0, 200);
imagefill($img, 0, 0, $purple);
imagecolortransparent($img, $purple);

file_put_contents('temp/'.$usuario.'-queijo.png', getimg('http://www.habbo.com.br/habbo-imaging/avatarimage?&user='.$usuario.'&action=std&direction=4&head_direction=4&img_format=png&gesture=sml&headonly=0&size=b'));

$habbo = imagecreatefrompng('temp/'.$usuario.'-queijo.png') ;
imagecopy($img, $habbo, 29, 39, 0, 0, imagesx($habbo), imagesy($habbo));

$queijo = imagecreatefrompng('images/queijo.png');
imagecopy($img, $queijo, 0, 0, 0, 0, imagesx($queijo), imagesy($queijo));


imagepng($img);
imagedestroy($img);
?>