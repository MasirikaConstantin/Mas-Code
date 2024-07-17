@extends('base')

@section('contenus')
@section('section',$post->titre)
@section('titre',$post->titre)

@php
    date_default_timezone_set('Europe/Paris');
@endphp


@php
setlocale(LC_TIME,'fr_FR.utf8');
\Carbon\Carbon::setLocale('fr');

@endphp

    <div class="py-2 mt-3 ">
        @if (session('success'))
    <div class="alert alert-success text-center">
      <h3>{{session('success')}}</h3>
    </div>

  @endif
        @guest
        <div class="alert alert-warning mt-5">
            Se connecter avant de commenter ce post
        </div>
    @endguest
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-6   p-3 bg-body border rounded-3 position-relative">
            <div class="bg-body overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <ul class="list-group" >
                        <li class="list-group-item" >
                          @if ($post->user->image)
                            <a id="exemple" class="d-block link-dark text-decoration-none " id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">

                            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <img src="{{$post->user->imageUrls()}}" alt="mdo" width="50" height="50" class="rounded-circle">
                              </button>
                            </a>
                            @else
                            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">

                            <a  id="exemple">
                                <i class="bi bi-person-circle s "></i>

                            </a>
                          </button>
                          
                                @endif


                          

                        </li>

                        <li class="list-group-item" > <strong>{{$post->titre}}</strong> </li>
                        <li class="list-group-item" >
                          @if ($post->created_at != $post->updated_at)
                          <p>
                            <i class="bi bi-exclamation-triangle"></i>  <span class="badge bg-secondary" > Modifier le: {{$post->updated_at->formatLocalized(' %d %B %Y')}} à {{$post->updated_at->format(' H : i')}} </span>
                          </p>
                            
                          @endif 
                            {{$post->contenus}}
                      
                        </li class="list-group-item" >
                        @if ($post->codesource)
                                <pre style="" class="border border-5  " ><code class="b @if($post->categorie_id==1)language-csv @elseif($post->categorie_id==2)language-css @elseif($post->categorie_id==3)language-php @elseif($post->categorie_id==4)language-javascript @elseif($post->categorie_id==5)language-python @elseif($post->categorie_id==6)language-java @endif">{{($post->codesource)}}</code></pre>
                        @endif
                    
                      @php
                      $count=0;
                      $count1=0;
                      $class=null;
                            if($post->categorie_id==1){
                                $class='language-csv';
                            }
                            elseif($post->categorie_id==2){
                                $class='language-css';
                            }
                            elseif($post->categorie_id==3){
                                $class='language-php' ;
                            }
                            elseif($post->categorie_id==4){
                                $class='language-javascript';
                            }
                            elseif($post->categorie_id==5){
                                $class='language-python';
                            }
                            elseif($post->categorie_id==6){
                                $class='language-java';
                            }
                            //endif
                      @endphp
                        @if ($post->image)
                        <li class="list-group-item">


    

                          <a class="test-popup-link " href="{{$post->imageUrl()}}">
                            <img data-fancybox data-caption="{{$post->titre}}"  src="{{$post->imageUrl()}}" style="height:220px ; width: 100% ; height: 300px; object-fit: cover " alt="" srcset="">
                          </a>


                        </li>
                            
                        @endif
                      <li class="list-group-item" >

                        <p class="small" > 
                            @if ($post->category)

                            Categorie : 
                            <strong>
                            {{$post->category ?->titre}}

                            </strong>
                            @endif
                            <br> 
                            @if (!$post->tags->isEmpty())
                                Tags : 
                            @foreach ($post->tags as $tag)
                                <span class="badge bg-{{$tag->couleur}} ">
                                    {{$tag->nom}} 
                                </span>
                            @endforeach
                            @endif

                        </p> </li>

                        <li class="list-group-item" >

                         
                          <p>Publié par : 
                            <a href="#" class="btn" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                              @if($post->users->image)
                              <img src="{{$post->users->imageUrls()}}" alt="mdo" width="50" height="50" class="rounded-circle">
                              @else
                            </a>
                              <a href="#" class="btn" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-circle s"></i>
                              </a>
                              @endif
                            </a>
                            <strong>{{$post->users->name}}</strong>
          
                          </p>

                            
                            @php
                        setlocale(LC_TIME,'fr_FR.utf8');
                        \Carbon\Carbon::setLocale('fr');
                        
                    @endphp
                     <p class="text-muted" >Publié le   : {{$post->updated_at->formatLocalized(' %d %B %Y');}} </p>
                      <p>


                        @auth
                        <a href="{{route('user.reaction',['post'=>$post->id,'reaction'=>1])}}"  style="text-decoration: none;" > 
                          @if(Auth::user()->reactions()->where('post_id', $post->id)->where('reaction','=',1)->exists())
                          <i class="bi bi-hand-thumbs-up-fill s"></i>
                          @else
                          <i class="bi bi-hand-thumbs-up s"></i>
                          @endif
                        </a> {{ $post->reactions()->where('reaction', '1')->count() }}


                        @endauth

                        @guest
                        
                          <i class="bi bi-hand-thumbs-up "></i>
                        {{ $post->reactions()->where('reaction', '1')->count() }} Positive

                        <i class="bi bi-hand-thumbs-down "></i>
                        
                        </a>{{ $post->reactions()->where('reaction', '0')->count() }} Négative

                        @endguest



                        @auth
                          
                        <a href="{{route('user.reaction',['post'=>$post->id,'reaction'=>0])}}" style="text-decoration: none" >
                          
                          @if(Auth::user()->reactions()->where('post_id', $post->id)->where('reaction','=',0)->exists())
                            <i class="bi bi-hand-thumbs-down-fill s"></i>
                            @else
                          <i class="bi bi-hand-thumbs-down s"></i>
                          @endif
                        </a>{{ $post->reactions()->where('reaction', '0')->count() }}


                        @endauth

                        <p><small> {{ $post->views_count }}   @if($post->views_count>1)vues @else vue @endif</small></p>

                      </p>
                        </li>
                        @guest
                        <div class="alert alert-warning mt-5">
                            Se connecter avant de commenter ce post <a class="icon-link gap-1 icon-link-hover stretched-link" href="{{route('login')}}">Se Connecter</a>
                        </div>
                    @endguest


                        
                    </ul>

                    <ul class="list-group">
                        <div class="b-example-divider mt-3" style="border-radius: 12px" ></div>
                        <hr class="my-4" >
                        @foreach ($commentaires as $comm )
                        @php
                            $count++;
                        @endphp
                        <li class="list-group-item my-4 shadow p-3 mb-5 bg-body rounded border-top" >
                            
                            @if ($comm->user->image)
                            <a id="exemple" class="d-block link-dark text-decoration-none " id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">

                            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal{{$count}}">
                                <img src="{{$comm->user->imageUrls()}}" alt="mdo" width="50" height="50" class="rounded-circle">
                              </button>
                            </a>
                            @else
                            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal{{$count}}">

                            <a  id="exemple">
                                <i class="bi bi-person-circle s "></i>

                            </a>
                          </button>
                          
                                @endif
                                @if ($comm->created_at != $comm->updated_at)
                          <p>
                            <i class="bi bi-exclamation-triangle"></i>  <span class="badge bg-secondary" > Modifier le: {{$comm->updated_at->formatLocalized(' %d %B %Y')}} à {{$comm->updated_at->format(' H : i')}} </span>
                          </p>
                            
                          @endif
                             <hr>{{$comm->contenus}}
                            
                            @if ($comm->codesource)
                            <pre style="" class="border border-5  mt-5 " ><code class="{{$class}}">{{($comm->codesource)}}</code></pre>
                    @endif
                    <hr>
                    <p class="text-muted" >
                    
                    Publié le :    {{$comm->updated_at->formatLocalized(' %d %B %Y')}}
                    </p>
                    <p class="text-muted" >
                    
                    Publié par :    {{$comm->user->name}}
                    </p>
                    @auth
                      
                    @if ($comm->user->id == Auth::user()->id)
                    <a  class="btn btn-link" href="{{route('edit.comm',['comment'=>$comm->id])}}"> Modifier </a>
                    <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#exampleModal{{$count1}}"> Supprimer </button>
                @endif
                    @endauth

                    





                    @auth
                    <a href="{{route('user.reactioncomm',['commentaire'=>$comm->id,'reaction'=>1])}}"  style="text-decoration: none;" > 
                      @if(Auth::user()->reactionscomm()->where('commentaire_id', $comm->id)->where('reaction','=',1)->exists())
                      <i class="bi bi-hand-thumbs-up-fill s"></i>
                      @else
                      <i class="bi bi-hand-thumbs-up s"></i>
                      @endif
                    </a> {{ $comm->reactionscomm()->where('reaction', '1')->count() }}


                    @endauth

                    @guest
                    
                      <i class="bi bi-hand-thumbs-up "></i>
                    {{ $post->reactions()->where('reaction', '1')->count() }} Positive

                    <i class="bi bi-hand-thumbs-down "></i>
                    
                    </a>{{ $post->reactions()->where('reaction', '0')->count() }} Négative

                    @endguest



                    @auth
                      
                    <a href="{{route('user.reactioncomm',['commentaire'=>$comm->id,'reaction'=>0])}}" style="text-decoration: none" >
                      
                      @if(Auth::user()->reactionscomm()->where('commentaire_id', $comm->id)->where('reaction','=',0)->exists())

                        <i class="bi bi-hand-thumbs-down-fill s"></i>
                        @else
                      <i class="bi bi-hand-thumbs-down s"></i>
                      @endif
                    </a>{{ $comm->reactionscomm()->where('reaction', '0')->count() }}


                    @endauth



                        </li>
                        <li class="list-group-item">
                        </li>
                            




