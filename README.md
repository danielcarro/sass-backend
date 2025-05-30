# 🧠 Laravel SaaS - Multi-Tenancy com Sanctum, Redis e Painel Administrativo

Este projeto é uma aplicação Laravel robusta com suporte a **multi-tenancy**, utilizando [Stancl Tenancy](https://tenancyforlaravel.com/), autenticação via [Laravel Sanctum](https://laravel.com/docs/sanctum), Redis como cache/queue driver e uma interface administrativa construída com Blade, e TailwindCSS.

## ✨ Recursos Principais

- 🔐 Autenticação via **Sanctum** (API Token)
- 🏢 Multi-tenancy com **Stancl/Tenancy**
- ⚡ Suporte a **Redis** com **Predis** (compatível com WSL)
- 💡 Painel administrativo utilizando **Blade** + **TailwindCSS**
- 📦 API RESTful para consumo de dados por frontends (ex: SPA, mobile, etc)
- 🛠️ Configurado com **Laravel Vite** e **Sass**
- 📚 Permissões e papéis com **Spatie Laravel Permission**

## 📦 Instalação

### 1. Clone o repositório

```bash
git clone https://github.com/seu-usuario/seu-repositorio.git
cd seu-repositorio
```

### 2. Instale as dependências PHP e JS

```bash
composer install
npm install
```

### 3. Configure o ambiente

```bash
cp .env.example .env
```

Em seguida, edite as variáveis de ambiente, especialmente:

```
APP_URL=http://localhost:8000
DB_CONNECTION=mysql
DB_HOST=127.0.0.1 
DB_PORT=3306
DB_DATABASE=supervisory_backend
DB_USERNAME=root
DB_PASSWORD=
CACHE_DRIVER=redis
REDIS_CLIENT=predis
REDIS_HOST=127.0.0.1 -> insira o ip do redis  
REDIS_PORT=6379
```
💡 digite o comando a seguir no console para adquirir o ip do Redis.
- wsl hostname -I

💡 Certifique-se de que o Redis esteja rodando corretamente no WSL.

### 4. Execute as migrações e seeders

```bash
php artisan migrate 
```

### 5. Inicie os servidores

```bash
npm run dev
php artisan serve
```

## 👤 Criar Usuário Admin via Tinker
Você pode criar um usuário administrador manualmente utilizando o Tinker. Execute o seguinte:

```bash
php artisan tinker
```

```bash
use App\Models\User;
use Spatie\Permission\Models\Role;

// Cria o usuário admin
$user = User::create([
    'name' => 'admin',
    'email' => 'admin@test.com',
    'password' => bcrypt('12345678'),
]);

// Cria (caso ainda não exista) e atribui o papel de admin
Role::firstOrCreate(['name' => 'admin']);
$user->assignRole('admin');
```

## 🧪 Testando a API

A API utiliza o Laravel Sanctum para autenticação. Após o login, um token será gerado para acesso aos endpoints protegidos.

Exemplo de headers para chamadas autenticadas:

```
Authorization: Bearer {seu-token}
Accept: application/json
```

## 🌐 Multi-Tenancy

O projeto está preparado para criação de múltiplos tenants utilizando **Stancl/Tenancy**. Cada tenant possui:

- Banco de dados isolado  
- Rotas separadas  
- Autenticação própria

Crie um tenant via comando:

```bash
php artisan tenancy:tenant:create dominio-do-cliente.local
```

Ou utilize o Tinker para criar manualmente.

⚠️ Certifique-se de configurar seu ambiente (hosts, nginx, etc.) para suportar subdomínios.

## 🛠️ Scripts

- `npm run dev` – Inicia o Vite para desenvolvimento  
- `npm run build` – Gera os assets otimizados para produção  
- `php artisan tenancy:*` – Comandos do pacote Stancl

## 📂 Estrutura do Projeto

- `app/Http/Controllers/API` – Endpoints da API REST  
- `resources/views/admin` – Painel administrativo em Blade  
- `routes/web.php` – Rotas para admin  
- `routes/api.php` – Rotas para API pública/privada  
- `routes/tenant.php` – Rotas específicas por tenant

comando para obter a lista de rotas:
- php artisan route:list


## 🔐 Gerenciamento de Acesso

Este projeto utiliza o pacote **spatie/laravel-permission** para:

- Definir papéis (ex: administrador, gerente, usuário)
- Controlar permissões por recurso


