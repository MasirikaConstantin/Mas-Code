<!doctype html>
<html lang="en" class="h-100" data-bs-theme="auto">
  <head><script src="{{asset('color-modes.js')}}"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.118.2">
    <title>@yield('titre' ,'Blog')</title>
<link rel="stylesheet" href="{{asset('bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('bootstrap-icons/bootstrap-icons.css')}}">
<link rel="stylesheet" href="{{asset('prism.css')}}">
<link rel="shortcut icon" href="{{asset('grace2.ico')}}" type="image/x-icon">
<link rel="stylesheet" href="{{asset('quill.snow.css')}}">
<script src="{{asset('quill.js')}}"></script>
<link rel="stylesheet" href="{{asset('tom-select.css')}}">
<link rel="stylesheet" href="{{asset('autre.css')}}">


<script src="{{asset('fancybox.umd.js')}}"></script>
<link
  rel="stylesheet"
  href="{{asset('fancybox.css')}}"
/>

<script src="{{asset('tom-select.complete.min.js')}}"></script>


<meta name="theme-color" content="#712cf9">


            <style>
                    
                      @font-face {
                        font-family: 'Google';
                        src: url('{{asset('ProductSans-Light.ttf')}}');
                        font-weight: 500;
                        
                    }
                    body{
                        font-family: 'Google';
                    }
                    

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

                  .b-example-divider {
                    width: 100%;
                    height: 3rem;
                    background-color: rgba(0, 0, 0, .1);
                    border: solid rgba(0, 0, 0, .15);
                    border-width: 1px 0;
                    box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
                  }

                  .b-example-vr {
                    flex-shrink: 0;
                    width: 1.5rem;
                    height: 100vh;
                  }

                  .bi {
                    vertical-align: -.125em;
                    fill: currentColor;
                  }

                  .nav-scroller {
                    position: relative;
                    z-index: 2;
                    height: 2.75rem;
                    overflow-y: hidden;
                  }

                  .nav-scroller .nav {
                    display: flex;
                    flex-wrap: nowrap;
                    padding-bottom: 1rem;
                    margin-top: -1px;
                    overflow-x: auto;
                    text-align: center;
                    white-space: nowrap;
                    -webkit-overflow-scrolling: touch;
                  }

                  .btn-bd-primary {
                    --bd-violet-bg: #712cf9;
                    --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

                    --bs-btn-font-weight: 600;
                    --bs-btn-color: var(--bs-white);
                    --bs-btn-bg: var(--bd-violet-bg);
                    --bs-btn-border-color: var(--bd-violet-bg);
                    --bs-btn-hover-color: var(--bs-white);
                    --bs-btn-hover-bg: #6528e0;
                    --bs-btn-hover-border-color: #6528e0;
                    --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
                    --bs-btn-active-color: var(--bs-btn-hover-color);
                    --bs-btn-active-bg: #5a23c8;
                    --bs-btn-active-border-color: #5a23c8;
                  }

                  .bd-mode-toggle {
                    z-index: 1500;
                  }

                  .bd-mode-toggle .dropdown-menu .active .bi {
                    display: block !important;
                  }
                  

            </style>
<style>
  .connexion{

  }


.connexion {
width: 100%;
max-width: 430px;
padding: 25px;
margin: auto;
}

.connexion .checkbox {
font-weight: 400;
}

.connexion .form-floating:focus-within {
z-index: 2;
}

.connexion input[type="email"] {
margin-bottom: -1px;
border-bottom-right-radius: 0;
border-bottom-left-radius: 0;
}

.connexion input[type="password"] {
margin-bottom: 10px;
border-top-left-radius: 0;
border-top-right-radius: 0;
}
img{
  width: 60% !important;
  height: 100% !important;
  margin-right: auto !important;
  margin-left: auto !important;

}

</style>
    
    <!-- Custom styles for this template -->
    <link href="sticky-footer-navbar.css" rel="stylesheet">
  </head>
  <body class="d-flex flex-column h-100 bg-body">
    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
      <symbol id="check2" viewBox="0 0 16 16">
        <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
      </symbol>
      <symbol id="circle-half" viewBox="0 0 16 16">
        <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z"/>
      </symbol>
      <symbol id="moon-stars-fill" viewBox="0 0 16 16">
        <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z"/>
        <path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z"/>
      </symbol>
      <symbol id="sun-fill" viewBox="0 0 16 16">
        <path d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"/>
      </symbol>
    </svg>
    @php
    setlocale(LC_TIME,'fr_FR.utf8');
                            \Carbon\Carbon::setLocale('fr');
                            
