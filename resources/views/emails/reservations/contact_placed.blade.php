@component('mail::message')

<strong>Message</strong>

{{ $data['message']}}

@component('mail::button', ['url' => config('app.url'), 'color' => 'green'])
Go to Website
@endcomponent

@endcomponent