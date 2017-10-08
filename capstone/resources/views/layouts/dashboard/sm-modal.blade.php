<div class="modal fade bd-example-modal-sm no" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="{{ $id }}">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
    	<div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{ $title }}</h5>
        <button type="button" class="close no" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{ $modalBody }}      			
      </div>
    </div>
  </div>
</div>