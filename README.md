# Laravel Api RESTful

## Introdução

Para iniciar a aplicação execute os seguintes comandos.

```
cd laradock 
docker-compose up -d nginx mysql phpmyadmin
docker-compose exec workspace bash 

```

Para criar o banco de dados e popular com registros para testes

```
php artisan migrate --seed
yes 

```
Após finalizar o processo de configuração é possível acessar http://localhost
Se for necessário é possível acessar o phpmyadmin http://localhost:8081

Para realizar requisições de teste via Postman importe as coleções que estão na pasta

```
./postman

```
## Model
https://github.com/wevertoncamposdev/apiprojectbywevertoncampos/blob/main/public/Model.svg

## Descrição do desenvolvimento






### Autores <br>
<img src="https://github.com/wevertoncamposdev.png" width=115><br><sub>Weverton Campos</sub>
