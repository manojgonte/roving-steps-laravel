<div class="row">
    @forelse($photos as $row)
    <div class="col-4 col-md-3 col-lg-2 col-xl-2 mt-4 card p-2 m-1">
        <a href="{{asset('img/gallery/'.$row->image)}}" target="_blank">
        <img src="{{asset('img/gallery/'.$row->image)}}" class="img-fluid mb-1" style="height: 150px; width:100%; object-fit: cover;" alt="img"/>
        </a>
        <span>{{$row->title ?? ''}}</span>
        <div class="d-flex justify-content-center">
            <a class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#editPhoto" onclick="getId({{$row->id}},'{{$row->title}}')"><i class="fa fa-edit"></i></a> &nbsp;
            <a class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure?')" href="{{url('admin/delete-photo/'.$row->id)}}"><i class="fa fa-trash"></i></a>
        </div>
    </div>
    @empty
    <div class="col-12 text-center text-muted py-4">
        <h5>No images found</h5>
    </div>
    @endforelse
</div>
<div class="mt-2 d-flex justify-content-center">
    {{ $photos->appends(['search' => request('search')])->links("pagination::bootstrap-4") }}
</div>
