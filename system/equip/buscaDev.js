function buscaDev() {
        $x = jQuery.noConflict();
        var busca = $x('#buscaEquip').val();
        if (load_buscaDev) {
            var url = 'https://srvsave035/portal_v2/sistema_relat/system/equip/buscaDev.php?serie=' + busca;
            $x.get(url, function (dataReturn) {
                $x('#load_buscaDev').html(dataReturn);
            });
        }
        }


