$(function() {

    /*insira o arquivo na pagina desejada  e crie uma search bar com o id pesquisar*/
    /* não esqueça de adequar o arquivo buscar na pasta buscas para seu banco de dados */

    $('#pesquisar').keyup(function() {

        var pesquisar = $(this).val();

        if (pesquisar != '') {

            var dados = {

                palavra: pesquisar

            }

            $.post('buscas/buscar.php', dados, function(retorna) {

                $(".resultado").html(retorna);



            });
        } else {




            $(".resultado").html('');







        }



    })





})