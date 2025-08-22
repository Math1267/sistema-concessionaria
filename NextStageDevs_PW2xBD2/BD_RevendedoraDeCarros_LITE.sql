CREATE DATABASE BD_revendedoraCarros;
USE BD_revendedoraCarros;

-- ===================================================================
-- Inicio Tabelas
-- ===================================================================
CREATE TABLE tb_funcionario (
id_funcionario INT AUTO_INCREMENT NOT NULL,
nm_funcionario VARCHAR(20) NOT NULL,
cd_identificacao INT(11) NOT NULL UNIQUE,
cd_senha VARCHAR(10) NOT NULL,

PRIMARY KEY (id_funcionario)
);

-- Inicio Tabela necessárias para o Modelo
CREATE TABLE tb_marca (
id_marca INT AUTO_INCREMENT NOT NULL,
nm_marca VARCHAR(20) NOT NULL UNIQUE,

PRIMARY KEY (id_marca)
);

CREATE TABLE tb_carroceria (
id_carroceria INT AUTO_INCREMENT NOT NULL,
nm_carroceria VARCHAR(20) NOT NULL UNIQUE,

PRIMARY KEY (id_carroceria)
);

CREATE TABLE tb_cambio (
id_cambio INT AUTO_INCREMENT NOT NULL,
nm_cambio VARCHAR(25) NOT NULL UNIQUE,

PRIMARY KEY (id_cambio)
);

CREATE TABLE tb_combustivel (
id_combustivel INT AUTO_INCREMENT NOT NULL,
nm_combustivel VARCHAR(20) NOT NULL UNIQUE,

PRIMARY KEY (id_combustivel)
);
-- Fim Tabelas necessárias para o Modelo

-- Inicio Tabela Modelo necessárias para Tabela Carro
CREATE TABLE tb_modelo (
id_modelo INT AUTO_INCREMENT NOT NULL,
nm_modelo VARCHAR(40) NOT NULL UNIQUE,
aa_ano INT(4) NOT NULL, 
id_carroceria INT NOT NULL,
id_cambio INT NOT NULL,
id_marca INT NOT NULL,
id_combustivel INT NOT NULL,

PRIMARY KEY (id_modelo),
FOREIGN KEY (id_carroceria) REFERENCES TB_CARROCERIA(id_carroceria),
FOREIGN KEY (id_cambio) REFERENCES TB_CAMBIO(id_cambio),
FOREIGN KEY (id_marca) REFERENCES TB_MARCA(id_marca),
FOREIGN KEY (id_combustivel) REFERENCES TB_COMBUSTIVEL(id_combustivel)
);
-- Fim Tabela Modelo necessárias para Tabela Carro

-- Tabela opcional necessárias para Tabela CarroAcessorio
CREATE TABLE tb_acessorio (
id_acessorio INT AUTO_INCREMENT NOT NULL,
nm_acessorio VARCHAR(40) NOT NULL UNIQUE,

PRIMARY KEY (id_acessorio)
);

-- necessárias para Tabela Carro
CREATE TABLE tb_cor (
id_cor INT AUTO_INCREMENT NOT NULL,
nm_cor VARCHAR(20) NOT NULL UNIQUE,

PRIMARY KEY (id_cor)
);

-- principal 
CREATE TABLE tb_carro (
id_carro INT AUTO_INCREMENT NOT NULL,
cd_placa VARCHAR(7) NOT NULL UNIQUE, 
cd_chassi VARCHAR(17) NOT NULL UNIQUE, 
vl_carro DECIMAL(20, 2) UNSIGNED NOT NULL,
qt_quilometragem DECIMAL(8, 2) UNSIGNED NOT NULL,
id_modelo INT NOT NULL,
id_cor INT NOT NULL,
id_funcionario INT NOT NULL,
id_funcionarioVenda INT NULL,
-- vl_Compra DECIMAL(20,2) UNSIGNED NULL
-- vl_Venda DECIMAL(20,2) UNSIGNED NULL
ds_carro VARCHAR(100) NULL,

PRIMARY KEY (id_carro),

FOREIGN KEY (id_modelo) REFERENCES TB_MODELO(id_modelo),
FOREIGN KEY (id_cor) REFERENCES TB_COR(id_cor),
FOREIGN KEY (id_funcionario) REFERENCES TB_funcionario(id_funcionario),
FOREIGN KEY (id_funcionarioVenda) REFERENCES TB_funcionario(id_funcionario)
);
-- ===================================================================
-- Fim Tabelas
-- ===================================================================

