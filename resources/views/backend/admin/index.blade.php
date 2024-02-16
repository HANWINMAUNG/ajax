@extends('backend.layouts.app')
@section('admin','active')
@section('content')
<main class="content">
				<div class="container-fluid p-0">
					<h1 class="h3 mb-3"><strong>User Create Form</strong></h1>
                    <div class="">
						<div class="card">
							<div class="card-body">
									<div class = "p-2">
                                        @include('backend.layouts.flash')
										<form id="contact_us" method="post" action="javascript:void(0)">
										@csrf
										<div class="form-group">
											<label for="formGroupExampleInput">Name</label>
											<input type="text" name="name" class="form-control" id="formGroupExampleInput" placeholder="Please enter name">
											<span class="text-danger">{{ $errors->first('name') }}</span>
										</div>
										<div class="form-group">
											<label for="email">Email Id</label>
											<input type="text" name="email" class="form-control" id="email" placeholder="Please enter email id">
											<span class="text-danger">{{ $errors->first('email') }}</span>
										</div>      
										<div class="form-group">
											<label for="mobile_number">Mobile Number</label>
											<input type="text" name="phone" class="form-control" id="mobile_number" placeholder="Please enter mobile number" maxlength="10">
											<span class="text-danger">{{ $errors->first('phone') }}</span>
										</div>
										<div class="alert alert-success d-none" id="msg_div">
												<span id="res_message"></span>
										</div>
										<div class="form-group mt-3">
										<button type="submit" id="send_form" class="btn btn-success">Submit</button>
										</div>
										</form>
									</div>
							</div>
						</div>
					</div>				
				</div>
</main> 
<main class="content">
				<div class="container-fluid p-0">
					<h1 class="h3 mb-3"><strong>User Table</strong></h1>
					<div class="py-3 d-flex flex-row-reverse">
						
					</div>
                    <div class="">
						<div class="card">
							<div class="card-body">
									<div class = "p-2">
										<table class = "table table-hover" id="data-table" style="width:100%;">
											<thead>
												<tr>
												    <th style="">No</th>
													<th style="">Name</th>
													<th style="">Email</th>
													<th style="">Phone</th>
													<th style="">Joined Date</th>
													<th style="">Updated Date</th>										
												</tr>
											</thead>
											<tbody class = "">
											</tbody>
										</table>
									</div>
							</div>
						</div>
					</div>				
				</div>
</main> 
@endsection
@push('script')
<script type="text/javascript">

		$(function () {

		var table = new DataTable('#data-table',{
			
			scrollX: true,

			processing: true,

			serverSide: true,

			ajax: "{{ route('user.index') }}",

			columns: [

				{data: 'id', name: 'id',class:'text-center'},

				{data: 'name', name: 'name',class:'text-center'},

				{data: 'email', name: 'email',class:'text-center'},

				{data: 'phone', name: 'phone',class:'text-center'},

				{data: 'created_at', name: 'created_at',class:'text-center',searchable: false,sortable:false},

				{data: 'updated_at', name: 'updated_at',class:'text-center',searchable: false,sortable:false},
				
			]
		}); 
		});
		if ($("#contact_us").length > 0) {
    $("#contact_us").validate({
      
    rules: {
      name: {
        required: true,
        maxlength: 50
      },
  
       mobile_number: {
            required: true,
            digits:true,
            minlength: 10,
            maxlength:12,
        },
        email: {
                required: true,
                maxlength: 50,
                email: true,
            },    
    },
    messages: {
        
      name: {
        required: "Please enter name",
        maxlength: "Your last name maxlength should be 50 characters long."
      },
      mobile_number: {
        required: "Please enter contact number",
        digits: "Please enter only numbers",
        minlength: "The contact number should be 10 digits",
        maxlength: "The contact number should be 12 digits",
      },
      email: {
          required: "Please enter valid email",
          email: "Please enter valid email",
          maxlength: "The email name should less than or equal to 50 characters",
        },
         
    },
    submitHandler: function(form) {
     $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      $('#send_form').html('Sending..');
      $.ajax({
        url: 'http://localhost/save-form' ,
        type: "POST",
        data: $('#contact_us').serialize(),
        success: function( response ) {
            $('#send_form').html('Submit');
            $('#res_message').show();
            $('#res_message').html(response.msg);
            $('#msg_div').removeClass('d-none');
 
            document.getElementById("contact_us").reset(); 
            setTimeout(function(){
            $('#res_message').hide();
            $('#msg_div').hide();
            },10000);
        }
      });
    }
  })
}
</script>
@endpush