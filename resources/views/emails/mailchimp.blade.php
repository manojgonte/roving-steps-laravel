@extends('layouts/frontLayout/front_design')
@section('content')

@section('styles')
<style>
    .list-ticks li {
        width: 100% !important;
        text-indent: -30px;
        margin-left: 30px;
    }
</style>
@endsection('styles')

<h2 class="text-center">MailChimp API Example</h2>
<div class="container">

<!-- @if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
</div>
@endif


@if ($message = Session::get('error'))
<div class="alert alert-danger alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
</div>
@endif -->


	<div class="row">
		<div class="col-md-5">
			<div class="well">
	              {{-- {!! Form::open(array('route' => 'subscribe')) !!} --}}
               <form method="POST" action="{{url('admin/subscribe')}}" >
                @csrf
	              <div>
	              	<h3 class="text-center">Subscribe Your Email</h3>
	                 <input class="form-control" name="email" id="email" type="email" placeholder="Your Email" required>
	                 <br/>
	                 <div class="text-center">
	                 	<button class="btn btn-info btn-lg" type="submit">Subscribe</button>
	                 </div>
	              </div>
                </form>
	             {{-- <!-- {!! Form::close() !!} --> --}}
	    	 </div>
		</div>
		<div class="col-md-7">
			<div class="well well-sm">
          {{-- {!! Form::open(array('route' => 'sendCompaign','class'=>'form-horizontal')) !!} --}}
          <form action="{{url('admin/sendCompaign')}}" class="form-horizontal">
            @csrf
          <fieldset>
            <legend class="text-center">Send Campaign</legend>


            <!-- Name input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="name">Subject</label>
              <div class="col-md-9">
                <input id="name" name="subject" type="text" placeholder="Your Subject" class="form-control">
              </div>
            </div>


            <!-- Email input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="email">To</label>
              <div class="col-md-9">
                <input id="email" name="to_email" type="text" placeholder="To " class="form-control">
              </div>
            </div>


            <!-- From Email input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="email">From</label>
              <div class="col-md-9">
                <input id="email" name="from_email" type="text" placeholder="From " class="form-control">
              </div>
            </div>


            <!-- Message body -->
            <div class="form-group">
              <label class="col-md-3 control-label" for="message">Your message</label>
              <div class="col-md-9">
                <textarea class="form-control" id="message" name="message" placeholder="Please enter your message here..." rows="5"></textarea>
              </div>
            </div>


            <!-- Form actions -->
            <div class="form-group">
              <div class="col-md-12 text-right">
                <button type="submit" class="btn btn-primary btn-lg">Send Campaign</button>
              </div>
            </div>
          </fieldset>
        </form>
          {{-- {!! Form::close() !!} --}}
        </div>
		</div>
	</div>
</div>
@endsection
