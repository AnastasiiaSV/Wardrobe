<?php

if(!isset($language)){
    $language="en";
}


if ($language=="en") {

    return [
        'lets_start' => 'Lets start',

        'home' => 'Home page',
        'login' => 'Login',
        'logout' => 'Logout',
        'sign_up' => 'Sign up',
        'account' => 'Account',
        'contacts' => 'Contacts',
        'language' => 'Language',
        'feedback' => 'Feedback',

        'email' => 'Email address',
        'password' => 'Password',

        'name' => 'Name',
        'surname' => 'Surname',
        'phone' => 'Phone',
        'date_of_birth' => 'Date of birth',
        'city' => 'City',
        'country' => 'Country',

        'forgot' => 'Forgot password?',
        'remember' => 'Remember me',

        'create' => 'Create',
        'edit' => 'Edit',
        'delete' => 'Delete',

        'wardrobe' => 'Wardrobe',
        'outfit' => 'Outfit',
        'item' => 'Item',
        'items' => 'Items',
        'no_items' => 'No items there',

        'users_wardrobes' => 'User\'s wardrobes',
        'users_outfits' => 'User\'s outfits',

        'new_wardrobe' => 'New wardrobe',
        'new_item' => 'New item',
        'create_outfit' => 'Create outfit',

        'new_wardrobe_name' => 'Name of new wardrobe',
        'create_wardrobe' => 'Create wardrobe',

        'new_outfit_name' => 'Name of new outfit',
        'new_outfit_declaration' => 'Declaration of new outfit',

        'new_element_name' => 'Name of new element',
        'category' => 'Category',
        'type' => 'Type',
        'season' => 'Season',
        'storage' => 'Storage place',
        'choose_for_given' => 'choose for given category',

        'not_alive_name' => 'Name', //название (не имя)

        'press_to_edit_item' => 'Press to this text to edit item',
        'delete_item' => 'Delete item',

        'description' => 'Description',
        'creation' => 'Creation', //впемя создания

        'press_to_edit_outfit' => 'Press to this text to edit outfit',
        'delete_outfit' => 'Delete outfit',
        'outfit_declaration' => 'Outfit declaration',
        'delete_items' => 'Delete items',
        'add_items' => 'Add items',
        'add_items_to_outfit' => 'Add chosen items to outfit',
        'items_in_outfit' => 'Items in outfit',

        'contacts_text' => 'To contact with author or to left your feedback
                            please send your mail to our address',


////////////////////

        'words' => 'Words',
        'popular' => 'Popular',
        'otherPopular' => 'Other popular items from this category',
        'type_your' => 'Type your',
        'settings' => 'Settings',


        'search' => 'Search',
        'sort' => 'sort',
        'date' => 'Date',
        'biggest_first' => 'biggest first',
        'lower_first' => 'lower first',
        'search_criteria' => 'search criteria',
        'accept' => 'Accept',
        'top' => 'Top 10',
    ];

}else if ($language == "ru"){
    return [
        'lets_start' => 'Вперёд',

        'home' => 'Главная страница',
        'login' => 'Вход',
        'sign_up' => 'Регистрация',
        'account' => 'Аккаунт',
        'contacts' => 'Контакты',
        'language' => 'Язык',
        'feedback' => 'Отзывы',

        'email' => 'Email адресс',
        'password' => 'Пароль',

        'name' => 'Имя',
        'surname' => 'Фамилия',
        'phone' => 'Телефон',
        'date_of_birth' => 'Дата рождения',
        'city' => 'Город',
        'country' => 'Страна',

        'forgot' => 'Забыли пароль?',
        'remember' => 'Запомнить меня',

        'create' => 'Создать',
        'edit' => 'Редактировать',
        'delete' => 'Удалить',

        'wardrobe' => 'Гардероб',
        'item' => 'Элемент',
        'items' => 'Элементы',
        'no_items' => 'Нет элементов для отображения',

        'users_wardrobes' => 'Ваши гардеробы',
        'users_outfits' => 'Ваши образы',

        'new_wardrobe' => 'Новый гардероб',
        'new_item' => 'Новый элемент',
        'create_outfit' => 'Создать образ',

        'new_wardrobe_name' => 'Название нового гардероба',
        'create_wardrobe' => 'Создать гардероб',

        'new_outfit_name' => 'Название нового образа',
        'new_outfit_declaration' => 'Описание нового образа',

        'new_element_name' => 'Название нового элемента',
        'category' => 'Категория',
        'type' => 'Тип',
        'season' => 'Сезон',
        'storage' => 'Место хранения',
        'choose_for_given' => 'выберете для конкретной категории',

        'not_alive_name' => 'Название', //название (не имя)

        'press_to_edit_item' => 'Нажмите на этот текст для редактирования элемента',
        'delete_item' => 'Удалить элемент',

        'description' => 'Описание',
        'creation' => 'Время создания', //впемя создания

        'press_to_edit_outfit' => 'Нажмите на этот текст для редактирования образа',
        'delete_outfit' => 'Удалить образ',
        'outfit_declaration' => 'Описание образа',
        'delete_items' => 'Удалить элементы',
        'add_items' => 'Добавить элементы',
        'add_items_to_outfit' => 'Добавить выбранные элементы в образ',
        'items_in_outfit' => 'Элементы образа',

        'contacts_text' => 'Для связи с автором или для отзыва
                            пожалуйста отправте ваше сообщение по адресу',


////////////////////
        'no_items' => 'Здесь нет элементов',
        'words' => 'Слова',
        'popular' => 'Популярное',
        'otherPopular' => 'Other popular items from this category',
        'type_your' => 'Введите ваш',
        'settings' => 'Настройки',


        'search' => 'Поиск',
        'sort' => 'Сортировка',
        'date' => 'Дата',
        'biggest_first' => 'сначала больше',
        'lower_first' => 'сначала меньше',
        'search_criteria' => 'критерий поиска',
        'accept' => 'Принять',
        'top' => 'Топ 10',
    ];

}





