@extends('base')

@section('contenus')

<link rel="stylesheet" href="{{asset('app.css')}}">
<!--div class="">
    <div class="">12px!important;t

<div id="myCarousel" class="carousel slide" data-bs-ride="carousel" style="width: 500px!important" >
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{asset('img/1700075136545.jpg')}}" class="d-block w-100" alt="..." style="max-width: 100%; max-height:100%; display: block;"  >

        <div class="container">
          <div class="carousel-caption text-start">
            <h1>Example headline.</h1>
            <p>Some representative placeholder content for the first slide of the carousel.</p>
            <p><a class="btn btn-lg btn-primary" href="#">Sign up today</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img src="{{asset('img/1700952765846.jpg')}}" class="d-block w-100" alt="..."style="max-width: 100%; max-height:100%; display: block; object-fit: contain"  >

        <div class="container">
          <div class="carousel-caption">
            <h1>Another example headline.</h1>
            <p>Some representative placeholder content for the second slide of the carousel.</p>
            <p><a class="btn btn-lg btn-primary" href="#">Learn more</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img src="{{asset('img/20240111_095415.jpg')}}" class="d-block w-100" alt="..." style="max-width: 100%; max-height:100%; display: block; ">

        <div class="container">
          <div class="carousel-caption text-end">
            <h1>One more for good measure.</h1>
            <p>Some representative placeholder content for the third slide of this carousel.</p>
            <p><a class="btn btn-lg btn-primary" href="#">Browse gallery</a></p>
          </div>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div-->
















</main>




















<style>
    .mes{
        display: inline-block;
    
    color: #000;
    vertical-align: middle;
    
    border: 3px solid #0e0c0cc4;
    border-radius: 5px;
    font-weight: bolder;
    overflow: hidden;
      }
  .mes svg{
    width: 300px;
    height: 200px;
  }


  @media (max-width: 500px){
        .titre{
        font-size: 22px
          
        }
        .mes{
        display: inline-block;
    
    color: #000;
    vertical-align: middle;
    
    border: 3px solid #0e0c0cc4;
    border-radius: 5px;
    font-weight: bolder;
    overflow: hidden;
      }
  .mes svg{
    width: 100px;
    height: 200px;
  }
      }
      @media (max-width: 371px){
        .espa{
          
          margin-bottom: 1rem !important;
                
              }
      }
      @media (max-width: 925px){
        .titre{
        font-size: 22px
          
        }
        
        .mon{
            max-height: 100%;
            max-width: 100%;
            width: 100px!important;
            object-fit: cover;
            height: 150px!important;
            object-fit: cover;
            border-radius: 12px;
        }



      }
.sks{
  position: relative;
  display: inline-block;
}
.montxt{
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(109, 100, 100, 0.5);
  display: flex;
  align-items: center;
  justify-content: center;
  color: green;

}
.pos{
  position: relative;
    display: block;
    height: 280px;

    box-sizing: border-box;
}
@media (min-width: 768px) {
  .col-md-3 {
    flex: 0 0 auto;
    width: 30%;
  }
}

</style>
<section class="pt-4 linear-g-w-2" >

  <div class="container " >





    <div class="d-flex flex-column flex-md-row" >

      <h1 class="h1-section me-auto titre" ><i class="bi bi-patch-question"></i> Les Astuces récentes</h1>

      
      
      
    </div>
  
    <div class="row mt-4 mb-5">

      @foreach ($astuces as $astuce )
      @php
$titre= str_replace(' ','-',$astuce->slug)
@endphp
        <div class="col-md-3 col-sm-6 col-6 mb-3 " style="overflow: hidden" >
          <small class="text-secondary"><i class="bi bi-folder-symlink"></i> {{$astuce->category->titre}} </small>

          <a class="text-body  pos" style="text-decoration: none; margin-bottom: 20px; " href="{{route('astuces.shoastuce',['nom'=>$astuce->slug,'astuce'=>$astuce->id])}}" >
          @if ($astuce->image)
              <div class="cover text-body  hjhj" style="border-radius: 12px;" >
              <img src="{{$astuce->imageUrlAstuce()}}" class="mon" alt="image de couverture" />
            </div>
          
          @else
            <div class="back bg-body text-body  sks" style="border-radius: 12px;" >
              <!--img src="" class="mon" alt="image de couverture" /-->
          <div class="mes bg-body" >
            @php
            echo $astuce->category->svg
          @endphp
          </div>
              <div class="montxt text-body font-bold h3" >
                  {{$astuce->category->titre}}
              </div>

            </div>
          @endif
            <div class="front">
            
              <div class="course-extract mt-1 me-2" style="overflow: hidden; border-radius: 12px;" >
                  <p class="fw-semibold lh-sm mb-2 " style="margin:0  8px !important" >{{substr($astuce->contenus,0,100) }}</p>
                      
              </div>
            </div>
          </a>
        </div>
      @endforeach
      

      
    </div>


      <div class="d-sm-block" >

        <a class="btn btn-light border shadow-sm me-3  espa" href="{{route('astuces')}}" title="Aller à la page des cours" ><i class="bi bi-eye-fill"></i> Voir toutes les astuces</a>

        <a class="btn btn-success " href="{{route('astuces.new')}}" title="Publier une astuce" ><i class="bi bi-plus-lg"></i> Publier une astuce</a>
        
      </div>


































    <div class="d-flex flex-column flex-md-row" >

      <h1 class="h1-section me-auto titre" ><i class="bi bi-patch-question"></i> Les Questions récentes</h1>

      
      
      
    </div>
    
    <div class="row mt-4 mb-5">

      @foreach ($posts as $post )
      @php
