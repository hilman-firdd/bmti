<!-- <h3>Selamat, {{ $users->name }} !</h3>
<p>Anda Berhasil daftar</p> -->

@component('mail::message')
# Welcome to the first Newsletter

Dear {{$users->name}},

We look forward to communicating more with you, For more information visit our blog.

@component('mail::button', ['url' => 'https://laraveltuts.com'])
Blog
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent