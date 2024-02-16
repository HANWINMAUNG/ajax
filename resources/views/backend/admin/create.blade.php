@extends('backend.layouts.app')
@section('admin','active')
@section('content')
<main class="content">
				<div class="container-fluid p-0">
					<h1 class="h3 mb-3"><strong>Admin Create Form</strong></h1>
					<div class="py-3 d-flex flex-row-reverse">
						<button class="btn btn-secondary back-btn">Back <i class="align-middle" data-feather="arrow-left"></i></a>
					</div>
                    <div class="">
						<div class="card">
							<div class="card-body">
									<div class = "p-2">
                                        @include('backend.layouts.flash')
										<form action="{{ route('admin-account.store') }}" method="post" id="create" enctype="multipart/form-data">
                                            @csrf
                                            <div class="from-group">
                                                <label for="">Name</label>
                                                <input type="text" name="name" class="form-control">
                                            </div>
                                            <div class="from-group mt-2">
                                                <label for="">Email</label>
                                                <input type="email" name="email" class="form-control">
                                            </div>
                                            <div class="from-group mt-2">
                                                <label for="">Phone</label>
                                                <input type="number" name="phone" class="form-control">
                                            </div>
                                            <div class="from-group mt-2">
                                                <label for="">Password</label>
                                                <input type="password" name="password" class="form-control">
                                            </div>
                                            <div class="from-group mt-2">
                                                    <label for="">Gender</label>
                                                    <select name="gender" class="form-control" >
                                                        <option >Male</option>
                                                        <option>Female</option> 
                                                    </select>
                                            </div>
                                            <div class="from-group mt-2">
                                                    <label for="">Profile</label>
                                                    <input type="file" name="profile" class="form-control">
                                            </div>
                                            <div class="from-group mt-2">
                                                    <label for="">Address</label>
                                                    <textarea  name="address" class="form-control" rows="3"></textarea>
                                            </div>
                                            <div class="d-flex justify-content-center mt-4">
                                                <button class="btn btn-secondary back-btn" style="margin-right:10px;">Cancel</button>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </form>
									</div>
							</div>
						</div>
					</div>				
				</div>
</main> 
@endsection
@push('script')
{!! JsValidator::formRequest('App\Http\Requests\AdminRequest' , '#create') !!}
<script type="text/javascript">
</script>
@endpush