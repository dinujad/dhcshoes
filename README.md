# DHC Shoes

PHP Laravel application for DHC Shoes.

## Requirements

- PHP 8.2+
- Composer
- Node.js 18+

## Setup

```bash
composer install
copy .env.example .env
php artisan key:generate
php artisan migrate
npm install
npm run build
php artisan serve
```

The app will be available at [http://127.0.0.1:8000](http://127.0.0.1:8000).
