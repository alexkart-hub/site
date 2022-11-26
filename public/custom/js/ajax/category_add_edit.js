$('#name').on({
    input: function (e) {
        $('#code').val(translit(this.value));
    }
});
