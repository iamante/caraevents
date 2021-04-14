@component('mail::message')


<strong>Your password changed</strong> 

Your password for the caraevents account {{ $user->email }} was changed. on {{ $user->formatUpdatedAt() }} (GMT).

If this was you, then you can safely ignore this email.

@component('mail::button', ['url' => config('app.url'), 'color' => 'green'])
Go to Website
@endcomponent

@endcomponent