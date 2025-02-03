<x-mail::message>
## contact from Data Sky

<img src="{{ $message->embed(asset('storage/avatars/logo1.png'))}}" style="height:250px">

l'utilisateur  <strong>{{$user}}</strong> vous a contacté depuis l'application DataSky, pour une requette qu'il aimerait avoir des précisions.


# subject: 
<strong>{{$title}}</strong>.
-----------
# content: 
<p>{{$content}}</p>.

----------

<x-mail::button :url="''">
Button Text
</x-mail::button>

*_Veuillez lui contacter sur sa boite mail 👉 {{$email}}_*

Thanks to answer on the time!<br>
{{ config('app.name') }}
</x-mail::message>
