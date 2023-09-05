<?php if($_SESSION['rol'] == 7 || $_SESSION['rol'] == 5 || $_SESSION['rol'] == 1){ ?> <!-- Si es Admin, Almacén u Jefatura -->
    <?php encabezado() ?> <!-- Poner el header -->

        <div class="app-wrapper">
            <div class="app-content pt-3 p-lg-4">
                <div class="container-xl">
                    <div class="position-relative mb-3">
                        <div class="row g-3 justify-content-between">
                            <div class="col-auto">
                                <h1 class="app-page-title mb-0">Unidades Registradas</h1>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content" id="orders-table-tab-content">
                        <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                            <div class="app-card app-card-orders-table shadow-sm mb-4">
                                <div class="app-card-body p-3">
                                    <div class="row">
                                        <div class="col-lg-8 mb-2 py-2">
                                            <!-- <a class="btn btn-success" href="<?php echo base_url(); ?>Despachos/Registro"><i class="fas fa-plus-circle"></i> Nuevo</a> -->
                                            <button class="btn btn-success" type="button" data-toggle="modal" data-target="#modal1"><i class="fas fa-plus-circle"></i> Nuevo</button>
                                        </div>
                                        <div class="col-lg-4">
                                            <?php if (isset($_GET['msg'])) {
                                                $alert = $_GET['msg'];
                                                if ($alert == "existe") { ?>
                                                    <div class="alert alert-warning" role="alert">
                                                        <strong>Ya existe un Despacho con ese número.</strong>
                                                    </div>
                                                <?php } else if ($alert == "error") { ?>
                                                    <div class="alert alert-danger" role="alert">
                                                        <strong>No se pudo registrar el Despacho, intente de nuevo o cantacte a soporte.</strong>
                                                    </div>
                                                <?php } else if ($alert == "registrado") { ?>
                                                    <div class="alert alert-success" role="alert">
                                                        <strong>El despacho se creó con éxito.</strong>
                                                    </div>
                                                <?php } else if ($alert == "eliminado") { ?>
                                                    <div class="alert alert-success" role="alert">
                                                        <strong>El despacho se eliminó con éxito.</strong>
                                                    </div>
                                                <?php } else if ($alert == "modificado") { ?>
                                                    <div class="alert alert-success" role="alert">
                                                        <strong>El despacho se actualizó con éxito.</strong>
                                                    </div>
                                                <?php }
                                            } ?>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table app-table-hover mb-0 text-left" id="Table">
        							        <thead>
                                                <tr>
                                                    <th class="cell" >Destino</th>
                                                    <th class="cell" >No. Remision</th>
                                                    <th class="cell" >ECO</th>
                                                    <th class="cell" >Fecha de Entrega</th>
                                                    <th class="cell" ></th>
                                                    <th class="cell" >Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                              <?php foreach($data2 as $despachos){?>
                                              <tr>
                                                <td><?= $despachos['abreviacion']; ?></td>
                                                <td><span class="badge bg-success"><a class="text-decoration-none text-white" href="<?= base_url().'Assets/Documentos/Despachos/'.$despachos['archivo'];?>" Target="_blank"><?= $despachos['remision'];?></a></span></td>
                                                <td><?= $despachos['eco'];?></td>
                                                <td><?= $despachos['fecha_entrega'];?></td>
                                                <td>
                                                <?php if($despachos['negadas']==0){?>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                                  <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                                                </svg>
                                                <?php }elseif($despachos['negadas']==1){?>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                  <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                </svg>
                                                <?php }?></td>
                                                  <td>
                                                      <a title="Editar" href="<?php echo base_url() ?>Despachos/Editar?id=<?php echo $despachos['id']; ?>" class="btn btn-primary mb-2"><i class="fas fa-edit"></i></a>
                                                      <form id="formulario2" action="<?php echo base_url() ?>Despachos/eliminar?id=<?php echo $despachos['id']; ?>" method="post" class="d-inline elimper">
                                                          <button title="Eliminar" type="submit" class="btn btn-danger mb-2"><i class="fas fa-trash-alt"></i></button>
                                                      </form>            
                                                  </td>
                                              </tr>
                                              <?php }?>
                                            </tbody>
                                        </table>
                                    </div><!--//table-responsive-->
                                </div><!--//app-card-body-->
                            </div><!--//app-card app-card-orders-table shadow-sm mb-5-->
                        </div><!--//tab-pane fade show active-->
                    </div><!--//tab-pane-->
                </div>
            </div>
        </div><!--//app-wrapper-->
                                                
        <div id="modal1" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                     <h5 class="modal-title" id="my-modal-title">Agregar Unidad</h5>
                        <button class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                        </button>
                  </div>
                    <form id="formulario1" method="POST" action="<?php echo base_url(); ?>Despachos/agregar" autocomplete="off" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="mb-3">
                              <label for="numero" class="form-label" style="color:#000000;">Destino<span class="ml-2" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Ingresar la unidad a la que sera entregado el despacho"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" style="color:#FF0000;" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                              <path style="color:#FF0000;" d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>
                              <circle cx="8" cy="4.5" r="1"/>
                              </svg></span></label>
                              <select class="form-control" id="unidad" name="unidad">
                                <?php foreach($data1 as $unidades){?>
                                <option  value="<?=$unidades['id'];?>"><?=$unidades['abreviacion']." - ".$unidades['nombre'];?></option>
                                <?php }?>
                              </select>                      
                            </div>
                                
                            <div class="mb-3">
                            <label class="form-label" style="color:#000000;">¿Contiene Negadas?</label>
                            			<div class="form-check form-switch" style="padding: 0px;">
                                <label class="form-check-label" style="padding: 0 40px 0 0;">NO</label>
	    			    						    <input class="form-check-input" type="checkbox" id="negadas" name="negadas" checked>
	    			    						    <label class="form-check-label" for="contrato">SI</label>
	    			    					    </div>
                            </div>                  
                          <div class="mb-3">
                              <label for="number" class="form-label" style="color:#000000;">Numero de Remision</label>
                              <input type="text"  class="form-control" id="remision" name="remision" value="" required>
                          </div>
                          <div class="mb-3">
                              <label for="eco" class="form-label" style="color:#000000;">ECO</label>
                              <input type="text"  class="form-control" id="eco" name="eco" value="" required>
                          </div>
                                
                          <div class="mb-3">
                           <label for="date" class="form-label" style="color:#000000;">Fecha de Entrega</label>
                           <input type="datetime-local" min="<?php echo date('Y-m-d'); ?>" class="form-control" id="entrega" name="entrega" value="" required>
                          </div>
                                
                        <label for="img" style="color:#000000;"><strong>Selecciona Archivo</strong></label>
                        <div class="custom-file">
                                
                            <input type="file" class="custom-file-input" name="archivo" required>
                            <label class="custom-file-label" for="customFile"></label>
                            <label><br><strong>Nota:</strong> Solo se permiten archivos PDF, con un tamaño máximo de 20MB, en caso de que el archivo no cumpla con alguna de estas indicaciones no se subirá.</label>
                        </div>            
                                                       
                        </div>
                     <div class="card-footer">
                         <button class="btn btn-success" type="submit"><i class="fas fa-save"></i> Agregar</button>
                          <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fas fa-window-close"></i> Cancelar</button>
                     </div>
                    </form>
                </div>
            </div>
        </div>

<?php }  else { ?> <!-- En caso de ser valido -->
  <?php permisos() ?> <!-- Poner el mensaje de erro -->
<?php } ?>
<?php pie() ?> <!-- Pone el fotter -->