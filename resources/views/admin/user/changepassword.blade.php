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
                                <form id="dataForm" class="form" method="POST"  action="{{ route('apply.store') }}">

                                <div class="row">
                                    
                                   
                                    <div class="mb-3 col-md-4">
                                        <label class="form-label" for="password">New Password</label>
                                        <input type="text" class="form-control" id="password" name="password" placeholder="Enter New Password">
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-4">
                                        <label class="form-label" for="repassword">Re Enter New Password</label>
                                        <input type="text" class="form-control" id="repassword" name="repassword" placeholder="Re Enter New Password">

                                    </div>
                                
								</div>
                                <div class="row">
                                     
                                    <div class="mb-3 col-md-4">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                                </form> 

							</div>
						</div>
					</div>

				</div>
			</main>
          
        



@endsection

