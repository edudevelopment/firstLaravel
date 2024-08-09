function excluido () {
    return alert('Excluido com sucesso');
}

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
            if (data.success) {
                window.location.reload();
                excluido();
                
            } else {
                alert('Não foi possivel excluir');
            }
        }).fail(function (data) {
            $.unblockUI();
            alert('Não foi possivel buscar os dados')
        })
    }
}

$('#mascara_valor').mask('#.##0,00', { reverse: true });


document.getElementById("cep").addEventListener("blur", function () {
    var cep = this.value.replace(/\D/g, '');
    if (cep != "") {
        var validacep = /^[0-9]{8}$/;
        if (validacep.test(cep)) {
            document.getElementById("logradouro").value = ""; // Indica que está buscando os dados

            fetch(`https://viacep.com.br/ws/${cep}/json/`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Erro ao conectar ao serviço ViaCEP');
                    }
                    return response.json();
                })
                .then(dados => {
                    if (!("erro" in dados)) {
                        document.getElementById("logradouro").value = dados.logradouro.toUpperCase();
                    } else {
                        alert("CEP não encontrado. Digite manualmente ou tente novamente.");
                        document.getElementById("logradouro").value = ""; // Limpa o campo em caso de erro
                    }
                })
                .catch(error => {
                    alert("Erro ao conectar ao serviço ViaCEP. Tente novamente mais tarde.");
                    console.error('Erro:', error);
                });
        } else {
            alert("Formato de CEP inválido.");
        }
    }
});


