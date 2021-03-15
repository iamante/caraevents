<div class="panel widget center bgimage">
    <div class="dimmer"></div>
    <div class="panel-content">
        <div class="text-voy">
            <h5>{!! $title !!}</h5>
            <h1>{!! $text !!}</h1>
            <div><a href="{{ $button['link'] }}">&#9658; For more info click here</a></div>
            {{-- <a href="{{ $button['link'] }}" class="btn btn-success">{!! $button['text'] !!}</a> --}}
        </div>
        <div class="icon-voy">
            @if (isset($icon))<i class='{{ $icon }}'></i>@endif
        </div>
    </div>
</div>
