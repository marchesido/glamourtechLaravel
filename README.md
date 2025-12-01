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
- Biblioteca Chart.js
php artisan make:model Produto -mcr
php artisan make:controller AdminProdutoController
php artisan make:migration add_categoria_id_to_produtos_table --table=produtos
php artisan migrate:rollback
-Caso necessário, retornar uma migration anterior


Instalação e Execução
Siga os passos abaixo para executar o sistema localmente:
-1	Clonar o repositório
git clone <https://github.com/marchesido/glamourtech.git>
cd glamourtech
-2	Instalar dependências com Composer
composer install
-3  Criar chave de aplicação
php artisan key:generate
-4 Rodar as migrations para criar as tabelas do banco de dados
php artisan migrate
-5	Rodar os seeders (recomendado)
php artisan db:seed
-6	Iniciar o servidor local
php artisan serve
Agora o sistema estará disponível em http://localhost:8000.

-Conta Demonstrativa do Administrador: admin@example.com senha:admin123

-Conta Demonstrativa do usuario: user@example.com senha:12345678

Estrutura do Banco de Dados 
O projeto utiliza um DER (Diagrama Entidade-Relacionamento) que mostra as tabelas principais (Produtos, Categorias, ItensPedidos, User, Pedido) e seus relacionamentos.
Link para o DER: [public\imagens\DER\DER ENVIAR PROFESSOR.jpg]

-Estrutura do Banco de Dados

O projeto utiliza um DER (Diagrama Entidade-Relacionamento) contendo as tabelas principais:

Produtos

Categorias

Pedidos

ItensPedidos

Users

-Rotas Úteis para Testes
-Testar Procedure de inserção massiva	http://127.0.0.1:8000/produtos/inserir-massa

-Dashboard de Indicadores	http://127.0.0.1:8000/dashboard

-Administração de Produtos	http://127.0.0.1:8000/admin-produtos

-Cadastro de Usuário	http://127.0.0.1:8000/register

-Carrinho de Compras	http://127.0.0.1:8000/cart

-Itens do Pedido	http://127.0.0.1:8000/itens-pedidos

-Pedidos	http://127.0.0.1:8000/pedidos

-Criar Categoria	http://127.0.0.1:8000/categorias/create

-Criar Produto	http://127.0.0.1:8000/admin-produtos

Integrantes
Douglas Alexandre Marchesi