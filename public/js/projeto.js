function deletarRegistroPaginacao(rotaUrl, idDoRegistro) {
    if (confirm('Deseja confirmar a exlusão?')) {
        $.ajax({
            url: rotaUrl,
            method: 'DELETE',
            headers:  {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
            data: {
                id: idDoRegistro,
            },
            beforeSend: function () {
                $.blockUI({
                    message: 'Carregando...',
                    timeout: 2000,
                });
            },
        }).done(function (data) {
            $.unblockUI();
            alert(data);
        }).fail(function (data) {
            $.unblockUI();
            alert('Eduardo')
        })
    }
}