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
                $troco = isset($_POST['inputTrocosim']) ? $_POST['inputTrocosim'] : $_POST['inputTroconao'];
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

                        if ($result_insertitem === TRUE) {

                            echo '<h5>Pedido finalizado com sucesso!</h5><hr><br><br><h4>Aguarde, você será redirecionado...</h4></div></main>';

                            include_once ('../views/template/footer.php');

                            function redirectWpp($nomecliente, $telecliente, $emailcliente, $cepcliente, $logradouro, $numlogradouro, $numpedido, $valorpedido, $formapagamento, $troco, $observacao) {

                                $numero = 5585998729476;
                                $texto = "&text=Pedido via StoreWhats realizado. Segue abaixo as informacoes:%0A%0ANumero do Pedido: $numpedido%0AValor: R$$valorpedido%0AForma de Pagamento: $formapagamento%0ATroco: $troco%0AOBS: $observacao%0A%0AInformacoes do Cliente => %0A%0ANome: $nomecliente%0AE-mail: $emailcliente%0ATelefone: $telecliente%0A%0AInformacoes da Entrega =>%0A%0ACEP: $cepcliente%0ALogradouro: $logradouro%0ANum: $numlogradouro";

                                $url_base = "https://api.whatsapp.com/send?phone=".$numero."".$texto."";

                                return header('refresh: 5; url='.$url_base.'');

                            }

                            redirectWpp($nomecliente, $telecliente, $emailcliente, $cepcliente, $logradouro, $numlogradouro, $numpedido, $valorpedido, $formapagamento, $troco, $observacao);

                            header('Location: ../events/destroy.php');

                        } else {

                            echo '<h5>Erro ao finalizar o pedido, tente novamente!</h5><hr>';

                        }

                    } else {

                        echo '<h5>Erro ao finalizar o pedido, tente novamente!</h5><hr>';

                    }

                } else {

                    echo '<h5>Erro ao finalizar o pedido, tente novamente!</h5><hr>';

                }

            } else {

                header('Location: ../index.php');

            }

        }

    }