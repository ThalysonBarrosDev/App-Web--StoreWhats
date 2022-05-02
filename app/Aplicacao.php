<?php

    session_start();

    class Aplicacao {

        public static function formatNumber($num) {

            return number_format($num, 2, ',', ' ');

        }

        public static function getProducts() {

            require_once ('database/Database.php');

            $conn = Database::getConnection();

            $products = [];

            $sql = "SELECT * FROM tb_produto";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {

                    $products[] = $row;
        
                }

            }

            return $products;

            $conn->close();

        }

        public static function cartProducts() {

            require_once ('../database/Database.php');

            if (!isset($_SESSION['produtos'])) {

                $_SESSION['produtos'] = array();

            }

            if (isset($_GET['add']) && $_GET['add'] === "cart") {

                $idproduto = $_GET['id'];

                if (!isset($_SESSION['produtos'][$idproduto])) {

                    $_SESSION['produtos'][$idproduto] = 1;

                } else {

                    $_SESSION['produtos'][$idproduto] += 1;

                }

            }

            if (count($_SESSION['produtos']) == 0) {

                echo '<h4 style="text-align: center;">Carrinho Vazio.</h4>';

            } else {

                $conn = Database::getConnection();

                echo '<table class="table table-hover table-striped"><thead><th>Código do Produto</th><th>Quantidade</th><th>Nome</th><th>Preço</th></thead><tbody>';

                foreach ($_SESSION['produtos'] as $idproduto => $quantidade) {

                    $sql = "SELECT * FROM tb_produto WHERE cod_prod = ".$idproduto."";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {

                        while ($row = $result->fetch_assoc()) {

                            echo '<tr><td>'.$row['cod_prod'].'</td><td>'.$quantidade.'</td><td>'.$row['nome_prod'].'</td><td>'.Aplicacao::formatNumber($row['preco_prod']).'</td></tr>';
                
                        }


                    }
                
                }

                echo '</tbody></table>';

                $conn->close();

            }

        }

        public static function subCheckout() {

            require_once ('../database/Database.php');

            $valor = 0.00;

            if (isset($_SESSION['produtos'])) {

                $conn = Database::getConnection();

                foreach ($_SESSION['produtos'] as $idproduto => $quantidade) {

                    $sql = "SELECT * FROM tb_produto WHERE cod_prod = ".$idproduto."";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {

                        while ($row = $result->fetch_assoc()) {

                            $valor += $row['preco_prod'] * $quantidade;

                        }


                    }
                
                }

                echo Aplicacao::formatNumber($valor);

                $conn->close();

            }

        }

    }