-- ===================================================================
-- Inicio tabelas auxiliares/intermediarias
-- ===================================================================
CREATE TABLE tb_carroAcessorio (
id_carroAcessorio INT AUTO_INCREMENT NOT NULL,
id_carro INT NOT NULL,
id_acessorio INT NOT NULL,

PRIMARY KEY (id_carroAcessorio),
FOREIGN KEY (id_carro) REFERENCES TB_CARRO(id_carro),
FOREIGN KEY (id_acessorio) REFERENCES TB_ACESSORIO(id_acessorio)
);
-- ===================================================================
-- Fim tabelas auxiliares/intermediarias
-- ===================================================================

-- ===================================================================
-- Inicio INSERTS
-- ===================================================================
INSERT INTO tb_acessorio (
id_acessorio,nm_acessorio)
VALUES
(DEFAULT,'Alarme'),
(DEFAULT,'Sensor de estacionamento'),
(DEFAULT,'GPS'),
(DEFAULT,'Câmera de ré'),
(DEFAULT,'Airbag'),
(DEFAULT,'Central multimídia'),
(DEFAULT,'Ar condicionado'),
(DEFAULT,'Bancos em couro'),
(DEFAULT,'Calha automotiva');

INSERT INTO tb_cambio (
id_cambio,nm_cambio)
VALUES
(DEFAULT,'Manual'),
(DEFAULT,'CVT'),
(DEFAULT,'SemiAutomatico'),
(DEFAULT,'Automatico'),
(DEFAULT,'Dual-Clutch'),
(DEFAULT,'Automatizado'),
(DEFAULT,'Sequencial'),
(DEFAULT,'E-CVT'),
(DEFAULT,'Transmissão Hidráulica');

INSERT INTO tb_carroceria (
id_carroceria,nm_carroceria)
VALUES
(DEFAULT,'Hatch'),
(DEFAULT,'Sedã'),
(DEFAULT,'SUV'),
(DEFAULT,'Picape'),
(DEFAULT,'Crossover'),
(DEFAULT,'Minivan'),
(DEFAULT,'Esportivo'),
(DEFAULT,'Cupê'),
(DEFAULT,'Jipe'),
(DEFAULT,'Roadster'),
(DEFAULT,'Conversível'),
(DEFAULT,'Perua'),
(DEFAULT,'Furgão'),
(DEFAULT,'Utilitário');

INSERT INTO tb_combustivel (
id_combustivel,nm_combustivel)
VALUES
(DEFAULT,'Gasolina'),
(DEFAULT,'Diesel'),
(DEFAULT,'Etanol'),
(DEFAULT,'GNV'),
(DEFAULT,'Elétrico');

INSERT INTO tb_cor (
id_cor,nm_cor)
VALUES
(DEFAULT,'Preto'),
(DEFAULT,'Branco'),
(DEFAULT,'Prata'),
(DEFAULT,'Cinza'),
(DEFAULT,'Vermelho'),
(DEFAULT,'Azul'),
(DEFAULT,'Verde'),
(DEFAULT,'Amarelo'),
(DEFAULT,'Marrom'),
(DEFAULT,'Bege'),
(DEFAULT,'Laranja'),
(DEFAULT,'Roxo'),
(DEFAULT,'Dourado');

INSERT INTO tb_marca (
id_marca,nm_marca)
VALUES
(DEFAULT,'Fiat'),
(DEFAULT,'Volkswagen'),
(DEFAULT,'Chevrolet'),
(DEFAULT,'Hyundai'),
(DEFAULT,'Toyota'),
(DEFAULT,'Audi'),
(DEFAULT,'BMW'),
(DEFAULT,'Citroën'),
(DEFAULT,'Jaguar'),
(DEFAULT,'Honda'),
(DEFAULT,'Ford'),
(DEFAULT,'Jeep'),
(DEFAULT,'Kia'),
(DEFAULT,'Lexus'),
(DEFAULT,'Mercedes'),
(DEFAULT,'Mitsubishi'),
(DEFAULT,'Suzuki'),
(DEFAULT,'Subaru'),
(DEFAULT,'Renault'),
(DEFAULT,'Peugeot'),
(DEFAULT,'Nissan');

