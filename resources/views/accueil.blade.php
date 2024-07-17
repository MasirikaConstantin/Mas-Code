@extends('base')


@section('titre','Forum')
@section('contenus')



@section('section','Forum Actualités')

<p class="lead">Bienvenue sur notre plate-forme de questions et réponses, si vous avez une question n'hésité pas à la pauser et si vous avez une réponse à une éventuelle question votre réponse nous sera d'une grande utilité</p>
<div class="container mb-7">







<style>
  .lik{
    text-decoration: gray !important;
  
  }
</style>

<div class="my-3 p-3 bg-body rounded shadow-sm">
  <h6 class="border-bottom pb-2 mb-0">Recent updates</h6>

  @foreach ( $recents as $recent )
    @php
      $titre1= str_replace(' ','-',$recent->slug);
      $count=0;
    @endphp
    <div>
      <div>

    <div class="d-flex text-muted pt-3 ">
      @if ($recent->users->image)
      <img class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" src="{{$recent->users->imageUrls()}}" />
        @else
        <a  id="exemple">
          <i class="bi bi-person-circle s "></i>

      </a>
      @endif

      <p class="pb-3 mb-0 small lh-sm border-bottom">
        <a  class="lik bg-body text-muted"  href="{{route('user.show',['nom'=>Str::lower($titre1),'post'=>$recent])}}">
        <strong class="d-block text-gray-dark">{{$recent->users->name}}</strong>
        {{$recent->contenus}}
        <div>
      
          </a>
        
        </div>
      </p>
  
    </div>
      </div>
    </div>

  @endforeach


<small class="d-block text-end mt-3">
  <a href="{{route('tous')}}">Toutes les publications</a>
</small>
</div>








<!--div class="ratio ratio-16x9">
  <iframe src="{{asset('Capture vidéo du 2024-02-29 16-24-36.webm')}}" title="YouTube video" allowfullscreen></iframe>
</div-->

<!--div class="h-100">

<iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/hQwefKx1-Dg?si=QVZJYP0zCf28X48Y" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>

</div-->
<!--div class="h-100">

  Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eos porro quia placeat eligendi eius laboriosam officia quas nisi excepturi suscipit nobis aspernatur voluptas temporibus ullam, dolorum ipsam vitae. Cum, repellendus?
  Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis consequatur est maxime cupiditate, totam enim sit? Facilis temporibus atque quo veritatis provident, eligendi officiis quia cumque qui quidem, blanditiis necessitatibus.
  Lorem ipsum dolor sit amet consectetur, adipisicing elit. Totam temporibus nam itaque perferendis saepe ipsam quasi voluptates amet deleniti eius! Nostrum eos ab asperiores animi quas dolores eveniet nihil quod?

  Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eos porro quia placeat eligendi eius laboriosam officia quas nisi excepturi suscipit nobis aspernatur voluptas temporibus ullam, dolorum ipsam vitae. Cum, repellendus?
  Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis consequatur est maxime cupiditate, totam enim sit? Facilis temporibus atque quo veritatis provident, eligendi officiis quia cumque qui quidem, blanditiis necessitatibus.
met consectetur, adipisicing elit. Totam temporibus nam itaque perferendis saepe ipsam quasi voluptates amet deleniti eius! Nostrum eos ab asperiores animi quas dolores eveniet nihil quod?
  Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eos porro quia placeat eligendi eius laboriosam officia quas nisi excepturi suscipit nobis aspernatur voluptas temporibus ullam, dolorum ipsam vitae. Cum, repellendus?
  Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis consequatur est maxime cupiditate, totam enim sit? Facilis temporibus atque quo veritatis provident, eligendi officiis quia cumque qui quidem, blanditiis necessitatibus.
  Lorem ip
</div-->
</div>






@php
setlocale(LC_TIME,'fr_FR.utf8');
\Carbon\Carbon::setLocale('fr');

@endphp


@foreach ($posts as  $post)
@php
$titre= str_replace(' ','-',$post->slug);
$count++;
@endphp
    <div class="py-2 mt-3 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-6   p-3 bg-body border rounded-3 position-relative">
            <div class="bg-body overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <ul class="list-group box-container" >
                        <li class="list-group-item" >
                          <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            @if($post->users->image)
                            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal{{$count}}">
                            
                            <img src="{{$post->users->imageUrls()}}" alt="mdo" width="50" height="50" class="rounded-circle">
                          </button>
                            @else
                            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal{{$count}}">
                            
                              <img src="{{asset('téléchargement.png')}}" alt="mdo" width="50" height="50" class="rounded-circle">
                            </button>
                            @endif
                          </a>
                           <strong>{{$post->titre}}</strong> </li>
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
                    
                      
                        @if ($post->image)
                        <li class="list-group-item box">
                          <div class="inner">

                            <a class="test-popup-link " href="{{$post->user->imageUrls()}}">
                              
                            <img data-fancybox data-caption="{{$post->titre}}" src="{{$post->imageUrl()}}" style="height:220px ; width: 100% ; height: 300px; object-fit: cover " alt="" srcset="" class="img-fluid" >
                
                              
                            </a>
                            
                          <a href="{{$post->imageUrl()}}"  class="glightbox"> 
                          </a>
                          </div>
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
                                <span class="badge bg-{{$tag->couleur}} warning ">
                                    {{$tag->nom}} 
                                </span>
                            @endforeach
                            @endif
                          
                         <p class="text-muted" >Publié le   : {{$post->updated_at->formatLocalized(' %d %B %Y');}} </p>
                          
                         <p class="text-muted" >Créer par  : {{$post->users->name}} </p>
                          
                            <a href="{{route('user.show',['nom'=>Str::lower($titre),'post'=>$post])}}" class="icon-link gap-1 icon-link-hover stretched-link" >Lire la suite</a>
                        </p> 
                  <p><small> {{ $post->views_count }}   @if($post->views_count>1)vues @else vue @endif</small></p>
                </li>


                    </ul>

                    
                </div>
            </div>
        </div>
    </div>















  
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
              @if($post->users->image)
            <img class="bd-placeholder-img rounded-circle" width="140" height="140" src="{{$post->user->imageUrls()}}" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"/>
            
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
                  <a class="btn btn-link" href="{{route('user.profil', ['user'=>$post->user,"nom"=>(Str::slug($post->user->name,'-'))])}}">voir le profil</a>
                </p>

            </div>
            
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>



    @endforeach


    <div class="max-w-7xl mx-auto sm:px-6 lg:px-6">
        <div class="bg-body overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
    {{$posts->links()}}
        
    </div>
    </div>
</div>

































@endsection



            

            