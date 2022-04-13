## Инструкция к разворачиванию приложения

- git clone git@github.com:annagasovich/sib-manager-form.git
- composer install
- (копирование env, пропишите в нем параметры для менеджера или используйте существующие)
- php artisan storage:link
- php artisan migrate


## Создать тестовые заявки

php artisan db:seed

## Текущие доступы менеджера

MANAGER_LOGIN=admin@admin.com
MANAGER_PASSWORD=IEnALL2022
