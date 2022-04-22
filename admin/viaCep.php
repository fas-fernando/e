<!-- Adicionando Javascript -->
<script>
    $(document).ready(function() {

        function limpa_formulário_cep() {
            // Limpa valores do formulário de cep.
            $("#end_anfi").val("");
            $("#bairro_anfi").val("");
            $("#cidade_anfi").val("");
            $("#uf_anfi").val("");
        }

        //Quando o campo cep perde o foco.
        $("#cep_anfi").blur(function() {

            //Nova variável "cep" somente com dígitos.
            var cep = $(this).val().replace(/\D/g, '');

            //Verifica se campo cep possui valor informado.
            if (cep != "") {

                //Expressão regular para validar o CEP.
                var validacep = /^[0-9]{8}$/;

                //Valida o formato do CEP.
                if (validacep.test(cep)) {

                    //Preenche os campos com "..." enquanto consulta webservice.
                    $("#end_anfi").val("...");
                    $("#bairro_anfi").val("...");
                    $("#cidade_anfi").val("...");
                    $("#uf_anfi").val("...");

                    //Consulta o webservice viacep.com.br/
                    $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function(dados) {

                        if (!("erro" in dados)) {
                            //Atualiza os campos com os valores da consulta.
                            $("#end_anfi").val(dados.logradouro);
                            $("#bairro_anfi").val(dados.bairro + ' - ' + dados.complemento);
                            $("#cidade_anfi").val(dados.localidade);
                            $("#uf_anfi").val(dados.uf);
                            $("#num_anfi").focus();
                        } //end if.
                        else {
                            //CEP pesquisado não foi encontrado.
                            limpa_formulário_cep();
                            alert("CEP não encontrado. Entre em contato com o suporte");
                        }
                    });
                } //end if.
                else {
                    //cep é inválido.
                    limpa_formulário_cep();
                    alert("Formato de CEP inválido. Tente novamente");
                }
            } //end if.
            else {
                //cep sem valor, limpa formulário.
                limpa_formulário_cep();
            }
        });
    });
</script>