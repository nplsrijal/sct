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
												<th>Issuing Bin</th>
												<th>Card Number</th>
												<th>Request Type</th>
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


			


@endsection

