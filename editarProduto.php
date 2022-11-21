
<?php
    $bolo = 10.00;
?>
<?php
    include_once('config.php');

    if(!empty($_GET['idProduto']))
    {
        $id = $_GET['idProduto'];
        $sqlSelect = "SELECT * FROM produto WHERE idProduto=$id";
        $result = $conexao->query($sqlSelect);
        if($result->num_rows > 0)
        {
            while($user_data = mysqli_fetch_assoc($result))
            {
                $id = $user_data['idProduto'];
                $boloC = $user_data['bolo_chocolate'];
                $quantC = $user_data['quantidade_boloC'];
                $salgadoC = $user_data['salgado_coxinha'];
                $quantSalgC = $user_data['quantidade_salgadoC'];
                $refriC = $user_data['refrigeranteC'];
                $quantRefriC = $user_data['quantidade_refriC'];
            }
        }
        else
        {
            header('Location: produto.php');
        }

    }

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comida</title>

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/produto.css">

</head>
<body>
<div class="titulo">
        Cadastro de produto
    </div>

    <div class="conteudo">
        <form action="saveEditProduto.php" method="post">
    
        <input type="hidden" name="idProduto" id="aniversariante" value=<?php echo $id;?>>
        <span class="bolo">Bolos:</span>
            <div class="a">
            <input type="text" name="boloC" class="check" value=<?php echo $boloC;?>>
            <span class="valor"><?php  echo "{$bolo}"?></span>
            </label>
            
            <span class="valor_unitSalgado">Valor unitario R$:</span>   

            <span class="quantidade">Quantidade:</span>
            <div class="quantt">
            <input type="text" name="quant_chocolate" class="quant" value=<?php echo $quantC;?>>
            </div>

            <div class="salgados">
                <span class="salgado-title">Salgados:</span>

                <label class="salgado principal">
                    <input type="text" name="coxinha"  class="checkSalgado" value=<?php echo $salgadoC;?> >
                    <span class="valorSalgado"><?php  echo "{$bolo}"?></span>
                </label>

                <span class="valor_unitSalgado sal">Valor unitario R$:</span>   

                <span class="quantidadeSalgado">Quantidade:</span>
                <div class="quanttSalgado">
                <input type="text" name="quant_coxinha" class="quant salg" value=<?php echo $quantSalgC;?>>
                </div>

            </div>

            <div class="refrigerantes">
                <span class="refrigerante-title">Refrigerantes:</span>

                <label class="refrigerante principal">
                    <input type="text" name="coca"   class="checkSalgado ref" value=<?php echo $refriC;?> >
                    <span class="valorRefri"><?php  echo "{$bolo}"?></span>
                </label>

                
                <span class="valor_unitRefri">Valor unitario R$:</span>   

                <span class="quantidadeRefri">Quantidade:</span>
                <div class="quanttRefri">
                <input type="text" name="quant_coca" class="quant refri" value=<?php echo $quantRefriC;?>>
                </div>

            </div>
        

            <input type="hidden" name="id" value=<?php echo $id;?>>
            <input type="submit" name="update" id="update" class="button"></input>
 
        </form>
    </div>
</body>
</html>
