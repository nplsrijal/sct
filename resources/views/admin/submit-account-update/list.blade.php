@extends('admin.layout.main')
@section('content')

<main class="content">
				<div class="container-fluid p-0">

					

					<div class="row">
						<div class="col-12">
							
							<div class="card">
								<div class="card-header">
									<h5 class="card-title">{{$title}}</h5>
								
									
								</div>
								<div class="card-body">
									<table id="datatables-reponsive" class="table table-striped" style="width:100%">
										<thead>
											<tr>
												<th>Branch</th>
												<th>Card Number</th>
												<th>Old Account (Optional)</th>
												<th>New Account</th>
												<th>New Customer Code</th>
												<th>Customer Name</th>
												<th>Contact No. (Optional)</th>
												<th>Status</th>
												<th>Activation</th>
												<th>Update Details</th>
												<th>User Id</th>
												<th>Submitted Date</th>
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


			


@endsection

