@extends('frontend.master')
@section('body')
<body>
  
  <div class="wrapper fadeInDown">
    <div id="formContent">
      <!-- Tabs Titles -->
      <h2 class="active"> Sign In </h2>
      <h2 class="inactive underlineHover"><a href="{{route('register')}}"> Sign Up as a Customer</a> </h2>
  
      <!-- Icon -->
      <div class="fadeIn first">
        
      </div>
  
      <!-- Login Form -->
    <form method="POST" action="{{ route('login') }}">
                        @csrf
        <input type="text" id="login" class="fadeIn second @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') }}"  required autocomplete="email" autofocus>
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
        <input type="password" id="password" class="fadeIn third @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password" style="text-align: center;">
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
         <input type="submit" class="fadeIn fourth" value="Log In">
      </form>
  
      <!-- Remind Passowrd -->
      
  
    </div>
  </div>

</body>
@endsection