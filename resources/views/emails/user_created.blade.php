@component('mail::message')
# Hello, {{ $user->name }}

Your account has been created.
{{-- 
@component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}


Kindly login to our application using the credentials below: <br><br>
Username: {{ $user->email }}, <br>
Password: {{ $password }}{{ $user->role == 'user' ? ',' : '.' }}
@if($user->role == 'user')
<br>Location: {{ $user->location }}
@endif


Regards,<br>
{{ config('app.name') }}
@endcomponent
