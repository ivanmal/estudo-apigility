# README #

Api criada com Apigility para estudo e referência.

## Instalação ##
* Clone ou baixe o repositório
* Instale as dependências com o composer
```
#!bash
$ composer install
```
* Crie a tabela na sua base de dados com o sql em /data/db.sql
* Altere as informações de conexão com a sua base em /config/autoload/user.global.php ou crie um arquivo local.php
* Configure seu servidor/Vhost para apontar para /public
* Altere para o modo de desenvolvimento:
```
#!bash
$ php public/index.php development enable
```
ou
```
#!bash
$ composer development-enable
```