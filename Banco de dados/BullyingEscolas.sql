CREATE DATABASE Projeto_Bullying_Escolas;

USE Projeto_Bullying_Escolas; 

CREATE TABLE usuario(
usuario_id INT NOT NULL AUTO_INCREMENT,
usuario VARCHAR(200) NOT NULL,
senha VARCHAR(32) NOT NULL,
PRIMARY KEY(usuario_id)
);

INSERT INTO usuario (usuario,senha) VALUES 
("madre", md5("madre1"));

SELECT * FROM usuario;