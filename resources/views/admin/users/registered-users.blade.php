@extends('layouts/adminLayout/admin_design')
@section('content')

<div class="content-wrapper">
    <section class="content-header pb-0">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4>Registered Users <span class="badge badge-dark">{{$users->total()}}</span></h4>
                </div>
                <div class="col-sm-6 text-right">
                    <div class="d-flex justify-content-end">
                        <button type="button" data-toggle="modal" data-target="#userImportModal" class="btn btn-default mx-2"><i class="fa fa-file-import"></i> Import Users</button>
                        <a href="{{ url('/admin/add-user') }}" class="btn btn-dark"><i class="fa fa-plus-circle"></i> Create User</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                	@if(Session::has('flash_message_error'))
		            <div class="alert alert-danger alert-block">
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

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="card">
                        <div class="card-header">
                            <form action="" method="GET">
                                <div class="row d-flex justify-content-start">
                                    <div class="col-auto">
                                        <!-- <label></label> -->
                                        <select class="form-control form-control-sm select2bs4" name="event" onchange="this.form.submit()">
                                            <option value="">Select Event</option>
                                            <option value="dob_4" @if(Request()->event == 'dob_4') selected @endif>Upcoming Birthday</option>
                                            <option value="anniversary_4" @if(Request()->event == 'anniversary_4') selected @endif>Upcoming Anniversary </option>
                                        </select>
                                    </div>
                                    <div class="col-auto">
                                        <input class="form-control form-control-sm" name="q" placeholder="Search..." value="@if(!empty(Request()->q)) {{Request()->q}} @endif">
                                    </div>
                                    <div class="col-auto">
                                        <button type="submit" class="btn btn-default btn-sm"> Submit</button>
                                    </div>
                                    <div class="col-auto">
                                        <a href="{{url('admin/registered-users/')}}" class="btn btn-default btn-sm"> Clear</a>
                                    </div>
                                    <div class="col-auto">
                                        <a href="{{ url('admin/users-export?event='.Request()->event.'&search='.Request()->search) }}" class="btn btn-sm btn-light border"><i class="fa fa-file-excel"></i> Download</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped" style="overflow-x: auto;">
                                <thead>
                                    <tr>
                                        <th>User ID</th>
                                        <th class="text-left">User Details</th>
                                        <th class="text-left">Date</th>
                                        <th class="text-left">Passport Due</th>
                                        <th class="text-left">Visa Type & Due</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if(count($users) > 0)
                                @foreach($users as $row)
	                                <tr>
	                                    <td class="align-middle"><a href="{{ url('admin/user/'.$row->id) }}" class="btn btn-link btn-sm">{{ $row->id }}</a></td>
                                        <td class="text-left align-middle">
                                            <i class="fa fa-user"></i>&nbsp;&nbsp; {{ Str::limit($row->name, 30) }} <br> 
                                            <i class="fa fa-envelope"></i>&nbsp;&nbsp; {{ $row->email ?? 'NA' }} <br> 
                                            <i class="fa fa-phone"></i>&nbsp;&nbsp; {{ $row->contact ?? 'NA' }}<br> 
                                            <!-- @if($row->address)<i class="fa fa-city" title="{{$row->address}}"></i>&nbsp; {{ Str::limit($row->address, 25) }} @endif -->
                                        </td>
	                                    <td class="text-left align-middle">
                                            <i class="fa fa-birthday-cake"></i>&nbsp; DOB: {{ $row->dob ? date('d M Y', strtotime($row->dob)) : 'NA' }} <br>
                                            <i class="fa fa-birthday-cake"></i>&nbsp; Anniversary: {{ $row->anniversary_date ? date('d M Y', strtotime($row->anniversary_date)) : 'NA' }} <br>
                                        </td>
	                                    <td class="text-left align-middle">
                                            <span style="{{expiryColor($row->passport_expiry)}}"><i class="fa fa-calendar-times"></i>&nbsp; {{ $row->passport_expiry ? date('d M Y', strtotime($row->passport_expiry)) : 'NA' }}</span>
                                        </td>
                                        <td class="text-left align-middle">
                                            <i class="fa fa-plane-departure"></i>&nbsp; {{ $row->visa_type ? Str::limit(ucfirst($row->visa_type), 30) : 'NA' }} <br>
                                            <span style="{{expiryColor($row->visa_expiry)}}"><i class="fa fa-calendar-times"></i>&nbsp;&nbsp;&nbsp; {{ $row->visa_expiry ? date('d M Y', strtotime($row->visa_expiry)) : 'NA' }}</span>
                                        </td>
                                        <td class="align-middle">
                                            <a class="btn btn-outline-dark btn-sm" title="Create Enquiry" href="{{ url('/admin/tour-enquiries?user_id='.$row->id) }}"><i class="fa fa-comment"></i></a>
                                            <a class="btn btn-outline-dark btn-sm" href="{{ url('/admin/edit-user/'.$row->id) }}"><i class="fa fa-pencil-alt"></i></a>
                                            <a class="btn btn-outline-dark btn-sm" onclick="return confirm('Are you sure? All user data will be deleted.')" href="{{ url('/admin/delete-user/'.$row->id) }}"><i class="fa fa-trash"></i></a>
                                        </td>
	                                </tr>
                                @endforeach
                                @else
                                <tr><td colspan="6">No data found</td></tr>
                                @endif
                                </tbody>
                            </table>
                            <div class="mt-2 d-flex justify-content-center">
                                {{ $users->links("pagination::bootstrap-4") }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<!-- user import Modal -->
<div class="modal fade" id="userImportModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="importModalLabel">Import Users</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('admin/users-import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <h6><b>Step I :</b> Download <a class="text-decoration-underline" href="{{ url('users-import-template.xlsx') }}" download><u>users-import-template.xlsx</u></a> file</h6>
                    <h6><b>Step II:</b> Open file and enter customer details. <br>- <i>Customer Name</i> is mandatory field and others are optinal. <br>- Date format must be YYYY-MM-DD.<br>- Phone numbers must be 10 digits only.<br>- If specific data not available keep the cell <i>empty</i>.</h6>
                    <h6><b>Step III:</b> Upload users-import-template.xlsx file and wait till file upload completely.</h6>

                    <hr>
                    <div class="form-group mt">
                        <label class="font-weight-bold" for="import_file">Upload file</label>
                        <input class="form-control p-1" type="file" name="import_file" id="import_file" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-dark"><i class="fa fa-file-upload"></i> Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection