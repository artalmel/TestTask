// Тексты ошибок
var error_text = {
    'empty': 'You can not leave this empty.',
    'short_password': 'Use at least 8 characters.',
    'email': 'Invalid mailbox name.',
    'pass_confirm': 'These passwords do not match.'
};


/**
 * Переводит на английский и
 * русский языки текст ошибки
 * @param el
 */
function translate(el) {
    var arr_json = {};
    var pathname = window.location.pathname.split('/');
    var lang = pathname[pathname.length - 1];
    var ini_path = '../lang/' + lang + '.ini';
    var help_block = $(el).closest('.form-group').find('.help-block');
    var txt = $(help_block).text();
    var txt_array = txt.split(',');
    var trans_arr = [];
    $.get(ini_path, function (data) {
        var lines = data.split('\n');
        $.each(lines, function (k, v) {
            var str = v.split('=');
            arr_json[str[0]] = str[1];
        });
        $.each(txt_array, function (k, v) {
            var trans = arr_json[v];
            trans_arr.push(trans);
            $(help_block).text(trans_arr);
        })

    });
}

/**
 *  При обнаружении ошибки
 *  указывает на данное поле
 * @param el
 */
function selError(el, message){
    var help_block =$(el).closest('.form-group').find('.help-block');
    var label = $(el).closest('.form-group').find('label');
    $(el).addClass('error');
    $(help_block).addClass('error_text').text(message);
    $(label).addClass('error_label');
}

/**
 *  Очищает данное поле
 * @param el
 */
function removeError(el) {
    var help_block =$(el).closest('.form-group').find('.help-block');
    var label = $(el).closest('.form-group').find('label');
    $(el).removeClass('error');
    $(help_block).removeClass('error_text').text('');
    $(label).removeClass('error_label');
}

/**
 * Проверяет количество символов
 * @param el
 * @returns {boolean}
 */
function isEmpty(el){
    if($(el).val().length < 1){
       return true;
    }
}

function isEmail(el){
    var pattern = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
    var result = pattern.test($(el).val());
    if(!result){
        return true;
    }
}

function passLength(el) {
    if($(el).val().length < 8){
        return true;
    }
}

/**
 * Проверяет данное поле.
 * @param e
 */
function validateCurrent(e) {
    var el = e.target;
    var er_array = [];
    var types_pattern =/text|email|password/;
    var type = $(el).attr("type");

    // Проверяет
    if(types_pattern.test(type)){
        if(isEmpty(el) == true){
            er_array.push(error_text['empty']);
            selError(el,er_array);
            translate(el);
        }else {
            removeError(el);
        }
    }
    // Проверяет
    if(type == 'email'){
        if(isEmail(el) == true){
            er_array.push(error_text['email']);
            selError(el,er_array);
            translate(el);
        }else {
            removeError(el);
        }
    }
    // Проверяет количетво символов данного поля.
    if(type == 'password'){
        if(passLength(el) == true){
            er_array.push(error_text['short_password']);
            selError(el,er_array);
            translate(el);
        }else {
            removeError(el);
        }
    }

    // Проверяет совпадение паролей в обоих полях.
    if($(el).attr('name') == 'password_confirm'){
        var p1 = $(el).closest('form').find('input[name=password]');
        if($(el).val() != $(p1).val()){
            er_array.push(error_text['pass_confirm']);
            selError(el,er_array);
            translate(el);
        }else {
            removeError(el);
        }
    }

}

/**
 * Проверяет все поля
 * @param e
 */
function validateAll(e) {
    var requiredInputs = $('input[required]'); // Обязательеные поля
    var er_array = [];
    var types_pattern =/text|email|password/;


    //Обнаруживает все проверяемые поля
    $(requiredInputs).each(function (key, v) {
        var type = $( v ).attr( "type" );
        if(types_pattern.test(type)){
            if(isEmpty($(v)) == true){
                er_array.push(error_text['empty']);

            }


        }
        if(type == 'email'){
            if(isEmail($(v)) == true){
                er_array.push(error_text['email']);

            }
        }

        if(type == 'password'){
            if(passLength($(v)) == true){
                er_array.push(error_text['short_password']);

            }
        }

        if($(v).attr('name') == 'password_confirm'){
            var p1 = $(v).closest('form').find('input[name=password]');
            if($(v).val() != $(p1).val()){
                er_array.push(error_text['pass_confirm']);

            }

        }
        e.stopPropagation();
        if (er_array.length == 0){
            removeError($(v));
        }
    });
    if (er_array.length == 0) {
        $("#btnSubmit").removeAttr('disabled');
    } else {
        $("#btnSubmit").attr('disabled', true);
    }
}

/**
 * Выполняет функции
 */
$(function () {
    // Проверяет все поля
    $("*").mousemove(function (e) {
        validateAll(e);
    });

    // Проверяет данное поле.
    $('input[required]').keyup(function (e) {
        validateCurrent(e);
    }).focusout(function (e) {
        validateCurrent(e);
    });

});

