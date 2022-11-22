$('#inputGroupFile03').change(function () {
    var file = $(this).val();
    var prefix = "C:\\fakepath\\";
    var fileName = file.replace(prefix, '');
    $('label.custom-file-label[for="inputGroupFile03"]').text(fileName);
});

const someCheckbox = document.getElementById('is_published');
const text = document.getElementById('text_is_published');

someCheckbox.addEventListener('change', e => {
    if(e.target.checked === true) {
       text.innerText = 'Опубликовано';
    }
    if(e.target.checked === false) {
        text.innerText = 'Опубликовать';
    }
});
