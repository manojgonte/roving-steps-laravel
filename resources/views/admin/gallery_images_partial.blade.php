<div class="row">
    @foreach($galleryImages as $img)
    <label class="col-3 col-md-3 col-lg-3 col-xl-2 custom-radio">
        <input type="radio" name="gallery_image_option" value="{{$img->image}}" onclick="selectGalleryImage('{{$img->image}}')">
        <span class="radio-btn">
            <div class="hobbies-icon">
                <img src="{{asset('img/gallery/'.$img->image)}}">
                <span class="">{{$img->title ?? Str::limit($img->image, 25)}}</span>
            </div>
        </span>
    </label>
    @endforeach
</div>
<div class="pagination-wrapper d-flex justify-content-center gallery-modal-pagination">
    {{ $galleryImages->links("pagination::bootstrap-4") }}
</div>
