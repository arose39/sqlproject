
Для запуска проєкта в докере пропишите команды
 - composer update
 - sail up
 - npm instal && npm run dev


Для выполнения миграций и наполнений таблиц пропишите комануду
 - sail artisan migrate --seed

Для віполнения тестов
 -  sail artisan test

code coverage in dir /coverage

.env не добавлен в .gitignore для удобства.

RESTapi:
для проверки работы API в программе POSTMAN 
выполните следующие запросы:

Для вывода всех студентов
 - http://localhost/api/v1/students через метод GET 

Для создания нового студента
 - http://localhost/api/v1/students через метод POST

Передайте form-data в body
 - first_name  - testfirstname
 - last_name - testlastname
 - courses[] - 1
 - courses[] - 2
 - group - 3


Для обновления данных студента
 - http://localhost/api/v1/students/200 через метод POST

Передайте form-data в body
- _method - put
- first_name  - testfirstname
- last_name - testlastname
- courses[] - 1
- courses[] - 2
- group - 3

Для удаления студента 
 - http://localhost/api/v1/students/200 через метод POST

Передайте form-data в body
- _method - delete

Для вывода всех курсов:
 - http://localhost/api/v1/courses method GET

Для вывода всех груп
 - http://localhost/api/v1/groups method GET

