# API de Gerenciamento de Aluguel de Veículos

## Descrição
Esta API, desenvolvida com Laravel e utilizando MySQL como banco de dados, é destinada ao gerenciamento completo de operações de aluguel de veículos. Ela permite a gestão de clientes, veículos, reservas e pagamentos, facilitando o controle e automatização de processos para empresas de locação de veículos.

## Funcionalidades
- **Clientes:** CRUD completo para gerenciamento de clientes.
- **Veículos:** CRUD para veículos, incluindo status de disponibilidade.
- **Reservas:** Gerenciamento de reservas, com controle de datas e status.
- **Pagamentos:** Registro e controle de pagamentos associados às reservas.
- **Autenticação:** (Opcional) Proteção de rotas utilizando JWT.

## Tecnologias Utilizadas
- **Laravel 10.x:** Framework PHP para desenvolvimento da aplicação.
- **PHP 8.x:** Linguagem de programação utilizada.
- **MySQL 5.x:** Banco de dados relacional.
- **Composer:** Gerenciador de dependências para PHP.
- **Postman:** Ferramenta para testes de API.

## Instalação

### Pré-requisitos
- PHP 8.x
- Composer
- MySQL
- Git

### Passos para Instalação

**Clone o Repositório:**
git clone https://github.com/pogtora/api-aluguel-veiculos.git
cd nome-do-repositorio

Instale as Dependências:
composer install

Configure o Arquivo .env:
cp .env.example .env

Gere a Chave da Aplicação:
php artisan key:generate

Execute as Migrations:
php artisan migrate

Inicie o Servidor de Desenvolvimento:
php artisan serve

Acesse a Aplicação:
A aplicação estará disponível em: http://127.0.0.1:8000

## Documentação da API
A documentação completa dos endpoints da API está disponível no Postman. Você pode importar a coleção de exemplos de requisições através da documentação do Postman.

### Endpoints Principais:

Clientes:
GET /api/clientes
POST /api/clientes
GET /api/clientes/{id}
PUT /api/clientes/{id}
DELETE /api/clientes/{id}

Veículos:
GET /api/veiculos
POST /api/veiculos
GET /api/veiculos/{id}
PUT /api/veiculos/{id}
DELETE /api/veiculos/{id}

Reservas:
GET /api/reservas
POST /api/reservas
GET /api/reservas/{id}
PUT /api/reservas/{id}
DELETE /api/reservas/{id}

Pagamentos:
GET /api/pagamentos
POST /api/pagamentos
GET /api/pagamentos/{id}
PUT /api/pagamentos/{id}
DELETE /api/pagamentos/{id}

### Testes:
php artisan test

## Deploy
O deploy da aplicação pode ser feito em qualquer servidor que suporte PHP 8.x e MySQL. Certifique-se de configurar corretamente o .env no ambiente de produção e rodar as migrations.

### Exemplos de Serviços de Hospedagem:
- Heroku
- AWS
- DigitalOcean

## Contribuições:
Contribuições são bem-vindas! Sinta-se à vontade para abrir issues e enviar pull requests. Por favor, siga as diretrizes de contribuição.

## Licença
Este projeto está licenciado sob a Licença MIT - consulte o arquivo LICENSE para mais detalhes.




