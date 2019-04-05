<?php
    session_start();

    $totalProdutos = 0;

    if( isset( $_SESSION['produtos'] ) ){

        foreach($_SESSION['produtos'] as $indice => $valor){

            $totalProdutos += $valor['quantidade'];

        }
        
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf8" />
        <title>Carrinho de Compras</title>

        <style>
            .bg-gray{
                background-color: #e4e4e4;
            }
            .padding-5{
                padding: 5px;
            }
            .items-cart{
                color: red;
            }
            .text-right{
                text-align: right;
            }
            .text-center{
                text-align: center;
            }
            .clearfix{
                clear: both;
            }
        </style>

    </head>
    <body>

        <div class="row padding-5 bg-gray">
            <p class="text-right">
                Itens no carrinho: 
                <span class="items-cart">
                    <?= $totalProdutos ;?>
                </span>
            </p>
        </div>

        <div class="padding-5"></div>

        <div class="row padding-5 bg-gray text-center">
            <h3>Produtos</h3>
        </div>

        <div class="row">
            <div class="col-6">

                <?php for($i = 1; $i < 6; $i++){ ?>                        
                
                    <div class="produto">
                        <p>Produto <?= $i; ?></p>
                        <p>
                            Valor: 
                            <b>R$ 1.500,00</b>
                        </p>

                        <a href="adicionarProduto.php?idProduto=<?=$i;?>">Adicionar Produto</a>
                    </div>
                <?php } ?>

            </div>
        </div>

    </body>
</html>
