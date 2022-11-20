$('#inputGroupFile03').change(function () {
    var file = $(this).val();
    var prefix = "C:\\fakepath\\";
    var fileName = file.replace(prefix, '');
    $('label.custom-file-label[for="inputGroupFile03"]').text(fileName);
});
