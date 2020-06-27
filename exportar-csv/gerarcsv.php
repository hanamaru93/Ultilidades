<?php

$pdo = new PDO('mysql:host=localhost;dbname=sedapagr_sistema', 'sedapagr_admin', 'sedapsite@1982*');

    //COLUNAS
    $columns = $pdo->prepare("SELECT COLUMN_NAME FROM information_schema.COLUMNS WHERE TABLE_SCHEMA='sedapagr_sistema' AND TABLE_NAME='dados_vacina'");
    $columns->execute();
    $results_columns = $columns->fetchAll(PDO::FETCH_COLUMN,0);

    //DADOS

    /*$FILTRO = $_GET['FILTRO'];


    if($FILTRO == ''){

        $stmt = $pdo->prepare('SELECT * FROM TABELA'); 

    }else{

        $stmt = $pdo->prepare("SELECT * FROM TABELA WHERE CAMPO = 'FILTRO' "); 

    }*/
    
    //caso não haja um filtro você pode inserir na proxima linha o $stmt = $pdo->prepare('SELECT * FROM TABELA'); 
      
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //CRIAÇÃO DO ARQUIVO CSV
    $from = fopen("relatorio.csv", 'wb');

    //ADICIONANDO O CABEÇALHO
    fwrite($from, '"'.implode('";"', $results_columns).'"'.PHP_EOL);

    //ADICIONANDO OS DADOS
    foreach ($results as $idx => $result) 
    {       
        //fputcsv( $from, $result );
        $results[$idx] = str_replace("\"", "\"\"", $result);        
        fwrite($from, '"'.implode('";"', $results[$idx]).'"'.PHP_EOL);
    }   
    fclose($from);

    header("Content-type: application/csv");   
    header("Content-Disposition: attachment; filename=relatorio.csv");   
    header("Content-Transfer-Encoding: binary");
    header("Pragma: no-cache");
    $path = "relatorio.csv";
    $from = fopen($path, 'r');
    $csv = fread($from, filesize($path));   
    fclose($from);
    echo $csv;

   

?>