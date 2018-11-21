<?php?>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap.js"></script>
	<link rel="stylesheet" href="css/estilo.css">
	<link rel="stylesheet" href="css/cursos.css">
	<link rel="stylesheet" href="ribbon.css">
    
    <title>Portal São Miguel</title>

	<style>
	#customers {
	margin:3px 0px ;
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse:collapse;
    width: 100%;
	color:#000;
}

#customers td, #customers th {
    border: 1px solid #ddd;
    padding: 6px;
}
#customers thead {
	background:red;
}
#customers tr:nth-child(even){background-color: #9999;}

#customers tr:hover {background-color: green;}

#customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: orangered;
    color: white;
}
</style>
</head>

<body class="container">
<!-- Menu de navegação top-->
	<header>
	<?php include"navbar.php"?>
	<!--<nav class="container-fluid navbar navbar-inverse navbar-fixed-top ">
            <div class="container-fluid">
                <button type="button" class="navbar-toggle">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class=" navbar-brand" href="index.html"><span class="fire">São Miguel</span>
                <div class="container">
                    <div class="collapse navbar-collapse topnav">
                        <ul class="nav navbar-nav">
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="cursos.html"><b>Filial</b><span
                                        class="caret"></span></a>
                                <ul class="dropdown-menu ">
									  <li><a href="http://srvtpl035.br-atacadao.corp:8080/" target="_blank"><span><b>Tplinux</b></span></a></li>
									  <li><a href="http://10.124.66.1/" target="_blank"><span><b>Rub</b></span> </a></li>
									  <li><a href="" target="_blank"><span><b>Sistema Interno</b></a></li>
									  <li><a href="https://srvapp035/auth/login.do?lang=pt" target="_blank"><span><b>SaveWeb</b></a></span></li>
									  <li><a href="http://portal.atacadao.com.br/aniversariantes.php" target="_blank"><b>Aniversariantes</b></a>
									  <li><a href="http://srvweb2/operacao/filiais/#" target="_blank"><b>Consulta Cadastral das Filiais</b></a>
									  <li><a href="http://srvweb2.atacadao.com.br/procedimentos/index.php" target="_blank"><b>Normas e Procedimentos</b></a>
									  <li><a onclick="document.getElementById('id02').style.display='block'" style="width:auto;" href="#"><span><strong>Ramais internos</strong></span></a></li>
									  <li><a href="https://idm.atacadao.com.br:9443/itim/ui/Login.jsp" target="_blank"><span ><b>Alterar Senha - Save</b></span></a></li>
								</ul>
                            </li>
							<li class="  dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="cursos.html"><b>Matriz</b><span
                                        class="caret"></span></a>
                                <ul class="dropdown-menu ">
									<li><a href="http://conferencia.atacadao.com.br/" target="_blank"><b>Erros de Conferencia</b></a></li>
									<li><a href="http://portal.atacadao.com.br/" target="_blank"><b>Portal Matriz</b></a></li>
									<li><a href="http://matrizweb.atacadao.com.br/portal/atacadao?mvc=3634" target="_blank"><b>Portal - Corporativo</b></a></li>
									<li><a href="http://srvweb2.atacadao.com.br/siscom/" target="_blank"><b>Sistema de Promotores</b></a></li>
									<li><a href="https://sitef.portal.br-atacadao.corp/sitef/" target="_blank"><b>Sitef</b></a>
									<li><a href="http://srvgdeweb.br-atacadao.corp/NFe_GDeWeb/Login.aspx" target="_blank"><b>Triangulus - NFE</b></a>
									<li><a href="http://portal.atacadao.com.br/telefonia/ramais/index.html" target="_blank"><b>Ramais Externos</b></a>
									<li><a href="https://www.webenergy.com.br/STM-ADN/Login/Login.aspx" target="_blank"><b>Webenergy</b></a></li>
								</ul>
                            </li>
							<li class="  dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="cursos.html"><b>Corporativos</b><span
                                        class="caret"></span></a>
                                <ul class="dropdown-menu ">
									<li><a href="https://intranet12c.br-atacadao.corp/forms/frmservlet?config=dbadm" target="_blank"><b>Sistema Administrativo</b></a>
									<li><a href="https://intranet12c.br-atacadao.corp/forms/frmservlet?config=dbcom" target="_blank"><b>Sistema Comercial</b></a>
									<li><a href="https://intranet12c.br-atacadao.corp/forms/frmservlet?config=menthor" target="_blank"><b>Sistema Menthor</b></a></li>
                                </ul>
                            </li>
							<li class="  dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="cursos.html"><b>C.P.D</b><span
                                        class="caret"></span></a>
                                <ul class="dropdown-menu ">
									<li><a href="http://csc.br-atacadao.corp/cliente.html" target="_blank"><b>Abertura de Chamados</b></a>
									<li><a href="https://satsp.fazenda.sp.gov.br/COMSAT/Public/ConsultaPublica/ConsultaPublicaCfe.aspx" target="_blank"><b>Consulta SAT</b></a>
									<li><a href="http://srvweb2.atacadao.com.br/siscom/func_programas" target="_blank"><b>Progs. Funções</b></a>
									<li><a href="http://www.sintegra.gov.br/" target="_blank"><b>Sintegra</b></a>
									<li><a href="http://srvnaplic2.atacadao.com.br/intranet/docSuporte.nsf/xpViewAlpha.xsp" target="_blank"><b>Procedimentos Inform⵩ca</b></a></li>
									<li><a href="http://tecnoclient.tecnoset.com.br/TecnoClient/interface/home/login.htm" target="_blank"><b>TecnoSet</b></a></li>
									
							   </ul>
                            </li>
							<li><span><a href="#"></a></span></li>
							<li></li>
							<li><a onclick="document.getElementById('id01').style.display='block'" style="width:auto;" href="#"><span><strong>Cardápio</strong></span></a></li>
                            <li><a href="#ds"><b></b></a></li>
                        </ul>
                        <!--<ul class="nav navbar-nav navbar-right">
                            <li><a href="https://idm.atacadao.com.br:9443/itim/ui/Login.jsp" target="_blank"><span class="ins"><b>Alterar Senha</b></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>--> 
    <!--corpo Historia-->
		<div class="margin-top-100"></div>
		<div class="ribbon ribbon-yellow"><span>Nossa História</span></div>
		<br>
		<br>
		<p class="desc quebra" style="font-size:16px">
			Ocupando posição de destaque no cenário nacional, o Atacadão está entre as melhores e maiores 
			empresas do seu segmento no País,com 138 lojas de autosserviço, 22 centros de distribuição 
			e atacados e uma unidade do Supeco, estrategicamente localizados, e cerca de 40 mil colaboradores.<br>
			Atuando em atividades comerciais fundamentais, como o atacado de distribuição e as lojas de autosserviço, 
			o Atacadão oferece uma infraestrutura moderna e eficiente.</p> <br>
		<p class="desc quebra"style="font-size:16px">Disponibiliza aos seus clientes uma variada gama de produtos, que totalizam aproximadamente 10 mil itens,
			distribuídos em alimentos em geral, frios e laticínios, hortifrúti, 
			bebidas, conservas e enlatados, doces e biscoitos, higiene pessoal, limpeza, bazar, pet shop, automotivo, entre outros.
		</p>
				<hr class="hr2">
		<br>
		<br>
		<!--Inicio cardapio-->
	<?php
	$readxml = simplexml_load_file('../portal_v2/sistema_relat/system/cardapio.xml');
	?>
