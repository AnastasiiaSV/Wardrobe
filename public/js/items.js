//увеличение изображений на глпвном экране при наведении

// действия после полной загрузки страницы
$(document).ready(function(){
    // объявляем переменные
    var image = $('.image'); // картинка
    var new_width = 200; // ширина для увеличения
    var new_height = 200; // высота для увеличения
    var start_width = image.attr('width'); // текущая ширина
    var start_height = image.attr('height'); // текущая высота

    image.hover(function(){
        // действие при наведении курсора
        // меняем размер картинки
        $(this).attr('width', new_width);
        $(this).attr('height', new_height);
    },function(){
        // действие при наведении курсора
        // меняем размер картинки
        $(this).attr('width', start_width);
        $(this).attr('height', start_height);
    });
});

