<div class="form-group">
    <label for="category">Category</label>
    <select class="form-control" name="category_id" id="category">
        <option value="">Select</option>
        @foreach($categories as $id=>$category)
            <option value="{{$id}} " @if(old('category_id',isset($post)?$post->category_id:null)==$id) selected @endif>{{$category}}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="author">Author</label>
    <select class="form-control" name="author_id" id="author">
        <option value="">Select</option>
        @foreach($authors as $id=>$author)
            <option value="{{$id}}"@if(old('author_id',isset($post)?$post->author_id:null)==$id) selected @endif>{{$author}}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="title">Title</label>
    <input type="text" name="title" value="{{old('title',isset($post)?$post->title:null)}}" class="form-control" id="title" placeholder="Enter post title" >
    @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="details">Details</label>
    <textarea class="form-control" placeholder="Write post details" name="details" id="details" cols="30" rows="10">{{old('details',isset($post)?$post->details:null)}}</textarea>
    @error('details')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="photo">Image</label>
    <br>
    <input type="file" name="photo" id="photo">
    @error('photo')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="is_featured">Is Featured?</label>
    <input type="checkbox" name="is_featured" @if(old('is_featured',isset($post)?$post->is_featured:null)==1) checked @endif value="1" id="is_featured">
    <label for="is_featured">Yes</label>
    @error('is_featured')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="status">Status</label>
    <br>
    <input type="radio" name="status" @if(old('status',isset($post)?$post->status:null)=='Published') checked @endif value="Published" id="published">
    <label for="published">Published</label>
    <input type="radio" name="status" @if(old('status',isset($post)?$post->status:null)=='Unpublished') checked @endif value="Unpublished" id="unpublished">
    <label for="unpublished">Unpublished</label>
</div>
@error('status')
<div class="alert alert-danger">{{ $message }}</div>
@enderror