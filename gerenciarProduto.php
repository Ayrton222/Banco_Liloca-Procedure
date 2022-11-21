
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Produto</title>
</head>
<body>
<?php
    include_once('config.php');
 $sql = "CALL consulta_produto(@p0)";
 $result = $conexao->query($sql);
    ?>

<table border="1">

     <tr>
         <td>Código</td>
         <td>Codigo Cliente</td>
         <td>Bolo</td>
         <td>Quantidade</td>
         <td>Valor unitario Bolo</td>
         <td>Salgado</td>
         <td>Quantidade</td>
         <td>Valor unitario Salgado</td>
         <td>Bebida</td>
         <td>Quantidade</td>
         <td>Valor unitario Refrigerante</td>
        
         <?php
                    while($user_data = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>".$user_data['idProduto']."</td>";
                        echo "<td>".$user_data['Cliente_idCliente']."</td>";
                        echo "<td>".$user_data['bolo_chocolate']."</td>";
                        echo "<td>".$user_data['quantidade_boloC']."</td>";
                        echo "<td>".$user_data['valor_unit']."</td>";   
                        echo "<td>".$user_data['salgado_coxinha']."</td>";
                        echo "<td>".$user_data['quantidade_salgadoC']."</td>";
                        echo "<td>".$user_data['valor_unit']."</td>";
                        echo "<td>".$user_data['refrigeranteC']."</td>";
                        echo "<td>".$user_data['quantidade_refriC']."</td>";
                        echo "<td>".$user_data['valor_unit']."</td>";
                        echo "<td>
                        <a href='editarProduto.php?idProduto=$user_data[idProduto]' title='Editar'>Editar</a> |
                        <a href='deleteProduto.php?idProduto=$user_data[idProduto]' title='Deletar'>Deletar </a>";
                        echo "</tr>";

                    }
                    ?>
 </tr>
 </table>

</body>
</html>