(function($) {
$(document).ready( function() {
    var $window = $(window);
    var site_init = function() {
        $('.toggle-menu').on( 'click', function(e) {
            e.preventDefault();
            $(this).toggleClass('opened');
            $('body').toggleClass('menu-opened');
            $('#navigation').toggleClass('opened'); 
        });
    }        

    //Buscador
    $('#txtSearch').keypress(function(e){   
        if(e.which == 13){      
            var usuario = window.document.getElementById("txtSearch").value;
            if (usuario != null)
                location.href = "buscador-productos?buscador=" + usuario ;

        }   
       });

    // Menú detalles producto
    $('.details-producto .info-details:first').show();
    $('.menu-details a:first').addClass('activo');
    $('.menu-details a:first').addClass('activo-2');

    $('.menu-details a').on('click', function() {
        $('.menu-details a').removeClass('activo');
        $(this).addClass('activo');
        $('.menu-details a').removeClass('activo-2');
        $(this).addClass('activo-2');
        $('.ocultar').hide();
        var enlace = $(this).attr('href');
        $(enlace).fadeIn(1000);

        return false;
    });

    $("input.solonumeros").bind('keypress', function(event) {
        var regex = new RegExp("^[0-9]+$");
        var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
          event.preventDefault();
          return false;
        }
    });
    new WOW().init();
    site_init();


    var nombre ="";
    $("#nombre").keyup(function(){
        nombre=$("#nombre").val();
        if(nombre.length<3){
            $("#nombre-form-alert").css("display","block");
        }
        else{
            $("#nombre-form-alert").css("display","none");
        }
        });
    });
})(jQuery);
$(function () {
    $('[data-toggle="popover"]').popover()
})

window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 5000);