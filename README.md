# fortics-fullstack
Teste fullstack developer

## Requisitos:
- Docker
- Composer
- Node & NPM

## Inicialização
> Navegue ate a pasta /server e execute `composer install`
<br>
> Navegue até a pasta /web e execute `npm install`
<br>
> Vá para raiz do projeto e execute o docker file com `docker-compose up`
<br>
> Após os containers terem iniciado execute o console do container `api` e execute o seguinte comando : `php artisan migrate --seed`

## Acesso
> `API` : http://localhost:1234
<br>
> `WEB`: http://localhost:8000

## Funções

- Cadastro de refrigerantes
- Edição de cadastros
- Exclusão de refrigerantes em massa
- Paginação de listagem 
