<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="{{asset('css/regis.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/cdc3149703.js" crossorigin="anonymous"></script>
  </head>
  <body>
    <div class="container" id="container" >
      <!-- <div class="image">
        <img src="{{asset('images/login1.jpg')}}" alt="IMG.." width=100 height=100> 
      </div> -->
      <form action="{{ route('register.post') }}" method="POST">
         @csrf
        <div class="login-container card mt-5 col-lg-8" style="width: 40%; height:100%; min-height:900px;" >
        <h3>
          <div class="card-header mt-5">Register Here...</div>
        </h3>
        <div class="card-body" >
          
        <div class="form-group">
            <i class="fa-solid fa-user"></i>
            <label for="first_name">First Name:</label>
            <input type="text" class="form-control" name="first_name" id="first_name">
            @error('first_name')
            <p class="alert alert-danger">{{$message}}</p>
            @enderror
          </div>

          <div class="form-group">
            <i class="fa-solid fa-user"></i>
            <label for="last_name">Last Name:</label>
            <input type="text" class="form-control" name="last_name" id="last_name">
            @error('last_name')
            <p class="alert alert-danger">{{$message}}</p>
            @enderror
          </div>

          <div class="form-group">
            <i class="fa-solid fa-user"></i>
            <label for="email">Email:</label>
            <input type="email" class="form-control" name="email" id="email">
            @error('email')
            <p class="alert alert-danger">{{$message}}</p>
            @enderror
          </div>

          <div class="form-group">
            <i class="fa-solid fa-lock"></i>
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" name="password" id="pwd">
            @error('password')
            <p class="alert alert-danger">{{$message}}</p>
            @enderror
          </div>

          <div class="form-group">
            <i class="fa-solid fa-lock"></i>
            <label for="pwd_conf">Confirm Password:</label>
            <input type="password" class="form-control" name="password_confirmation" id="pwd_conf">
            @error('password_confirmmation')
            <p class="alert alert-danger">{{$message}}</p>
            @enderror
          </div>

          <div class="form-group">
            <i class="fa-solid fa-user"></i>
            <label for="phone">Phone:</label>
            <input type="text" class="form-control" name="phone" id="phone">
            @error('phone')
            <p class="alert alert-danger">{{$message}}</p>
            @enderror
          </div>

          <div class="form-group">
            <i class="fa-solid fa-user"></i>
            <label for="dob">Date Of Birth:</label>
            <input type="datetime-local" class="form-control" name="dob" id="dob">
            @error('dob')
            <p class="alert alert-danger">{{$message}}</p>
            @enderror
          </div>

          <div class="form-group">
            <i class="fa-solid fa-user"></i>
            <label for="">Gender:</label>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="gender" value="m" id="gender1">
              <label class="form-check-label" for="gender1">
                Male
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="gender" value="f" id="gender2">
              <label class="form-check-label" for="gender2">
                Female
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="gender" value="o" id="gender3">
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
            <input type="text" class="form-control" name="address" id="address">
            @error('address')
            <p class="alert alert-danger">{{$message}}</p>
            @enderror
          </div>
          <!-- <div class="checkbox">
            <label><input type="checkbox" name="remember"> Remember me</label>
            <a href="#">Forget Password?</a>
          </div> -->
          <button type="submit" class="btn btn-primary">Login</button>
          <!-- <label for="sign_up" id="sign_up">Don't have an account?
            <a href="#" class="sign_up">Sign Up</a> 
          </label> -->
        
        </div>
        </div>
      </form>
    </div>
  </body>
</html>