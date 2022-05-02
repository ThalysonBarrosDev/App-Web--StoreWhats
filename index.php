<?php include_once ('app/Aplicacao.php'); ?>

<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StoreWhats - Home</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

    <header class="header">
        <div class="logo">
            <span class="font-weight-light">StoreWhats</span>
        </div>

        <div class="spacer"></div>

        <div class="checkout">
            <a href="views/cart.php"><img src="assets/img/carrinho-de-compras.png"></a>
        </div>
    </header>
    
    <main class="content">

        <h3 style="text-align: center;">Seja bem-vindo a StoreWhats :)</h3><hr>

        <div class="row">
            <?php foreach ($dados = Aplicacao::getProducts() as $produto): ?>
                <div class="col-sm-3 mb-2">
                    <div class="card">
                        <div class="d-flex justify-content-center">
                            <img class="card-img-top" src="<?= $produto['dirimg_prod']; ?>">
                        </div><hr>
                    
                        <div class="card-body">
                            <h5 class="card-title text-center"><?= $produto['nome_prod']; ?></h5>
                            <p class="card-text text-center"><?php echo 'R$ ' . Aplicacao::formatNumber($produto['preco_prod']); ?></p>

                            <div class="d-flex">
                                <a href='views/cart.php?add=cart&id=<?= $produto['cod_prod']; ?>' class="btn btn-primary">Adicionar ao Carinho</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </main>

    <footer class="footer">
        <a href="https://www.althdevelopment.com" target="_blank">AlthDevelopment © <?php echo date('Y'); ?></a>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>