function buscaEquipamento() {
        $y = jQuery.noConflict();
        var busca = $y('#buscaEquip').val();
        if (load_buscaEquip) {
            var url = 'https://srvsave035/portal_v2/sistema_relat/system/equip/buscaEquipamento.php?serie=' + busca;
            $y.get(url, function (dataReturn) {
                $y('#load_buscaEquip').html(dataReturn);
            });
        }
        }


