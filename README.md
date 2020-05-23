#Painel administrativo com ACL

#Requisitos

* PHP ^7.3.
* MySql.

<p>Para criar regras de permissão o projeto utiliza um componente, acesse a documentação do <a href="https://docs.spatie.be/laravel-permission/v3/introduction/" target="_blank">Laravel Permission</a> e aplique as politicas da forma que desejar.</p>

#Instalação

<p>O sistema foi construido utilizando como base o layout AdminLTE, para ter todos os recursos disponiveis, seguir os passos de instalação</p>

* Clonar o repositório.
* Acessar a pasta do projeto.
* Rodar o comando `composer install`.
* Criar uma cópia do arquivo .env.example com o nome .env.
* Acessar o arquivo criado e configurar com banco de dados e se possivel e-mail.
* Rodar o comando `php artisan key:generate`.
* Rodar o comando `php artisan migrate`.
* Rodar o comando `php artisan db:seed`'.

<p>Após concluir esses passos já é possivel iniciar o servidor local para desenvolvimento. Utilizar os seguintes dados para acesso:<br><br>
Usuário: admin <br>
Senha: admin123
</p>

<p>Na instalação realizada estão presentes os pacotes basicos que o template AdminLTE utiliza. Novos componentes e plugins podem ser adicionados da forma padrão (baixando e importando o link nas views) ou instalando dependencias via Laravel mix, nesse caso é necessario executar os comandos abaixo:</p>

* Rodar o comando `npm install`.
* Rodar o comando `npm i jquery`.
* Rodar o comando `npm install --save @fortawesome/fontawesome-free`.
* Rodar o comando `npm i overlayscrollbars`.
* Rodar o comando `npm run dev`.
* Rodar o comando `php artisan serve`.


