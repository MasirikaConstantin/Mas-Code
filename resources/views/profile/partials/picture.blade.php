<section>
    <header>
        <h2 class="text-lg font-medium text-body-900">
            {{ __('Ajouter une Photo de Profil') }}
        </h2>

        <p class="mt-1 text-sm text-body-600">
            {{ __('Ajouter une photo pour une meilleur identification') }}
        </p>
    </header>
    <link rel="stylesheet" href="{{asset('bootstrap.min.css')}}">
    <style>
      
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    </style>

    <form method="post" action="{{route('photo')}}" class="" enctype="multipart/form-data" >
        @csrf
        @method('put')

        





        <main class="mt-1">
          
          {{ Auth::user()->name }}
            <div class="row" data-masonry='{"percentPosition": true }'>
              
              <div class="mb-1">
                <label for="formFile" class="form-label">Choisir une photo</label>
                <input class="form-control" {{old('image')}} name="image" type="file" id="fileUpload">
              </div>
              

              <div class="col-sm mb-3 ">
                <div class="card" style="width: 322px!important; height: 250px;">
                
                    
                    <img id='imageDiv' class="h-s100" style=" height:220px ; width: 100% ; height: 250px; object-fit: cover "  />
                  
                  
                  
                </div>
                @error('image')
                {{$message}}
              @enderror

              </div>
            </div>
            
          
          </main>
          <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-body-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
