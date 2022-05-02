<?php require_once ('../config/config.php'); ?>

<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StoreWhats - Pedido</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

    <header class="header">
        <div class="logo">
            <span class="font-weight-light">StoreWhats</span>
        </div>
    </header>
    
    <main class="content">

        <div style="text-align: center;">
            <?php 
            
                if (isset($_POST['email']) && isset($_SESSION['produtos'])) { 

                    echo Request::insertPed();

                } else {

                    echo '<h5>Erro ao finalizar o pedido, tente novamente!</h5><hr>';
                    header("refresh: 4; url=../views/checkout.php"); 

                }

            ?>
        </div>

    </main>

    <footer class="footer">
        <a href="https://www.althdevelopment.com" target="_blank">AlthDevelopment © <?php echo date('Y'); ?></a>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>