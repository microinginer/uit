var body = $('body')

body.on('click', '#send-confirm-code', function () {
    var input = $(this).parents('.input-group').find('input');

    console.log(input.val())
})
