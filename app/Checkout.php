<?php

    class Checkout {

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

                return $valor;

                $conn->close();

            }

        }

    }