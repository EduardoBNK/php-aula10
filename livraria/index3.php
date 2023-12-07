<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
echo "<h2> Clientes </h2>";
 
// tipo do banco -> msql
// host -> localhost
// banco de dados -> aulapdo
// senha -> não tem
 function consultado(){
$conexao = new PDO("mysql:host=localhost;dbname=livraria", "root" , ""); // estamos abrindo a porta de coneção para o banco
 
// var_dump($conexao);
 
$select = "SELECT * FROM clientes";
 
$resultado = $conexao->query($select);
$consulta = $resultado->fetchAll();
 
 
 
 
echo '<ul>';
foreach ($consulta as $linha) {
 
echo '<li>'. $linha['nome'] .  '</li>';
echo '<li>'. $linha['endereço'] .  '</li>';
echo '<li>'. $linha['cpf'] .  '</li>';
echo '<li>'. $linha['telefone'] .  '</li>';
 
}
 
echo '</ul>';
// var_dump($consulta);
foreach($consulta as $linha){
    echo '<hr> <pre>';
    echo $linha['nome'];
    echo $linha['endereço'];
    echo $linha['cpf'];
    echo $linha['telefone'];
}
}
consultado()
?>
</body>
</html>