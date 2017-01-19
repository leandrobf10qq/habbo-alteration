<?php

/*
*
*Desenvolvido por. Leandro (Whats: 61 9>84936862);
*
*/

error_reporting(0);


$acao_array = array(
                  "bandeira" => "Bandeira",                  
                  "medico" => "Medico",
                  "lapis" => "Lapis",
                  "voz" => "Voz",
                  "balao" => "Balao",
                  "banana" => "Banana",
                  "fada" => "Fada",
                  "pirulito" => "Pirulito",
                  "chave" => "Chave",
                  "arma" => "Arma",
                  "microfone" => "Microfone",
                  "camera" => "Camera",
                  "morto" => "Morto",
                  "comendo" => "Comendo",
                  "skate" => "Skate",
                  "cavalo" => "Cavalo",
                  "queijo" => "Queijo",
                  "doende" => "Gnomo",
                  "noel" => "Papai Noel"
                 );




if($_POST){

@$habboname = $_POST['habbo'];
@$acao =  $_POST['acao'];

  if ($habboname == ''|| $acao == '')
  {
    $result = "Ops, preencha todos os campos.";
  }
else
  {
    $result = '<br><br><center><img src="Habbo-'.$acao.'.php?usuario='.$habboname.'" /></center><br>';
  }


if (isset($result))
{
  echo $result."<br />\n";
}

}
?>
<center>
<form method="post">
  <label>Habbo:</label>
  <input name="habbo" type="text" placeholder="Malocopo" <?php if($_POST){ echo 'value="'.$_POST['habbo'].'"'; } ?> /><br />
    <label>Ação</label>
  <select name="acao">
<?php
foreach ($acao_array as $key => $value)
{
    $select = 'selected';
  echo "      <option value=\"$key\" ".($key == $_POST['acao'] ? $select : '')."  >$value</option>\n";
}
?>
    </select><br />
    <input type="submit" name="render" value="Submit" />
</form>


<br>
<br>

<b><p>As cores dos Balões não foi codificada nesta index, pode ser adicionado. Veja(Leia.txt); <br>
Desenvolvido por Leandro</p></b>

</center>
