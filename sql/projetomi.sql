CREATE DATABASE projetomi;

USE projetomi;

CREATE TABLE usuario (
  nome varchar(100),
  id_usuario int PRIMARY KEY AUTO_INCREMENT,
  senha varchar(100),
  email varchar(100)
);

CREATE TABLE reuniao (
  fk_sala_id_sala int,
  fk_usuario_id_usuario int,
  data_hora_solicitacao DATETIME,
  data_hora_inscricao DATETIME,
  data_hora_inicio_fala DATETIME
);

CREATE TABLE sala (
  id_sala int PRIMARY KEY AUTO_INCREMENT,
  data_hora_criacao DATETIME,
  nome_sala varchar(100),
  codigo_da_sala varchar(100),
  tempo_maximo_fala time
);

ALTER TABLE reuniao ADD CONSTRAINT FK_reuniao_1
  FOREIGN KEY (fk_sala_id_sala)
  REFERENCES sala (id_sala)
  ON DELETE SET NULL;

ALTER TABLE reuniao ADD CONSTRAINT FK_reuniao_2
  FOREIGN KEY (fk_usuario_id_usuario)
  REFERENCES usuario (id_usuario)
  ON DELETE RESTRICT;