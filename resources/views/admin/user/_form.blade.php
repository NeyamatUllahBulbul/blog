<div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" value="{{old('name',isset($user)?$user->name:null)}}" class="form-control" id="name" placeholder="Enter user name" required>
    @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="email" value="{{old('email',isset($user)?$user->email:null)}}" class="form-control" id="exampleInputEmail1" placeholder="Enter email" required>
    @error('email')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="phone">Phone </label>
    <input type="text" name="phone" value="{{old('phone',isset($user)?$user->phone:null)}}" class="form-control" id="phone" placeholder="Enter your phone number" required>
    @error('phone')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>