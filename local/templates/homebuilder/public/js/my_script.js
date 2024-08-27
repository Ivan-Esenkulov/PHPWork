$(document).ready(function () {
    $("#qwer").submit(function (e) {
        e.preventDefault();
        let formToWorkOn = document.querySelector('#qwer');
        let formData = new FormData(formToWorkOn);
        $.ajax({
            type: "post",
            url: '/local/templates/homebuilder/ajax/form_send_message.php',
            cache: false,
            contentType: false,
            processData: false,
            data: formData,
            dataType: "html",
            success: function (result) {
                formToWorkOn.reset();
                $('#qwer').click();
                //$('.modal-content').hide();
                //$('.modal-backdrop').hide();
                //$("body").removeClass("modal-open");
                alert(result);
            }
        });
    })
});


/*$(function(){
    $("#contactForm").submit(function(event) {
        event.preventDefault(); // метод отменяет события навешанные на кнопку submit
        $.ajax({
            url: $("#contactForm").attr('action'), // адрес обращения (в данном случае забираем с атрибута action у формы)
            data: $("#contactForm").serialize(), // данные пердавать в форме ключ значение (формат JSON). В данном примере, распределение данных формы на состояние ключ=значение для передачи в request-строке.
            type: 'POST', // альтернатива type: method

            // метод вызывается при успешном запросе
            success: function(data){
                alert(data);
            }
        });
    });
});*/
$(document).ready(function () {
    $("#contactForm").submit(function (e) {
        e.preventDefault();
        let formToWorkOn = document.querySelector('#contactForm');
        let formData = new FormData(formToWorkOn);
        $.ajax({
            type: "post",
            url: '/local/templates/homebuilder/ajax/form_contact_message.php',
            cache: false,
            contentType: false,
            processData: false,
            data: formData,
            dataType: "html",
            success: function (result) {
                formToWorkOn.reset();
                $('#contactForm').click();
                alert(result);
            }
        });
    })
});

$(document).ready(function () {
    $(".subscribe-form").submit(function (e) {
        e.preventDefault();
        let formToWorkOn = document.querySelector('.subscribe-form');
        let formData = new FormData(formToWorkOn);
        $.ajax({
            type: "post",
            url: '/local/templates/homebuilder/ajax/form_subscribe.php',
            cache: false,
            contentType: false,
            processData: false,
            data: formData,
            dataType: "html",
            success: function (result) {
                formToWorkOn.reset();
                $('.subscribe-form').click();
                alert(result);
            }
        });
    })
});

$(document).ready(function () {
    $("#form_comments").submit(function (e) {
        e.preventDefault();
        let formToWorkOn = document.querySelector('#form_comments');
        let formData = new FormData(formToWorkOn);
        $.ajax({
            type: "post",
            url: '/local/templates/homebuilder/ajax/form_send_comment.php',
            cache: false,
            contentType: false,
            processData: false,
            data: formData,
            dataType: "html",
            success: function (result) {
                formToWorkOn.reset();
                $('#form_comments').click();
                alert(result);
            }
        });
    })
});