<div id="id01" class="modal">
	<div class="modal-dialog">
	<!-- Modal content-->
		<div class="modal-content text-center">
			<div class="modal-header ">
				<span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
				<h1 class="modal-title">Cardápio do Dia</h1>
			</div>
			<div class="modal-body">
				<p class="h3" style="text-transform: capitalize"><?php echo $readxml->data ?></p>
				<p class="h3">Prato principal</p>
				<p class="h4" style="text-transform: capitalize"><?php echo $readxml->principal ?></p>
				<p class="h3">Opção</p>
				<p class="h4" style="text-transform: capitalize"><?php echo $readxml->opcao ?></p>
				<p class="h3">Guarnição</p>
				<p class="h4" style="text-transform: capitalize"><?php echo $readxml->guarnicao ?></p>
				<p class="h3">Saladas</p>
				<p class="h4" style="text-transform: capitalize"><?php echo $readxml->saladas ?></p>
				<p class="h3">Bebida</p>
				<p class="h4" style="text-transform: capitalize"><?php echo $readxml->bebida ?></p>
				<p class="h3">Sobremesa</p>
				<p class="h4" style="text-transform: capitalize"><?php echo $readxml->sobremesa ?></p>
			</div>
		</div>
	</div>
</div>
<!--FIM CARDAPIO-->
		<!--INICIO RAMAIS-->
