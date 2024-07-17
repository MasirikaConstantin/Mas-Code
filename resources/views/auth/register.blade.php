@extends('baseentete')
@section("contenus")
<!--x-guest-layout-->
    <form method="POST" class="shadow p-3 mb-5 bg-body rounded connexion" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <!--div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div-->

        
          

          <div class="form-floating mb-3">
            <input type="text" name="name" value="{{old("name")}}" class="form-control @error("name") is-invalid @enderror" id="floatingInput"  placeholder="name@example.com">
            <label for="floatingInput">{{__('Name')}}</label>
          </div>

          @error("name")
            <div class="text-center text-danger mb-2">
            {{$message}}
            </div>
          @enderror
          



        <!-- Email Address -->
        <!--div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div-->

        <div class="form-floating mb-3">
            <input type="email" name="email" value="{{old("email")}}" class="form-control @error("email") is-invalid @enderror" id="floatingInput"  placeholder="name@example.com">
            <label for="floatingInput"> {{__('Email')}}</label>
          </div>

          @error("email")
          <div class="text-center text-danger mb-2">
            {{$message}}
        </div>
          @enderror


        <!-- Password -->
        <!--div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div-->


        <div class="form-floating">
            <input type="password" name="password" class="form-control" value="{{old('password')}}" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">{{__('Password')}}</label>
          </div>
          @error('password')
          <div class="text-center text-danger mb-2">
            {{$message}}
        </div>
          @enderror


        <!-- Confirm Password -->
        <!--div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div-->


        <div class="form-floating">
            <input type="password" name="password_confirmation" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">{{__('Confirm Password')}}</label>
          </div>
          @error('password_confirmation')
          <div class="invalid-feedback">
            {{$message}}
        </div>
          @enderror
       

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
<!--/x-guest-layout-->
@endsection
