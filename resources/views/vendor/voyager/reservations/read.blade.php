@extends('voyager::master')

@section('page_title', __('voyager::generic.view').' '.$dataType->getTranslatedAttribute('display_name_singular'))

@section('page_header')
    <h1 class="page-title">
        <i class="{{ $dataType->icon }}"></i> {{ __('voyager::generic.viewing') }} {{ ucfirst($dataType->getTranslatedAttribute('display_name_singular')) }} &nbsp;

        @can('edit', $dataTypeContent)
            <a href="{{ route('voyager.'.$dataType->slug.'.edit', $dataTypeContent->getKey()) }}" class="btn btn-info">
                <span class="glyphicon glyphicon-pencil"></span>&nbsp;
                {{ __('voyager::generic.edit') }}
            </a>
        @endcan
        @can('delete', $dataTypeContent)
            @if($isSoftDeleted)
                <a href="{{ route('voyager.'.$dataType->slug.'.restore', $dataTypeContent->getKey()) }}" title="{{ __('voyager::generic.restore') }}" class="btn btn-default restore" data-id="{{ $dataTypeContent->getKey() }}" id="restore-{{ $dataTypeContent->getKey() }}">
                    <i class="voyager-trash"></i> <span class="hidden-xs hidden-sm">{{ __('voyager::generic.restore') }}</span>
                </a>
            @else
                <a href="javascript:;" title="{{ __('voyager::generic.delete') }}" class="btn btn-danger delete" data-id="{{ $dataTypeContent->getKey() }}" id="delete-{{ $dataTypeContent->getKey() }}">
                    <i class="voyager-trash"></i> <span class="hidden-xs hidden-sm">{{ __('voyager::generic.delete') }}</span>
                </a>
            @endif
        @endcan
        @can('browse', $dataTypeContent)
        <a href="{{ route('voyager.'.$dataType->slug.'.index') }}" class="btn btn-warning">
            <span class="glyphicon glyphicon-list"></span>&nbsp;
            {{ __('voyager::generic.return_to_list') }}
        </a>
        @endcan
    </h1>
    @include('voyager::multilingual.language-selector')
@stop

@section('content')
    <style>
        .cont {
            display: flex;
            align-items: center;
            margin-left: 15px;
        }
        .tria {
            width: 61.5px;
            height: 50px;
            box-shadow: -0px -10px #000000;
            background-color: #ffffff;
            clip-path: polygon(0 100%, 50% 70%, 100% 100%);
        }
        .tria1 {
            width: 63px;
            height: 50px;
            box-shadow: -0px -10px #000000 !important;
            background-color: rgb(255, 255, 255);
            clip-path: polygon(0 100%, 0 70%, 100% 100%);
        }
        .tria2 {
            width: 63px;
            height: 50px;
            box-shadow: -0px -10px #000000;
            background-color: rgb(255, 255, 255);
            clip-path: polygon(0 100%, 100% 70%, 100% 100%);
        }
        .voyager .panel {
            box-shadow: none !important;
        }
        .reserve-alert {
            padding: 15px 10px 6px 30px;
            margin-bottom: 10px;
            border-radius: 2px;
            color: #fff;
            background: #68c085;
        }

    </style>
    <div class="page-content read container-fluid">
        <div class="row">
            <div class="col-md-9" style="border: none">
                <div class="reserve-alert">
                    <p class="mb-0">Well done! The reservation has been confirm.</p>
                </div>
                <div class="panel panel-bordered" style="padding:20px;" >
                    <div class="panel-heading" style="border-bottom:0;">
                       <h3 class="panel-title" style="font-weight:800 "> Reservation #{{ $dataTypeContent->id }}</h3>
                    </div><hr>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 style="font-weight:800;">Date :</h5> {{ $dataTypeContent->formatCreatedAt() }}
                            </div>
                            <div class="col-md-6">
                                <h5 class="pb-3" style="font-weight:800;">Customer Detail :</h5> 
                                {{ $dataTypeContent->email }} <br>
                                {{ $dataTypeContent->phone }} <br>
                                {{ $dataTypeContent->address }} <br>
                                {{ $dataTypeContent->city }} &nbsp; {{ $dataTypeContent->province }} &nbsp; ({{ $dataTypeContent->postal }})<br> 
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h5 style="font-weight:800;">Service :</h5> 
                                {{ $dataTypeContent->name }} <br>
                              ( {{ $dataTypeContent->details }} )
                            </div>
                            <div class="col-md-6">
                                <h5 class="pb-3" style="font-weight:800;">Requested Date :</h5> 
                                <div style="display: flex;">
                                    <p>{{ $dataTypeContent->formatDate() }}</p><span style="padding-right: 10px; padding-left: 10px;">at</span>  
                                    {{ $dataTypeContent->formatTime() }}
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="panel panel-bordered" style="padding:10px;">
                <div class="panel-heading" style="border-bottom:0;">
                    <h5 class="panel-title" style="font-weight:800;padding-bottom:0 "> Payment</h5>
                 </div>
                 <hr style="margin: 10px;">
                 <div class="panel-body">
                     <div>
                         <p style="margin-bottom: 0">{{ $dataTypeContent->name }}</p>
                         <p>{{ $dataTypeContent->details }}</p>
                     </div>
                     <div style="display: flex; justify-content:space-between; align-items:center; margin-bottom: 20px;">
                        <h5 style="font-weight:800; margin-bottom:0">Price :</h5>
                        <h5>₱ {{ $dataTypeContent->price }}</h5>
                    </div>
                    
                        @if ( $dataTypeContent->confirmation == "1" )
                        <div class="btn btn-success disabled" style="width: 100%" aria-disabled="true" tabindex="-1" disabled>
                        <img src="{{ asset('storage/users/tick.png') }}" alt="" width="20" style="margin-right: 5px; "><span style="border: 2px solid rgb(255, 255, 255); border-radius: 50%; padding-left: 3px; padding-right: 1px; margin-right: 5px;">&#10003; </span> {{ 'Reserved' }}
                        </div>
                        @else
                        <div class="btn btn-danger disabled" style="width: 100%" aria-disabled="true" tabindex="-1" disabled>
                            {{ 'Not Confirm' }}
                        </div>
                        @endif
                 </div>
            </div>
        </div>
        </div>
    </div>
    

    {{-- Single delete modal --}}
    <div class="modal modal-danger fade" tabindex="-1" id="delete_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('voyager::generic.close') }}"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="voyager-trash"></i> {{ __('voyager::generic.delete_question') }} {{ strtolower($dataType->getTranslatedAttribute('display_name_singular')) }}?</h4>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('voyager.'.$dataType->slug.'.index') }}" id="delete_form" method="POST">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-danger pull-right delete-confirm"
                               value="{{ __('voyager::generic.delete_confirm') }} {{ strtolower($dataType->getTranslatedAttribute('display_name_singular')) }}">
                    </form>
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@stop

@section('javascript')
    @if ($isModelTranslatable)
        <script>
            $(document).ready(function () {
                $('.side-body').multilingual();
            });
        </script>
    @endif
    <script>
        var deleteFormAction;
        $('.delete').on('click', function (e) {
            var form = $('#delete_form')[0];

            if (!deleteFormAction) {
                // Save form action initial value
                deleteFormAction = form.action;
            }

            form.action = deleteFormAction.match(/\/[0-9]+$/)
                ? deleteFormAction.replace(/([0-9]+$)/, $(this).data('id'))
                : deleteFormAction + '/' + $(this).data('id');

            $('#delete_modal').modal('show');
        });

    </script>
@stop
