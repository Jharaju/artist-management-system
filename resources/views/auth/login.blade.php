<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="{{asset('css/login_regis.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/cdc3149703.js" crossorigin="anonymous"></script>
  </head>
  <body>
    <div class="container" id="container">
      <!-- <div class="image">
        <img src="{{asset('images/login1.jpg')}}" alt="IMG.." width=100 height=100> 
      </div> -->
      <form action="{{ route('login') }}" method="POST"> @csrf <div class="login-container col-lg-8">
        <h3>
          <div class="card-header">Login Here...</div>
        </h3>
        <div class="card-body">
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
          <!-- <div class="checkbox">
            <label><input type="checkbox" name="remember"> Remember me</label>
            <a href="#">Forget Password?</a>
          </div> -->
          <button type="submit" class="btn btn-primary">Login</button>
          <!-- <label for="sign_up" id="sign_up">Don't have an account?
            <a href="#" class="sign_up">Sign Up</a> 
          </label> -->
          
        </div>
      </form>
    </div>
  </body>
</html>