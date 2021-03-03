<?php
	header("Content-type: image/png");
	$im = imagecreatefromjpeg( "assinatura.jpg" );
	$green = imagecolorallocate($im, 108, 169, 56);
	$blue = imagecolorallocate($im, , 56, 118);
  
 
  // Texto que será escrito na imagem
    
	$nome = urldecode( $_GET['nome'] );
	$cargo = urldecode( $_GET['cargo'] );
	$email = urldecode( $_GET['email'] );
	$telefone = urldecode( $_GET['telefone'] );

    $nome = str_replace(' ', '', $nome);
    $nome = preg_replace("/[^a-zA-Z0-9_]/", "", strtr($nome, "áàãâéêíóôõúüçñÁÀÃÂÉÊÍÓÔÕÚÜÇÑ ", "aaaaeeiooouucnAAAAEEIOOOUUCN_"));
  
  // Replace path by your own font path
	imagettftext($im, 10, , 260, 30, $blue, "tahomabd.ttf", $nome);
	imagettftext($im, 10, , 260, 53, $green, "tahoma.ttf", $cargo);
	imagettftext($im, 10, , 260, 79, $blue, "tahomabd.ttf", $email);
	imagettftext($im, 10, , 260, 102, $green, "tahoma.ttf", $telefone);
	imagejpeg($im);
	imagedestroy($im);

    // filtra o nome, pois alguns caracteres não são permitidos em nome de
// arquivo, e também sem esse filtro seria possível salvar o arquivo em
// qualquer pasta do servidor (ex: se alguém mal intencionado digita um
// nome como "Marco/../../temp/Teste", // o arquivo seria salvo na pasta temp)
    $nomeArquivo = pathinfo($nome, PATHINFO_FILENAME);
    $pasta = "/caminho-para-salvar/";
    imagejpeg($im, "{$pasta}/{$nomeArquivo}.jpg");
?>
