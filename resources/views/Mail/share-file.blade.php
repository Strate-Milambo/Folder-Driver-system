
<x-mail::message>
# Information from DATAdrive
----------------------------

Bonjour, **_{{$user->name}}_** 
L'utilisateur **_{{$author->name}}_**  vient de vous envoyé du contenu.

# Total envoyé: {{count($files)}} contenus
--------------------------------------------

<x-mail::table>
| Numero| Folder| Files    |
| :-- |:-----:| --------:|
@foreach($files as $k=> $file)

| {{$k +1 }}     | {{$file->is_folder ? substr($file->name,0,8)."..." : 'null'}}   | {{!$file->is_folder ? substr($file->name,0,8)."..." : 'null'}} |
| :-- |:-----:| --------:|
@endforeach
</x-mail::table>
<x-mail::button :url="'http://folder-driver.test/my-files'">
Check it
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
