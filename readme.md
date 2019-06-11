### Manual setup instructions

```bash
composer install
php artisan key:generate
php artisan migrate
```

### docker-compose build instructions

docker-compose.yml
```yaml
version: '3'

services:
  app:
    build:
      context: https://github.com/timsci/interview-20190610.git
    environment:
      DB_HOST: db
      DB_USERNAME: root
      DB_PASSWORD: password
      DB_DATABASE: contact
    links:
      - db:db
    ports:
      - 80:80
  db:
    image: mysql:5.7
    environment:
      MYSQL_ROOT_PASSWORD: password
      MYSQL_DATABASE: contact
```

Note for first time builds. It takes mysql container a second to initialize the database. You will get an error if you do `docker-compose up -d` the first time.

Just up the app service again once the db container is fully initialized to resolve.
