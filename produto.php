
<?php
    $bolo = 10.00;
?>

<?php
include_once('a.php');
$a = $_GET['idCliente'];
?>


<?php

if(isset($_POST['submit']))
{
    include_once('config.php');

    $boloC = $_POST['boloC']; 
    $quantC = $_POST['quant_chocolate'];
    $salgadoC = $_POST['coxinha'];
    $quantSalgC = $_POST['quant_coxinha'];
    $refriC = $_POST['coca'];
    $quantRefriC = $_POST['quant_coca'];
    $idcliente = $_POST['Cliente_idCliente'];
    //print_r($_POST['valorC']);

    $result = mysqli_query($conexao, "CALL inserir_produto  ('$idcliente','$boloC','$salgadoC','$refriC','$quantC','$quantSalgC','$quantRefriC','$bolo')");
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produto</title>

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/produto.css">
</head>
<body>
    <div class="titulo">
        Cadastro de Produto
    </div>

    <div class="conteudo">
        <form action="produto.php" method="post">
            
        <span class="bolo">Bolos:</span>
            <div class="a">
            <input type="text" name="boloC" class="check">
            <span class="valor"><?php  echo "{$bolo}"?></span>
            </label>
            
            <span class="valor_unitSalgado">Valor unitario R$:</span>   

            <span class="quantidade">Quantidade:</span>
            <div class="quantt">
            <input type="text" name="quant_chocolate" class="quant" >
            </div>

            <div class="salgados">
                <span class="salgado-title">Salgados:</span>

                <label class="salgado principal">
                    <input type="text" name="coxinha"  class="checkSalgado" >
                    <span class="valorSalgado"><?php  echo "{$bolo}"?></span>
                </label>

                <span class="valor_unitSalgado sal">Valor unitario R$:</span>   

                <span class="quantidadeSalgado">Quantidade:</span>
                <div class="quanttSalgado">
                <input type="text" name="quant_coxinha" class="quant salg">
                </div>

            </div>

            <div class="refrigerantes">
                <span class="refrigerante-title">Refrigerantes:</span>

                <label class="refrigerante principal">
                    <input type="text" name="coca"   class="checkSalgado ref" >
                    <span class="valorRefri"><?php  echo "{$bolo}"?></span>
                </label>

                
                <span class="valor_unitRefri">Valor unitario R$:</span>   

                <span class="quantidadeRefri">Quantidade:</span>
                <div class="quanttRefri">
                <input type="text" name="quant_coca" class="quant refri">
                </div>

            </div>
            <input type="hidden" name="Cliente_idCliente" id="aniversariante" value =<?php echo $a ?>>
            <input type="submit" name="submit" id="submit" class="button" onclick="recarregar()"></input>

        </form>
    </div>


    <script>

        function recarregar(){

            var confirmar = confirm("Deseja realizar mais algum  pedido?")
            if(confirmar){
                alert("Pode realizar o pedido")
            }else{
                alert("Pedido realizado com sucesso")
            }
        }
    </script>
</body>
</html>