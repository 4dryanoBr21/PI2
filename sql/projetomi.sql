create database projetomi;
use projetomi;

create table sala (

  id_sala int PRIMARY KEY AUTO_INCREMENT,
  nome_sala varchar(100),
  tempo_de_fala int

);

create table participante (

  id_participante int PRIMARY KEY AUTO_INCREMENT,
  nome_participante varchar(100),
  fk_sala int,
  data_hora_solicitacao DATETIME DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (fk_sala) REFERENCES sala(id_sala)
);