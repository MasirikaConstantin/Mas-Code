<x-mail::message>
# Nouvelle signalisation des post 

Une nouvelle signalisation du post <a href="{{route('user.show',['nom'=>$post->slug,'post'=>$post])}}"> {{$post->titre}} </a>.
- Nom         :  {{$data['nom']}}
- Prénom      :  {{$data['prenom']}}
- Téléphone   : {{$data['phone']}}
- Email       : {{$data['email']}}

** Message : ** <br />

{{$data['message']}}

<img src="{{$post->users->imageUrls()}}" alt="" srcset="">
<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
