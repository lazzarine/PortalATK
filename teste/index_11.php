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

<body >
<!-- Menu de navegação top-->
	<header>
	<?php include"navbar.php"?>
	
        <!---<nav class="container-fluid navbar navbar-inverse navbar-fixed-top ">
            <div class="container-fluid">
                <button type="button" class="navbar-toggle">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class=" navbar-brand" href="testando.html"><span class="fire">São Miguel</span>
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
									<li><a href="http://srvweb2.atacadao.com.br/siscom/func_programas" target="_blank"><b>Progs. Funçoes</b></a>
									<li><a href="http://www.sintegra.gov.br/" target="_blank"><b>Sintegra</b></a>
									<li><a href="http://srvnaplic2.atacadao.com.br/intranet/docSuporte.nsf/xpViewAlpha.xsp" target="_blank"><b>Procedimentos Informática</b></a></li>
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
        <br>
	</header>
<!--fim menu de navegação top-->

<section class="container-fluid ">
 <!---Espaço do Carrousel-->
	<div class="linha-vertical col-lg-8">
		<div id="myCarousel" class=" margin-top-50 carousel slide" data-ride="carousel">
			<!-- indicadores  -->
			<!-- Slides imagens do carrousel -->
			<div class="carousel-inner" role="listbox">
				<div class="item active">
					<img src="images/noname.gif" alt="Image">
					<div class="carousel-caption">
						<h3></h3>
						<p></p>
					</div>
				</div>
		
				<div class="item">
					<img src="images/index/1.jpg" alt="Image">
					<div class="carousel-caption">
						<h3 class="prop"></h3>
						<p></p>
					</div>
				</div>
				<div class="item">
					<img src="images/index/2.jpg" class="img-fluid d-block"  alt="Image">
					<div class="carousel-caption">
						<h3 class="fire"></h3>
						<p></p>
					</div>
				</div>
				<div class="item">
					<img src="images/index/3.jpg" alt="Image">
					<div class="carousel-caption">
						<h3 class="prop"></h3>
						<p></p>
					</div>
				</div>
				<div class="item">
					<img src="images/index/4.jpg" alt="Image">
					<div class="carousel-caption">
						<h3 class="prop"></h3>
						<p></p>
					</div>
				</div>
				<div class="item">
					<img src="images/index/5.jpg" alt="Image">
					<div class="carousel-caption">
						<h3 class="prop"></h3>
						<p></p>
					</div>
				</div>
				<div class="item">
					<img src="images/index/6.jpg" alt="Image">
					<div class="carousel-caption">
						<h3 class="prop"></h3>
						<p></p>
					</div>
				</div>
				<div class="item">
					<img src="images/copahurra/penalti.gif" alt="Image">
					<div class="carousel-caption">
						<h3 class="prop"></h3>
						<p></p>
					</div>
				</div>
			</div>
		
			<!-- Esquerda Direita -->
			<div class="row">
				<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					<span class="sr-only">Anterior</span>
				</a>
			</div>
			<div class="row">
				<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					<span class="sr-only">Proximo</span>
				</a>
			</div>
		</div>
	</div>
<!-- FIM CARROUSEL-->

<!--- COMENTARIO LADO CARROUSEL-->
	<div class="margin-top-50 col-lg-4">
		<div class="media">
			<div class="media-left">
				<img src="images/ls.jpg" class="media-object" style="width:91px">
			</div>
			<div class="media-body">
				<h4 class="media-heading " style="color:orangered">Nossa História</h4>
                <p class="desc">Você conhece a História do ATACADÃO??</p>
				<a href="historia.php" target="_blank" style="color:green;">Clique Aqui!</a>
			</div>
		</div>
		<div class="media ">
			<div class="media-left">
				<img src="images/pl.jpg" class="media-object" style="width:91px">
			</div>
			<div class="media-body">
				<h4 class="media-heading" style="color:orangered">Nutricionista</h4>
				<p class="desc">Você Conhece a Operação Prato Limpo ??</p> <a href="operação_prato_limpo.php" target="_blank" style="color:green;">Conheça já!</a>
				
			</div>
		</div>
		<div class="media">
			<div class="media-left">
				<img src="images/perdas.jpg" class="media-object" style="height:100px; width:91px;">
			</div>
			<div class="media-body">
				<h4 class="media-heading">Nutricionista</h4>
				<p class="desc"></p> <a target="_blank" href="operação_prato_limpo.php">Clique aqui e veja</a>
             </div>
			</div>
		</div>
	</div>
	</div>
	<div class="col-md-8">
	</div>
	
	
