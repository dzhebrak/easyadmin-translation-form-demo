# easyadmin-translation-form-demo
This repository demonstrates how to add entity translation functionality to Easyadmin administrative backend using knplabs/doctrine-behaviors and a2lix/translation-form-bundle

An "Article" entity will be created with the ability to translate title, slug and content into multiple languages (English and French - mandatory, German - optional), as well as the ability to filter by translated fields.

This repository is a demonstration of the tutorial described at [https://dzhebrak.com/blog/translating-entities-easyadmin-doctrinebehaviors](https://dzhebrak.com/blog/translating-entities-easyadmin-doctrinebehaviors?utm_source=github.com&utm_medium=tutorial_demo&utm_campaign=easyadmin_entity_translation&utm_id=opensource)

## Installation

Clone project, configure `DATABASE_URL`:
```bash
echo "DATABASE_URL=mysql://root:password@mariadb:3306/app?serverVersion=10.11.2-MariaDB&charset=utf8mb4" > .env.local
```

Run:
```bash
make up
make bash
composer install && bin/console doctrine:database:create --if-not-exists && bin/console doctrine:migrations:migrate --no-interaction
```

Open:

```bash
http://localhost:8012/admin/
```

![Result](result.png)
