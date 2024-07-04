<x-mail::message>
# Password Reset Link



<x-mail::button :url="$link">
Reset Password
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
