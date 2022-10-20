$(function () {
    // Поп-ап
    var
        name = 'new_review',
        $frame = $('.' + name + '_frame'),
        $form = $('form', $frame),
        $errors = $('.new-review-form__errors', $form),
        $result = $('.new-review-popup__result', $frame);

    $('body').append($frame.detach());

    $frame.jqm({
        trigger: '.reviews__add-review-btn',
        toTop: false,
        onShow: function (hash) {
            onLoadjqm(name, hash);
        },
    });

    $form.validate({
        ignore: '',
        rules: {
            name: 'required',
            email: 'email',
            message: {
                require_from_group: [1, '.review-body-group'],
            },
            'photos[]': {
                require_from_group: [1, '.review-body-group'],
            },
            video: {
                require_from_group: [1, '.review-body-group'],
            },
            license: 'required',
        },
        messages: {
            name: {
                required: 'Укажите имя',
            },
            email: {
                email: 'Укажите верный e-mail',
            },
            message: {
                require_from_group: 'Укажите для отзыва хотя бы что-то: текст отзыва, фотографию или видео',
            },
            'photos[]': {
                require_from_group: '',
            },
            video: {
                require_from_group: '',
            },
            license: {
                required: 'Требуется согласие на обработку персональных данных',
            },
        },
        showErrors: function (errorMap, errorList) {
            // ...
        },
        submitHandler: function () {
            $form.addClass('new-review-form_hide');
            $errors.removeClass('new-review-form__errors_show');
            $errors.html('');
        },
        invalidHandler: function (event, validator) {
            $errors.html('');

            for (var index in validator.invalid) {
                if (validator.invalid[index] !== true && validator.invalid[index] !== '') {
                    $errors.append('<div class="new-review-form__error">- ' + validator.invalid[index] + '</div>');
                }
            }

            if ($errors.html() !== '') {
                $errors.addClass('new-review-form__errors_show');
            }
        },
    });

    $form.on('submit', function (e) {
        e.preventDefault();

        if ($form.valid()) {
            $.ajax({
                url: $form.attr('action'),
                type: 'POST',
                data: new FormData(this),
                beforeSend: function () {
                    $result.html('');
                    $result.addClass('new-review-popup__result_show');
                    $result.append('<div class="new-review-popup__result-head">Пожалуйста, подождите</div>');
                    $result.append('<div class="new-review-popup__result-text">Идет отправка данных на сервер...</div>');
                },
                success: function (data) {
                    $result.html('');

                    if (data.success) {
                        $result.append('<div class="new-review-popup__result-head">Спасибо за отзыв</div>');
                        $result.append('<div class="new-review-popup__result-text">Он появится на сайте после проверки</div>');
                    } else if (data.errors.length) {
                        $result.append('<div class="new-review-popup__result-head">Упс! Что-то пошло не так</div>');

                        for (var i = 0; i < data.errors.length; i++) {
                            $result.append('<div class="new-review-popup__result-text">- ' + data.errors[i] + '</div>');
                        }
                    }
                },
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
            });
        }
    });

    // Галерея
    $('a.review__gallery-item').fancybox({
        openEffect: 'none',
        closeEffect: 'none',
    });
});
