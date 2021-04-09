@component('mail::message')

@component('mail::panel')

{{-- **{{ $data['subject']}** --}}

@endcomponent

<strong>Name:</strong> {{ $data['name']}}<br>
<strong>Email:</strong> {{ $data['email']}}

<strong>Message</strong>

{{ $data['message']}}

@component('mail::button', ['url' => config('app.url'), 'color' => 'green'])
Go to Website
@endcomponent

@endcomponent