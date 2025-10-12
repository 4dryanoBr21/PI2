CREATE DATABASE projetomi;

USE projetomi;

CREATE TABLE usuario (
  nome varchar(100),
  id_usuario int PRIMARY KEY AUTO_INCREMENT,
  senha varchar(100),
  email varchar(100)
);

CREATE TABLE sala (
  id_sala int PRIMARY KEY AUTO_INCREMENT,
  data_hora_criacao DATETIME,
  nome_sala varchar(100),
  codigo_da_sala varchar(100),
  tempo_maximo_fala time
);

CREATE TABLE reuniao (
  fk_id_sala int,
  fk_id_usuario int,
  data_hora_solicitacao DATETIME,
  data_hora_inscricao DATETIME,
  data_hora_inicio_fala DATETIME,
  FOREIGN KEY (fk_id_sala) REFERENCES sala(id_sala),
  FOREIGN KEY (fk_id_usuario) REFERENCES usuario(id_usuario)
);