  
  <div id="VentanaModalD" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="my-modal-title"> Desenlazar Pedido</h5>
          <button class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="post" action="<?php echo base_url(); ?>Pedidos/desenlazar" autocomplete="off" class="desenlazar">
          <div class="modal-body">
          <input type="hidden" class="form-control" name="idd" id="idd"  value="" readonly/>   
            <div class="form-group">
              <label for="setting-input-3" class="form-label" style="color:#000000;">No.Contrato y clave</label>              
              <input type="text" class="form-control" name="contratod" id="contratod"  value="" readonly/>                                                        
            </div>
          <div class="card-footer">
              <button class="btn btn-success" type="submit"><i class="fas fa-save"></i> Aceptar</button>
              <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fas fa-window-close"></i> Cancelar</button>
          </div>
        </form>
      </div>
    </div>
  </div>