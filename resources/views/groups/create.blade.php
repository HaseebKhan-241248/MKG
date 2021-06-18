<div class="modal-dialog" role="document">
    <div class="modal-content">
  <form action="{{ route('group.store') }}" method="POST">
@csrf
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">@lang( 'Add Group' )</h4>
      </div>
  
      <div class="modal-body">
        {{-- <div class="form-group">
          {!! Form::label('code', __( 'Group Code' ) . ':*') !!}
            {!! Form::text('code', null, ['class' => 'form-control', 'required', 'placeholder' => __( 'Group Code' ) ]); !!}
        </div> --}}
  
        <div class="form-group">          
          <label for="title">Group Title</label>
          <input type="text" name="title" class="form-control" value="{{ old('name')}}" required placeholder="Group Title">        
        </div>
        <div class="form-group">            
            <label for="description">Description</label>
            <input type="text" name="description" class="form-control" placeholder="Description" id="description" value="{{old('description') }}">              
          </div>
          <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control select2">
              <option value="">Select One</option>
              <option value="Active">Active</option>
              <option value="Inactive">Inactive</option>
            </select>
          </div>
          <div class="form-group">
            
            <label for="books_groups">Books Group</label>
            <select name="group_books" id="status" class="form-control select2">
              <option value="">Select One</option>
              <option value="Yes">Yes</option>
              <option value="No">No</option>
            </select>
          </div>
  
          {{-- @if($is_repair_installed)
            <div class="form-group">
               <label>
                  {!!Form::checkbox('use_for_repair', 1, false, ['class' => 'input-icheck']) !!}
                  {{ __( 'repair::lang.use_for_repair' )}}
              </label>
              @show_tooltip(__('repair::lang.use_for_repair_help_text'))
            </div>
          @endif --}}
  
      </div>
  
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">@lang( 'messages.close' )</button>
      </div>
    </form>
  
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->