INSERT INTO tb_modelo (
id_modelo,nm_modelo, aa_ano, id_carroceria, id_cambio, id_marca, id_combustivel) 
VALUES
(DEFAULT,'FIAT TITANO Endurance', '2025', 1, 1, 1, 1),
(DEFAULT,'Nova Saveiro Robust CS', '2025', 4, 1, 1, 1),
(DEFAULT,'Onix MT 1.0', '2025', 1, 1, 3, 1),
(DEFAULT,'Onix Plus LT2 MT', '2025', 1, 1, 3, 1),
(DEFAULT,'Hyundai HB20', '2025', 1, 1, 4, 1),
(DEFAULT,'Hyundai PALISADE', '2025', 2, 1, 4, 1),
(DEFAULT,'Corolla 2025 GLi', '2025', 1, 1, 5, 1),
(DEFAULT,'BMW iX1 eDRIVE20 X-Line', '2025', 1, 8, 7, 1),
(DEFAULT,'A3 Sedan', '2025', 1, 1, 8, 1),
(DEFAULT,'JAGUAR I-PACE', '2025', 1, 1, 9, 1),
(DEFAULT,'JAGUAR F-PACE R-DYNAMIC SE', '2025', 2, 1, 9, 1),
(DEFAULT,'Civic Type R', '2025', 1, 1, 10, 1),
(DEFAULT,'Mustang GT Performance 2024', '2024', 1, 1, 11, 1),
(DEFAULT,'Jeep Renegade 1.3 Turbo', '2025', 1, 1, 12, 1),
(DEFAULT,'JEEP COMMANDER Longitude T270', '2025', 2, 1, 12, 1),
(DEFAULT,'Audi A5 Sportback S Line 2024', '2024', 1, 1, 16, 1),
(DEFAULT,'Niro HEV SX PRESTIGE 24/25', '2025', 1, 5, 13, 1),
(DEFAULT,'NX 350h F-Sport', '2025', 1, 5, 14, 1),
(DEFAULT,'CLA 200 Progressive', '2025', 1, 5, 15, 1),
(DEFAULT,'Nova Triton KATANA', '2025', 4, 1, 16, 1),
(DEFAULT,'JIMNY SIERRA 4YOU MT ALLGRIP 1.5 2025', '2025', 1, 1, 17, 1),
(DEFAULT,'JIMNY SIERRA 4STYLE AT ALLGRIP 1.5 2025', '2025', 1, 1, 17, 1),
(DEFAULT,'Forester 2.0i-S e-BOXER', '2025', 1, 5, 18, 1),
(DEFAULT,'RENAULT KANGOO advanced', '2025', 2, 1, 19, 1),
(DEFAULT,'RENAULT KARDIAN evolution mt', '2025', 1, 1, 19, 1),
(DEFAULT,'PEUGEOT e-2008 ACTIVE', '2025', 1, 1, 20, 1),
(DEFAULT,'PEUGEOT EXPERT CARGO', '2025', 2, 1, 20, 1),
(DEFAULT,'NISSAN KICKS PLAY 2025 Active Plus CTV', '2025', 1, 3, 21, 1),
(DEFAULT,'NISSAN VERSA 1.6 Advance CTV', '2025', 1, 3, 21, 1),
(DEFAULT,'BMW 320i M Sport 2024', '2024', 1, 1, 7, 1);

INSERT INTO tb_funcionario (
id_funcionario,nm_funcionario,cd_identificacao,cd_senha)
VALUES
(DEFAULT,'Calebe',321,123),
(DEFAULT,'Fernanda',654,456),
(DEFAULT,'Gabriel',987,789),
(DEFAULT,'Kevin',741,147),
(DEFAULT,'Matheus',852,258);


