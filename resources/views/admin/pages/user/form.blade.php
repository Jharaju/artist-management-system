<!-- Modal -->
@if(isset($update))
@php
$show = "show";
@endphp
@else
@php
$show = "";
@endphp
@endif
<div class="modal fade {{$show}}" id="formModal" role="dialog" style="width:100%; height:100vh; min-height:100%; overflow:scroll;" >
			<div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
                        <h5>Add Carousel Items</h5>
						<button type="button" class="close"
								data-dismiss="modal">
							×
						</button>

					</div>
					<div class="modal-body">
                        <div class="">
                                 <form method="POST" action="{{ isset($update) ? route('user.update', $update->id) : route('user.store') }}" encType="multipart/form-data">
                                        @csrf
                                        @if(isset($update))
                                        @method('PUT')
                                        @endif
                                        
                                            
                                        <div class="form-group">
            <i class="fa-solid fa-user"></i>
            <label for="first_name">First Name:</label>
            <input type="text" class="form-control" name="first_name" id="first_name" value="{{ isset($update) ? $update->first_name : '' }}">
            @error('first_name')
            <p class="alert alert-danger">{{$message}}</p>
            @enderror
          </div>

          <div class="form-group">
            <i class="fa-solid fa-user"></i>
            <label for="last_name">Last Name:</label>
            <input type="text" class="form-control" name="last_name" id="last_name" value="{{isset($update) ? $update->last_name : ''}}">
            @error('last_name')
            <p class="alert alert-danger">{{$message}}</p>
            @enderror
          </div>

          <div class="form-group">
            <i class="fa-solid fa-user"></i>
            <label for="email">Email:</label>
            <input type="email" class="form-control" name="email" id="email" value="{{isset($update) ? $update->email : ''}}">
            @error('email')
            <p class="alert alert-danger">{{$message}}</p>
            @enderror
          </div>

          <div class="form-group">
            <i class="fa-solid fa-lock"></i>
            <label for="pwd">Password:</label>
            <input type="text" class="form-control" name="password" id="pwd" value="{{isset($update) ? 'update password manually !' : ''}}">
            @error('password')
            <p class="alert alert-danger">{{$message}}</p>
            @enderror
          </div>

          <div class="form-group">
            <i class="fa-solid fa-lock"></i>
            <label for="pwd_conf">Confirm Password:</label>
            <input type="password" class="form-control" name="password_confirmation" id="pwd_conf" required>
            @error('password_confirmmation')
            <p class="alert alert-danger">{{$message}}</p>
            @enderror
          </div>

          <div class="form-group">
            <i class="fa-solid fa-user"></i>
            <label for="phone">Phone:</label>
            <input type="text" class="form-control" name="phone" id="phone" value="{{isset($update) ? $update->phone : ''}}">
            @error('phone')
            <p class="alert alert-danger">{{$message}}</p>
            @enderror
          </div>

          <div class="form-group">
            <i class="fa-solid fa-user"></i>
            <label for="dob">Date Of Birth:</label>
            <input type="datetime-local" class="form-control" name="dob" id="dob" value="{{isset($update) ? $update->dob : ''}}">
            @error('dob')
            <p class="alert alert-danger">{{$message}}</p>
            @enderror
          </div>

          <div class="form-group">
            <i class="fa-solid fa-user"></i>
            <label for="">Gender:</label>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="gender" value="m" id="gender1" {{isset($update) && $update->gender == 'm' ? 'checked' : ''}}>
              <label class="form-check-label" for="gender1">
                Male
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="gender" value="f" id="gender2" {{isset($update) && $update->gender == 'f' ? 'checked' : ''}}>
              <label class="form-check-label" for="gender2">
                Female
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="gender" value="o" id="gender3" {{isset($update) && $update->gender == 'o' ? 'checked' : ''}}>
              <label class="form-check-label" for="gender3">
                Other
              </label>
            </div>
            @error('gender')
            <p class="alert alert-danger">{{$message}}</p>
            @enderror
          </div>

          <div class="form-group">
            <i class="fa-solid fa-user"></i>
            <label for="address">Address</label>
            <input type="text" class="form-control" name="address" id="address" value="{{isset($update) ? $update->address : ''}}">
            @error('address')
            <p class="alert alert-danger">{{$message}}</p>
            @enderror
          </div>
                                        
                        
                                         <div class="col-lg-12">
                                             <button type="submit" class="btn btn-primary float-right mt-2"><i class="fa fa-check"></i>
                                                 Save</button>
                                         </div>
                        
                                    </form>
                        
                           

                                    </div>
                         
                         </div>
                         <div class="modal-footer">
                            
                         </div>
                     </div>
                 </div>
             </div>

<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>