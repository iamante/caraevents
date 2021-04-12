<div class="panel widget center bgimage">
    <div class="dimmer"></div>
    <div class="panel-content">
        <div class="icon-voy">
            @if (isset($icon))<i class='{{ $icon }}'></i>@endif
        </div>
        <div class="text-voy">
            <h4>{!! $title !!}</h4>
            <h1 class="count-dashboard-widget">{!! $text !!}</h1>
            <div><a href="{{ $button['link'] }}"><small><span style="color: rgb(18, 169, 98); padding-right: 5px;">&#9658;</span> For more info click here</small></a></div>
            {{-- <a href="{{ $button['link'] }}" class="btn btn-success">{!! $button['text'] !!}</a> --}}
        </div>
    </div>
</div>
