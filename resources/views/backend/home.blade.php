@extends('backend.layouts.app')
@section('home','active')
@section('content')
        <main class="content">
				<div class="container-fluid p-0">
					<h1 class="h3 mb-3"><strong>BILLION THEORY M&E ENGINEERING COMPANY LIMITED</strong></h1>
					<div class="row">
						<div class=" d-flex">
							<div class="w-100">
								<div class="row">
									<div class="col-3">
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Admin Total</h5>
													</div>
													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="users"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3">{{ $admin_count }}</h1>
											</div>
										</div>
									</div>
									<div class="col-3">
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Category Total</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="credit-card"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3">{{ $category_count }}</h1>
											</div>
										</div>
									</div>
									<div class="col-3">
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Service Total</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="align-justify"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3">{{ $service_count }}</h1>
											</div>
										</div>
									</div>
									<div class="col-3">
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Project Total</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="align-justify"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3">{{ $project_count }}</h1>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 offset-md-3 ">
							<div class="card">
								<div class="card-body">
                                      <div class="text-center">
										@if(!auth()->user()->profile == '')
											<img src="{{asset('images/' . auth()->user()->profile)}}" alt=""  class="avatar img-fluid rounded-3 me-1" style="width:300px;height:200px;padding:10px;object-fit:contain;">
										@else
											<img src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}" class="avatar img-fluid rounded-3 me-1"  style="width:300px;height:200px;padding:5px;object-fit:contain;" alt="https://ui-avatars.com/api/?" /> <span class="text-dark"></span>
										@endif
										
									  </div>
									  <div class="mt-4">
                                            <div class=""><span style="padding-right:40px;font-size:20px;">Name</span><span><span>-</span> {{auth()->user()->name}}</span></div>
											<div class=""><span style="padding-right:40px;font-size:20px;">Email</span><span><span>-</span>  {{auth()->user()->email}}</span></div>
											<div class=""><span style="padding-right:40px;font-size:20px;">Phone</span><span><span>-</span>  {{auth()->user()->phone}}</span></div>
											<div class=""><span style="padding-right:40px;font-size:20px;">Gender</span><span><span>-</span>  {{auth()->user()->gender}}</span></div>
											<div class=""><span style="padding-right:40px;font-size:20px;">Address</span><span><span>-</span>  {{auth()->user()->address}}</span></div>
                                      </div>
								</div>
							</div>
						</div>
					</div>
				</div>
		</main> 
@endsection