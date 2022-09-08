
Для запуска проєкта в докере пропишите команды
 - .env.example переименуйте в .env
 - composer update
 - .vendor/bin/sail up
 - npm instal
   

Для выполнения миграций и наполнений таблиц пропишите комануду
 - sail artisan migrate --seed

Для віполнения тестов
 -  sail artisan test

code coverage in dir /coverage

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

Описание задания проекта:

Created an application that inserts/updates/deletes data in the database using eloquent and laravel framework. Use PostgreSQL DB.

Models  have next field

Group:
- name
- Student:
- group_id
- first_name
- last_name

Course:
- name
- description
- Created relation MANY-TO-MANY between tables STUDENTS and COURSES.

Created a laravel application

- Created migrations that create db scheme
- Wrote seeds that generate test data
- 10 groups with randomly generated names. The name should contain 2 characters, hyphen, 2 numbers
- Create 10 courses (math, biology, etc)
- 200 students. Take 20 first names and 20 last names and randomly combine them to generate students.
- Randomly assign students to groups. Each group could contain from 10 to 30 students. It is possible that some groups will be without students or students without groups
- Randomly assign from 1 to 3 courses for each student


In this project you can:

- Find all groups with less or equals student count.
- Find all students related to the course with a given name.
- Add new student
- Delete student by STUDENT_ID
- Add a student to the course (from a list)
- Remove the student from one of his or her courses
- Add REST-api.
