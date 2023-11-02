<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $form_title }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="dataForm" class="form" method="POST" action="{{ route('card-status-update.store') }}">
             @csrf
            <div class="modal-body m-3">
            <input type="hidden"  id="id" name="id"  />



               <div class="row">
                 <div class="form-group">
                    <label>Issuing Bin <sup class="text-danger">*</sup></label>
                    <input type="text" class="form-control" id="bin" name="bin" placeholder="Enter Issuing Bin" />
                 </div>
               </div>

             

               <div class="row">
                 <div class="form-group">
                    <label> Card Number <sup class="text-danger">*</sup></label>
                    <input type="number" class="form-control" id="card_number" name="card_number" placeholder="Enter Card Number" />
                 </div>
               </div>

               <div class="row">
                 <div class="form-group">
                    <label> Request Type <sup class="text-danger">*</sup></label>
                    <select class="form-control" id="request_type" name="request_type">
                      <option value="">Accept</option>
                      <option value="">Reject</option>
                    </select>
                 </div>
               </div>

              
           

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-close"></i> Close</button>
                <button type="submit" id="btnSubmit" class="btn btn-success"><i class="fas fa-save"></i> Submit</button>
                @if($access['isupdate']=='Y')
                <button type="submit" id="btnUpdate" class="btn btn-success"><i class="fas fa-save"></i> Update</button>
                @endif
            </div>
            </form>
        </div>
    </div>
</div>