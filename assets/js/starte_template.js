/**
 * Предпросмотр картинки перед загрузкой на сервер.
 * @param input <p>Поле типа img<p>
 */
function readURL(input) {
    var img_id = $(input).closest('form').find('img').attr('id');
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#'+img_id).attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}