@endphp

<script>
  Fancybox.bind("[data-fancybox]", {
  // Your custom options
  });

</script>
    <div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">
      <button class="btn btn-bd-primary py-2 dropdown-toggle d-flex align-items-center"
              id="bd-theme"
              type="button"
              aria-expanded="false"
              data-bs-toggle="dropdown"
              aria-label="Toggle theme (auto)">
        <svg class="bi my-1 theme-icon-active" width="1em" height="1em"><use href="#circle-half"></use></svg>
        <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
      </button>
      <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
        <li>
          <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light" aria-pressed="false">
            <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em"><use href="#sun-fill"></use></svg>
            Light
            <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
          </button>
        </li>
        <li>
          <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark" aria-pressed="false">
            <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em"><use href="#moon-stars-fill"></use></svg>
            Dark
            <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
          </button>
        </li>
        <li>
          <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto" aria-pressed="true">
            <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em"><use href="#circle-half"></use></svg>
            Auto
            <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
          </button>
        </li>
      </ul>
    </div>  </div>

    




<style>

        .bouto1{

      --bs-btn-padding-x: 0.75rem;
      --bs-btn-padding-y: 0.375rem;
      --bs-btn-font-family: ;
      --bs-btn-font-size: 1rem;
      --bs-btn-font-weight: 400;
      --bs-btn-line-height: 1.5;
      --bs-btn-color: var(--bs-body-color);
      --bs-btn-bg: transparent;
      --bs-btn-border-width: var(--bs-border-width);
      --bs-btn-border-color: transparent;
      --bs-btn-border-radius: var(--bs-border-radius);
      --bs-btn-hover-border-color: transparent;
      --bs-btn-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.15), 0 1px 1px rgba(0, 0, 0, 0.075);
      --bs-btn-disabled-opacity: 0.65;
      --bs-btn-focus-box-shadow: 0 0 0 0.25rem rgba(var(--bs-btn-focus-shadow-rgb), .5);
      display: inline-block;
      padding: var(--bs-btn-padding-y) var(--bs-btn-padding-x);
      font-family: var(--bs-btn-font-family);
      font-size: var(--bs-btn-font-size);
      font-weight: var(--bs-btn-font-weight);
      line-height: var(--bs-btn-line-height);
      color: var(--bs-btn-color);
      text-align: center;
      text-decoration: none;
      vertical-align: middle;
      cursor: pointer;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
      border: var(--bs-btn-border-width) solid var(--bs-btn-border-color);
      border-radius: var(--bs-btn-border-radius);
      background-color:  rgba(179, 60, 60, 0);
      transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;

      color: #fff;
          background-color: #f125b449;
          border-color: #f125b449;
      }

      .bouto2{

    --bs-btn-padding-x: 0.95rem;
    --bs-btn-padding-y: 0.475rem;
    --bs-btn-font-family: ;
    --bs-btn-font-size: 1rem;
    --bs-btn-font-weight: 400;
    --bs-btn-line-height: 1.5;
    --bs-btn-color: var(--bs-body-color);
    --bs-btn-bg: transparent;
    --bs-btn-border-width: var(--bs-border-width);
    --bs-btn-border-color: transparent;
    --bs-btn-border-radius: var(--bs-border-radius);
    --bs-btn-hover-border-color: transparent;
    --bs-btn-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.15), 0 1px 1px rgba(0, 0, 0, 0.075);
    --bs-btn-disabled-opacity: 0.65;
    --bs-btn-focus-box-shadow: 0 0 0 0.25rem rgba(var(--bs-btn-focus-shadow-rgb), .5);
    display: inline-block;
    padding: var(--bs-btn-padding-y) var(--bs-btn-padding-x);
    font-family: var(--bs-btn-font-family);
    font-size: var(--bs-btn-font-size);
    font-weight: var(--bs-btn-font-weight);
    line-height: var(--bs-btn-line-height);
    color: var(--bs-btn-color);
    text-align: center;
    text-decoration: none;
    vertical-align: middle;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
    border: var(--bs-btn-border-width) solid var(--bs-btn-border-color);
    border-radius: var(--bs-btn-border-radius);
    background-color:  rgba(179, 60, 60, 0);
    transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
    margin: -10px 0;
    color: #fff;
        background-color: #95be2449;
        border-color: #95be2449;
    }
      .class {
        background-attachment: fixed !important;
          width: 100%;
          height: 80vh;
          background-size: cover;
          position:relative;
          margin-top: -80px;
          z-index: 9;
          background: url({{asset('imagde.svg')}})  ;
        
          }
        
          .accs{
              font-weight: bold !important;
              font-size: 120px !important;
              padding: 10% !important;
            }
            #monElement{
              color: rgba(225, 255, 0) !important;
              text-shadow: (12px 12px 12px #000000);
              font-family: 'ubuntu', sans-serif;
              font-size: 28px !important;
              font-style: italic;
              font-display:red; 

            }
            .h1{
              font-size: 80px !important;
              letter-spacing: 0.2em;

            }
            .class{
              width: 100%;
              height:  auto !important;

            }
            .gg{
            margin: 0px !important;
          }


          .accs{
            padding-top: 300px!important
          }
          @media (max-width: 992px) {
          
            }

          @media (max-width: 500px){
            .sss{
              color: rgb(208, 255, 0) !important;
              margin: 140px 0px !important;
              padding: 0px;
              
            }
            .h1{
              font-size: 50px !important;
              letter-spacing: 0.2em;
            }
            .accs{
              font-weight: bold !important;
              font-size: 120px !important;
              padding: 10% !important;
            }
            #monElement{
              color: rgba(213, 216, 27, 0.678) !important;
              text-shadow: (12px 12px 12px #000000);
              text-align: center;
              font-family: 'ubuntu', sans-serif;
              font-size: 18px !important;
              font-style: italic;
              font-display:red; 

            }
            .class{
              width: 100%;
              height:  auto !important;

            }
            .gg{
            margin: 0px !important;
          }

          .bouto2{

              --bs-btn-padding-x: 0.5rem;
              --bs-btn-padding-y: 0.2rem;
              --bs-btn-font-family: ;
              --bs-btn-font-size: .7rem;
              --bs-btn-font-weight: 200;
              --bs-btn-line-height: 1;
              --bs-btn-color: var(--bs-body-color);
              --bs-btn-bg: transparent;
              --bs-btn-border-width: var(--bs-border-width);
              --bs-btn-border-color: transparent;
              --bs-btn-border-radius: var(--bs-border-radius);
              --bs-btn-hover-border-color: transparent;
              --bs-btn-box-shadow: inset 0 0.5px 0 rgba(255, 255, 255, 0.15), 0 1px 1px rgba(0, 0, 0, 0.075);
              --bs-btn-disabled-opacity: 0.65;
              --bs-btn-focus-box-shadow: 0 0 0 0.25rem rgba(var(--bs-btn-focus-shadow-rgb), .5);
              display: inline-block;
              padding: var(--bs-btn-padding-y) var(--bs-btn-padding-x);
              font-family: var(--bs-btn-font-family);
              font-size: var(--bs-btn-font-size);
              font-weight: var(--bs-btn-font-weight);
              line-height: var(--bs-btn-line-height);
              color: var(--bs-btn-color);
              text-align: center;
              text-decoration: none;
              vertical-align: middle;
              cursor: pointer;
              -webkit-user-select: none;
              -moz-user-select: none;
              user-select: none;
              margin: 0px !important;
              border: var(--bs-btn-border-width) solid var(--bs-btn-border-color);
              border-radius: var(--bs-btn-border-radius);
              background-color:  rgba(179, 60, 60, 0);
              transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;

                  background-color: #95be2449;
                border-color: #95be2449;
    }
  
        }


        .btnhover{
          --bs-btn-color: #fff;
    --bs-btn-bg: #fdec00;
    --bs-btn-border-color: #fdec00;
    --bs-btn-hover-color: #4e4d3f;
    --bs-btn-hover-bg: #fdec00;
    --bs-btn-hover-border-color: #565e64;
    --bs-btn-focus-shadow-rgb: 130, 138, 145;
    --bs-btn-active-color: #fff;
    --bs-btn-active-bg: #fdec00;
    --bs-btn-active-border-color: #51585e;
    --bs-btn-active-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
    --bs-btn-disabled-color: #fff;
    --bs-btn-disabled-bg: #6c757d;
    --bs-btn-disabled-border-color: #6c757d;

    
          --bs-btn-padding-x: 0.75rem;
      --bs-btn-padding-y: 0.375rem;
      --bs-btn-font-family: ;
      --bs-btn-font-size: 1rem;
      --bs-btn-font-weight: 400;
      --bs-btn-line-height: 1.5;
      --bs-btn-color: var(--bs-body-color);
      --bs-btn-bg: transparent;
      --bs-btn-border-width: var(--bs-border-width);
      --bs-btn-border-color: transparent;
      --bs-btn-border-radius: var(--bs-border-radius);
      --bs-btn-hover-border-color: transparent;
      --bs-btn-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.15), 0 1px 1px rgba(0, 0, 0, 0.075);
      --bs-btn-disabled-opacity: 0.65;
      --bs-btn-focus-box-shadow: 0 0 0 0.25rem rgba(var(--bs-btn-focus-shadow-rgb), .5);
      display: inline-block;
      padding: var(--bs-btn-padding-y) var(--bs-btn-padding-x);
      font-family: var(--bs-btn-font-family);
      font-size: var(--bs-btn-font-size);
      font-weight: var(--bs-btn-font-weight);
      line-height: var(--bs-btn-line-height);
      color: var(--bs-btn-color);
      text-align: center;
      text-decoration: none;
      vertical-align: middle;
      cursor: pointer;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
      border: var(--bs-btn-border-width) solid var(--bs-btn-border-color);
      border-radius: var(--bs-btn-border-radius);
      background-color:  rgba(179, 60, 60, 0);
      transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;

      color: #fff;
          background-color: #00ff2249;
          border-color: #f125b449;
  
    }

  