<!-- Suppression -->

<div class="modal fade" id="exampleModal{{$count1}}"  data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel{{$count1}}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Suppression</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">


          <div class="card-group">
            <p style="color: red; font-weight: 500" >
            Voulez-vous vraiment supprimer ce commentaire?  
            </p>
            <div class="carvd">
                Date de publication : <strong>{{$comm->created_at->formatLocalized(' %d %B %Y')}}</strong>
                @if($comm->created_at != $comm->updated_at)
                <p>Modifé le : <strong> {{$comm->updated_at->formatLocalized(' %d %B %Y')}}</strong></p>
              @endif

            </div>
            
          </div>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <a href="{{route('deletecomm',['id'=>$comm->id])}}" class="btn btn-danger">Supprimer</a>
        </div>
      </div>
    </div>
  </div>
<!-- End Suppression -->





<!-- Button trigger modal -->

  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal{{$count}}" tabindex="-1" aria-labelledby="exampleModalLabel{{$count}}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Profil</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">












          <div class="card-group">
            <div class="carbd">
              @if($comm->user->image)



              <a class="test-popup-link " href="{{$comm->user->imageUrls()}}">
                <button class="btn" data-bs-dismiss="modal"><img class="bd-placeholder-img rounded-circle" data-fancybox data-caption="{{$comm->titre}}" width="140" height="140" src="{{$comm->user->imageUrls()}}" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"/>
                </button>
              </a>




            
            @else
            <img src="{{asset('téléchargement.png')}}" alt="mdo" width="50" height="50" class="rounded-circle">
              @endif  
            </div>
            <div class="carvd">
                Nom : <strong>{{$comm->user->name}}</strong>
                <p>Nous a rejoins le : <strong> {{$comm->user->created_at->formatLocalized(' %d %B %Y')}}</strong></p>
                
                <p>
                  <small>Nombre d'abonné : {{$comm->user->subscribers()->count()}}</small>
                </p>
                <p>
                  <a class="bouto1 text-body" href="{{route('user.profil', ['user'=>$comm->user,"nom"=>(Str::slug($post->user->name,'-'))])}}">voir le profil</a>
                </p>
            </div>
            
          </div>













        </div>
       
      </div>
    </div>
  </div>






                        @endforeach
                    </ul>

                    
                </div>
            </div>
        </div>
    </div>






































    <script>
        function copyDivContent() {
            var divContent = document.getElementById('editor').innerHTML;
            document.getElementById('hiddenInput').value = divContent;
        }
