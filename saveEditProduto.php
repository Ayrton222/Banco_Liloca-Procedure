<?php
    // isset -> serve para saber se uma variável está definida
    include_once('config.php');
    if(isset($_POST['update']))
    {
        $id = $_POST['idProduto'];
        $boloC = $_POST['boloC'];
        $quantidadeB = $_POST['quant_chocolate'];
        $salgado = $_POST['coxinha'];
        $quantidadeS = $_POST['quant_coxinha'];
        $refrigerante = $_POST['coca'];
        $quantidadeR = $_POST['quant_coca'];

        $sqlInsert = "UPDATE produto
        SET bolo_chocolate='$boloC',quantidade_boloC='$quantidadeB',salgado_coxinha='$salgado',quantidade_salgadoC='$quantidadeS',
        refrigeranteC='$refrigerante',quantidade_refriC='$quantidadeR'  WHERE idProduto=$id";
        $result = $conexao->query($sqlInsert);
        print_r($result);
    }
    header('Location: produto.php');

?>