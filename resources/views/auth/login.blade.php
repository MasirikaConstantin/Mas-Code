@extends("baseentete")

@section("contenus")

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" class=" shadow p-3 mb-5 bg-body rounded connexion" action="">
        @csrf
       <div class="d-grid gap-2 col-6 mx-auto mb-3">

        <img src="{{asset('mas product.png')}}" alt="" srcset=""  >
       </div>
        <!-- Email Address -->
        <h1 style="text-align: center " class="h3 mb-3 "  >{{__('Log in')}}</h1>
        <div class="form-floating mb-4">
            <input type="email" name="email" value="{{old("email")}}" class="form-control @error("email") is-invalid @enderror" id="floatingInput"  placeholder="name@example.com">
            <label for="floatingInput">Email address {{old('email')}}</label>
          </div>

          @error("email")
          <div class="">
            {{$message}}
        </div>
          @enderror
          

        <!-- Password -->
        

        <div class="form-floating">
            <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">{{__('Password')}}</label>
          </div>
          @error('password')
          <div class="invalid-feedback">
            {{$message}}
        </div>
          @enderror

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

       <div class="d-grid gap-2 col-6 mx-auto">
            

            <button class="btn btn-primary mt-3 mb-4">
                {{ __('Log in') }}
            </button>

            

        @if (Route::has('password.request'))
        <a class=" mb-3" href="{{ route('password.request') }}">
            {{ __('Forgot your password?') }}
        </a>
        @endif
       </div>
    </form>


@endsection