</script>

<hr class="my-4" >
@error('user_id')
            {{$message}}
        @enderror
        @error('user_id')
            {{$message}}
        @enderror

    <form  method="post">
        @csrf

        @auth
        <input hidden type="text" value="{{Auth::user()->id}}" name="user_id"  />
        <input hidden type="text" value="{{$post->id}}" name="post_id"  />
    
        @endauth
            
            
        <div class="row g-2 border" style="border-radius: 12px" >
            <div class="col-md-6 mb-3">
            
                <p for="exampleFormControlTextarea1" class="form-label" style="text-align: center" >Votre Message</p>
                @error("contenus")
                <div class="alert alert-danger">
                  {{$message}}
  
                </div>
                @enderror
                <textarea class="form-control"  name="contenus"  id="exampleFormControlTextarea1" rows="10">
                        {{old('contenus')}}
                </textarea>

            </div>

            <div class="col-md-6 mb-3">
            
              <p for="exampleFormControlTextarea1" class="form-label " style="text-align: center" >Code Source (si possible)</p>
                @error("codesource")
                    <div class="alert alert-danger">
                            {{$message}}

                    </div>
                @enderror
                <textarea class="form-control"  name="codesource"  id="exampleFormControlTextarea1" rows="10">
                      {{old('codesource')}}
                </textarea>

            </div>
            </div>

            <script>
                var element = document.getElementById('example');
                if(element.hasAttribute('href')){
                    element.removeAttribute('href');
                }
            </script>

            














            @guest
                <div class="alert alert-warning mt-5">
                    Se connecter avant de commenter ce post
                </div>
            @endguest
