create database projetomi;
use projetomi;

create table sala (

  id_sala int PRIMARY KEY AUTO_INCREMENT,
  nome_sala varchar
(100),
  codigo_sala varchar
(100),
  tempo_de_fala time

);

create table participante (

  id_participante int PRIMARY KEY AUTO_INCREMENT,
  nome_participante varchar
(100),
  fk_sala_atual int,
  data_hora_solicitacao DATETIME DEFAULT NULL,
  FOREIGN KEY
(fk_sala_atual) REFERENCES sala
(id_sala)
);

create table criador (

  id_criador int PRIMARY KEY AUTO_INCREMENT,
  nome_criador varchar
(100),
  email varchar
(100),
  senha varchar
(100),
  fk_sala_criada int,
  FOREIGN KEY
(fk_sala_criada) REFERENCES sala
(id_sala)
);