CREATE DATABASE assistencia;

USE Assistencia;

CREATE TABLE usuario(
	id int NOT NULL AUTO_INCREMENT,
	nome VARCHAR(50),
	login VARCHAR(20),
	senha VARCHAR(20),
	tipo integer(1),
	PRIMARY KEY (id),
	UNIQUE (login)
);

CREATE TABLE chamado(
	id int NOT NULL AUTO_INCREMENT,
	titulo VARCHAR(20),
	categoria VARCHAR(20),
	descricao VARCHAR(50),
	idUsuario int,
	PRIMARY KEY (id),
    FOREIGN KEY (idUsuario) REFERENCES usuario(id)
);

INSERT INTO usuario (nome, login, senha, tipo) VALUES ('User Admin', 'admin', 'admin', 1);
INSERT INTO usuario (nome, login, senha, tipo) VALUES ('User Comum', '1', '1', 0);