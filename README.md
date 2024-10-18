## Как поднять проект ?
```bash
cp .env.example .env
composer install
./vendor/bin/sail up -d
./vendor/bin/sail php artisan key:generate
./vendor/bin/sail php artisan migrate --seed

# Для перезапуска миграции и сидеров
./vendor/bin/sail php artisan migrate:fresh --seed
```
