<x-mail::message>
# CONTACT US

<h1>Name: {{ $fullname }}</h1>

<h1>Email Address: {{ $email }}</h1>

<h1>Message: {{ $message }}</h1>


Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
