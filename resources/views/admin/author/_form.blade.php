<div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" value="{{old('name',isset($author)?$author->name:null)}}" class="form-control" id="name" placeholder="Enter author name" required>
    @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="email" value="{{old('email',isset($author)?$author->email:null)}}" class="form-control" id="exampleInputEmail1" placeholder="Enter email" required>
    @error('email')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="phone">Phone</label>
    <input type="text" name="phone" value="{{old('phone',isset($author)?$author->phone:null)}}" class="form-control" id="phone" placeholder="Enter your phone number" required>
    @error('phone')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="address">Address</label>
    <input type="text" name="address" value="{{old('address',isset($author)?$author->address:null)}}" class="form-control" id="address" placeholder="Enter your address" required>
    @error('address')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="photo">Author's Image</label>
    <input type="file" name="photo"  class="form-control" id="photo">
    @error('address')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="status">Status</label>
    <br>
    <input type="radio" name="status" @if(old('status',isset($author)?$author->status:null)=='Active') checked @endif value="Active" id="active">
    <label for="active">Active</label>
    <input type="radio" name="status" @if(old('status',isset($author)?$author->status:null)=='Inactive') checked @endif value="Inactive" id="inactive">
    <label for="inactive">Inactive</label>
</div>
