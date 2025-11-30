<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).





GlamourTech
Descrição do Projeto
O GlamourTech é um sistema desenvolvido para gerenciar produtos e estoques de um site de comércio de cosméticos e eletrônicos. Ele permite a criação, edição e remoção de produtos, além de possibilitar a atualização de descrições, imagens e categorias dos itens cadastrados.
O sistema foi desenvolvido com foco em simplicidade, organização e integração com banco de dados, garantindo maior controle sobre os produtos disponíveis no site.

Tecnologias Utilizadas
-	Laravel (PHP Framework)
-	XAMPP (Servidor local e banco de dados)
-	Composer (Gerenciamento de dependências)
-	GitHub (Controle de versão)
-	InfinityFree (Hospedagem gratuita)

Instalação e Execução
Siga os passos abaixo para executar o sistema localmente:
1	Clonar o repositório
git clone <https://github.com/marchesido/glamourtech.git>
cd glamourtech
2	Instalar dependências com Composer
composer install
 	 3  Criar chave de aplicação
php artisan key:generate
  4 Rodar as migrations para criar as tabelas do banco de dados
php artisan migrate
5	Criar e configurar modelos e controladores
Exemplos:
php artisan make:model Produto -mcr
php artisan make:controller AdminProdutoController
php artisan make:migration add_categoria_id_to_produtos_table --table=produtos
6	Iniciar o servidor local
php artisan serve
7	Caso necessário, retornar uma migration anterior
php artisan migrate:rollback
Agora o sistema estará disponível em http://localhost:8000.

Estrutura do Banco de Dados
O projeto utiliza um DER (Diagrama Entidade-Relacionamento) que mostra as tabelas principais (Produtos, Categorias, ItensPedidos, User, Pedido) e seus relacionamentos.
Link para o DER: [public\imagens\DER\DER ENVIAR PROFESSOR.jpg]

usando biblioteca: Chart.js

Integrantes
Douglas Alexandre Marchesi
