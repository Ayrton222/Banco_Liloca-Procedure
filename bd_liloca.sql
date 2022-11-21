CREATE DATABASE bd_liloca;

use bd_liloca;


DELIMETER $$

CREATE DEFINER = root@localhost PROCEDURE consulta_produto (id_Produto INT) select * from produto $$

CREATE DEFINER = root@localhost PROCEDURE delete_produto (IN prodid INT)
BEGIN
set @prodid = prodid;
DELETE FROM produto WHERE idProduto = prodid;
END $$

CREATE DEFINER = root@localhost PROCEDURE inserir_produto (IN txtidcliente INT,IN txtbolo varchar(30),IN txtsalgado varchar(30),IN txtrefri varchar(30),IN txtquantidadeB INT(11),IN txtquantidadeS INT(11),IN txtquantidadeR INT(11),IN txtvalor INT(11)) 		BEGIN 
SET @txtidcliente = txtidcliente;
SET @txtbolo = txtbolo;
SET @txtsalgado = txtsalgado;
SET @txtrefri = txtrefri;
SET @txtquantidadeB = txtquantidadeB;
SET @txtquantidadeS = txtquantidadeS;
SET @txtquantidadeR = txtquantidadeR;
SET @txtvalor = txtvalor;
PREPARE STMT FROM "INSERT INTO produto (Cliente_idCliente, bolo_chocolate, salgado_coxinha, refrigeranteC, quantidade_boloC, quantidade_refriC, quantidade_salgadoC, valor_unit) VALUES (?,?,?,?,?,?,?,?)";
EXECUTE STMT USING @txtidcliente,@txtbolo,@txtsalgado,@txtrefri,@txtquantidadeB,@txtquantidadeS,@txtquantidadeR,@txtvalor;
END$$

DELIMETER;

CREATE TABLE Cliente (
  idCliente INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  nome VARCHAR(200) NULL,
  telefone VARCHAR(20) NULL,
  endereco VARCHAR(200) NULL,
  cpf INT(12) NULL,
  PRIMARY KEY(idCliente)
);

CREATE TABLE Decoracao (
  idDecoracao INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Produto_idProduto INTEGER UNSIGNED NOT NULL,
  tamanho INTEGER UNSIGNED NULL,
  modelo VARCHAR(45) NULL,
  PRIMARY KEY(idDecoracao, Produto_idProduto),
  INDEX Decoracao_FKIndex1(Produto_idProduto)
);

CREATE TABLE Festa (
  idFesta INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Pedido_idPedido INTEGER UNSIGNED NOT NULL,
  Cliente_idCliente INTEGER UNSIGNED NOT NULL,
  nome VARCHAR(200) NULL,
  idade INTEGER UNSIGNED NULL,
  endereco VARCHAR(200) NULL,
  tema VARCHAR(200) NULL,
  cores VARCHAR(200) NULL,
  PRIMARY KEY(idFesta),
  INDEX Festa_FKIndex1(Cliente_idCliente),
  INDEX Festa_FKIndex2(Pedido_idPedido)
);

CREATE TABLE Itens (
  Pedido_idPedido INTEGER UNSIGNED NOT NULL,
  Produto_idProduto INTEGER UNSIGNED NOT NULL,
  valor INTEGER UNSIGNED NULL,
  quantidade FLOAT NULL,
  PRIMARY KEY(Pedido_idPedido, Produto_idProduto),
  INDEX Pedido_has_Produto_FKIndex1(Pedido_idPedido),
  INDEX Pedido_has_Produto_FKIndex2(Produto_idProduto)
);

CREATE TABLE Pedido (
  idPedido INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Cliente_idCliente INTEGER UNSIGNED NOT NULL,
  data_pedido DATE NULL,
  data_festa DATE NULL,
  prazo DATE NULL,
  data_entrega DATE NULL,
  tipo_entrega VARCHAR(200) NULL,
  frete DOUBLE NULL,
  sinal DOUBLE NULL,
  restante DOUBLE NULL,
  PRIMARY KEY(idPedido),
  INDEX Produto_FKIndex1(Cliente_idCliente)
);

CREATE TABLE Produto (
  idProduto INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Cliente_idCliente INTEGER UNSIGNED NOT NULL,
  bolo_chocolate VARCHAR(200) NULL,
  salgado_coxinha VARCHAR(200) NULL,
  refrigeranteC VARCHAR(200) NULL,
  quantidade_boloC INTEGER UNSIGNED NULL,
  quantidade_salgadoC INTEGER UNSIGNED NULL,
  quantidade_refriC INTEGER UNSIGNED NULL,
  valor_unit DOUBLE NULL,
  PRIMARY KEY(idProduto),
  INDEX Produto_FKIndex1(Cliente_idCliente)
);


