<div class="modal fade" id="uploadformModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $form_title }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="dataForm" class="" method="POST" enctype="multipart/form-data" action="{{ route('account-update-bulk.store') }}">
             @csrf
            <div class="modal-body m-3">



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
                    <label> Upload Data <sup class="text-danger">*</sup> <small>(File should be in .csv Format)</small></label>
                    <input type="file" class="form-control" id="file" name="file" />
                 </div>
               </div>


               <div class="row">
                 <div class="form-group">
                   <a href="{{asset('assets/samplefiles/account-update.csv')}}" target="_blank"><small><i class="fas fa-file"></i> Download the sample file here</small></a></label>
                 </div>
               </div>

              
           

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-close"></i> Close</button>
                <button type="submit" id="btnuploadFormSubmit" class="btn btn-success"><i class="fas fa-save"></i> Submit</button>
                
            </div>
            </form>
        </div>
    </div>
</div>