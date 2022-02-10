$(document).ready(function () {
    $('.adding-list').slick({
        arrows: false,/*Стрелочки*/
        dots: false,/*Точки*/
        adaptiveHeight: false,/*Адаптивная высота слайдера*/
        slidesToShow: 2,/*Количество слайдов,которые покажет слайдер за 1 раз*/
        slidesToScroll: 1,/*Количество слайдов,которые пролистываются за 1 клик*/
        speed: 1500,/*Скорость перелистыванию слайдво(300 мсм)*/
        easing: 'linear',/*Вид перелистывания слайдера*/
        infinite: true,/*Будет ли слайдер бесконечный*/
        initialSlide: 0,/*Назначение стартового слайдера*/
        autoplay: false,/*Автоматическое перелистывание слайдов*/
        autoplaySpeed: 3000,/*Скорость автоматического перелистывания слайдов(1000 - 1сек)*/
        pauseOnFocus: true,/*Пауза автопроигрывания при клике мыши*/
        pauseOnHover: true,/*Пауза при наведении на слайдер*/
        pauseOnDotsHover: true, /*Пауза автопроигрывания при наведении на точки*/
        draggable: false,/*Перелистывание свайпом на ПК*/
        swipe: true,/*Перелистывание свайпом на телефоне*/
        touchThreshold: 5,/*Момент срабатывания свайпа при свайпе*/
        touchMove: false,/*Включает все возможности тачскрина*/
        waitForAnimate: true,/*Возможность отключения ожидать анимацию переключения*/
        centerMode: false,/*Выстраивания первого слайда по центру*/
        variableWidth: false,/*Растяжение слайдов по всей ширине*/
        rows: 1,/*Ряды слайдера*/
        slidesPerRow: 1,/*Количество слайдов в ряду*/
        vertical: false,/*Вертикальный слайдер*/
        verticalSwiping: true,/*Свайп вверх при вертикальном слайдере*/
        responsive: [/*АДаптив при определенном разрешении*/
            {
                breakpoint: 1366,
                settings: {
                    arrows: true,/*Стрелочки*/
                    slidesToShow: 2,
                },
            },
        ],
        mobileFirst: false,
    });
});
