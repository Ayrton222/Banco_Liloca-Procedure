<?php

    if(!empty($_GET['idProduto']))
    {
        include_once('config.php');

        $id = $_GET['idProduto'];

        $sqlDelete = "CALL delete_produto($id)";

        $result = $conexao->query($sqlDelete);

        
    header('Location: gerenciarProduto.php');
    }
?>