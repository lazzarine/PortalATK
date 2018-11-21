<!doctype html>
<html lang="pt-br" class="no-js">
    <head>
        <meta charset="utf-8">
        <meta name="author" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>Portal São Miguel</title>
        <!-- main JS libs -->
        <script src="js/libs/modernizr.min.js"></script>
        <script src="js/libs/jquery-1.10.0.js"></script>
        <script src="js/libs/jquery-ui.min.js"></script>
        <script src="js/libs/bootstrap.min.js"></script>
        <!-- Style CSS -->
        <link href="css/bootstrap.css" media="screen" rel="stylesheet">
        <link href="style.css" media="screen" rel="stylesheet">
        <!-- scripts -->
        <script src="js/general.js"></script>
        <!-- Include all needed stylesheets and scripts here -->
        <!--[if lt IE 9]><script src="js/respond.min.js"></script><![endif]-->
        <!--[if gte IE 9]>
        <style type="text/css">
            .gradient {filter: none !important;}
        </style>
        <![endif]-->
        <!-- Graph Builder -->
        <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/excanvas.min.js"></script><![endif]-->
        <script type="text/javascript" src="js/jquery.flot.js"></script>
        <script type="text/javascript" src="js/jquery.flot.resize.js"></script>
    </head>
    <body>
        <div class="body_wrap">
            <div class="container" style="margin-top: 5px">

                <img class=" img-responsive" src="images/banner-release.jpg">                     
                <!-- Website Menu -->
                <div class="dropdown-wrap">
                    <ul class="dropdown clearfix">

                        <li class="menu-level-0"><a href="http://srvsave035/portal_v3/"><span>Home</span></a></li>
                        <li class="menu-level-0"><a href="#"><span>Filial</span><span class="caret"></span></a>
                            <ul class="menu-level-1">
                                <li class="menu-level-1"><a href="http://tplsmiguel.atacadao.com.br:8080/" target="_blank"><span>Tplinux</span></a></li>
                                <li class="menu-level-1"><a href="http://srvuca035/" target="_blank"><span>Rub</span> </a></li>
                                <li class="menu-level-1"><a href="http://srvsave035/portal_v2/sistema_relat/" target="_blank"><span>Sistema integrado Smiguel</a></span></li>
								<li class="menu-level-1"><a href="https://srvapp035/auth/login.do?lang=pt" target="_blank"><span>SaveWeb</a></span></li>
                            </ul>
                        <li class="menu-level-0"><a href="#"><span>Links Matriz</span><span class="caret"></span></a>
                            <ul class="menu-level-1">
                                <li class="menu-level-1"><a href="http://conferencia.atacadao.com.br/" target="_blank">Erros de Conferéncia</a>
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
                                <li class="alert-danger">Novos Links<span class="caret"></span></li>
                                <li class="menu-level-1"><a href="https://intranet12c.br-atacadao.corp/forms/frmservlet?config=dbadm" target="_blank">Sistema Administrativo</a>
                                <li class="menu-level-1"><a href="https://intranet12c.br-atacadao.corp/forms/frmservlet?config=dbcom" target="_blank">Sistema Comercial</a>
                                <li class="menu-level-1"><a href="https://intranet12c.br-atacadao.corp/forms/frmservlet?config=menthor" target="_blank">Sistema Menthor</a></li>
                            </ul>
                        <li class="menu-level-0"><a href="#"><span>Outros Links</span><span class="caret"></span></a>
                            <ul class="menu-level-1">
                                <li><a href="http://csc.br-atacadao.corp/cliente.html" target="_blank">Abertura de Chamados</a>
                                <li><a href="http://portal.atacadao.com.br/aniversariantes.php" target="_blank">Aniversáriantes</a>
                                <li><a href="http://srvweb2/operacao/filiais/#" target="_blank">Consulta Cadastral das Filiais</a>
                                <li><a href="https://satsp.fazenda.sp.gov.br/COMSAT/Public/ConsultaPublica/ConsultaPublicaCfe.aspx" target="_blank">Consulta SAT</a>
                                <li><a href="imp/geral.php" target="_blank">Gasto Com Impressões</a>
                                <li><a href="http://srvweb2.atacadao.com.br/siscom/operacoes/" target="_blank">Gerenciador de Perfil S.A.V.E</a>
                                <li><a href="http://srvweb2.atacadao.com.br/procedimentos/index.php" target="_blank">Normas e Procedimentos</a>
                                <li><a href="http://srvweb2.atacadao.com.br/siscom/func_programas" target="_blank">Progs. Funções</a>
                                <li><a href="lista_ramais.html" target="_blank">Ramais Internos</a>
                                <li><a href="http://portal.atacadao.com.br/telefonia/ramais/index.html" target="_blank">Ramais Externos</a>
                                <li><a href="http://srvsave035/portal/ca50/verifica2.php" target="_blank">Verifica usuário com pedencia (RUB)</a>
                                <li><a href="https://www.webenergy.com.br/STM-ADN/Login/Login.aspx" target="_blank">Webenergy</a></li>
                            </ul>
                        <li class="menu-level-0"><a href="#"><span>Cardápio</span><span class="caret"></span></a>
                            <ul class="menu-level-1">
                                <li><a href="#" data-toggle="modal" data-target="#myModal">Cardápio do Dia</a></li>
                            </ul>

                        <li class="menu-level-0"><a href="#">Senha SAVE<span class="caret"></span></a>
                            <ul class="menu-level-1">
                                <li><a href="#" data-toggle="modal" data-target="#senha">Troque sua senha </a></li>
                            </ul>
                        <li class="menu-level-0"><a href="galeria.php"><span>Galeria</span></a>
                            </div>

                            <!--corpo Historia-->
                            <div class="ribbon ribbon-yellow"><span>Nossa História</span></div>
                            <br>
                            <br>
                            <p>
                                Ocupando posição de destaque no cenário nacional, o Atacadão está entre as melhores e maiores 
                                empresas do seu segmento no País, com 138 lojas de autosserviço, 22 centros de distribuição 
                                e atacados e uma unidade do Supeco, estrategicamente localizados, e cerca de 40 mil colaboradores.
                                Atuando em atividades comerciais fundamentais, como o atacado de distribuição e as lojas de autosserviço, 
                                o Atacadão oferece uma infraestrutura moderna e eficiente. 
                                Disponibiliza aos seus clientes uma variada gama de produtos, que totalizam aproximadamente 10 mil itens,
                                distribuídos em alimentos em geral, frios e laticínios, hortifrúti, 
                                bebidas, conservas e enlatados, doces e biscoitos, higiene pessoal, limpeza, bazar, pet shop, automotivo, entre outros.
                            </p>
                            <hr>

                            <div class="ribbon ribbon-yellow"><span>Linha do tempo</span></div>
                            <br>
                            <br>
                            <p>
                                <span> 1962 - Secos e molhados </span>

                                Alcides Parizotto iniciou a história do Atacadão com a representação comercial atacadista de gêneros alimentícios, trabalhando com produtos como queijos, sardinhas, banha, 
                                vinho e cereais, vindos de Minas Gerais, Santa Catarina e Rio Grande do Sul.
                            </p>
                            <div class="row"><img src="informacao/QuemSomos_1962.jpg" height="200" width="200" alt=""></div>   
                            <br>
                            <hr>

                            <div class="ribbon ribbon-yellow"><span>1968 – No balcão e por telefone</span></div>
                            <br>
                            <br>
                            <p>
                                Por causa da rápida expansão da empresa, foram necessárias novas mudanças nas instalações. 
                                Então, logo no início de 1968, adquirimos e reformamos o prédio da Rua Fernão Dias, nº 390, 
                                que passou a ser nossa nova sede, onde hoje ainda está a filial de Maringá. Foi nesta época 
                                que se iniciaram as vendas em balcão. 
                            </p>
                            <div class="row"><img src="informacao/QuemSomos_1968.jpg" height="200" width="200" alt=""></div>
                            <hr>

                            <div class="ribbon ribbon-yellow"><span>Anos 1970 – Crescer na cidade grande</span></div>
                            <br>
                            <br>
                            <p>
                                De olho nas oportunidades, demos nosso primeiro passo fora do Paraná e fomos para o Sudeste no início dos anos 70.
                                São Paulo, então com 6 milhões de habitantes, já era a maior cidade do país e marcou um novo período na história da 
                                nossa empresa. 
                                Em 1972, instalamos o escritório e o armazém de mercadorias na capital paulista e, em 1975, 
                                transferimos a sede para lá. 
                                Ainda em 1974, inauguramos o primeiro supermercado de atacado no Mato Grosso do Sul, 
                                em Campo Grande, e, em 1975, no Mato Grosso, em Cuiabá. 
                            </p>
                            <hr>

                            <div class="ribbon ribbon-yellow"><span>1980 – Atender mais de perto</span></div>
                            <br>
                            <br>
                            <p>
                                Demos mais um passo para ampliar nossa presença no país e instalamos escritórios regionais próprios e de 
                                representação em RO, PE, PI, BA, MG, GO e DF. Equipes locais atendiam os clientes, mandavam os pedidos para 
                                a sede, em São Paulo, que enviava as mercadorias aos compradores. 
                            </p>
                            <hr>

                            <div class="ribbon ribbon-yellow"><span>1981 – Marca própria</span></div>
                            <br>
                            <br>
                            <p>
                                Nesta época foi lançada a linha de produtos exclusivos: Óleo de soja, arroz, feijão, açúcar, palmito, 
                                detergente, fósforo, papel higiênico e sabão em pó das marcas Tropical, Caseiro, Requinte, Pilar e Alpa. 
                                As marcas próprias foram comercializadas até meados de 2010. 
                            </p>
                            <hr>

                            <div class="ribbon ribbon-yellow"><span>1984 – Um supermercado de atacado</span></div>
                            <br>
                            <br>
                            <p>
                                Uma loja teste de 1.000m² em Campo Grande (MS), com grandes corredores, produtos em fardos e a preço de 
                                atacado originou o autosserviço, que seria o “futuro do atacado”. Aprovado, o modelo foi para São Paulo em 
                                abril de 1985, ano em que inauguramos nossa sede na capital paulista. Em 1985 e 1986 Maringá (PR), Londrina (PR) 
                                e Cuiabá (MT) também ganharam filiais semelhantes. 
                            </p>
                            <div class="row"><img src="informacao/QuemSomos_1984.jpg" height="200" width="200" alt=""></div>
                            <hr>

                            <div class="ribbon ribbon-yellow"><span>1989 – 1º Prêmio Maiores e Melhores</span></div>
                            <br>
                            <br>
                            <p>
                                O Atacadão é sinônimo de qualidade no setor. Em 1989 e 1990, conquistamos o prêmio de “Melhor Empresa do Ano”. 
                            </p>
                            <div class="row"><img src="informacao/QuemSomos_1989.jpg" height="200" width="200" alt=""></div>
                            <hr>

                            <div class="ribbon ribbon-yellow"><span>1989 – Inauguração da Filial de São Miguel</span></div>
                            <p>
                                GARRA, CORAGEM, SUCESSO!!. 
                            </p>
                            <div class="row"><img src="informacao/Sao_miguel.jpg" height="200" width="200" alt=""></div>
                            <hr>
                            <div class="ribbon ribbon-yellow"><span>1990 – Mais perto dos clientes</span></div>
                            <p>
                                O Atacadão sempre atraiu fregueses por meio do boca a boca, mas em outubro deste ano resolveu 
                                contar com a ajuda dos correios, enviando aos clientes, por mala direta, o nosso jornal de ofertas.
                            </p>
                            <hr>
                            <div class="ribbon ribbon-yellow"><span>1991 – Saída do fundador</span></div>
                            <p>
                                Nesse ano, Alcides Parizotto deixou o Atacadão. Os diretores Paulo Rubens de Lima, 
                                Farid Curi e Herberto Uli Schmeil comandaram a empresa até 2007, ano da venda para o Carrefour.
                            </p>
                            <div class="row"><img src="informacao/QuemSomos_1991.jpg" height="200" width="200" alt=""></div>
                            <hr>
                            <div class="ribbon ribbon-yellow"><span>1994 – Ampliação do mix</span></div>
                            <p>
                                O Atacadão aumentou a oferta de produtos no autosserviço. Até o começo dessa década, as filiais só
                                vendiam itens não perecíveis. Os principais eram os da cesta básica, refrigerantes, cervejas, uísques,
                                enlatados, sabão e leite em pó, biscoitos e doces. Nesse ano chegaram aos atacarejos as prateleiras 
                                refrigeradas, os refrigeradores e a seção de hortifrúti. 
                            </p>
                            <hr>
                            <div class="ribbon ribbon-yellow"><span>1996 – Investimento em mão de obra</span></div>
                            <p>
                                Criamos a área de Recursos Humanos para organizar as condições de trabalho e formar pessoas com os programas 
                                para estagiários e trainees. Também foram definidos os compromissos, a missão, a forma de ser e os objetivos 
                                da empresa. Em 2003, foi implantado o Programa de Aprendizagem para menores de idade. Tudo para contribuir 
                                com o desenvolvimento das pessoas e do Atacadão. 
                            </p>
                            <hr>
                            <div class="ribbon ribbon-yellow"><span>2000 – Tempo de expandir</span></div>
                            <p>
                                As mercadorias já eram entregues em todo o país, mas o Atacadão direcionou investimentos para ampliar sua rede de lojas
                                e, assim, estar mais perto dos clientes. Entre os anos 2000 e 2007, abrimos 23 lojas em seis estados, iniciando as 
                                operações em três deles. A primeira nova praça foi Pernambuco, hoje com quatro filiais. 
                            </p>
                            <hr>
                            <div class="ribbon ribbon-yellow"><span>2007 – Atacadão Empresa Multinacional – Grupo Carrefour</span></div>
                            <p>
                                Com 34 lojas no país e uma equipe dinâmica e produtiva, chamamos a atenção de várias redes mundiais e, em 2007, 
                                fechamos negócio com o Carrefour. O grupo francês viu a oportunidade de expandir o nosso modelo de negócio “cash & carry” 
                                para outros países.  
                            </p>
                            <hr>
                            <div class="ribbon ribbon-yellow"><span>2008 – Explosão nacional</span></div>
                            <p>
                                Em 2008 e 2009, o Grupo Carrefour fez um grande investimento no Brasil, o qual foi destinado principalmente à ampliação da 
                                área de atuação do Atacadão no país e no exterior. Até 2010, passamos de 34 para 63 lojas de autosserviço e aumentamos 
                                o número de colaboradores de 7.800 para 17.800.
                            </p>
                            <hr>
                            <div class="ribbon ribbon-yellow"><span>2009 – Expansão internacional</span></div>
                            <p>
                                Em março deste ano, começamos a nossa expansão internacional, estando presente na Argentina, com a bandeira Carrefour Maxxi,
                                na Espanha, com a bandeira Supeco, e no Marrocos, nossa primeira franquia, com a bandeira Atacadão. 
                                O conceito de todas as bandeiras é baseado no modelo de negócio do Atacadão.  
                            </p>
                            <div class="row"><img src="informacao/QuemSomos_2009.jpg" height="200" width="200" alt=""></div>
                            <hr>
                            <div class="ribbon ribbon-yellow"><span>2014 – Centésima loja e nascimento do Supeco</span></div>
                            <p>
                                Segundo Paulo Rubens de Lima, “o Atacadão é uma empresa feita de gente e de exemplos”. Graças a esta qualidade, 
                                construímos a nossa história colecionando vitórias, prêmios e sucessos. Em abril de 2014, alcançamos mais uma conquista: 
                                inauguramos nossa centésima unidade, na cidade de Camaragibe (PE). Para comemorar a abertura, foi realizado um coquetel para 
                                mais de 700 convidados. Neste ano, também inauguramos a nossa primeira unidade Supeco, em Sorocaba/SP. 
                            </p>
                            <div class="row"><img src="informacao/QuemSomos_2014.jpg" height="200" width="200" alt=""></div>
                            <hr>
                            <div class="ribbon ribbon-yellow"><span>2015 - Presente em todo Brasil!</span></div>
                            <p>
                                Com a chegada à Boa Vista, em Roraíma, nos tornamos a única empresa distribuidora de alimentos a estar presente em 100% dos estados brasileiros. 
                            </p>
                            <hr>

                            <div class="ribbon ribbon-yellow"><span>2017 – 55 anos ao seu lado: mais de meio século de sucesso!</span></div>
                            <p>
                                Neste ano, o Atacadão completa 55 anos de existência, tudo graças aos nossos colaboradores, parceiros, clientes e fornecedores, que nos ajudaram a 
                                construir uma base sólida para o sucesso. O sentimento de viver em família, que nasceu no início da nossa história, está até hoje no discurso de
                                pertencimento dos nossos colaboradores. Parabéns!  
                            </p>
                            <div class="row"><img src="informacao/55anos_obrigado.jpg" height="200" width="200" alt=""></div>       
                            <!--fim corpo Historia-->
                            <br>
                            <footer class="container-fluid text-center" style="background: #303030">
                                <p style="color:white">Desenvolvido Por Informática São Miguel</p>
                            </footer>
                            </div>
                            </div>
                            <!--/ container -->

                            <!-- Modal -->
                            <?php
                            $readxml = simplexml_load_file('../portal_v2/sistema_relat/system/cardapio.xml');
                            ?>
                            <div id="myModal" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content text-center">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h1 class="modal-title">Cardápio do Dia</h1>
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
                                            <h1 class="modal-title">Como trocar a senha SAVE</h1>
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
                            </body>
                            </html>