$titre= str_replace(' ','-',$post->slug)
@endphp
        <div class="col-md-3 col-sm-6 col-6 mb-3 " style="overflow: hidden" >
          <small class="text-secondary"><i class="bi bi-folder-symlink"></i> {{$post->category->titre}} </small>

          <a class="text-body  pos" style="text-decoration: none; margin-bottom: 20px; " href="{{route('user.show',['nom'=>Str::lower($titre),'post'=>$post])}}" >
          @if ($post->image)
              <div class="cover text-body  hjhj" style="border-radius: 12px;" >
              <img src="{{$post->imageUrl()}}" class="mon" alt="image de couverture" />
            </div>
          
          @else
            <div class="back bg-body text-body  sks" style="border-radius: 12px;" >
              <img src="{{asset('dessin-1.svg')}}" class="mon" alt="image de couverture" />
              <div class="montxt text-body font-bold h3" >
                  {{$post->category->titre}}
              </div>

            </div>
          @endif
            <div class="front">
            
              <div class="course-extract mt-1 me-2" style="overflow: hidden; border-radius: 12px;" >
                  <p class="fw-semibold lh-sm mb-2 " style="margin:0  8px !important" >{{substr($post->contenus,0,100) }}</p>
                      
              </div>
            </div>
          </a>
        </div>
      @endforeach
      

      
    </div>


      <div class="d-sm-block" >

        <a class="btn btn-light border shadow-sm me-3  espa" href="{{route('user.accueil')}}" title="Aller à la page des cours" ><i class="bi bi-eye-fill"></i> Voir  le Forum</a>

        <a class="btn btn-success " href="{{route('user.newpost')}}" title="Poser une question" ><i class="bi bi-plus-lg"></i> Poser une question</a>
        
      </div>
Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quo, et quaerat magnam repudiandae enim placeat. Accusamus soluta quam, laboriosam quo ullam rem animi praesentium officia nesciunt velit suscipit voluptas odio.

  </div>

  <!-- Technologies -->
  <section class="pt-4" id="domains-techs"  >

    <div class="container" >

    <h1 class="h1-section mb-3" > <i class="bi bi-sliders"></i> Nos sujets</h1>

@foreach ($categories as $category )

<a href="{{route('tous',['category_id' => $category->id])}}" class="techno shadow-sm shadow-body " data-bs-toggle="popover" title="{{$category->titre}}" data-bs-content="{{$category->description}}" data-bs-placement="top" data-bs-trigger="hover" >
  @php
    echo $category->svg
  @endphp
  {{$category->titre}}
</a>
@endforeach
    </div>

    
  </section>

  
  

  


</div><!-- #app -->



<!-- Bootstrap, axios, lazysizes, ... -->
<script src="{{asset("app.js")}}" ></script>


<!-- Livewire -->
<script src="{{asset('livewire.js')}}" data-turbo-eval="false" data-turbolinks-eval="false" ></script><script data-turbo-eval="false" data-turbolinks-eval="false" >window.livewire = new Livewire();window.Livewire = window.livewire;window.livewire_app_url = '';window.livewire_token = 'mClbj92Nm5pHeNwzRYgleY2F3MxeaRdEWqd6F1tl';window.deferLoadingAlpine = function (callback) {window.addEventListener('livewire:load', function () {callback();});};let started = false;window.addEventListener('alpine:initializing', function () {if (! started) {window.livewire.start();started = true;}});document.addEventListener("DOMContentLoaded", function () {if (! started) {window.livewire.start();started = true;}});</script>

<script type="text/javascript">

// Livewire : Afficher une alerte
Livewire.on('alert', msg => {
  alert(msg);
});

// Livewire : Masque un modal
Livewire.on('closeModal', el => {
  var modal = new bootstrap.Modal(document.getElementById(el))

  modal.hide();

});

// Tous les popovers
var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))

var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
  return new bootstrap.Popover(popoverTriggerEl)
})




</script>

@endsection