CREATE DATABASE Banco_Projeto_Bullying;

USE Banco_Projeto_Bullying;

CREATE TABLE registro(
id_registro INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
nome VARCHAR(40) NOT NULL,
sobrenome VARCHAR(50) NOT NULL,
escola VARCHAR(60) NOT NULL,
cidade VARCHAR(50) NOT NULL,
estado VARCHAR(30) NOT NULL,
nome_agressor VARCHAR(60),
email VARCHAR(60) NOT NULL,
relato VARCHAR(250) NOT NULL,
atendimento CHAR(10) NOT NULL
);

#SELECT * FROM registro;

#DROP TABLE registro;