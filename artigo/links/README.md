# Filtrando os arquivos

Passos tomados para filtrar e obter os arquivos:

## `result.json` [54465]

Chat do grupo *Dados Abertos .BR* (https://t.me/dadosabertos).

Baixado utilizando a ferramenta *Export chat history*.

## `links.txt` [8871]

Todos os links do chat.

Filtrados do arquivo `result.json` utilizando a ferramenta [`jq`](https://stedolan.github.io/jq/).

```sh
jq -r '.messages[] | .text | select(type == "array") | .[] | select(type == "object") | select(.type == "link") | .text' | tr [:upper:] [:lower:] | sort -u
```

## `gov_links.txt` [1771]

Links `.gov.br` de todos os links em `links.txt`.

```sh
ag '\.gov\.br'
```

## `api_gov_links.txt` [44] e `api_links.txt` [86]

Filtrados dos arquivos `gov_links.txt` e `links.txt` utilizando o `ag`.

```sh
ag '\bapi\b'
```

E depois podemos fazer uma requisição para todos esses links e ver quais ainda estão ativos (mas não fizemos ainda).

```sh
for LINK in $(cat gov_links.txt)
do
	curl -s $LINK >/dev/null && echo $LINK
done
```