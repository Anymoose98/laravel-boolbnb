<!-- Modal -->
  <div class="modal fade" id="modal_project_delete-{{ $apartments->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Conferma eliminazione appartamento</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
  
          <div class="modal-body">
              <h4>Sei sicuro di volere eliminare {{ $apartments->description }}?</h4>
          </div>
  
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary btn-sm btn-square" data-bs-dismiss="modal">Chiudi</button>
              <form id="form_delete" action="{{ route("apartments.destroy", ["apartment" => $apartments->id] )}}" method="post"> 
                  @csrf
                  @method("DELETE")
              <button type="submit" class="btn btn-bg btn-sm btn-square" >  Elimina</button>
  
              </form>
          </div>
          </div>
        </div>
      </div>
    </div>