INSERT INTO tb_carro (
id_carro, cd_placa, cd_chassi, vl_carro, qt_quilometragem, id_modelo, id_cor, id_funcionario) 
VALUES
(DEFAULT, 'P573245', '9BWZZZ377VT004251', '85000.99', '400.48', 1, 2, 1),
(DEFAULT, 'D202031', '1HGCM82633A123456', '75000.99', '40.95', 2, 4, 2),
(DEFAULT, 'G202564', '3FAHP06Z96R123789', '59990.99', '500.23', 3, 5, 3),
(DEFAULT, 'J202505', '2G1WT58K579184625', '74990.99', '126.30', 4, 3, 4),
(DEFAULT, 'M2025SE', 'JF1GD67566G512345', '86090.99', '84.23', 5, 6, 5),
(DEFAULT, 'P2025RN', 'KL1TD56667B123321', '299990.99', '854.62', 6, 4, 1),
(DEFAULT, 'S20255S', '1N4AL11D75C123654', '129990.99', '443.84', 7, 1, 2),
(DEFAULT, 'G20236D', 'WDBUF56J66A123987', '350000.99', '444.00', 8, 2, 3),
(DEFAULT, 'J2023B4', 'JHMCM56557C234876', '240000.99', '215.00', 9, 3, 4),
(DEFAULT, 'M2023E5', '4T1BE46KX7U654321', '630000.99', '48.48', 10, 2, 5),
(DEFAULT, 'P2023S6', '1FAFP34P54W123789', '490000.99', '1453.25', 11, 2, 1),
(DEFAULT, 'S202322', '2C3KA43R78H876543', '429900.99', '954.21', 12, 1, 2),
(DEFAULT, 'A2024EB', '1G1AK15F567134829', '549000.99', '4995.23', 13, 5, 3),
(DEFAULT, 'D2024EB', '1NXBR32E84Z876321', '119990.99', '999.45', 14, 2, 4),
(DEFAULT, 'G2024GE', 'WAUZZZ8K9BA123456', '289990.99', '1135.62', 15, 2, 5),
(DEFAULT, 'A-2018N', '5GZCZ33D13S123456', '372990.99', '123.56', 16, 5, 1),
(DEFAULT, 'J2024RN', '1B3HB48B98D123789', '189990.99', '3547.95', 17, 3, 2),
(DEFAULT, 'M2004SB', '3N1AB7AP3EY123456', '373990.99', '951.30', 18, 1, 3),
(DEFAULT, 'P2024ND', 'JN8AS5MT6CW987654', '239900.99', '943.23', 19, 2, 4),
(DEFAULT, 'A2022RN', 'ZFAAXX00C0P123789', '169990.99', '8423.51', 20, 3, 5),
(DEFAULT, 'D2022MT', 'VF1JZ2M1234567890', '140155.99', '7594.60', 21, 7, 1),
(DEFAULT, 'G2022SG', 'KMHDU46D07U123789', '149072.99', '9234.50', 22, 4, 2),
(DEFAULT, 'J2022NT', 'YS3FD49Y681234567', '198981.99', '65722.40', 23, 2, 3),
(DEFAULT, 'M2022FD', 'SALTY19444A123456', '120800.99', '132.36', 24, 2, 4),
(DEFAULT, 'ADD24VC', 'WVWZZZ3CZ7E123789', '115990.99', '2147.65', 25, 2, 5),
(DEFAULT, 'DFF24DF', 'LFMAP86C98A123456', '159990.99', '9874.63', 26, 2, 1),
(DEFAULT, 'GYY024D', 'MMBJNKB408D123456', '202990.99', '8523.65', 27, 2, 2),
(DEFAULT, 'SKS024S', 'TMBJE45L8B1237890', '115990.99', '9513.45', 28, 2, 3),
(DEFAULT, 'NNP024X', 'KNAGD128X77345621', '125190.99', '95784.62', 29, 5, 4),
(DEFAULT, 'RTS024B', 'JSAFJ535X76213487', '361950.99', '3158.65', 30, 2, 5);

INSERT INTO tb_carroAcessorio (
id_carroAcessorio, id_carro, id_acessorio)
VALUES
(DEFAULT, 1, 3),
(DEFAULT, 2, 1),
(DEFAULT, 3, 2),
(DEFAULT, 3, 9),
(DEFAULT, 5, 5),
(DEFAULT, 6, 7),
(DEFAULT, 7, 4),
(DEFAULT, 8, 1),
(DEFAULT, 9, 6),
(DEFAULT, 10, 8),
(DEFAULT, 10, 2),
(DEFAULT, 10, 3),
(DEFAULT, 13, 1),
(DEFAULT, 14, 2),
(DEFAULT, 15, 5),
(DEFAULT, 16, 3),
(DEFAULT, 17, 4),
(DEFAULT, 18, 1),
(DEFAULT, 19, 6),
(DEFAULT, 20, 1),
(DEFAULT, 21, 7),
(DEFAULT, 24, 9),
(DEFAULT, 24, 8),
(DEFAULT, 24, 1),
(DEFAULT, 24, 2),
(DEFAULT, 26, 3),
(DEFAULT, 27, 2),
(DEFAULT, 28, 5),
(DEFAULT, 29, 3),
(DEFAULT, 30, 4);
-- ===================================================================
-- Fim Inserts
-- ===================================================================

