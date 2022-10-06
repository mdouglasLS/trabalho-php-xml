<?php

    $dataUsuario = strtotime($_GET['dataUsuario']);
    $dataUsuario = date('m/d', $dataUsuario);

    $signos = simplexml_load_file('SignosXML.xml');

    $signoResult = [];

    // Função responsável por comparar a data de nascimento da pessoa com as datas de INÍCIO E FINAL de cada signo
    function compararDatas(string $dataInicio, string $dataFim, string $dataUsuario): bool
    {
      $dataUsuario = strtotime($dataUsuario);
      $dataInicio = converterDataSigno($dataInicio);
      $dataFim    = converterDataSigno($dataFim);

      $condInicio = $dataUsuario >= $dataInicio;
      $condFinal = $dataUsuario <= $dataFim;

      $retorno = false;

      if($dataInicio > $dataFim) {
        $retorno = $condInicio || $condFinal;
      } else {
        $retorno = $condInicio && $condFinal;
      }
            
      return $retorno;
    }

    // Função que recebe uma data no formato de string com "d/m" e converte para "m/d" retornando um int de strtotime
    function converterDataSigno(string $date): int
    {
      $exDate = explode('/', $date);
      $invertDate = $exDate[1] . '/' . $exDate[0];
      return strtotime($invertDate);
    } 

    // Função responsável por retornar a URL da imagem de cada signo
    function getImagemSigno(string $nomeSigno): string 
    {
      $nome = iconv('UTF-8', 'ASCII//TRANSLIT', $nomeSigno);
      $nome = strtolower($nome);
      $urlImage = "https://d15m0zxbu4pm77.cloudfront.net/icones/estudos/signos/{$nome}/medio_{$nome}.png";
      return $urlImage;
    }

    foreach($signos->signo as $signo) {
        
      if(compararDatas($signo->dataInicio, $signo->dataFim, $dataUsuario)) { 
     
        $signoResult = [
          'nome' => $signo->signoNome,
          'descricao' => $signo->descricao,
          'dataInicio' => $signo->dataInicio,
          'dataFim' => $signo->dataFim,
          'imagem' => getImagemSigno($signo->signoNome),
        ];

      }

    }

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Horóscopo</title>

    <style>
      body{
        background-image: url('https://cdn.hovia.com/app/uploads/horoscope-signs-zodiac-wallpaper-mural-Plain.jpg');
        background-attachment: fixed;
        background-size: 100%;
      }

      .max-w{
        max-width: 650px;
      }

      .btn{
        background: rgb(0,19,26);
        background: linear-gradient(90deg, rgba(0,19,26,1) 0%, rgba(1,67,88,1) 56%, rgba(2,87,92,1) 100%);
        color: #fff;
      }

      .btn:hover{
        background: rgb(0,36,50);
        background: linear-gradient(90deg, rgba(0,36,50,1) 0%, rgba(2,89,117,1) 56%, rgba(5,119,126,1) 100%);
        color: #fff;
      }
    </style>

  </head>
  <body class="p-5">
    
    <div style="opacity: 98%;" class="position-absolute top-50 start-50 translate-middle bg-white rounded shadow p-5 max-w">
        <h1 class="text-center">Horóscopo</h1>
        <hr>
                
        <div class="row">
            <div class="col-sm-12 col-lg-8">
            <h2>Seu signo: <?= $signoResult['nome'] ?></h2>
            <p><?= $signoResult['descricao'] ?></p>
            </div>
            
            <img style="max-width: 180px;" class="col-sm-12 col-lg-4 mx-auto" src="<?= $signoResult['imagem'] ?>">
        </div>
        
        <p class="mt-3 fw-bold fst-italic">de <?= $signoResult['dataInicio'] ?> | até <?= $signoResult['dataFim'] ?></p>
        <a class="btn mt-3 w-50" href="http://localhost:8000">Voltar</a>
    </div>
    
  </body>
</html>