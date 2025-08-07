# Nome do Projeto

Este é um projeto Laravel com Vue 3 que utiliza o Starter Kit oficial com TypeScript, Inertia.js, Tailwind CSS v4, ShadCN UI e Eloquent ORM. O ambiente de desenvolvimento é gerenciado com Laravel Sail e Docker.

## 🚀 Tecnologias Utilizadas

- [Laravel 11.x](https://laravel.com)
- [Laravel Sail](https://laravel.com/docs/sail)
- [Docker](https://www.docker.com/)
- [Vue 3](https://vuejs.org/)
- [TypeScript](https://www.typescriptlang.org/)
- [Inertia.js](https://inertiajs.com/)
- [Tailwind CSS 4](https://tailwindcss.com/)
- [ShadCN UI (Vue)](https://ui.shadcn.com/)
- [Eloquent ORM](https://laravel.com/docs/eloquent)

---

## ⚙️ Pré-requisitos

- Docker e Docker Compose instalados
- `make`, `bash` e `curl` disponíveis no sistema (para usar Laravel Sail com facilidade)

---

## 🧱 Instalação

1. **Clone o repositório:**

```bash
git clone https://github.com/seu-usuario/seu-repositorio.git
cd seu-repositorio
```

2. **Copie o \*\***`.env`\***\* e configure:**

```bash
cp .env.example .env
```

Edite as variáveis do banco de dados se necessário. Exemplo padrão do Sail:

```
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=sail
DB_PASSWORD=password
```

3. **Suba os containers com Laravel Sail:**

```bash
./vendor/bin/sail up -d
```

4. **Instale as dependências PHP e JavaScript:**

```bash
./vendor/bin/sail composer install
./vendor/bin/sail npm install
```

5. **Gere a chave da aplicação e rode as migrations:**

```bash
./vendor/bin/sail artisan key:generate
./vendor/bin/sail artisan migrate
```

6. **Compile os assets front-end:**

```bash
./vendor/bin/sail npm run dev
```

---

## 📁 Estrutura do Projeto

```
.
├── app/              # Código backend Laravel (controllers, models, etc.)
├── resources/
│   ├── js/           # Código frontend Vue 3 com Inertia e TypeScript
│   └── views/        # Views Blade (se houver)
├── routes/
│   └── web.php       # Rotas web
├── docker/           # Arquivos docker (caso customizados)
├── sail              # Script Laravel Sail
└── ...
```

---

## 🥪 Scripts úteis

```bash
./vendor/bin/sail artisan test            # Rodar testes
./vendor/bin/sail artisan migrate:fresh   # Resetar banco de dados
./vendor/bin/sail npm run build           # Compilar assets para produção
./vendor/bin/sail shell                   # Entrar no container do Laravel
```

## 📄 Licença

Este projeto está licenciado sob a [MIT License](LICENSE).
