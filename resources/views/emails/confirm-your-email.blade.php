@component('mail::message')
# One more step before joining Bahdcast

We need you to confirm your email

@component('mail::button', ['url' => ''])
Confirm Email
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
 