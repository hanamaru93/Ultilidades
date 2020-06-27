$(function() {
    $('#EsteIDEnvia').change(function() {
        if ($(this).val()) {
            $('#EsteIdRecebe').hide();
            $.getJSON('PegarOsDados.php?search=', { EsteIdEnvia: $(this).val(), ajax: 'true' }, function(j) {
                var options = '<option value="">Escolha a Opção</option>';
                for (var i = 0; i < j.length; i++) {
                    options += '<option value="' + j[i].nome + '">' + j[i].nome + '</option>';
                }
                $('#EsteIdRecebe').html(options).show();

            });
        } else {
            $('#EsteIdRecebe').html('<option value="">– Escolha a Opção–</option>');
        }
    });
});