</style>

<!-- Begin page content -->
<main class="flex-shrink-0 mt-5 ">

 



  
   <div class="container">
    @yield('contenus')
   </div>

  </div>

</main>


<style>
    .s{
    
      margin: .15rem;
      font-size: 1.5rem;
    
    }
</style>
<div class="container">
  <footer class="py-5">

    





        <div class="container">
        
        
        
        
        
            <p class="mb-2 text-secondary fw-bold"><i class="bi bi-info-circle"></i> A propos</p>


                Bienvenue sur <a href="" style="font-size: 25px" >Blog this</a>  ! Nous sommes une plateforme en ligne dédiée à fournir des réponses claires et précises à vos questions, quelle que soit leur domaine. 

                Que vous soyez un étudiant en quête de connaissances, un professionnel cherchant à approfondir ses compétences, ou simplement un curieux désireux d'explorer de nouveaux sujets, notre communauté d'experts et d'utilisateurs passionnés est là pour vous aider.


                <br>
                        <!-- Button trigger modal -->
                <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Lire plus
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog  modal-dialog-scrollable">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title mb-2 text-secondary fw-bold" id="exampleModalLabel"><i class="bi bi-info-circle"></i> A propos</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body ">
                        <p><strong>A propos de nous </strong>: Votre guichet unique pour les questions et les réponses</p>

                        <p>Bienvenue sur <a href="" style="font-size: 25px" >Blog this</a> ! Nous sommes une plateforme en ligne dédiée à fournir des réponses claires et précises à vos questions, quelle que soit leur domaine. 
                        
                        Que vous soyez un étudiant en quête de connaissances, un professionnel cherchant à approfondir ses compétences, ou simplement un curieux désireux d'explorer de nouveaux sujets, notre communauté d'experts et d'utilisateurs passionnés est là pour vous aider.</p>
                        
                        <strong>Notre mission : </strong>
                        
                        <ul>
                        <li>Offrir un espace ouvert et convivial où chacun peut poser des questions et obtenir des réponses de qualité.</li>
                            <li>Favoriser le partage de connaissances et l'apprentissage continu dans une variété de domaines.</li>
                            <li> Cultiver une communauté inclusive et respectueuse où chacun se sent à l'aise pour s'exprimer et apprendre.</li>
                        </ul>
                        <strong>Ce qui nous distingue : </strong>
                        
                        <ul>
                        <li><strong>Diversité des sujets:</strong> Nous abordons un large éventail de sujets, allant de la science et de la technologie à l'histoire, la philosophie et bien plus encore.</li>
                        <li><strong>Expertise des contributeurs: </strong> Notre communauté regroupe des experts et des passionnés de divers domaines, prêts à partager leurs connaissances et leur expérience.</li>
                        <li><strong>Qualité des réponses:</strong> Nous nous engageons à fournir des réponses claires, précises et étayées par des sources fiables.</li>
                        <li><strong>Approche collaborative:</strong> Nous encourageons les interactions entre utilisateurs pour favoriser l'échange d'idées et l'enrichissement des discussions.</li>
                        </ul>
                    
                        
                        <a href="{{route('login')}}"><strong>Rejoignez-nous ! :</strong></a>
                        
                        <p>Que vous soyez à la recherche de réponses, que vous souhaitiez partager vos connaissances ou simplement explorer de nouveaux sujets, nous vous invitons à rejoindre notre communauté dynamique. Posez des questions, répondez aux autres, et contribuez à faire de <strong>Blog this</strong> une ressource précieuse pour tous.</p>
                        
                        <p><strong>Ensemble, construisons un monde où la connaissance est accessible à tous !</strong></p>
                        
                    </div>
                    
                    </div>
                </div>
                </div>

        
        
        
                <div class="d-flex pb-3">
        
                <div class="me-2" >
                <i class="bi bi-geo-alt"></i>  <small>République Démocratique du Congo, Kinshasa</small>
                </div>
        
         
        
        
            </div>
        
           
        
            


    

