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

$img = imagecreatetruecolor(90,116);

$purple = imagecolorallocate($img, 200, 0, 200);
imagefill($img, 0, 0, $purple);
imagecolortransparent($img, $purple);

$lapis = imagecreatefrompng('images/lapis.png');
imagecopy($img, $lapis, 0, 0, 0, 0, 90, 116);

file_put_contents('temp/'.$usuario.'-lapis.png', getimg('https://www.habbo.com.br/habbo-imaging/avatarimage?&user='.$usuario.'&action=sit&direction=4&head_direction=4&img_format=png&gesture=sml&headonly=0&size=b'));

$habbo = imagecreatefrompng('temp/'.$usuario.'-lapis.png') ;
imagecopy($img, $habbo, 19, 1, 0, 0, 64, 110);


imagepng($img);
imagedestroy($img);
?>