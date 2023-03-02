Модуль занимается добавлением\удалением\получением ссылок для шапки в каталоге(где зеленые ссылки).
Ссылки формируются из ProductCategory:slug и SmartFilterUrlParts:url_path.
Т.к. реализация подразумевала morphedByMany, то объясняю как работает. По данным у нас получилось, что таблица
product_categories 2 раза фигурирует в таблице category_seo_links - link_id и category_seo_link_id. Из-за это необходимо добавить
оба варианта связи в модель - прямую и инверсивную.
Ссылка на док: https://laravel.com/docs/5.7/eloquent-relationships#many-to-many-polymorphic-relations

Команды:
crm:add:seo-catalog-urls-auto-actions - установка автоматических действий для функционала seo-ссылок в каталоге
crm:add:seo-catalog-urls-create-menu - установка меню и прав для функционала ссылок в каталоге
crm:add-names-to-smart-filter-urls - одноразовая команда для предварительного наполнения поля имя в smart_filter_url_parts