<script>// JavaScript
  document.getElementById('theme-switcher').addEventListener('change', function() {
    document.body.classList.toggle('dark-theme', this.checked);
  });
  
</script>
    

      <p>&copy; 2024 Company, Inc. Tout droit réservé.</p>

      
      <ul class="list-unstyled d-flex">
        <li class="ms-3"><a class="link-white" data-bs-toggle="tooltip" data-bs-placement="top" title="Constantin Masirika Jr." href="https://www.facebook.com/mascodeproduct">  <i class="bi bi-facebook s"></i></a></li>
        <li class="ms-3"><a class="link-white" data-bs-toggle="tooltip" data-bs-placement="top" title="Constantin Masirika Jr." href="https://x.com/negroconstantin">  <i class="bi bi-twitter s"></i></a></li>
        <li class="ms-3"><a class="link-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Constantin Masirika Jr." href="https://www.instagram.com/mascodeproduct/"> <i class="bi bi-instagram s"></i></a></li>
        <li class="ms-3"><a class="link-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Constantin Masirika Jr." href="https://youtube.com/@masproduct360"> <i class=" bi bi-youtube s"></i></a></li>
        <li class="ms-3"><a class="link-body" data-bs-toggle="tooltip" data-bs-placement="top" title="Constantin Masirika Jr." href="https://www.linkedin.com/in/el-negro-constantino-260387274"> <i class="bi bi-linkedin s"></i></a></li>
        <li class="ms-3"><a class="link-secondary" data-bs-toggle="tooltip" data-bs-placement="top" title="Constantin Masirika Jr." href="https://github.com/MasirikaConstantin"> <i class="bi bi-github s"></i></a></li>
        
        
      </ul>
    </div>











    <script>
        new TomSelect('select[multiple]')
    </script>

<div class="container">

  <ul class="nav justify-content-end">
    <li class="nav-item">
      <a class="nav-link active" aria-current="page" href="#">
        <i class="bi bi-heart-fill me-4"></i>
        Sponsoriser                


      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('admin.login')}}">
        <i class="bi bi-key me-4"></i>      Admin Panel
      </a>
    </li>
  
  </ul>

</div>

<script>
  function affichetext(element, txt, interval){
    let i=0
    let timer=setInterval(function(){
      if(i< txt.length ){
        element.innerHTML += txt.charAt(i);
        i++
      }else{
        clearInterval(timer);
      }

    }, interval);
  }
  const monElement =document.getElementById("monElement");

  const maPhrase="--- Développé vos idées en réalité ----"
  const vitesse=100;
  affichetext(monElement,maPhrase,vitesse);
  
</script>


<script>
  new TomSelect('select[multiple]',{plugins:{remove_button: {title: 'Delacher'}}})
</script>
    <script src="{{asset('bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('prism.js')}}"></script>
<script src="{{asset('quill.js')}}"></script>


  </footer>
</div>
    </body>
</html>
