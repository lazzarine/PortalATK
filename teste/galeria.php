<!doctype html>
<html lang="pt-br" class="no-js">
    <head>
        <meta charset="utf-8">
        <meta name="author" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width,initial-scale=1">

        <script src="js/libs/jquery-1.10.0.js"></script>        
        <script src="js/libs/bootstrap.min.js"></script>
        <script src="js/galeria.js"></script>

        <link href="css/bootstrap.css" media="screen" rel="stylesheet">
        <link href="style.css" media="screen" rel="stylesheet">
        <title>Galeria Filial - 035</title>

        <script src="js/general.js"></script>
        <!--test galeria -->
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Slicebox - 3D Image Slider with Fallback" />
        <meta name="keywords" content="jquery, css3, 3d, webkit, fallback, slider, css3, 3d transforms, slices, rotate, box, automatic" />
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/cssgaleria.css" />
        <link rel="stylesheet" type="text/css" href="css/slicebox.css" />
        <link rel="stylesheet" type="text/css" href="css/custom.css" />
        <script type="text/javascript" src="js/modernizr.custom.46884.js"></script>
        <!--end-->
    </head>
    <body>
        <?php
        $diretorio = "images/galeria/";
        $ponteiro = opendir($diretorio);
        while ($nome_imgs = readdir($ponteiro)):
            $imgs[] = $nome_imgs;
        endwhile;
        sort($imgs);
        ?>
        <div class="body_wrap">
            <div class="container" style="margin-top: 5px">
                <img class="img-responsive" src="images/banner-release.jpg">                     
                <!-- Website Menu -->
                <div class="dropdown-wrap">
                    <ul class="dropdown clearfix">
                        <li class="menu-level-0"><a href="http://srvsave035/portal_v3/"><span>Home</span></a></li>
                        <li class="menu-level-0"><a href="#"><span>Filial</span><span class="caret"></span></a>
                            <ul class="menu-level-1">
                                <li class="menu-level-1"><a href="http://tplsmiguel.atacadao.com.br:8080/" target="_blank"><span>Tplinux</span></a></li>
                                <li class="menu-level-1"><a href="http://srvuca035/" target="_blank"><span>Rub</span></a></li>
                                <li class="menu-level-1"><a href="http://srvsave035/portal_v2/sistema_relat/" target="_blank"><span>Sistema integrado smiguel</a></span></li>
				<li class="menu-level-1"><a href="https://srvapp035/auth/login.do?lang=pt" target="_blank"><span>SaveWeb</a></span></li>
                            </ul>
                        <li class="menu-level-0"><a href="#"><span>Links Matriz</span><span class="caret"></span></a>
                            <ul class="menu-level-1">
                                <li class="menu-level-1"><a href="http://conferencia.atacadao.com.br/" target="_blank">Erros de Conferencia</a>
                                <li class="menu-level-1"><a href="http://intranet2.atacadao.com.br:7783/atc_jsp/relatorios/metrics.jsp" target="_blank">Metrics</a>
                                <li class="menu-level-1"><a href="http://portal.atacadao.com.br/" target="_blank">Portal Matriz</a>
                                <li class="menu-level-1"><a href="http://srvweb2.atacadao.com.br/siscom/" target="_blank">Sistema de promotores</a>
                                <li class="menu-level-1"><a href="https://sitef.portal.br-atacadao.corp/sitef/" target="_blank">Sitef</a>
                                <li class="menu-level-1"><a href="http://srvgdeweb.br-atacadao.corp/NFe_GDeWeb/Login.aspx" target="_blank">Triangulus - NFE</a>
                                <li class="menu-level-1"><a href="http://servernotes.atacadao.com.br/portal/PWN.nsf/Principal?openform" target="_blank">Work Notes</a>
                                <li class="menu-level-1"><a href="http://srvnotes.atacadao.com.br/iwaredir.nsf" target="_blank">Work Notes 2</a></li>
                            </ul>
                        <li class="menu-level-0"><a href="#"><span>Links Corporativos</span><span class="caret"></span></a>
                            <ul class="menu-level-1">
                                <li class="menu-level-1"><a href="http://newintranet.atacadao.com.br:7783/forms/frmservlet?config=dbadm" target="_blank">Sistema Administrativo</a>
                                <li class="menu-level-1"><a href="http://newintranet.atacadao.com.br:7783/forms/frmservlet?config=dbcom" target="_blank">Sistema Comercial</a>
                                <li class="menu-level-1"><a href="http://newintranet.atacadao.com.br:7783/forms/frmservlet?config=menthor" target="_blank">Sistema Menthor</a></li>
                            </ul>
                        <li class="menu-level-0"><a href="#"><span>Outros Links</span><span class="caret"></span></a>
                            <ul class="menu-level-1">
                                <li><a href="http://csc.br-atacadao.corp/cliente.html" target="_blank">Abertura de Chamados</a>
                                <li><a href="http://portal.atacadao.com.br/aniversariantes.php" target="_blank">Aniversariantes</a>
                                <li><a href="http://srvweb2/operacao/filiais/#" target="_blank">Consulta Cadastral das Filiais</a>
                                <li><a href="https://satsp.fazenda.sp.gov.br/COMSAT/Public/ConsultaPublica/ConsultaPublicaCfe.aspx" target="_blank">Consulta SAT</a>
                                <li><a href="imp/geral.php" target="_blank">Gasto Com Impressões</a>
                                <li><a href="http://srvweb2.atacadao.com.br/siscom/operacoes/" target="_blank">Gerenciador de Perfil S.A.V.E</a>
                                <li><a href="http://srvweb2.atacadao.com.br/procedimentos/index.php" target="_blank">Normas e Procedimentos</a>
                                <li><a href="http://srvweb2.atacadao.com.br/siscom/func_programas" target="_blank">Progs. Funcoes</a>
                                <li><a href="lista_ramais.html" target="_blank">Ramais Internos</a>
                                <li><a href="http://portal.atacadao.com.br/telefonia/ramais/index.html" target="_blank">Ramais Externos</a>
                                <li><a href="http://srvsave035/portal/ca50/verifica2.php" target="_blank">Verifica usuário com pedencia (RUB)</a>
                                <li><a href="https://www.webenergy.com.br/STM-ADN/Login/Login.aspx" target="_blank">Webenergy</a></li>
                            </ul>
                        <li class="menu-level-0"><a href="#"><span>Cardápio</span></a>
                            <ul class="menu-level-1">
                                <li><a href="#" data-toggle="modal" data-target="#myModal">Cardápio</a></li>
                            </ul>
                        <li class="menu-level-0"><a href="#">Senha SAVE<span class="caret"></span></a>
                            <ul class="menu-level-1">
                                <li><a href="#" data-toggle="modal" data-target="#senha">Troque sua senha </a></li>
                            </ul>
                        <li class="menu-level-0"><a href="galeria.php"><span>Galeria</span></a>
                    </ul>
                </div>
                <!--/ Website Menu -->

                <div class="container">
                    <div class="more">
                        <ul id="sb-examples">
                        </ul>
                    </div>

                    <div>
                        <h1 style="color: black">Bem Vindo a Galeria </h1>
                    </div>
                    <div class="wrapper">
                        <ul id="sb-slider" class="sb-slider">
                            <!--inicio loop de imagens-->

                            <?php
                            $num = 0;
                            foreach ($imgs as $jpg):
                                if ($jpg != "." and $jpg != ".."):
                                    echo "<li>
                                                  <img src=\"$diretorio$jpg\"></a>
                                                  </li>";
                                    $num ++;
                                endif;
                            endforeach;
                            ?>
                            <!--fim loop de imagens-->
                        </ul>

                        <div id="shadow" class="shadow"></div>

                        <div id="nav-arrows" class="nav-arrows">
                            <a href="#">Next</a>
                            <a href="#">Previous</a>
                        </div>

                    </div><!-- /wrapper -->

                </div>
                <script type="text/javascript" src="js/jquery.min.js"></script>
                <script type="text/javascript" src="js/jquery.slicebox.js"></script>
                <script type="text/javascript">
                    $(function () {

                        var Page = (function () {

                            var $navArrows = $('#nav-arrows').hide(),
                                    $shadow = $('#shadow').hide(),
                                    slicebox = $('#sb-slider').slicebox({
                                onReady: function () {

                                    $navArrows.show();
                                    $shadow.show();

                                },
                                orientation: 'r',
                                cuboidsRandom: true,
                                disperseFactor: 30
                            }),
                                    init = function () {

                                        initEvents();

                                    },
                                    initEvents = function () {

                                        // add navigation events
                                        $navArrows.children(':first').on('click', function () {

                                            slicebox.next();
                                            return false;

                                        });

                                        $navArrows.children(':last').on('click', function () {

                                            slicebox.previous();
                                            return false;

                                        });

                                    };

                            return {init: init};

                        })();

                        Page.init();

                    });
                </script>
                
                <br>
                <hr>
                <br>
                <footer class="container-fluid text-center" style="background: #303030" >
                    <p style="color:white">Desenvolvido Por Informática São Miguel</p>
                </footer>
            </div>
    </body>

    <?php
    $readxml = simplexml_load_file('../portal_v2/sistema_relat/system/cardapio.xml');
    ?>
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content text-center">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h1 class="modal-title" style="color:black">Cardápio do Dia</h1>
                </div>
                <div class="modal-body">
                    <p class="h3"><?php echo $readxml->data ?></p>
                    <p class="h3">Prato principal</p>
                    <p class="h4"><?php echo $readxml->principal ?></p>
                    <p class="h3">Opção</p>
                    <p class="h4"><?php echo $readxml->opcao ?></p>
                    <p class="h3">Guarnição</p>
                    <p class="h4"><?php echo $readxml->guarnicao ?></p>
                    <p class="h3">Saladas</p>
                    <p class="h4"><?php echo $readxml->saladas ?></p>
                    <p class="h3">Bebida</p>
                    <p class="h4"><?php echo $readxml->bebida ?></p>
                    <p class="h3">Sobremesa</p>
                    <p class="h4"><?php echo $readxml->sobremessa ?></p>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
    <div id="senha" class="modal" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content text-center">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h1 class="modal-title" style="color: black">Como trocar a senha SAVE</h1>
                </div>
                <div class="modal-body">
                    <iframe class="col-sm-12" src="http://admldap.atacadao.com.br/trocasenha/" height="450" width="400"></iframe>

                    <p>No campo login, coloque seu usuario, no campo senha atual, coloque sua senha</p>
                    <p>No campo nova senha, coloque sua nova senha, com no minimo 6 letras e 2 numeros</p>
                    <p>No campo confirme sua senha, coloque a mesma senha do campo anterior</p>
                    <p>No campo filial, Busque por São Miguel e clique em trocar a senha!</p>

                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
</html>
