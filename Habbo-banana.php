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

$img = imagecreatetruecolor(64,111);

$purple = imagecolorallocate($img, 200, 0, 200);
imagefill($img, 0, 0, $purple);
imagecolortransparent($img, $purple);

file_put_contents('temp/'.$usuario.'-banana.png', getimg('https://www.habbo.com.br/habbo-imaging/avatarimage?&user='.$usuario.'&action=std&direction=3&head_direction=3&img_format=png&gesture=sml&headonly=0&size=b'));

$habbo = imagecreatefrompng('temp/'.$usuario.'-banana.png') ;
imagecopy($img, $habbo, 0, 0, 0, 0, imagesx($habbo), imagesy($habbo));

$banana = imagecreatefrompng('images/banana.png');
imagecopy($img, $banana, 0, 0, 0, 0, imagesx($banana), imagesy($banana));


imagepng($img);
imagedestroy($img);
?>