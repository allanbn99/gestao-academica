## Projeto Gestão Acadêmica
#### Tecnologias Utilizadas

 - **Back-End**
	 - PHP 7.4.3 (Linguagem de Programação)
	 - Laravel 8.37.0 (Framework)
	 - MySql 5.7.33 (Banco de Dados)
	 - Composer 2.0.11 (Gerenciador de Pacotes)
- **Front-End**
	 - HTML 5, CSS3 e JavaScript (Linguagens)
	 - Bootstrap 4.6 (Biblioteca CSS)
	 - jQuery (Biblioteca JS - Versão dependente do Bootstrap)
	 - Popper.js (Biblioteca JS - Versão dependente do Bootstrap)
	 - Npm 6.14.12 (Gerenciador de Pacotes - Requer Node instalado)

#### Instalando o Projeto

 - **Requisitos**
	 - Git instalado na máquina
	 - Composer instalado na máquina
	 - Node.JS e NPM instalados na máquina
	 - MySql instalado na máquina

Abra o terminal em uma pasta escolhida (Ex: Documentos) e execute o comando de clonagem de repositórios:

`git clone https://github.com/allanbn99/gestao-academica.git`

Entre na pasta onde o projeto foi instalado e execute o comando de instalação de dependências do composer:

`composer install`

Ainda na pasta root, execute o comando de instalação de dependências do npm:

`npm install`

Para compilar os arquivos do Front-End do projeto, execute o seguinte comando:

`npm run dev` ou `npm run watch`

Lembre-se de criar o arquivo `.env`. Este arquivo é responsável por definir as variáveis de ambiente. Sem este arquivo criado, o banco de dados não será conectado a aplicação e irá estourar um erro 500 na tela ao rodar o servidor. Copie o arquivo `.env.example` na pasta root e cole, trocando seu nome para `.env`, e após configue as variáveis do banco de acordo com os dados vigentes na sua máquina:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=1234
```

Após tudo configurado, execute o comando que faz rodar o servidor da aplicação:
`php artisan serve`

#### Documentação
   - Laravel 8: https://laravel.com/docs/8.x
