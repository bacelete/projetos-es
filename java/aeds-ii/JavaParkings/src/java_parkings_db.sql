-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           8.0.40 - MySQL Community Server - GPL
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Exportação de dados foi desmarcado.

-- Exportação de dados foi desmarcado.

-- Exportação de dados foi desmarcado.

-- Exportação de dados foi desmarcado.

-- Exportação de dados foi desmarcado.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

-- Criação do Banco de Dados
CREATE DATABASE java_parkings;
USE java_parkings; 

-- Criação da Tabela de Estacionamento
CREATE TABLE estacionamento (
    id_estacionamento INT NOT NULL, 
    num_vagas INT,
    nome VARCHAR(50),
    CONSTRAINT PRIMARY KEY pk_estacionamento (id_estacionamento)
); 

-- Criação da Tabela de Vagas
CREATE TABLE vaga (
    id_vaga INT NOT NULL, 
    status_vaga ENUM('livre', 'ocupada'),
    id_estacionamento INT NOT NULL, 
    CONSTRAINT PRIMARY KEY pk_vaga (id_vaga),
    CONSTRAINT FOREIGN KEY fk_vaga (id_estacionamento) 
        REFERENCES estacionamento(id_estacionamento)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);

-- Criação da Tabela de Tickets
CREATE TABLE ticket (
    id_ticket INT NOT NULL,
    horario_de_entrada TIME NOT NULL,
    horario_de_saida TIME,
    data_emissao DATE NOT NULL,
    preco_total DOUBLE,
    id_estacionamento INT NOT NULL,
    id_vaga INT NOT NULL,
    CONSTRAINT PRIMARY KEY pk_ticket (id_ticket),
    CONSTRAINT FOREIGN KEY fk_estacionamento (id_estacionamento) 
        REFERENCES estacionamento(id_estacionamento)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
    CONSTRAINT FOREIGN KEY fk_vaga (id_vaga) 
        REFERENCES vaga(id_vaga)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);

-- Criação da Tabela de Clientes
CREATE TABLE cliente (
    id_cliente INT NOT NULL,
    nome VARCHAR(50),
    id_ticket INT,
    CONSTRAINT PRIMARY KEY pk_cliente (id_cliente),
    CONSTRAINT FOREIGN KEY fk_ticket (id_ticket) 
        REFERENCES ticket(id_ticket)
        ON DELETE SET NULL
        ON UPDATE CASCADE
);

-- Criação da Tabela de Veículos
CREATE TABLE veiculo (
    placa VARCHAR(10) NOT NULL,
    id_cliente INT,
    CONSTRAINT PRIMARY KEY (placa),
    CONSTRAINT FOREIGN KEY (id_cliente) 
        REFERENCES cliente(id_cliente)
        ON UPDATE CASCADE
        ON DELETE SET NULL
);
