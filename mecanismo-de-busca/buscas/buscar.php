<?php 

include_once '../includes/conexao.php';


$palavra = $_POST['palavra'];


$query = "SELECT * FROM TABELA WHERE CAMPO LIKE '%$palavra%' OR CAMPO LIKE '%$palavra%'";
$resul = mysqli_query($conn, $query) or die();


if(mysqli_num_rows($resultado) <= 0){


    echo"";



}else{




    while($dados = mysqli_fetch_array($resultado)){


        echo"<tr>";
                                                    
        echo"<td>".utf8_encode($dados['CAMPO'])."</a></td>";
        echo"<td>".utf8_encode($dados['CAMPO'])."</a></td>";

        echo"</tr>";    







    }






}