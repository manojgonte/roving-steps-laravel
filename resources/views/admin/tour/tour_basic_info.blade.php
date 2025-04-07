<div class="row">
    <div class="col-md-6">
        <div class="card-body border-right">
            <dl class="row">
                <dt class="col-sm-3">Tour ID</dt>
                <dd class="col-sm-9">{{$tour->id}}</dd>
                <dt class="col-sm-3">Tour Name</dt>
                <dd class="col-sm-9">{{$tour->tour_name}}</dd>
                <dt class="col-sm-3">Destination</dt>
                <dd class="col-sm-9">{{$tour->dest_name}}</dd>
                <dt class="col-sm-3">Tour Type</dt>
                <dd class="col-sm-9">{{$tour->type}}</dd>
                <dt class="col-sm-3">Special Tour</dt>
                <dd class="col-sm-9">{{ ($tour->special_tour) ?  $tour->special_tour : 'NA'}}</dd>
                <dt class="col-sm-3">Price/Adult</dt>
                <dd class="col-sm-9">₹{{number_format($tour->adult_price)}}</dd>
                <dt class="col-sm-3">Child/Price</dt>
                <dd class="col-sm-9">{{ ($tour->child_price) ?  '₹'.number_format($tour->child_price) : 'NA'}}</dd>
                <dt class="col-sm-3">Tour Date</dt>
                <dd class="col-sm-9">@if(!empty($tour->from_date) || !empty($tour->from_date)) {{date('d/m/Y', strtotime($tour->from_date))}} - {{date('d/m/Y', strtotime($tour->end_date))}} @else NA @endif</dd>
                <dt class="col-sm-3">Duration</dt>
                <dd class="col-sm-9">{{$tour->days}}D - {{$tour->nights}}N</dd>
                <dt class="col-sm-3">Star Ratings</dt>
                <dd class="col-sm-9">{{$tour->rating}} Star</dd>
            </dl>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card-body">
            <dl class="row">
                <dt class="col-sm-2">Overview</dt>
                <dd class="col-sm-10">{{$tour->description ?? '-'}}</dd>
            </dl>
        </div>
    </div>
</div>