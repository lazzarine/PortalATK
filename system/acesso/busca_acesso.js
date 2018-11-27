function buscar() {
        $b = jQuery.noConflict();
        var acesso = $b('#acesso').val();
        if (load_acesso) {
            var url = 'https://srvsave035/portal_v2/sistema_relat/system/acesso/buscar_disp.php?acesso=' + acesso;
            $b.get(url, function (dataReturn) {
                $b('#load_acesso').html(dataReturn);
            });
        }
        }
