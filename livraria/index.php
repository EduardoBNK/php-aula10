<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livraria</title>
</head>
<body>
    
<?php
echo "<h2> livros </h2>";
 
// tipo do banco -> msql
// host -> localhost
// banco de dados -> aulapdo
// senha -> não tem

function consultado(){

$conexao = new PDO("mysql:host=localhost;dbname=livraria", "root" , ""); // estamos abrindo a porta de coneção para o banco

// var_dump($conexao);
     
     $select = "SELECT * FROM livros";
     
     $resultado = $conexao->query($select);
     $consulta = $resultado->fetchAll();
     
     

         
         echo '<ul>';
         foreach ($consulta as $linha) {
             
             echo '<li>'. $linha['nomedolivro'] .  '</li>';
             
         echo '<li>'. $linha['namedoautor'] .  '</li>';
         
        }
        
        echo '</ul>';
        // var_dump($consulta);
        
        
        foreach($consulta as $linha){
            echo '<hr> <pre>';
            echo $linha['nomedolivro'];
            echo $linha['namedoautor'];
        }
    }
        consultado();

    function inserir($nome, $ano){

        $conexao1 = new PDO("mysql:host=localhost;dbname=livraria", "root" , "");

     $inserir = " INSERT INTO tb_livros (nome, ano_lancamento) VALUES (:ano_lancamento, :nome)";

     $nome = "o navio de teseu";
     $ano = "2015";

     $preparacao = $conexao1->prepare($inserir);

     $preparacao->bindParam(":nome",$nome);

     $preparacao->bindParam(":ano_lancamento", $ano);

     $preparacao->execute();

    }
        inserir("O vendedor de sonhos","2010");

        ?>


        



</body>
</html>