<div class="gallery-search-wrapper mb-3">
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fa fa-search"></i></span>
        </div>
        <input type="text" id="gallery-search-input" class="form-control" placeholder="Search images by title or filename..." value="{{ request('search') }}" autocomplete="off">
    </div>
</div>
<div id="gallery-grid">
    <div class="row">
        @forelse($galleryImages as $img)
        <label class="col-3 col-md-3 col-lg-3 col-xl-2 custom-radio">
            <input type="radio" name="gallery_image_option" value="{{$img->image}}" onclick="selectGalleryImage('{{$img->image}}')">
            <span class="radio-btn">
                <div class="hobbies-icon">
                    <img src="{{asset('img/gallery/'.$img->image)}}">
                    <span class="">{{$img->title ?? Str::limit($img->image, 25)}}</span>
                </div>
            </span>
        </label>
        @empty
        <div class="col-12 text-center text-muted py-4">No images found.</div>
        @endforelse
    </div>
    <div class="pagination-wrapper d-flex justify-content-center gallery-modal-pagination">
        {{ $galleryImages->appends(['search' => request('search')])->links("pagination::bootstrap-4") }}
    </div>
</div>
