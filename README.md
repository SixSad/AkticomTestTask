# Akticom Test Task
____

## Краткое описание
Тестовое Api для Akticom. Под капотом laravel Orion v.9.0 для быстрого создания Rest Api + mariaDB. В качестве сервера использован octane/openswoole, прокси - traefik. Также добавлен линтер phpcs. Все миграции и установка composer выполняются автоматически.

## Подготовка перед запуском:
1. Создание файла конфигурации в корне проекта. **Необходимо указать свои значения во все защищенные поля. Например: API_APP_KEY**
```
cp .env .env.common
```
2. Запуск и сборка контейнеров:
```
docker-compose up -d --build
```
3. Запуск линтера phpcs + phpcbf:
```
docker-compose run api-phpcbf
```

## Доступные консоли инструментов:
 - traefik [http://traefik.localhost]
 - adminer [http://adminer.localhost]
   
## Доступные routes
 - / - healthchek for api
 - GET /loans - получение всех записей 
 - GET /loans/{$id} - получение конкретной записи
 - POST /loans - создание записи
 - DELETE /loans/{$id} - даление записи
 - PUT /loans/{$id} - обновление записи
