# Content Administration Backend

---

### Project details

Admin: [api.propelascend.pl/admin](https://api.propelascend.pl:8080/admin)

admin visitor access:
```
username: visitor
pass: !9Ws+9L\f2U2
```

API: [api.propelascend.pl/api/doc](https://api.propelascend.pl:8080/api/doc)

Frontend app: [propelascend.pl](https://propelascend.pl)

---

## Setup

#### Flow

1. Build project:

```bash
$ make build
$ make up
```

1. Create database:

```bash
$ php bin/console doctrine:database:create
$ php bin/console doctrine:schema:create
```

2. Schema update:

```bash
$ make db
# or
$ php bin/console doctrine:schema:update --force
```

3. Migrations & Fixtures:

[DoctrineFixturesBundle](https://symfony.com/doc/3.5.x/bundles/DoctrineFixturesBundle/index.html)

Loading Fixtures
```bash
$ php bin/console doctrine:fixtures:load
# or 
$ php bin/console doctrine:fixtures:load --env=dev
```

#### Database
- [SF Intro](https://symfony.com/doc/current/doctrine.html)

## Tech

Clear cache 4 prod mode:

```
$ php bin/console cache:clear --env=prod --no-debug
$ php bin/console cache:warmup --env=prod --no-debug
$ php bin/console assets:install --env=prod --no-debug --symlink
```

## Deploy 2 prod:
- [SF Deploy Flow](https://symfony.com/doc/current/deployment.html)


## Test
- [SF Testing](https://symfony.com/doc/current/testing.html)
