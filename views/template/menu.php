<div class="page-sidebar-wrapper">
		<div class="page-sidebar navbar-collapse collapse">
			<!-- add "navbar-no-scroll" class to disable the scrolling of the sidebar menu -->
			<!-- BEGIN SIDEBAR MENU -->
			<ul class="page-sidebar-menu" data-auto-scroll="true" data-slide-speed="200">
				<li class="sidebar-toggler-wrapper">
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<div class="sidebar-toggler hidden-phone">
					</div>
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
				</li>
				<li class="sidebar-search-wrapper">
					<!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
					<form class="sidebar-search" action="extra_search.html" method="POST">
						<div class="form-container">
							<div class="input-box">
								<a href="javascript:;" class="remove">
								</a>
								<input type="text" placeholder="Buscar..."/>
								<input type="button" class="submit" value=" "/>
							</div>
						</div>
					</form>
					<!-- END RESPONSIVE QUICK SEARCH FORM -->
				</li>
				<?php if ($clase_aciva==1) {
					?>
					<li class="start active ">
						<a href="index.php">
						<i class="fa fa-home"></i>
						<span class="title">
							Inicio
						</span>
						<span class="selected">
						</span>
				<?php
				} else {
					?>
					<li>
						<a href="index.php">
						<i class="fa fa-home"></i>
						<span class="title">
							Inicio
						</span>
						<span class="arow">
						</span>
				<?php	
				}
							
				?>
										</a>
				</li>
				<?php if ($clase_aciva==2) {
					?>
					<li class="start active ">
					<a href="javascript:;">
						<i class="fa fa-calendar"></i>
						<span class="title">
							Horas por proyecto
						</span>
						<span class="selected ">
						
				<?php
				} else {
					?>
					<li>
					<a href="javascript:;">
						<i class="fa fa-calendar"></i>
						<span class="title">
							Horas por proyecto
						</span>
						<span class="arrow ">
				<?php	
				}
							
				?>
					
						</span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="horas_plan.php">
								<i class="fa fa-edit"></i>
								Plan
							</a>
						</li>
						<li>
							<a href="horas_real.php">
								<i class="fa fa-history"></i>
								Real
							</a>
						</li>
						
					</ul>
				</li>
				<?php if ($clase_aciva==3) {
					?>
					<li class="start active ">
				<?php
				} else {
					?>
					<li>
				<?php	
				}
							
				?>
					<a href="javascript:;">
						<i class="fa fa-folder-open"></i>
						<span class="title">
							Gastos por conceptos
						</span>
						<span class="arrow ">
						</span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="javascript:;">
								<i class="fa fa-cogs"></i> Plan
								<span class="arrow">
								</span>
							</a>
							<ul class="sub-menu">
								
								<li>
									<a href="gastos_mat.php">
										<i class="fa fa-external-link"></i> Gastos materiales
									</a>
								</li>
								<li>
									<a href="otros_gastos.php">
										<i class="fa fa-bell"></i> Otros gastos
									</a>
								</li>
							</ul>
						</li>
						
						<li>
							<a href="gastos_real.php">
								<i class="fa fa-folder-open"></i>
								Real
							</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="experimentos.php">
						<i class="fa fa-home"></i>
						<span class="title">
							Experimentos vigentes
						</span>
						<span class="selected">
						</span>
					</a>
				</li>
				<li>
					<a href="cronograma.php">
						<i class="fa fa-sampler"></i>
						<span class="title">
							Cump. de cronogramas
						</span>
						<span class="selected">
						</span>
					</a>
				</li>
				<li>
					<a href="index.html">
						<i class="fa fa-th"></i>
						<span class="title">
							Lotes control
						</span>
						<span class="selected">
						</span>
					</a>
				</li>
				
				<li>
					<a href="reportes.php">
						<i class="fa fa-file-text"></i>
						<span class="title">
							Reportes
						</span>
						<span class="arrow ">
						</span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="table_basic.html">
								 Financiamiento por años
							</a>
						</li>
						<li>
							<a href="reportes.php">
								 Modelos
							</a>
						</li>
						<li>
							<a href="table_managed.html">
								 Presupuesto x provincias
							</a>
						</li>
						<li>
							<a href="table_editable.html">
								 Resumen de horas trab.
							</a>
						</li>
						<li>
							<a href="table_advanced.html">
								 Estimulación devengada
							</a>
						</li>
						
					</ul>
				</li>
				<li>
					<a href="javascript:;">
						<i class="fa fa-table"></i>
						<span class="title">
							Codificadores
						</span>
						<span class="arrow ">
						</span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="../rrhh/index.php" target="_blank">
								 RRHH
							</a>
						</li>
						<li>
							<a href="portlet_ajax.html">
								 Departamentos
							</a>
						</li>
						<li>
							<a href="materiales.php">
								 Materiales
							</a>
						</li>
						<li>
							<a href="portlet_draggable.html">
								 Usuarios
							</a>
						</li>
					</ul>
				</li>
				
				<li class="last ">
					<a href="documentation/index.html">
						<i class="fa fa-book"></i>
						<span class="title">
							Documentación
						</span>
					</a>
				</li>

				
			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
	</div>