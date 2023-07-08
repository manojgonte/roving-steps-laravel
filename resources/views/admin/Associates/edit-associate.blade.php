@extends('layouts/adminLayout/admin_design')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h4>Edit associates Section</h4>
                    @if(Session::has('flash_message_error'))
                    <div class="alert alert-error alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{!! session('flash_message_error') !!}</strong>
                    </div>
                    @endif
                    @if(Session::has('flash_message_success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{!! session('flash_message_success') !!}</strong>
                    </div>
                    @endif
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/admin/dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Associates Section</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-default">
                        <form method="POST" action="{{ url('admin/edit-associate'.$associate->id) }}" enctype="multipart/form-data" id="editAssociate">@csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-4">
            	                        <label class="required">Associates Name</label>
            	                        <input type="text" name="associates_name" class="form-control" placeholder="Enter Associates Name"  value="{{ $associate->name }}">
                          	        </div>
                                    <div class="form-group col-md-4">
            	                        <label class="required">Associates Email</label>
            	                        <input type="email" name="associates_email" class="form-control" placeholder="Enter Associates Email"  value="{{ $associate->email }}">
                          	        </div>
                                    <div class="form-group col-md-4">
            	                        <label class="required">Associates Contact</label>
            	                        <input type="text" name="associates_contact" class="form-control" placeholder="Enter Associates Contact"  value="{{ $associate->contact }}">
                          	        </div>
                                    {{-- <div class="form-group col-md-2">
                                        <label class="required">Tour List</label>
                                        <select class="form-control select2bs4" name="dest_id" required>
                                            <option value="" selected>Select One</option>
                                            @foreach(App\Models\Tour::select('tour_enquiry.*','tours.id as tour_id','tours.tour_name')->orderBy('tour_name','ASC')->get() as $row)
                                            <option value="{{$row->id}}">{{$row->tour_name}}</option>
                                            @endforeach
                                        </select>
                                    </div> --}}
                                </div>
                            </div>
                            <div class="card-footer ">
                                <button type="submit" class="btn btn-warning text-white submit"><i class="fa fa-check-circle"></i> Edit </button>
                                <button type="reset" class="btn btn-default"> Reset </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script src="{{ asset('backend_plugins/jquery/jquery.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#editAssociate').validate({
            ignore: [],
            debug: false,
            rules: {

            },
            messages: {},
            submitHandler: function(form) {
                $(".submit").attr("disabled", true);
                $(".submit").html("<span class='fa fa-spinner fa-spin'></span> Please wait...");
                form.submit();
            }
        });
    });
</script>
@endsection