# bolton_arquivei

1. git clone
2. cd bolton_arquivei
3. docker-compose up
4. docker exec -it bolton-arquivei-php-fpm /bin/bash
5. (no container) cd bolton
6. (no container) composer install
7. (no container) cp .env.example .env
8. (no container) php artisan key:generate
9. (no container) php artisan migrate
10. setar a variaveis de ambiente ARQUIVEI_BASE_URL (sem versao e endpoints), ARQUIVEI_API_ID e ARQUIVEI_API_KEY no arquivo .env
11. abrir o navegador e acessar o ip da sua docker machine utilizando a porta 8080. Exemplo: http://192.168.99.100:8080

Ao acessar as rotas "/" ou "/api/documentation" a interface Swagger será exibida permitindo a interação.