<!--- FIM COMENTARIO LADO CARROUSEL--->
	<div id="seguranca" class="modal" role="dialog">
		<div class="modal-dialog modal-lg">
		<!-- Modal content-->
			<div class="modal-content text-center">
				<div class="modal-header">
					<span onclick="document.getElementById('seguranca').style.display='none'" class="close" title="Close Modal">&times;</span>
					<h1 class="_title"> Dicas de Segurança da Informação</h1>
				</div>
				<div class="modal-body">
					<img src="informacao/Boletim-Logo-eu-Atacadao-SI.jpg"><br><hr><br>
					<img src="informacao/Boletim-Whats-Atacadao.jpg">
				</div>
				<div class="modal-footer">
				</div>
			</div>
		</div>
	</div>
	<div id="recursos" class="modal" role="dialog">
		<div class="modal-dialog modal-lg">
		<!-- Modal content-->
			<div class="modal-content text-center">
				<div class="modal-header">
					<span onclick="document.getElementById('recursos').style.display='none'" class="close" title="Close Modal">&times;</span>
					<h1 class="modal-title">Comportamentos Organizacionais</h1>
				</div>
					<div class="modal-body">
						<img src="informacao/QuemSomos_mandala.jpg" height="100%" width="100%" >
					</div>
			</div>
			<div class="modal-footer">
			</div>
		</div>
	</div>

	
<!-- FIM DIALOGOS-->
<!--anuncios copa hurra inicio--->
<section>
	<div class="row">
		<div class=" col-md-12">
			<div class="col-md-3">
					<div >
						<img class="cp"src="images/copahurra/si1.jpg" style="width:100%"/>
					</div>
				</div>
				<div class="col-md-3">
					<div >
						<img class="cp"src="images/copahurra/si2.jpg" style="width:100%"/>
					</div>
				</div>
				<div class="col-md-3">
					<div >
						<img class="cp"src="images/copahurra/si3.jpg" style="width:100%"/>
					</div>
				</div>
							<div class="col-md-3">
					<div >
						<img class="cp"src="images/copahurra/si4.jpg" style="width:100%"/>
					</div>
				</div>
		</div>
	</div>
