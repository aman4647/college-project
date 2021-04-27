@extends('frontend.master')
@section('body')
<body>
    <form action="{{route('register')}}" method="post" enctype="multipart/form-data">
      @csrf
      <h5 style="text-align: center;">Sign Up as a Customer</h5><br/>
      
      <fieldset >
        <legend><span class="number">1</span>Your basic info</legend>
        <label for="name">Full Name:</label>
        <input type="text" id="name"  class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus >
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        
        <label for="mail">Email:</label>
        <input style="text-align: center;" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        
        <label for="password">Password:</label>
        <input style="text-align: center;" type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

          <label for="password">Confirm Password:</label>
        <input style="text-align: center;" type="password" id="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

        <label for="phone">Phone:</label>
        <input style="text-align: center;" type="text" id="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" required autocomplete="phone" value="{{old('phone')}}">

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
        <label for="address">Address:</label>
        <input style="text-align: center;" type="text" id="address" name="address" required value="{{old('address')}}">
        
      </fieldset>
      <button type="submit" class="btn-btn-primary">Sign Up</button>
    </form>

  </body>
@endsection