-- ===================================================================
-- Inicio VIEWs
-- ===================================================================
-- SELECT de VENDAS
CREATE OR REPLACE VIEW vw_vendas AS
SELECT 
    CA.cd_placa AS Placa,
    CA.cd_chassi AS Chassi,
    CA.vl_carro AS Valor,
    CA.qt_quilometragem AS Quilometragem,
    MO.nm_modelo AS Modelo,
    MO.aa_ano AS Ano,
    CO.nm_cor AS Cor,
    CAD.nm_funcionario AS Cadastrador,
    VE.nm_funcionario AS Vendedor
FROM tb_carro AS CA
INNER JOIN tb_modelo AS MO ON CA.id_modelo = MO.id_modelo
INNER JOIN tb_cor AS CO ON CA.id_cor = CO.id_cor
INNER JOIN tb_funcionario AS CAD ON CA.id_funcionario = CAD.id_funcionario
LEFT JOIN tb_funcionario AS VE ON CA.id_funcionarioVenda = VE.id_funcionario
WHERE CA.id_funcionarioVenda IS NOT NULL
ORDER BY CA.vl_carro;


-- SELECT de DISPONIVEIS
CREATE OR REPLACE VIEW vw_disponiveis AS
SELECT 
    CA.cd_placa AS Placa,
    CA.cd_chassi AS Chassi,
    CA.vl_carro AS Valor,
    CA.qt_quilometragem AS Quilometragem,
    MO.nm_modelo AS Modelo,
    MO.aa_ano AS Ano,
    CO.nm_cor AS Cor,
    CAD.nm_funcionario AS Cadastrador
FROM tb_carro AS CA
INNER JOIN tb_modelo AS MO ON CA.id_modelo = MO.id_modelo
INNER JOIN tb_cor AS CO ON CA.id_cor = CO.id_cor
INNER JOIN tb_funcionario AS CAD ON CA.id_funcionario = CAD.id_funcionario
LEFT JOIN tb_funcionario AS VE ON CA.id_funcionarioVenda = VE.id_funcionario
WHERE CA.id_funcionarioVenda IS NULL
ORDER BY CA.vl_carro;




-- SELECT de carroAcessorio
CREATE VIEW vw_carroAcessorio AS
SELECT 
CA.cd_placa AS Placa,
GROUP_CONCAT(A.nm_acessorio ORDER BY A.nm_acessorio SEPARATOR ', ') AS Acessorio
FROM 
tb_carroAcessorio AS AC
INNER JOIN 
tb_carro AS CA ON AC.id_carro = CA.id_carro
INNER JOIN 
tb_acessorio AS A ON AC.id_acessorio = A.id_acessorio
GROUP BY 
CA.cd_placa;

-- SELECT de marcaModelo
CREATE VIEW vw_marcaModelo AS
SELECT MA.nm_marca AS Marca,
MO.nm_modelo AS Modelo,
CA.cd_placa AS Placa
FROM tb_carro AS CA
INNER JOIN tb_modelo AS MO ON (CA.id_modelo = MO.id_modelo)
INNER JOIN tb_marca AS MA ON (MO.id_marca = MA.id_marca)
ORDER BY MA.nm_marca;

-- SELECT carroceriaChassi
CREATE VIEW vw_carroceriaChassi AS
SELECT nm_carroceria AS Carroceria,
cd_chassi AS Chassi,
cd_placa AS Placa
FROM bd_revendedoraCarros.tb_carro AS CA
INNER JOIN tb_modelo AS MO ON CA.id_modelo = MO.id_modelo
INNER JOIN tb_carroceria AS RO ON (MO.id_carroceria = RO.id_carroceria)
ORDER BY RO.nm_carroceria;

-- ===================================================================
-- Fim VIEWs
-- ===================================================================

-- ===================================================================
-- Inicio UPDATE
-- ===================================================================
/*
UPDATE tb_carro
SET id_funcionarioVenda = 4
WHERE id_carro = 10;
*/
-- ===================================================================
-- Fim UPDATE
-- ===================================================================
/*
 |			   _________
|K|			 /			 \
|A|			(	{}	 {}	  )
|B|			(	  º|º	  )
|O|			 |  | | | |  |
 |			 \___________/
*/