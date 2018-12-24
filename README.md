# Сервис скидок
Пример реализации сервиса скидок по заданным параметрам.
В этом примере применил паттерны Specification и Strategy. Specification - использовал для проверки соответствуют ли параметры заказа данной скидке.
Strategy - использовал для определения максимальной скидки. Все реализации specification и strategy покрыл юнит-тестами. Покрытие остального кода тестами, я считаю, не является целью данной задачи.

## HOW TO

*ВАЖНО*
1. У вас должны быть установлены docker и docker-compose (хотя никто вам не мешает установить проект по старинке)
2. Должен быть свободен 80-й порт (если занят сконфигурируйте .docker/docker-compose.yaml на работу через другой порт)
3. Для того чтобы работать с изменениями в коде vue вам понадобиться установленный yarn

Это руководство я проверял на Ubuntu Linux если у вас другая операционная система, посмотрите руководство по докеру для вашей ОС.

1. Клонируем этот репозиторий к себе в папку  
`git clone git@github.com:sanikeev/discount-service.git gemotest`
2. Запускаем докер
`$ sudo docker-compose -f .docker/docker-compose.yaml up -d`
3. Устанавливаем зависимости
`$ sudo docker exec -i gemotest-fpm composer install`
4. Разворачиваем схему БД
`$ sudo docker exec -i gemotest-fpm php bin/console doctrine:schema:update --force`
5. Загружаем подготовленные фикстуры в БД
`$ sudo docker exec -i gemotest-fpm php bin/console doctrine:fixtures:load`
6. Запускаем юнит-тесты чтобы убедиться что все ок:
`$ sudo docker exec -i gemotest-fpm vendor/bin/phpunit`
7. Открываем проект в браузере по адресу `http://gemotest.lvh.me`

## Чему в проекте не уделил внимание

* Клиентской части. Например нет datepicker и ввода номера телефона по маске
* На бэкенде так же не сделал проверку на валидность данных
* В формах нет вывода ошибок заполнения. Указан только html5 атрибут required

## Технологии которые использовал

* Docker-compose - для инициализации окружения
* Symfony 4.2
* VueJs
* phpunit
