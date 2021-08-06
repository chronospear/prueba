$('.remove').on('click', function (event) {
    event.preventDefault();
    var current_object = $(this);
    swal({
        title: "¿Esta seguro?",
        text: "Los datos se eliminarán permanentemente",
        type: "error",
        icon: "warning",
        buttons: [
        'Cancelar',
        'Eliminar'
      ],dangerMode: true,
    }).then(function(result) {

        if (result) {
            var action = current_object.attr('data-action');
            var token = jQuery('meta[name="csrf-token"]').attr('content');
            var id = current_object.attr('data-id');

            $('body').html("<form class='form-inline remove-form' method='post' action='"+action+"'></form>");
            $('body').find('.remove-form').append('<input name="_method" type="hidden" value="delete">');
            $('body').find('.remove-form').append('<input name="_token" type="hidden" value="'+token+'">');
            $('body').find('.remove-form').append('<input name="id" type="hidden" value="'+id+'">');
            $('body').find('.remove-form').submit();
        }
    });
});