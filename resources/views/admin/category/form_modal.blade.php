<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $form_title }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="dataForm" class="form" method="POST" enctype="multipart/form-data" action="{{ route('category.store') }}">
            <div class="modal-body m-3">
            <input type="hidden"  id="id" name="id"  />



               <div class="row">
                 <div class="form-group">
                    <label>Category Name <sup class="text-danger">*</sup></label>
                    <input type="text" class="form-control" id="categoryname" name="categoryname" placeholder="Enter Category Name" />
                 </div>
               </div>
              

               <div class="row">
                 <div class="form-group">
                    <label>Orderby <sup class="text-danger">*</sup></label>
                    <input type="number" class="form-control" id="orderby" name="orderby" placeholder="Enter Ordering" />
                 </div>
               </div>

           
               <div class="row">
                 <div class="form-group">
                    <label>Image <sup class="text-danger">*</sup></label>
                    <input type="file" class="form-control" id="categoryimage" name="categoryimage" placeholder="Enter Icon code" value="fas fa-"/>
                 </div>
               </div>

               <div class="row imagediv d-none">
                 <div class="form-group">
                  <label></label>
                  <img src="" id="imagereader"  style="width:50%"/>
                 </div>
               </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-close"></i> Close</button>
                <button type="submit" id="btnSubmit" class="btn btn-success"><i class="fas fa-save"></i> Submit</button>
                <button type="submit" id="btnUpdate" class="btn btn-success"><i class="fas fa-save"></i> Update</button>
            </div>
            </form>
        </div>
    </div>
</div>