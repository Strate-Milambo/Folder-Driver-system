<x-mail::message>
## MESSAGE D'INVITATION 
----------- 
<img src="{{ $message->embed(asset('storage/avatars/logo1.png'))}}" style="height:250px">

# BIENVENU.E SUR  <i style="color:blue">DATA </i> <i style="color:green">SKY</i></h3>
-----------------
<p>l'utilisateur <strong>{{$user->name }}</strong> , vous a envoyé un email d'invitation
pour intégrer DataSky App, afin de collaborer ensemble et étendre votre manière d'échange 
sur d'autres horizons.</p>


<x-mail::button :url="'http://folder-driver.test/welcomeFolder'">
    Réjoindre
</x-mail::button>

Thanks in advance for your integration,<br>
{{ config('app.name') }} App.
</x-mail::message>
