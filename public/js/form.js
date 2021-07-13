var form = $('#frmMateriales'),
    messageResponse= $('#processData'),
    textErrorRecaptcha = '<div class="error">Por favor selecciona el código de verificación humana</div>';

/**REGLAS Y MENSAJES DEL FORMULARIO **/
function FormValidate() {
    $.validator.addMethod("validaNoVacio", function(value, element, arg){
        return arg !== value;
    }, "Seleccione una opción");
    $.validator.addMethod('filesize', function(value, element, param) {
        // param = size (in bytes) 
        // element = element to validate (<input>)
        // value = value of the element (file name)
        return this.optional(element) || (element.files[0].size <= param) 
    });
    form.validate({
        errorElement:"label",
        errorPlacement: function errorPlacement(error, element) {
            element.after(error);
            if (element.attr("name")==="rdAcepto")
                error.insertAfter( '#errorAcepto');
            if(element.attr("name")==="txtActividadEspecifica")
                error.insertBefore("#errorActividad");
        },rules:{
            rdAcepto:{required:true},
            name:{required:true, minlength:2},
            material:{required: true, extension: "png|jpe?g|gif", filesize: 1048576}
        },messages:{
            rdAcepto:{required: 'Acepta el aviso, para continuar'},
            name:{required: 'Escribe tu nombre', minlength:'No escribas menos de {0} caracteres'},
            material:{required:'Es necesario subir un documento', extension:'la extensión del archivo no esta permitida', filesize:'El archivo no debe ser mayor a 1MB'}
        },debug:false,
        submitHandler:function (form) {
            form.submit();
        }
    });
}

$(document).ready( function() {
    $("#frmMateriales").submit(function(e){
        e.preventDefault();
    });
    FormValidate();
});

$('#material').change(function () {
    var datos = $('#material').prop('files')[0];

    var form_data = new FormData();                  
    form_data.append('file', datos );
    $.ajax({
        data: form_data ,
        url: "subir.php",
        type: "POST",
        contentType: false,
        processData: false,
        success:
            function (r) {
                alert('' + r);
            }
    });
});