@auth
<div class="mt-5">

    <button type="submit" class="btn btn-primary mb-5"  >Commenter</button>
            
</div>
@endauth
        
            
    </form>
    













<!--form action="{{route('user.contact', $post)}}" method="post">
  @csrf
  
  
        <div class="col-md-7 col-lg-8">
          <h4 class="mb-3">Nous contacter</h4>
          <form class="needs-validation" novalidate>
            <div class="row g-3">
              <div class="col-sm-6">
                <label for="firstName" class="form-label">First name</label>
                <input type="text" class="form-control" id="firstName" name="nom" placeholder="" value="crrrfergrtg" required>
                <div class="invalid-feedback">
                  Valid first name is required.
                </div>
              </div>
  
              <div class="col-sm-6">
                <label for="lastName" class="form-label">Last name</label>
                <input type="text" class="form-control" id="lastName" name="prenom" placeholder="" value="cocococooc" required>
                <div class="invalid-feedback">
                  Valid last name is required.
                </div>
              </div>
  
              
  
              <div class="col-12">
                <label for="email" class="form-label">Email <span class="text-muted">(Optional)</span></label>
                <input type="email" class="form-control" name="email" id="email" value="you@example.com">
                <div class="invalid-feedback">
                  Please enter a valid email address for shipping updates.
                </div>
              </div>
  
              <div class="col-12">
                <label for="address" class="form-label">Num</label>
                <input type="text" class="form-control" name="phone" id="address" value="09876535535" >
                <div class="invalid-feedback">
                  Please enter your shipping address.
                </div>
              </div>
  
              <div class="col-12">
                <label for="address2" class="form-label">Message <span class="text-muted">(Optional)</span></label>
                <textarea type="text" class="form-control" name="message" id="address2" rows="20" cols="30" placeholder="Apartment or suite">
                  cyurfctyevcytevecrvgetyvevt Please enter a valid email address for shipping updates.
                </textarea>
              </div>
  
            <button class="btn btn-secondary">envoyer</button>
            </div>
  </form-->
  

  











<script>
    const quill = new Quill('#editor', {
    theme: 'snow'
    });
    
    </script>



<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Profil</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">







        <div class="card-group">
          <div class="carbd">
            @if($post->users->image)


            <a class="test-popup-link " href="{{$post->user->imageUrls()}}">
              <button class="btn" data-bs-dismiss="modal">

            <img class="bd-placeholder-img rounded-circle" data-fancybox data-caption="{{$post->user->name}}" width="140" height="140" src="{{$post->user->imageUrls()}}" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"/>

              </button>
            </a>


            
            @else

            <img src="{{asset('téléchargement.png')}}" alt="mdo" width="50" height="50" class="rounded-circle">
              @endif    
          </div>
          <div class="carvd">
              Nom : <strong>{{$post->user->name}}</strong>
              <p>Nous a rejoins le : <strong> {{$post->user->created_at->formatLocalized(' %d %B %Y')}}</strong></p>
              
              <p>
                <small>Nombre d'abonné : {{$post->user->subscribers()->count()}}</small>
              </p>
              <p>
                <a class="bouto1 text-body" href="{{route('user.profil', ['user'=>$post->user,"nom"=>(Str::slug($post->user->name,'-'))])}}">Voir le profil</a>
              </p>
          </div>
          
        </div>













      </div>
  
    </div>
  </div>
</div>


@endsection