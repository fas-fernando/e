$(document).ready(function(){

    // Cadastrar Anfitrião
    $(document).on("click", "#cadastrarAnfitriao", function () {
      $("#modalAnfitriao").load("data/anfitriao/modal/m_cad_anfitriao.php");
    });

    // Detalhar Anfitrião
    $(document).on("click", "#detalharAnfitriao", function(){
        event.preventDefault();
        var id = $(this).attr("data-dtl");

        $("#modalAnfitriao").load("data/anfitriao/modal/m_dtl_anfitriao.php", { id: id });
    });

    // Alterar Anfitrião
    $(document).on("click", "#alterarAnfitriao", function(){
        event.preventDefault();
        var id = $(this).attr("data-alt");

        $("#modalAnfitriao").load("data/anfitriao/modal/m_edit_anfitriao.php", { id: id });
    });

    // Deletar Anfitrião
    $(document).on("click", "#detelarAnfitriao", function(){
        event.preventDefault();
        var id = $(this).attr("data-del");

        $("#modalAnfitriao").load("data/anfitriao/modal/m_deletar_anfitriao.php", { id: id });
    });

    // Desfazer Exclusão do Anfitrião
    $(document).on("click", "#desfazerAnfitriao", function(){
        event.preventDefault();
        var id = $(this).attr("data-des");

        $("#modalAnfitriao").load("data/anfitriao/modal/m_desfazer_anfitriao.php", { id: id });
    });

    // Cadastrar Usuário
    $(document).on("click", "#cadastrarUsuario", function () {
      $("#modalUsuario").load("data/usuario/modal/m_cad_usuario.php");
    });

    // Detalhar Usuário
    $(document).on("click", "#detalharUsuario", function(){
        event.preventDefault();
        var id = $(this).attr("data-dtl");

        $("#modalUsuario").load("data/usuario/modal/m_dtl_usuario.php", { id: id });
    });

    // Alterar Usuário
    $(document).on("click", "#alterarUsuario", function(){
        event.preventDefault();
        var id = $(this).attr("data-alt");

        $("#modalUsuario").load("data/usuario/modal/m_edit_usuario.php", { id: id });
    });

    // Deletar Anfitrião
    $(document).on("click", "#detelarUsuario", function(){
        event.preventDefault();
        var id = $(this).attr("data-del");

        $("#modalUsuario").load("data/usuario/modal/m_deletar_usuario.php", { id: id });
    });

    // Desfazer Exclusão do Anfitrião
    $(document).on("click", "#desfazerUsuario", function(){
        event.preventDefault();
        var id = $(this).attr("data-des");

        $("#modalUsuario").load("data/usuario/modal/m_desfazer_usuario.php", { id: id });
    });

});