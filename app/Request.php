<?php


    class Request {

        public static function insertPed() {

            if (isset($_POST)) {

                $nomecliente = $_POST['inputNome'];
                $telecliente = $_POST['inputTel'];
                $emailcliente = $_POST['inputEmail'];
                $cepcliente = $_POST['inputCep'];
                $logradouro = $_POST['inputLogra'];
                $numlogradouro = $_POST['inputNumLogra'];
                $formapagamento = $_POST['for_pagamento'];
                $troco = isset($_POST['inputTrocosim']) ? $_POST['inputTrocosim'] : $troconao = $_POST['inputTroconao'];
                $observacao = $_POST['inputObservacao'];
                $numpedido = date('Ymd') . rand(1000, 9999);
                
                $valorpedido = Checkout::subCheckout();

                $conn = Database::getConnection();

                // Insere informações do cliente
                $sql_insertclient = "INSERT INTO tb_cliente (nome_cli, email_cli, tel_cli, cep_cli, logradouro_cli, numlogradouro_cli) VALUES ('".$nomecliente."', '".$emailcliente."', '".$telecliente."', ".$cepcliente.", '".$logradouro."', '".$numlogradouro."')";
                $result_insertclient = $conn->query($sql_insertclient);

                if ($result_insertclient === TRUE) {

                    // Insere informações do pedido
                    $sql_insertpedido = "INSERT INTO tb_pedido (num_ped, nome_ped, email_ped, total_ped, formpaga_ped, cep_ped, logradouro_ped, numlogradouro_ped, dtager_ped) VALUES ('".$numpedido."', '".$nomecliente."', '".$emailcliente."', ".$valorpedido.", '".$formapagamento."', ".$cepcliente.", '".$logradouro."', '".$numlogradouro."', NOW())";
                    $result_insertpedido = $conn->query($sql_insertpedido);

                    if ($result_insertpedido === TRUE) {

                        //Insere informações dos itens do pedido.
                        foreach ($_SESSION['produtos'] as $idproduto => $quantidade) {

                            $sql_select = "SELECT * FROM tb_produto WHERE cod_prod = ".$idproduto."";
                            $result_select = $conn->query($sql_select);

                            if ($result_select->num_rows > 0) {

                                while ($row = $result_select->fetch_assoc()) {

                                    for ($i = 1; $i <= $result_select->num_rows; $i++) {

                                        $sql_insertitem = "INSERT INTO tb_pedidoitem (num_ped, cod_prod, qtd_prod, valor_prod) VALUES ('".$numpedido."', ".$row['cod_prod'].", $quantidade, ".$row['preco_prod'].");";
                                        $result_insertitem = $conn->query($sql_insertitem);

                                    }
                                    
                                }

                            }
                
                        }

                    } 

                }

            } else {

                header('Location: ../index.php');

            }

        }

    }