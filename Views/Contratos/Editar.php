<?php if($_SESSION['rol'] == 7 ){ ?> <!-- Si es Admin -->
  <?php encabezado() ?> <!-- Poner el header -->

  <div class="app-wrapper">
	  <div class="app-content pt-3 p-md-3 p-lg-4">
	    <div class="container-xl">			    
		    <h1 class="app-page-title">Contratos/Convenios</h1>
		    <hr class="mb-4">
          <div class="row g-4 settings-section">
	          <div class="col-12 col-md-4">
	            <h3 class="section-title">Editar Contrato/Convenio</h3>
	            <div class="section-intro">Favor de llenar toda la información del Contrato o Convenio que desea editar.</div><br>
                <?php if (isset($_GET['msg'])) {
                    $alert = $_GET['msg'];
                    if ($alert == "existe") { ?>
                        <div class="alert alert-warning" role="alert">
	                        <h3 class="section-title">ATENCIÓN</h3>
	                        <div class="section-intro">Ya existe un Contrato con ese número.</div>
                        </div>
                    <?php } else if ($alert == "error") { ?>
                        <div class="alert alert-danger" role="alert">
	                        <h3 class="section-title">ERROR</h3>
	                        <div class="section-intro">No se pudo registrar el Contrato, intente de nuevo o cantacte a soporte.</div>
                        </div>
                    <?php }
                } ?>
	          </div>
	          <div class="col-12 col-md-8">
	            <div class="app-card app-card-settings shadow-sm p-4">
					      <div class="app-card-body">
                  <form id="formulario1" method="POST" action="<?php echo base_url(); ?>Contratos/editarc" autocomplete="off">
                    <div class="mb-3">
                      <label for="numero" class="form-label" style="color:#000000;">Número de Contrato<span class="ml-2" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Ingresar el número del Contrato y/o Convenio tal cual fue registrado en SAI y plasmado en el documento impreso"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" style="color:#FF0000;" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                      <path style="color:#FF0000;" d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>
                      <circle cx="8" cy="4.5" r="1"/>
                      </svg></span></label>
                      <input type="text" class="form-control" id="numero" name="numero" value="<?= $data5['numero'] ?>" readonly>
                    </div>
                    <div class="mb-3">
								      <div class="form-check form-switch" style="padding: 0px;">
                        <label class="form-check-label" style="padding: 0 40px 0 0;">Convenio</label>
										    <input class="form-check-input" type="checkbox" id="contrato" name="contrato" <?php if ($data5['categoria'] == 'Contrato') { echo 'checked';} ?>>
										    <label class="form-check-label" for="contrato">Contrato</label>
									    </div>
                    </div>
                    <div class="mb-3">
                      <label for="descripcion" class="form-label" style="color:#000000;">Descripción del Contrato</label>
                      <textarea class="form-control" name="descripcion" id="descripcion" cols="auto" rows="auto" required><?= $data5['descripcion'] ?></textarea>
                    </div>
                    <div class="mb-3">
                      <label for="area" class="form-label" style="color:#000000;">Area Requirente</label>
                      <select class="form-control" id="area" name="area" required>
                        <?php foreach ($data1 as $area) { ?>
                          <option <?php if ($data5['area'] == $area['area']) { echo 'selected';} ?>> <?php echo $area['area'] ?></option>
                         <?php } ?>
                      </select>
                  </div>
                    <div class="mb-3">
                      <label for="requiriente" class="form-label" style="color:#000000;">Funcionario Requirente</label>
                      <select class="form-control" id="requiriente" name="requiriente" required>
                        <?php foreach ($data4 as $per) { ?>
                          <option <?php if ($data5['requiriente'] == $per['id']) { echo 'selected';} ?> value="<?php echo $per['id']?>"><?php echo $per['nombre'] ?></option>
                         <?php } ?>
                      </select>
                  </div>
                  <div class="mb-3">
                      <label for="tipo" class="form-label" style="color:#000000;">Tipo del Contrato</label>
                      <select class="form-control" id="tipo" name="tipo" required>
                        <?php foreach ($data2 as $tipo) { ?>
                          <option <?php if ($data5['tipo'] == $tipo['tipo']) { echo 'selected';} ?>> <?php echo $tipo['tipo'] ?></option>
                         <?php } ?>
                      </select>
                  </div>
                  <div class="mb-3">
                   <label for="inicio" class="form-label" style="color:#000000;">Inicio</label>
                   <input type="date" class="form-control" id="inicio" name="inicio" value="<?= $data6['inicio'] ?>" required>
                  </div>
                  <div class="mb-3">
                   <label for="date" class="form-label" style="color:#000000;">Término</label>
                   <input type="date" min="<?php echo date('Y-m-d'); ?>" class="form-control" id="termino" name="termino" value="<?= $data5['termino'] ?>" required>
                  </div>
                  <div class="mb-3">
                      <label for="number" class="form-label" style="color:#000000;">Máximo $</label>
                      <input type="number" min="0" class="form-control" id="maximo" name="maximo" value="<?= $data5['maximo'] ?>" required>
                  </div>
                  <div class="mb-3">
                      <label for="numero" class="form-label" style="color:#000000;">No. Fianza<span class="ml-2" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Si el contrato no tiene fianza llenar poniendo 'SIN FIANZA'."><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" style="color:#FF0000;" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                      <path style="color:#FF0000;" d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>
                      <circle cx="8" cy="4.5" r="1"/>
                      </svg></span></label>
                      <input type="text" class="form-control" id="fianza" name="fianza" value="<?= $data5['fianza'] ?>" required>
                  </div>
                  <div class="mb-3">
                    <label for="plataforma" class="form-label" style="color:#000000;">Plataforma de carga</label>
                    <select class="form-control" id="plataforma" name="plataforma" required>
                      <?php foreach ($data3 as $plataforma) { ?>
                        <option <?php if ($data5['plataforma'] == $plataforma['plataforma']) { echo 'selected';} ?>> <?php echo $plataforma['plataforma'] ?></option>
                       <?php } ?>
                    </select>
                  </div>       
                  <div class="mb-3">
                      <label for="regimen" class="form-label" style="color:#000000;">Regimen</label>
                      <input type="text" class="form-control" id="regimen" name="regimen" value="<?= $data6['regimen'] ?>" required>
                  </div>
                  <div class="mb-3">
                      <label for="cuenta" class="form-label" style="color:#000000;">Cuenta</label>
                      <input type="number" min="0" class="form-control" id="cuenta" name="cuenta" value="<?= $data6['cuenta'] ?>" required>
                  </div>
                  <div class="mb-3">
                      <label for="proveedor" class="form-label" style="color:#000000;">Proveedor</label>
                      <input type="text" class="form-control" id="proveedor" name="proveedor" value="<?= $data6['proveedor'] ?>" required>
                  </div>
                  <button type="submit" class="btn app-btn-primary mb-2">Editar Contrato</button>  
                </form>
                <form id="formulario2" action="<?php echo base_url() ?>Contratos/eliminar?contrato=<?php echo $data5['numero']; ?>" method="post" class="d-inline elimper">
                    <button title="Eliminar" type="submit" class="btn btn-secondary mb-2">Eliminar Contrato</button>
                </form> 
					    </div><!--//app-card-body-->
					  </div><!--//app-card-->
	        </div>
        </div><!--//row-->
	    </div><!--//container-fluid-->
	  </div><!--//app-content-->
  </div><!--//app-wrapper-->    
  					
<?php }  else { ?> <!-- En caso de ser valido -->
  <?php permisos() ?> <!-- Poner el mensaje de erro -->
<?php } ?>
<?php pie() ?> <!-- Pone el fotter -->