-- Crea a tabela
CREATE TABLE `negociacao_mercadorias` (
  `codigo` varchar(10) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `quantidade` int(10) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `tipo_negocio` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`codigo`)
) 

-- insere na tela.
INSERT INTO `negociacao_mercadorias` 
VALUES 
('ABC1234','TV LED 60 POLEGADAS LG','ELETRONICO',1000,500000.00,'venda'),
('ABCD123','TV LED 40 POLEGADAS LG','ELETRONICO',1,2000.00,'compra'),
('JHGFTRFDES','PC240','Informatica',3,7.00,'venda');
