<?php include_once ('../app/Aplicacao.php'); ?>

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

        <form>
            <div class="form-group row">
                <div class="col-md-8 mt-3">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" name="email" placeholder="E-mail">
                </div>
                <div class="col-md-4 mt-3">
                    <label for="telefone">Telefone</label>
                    <input type="text" class="form-control" name="site" placeholder="Site">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-9 mt-3">
                    <label for="email">E-mail</label>
                    <input type="email" class="form-control" name="email" placeholder="E-mail">
                </div>
                <div class="col-md-3 mt-3">
                    <label for="cep">CEP</label>
                    <input type="text" class="form-control" name="site" placeholder="Site">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-10 mt-3 mb-2">
                    <label for="logradouro">Logradouro</label>
                    <input type="text" class="form-control" name="email" placeholder="E-mail">
                </div>
                <div class="col-md-2 mt-3 mb-2">
                    <label for="numero">Número</label>
                    <input type="text" class="form-control" name="site" placeholder="Site">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-8 mt-3">
                    <label for="pagamento">Pagamento</label>
                    <select class="form-control">
                        <option>Dinheiro</option>
                        <option>Cartão de Crédito</option>
                        <option>Cartão de Débito</option>
                        <option>Pix</option>
                    </select>
                </div>

                <div class="col-md-4 mt-5">
                    <label for="dinheirotroco" style="margin-right: 10px;">Precisa de Troco?</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" value="sim">
                        <label class="form-check-label" for="inlineCheckbox2">Sim</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" value="nao" checked>
                        <label class="form-check-label" for="inlineCheckbox2">Não</label>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-12 mt-5 mb-2">
                    <label for="exampleFormControlTextarea1">Observação:</label>
                    <textarea class="form-control" name="observacao" rows="3"></textarea>
                </div>
            </div>
        </form>
        
    </main>

    <footer class="footer">
        <a href="https://www.althdevelopment.com" target="_blank">AlthDevelopment © <?php echo date('Y'); ?></a>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>