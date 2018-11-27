function buscaColaborador() {
        $z = jQuery.noConflict();
        var busca = $z('#busca').val();
        if (load_buscaOperador) {
            var url = 'https://srvsave035/portal_v2/sistema_relat/system/equip/buscaColaborador.php?matricula=' + busca;
            $z.get(url, function (dataReturn) {
                $z('#load_buscaOperador').html(dataReturn);
            });
        }
        }


