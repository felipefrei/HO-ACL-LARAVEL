<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>


## Sobre o Projeto:

A aplicação entrega um sistema de Login e nível de acesso simples.


## Regras do Projeto:

O administrador do sistema deverá Manter permissões e Manter usuários, cada usuário com uma ou mais permissões para a execução das seguintes tarefas:

- Manter cursos.
- Manter categorias.
- Manter arquivos.
- O administrador não tem acesso às tarefas relacionadas a manter cursos, categorias e arquivos


## Sobre os usuários:

- Administrador.
- Comum.


## Tecnologias utilizadas

- Laravel 8.83.25
- MySql 8.0.27


## Componentes utilizados

- Para o sistema de autenticação simples foi utilizado o [Laravel Breeze](https://laravel.com/docs/9.x/starter-kits#laravel-breeze).
- Para o sistema de criação de permissões foi utilizado o pacote [Spatie](https://spatie.be/docs/laravel-permission/v5/introduction).
- Para o FrontEnd foi utilizado o template [soft-ui-dashboard](https://www.creative-tim.com/product/soft-ui-dashboard-tailwind).

O Breeze utiliza o Tailwind por padrão como framework css, por esse motivo o template front-end também foi escolhido com o mesmo framework.


## Passo-a-passo para abrir o projeto:

- Dentro da pasta do projeto rodar o comando composer install
- Criar o arquivo .env na raiz do projeto seguindo o modelo do arquivo .env.example.
- Altere o bloco de conexão desse novo arquivo ('linhas 11 à 16').
- Criar a base de dados com o mesmo nome da base de dados que foi definida na linha 14 do arquivo .env com a collation "utf8mb4_unicode_ci" que é a collation padrão do laravel
- Rodar o comando php artisan migrate
- Rodar o comando php artisan key:generate
- Rodar o comando php artisan permission:create-permission "admin"
- Rodar o comando php artisan permission:create-permission "user"
- Rodar o comando php artisan serve

Pronto agora o projeto estará rodando no endereço http://localhost:8000



## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
