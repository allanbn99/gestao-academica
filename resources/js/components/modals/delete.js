$('.deleteModalTarget').click(function() {
    var id = $(this).data('id');

    $('#deleteModalId').val(id);
});
