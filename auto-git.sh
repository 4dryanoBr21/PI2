#!/bin/bash

while true; do
    if [[ -n $(git status --porcelain) ]]; then
        echo "Alterações detectadas, enviando para o repositório..."
        git add .
        git commit -m "auto: $(date '+%Y-%m-%d %H:%M:%S')"
        git push origin main
        echo "✅ Commit e push feitos com sucesso!"
    fi
    sleep 10
done