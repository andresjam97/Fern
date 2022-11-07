<div>
    <div class="modal fade modal-lg" tabindex="-1" aria-hidden="true" {{ $attributes }}>
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="{{$attributes->get('id')}}">{{ $title }}</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              {{$slot}}
            </div>
            <div class="modal-footer">
            </div>
          </div>
        </div>
      </div>
</div>
