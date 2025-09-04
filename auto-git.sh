#!/bin/bash

# Script de automação de commit e push
# Ele fica rodando em loop e faz commit automático quando detecta mudanças

while true; do
    # Verifica se há mudanças
    if [[ -n $(git status --porcelain) ]]; then
        echo "Alterações detectadas, enviando para o repositório..."
        git add .
        git commit -m "auto: $(date '+%Y-%m-%d %H:%M:%S')"
        git push
        echo "✅ Commit e push feitos com sucesso!"
    fi
    # Aguarda 10 segundos antes de verificar de novo
    sleep 10
done