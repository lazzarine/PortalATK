<?php
ob_start();
session_start();
require('./class/inc/Config.inc.php');
$session = new session;
$userlogin = $session->getSession();
if (!$session->checkAcesso(1)):
    header('Location: ../index.php?logoff=true');
endif;

$logoff = filter_input(INPUT_GET, 'logoff', FILTER_DEFAULT);
if ($logoff):
    $session->DestroySession();
endif;

$getexe = filter_input(INPUT_GET, 'exe', FILTER_DEFAULT);
$UserDel = filter_input(INPUT_GET, 'delete', FILTER_DEFAULT);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>São Miguel v1</title>
        <!-- BOOTSTRAP STYLES-->
        <link href="assets/css/bootstrap.css" rel="stylesheet" />
        <!-- FONTAWESOME STYLES-->
        <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- MORRIS CHART-->
        <!--<script src="assets/js/Chart.min.js"></script>-->
        <!-- DataTables css STYLES-->
        <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
        <link href="assets/js/jquery-ui-1.12.1/jquery-ui.css" rel="stylesheet" />
        <link href="assets/js/jquery-ui-1.12.1/jquery-ui.theme.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
        <link href="assets/css/custom.css" rel="stylesheet" />
        <!-- JQUERY SCRIPTS -->
        <script src="assets/js/jquery-3.2.1.js"></script>
        <script src="assets/js/jquery-ui-1.12.1/jquery-ui.js"></script>
        <!-- BOOTSTRAP SCRIPTS -->
        <script src="assets/js/bootstrap.min.js"></script>
        <!-- METISMENU SCRIPTS -->
        <script src="assets/js/jquery.metisMenu.js"></script>
        <!-- DataTables SCRIPTS -->
        <script src="assets/js/dataTables/jquery.dataTables.js"></script>
        <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            var $dial = jQuery.noConflict()
            var $fechar = jQuery.noConflict()
            $dial(function () {
                $dial("#dialog").dialog({
                    resizable: true,
                    height: "auto",
                    width: 400
                });
                setTimeout(function () {
                    $fechar('#dialog').dialog('close');
                }, 1500);
            });
        </script>
    </head>
    <body>
        <div id="wrapper">
            <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-brand" href="painel.php"><?php echo $userlogin[0]['login']; ?></a>

                </div>
                <div style="color: white; padding: 15px 50px 5px 50px; float: right;font-size: 16px;">
                    <a href="painel.php?exe=users/profile" class="btn btn-success btn-circle-adjust fa fa-user"> Trocar senha</a> &nbsp;
                    <?php
                    if ($userlogin[0]['nivel_acesso'] == 1):
                        echo "<a href='painel.php?exe=users/usuarios' class='btn btn-info btn-circle-adjust fa fa-users'> Usuários</a> &nbsp;";
                    endif;
                    ?>

                    <a href="painel.php?logoff=true" class="btn btn-danger btn-circle-adjust fa fa-sign-out"> Desconectar</a>
                </div>
            </nav>   
            <!-- /. NAV TOP  -->
            <nav class="navbar-default navbar-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav" id="main-menu">
                        <li class="text-center">
                            <img src="assets/img/Atacadao.png" class="user-image img-responsive"/>
                        </li>
                        <li>
                            <a class=""  href="painel.php"><i class="fa fa-dashboard fa-3x"></i> Inicio</a>
                        </li>
                        <?php
                        // gera Links de acessos aos módulos
                        $UserAcess = new Database;
                        $UserAcess->connect();
                        $UserAcess->selectDst('modulos', '*', NULL, "username = '{$userlogin[0]['login']}'", "modulo");
                        $controle = "";
                        $var = $UserAcess->getResult();
                        $rows = $UserAcess->numRows();
                        for ($i = 0; $i < count($var); $i++):
                            if ($var[$i]['modulo'] != $controle):
                                echo "<li>
                                        <a class=\"fa fa-list fa fa-2x\" data-toggle=\"collapse\" href=\"#" . $var[$i]['modulo'] . "\">&nbsp;" . $var[$i]['modulo'] . "</a>" .
                                "</li>";
                                $controle = $var[$i]['modulo'];
                                echo "<div id=" . $var[$i]['modulo'] . " class=\"sidebar-collapse collapse\">
                                                <ul class=\"nav\">
                                                <li>
                                                <a class=\"fa fa-arrow-right\" href=\"painel.php?exe={$var[$i]['link']}\"> &nbsp;" . $var[$i]['acesso'] . "</a>
                                                </li>";
                            else:
                                echo " <li>
                                       <a class=\"fa fa-arrow-right\" href=\"painel.php?exe={$var[$i]['link']}\"> &nbsp;" . $var[$i]['acesso'] . "</a>
                                       </li>";
                            endif;
                            if ($i < $rows - 1):
                                if ($var[$i]['modulo'] != $var[$i + 1]['modulo']):
                                    echo "</ul></div>";
                                endif;
                            endif;
                        endfor;
                        $UserAcess->disconnect();
                        //Fim da geração dos links de acessos
                        ?>
                    </ul>
                </div>
            </nav>
            <!-- /. NAV SIDE  -->
            <div id="page-wrapper" >
                <div id="page-inner">
                    <!-- /. ROW  -->
                    <?php
                    //QUERY STRING
                    if (!empty($getexe)):
                        $includepatch = "." . DIRECTORY_SEPARATOR . strip_tags(trim($getexe) . '.php');
                    else:
                        $includepatch = 'home.php';
                    endif;
                    if (file_exists($includepatch)):
                        require_once($includepatch);
                    else:
                        echo "<div class=\"content notfound\">";
                        echo "<b>Erro ao incluir tela:</b> Erro ao incluir o controller /{$getmenu}.php!";
                        echo "</div>";
                    endif;
                    ?>    
                </div>
                <!-- /. PAGE INNER  -->
                <small class="text-muted">Desenvolvido pelo cpd São Miguel</small>
            </div>
            <!-- /. PAGE WRAPPER  -->
        </div>
        <!-- /. WRAPPER  -->
        <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
        <!-- CUSTOM SCRIPTS -->
        <script src="acesso/busca_acesso.js"></script>              
        <script src="sacola/buscaOperador.js"></script>             
        <script src="equip/buscaColaborador.js"></script>             
        <script src="equip/buscaEquipamento.js"></script>             
        <script src="equip/buscaDev.js"></script>             
        <!--<script src="armario/busca_armario.js"></script>       
        <script src="armario/busca_status.js"></script>-->       
        <script type="text/javascript">
            var $a = jQuery.noConflict()
            $a(document).ready(function () {
                $a("#_table_").dataTable({
                    "oLanguage": {
                        "sProcessing": "Aguarde enquanto os dados são carregados ...",
                        "sLengthMenu": "Mostrar _MENU_ registros por pagina",
                        "sZeroRecords": "Nenhum registro correspondente ao criterio foi encontrado",
                        "sInfoEmtpy": "Exibindo 0 a 0 de 0 registros",
                        "sInfo": "Exibindo de _START_ a _END_ de _TOTAL_ registros",
                        "sInfoFiltered": "",
                        "sSearch": "Procurar",
                        "oPaginate": {
                            "sFirst": "Primeiro",
                            "sPrevious": "Anterior",
                            "sNext": "Próximo",
                            "sLast": "Último"
                        }
                    }
                });
            });
            var $data = jQuery.noConflict()
            $data(function () {
                $data(".datepicker").datepicker({
                    dateFormat: 'dd/mm/yy',
                    dayName: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'],
                    dayNamesMin: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S', 'D'],
                    dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom'],
                    monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
                    monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
                    nextText: 'Proximo',
                    prevText: 'Anterior',
                    showAnim: 'scale'
                });
            });
        </script>
    </body>
</html>
<?php
ob_end_flush();
