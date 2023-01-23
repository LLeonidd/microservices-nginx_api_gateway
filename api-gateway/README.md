# API Gateway

Пример конфигурации nginx в качестве API Gateway.

## Как развернуть

Создать файл .env из .env.example и указать актуальные данные
```
cp .env.example .env
```

Далее

```
make install
```

Или пошагово:

1. Запустить docker
```
coker-compose up -d
```
2. Создать БД и запустить миграции и сиды в контейнерах микросервисов
```
docker-compose exec pgsql createdb -U sail ms_courses
docker-compose exec ms.courses php artisan migrate

docker-compose exec pgsql createdb -U sail ms_auth
docker-compose exec ms.auth php artisan migrate --seed
```

3. Установить passport на сервисе Auth и запомнить ключ Password grant client (также он лежит в бд в таблице oauth_clients)
```
docker-compose exec ms.auth php artisan passport:install
```