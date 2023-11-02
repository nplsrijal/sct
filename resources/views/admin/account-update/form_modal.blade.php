<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $form_title }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="dataForm" class="form" method="POST" action="{{ route('account-update.store') }}">
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
                    <label> Branch Code <sup class="text-danger">*</sup></label>
                    <input type="text" class="form-control" id="branch" name="branch" placeholder="Enter Branch Code" />
                 </div>
               </div>

               <div class="row">
                 <div class="form-group">
                    <label> </label>
                    With Activation: <input type="checkbox" id="isactivate" name="isactivate" />
                    Update Details: <input type="checkbox"  id="isupdatedetails" name="isupdatedetails" />
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
                    <label> Old Account (Optional) </label>
                    <input type="number" class="form-control" id="old_account" name="old_account" placeholder="Enter Old Account" />
                 </div>
               </div>

               <div class="row">
                 <div class="form-group">
                    <label> New Account <sup class="text-danger">*</sup></label>
                    <input type="text" class="form-control" id="new_account" name="new_account" placeholder="Enter New Account" />
                 </div>
               </div>

               <div class="row">
                 <div class="form-group">
                    <label> New Customer Code <sup class="text-danger">*</sup></label>
                    <input type="text" class="form-control" id="new_customer_code" name="new_customer_code" placeholder="Enter New customer Code" />
                 </div>
               </div>

               <div class="row">
                 <div class="form-group">
                    <label> Customer Name <sup class="text-danger">*</sup></label>
                    <input type="text" class="form-control" id="customer_name" name="customer_name" placeholder="Enter customer Name" />
                 </div>
               </div>

               <div class="row">
                 <div class="form-group">
                    <label> Contact Number (Optional) <sup class="text-danger">*</sup></label>
                    <input type="text" class="form-control" id="contact_number" name="contact_number" placeholder="Enter Contact Number" />
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