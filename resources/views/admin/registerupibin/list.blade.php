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
								<div class="card-body col-md-4">

                                <form id="dataForm" class="form" method="POST" action="{{ route('register-upi-bin.store') }}">
                                @csrf


                                    <div class="row">
                                        <div class="form-group">
                                            <label>Aggregator <sup class="text-danger">*</sup></label>
                                            <select class="form-control" id="aggregator" name="aggregator">
                                            <option value="2">222222,National Counter</option>
                                            <option value="3">3333,Nepal Bank</option>
                                            </select>
                                         </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group">
                                            <label>Type <sup class="text-danger">*</sup></label>
                                            <select class="form-control" id="type" name="type">
                                            <option value="UPI">UPI-COOP</option>
                                            <option value="Nepal">Nepal</option>
                                            </select>
                                         </div>
                                    </div>

                                    

                                    <div class="row">
                                        <div class="form-group">
                                            <label> Route Bin <sup class="text-danger">*</sup></label>
                                            <input type="number" class="form-control" id="route_bin" name="route_bin" placeholder="Enter Route Bin" />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group">
                                            <label> Bin <sup class="text-danger">*</sup></label>
                                            <input type="number" class="form-control" id="bin" name="bin" placeholder="Enter Bin" />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group">
                                            <label> Name <sup class="text-danger">*</sup></label>
                                            <input type="number" class="form-control" id="name" name="name" placeholder="Enter Name" />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group">
                                            <label> Assigned Date <sup class="text-danger">*</sup></label>
                                            <input type="date" class="form-control" id="assigned_date" name="assigned_date" placeholder="Enter Assigned Date" />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group">
                                            <label> Bank Id <sup class="text-danger">*</sup></label>
                                            <input type="number" class="form-control" id="bank_id" name="bank_id" placeholder="Enter Bank Id" />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group">
                                            <label> Bank Code <sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" id="bank_code" name="bank_code" placeholder="Enter Bank Code" />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group">
                                            <label> Card Program <sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" id="card_program" name="card_program" placeholder="Enter Card Program" />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group">
                                            <label> Account Program <sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" id="account_program" name="account_program" placeholder="Enter Account Program" />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group">
                                            <label> CBS Name <sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" id="cbs_name" name="cbs_name" placeholder="Enter CBS Name" />
                                        </div>
                                    </div>


                                    
                                    <div class="row">
                                        <div class="form-group">
                                            <label> Binary Name <sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" id="binary_name" name="binary_name" placeholder="Enter Binary Name" />
                                        </div>
                                    </div>

                                    

                                    <div class="row">
                                        <div class="form-group">
                                            <label> Card Type <sup class="text-danger">*</sup></label>
                                            <select class="form-control" id="card_type" name="card_type">
                                            <option value="Dual">Dual Interface</option>
                                            <option value="Single">Single Interface</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="form-group">
                                            <label> Status <sup class="text-danger">*</sup></label>
                                            <select class="form-control" id="status" name="status">
                                            <option value="P">Inactive</option>
                                            <option value="Y">Active</option>
                                            </select>
                                        </div>
                                    </div>
									
                                    <br/>

                                    <div class="row">
                                        <div class="form-group">
                                        <button type="submit" id="btnSubmit" class="btn btn-success"><i class="fas fa-save"></i> Submit</button>

                                        </div>
                                    </div>

                                    </form>
                                
								</div>
							</div>
						</div>
					</div>

				</div>
			</main>
          
           


	

@endsection

