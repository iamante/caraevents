@component('mail::message')

**Reservation Received!**  Thankyou for your reservation.

**Reservation No. {{ $reserve->id }}** <br>

**Customer Name:** &nbsp;&nbsp;&nbsp; {{ auth()->user()->name }} <br>

**Customer Email:** &nbsp;&nbsp;&nbsp;&nbsp; {{ $reserve->email }} <br>

**Total:** {{ $reserve->presentPrice() }}

**Items Reserved &#10004;** <br>

**Services Name:** &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ $reserve->name }} - {{ $reserve->details }} <br>

**Services Price:** &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ $reserve->presentPrice() }}

You can get further details about your reservation by logging into our website.

@component('mail::button', ['url' => config('app.url'), 'color' => 'green'])
Go to Website
@endcomponent

Thankyou again for choosing us.

Regards, <br>
{{ config('app.name')}} Consultancy Co.
@endcomponent