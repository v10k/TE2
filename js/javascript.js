botaoInserir = () => {
    const inserir = document.getElementById('inserir');
    const listar = document.getElementById('listar');
    inserir.style.display = 'flex';
    listar.style.display = 'none';
}

botaoListar = () => {
    const inserir = document.getElementById('inserir');
    const listar = document.getElementById('listar');
    listar.style.display = 'flex';
    inserir.style.display = 'none';
}

$(document).ready(function () {
    $("#form").submit(function(event){
        event.preventDefault();
        var post_url = $(this).attr("action");
        var request_method = $(this).attr("method"); 
        $.ajax({
            url : post_url,
            type: request_method,
            data: $(this).serializeArray(),
            dataType: "json",
            }).done((data) => {
                if(data.status == 'success') {
                    document.getElementById('form').reset();
                    exibeMensagem(true);
                }
            }).fail((erro) => {
                document.getElementById('form').reset();
                exibeMensagem(false);
            });
        });
});

exibeMensagem = (resultado) => {
    const mensagem = document.getElementById('mensagem');
    mensagem.style.display = 'inline';
    if (resultado) {
        document.getElementById('mensagem').children[0].textContent="Produto registrado com sucesso !";
        mensagem.style.backgroundColor = "#0d91de";
    } else {
        document.getElementById('mensagem').children[0].textContent="Erro ao registrar produto, preencha todos os dados corretamente";
        mensagem.style.backgroundColor = "#910303";
    }
}