<div id="id02" class="modal">
	<div class="modal-dialog">
	<!-- Modal content-->
		<div class="modal-content text-center">
			<div class="modal-body">
			<span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
			<br>
				<table  id="customers">
					<thead>
						<tr>
							<th>Setor</th>
							<th>Usuários</th>
							<th>Ramal</th>
						</tr>
					</thead>
					<tr>
						<td>Almoxarifado</td>
						<td>Felipe</td>
						<td>8034</td>
					</tr>
					<tr>
						<td>Apoio Gerência</td>
						<td>Wilson</td>
						<td>8042</td>
					</tr>
					<tr>
						<td>Cadastro</td>
						<td>Fax / Cadastro</td>
						<td>8029</td>
					</tr>
					<tr>
						<td>Cadastro</td>
						<td>Cadastro</td>
						<td>8044</td>
					</tr>
					<tr>
						<td>Cartazista</td>
						<td>Jairo</td>
						<td>8004</td>
					</tr>
					<tr>
						<td>Checkin</td>
						<td>---</td>
						<td>8008</td>
					</tr>
					<tr>
						<td>Estoquista</td>
						<td>Juliano/Josivan</td>
						<td>8003</td>
					</tr>
					<tr>
						<td>Frente de Caixa</td>
						<td>Joselma / Simone</td>
						<td>8026</td>
					</tr>
					<tr>
						<td>Ass.Administrativo</td>
						<td>Patricia</td>
						<td>8031</td>
					</tr>
					<tr>
						<td>Gerência</td>
						<td>Luiz</td>
						<td>8001</td>
					</tr>
					<tr>
						<td>Gerência</td>
						<td>Marisa</td>
						<td>8005</td>
					</tr>
					<tr>
						<td>Gerência</td>
						<td>Uziel</td>
						<td>8045</td>
					</tr>
					<tr>
						<td>Manutencao</td>
						<td>José / Costa</td>
						<td>8010</td>
					</tr>
					<tr>
						<td>Prevenção</td>
						<td>G1 (recepção)</td>
						<td>8012</td>
					</tr>
					<tr>
						<td>Recursos Humanos</td>
						<td>Tatiane</td>
						<td>8035</td>
					</tr>
					<tr>
						<td>Recursos Humanos</td>
						<td>Marcia</td>
						<td>8014</td>
					</tr>
					<tr>
						<td>Recursos Humanos</td>
						<td>Sala de Treinamento</td>
						<td>8017</td>
					</tr>
					<tr>
						<td>Refeitório</td>
						<td>Viviane</td>
						<td>8036</td>
					</tr>
					<tr>
						<td>RM</td>
						<td>Osvaldo</td>
						<td>8006</td>
					</tr>
					<tr>
						<td>RM</td>
						<td>Eduardo</td>
						<td>8007</td>
					</tr>
					<tr>
						<td>Trocas</td>
						<td>Carlos/Wellington</td>
						<td>8038</td>
					</tr>
					<tr>
						<td>HortFrut</td>
						<td>Humberto</td>
						<td>8019</td>
					</tr>
					<tr>
						<td>Preparação</td>
						<td>Charles/Oziel</td>
						<td>8047</td>
					</tr>
					<tr>
						<td>Estande Cartão Atacadão</td>
						<td>Michele</td>
						<td>8046</td>
					</tr>
					<tr>
						<td>Entrada da Loja</td>
						<td>Prevenção</td>
						<td>8048</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>




                           
	<div class="" >
            <div class="_title-3">
                <label class=" text-center">
                   Linha Do tempo
                </label>
            </div>
                    <div class="panel-group" id="accordion">
                        <div class="">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse1"style="color:orangered">1962 - Secos e molhados</a>
                                </h4>
                            </div>
							
                            <div id="collapse1" class="panel-collapse collapse " >
                                <div class="panel-body">
                                   <p class=" quebra2">
										Alcides Parizotto iniciou a história do Atacadão com a representação comercial atacadista de gêneros alimentícios, trabalhando com produtos como queijos, sardinhas, banha, 
										vinho e cereais, vindos de Minas Gerais, Santa Catarina e Rio Grande do Sul.
								   </p>
                                </div>
                            </div>
                        </div>
                        <div class=" ">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse2" style="color:orangered">1968 – No balcão e por telefone</a>
                                </h4>
                            </div>
                            <div id="collapse2" class="panel-collapse collapse">
                                <div class="panel-body">
                                		<p class=" quebra2">
											Por causa da rápida expansão da empresa, foram necessárias novas mudanças nas instalações. 
											Então, logo no início de 1968, adquirimos e reformamos o prédio da Rua Fernão Dias, nº 390, 
											que passou a ser nossa nova sede, onde hoje ainda está a filial de Maringá. Foi nesta época 
											que se iniciaram as vendas em balcão. 
										</p>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse4" style="color:orangered">1970 – Crescer na cidade grande</a>
                                </h4>
                            </div>
                            <div id="collapse4" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p class=" quebra2">
										De olho nas oportunidades, demos nosso primeiro passo fora do Paraná e fomos para o Sudeste no início dos anos 70.
										São Paulo, então com 6 milhões de habitantes, já era a maior cidade do país e marcou um novo período na história da 
										nossa empresa. </p>
									<p class="quebra2">	Em 1972, instalamos o escritório e o armazém de mercadorias na capital paulista e, em 1975, 
										transferimos a sede para lá. </p>
									<p class="quebra2">	Ainda em 1974, inauguramos o primeiro supermercado de atacado no Mato Grosso do Sul, 
										em Campo Grande, e, em 1975, no Mato Grosso, em Cuiabá. 
									</p>
                                </div>
                            </div>
                        </div>
						<div class="">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse5" style="color:orangered" >1980 – Atender mais de perto</a>
                                </h4>
                            </div>
                            <div id="collapse5" class="panel-collapse collapse">
                                <div class="panel-body">
                                   <p class=" quebra2">
										Demos mais um passo para ampliar nossa presença no país e instalamos escritórios regionais próprios e de 
										representação em RO, PE, PI, BA, MG, GO e DF. Equipes locais atendiam os clientes, mandavam os pedidos para 
										a sede, em São Paulo, que enviava as mercadorias aos compradores. 
								   </p>
                                </div>
                            </div>
                        </div>
						<div class="">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse6" style="color:orangered">1981 – Marca própria</a>
                                </h4>
                            </div>
                            <div id="collapse6" class="panel-collapse collapse">
                                <div class="panel-body">
									<p class=" quebra2">
										Nesta época foi lançada a linha de produtos exclusivos: Óleo de soja, arroz, feijão, açúcar, palmito, 
										detergente, fósforo, papel higiênico e sabão em pó das marcas Tropical, Caseiro, Requinte, Pilar e Alpa. 
										As marcas próprias foram comercializadas até meados de 2010. 
									</p>
                                </div>
                            </div>
                        </div>
						<div class="">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse7" style="color:orangered">1984 – Um supermercado de atacado</a>
                                </h4>
                            </div>
                            <div id="collapse7" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p class=" quebra2">
										Uma loja teste de 1.000m² em Campo Grande (MS), com grandes corredores, produtos em fardos e a preço de 
										atacado originou o autosserviço, que seria o “futuro do atacado”.<br></p>
									<p class="quebra2">	Aprovado, o modelo foi para São Paulo em 
										abril de 1985, ano em que inauguramos nossa sede na capital paulista. Em 1985 e 1986 Maringá (PR), Londrina (PR) 
										e Cuiabá (MT) também ganharam filiais semelhantes. 
									</p>
                                </div>
                            </div>
                        </div>
						<div class="">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse8" style="color:orangered">1989 – Inauguração da Filial de São Miguel</a>
                                </h4>
                            </div>
                            <div id="collapse8" class="panel-collapse collapse">
                                <div class="panel-body">
                                   <p class=" quebra2">
										O Atacadão é sinônimo de qualidade no setor. Em 1989 e 1990, conquistamos o prêmio de “Melhor Empresa do Ano”. 
									</p>
                                </div>
                            </div>
                        </div>
						<div class="">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse9" style="color:orangered">1990 – Mais perto dos clientes</a>
                                </h4>
                            </div>
                            <div id="collapse9" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p class=" quebra2">
										Contar com a ajuda dos correios, enviando aos clientes, por mala direta, o nosso jornal de ofertas.
									</p>
                                </div>
                            </div>
                        </div>
						<div class="">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse10" style="color:orangered">1991 – Saída do fundador</a>
                                </h4>
                            </div>
                            <div id="collapse10" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p class=" quebra2">
										Nesse ano, Alcides Parizotto deixou o Atacadão.</p>
									<p class="quebra2">	Os diretores Paulo Rubens de Lima, 
										Farid Curi e Herberto Uli Schmeil comandaram a empresa até 2007, ano da venda para o Carrefour.
									</p>
                                </div>
                            </div>
                        </div>
						<div class="">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse11" style="color:orangered">1994 – Ampliação do mix</a>
                                </h4>
                            </div>
                            <div id="collapse11" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p class=" quebra2" >
										O Atacadão aumentou a oferta de produtos no autosserviço. Até o começo dessa década, as filiais só
										vendiam itens não perecíveis.</p>
									<p class="quebra2">	Os principais eram os da cesta básica, refrigerantes, cervejas, uísques,
										enlatados, sabão e leite em pó, biscoitos e doces. </p>
									<p class="quebra2">	Nesse ano chegaram aos atacarejos as prateleiras 
										refrigeradas, os refrigeradores e a seção de hortifrúti. 
									</p>
                                </div>
                            </div>
                        </div>
						<div class="">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse13" style="color:orangered">1996 – Investimento em mão de obra</a>
                                </h4>
                            </div>
                            <div id="collapse13" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p class=" quebra2">
										Criamos a área de Recursos Humanos para organizar as condições de trabalho e formar pessoas com os programas 
										para estagiários e trainees. Também foram definidos os compromissos, a missão, a forma de ser e os objetivos 
										da empresa.</p>
									<p class="quebra2">	Em 2003, foi implantado o Programa de Aprendizagem para menores de idade. Tudo para contribuir 
										com o desenvolvimento das pessoas e do Atacadão. 
									</p>
                                </div>
                            </div>
                        </div>
						<div class="">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse14" style="color:orangered">2000 – Tempo de expandir</a>
                                </h4>
                            </div>
                            <div id="collapse14" class="panel-collapse collapse" style='background-color:transparent;'>
                                <div class="panel-body" >
                                    <p class=" quebra2">
										As mercadorias já eram entregues em todo o país, mas o Atacadão direcionou investimentos para ampliar sua rede de lojas
										e, assim, estar mais perto dos clientes.</p>
									<p class="quebra2">	Entre os anos 2000 e 2007, abrimos 23 lojas em seis estados, iniciando as 
										operações em três deles. A primeira nova praça foi Pernambuco, hoje com quatro filiais. 
									</p>
                                </div>
                            </div>
                        </div>
						<div class="">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse15" style="color:orangered">2007 – Atacadão Empresa Multinacional – Grupo Carrefour</a>
                                </h4>
                            </div>
                            <div id="collapse15" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p class=" quebra2">
										Com 34 lojas no país e uma equipe dinâmica e produtiva, chamamos a atenção de várias redes mundiais e, em 2007, 
										fechamos negócio com o Carrefour.</p>
									<p class="quebra2">	O grupo francês viu a oportunidade de expandir o nosso modelo de negócio “cash & carry” 
										para outros países.  
									</p>
                                </div>
                            </div>
                        </div>
						<div class="">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse16" style="color:orangered">2008 – Explosão nacional</a>
                                </h4>
                            </div>
                            <div id="collapse16" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p class=" quebra2">
										Em 2008 e 2009, o Grupo Carrefour fez um grande investimento no Brasil, o qual foi destinado principalmente à ampliação da 
										área de atuação do Atacadão no país e no exterior.</p>
									<p class="quebra2">	Até 2010, passamos de 34 para 63 lojas de autosserviço e aumentamos 
										o número de colaboradores de 7.800 para 17.800.
									</p>
                                </div>
                            </div>
                        </div>
						<div class="">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse17" style="color:orangered">2009 – Expansão internacional</a>
                                </h4>
                            </div>
                            <div id="collapse17" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p class=" quebra2">
										Em março deste ano, começamos a nossa expansão internacional, estando presente na Argentina, com a bandeira Carrefour Maxxi,
										na Espanha, com a bandeira Supeco, e no Marrocos, nossa primeira franquia, com a bandeira Atacadão. 
										O conceito de todas as bandeiras é baseado no modelo de negócio do Atacadão.  
									</p>
                                </div>
                            </div>
                        </div>
						<div class="">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse18" style="color:orangered">2014 – Centésima loja e nascimento do Supeco</a>
                                </h4>
                            </div>
                            <div id="collapse18" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p class=" quebra2">
										Segundo Paulo Rubens de Lima, “o Atacadão é uma empresa feita de gente e de exemplos”. 
										Graças a esta qualidade, 
										construímos a nossa história colecionando vitórias, prêmios e sucessos.</p>
									<p class="quebra2">	Em abril de 2014, alcançamos mais uma conquista: 
										inauguramos nossa centésima unidade, na cidade de Camaragibe (PE). Para comemorar a abertura, foi realizado um coquetel para 
										mais de 700 convidados.</p>
									<p class="quebra2">	Neste ano, também inauguramos a nossa primeira unidade Supeco, em Sorocaba/SP. 
									</p >
                                </div>
                            </div>
                        </div>
						<div class="">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse19" style="color:orangered">2015 - Presente em todo Brasil!</a>
                                </h4>
                            </div>
                            <div id="collapse19" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p class="quebra2">
										Com a chegada à Boa Vista, em Roraíma, nos tornamos a única empresa distribuidora de alimentos a estar presente em 100% dos estados brasileiros. 
									</p>
                                </div>
                            </div>
                        </div>
						<div class="">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse20" style="color:orangered">2017 – 55 anos ao seu lado: mais de meio século de sucesso!</a>
                                </h4>
                            </div>
                            <div id="collapse20" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p class="quebra2 ">
										Neste ano, o Atacadão completa 55 anos de existência, tudo graças aos nossos colaboradores, parceiros, clientes e fornecedores, que nos ajudaram a 
										construir uma base sólida para o sucesso. O sentimento de viver em família, que nasceu no início da nossa história, está até hoje no discurso de
										pertencimento dos nossos colaboradores. Parabéns!  
									</p>
                                </div>
                            </div>
                        </div>
                    </div>
<?php include "footer.php"?>

</body>
</html>