/*
// Задаем константы:
define('language', 'Language');
//строки для вывода на вьюхах

//$language = Cookie::get('Lang', 'en');
$language="ru";

if ($language=="ru") {
    define('contacts', 'Контакты');
    define('basket', 'Корзина');
    define('feedback', 'Отзывы');
    define('search', 'Поиск');
    define('sort','сортировка');
    define('date','Дата');
    define('biggest_first','сначала больше');
    define('lower_first','сначала меньше');

    define('login', 'Вход');
    define('sign_up', 'Регистрация');
    define('password', 'Пароль');

    define('start', 'Начать');
    define('name', 'Имя');
    define('surname', 'Фамилия');
    define('phone', 'Телефон');
    define('date_of_birth', 'Дата рождения');
    define('city', 'Город');
    define('country', 'Страна');

    define('forgot', 'Забыли пароль?');
    define('email', 'Email адресс');

    define('search_criteria', 'критерий поиска');
    define('accept', 'Принять');
    define('top', 'Топ 10');
    define('add_to_cart', 'Добавить в корзину');

    define('no_items', 'Здесь нет элементов');
    define('category', 'Категория');
    define('price', 'Цена');
    define('dimensions', 'Размены');
    define('downloads_count', 'Количство загрузок');
    define('buyer', 'Покупатель');
    define('seller', 'Продавец');
    define('type', 'Тип');
    define('words', 'Слова');

    define('popular', 'Популярное');
    define('otherPopular', 'Другие популярные элементы этой категории');

    define('type_your', 'Введите');

    define('salary', 'Заработок');

    define('buy', 'Купить');
    define('edit', 'Редактировать');
    define('new_item', 'Добавить новый элемент');
    define('del', 'Удалить');

    define('account', 'Аккаунт');
    define('account_info', 'Информация аккаунта');


    define('get_seller_account', 'Получить аккаунт продавца');
    define('get_admin_account', 'Получить аккаунт администратора');
    define('admin_key', 'Key');

    define('settings', 'Настройки');

    define('bought_items', 'Галлерея купленых элементов');
    define('user_items', 'Галлерея моих элементов');

    define('card', 'Оплатить картой');
    define('bill', 'Оплатить с личного счета');
    define('price_to_pay', 'Сумма к оплате');
    define('pay', 'Оплатить');

    define('card_number', 'Номер банковской карты');
    define('card_key', 'Ключ-пароль карты');

    define('total', 'Сумма к оплате');
    define('dollar', '$');

    define('current_salary', 'Текущее количество средств');

    define('add', 'Добавить');
    define('adding', 'Добавление нового элемента');

    define('choose', 'Выбрать файл');

}else if ($language == "en"){

    define('contacts', 'Contacts');
    define('feedback', 'Feedback');
    define('search', 'Search');
    define('sort','sort');
    define('date','Date');
    define('biggest_first','biggest first');
    define('lower_first','lower first');

    define('login', 'Login');
    define('sign_up', 'Sign up');
    define('password', 'Password');

    define('start', 'Lets start');
    define('name', 'Name');
    define('surname', 'Surname');
    define('phone', 'Phone');
    define('date_of_birth', 'Date of birth');
    define('city', 'City');
    define('country', 'Country');

    define('forgot', 'Forgot password?');
    define('email', 'Email address');

    define('search_criteria', 'search criteria');
    define('accept', 'Accept');
    define('top', 'Top 10');

    define('no_items', 'No items there');
    define('category', 'Category');

    define('dimensions', 'Dimensions');

    define('type', 'Type');
    define('words', 'Words');

    define('popular', 'Popular');
    define('otherPopular', 'Other popular items from this category');

    define('type_your', 'Type your');


    define('edit', 'Edit');
    define('new_item', 'Add new item');
    define('del', 'Delete');

    define('account', 'Account');
    define('account_info', 'Account information');

    define('admin_key', 'Key');

    define('settings', 'Settings');

    define('user_items', 'My items gallery');

    define('add', 'Add');
    define('adding', 'New item adding');

    define('item_name', 'Item name');
    define('choose', 'Choose file');
    define('choose_type', 'Choose item type');
    define('choose_category', 'Choose item category');
    define('check_words', 'Check some keywords for new item');
    define('choose_visibility', 'Choose visibility type');

    define('visible', 'Make item visible (It will appear in general gallery)');
    define('not_visible', 'Make item non-visible');
}



*/


