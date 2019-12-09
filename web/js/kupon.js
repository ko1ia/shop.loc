/**
 * 
 * Template Name: KuponHub
 * Template URL:  https://codenpixel.com/demos
 * Description:   Deals and discounts Bootstrap template
 * Version:       1.0.0
 * Author:        @codenpixel 
 * Author URI:    https://codenpixel.com
 * 
 */
// $(document).ready(function () {
//     "use strict";
//     // Loading
//     $(".animsition").animsition({
//             inClass: "fade-in"
//             , outClass: "fade-out"
//             , inDuration: 300
//             , outDuration: 300
//             , linkElement: ".animsition-link"
//             , loading: !0
//             , loadingParentElement: "body"
//             , loadingClass: "animsition-loading"
//             , unSupportCss: ["animation-duration", "-webkit-animation-duration", "-o-animation-duration"]
//             , overlay: !1
//             , overlayClass: "animsition-overlay-slide"
//             , overlayParentElement: "body"
//         })
//         , // Carousel
//         $(".main-slider").owlCarousel({
//             items: 1
//             , loop: !1
//             , center: !0
//             , margin: 10
//             , autoplayHoverPause: !0
//             , dots: !1
//             , nav: !1
//         })
//         , // Tooltips
//         $('[data-toggle="tooltip"]').tooltip(), $().button("toggle")
//         , // Add image via data attr
//         $(".bg-image").css("background", function () {
//             var a = "url(" + $(this).data("image-src") + ") no-repeat center center";
//             return a
//         }), $(".bg-image").css("background-size", "cover")
//         , // Navigation
//         $(".navbar-toggle").on("click", function (a) {
//             $(this).toggleClass("open"), $("#navigation").slideToggle(400)
//         })
//         , $(".navigation-menu>li").slice(-1).addClass("last-elements"), $('.navigation-menu li.has-submenu a[href="#"]').on("click", function (a) {
//             $(window).width() < 987 && (a.preventDefault(), $(this).parent("li").toggleClass("open").find(".submenu:first").toggleClass("open"))
//         })
//         , $(function () {
//             //caches a jQuery object containing the header element
//             var header = $(".header");
//             $(window).scroll(function () {
//                 var scroll = $(window).scrollTop();
//                 if (scroll >= 80) {
//                     header.addClass("shadow");
//                 }
//                 else {
//                     header.removeClass("shadow");
//                 }
//             });
//         });
// });

$(function() {

    var pathname_url = window.location.pathname;
    var href_url = window.location.href;

    $(".navigation-menu li").each(function () {

        var link = $(this).find("a").attr("href");

        if(pathname_url == link || href_url == link) {

            $(this).addClass("active");

        }

    });

});
$(function() {
    $('.list-group').load('/basket/get', (response) => {
        var data = JSON.parse(response);
        var products = data.products;
        if(data.amount === undefined) {
            data.amount = 0;
        }
        var count = 0;
        $('li .list-group').empty();
        for (var key in products) {
            $('li .list-group').append(`
                            <button class="list-group-item">
                                <div class="media">
                                    <div class="media-body clearfix">
                                        <a href="product/`+ key +`" class="media-heading text-danger">`+ products[key].name +`</a>
                                        <p class="m-0"> <small>`+ products[key].price * products[key].count +` рублей x `+ products[key].count +`</small>
                                        <a class="pull-right text-danger"  href="#" style="margin-left: 10px"> Удалить </a>
                                        <a class="pull-right text-primary" href="#" > Добавить </a> 
                                        </p>
                                        
                                    </div>
                                </div>
                            </button>
                        `);
            count += products[key].count;
        }
        $('li .list-group').append(`<a href="/basket" class="list-group-item"> <small>Открыть корзину</small> <span class="pull-right">Сумма - `+data.amount+` руб.</span> </a>`);
        $('#basket-count').text(count);
    });
});

$(document).on("click.bs.dropdown.data-api", ".noclose", function (e) { e.stopPropagation() });




$(document).ready(function() {

    $('.add-to-basket').on('submit', function (event) {
        var data = $(this).serialize();
        $.ajax({
            url: '/basket/add',
            type: 'post',
            data: data,
            dataType: 'json',
            success: function (response) {
                var products = response.products;
                var count = 0;
                $('li .list-group').empty();
                for (var key in products) {
                    $('li .list-group').append(`
                        <button href="javascript:void(0);" class="list-group-item">
                            <div class="media">
                                <div class="media-body clearfix">
                                    <a href="product/`+ key +`" class="media-heading text-danger">`+ products[key].name +`</a>
                                    <p class="m-0"> <small>`+ products[key].price * products[key].count +` рублей x `+ products[key].count +`</small>
                                    <a class="pull-right text-danger"  href="#" style="margin-left: 10px"> Удалить </a>
                                    <a class="pull-right text-primary" href="#" > Добавить </a> 
                                    </p>
                                    
                                </div>
                            </div>
                        </button>
                    `);
                    count += products[key].count;
                }
                $('li .list-group').append(`<a href="/basket" class="list-group-item"> <small>Открыть корзину</small> <span class="pull-right">Сумма - `+response.amount+` руб.</span> </a>`);
                $('#basket-count').text(count);
                console.log(response);
            },
            error: function () {
                alert('Произошла ошибка при добавлении товара в корзину');
            }
        });
        event.preventDefault();
    });
});