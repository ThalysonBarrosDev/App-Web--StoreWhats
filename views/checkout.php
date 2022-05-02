<?php require_once ('../config/config.php'); ?>

<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StoreWhats - Checkout</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

    <header class="header">
        <div class="logo">
            <span class="font-weight-light">StoreWhats</span>
        </div>

        <div class="spacer"></div>

        <div class="checkout" style="margin-right: -10px;">
            <a href="../"><img src="../assets/img/home.png"></a>
        </div>
        <div class="checkout">
            <a href="cart.php"><img src="../assets/img/carrinho-de-compras.png"></a>
        </div>
    </header>
    
    <main class="content">
    
        <h3 style="text-align: center;">Preencha as Informações:</h3>

        <form action="../events/pedido.php" method="POST">
            <div class="form-group row">
                <div class="col-md-8 mt-3">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" name="inputNome" placeholder="Ex: Nome Sobrenome">
                </div>
                <div class="col-md-4 mt-3">
                    <label for="telefone">Telefone</label>
                    <input type="text" class="form-control" name="inputTel" placeholder="Ex: (00) 9.9999-9999">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-9 mt-3">
                    <label for="email">E-mail</label>
                    <input type="email" class="form-control" name="inputEmail" placeholder="Ex: email@storewhats.com.br" required>
                </div>
                <div class="col-md-3 mt-3">
                    <label for="cep">CEP</label>
                    <input type="text" class="form-control" name="inputCep" placeholder="Ex: 60700-000">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-10 mt-3 mb-2">
                    <label for="logradouro">Logradouro</label>
                    <input type="text" class="form-control" name="inputLogra" placeholder="Ex: Rua Store Whats">
                </div>
                <div class="col-md-2 mt-3 mb-2">
                    <label for="numero">Número</label>
                    <input type="text" class="form-control" name="inputNumLogra" placeholder="Ex: 2022">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-8 mt-3">
                    <label for="pagamento">Pagamento</label>
                    <select class="form-control" name="for_pagamento">
                        <option value="Dinheiro">Dinheiro</option>
                        <option value="Cartão de Crédito">Cartão de Crédito</option>
                        <option value="Cartão de Débito">Cartão de Débito</option>
                        <option value="Pix">Pix</option>
                    </select>
                </div>

                <div class="col-md-4 mt-5">
                    <label for="dinheirotroco" style="margin-right: 10px;">Precisa de Troco?</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="inputTrocosim" value="Sim">
                        <label class="form-check-label" for="checkbox-sim">Sim</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="inputTroconao" value="Nao" checked>
                        <label class="form-check-label" for="checkbox-nao">Não</label>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-12 mt-5 mb-2">
                    <label for="exampleFormControlTextarea1">Observação:</label>
                    <textarea class="form-control" name="inputObservacao" rows="3" placeholder="Ex: Preciso de troco para ..." value="Não"></textarea>
                </div>
            </div>

            <div style="margin-left: 10px; margin-top: 50px;">
                <h5>Total: R$ <?php $total = str_replace('.', ',', Checkout::subCheckout()); if ($total == 0) { echo "$total,00"; } else { echo $total; } ?></h5>
            </div>

            <div style="display: flex; justify-content: flex-end;">
                <button class="btn btn-primary">Finalizar Pedido</button>
            </div>  
        </form>
        
    </main>

    <?php include_once ('template/footer.php'); ?>