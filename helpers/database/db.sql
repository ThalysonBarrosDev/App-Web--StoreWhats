CREATE DATABASE db_storewhats;

USE db_storewhats;

CREATE TABLE tb_cliente (
    id_cli INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome_cli VARCHAR(100) NOT NULL,
    email_cli VARCHAR(100),
    tel_cli VARCHAR(20) NOT NULL,
    cep_cli INT(10) NOT NULL,
    logradouro_cli VARCHAR(50) NOT NULL,
    numlogradouro_cli INT(10) NOT NULL
);

CREATE TABLE tb_produto (
    id_prod INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    cod_prod INT(10) NOT NULL,
    nome_prod VARCHAR(50) NOT NULL,
    preco_prod DECIMAL(10, 2) NOT NULL
);

CREATE TABLE tb_pedido (
    id_ped INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_cli INTEGER NOT NULL,
    num_ped INTEGER(12) NOT NULL,
    nome_ped VARCHAR(100) NOT NULL,
    total_ped DECIMAL(10, 2) NOT NULL,
    formpaga_ped VARCHAR(25) NOT NULL,
    cep_ped INT(10) NOT NULL,
    logradouro_ped VARCHAR(50) NOT NULL,
    numlogradouro_ped INT(10) NOT NULL,
    dtager_ped DATE NOT NULL,
    FOREIGN KEY (id_cli) REFERENCES tb_cliente(id_cli)
);

CREATE TABLE tb_pedidoitem (
    id_peditem INTEGER AUTO_INCREMENT NOT NULL PRIMARY KEY,
    id_item INTEGER(2) NOT NULL,
    num_ped INTEGER NOT NULL,
    cod_prod INT(10) NOT NULL,
    qtd_prod INT(2) NOT NULL,
    valor_prod DECIMAL(10, 2) NOT NULL
);