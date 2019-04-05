<?php

    //Startar a sessão
    session_start();

    // unset($_SESSION['produtos']);
    // exit;

    //Verificar se foi informado algum ID de Produto, se não foi, direciona para a pagina inicial
    if( !isset( $_GET['idProduto'] ) ){
        header('Location: index.php');
        exit;
    }

    //Receber o id do produto que foi selecionado para adição ao carrinho
    $idProduto = trim( $_GET['idProduto'] );

    //Se nao existir a sessao Produtos = Inicia ela como array
    if( !isset( $_SESSION['produtos'] ) ){
        $_SESSION['produtos'] = [];
    }

    //Se a sessão não for um array, Inicia ela como array
    if( !is_array( $_SESSION['produtos'] ) ) {
        $_SESSION['produtos'] = array();
    }
    
    //Criar array com os dados do produto
    $produtos = [
        'idProduto' => $idProduto,
        'quantidade' => 1
    ];

    //Verificar se a sessão é um array, se for percorra-a
    if( is_array( $_SESSION['produtos'] ) ) {

        //Contar quantos items tem na sessão
        $itemsSessao = count( $_SESSION['produtos'] );
       
        //Se não houver items na sessão adiciona um novo
        if( $itemsSessao == 0 ){

            //Adiciona Produto na Sessão
            array_push( $_SESSION['produtos'], $produtos );

           //Direciona para o Index
            header('Location: index.php');
            exit;
        }

        
        $exists = false;

        //Mais de 1 item na sessão
        foreach( $_SESSION['produtos'] as $chave => $valor ){

            //Verifica se o idProduto informado já existe na sessão
            if( $_SESSION['produtos'][$chave]['idProduto'] == $produtos['idProduto'] ){
                
                //Aumenta 1 na quantidade do Produto
                $_SESSION['produtos'][$chave]['quantidade'] += 1;
                
                /*Torna verdadeira a expressão que indica produto existente na sessão,
                evitando de adicionar o mesmo produto por varios indices na sessão */                
                $exists = true;
            }

        }

        //Se nao tem o produto na sessão, entao o adiciona
        if( $exists == false ){

            //Adiciona o produto
            array_push( $_SESSION['produtos'], $produtos );
            
            //Torna verdadeira a expressão de que o produto existe na sessão
            $exists = true;
        }

        //Direciona para o Index
        header('Location: index.php');
        exit;
    }
