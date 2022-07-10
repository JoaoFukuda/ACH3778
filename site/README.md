# Site Catalogo Aberto

O site tem como proposta catalogar todas as APIs abertas do e sobre o governo em um lugar só para facilitar a busca, descoberta e uso delas.

## Como subir o site

O site utiliza Docker Compose, então:

Para subir:
```bash
docker-compose up -d
```

Para parar:
```bash
docker-compose stop
# e `docker-compose start` ou `docker-compose up` para subir de volta
```

Para reconstruir:
```bash
docker-compose down # ou `docker-compose rm` se ele já estiver sido parado com `docker-compose stop`
docker-compose up -d --build
```

Para ver o log de eventos:
```bash
docker-compose logs # ou `docker-compose logs -f` para ficar vendo os logs pelo terminal (sair com Ctrl + C)
```
