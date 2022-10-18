var estateMenu = false;
$('header .bar-menu').on('click', function(){
    if(estateMenu == false){
        $('.menu-menu-header-container').addClass('active');
        estateMenu = true;
    }else{
        $('.menu-menu-header-container').removeClass('active');
        estateMenu = false;
    }
});
// Slide banner home
$('.slide-banner').owlCarousel({
    autoplay:false,
    nav:true,
    loop:true,
    margin:0,
    autoplayTimeout:8000,
    smartSpeed:1500,
    navText:[
        '<img src="wp-content/themes/ditto-master/images/back.png" alt="Icono nav carousel" class="img-back">',
        '<img src="wp-content/themes/ditto-master/images/Next.png" alt="Icono nav carousel" class="img-next">'
    ],
    items:1,
}).css({'opacity':1});
// Slide categories home
$('.slide-category-home').owlCarousel({
    autoplay:false,
    autoplayTimeout:8000,
    smartSpeed:1500,
    loop:false,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:2
        },
        600:{
            items:4
        },
        1000:{
            items:6
        }
    }
}).css({'opacity':1});
// Slide courses home
$('.courses-slide').owlCarousel({
    autoplay:false,
    autoplayTimeout:8000,
    smartSpeed:1500,
    loop:true,
    margin:10,
    nav:false,
    dots:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
}).css({'opacity':1});

$('.recent-products').owlCarousel({
    autoplay:false,
    autoplayTimeout:8000,
    smartSpeed:1500,
    loop:true,
    margin:10,
    nav:false,
    dots:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
}).css({'opacity':1});

$('.our-clients').owlCarousel({
    autoplay:true,
    autoplayTimeout:8000,
    smartSpeed:1500,
    loop:true,
    margin:10,
    center: true,
    nav:true,
    dots:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
}).css({'opacity':1});

// Menu category archive product
$('.parent').mouseover(function(){
    $('.parent').removeClass('active');
    $(this).addClass('active');
});
$('.parent').mouseout(function(){
    $(this).removeClass('active');
});

// FQA 

var acc = $('.questions h4');
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
            panel.style.display = "none";
        } else {
            acc.removeClass('active');
            this.classList.toggle("active");
            $('.questions p').css({'display':'none'});
            panel.style.display = "block";
        }
    });
}

// Slide about us
$('.gallery-about-us').owlCarousel({
    autoplay:true,
    nav: false,
    dots: true,
    autoplayTimeout:8000,
    smartSpeed:1500,
    loop:true,
    margin:0,
    items:1,
}).css({'opacity':1});

$('.services-slide').owlCarousel({
    autoplay:false,
    autoplayTimeout:8000,
    smartSpeed:1500,
    loop:false,
    margin:20,
    nav:true,
    dots:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        860:{
            items:3
        },
        1106:{
            items:4
        }
    }
}).css({'opacity':1});

$('.comments-slide').owlCarousel({
    autoplay:false,
    autoplayTimeout:8000,
    smartSpeed:1500,
    loop:false,
    margin:20,
    nav:true,
    dots:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        900:{
            items:3
        }
    }
}).css({'opacity':1});

// add file currículo
$('.file-btn').on('click', function(){
    $('.curriculo input[type="file"]').click();
    $('.curriculo input[type=file]').change(function(){
        if($('.curriculo input[type=file]')[0].files.length !== 0){
            var file = $('.curriculo input[type=file]')[0].files[0].name;
            $('.mensaje').html(`${file}`).css({'color':'#5cb85c'});
            $('.file-btn').html('<i class="fa fa-file-pdf"></i> Cambiar currículo');
        }
    });
});

$('.label-politicas').on('click', function(){
    if($('input[type="checkbox"]').prop('checked')){
        $('.anima-check').addClass('active');
    }else{
        $('.anima-check').removeClass('active');
    }
});

$('.submit input[type="submit"]').on('click', function(){
    if($('.curriculo input[type=file]')[0].files.length === 0){
        $('.mensaje').html('Agrega un archivo en formato PDF').css({'color':'#d9534f'});
    }
});

// Videos modal
$('.content-feature').on('click', function(){
    $(this).parent().children('.content-video').addClass('active');
    $(this).parent().children('.content-video').children().children('.ifrem').children('iframe')[0].src += "&autoplay=1&mute=0";
});