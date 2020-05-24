#Painel administrativo com ACL

<p>O sistema foi construido utilizando como base o layout <a href="https://adminlte.io/docs/3.0/">AdminLTE</a> e para a estrutura de ACL o componente <a href="https://docs.spatie.be/laravel-permission/v3/introduction/">Laravel Permission</a>.</p>

<p>O objetivo do mesmo é servir de base para sistemas administrativos, contendo apenas a estrutura essencial para um projeto, podendo ser alterada.</p>

#Requisitos

* PHP ^7.3.
* MySql.

#Instalação

* Clonar o repositório.
* Acessar a pasta do projeto.
* Rodar o comando `composer install`.
* Criar uma cópia do arquivo .env.example com o nome .env.
* Acessar o arquivo criado e configurar com banco de dados e se possivel e-mail.
* Rodar o comando `php artisan key:generate`.
* Rodar o comando `php artisan migrate`.
* Rodar o comando `php artisan db:seed`'.

<p>Após concluir esses passos já é possivel iniciar o servidor local para desenvolvimento. 
Alguns usuários já foram disponibilizados para exemplificar o ACL nas áreas de Permissões, Funções e Usuários do sistema.</p>

<p>Segue acessos:</p>
Usuário: admin <br>
Senha: 123456789 <br><br>
Usuário: gestor <br>
Senha: 123456789 <br><br>
Usuário: suporte <br>
Senha: 123456789 <br><br>
Usuário: usuario <br>
Senha: 123456789 <br><br>

<p>Na instalação realizada estão presentes os pacotes basicos que o template AdminLTE utiliza. Novos componentes e plugins podem ser adicionados da forma padrão (baixando e importando o link nas views) ou instalando dependencias via Laravel mix, nesse caso é necessario executar os comandos abaixo:</p>

* Rodar o comando `npm install`.
* Rodar o comando `npm i jquery`.
* Rodar o comando `npm install --save @fortawesome/fontawesome-free`.
* Rodar o comando `npm i overlayscrollbars`.
* Rodar o comando `npm run dev`.


