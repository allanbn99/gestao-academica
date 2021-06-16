$('.deleteModalTarget').click(function() {
    var id = $(this).data('id');
    $('#deleteModalForm').attr('action', window.location.href +'/'+ id);
});
