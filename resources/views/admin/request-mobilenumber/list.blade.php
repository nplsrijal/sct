@extends('admin.layout.main')
@section('content')

<main class="content">
				<div class="container-fluid p-0">

					

					<div class="row">
						<div class="col-12">
							
							<div class="card">
								<div class="card-header">
									<h5 class="card-title">{{$title}}</h5>
									<h6 class="card-subtitle text-muted">
									@if($access['isinsert']=='Y')

										<a href="javascript:void(0)" style="float:right" id="addData"><i class="fas fa-plus"></i> Request Mobile Number </a>
									@endif
									</h6>
									
								</div>
								<div class="card-body">
									<table id="datatables-reponsive" class="table table-striped" style="width:100%">
										<thead>
											<tr>
												<th>Issuing Bin</th>
												<th>Branch</th>
												<th>Card Number</th>
												<th>Mobile Number</th>
												<th>Customer Name</th>
												<th>Email</th>
												<th>Submitted By</th>
												<th>Submitted Date</th>
												<th>Status</th>
												<th>Action</th>
												
											</tr>
										</thead>
										<tbody>
											
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>

				</div>
			</main>
          
           
            <script src="{{ asset('assets/js/admin/datatables.js') }}"></script>


			
<!-- modal call -->
@include($folder.'.form_modal')		


@endsection
