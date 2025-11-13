SELECT participante.nome_participante
FROM participante JOIN sala ON sala.id_sala = participante.fk_sala
WHERE sala.id_sala = 2;

UPDATE participante
SET data_hora_solicitacao = NULL / NOW()
WHERE id_participante = 2;

SELECT participante.nome_participante
FROM participante JOIN sala ON sala.id_sala = participante.fk_sala
WHERE sala.id_sala = 2
ORDER BY data_hora_solicitacao ASC;