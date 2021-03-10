<div class="panel widget center bgimage">
    <div class="dimmer"></div>
    <div class="panel-content">
        <div class="icon-voy">
            <a href="{{ $button['link'] }}">@if (isset($icon))<i class='{{ $icon }}'></i>@endif</a>
        </div>
        <div class="text-voy">
            <h4>{!! $title !!}</h4>
            <p>{!! $text !!}</p>
            {{-- <a href="{{ $button['link'] }}" class="btn btn-success">{!! $button['text'] !!}</a> --}}
        </div>
    </div>
</div>
