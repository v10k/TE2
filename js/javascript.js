botaoInserir = () => {
    const inserir = document.getElementById('inserir');
    const listar = document.getElementById('listar');
    const titulo = document.getElementById('titulo');
    
    inserir.style.display = 'flex';
    listar.style.display = 'none';
    titulo.style.display = 'block';
}

botaoListar = () => {
    const inserir = document.getElementById('inserir');
    const listar = document.getElementById('listar');
    const mensagem = document.getElementById('mensagem');
    const titulo = document.getElementById('titulo');

    listar.style.display = 'flex';
    inserir.style.display = 'none';
    titulo.style.display = 'none';
    mensagem.style.display = 'none';

    $.get("table.php", function(data) {
        $("#table-body").html(data);
    });
}

$(document).ready(function (event) {
    $("#form").submit(function(event) {
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

$(document).ready(function () {
    $("#formEditar").submit(function(event) {
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
                    document.getElementById('formEditar').reset();
                    exibeMensagem(true);
                    window.location = "index.php";
                }
            }).fail((erro) => {
                document.getElementById('formEditar').reset();
                exibeMensagem(false);
            });
        });
});




exibeMensagem = (resultado) => {
    const mensagem = document.getElementById('mensagem');
    mensagem.style.display = 'inline';
    if (resultado) {
        document.getElementById('mensagem').children[0].textContent="Produto salvo com sucesso !";
        mensagem.style.backgroundColor = "#0d91de";
    } else {
        document.getElementById('mensagem').children[0].textContent="Erro ao salvar produto, preencha todos os dados corretamente";
        mensagem.style.backgroundColor = "#910303";
    }
}

deletaRegistro = (id) => {
    $.ajax({
        url: "classes/Produto.php",
        data: { codigo: id, deletaProduto: true },
        type: "POST",
        context: document.body
      }).done(function(data) {
            $.get("table.php", function(data) {
                $("#table-body").html(data);
            });
      });
}

mostraSenha = () => {
    var x = document.getElementById("senha");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
}

logout = () => {
    $.ajax({
        url: "classes/Usuario.php",
        data: { logout: true },
        type: "POST",
        context: document.body
      }).done(function(data) {
          if (data) {
              window.location = 'login.php';
           }
      });
}