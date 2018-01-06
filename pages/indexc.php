<!DOCTYPE html>
<?php
include('../librerias/utiles.php');
?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">SB Admin v2.0</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-tasks fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-tasks">
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 1</strong>
                                        <span class="pull-right text-muted">40% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 2</strong>
                                        <span class="pull-right text-muted">20% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                            <span class="sr-only">20% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 3</strong>
                                        <span class="pull-right text-muted">60% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            <span class="sr-only">60% Complete (warning)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 4</strong>
                                        <span class="pull-right text-muted">80% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                            <span class="sr-only">80% Complete (danger)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Tasks</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-tasks -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-tasks fa-fw"></i> New Task
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="index.html"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Charts<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="flot.html">Flot Charts</a>
                                </li>
                                <li>
                                    <a href="morris.html">Morris.js Charts</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="tables.html"><i class="fa fa-table fa-fw"></i> Tables</a>
                        </li>
                        <li>
                            <a href="forms.html"><i class="fa fa-edit fa-fw"></i> Forms</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> UI Elements<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="panels-wells.html">Panels and Wells</a>
                                </li>
                                <li>
                                    <a href="buttons.html">Buttons</a>
                                </li>
                                <li>
                                    <a href="notifications.html">Notifications</a>
                                </li>
                                <li>
                                    <a href="typography.html">Typography</a>
                                </li>
                                <li>
                                    <a href="icons.html"> Icons</a>
                                </li>
                                <li>
                                    <a href="grid.html">Grid</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-sitemap fa-fw"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">Second Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Second Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Third Level <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> Sample Pages<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="blank.html">Blank Page</a>
                                </li>
                                <li>
                                    <a href="login.html">Login Page</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Busqueda</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="color:#5CB85C;">
                            Seleccione sus parametros de busqueda
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" id="form1" name="form1">
										<div id="fecha" style="margin-bottom:30px;">
											<div style="display: inline-block; width:32%;">
												<p><label>Dia</label></p>
												<select name="dia" id="dia" class="form-control">
													<option value="ningun">Todos</option>
													<?php
														for($i = 1; $i <= 31; $i++)
														{
															echo "<option value='$i'>$i</option>\n";
														}
													?>
												</select>
											</div>
											<div style="display: inline-block; width:32%;">
												<p><label>Mes</label></p>
												<select name="mes" id="mes" class="form-control">
													<option value="ningun">Todos</option>
													<?php
														$Arraymeses = obtArrayMeses();
														
														for($i = 0; $i < 12; $i++)
														{
															echo "<option value='".($i+1)."'>".$Arraymeses[$i]."</option>\n";
														}
													?>
												</select>
											</div>
											<div style="display: inline-block; width:32%;">
												<p><label>Año</label></p>
												<select name="anyo" id="anyo" class="form-control">
													<option value="ningun" size="10">Todos</option>
													<?php
														$anyoActual = obtAnyoAct();
														
														for($i = 1900; $i <= $anyoActual; $i++)
														{
															echo "<option value='$i'>$i</option>\n";
														}
													?>
												</select>
											</div>
										</div>
										<!-- / fecha -->
										<p style="color:red;" id="errorFecha"></p>
										<div id="ubicacion" style="margin-bottom:30px;">
											<div style="display: inline-block; width:49%; ">
												<p><label>Archiprestazgo</label></p>
												<select name="archiprestazgo" id="archiprestazgo" class="form-control">
													<option value="ningun">Seleccionar</option>
													<option value="Curea">Curea</option>
													<option value="Valencia Centro - Sur">Valencia Centro - Sur</option>
													<option value="Valencia Centro - Norte">Valencia Centro - Norte</option>
													<option value="Valencia Sur - Este">Valencia Sur - Este</option>
													<option value="Valencia Sur - Oeste">Valencia Sur - Oeste</option>
													<option value="Carabobo Este">Carabobo Este</option>
													<option value="Carabobo Sur">Carabobo Sur</option>
													<option value="Carabobo Oeste">Carabobo Oeste</option>
												</select>
											</div>
											<div style="display: inline-block; width:49%;">
												<p><label>Parroquia</label></p>
												<select name="parroquia" id="parroquia" class="form-control">
													<option value="ningun">Seleccionar...</option>
												</select>
											</div>
										</div>
										<!-- / ubiacion -->
                                        
                                        <div class="form-group">
                                            <label>Tipo de Documento:</label>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="tipo_documento[]" value="Compra-venta" id="tipo_documento_0" />Compra-Venta
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="tipo_documento[]" value="Sesion o traspaso" id="tipo_documento_1" />Sesion o traspaso
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="tipo_documento[]" value="Donaciones" id="tipo_documento_2" />Donaciones
                                                </label>
                                            </div>
											<div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="tipo_documento[]" value="Permutas" id="tipo_documento_3" />Permutas
                                                </label>
                                            </div>
											<div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="tipo_documento[]" value="Titulo Supletorio" id="tipo_documento_4" />Titulo Supletorio
                                                </label>
                                            </div>
											<div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="tipo_documento[]" value="Notas Aclaratorias" id="tipo_documento_5" />Notas Aclaratorias
                                                </label>
                                            </div>
											<div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="tipo_documento[]" value="Testamento" id="tipo_documento_6" />Testamento
                                                </label>
                                            </div>
											<div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="tipo_documento[]" value="Liquidacion de Hipotecas" id="tipo_documento_7" />Liquidacion de Hipotecas
                                                </label>
                                            </div>
											<div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="tipo_documento[]" value="Adjudicacion" id="tipo_documento_8" />Adjudicacion
                                                </label>
                                            </div>
											<div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="tipo_documento[]" value="Liquidacion y parte de bienes" id="tipo_documento_9" />Liquidacion y parte de bienes
                                                </label>
                                            </div>
											<div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="tipo_documento[]" value="Otros" id="tipo_documento_10" />Otros
                                                </label>
                                            </div>
                                        </div>
                                        <button id="buscar" type="button" class="btn btn-primary">Buscar</button>
                                        <button type="reset" class="btn btn-default">Reset</button>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
			<div id="mostrar" class="row">
			</div>
			<!-- /.row mostrar -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
	
	<script type="text/javascript">
		$("#buscar").on("click", function (){
			var band = true;
			if($("#dia").val() != "ningun")
			{
				if($("#mes").val() != "ningun")
				{
					var diasMes;
					
					if($("#mes").val() == '2')
					{
						if($("#anyo").val() != 'ningun')
						{
							if( esBisiesto( parseInt( $("#anyo").val() ) ) )
							{
								diasMes = 29;
							}
							else
								diasMes = 28;
						}
						else
							diasMes = 29;
					}
					else
					{
						switch($('#mes').val())
						{
							case '1': diasMes = 31; break;
							case '3': diasMes = 31; break;
							case '4': diasMes = 30; break;
							case '5': diasMes = 31; break;
							case '6': diasMes = 30; break;
							case '7': diasMes = 31; break;
							case '8': diasMes = 31; break;
							case '9': diasMes = 30; break;
							case '10': diasMes = 31; break;
							case '11': diasMes = 30; break;
							case '12': diasMes = 31; break;
						}
					}
					if(parseInt($("#dia").val()) > diasMes)
					{
						$("#errorFecha").empty().html("Debe ingresar una fecha valida");
						band = false;
					}
				}
			}
			if(band == true)
			{
				$.get("procesarc.php?"+$("#form1").serialize(), function(data){
					$("#mostrar").empty().html(data);
				});
				
			}
		});

		function esBisiesto(anyo)
		{
			if((anyo % 4) == 0)
			{
				if((anyo % 100) == 0)
				{
					if((anyo % 400) == 0)
						return true;
					else
						return false;
				}
				else
					return true;
			}
			else
				return false;
		}

		var parroquia = $("#parroquia");
		$("#archiprestazgo").on("change", function(){
			
			parroquia.empty().html("<option value='ningun'>Seleccionar...</option>");
			if( ($("#archiprestazgo").val() != 'ningun') && ($("#archiprestazgo").val() != 'Curea') )
			{
				var listaParros = obtListaParros($("#archiprestazgo").val());
				for(i=0; i<listaParros.length; i++)
				{
					parroquia.append("<option value='"+listaParros[i]+"'>"+listaParros[i]+"</option>");
				}
			}
			
		});
		function obtListaParros(archiprestazgo)
		{
			if(archiprestazgo == "Valencia Centro - Sur")
			{
				lista = ["Catedral", "Divina Pastora", "Candelaria", "Nuestra Señora de Coromoto",
				"San Blas", "San Martin de Porras", "San Miguel Arcangel", "San Pedro y San Pablo",
				"San Rafael", "Santa Rosa de Lima"];
				return lista;
			}
			else
			{
				if(archiprestazgo == "Valencia Centro - Norte")
				{
					lista = ["Corpus Cristi", "Inmaculado Corazon de Maria", "La Ascencion del Señor",
					"La Asuncion y Santa Rita", "La Inmaculada (Camoruco)", "Nuestra Señora de Begoña",
					"Nuestra Señora del Carmen", "La purisima Concepcion y Santo Niño de Praga", "San Antonio",
					"San Jose", "Santa Eduviguis", "Santa Marta"];
					return lista;
				}
				else
				{
					if(archiprestazgo == "Valencia Sur - Este")
					{
						lista = ["Espiritu Santo", "Jesus de Nazareth", "La Milagrosa",
						"La Misericordia del Señor", "Nuestra Señora de Guadalupe", "Sagrado Corazon de Jesus",
						"San Diego de Alcala y de La Candelaria", "Cuasi Parroquia la Transfiguracion del Señor", ,
						"Cuasi Parroquia Santa Ines Martin", "La Resurreccion del Señor"];
						return lista;
					}
					else
					{
						if(archiprestazgo == "Valencia Sur - Oeste")
						{
							lista = ["Jesus, Maria y Jose", "Jesus Obrero", "Sagrada Familia",
							"Nuestra Señora de Las Mercedes", "San Jose de Calazanz", "San Jose Obrero",
							"San Juan Bautista", "San Juan Bosco", "San Juan Maria Vianney",
							"San Pablo Ermitaño", "Santisimo Redentor"];
							return lista;
						}
						else
						{
							if(archiprestazgo == "Carabobo Este")
							{
								lista = ["Cristo Rey", "Divino Niño Jesus", "La Presentacion del Señor",
								"Maria Madre de la Iglesia", "Nuestra Señora del Carmen", "Nuestra Señora del Carmen y Santa Teresita del Niño Jesus",
								"Nuestra Señora de la Medalla Milagrosa", "San Agustin", "San Antonio de Padua", "San Juan Apostol",
								"San Pancracio"];
								return lista;
							}
							else
							{
								if(archiprestazgo == "Carabobo Sur")
								{
									lista = ["Maria Madre del Redentor", "Nuestra Señora de Belen", "Nuestra Señora del Carmen y San Luis",
									"Nuestra Señora del Rosario", "Santos Angeles Custodios y San Isidro", "Cuasi Parroquia El Santo Cristo",
									"Cuasi Parroquia San Jose de Los Naranjos (Vicaria San Jose)"];
									return lista;
								}
								else
								{
									lista = ["La Inmaculada Concepcion", "Nuestra Señora de la Medalla Milagrosa y la San Cruz", "Nuestra Señora del Carmen",
									"Sagrado Corazon de Jesus", "San Jose", "San Rafael"];
									return lista;
								}
							}
						}
					}
				}
			}
		}
		
	</script>

</body>

</html>
