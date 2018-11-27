function buscaOperador() {
        $e = jQuery.noConflict();
        var buscaOpe = $e('#buscaOpe').val();
        if (load_buscaOperador) {
            var url = 'https://srvsave035/portal_v2/sistema_relat/system/sacola/buscaOperador.php?matricula=' + buscaOpe;
            $e.get(url, function (dataReturn) {
                $e('#load_buscaOperador').html(dataReturn);
            });
        }
        }


