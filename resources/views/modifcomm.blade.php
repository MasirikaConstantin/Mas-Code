@extends('base')
@section('section','Modifier Votre commentaire')
@section('contenus')
@php
                     
                      $class=null;
                            if($comment->post->categorie_id==1){
                                $class='language-csv';
                            }
                            elseif($comment->post->categorie_id==2){
                                $class='language-css';
                            }
                            elseif($comment->post->categorie_id==3){
                                $class='language-php' ;
                            }
                            elseif($comment->post->categorie_id==4){
                                $class='language-javascript';
                            }
                            elseif($comment->post->categorie_id==5){
                                $class='language-python';
                            }
                            elseif($comment->post->categorie_id==6){
                                $class='language-java';
                            }
                            //endif
                      @endphp
<ul class="list-group">

    @if (session('success'))
    <div class="alert alert-success">
      {{session('success')}}
    </div>

  @endif

    <div class="b-example-divider mt-3" style="border-radius: 12px" ></div>
    <hr class="my-4" >


    <li class="list-group-item my-4 shadow p-3 mb-5 bg-body rounded border-top" >
        
        
        <a id="exemple" class="d-block link-dark text-decoration-none " id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">

        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <img src="{{Auth::user()->imageUrls()}}" alt="mdo" width="50" height="50" class="rounded-circle">
          </button>
        </a>
        
            
         <hr>{{$comment->contenus}}
        
        @if ($comment->codesource)
        <pre style="" class="border border-5  mt-5 " ><code class="{{$class}}">{{($comment->codesource)}}</code></pre>
@endif
<hr>
<p class="text-muted" >

Publié le :    {{$comment->updated_at->formatLocalized(' %d %B %Y')}}
</p>
        
    </li>
    <li class="list-group-item">
    </li>
        












</ul>

<form  method="post" class="mt-5" >
    @csrf

    
        
        
    <div class="row g-2 mt-5 border" style="border-radius: 12px" >
        <div class="col-md-6 mb-3">
        
            <p for="exampleFormControlTextarea1" class="form-label" style="text-align: center" >Votre Message</p>
            @error("contenus")
            <div class="alert alert-danger">
              {{$message}}

            </div>
            @enderror
            <textarea class="form-control"  name="contenus"  id="exampleFormControlTextarea1" rows="10">
                    {{$comment->contenus}}
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
                  {{$comment->codesource}}
            </textarea>

        </div>
        </div>

<div class="mt-5">

<button type="submit" class="btn btn-primary mb-5"  >Mettre à jour</button>
        
</div>
    
        
</form>
@endsection