</section>
<!--anuncios copa hurra Fim--->
<!---- Inicio Tabs--->
	<div class="margin-top-25 container-fluid">
		<div class="row">
			<div class="col-md-5">
				<ul class="nav nav-tabs">
					<li class="active"><a href="#events" data-toggle="tab">Segurança da Informação</a></li>
					<li><a href="#starred" data-toggle="tab">Cartão Atacadão</a></li>
					<li><a href="#reminders" data-toggle="tab">Recursos Humanos</a></li>
				</ul>
						<div class="tab-content ">
							<div class="tab-pane fade in active" id="events">
								<div class="">
									<div class="media-left">
										<img src="informacao/logo_si.jpg" class="media-object" style="width:150px;">
									</div>
									<div class="media-body">
										<h4 class="media-heading" >Dicas de segurança digital</h4>
										<p class="desc">clique no link abaixo para visualizar as dicas de segurança da informação.</p>
										<a onclick="document.getElementById('seguranca').style.display='block'" style="color:red" href="#"><span><strong>Veja aqui</strong></span></a>
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="reminders">
								<div class="">
									<div class="media-left">
										<img src="informacao/rh.png" class="media-object" style="width:91px">
									</div>
									<div class="media-body">
										<h4 class="media-heading">Comportamentos Organizacionais</h4>
										<p class="desc">Aqui você pode acompanhar os comportamentos Organizacionais </p>
										<a onclick="document.getElementById('recursos').style.display='block'" style="color:red;width:auto;" href="#"><span><strong>Veja aqui</strong></span></a>
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="starred">
								<div class="">
									<div class="media-left">
										<img src="informacao/Cartao.jpg" class="media-object" style="width:94px">
									</div>
									<div class="media-body">
										<h4 class="media-heading">A Novidade Chegou!</h4>
										<p class="desc">Chegou a Grande novidade fique por dentro das informações sobre o cartao incluindo o contrato</p>
										<a href="informacao/Cartao_Atacadao_Tarifas_jan_2017.pdf" target="blank" class="see-more"><span style="color:red">Informações</span></a>
										<a href="informacao/Contrato_ ATC_Funcionario_16_03_2017_versao_site.pdf" target="blank"  style="float:right;color:red">Contrato</a>
									</div>
								</div>
							</div>
						</div>
						
			</div>
			<div class="col-md-7">
				<div >
					<img class="cp"src="images/copahurra/gol-de-placa.jpg" style="width:100%"/>
				</div>
			</div>

			<!--
			<div class="col-md-7">
				<div class="flip">
					<div class="front">
						<img class="img-thumbnail"src="../img/tosh2.jpg" alt="Paris"style="width:300px;height:200px">
					</div>
					<div class=" back text-center">
						<h2 class="_title-c"><a href="http://smartmanager.brazilsouth.cloudapp.azure.com/canal_cliente/" target="_blank"><b>Canal TOSHIBA</b></a></h2>
						<p><em>Central TOSHIBA <br>
							 </em>ou IBM</p>
					</div>
				</div>
				<div class="flip">
					<div class="front">
						<img class="img-thumbnail"src="../img/logo.png" alt="Paris" style=" background:green;width:300px;height:200px">
					</div>
					<div class="back text-center">
						<h2 class="_title-c"><a href="http://csc.br-atacadao.corp/cliente.html" target="_blank">Central de Serviços</a></b></h2>
						<p><em> Abertura de <br>
								Chamados </em></p>
					</div>
				</div>
				<div class="flip">
					<div class="front">
						<img class="img-thumbnail"src="../img/terceiros.png"style="width:300px;height:200px">
					</div>
					<div class="back text-center">
						<h2 class="_title-c"><a href="http://srvweb2.atacadao.com.br/siscom/promotor_reports/idx/index.php" target="_blank"><b>Sistema  Terceiros</b></a></h2>
						<p><em>Promotores <br>
							& Terceirizadas</em></p>
					</div>
				</div>
			</div>
		</div>-->
	</div>
</section>

<!--Inicio cardapio-->
	<?php
	$readxml = simplexml_load_file('../../portal_v2/sistema_relat/system/cardapio.xml');
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
<br>
<br>
<?php include"footer.php"?>
<!--<footer style="margin-top:150px" class=" footer2 container">
    <section >
        <h2><a class="fire" >Portal - São Miguel</a></h2>
        <div class="row">
            <section class="circle col-md-4">
                <h3 class="_title-3 margin-bottom-25"></h3>
                <p class="margin-top-50"></p>
                <p class="text-uppercase small">Desenvolvido por C.P.D - São Miguel 2018</p>
                <p class="small">Todos os direitos reservados.</p>
            </section>
            <section class="  circle col-md-4">
                <h3 class="_title-3  margin-bottom-25">Contatos</h3>
                <ul class="quebra2">
                    <li><b>Ramal:8015</b></li>
                    <li></li>
                    <li><b>Ramal:8016</b></li>
                    <li></li><br>
                    <li><b>E-mail</b></li>
                    <li>cpdsaomiguel@atacadao.com.br</li>
                    <li></li>
                </ul>
            </section>
            <section class="circle col-md-4">
                <h3 class="_title-3 margin-bottom-25"> Nosso Time:</h3>
                <ul class="quebra2">
                    <li><b>Uelinton P.</li>
					<li>Felipe S.</li>
					<li>Gabriel P.</li>
					<li>Adelson A.</li>
					<li>Ueslei S.</li></b>
                </ul>
            </section>
        </div>
    </section>
</footer>-->

    
</body>


</html>
