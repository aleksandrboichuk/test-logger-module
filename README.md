# Тестове завдання

### Виконано:

#### Модуль логування ([logger](modules%2Flogger))

- За допомогою паттерну Фабричний метод (Factory Method) реалізовано фабрики і логгери ([logger module components](modules%2Flogger%2Fcomponents)) для таких типів логування, як: 
  - відправка повідомлення на емейл ([EmailLoggerFactory](modules%2Flogger%2Fcomponents%2FEmailLoggerFactory.php), [EmailLogger](modules%2Flogger%2Fcomponents%2FEmailLogger.php)); 
  - запис в БД ([DatabaseLoggerFactory](modules%2Flogger%2Fcomponents%2FDatabaseLoggerFactory.php), [DatabaseLogger](modules%2Flogger%2Fcomponents%2FDatabaseLogger.php)); 
  - запис у файл ([FileLoggerFactory](modules%2Flogger%2Fcomponents%2FFileLoggerFactory.php), [FileLogger](modules%2Flogger%2Fcomponents%2FFileLogger.php)).
- Імплементовано інтерфейс [LoggerInterface](modules%2Flogger%2Finterfaces%2FLoggerInterface.php) за допомогою класу [Logger](modules%2Flogger%2Fcomponents%2FLogger.php)
- Створено конфігураційний файл для опису необхідних конфігурацій логгера ([logger.php](config%2Flogger.php)).
- Використано усі методи вищезгаданого класу [Logger](modules%2Flogger%2Fcomponents%2FLogger.php) у методах контролеру [LogController](controllers%2FLogController.php):
  - логування за типом по замовчуванню;
  - логування за обраним типом;
  - логування за всіма типами.

### Розгортання проєкту:
Для розгортання проєкту за допомогою Docker'а потрібно:
- Перейти у робочу директорію та виконати в консолі наступні команди:
   + `git clone https://github.com/aleksandrboichuk/test-logger-module.git` - клонування проєкту у робочу директорію
   + `cd test-logger-module`
   + `cd docker && cp docker-compose.example.yml docker-compose.yml` - копіювання конфігураційних файлів для docker-compose
   + `chmod -R 777 data logs ../runtime` - встановлення прав на директорії
   + `docker-compose build && docker-compose up -d` - білд та підняття контейнерів
   + `docker-compose exec php-fpm bash` - перехід у php-fpm контейнер для встановлення композеру (та виконання в майбутньому yii команд)
   + `composer install` - встановлення composer
   + `php yii migrate/up` - виконання міграцій

Проєкт має бути доступним за посиланням http://localhost

Роутинг:
- http://localhost/log/all - логування за всіма типами;
- http://localhost/log/email - логування за типом: **відправка повідомлення на емейл**;
- http://localhost/log/database - логування за типом: **запис в БД**;
- http://localhost/log/file - логування за типом: **запис у файл**;
    
   

