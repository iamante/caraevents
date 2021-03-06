@php
    $edit = !is_null($dataTypeContent->getKey());
    $add  = is_null($dataTypeContent->getKey());
@endphp

@extends('voyager::master')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('page_title', __('voyager::generic.'.($edit ? 'edit' : 'add')).' '.$dataType->getTranslatedAttribute('display_name_singular'))

@section('page_header')
    <h1 class="page-title">
        <i class="{{ $dataType->icon }}"></i>
        {{ "Confirm Reservation" }}
    </h1>
    @include('voyager::multilingual.language-selector')

    {{-- @can('delete', app($dataType->model_name))
        @if($usesSoftDeletes)
            <input type="checkbox" @if ($showSoftDeleted) checked @endif id="show_soft_deletes" data-toggle="toggle" data-on="{{ __('voyager::bread.soft_deletes_off') }}" data-off="{{ __('voyager::bread.soft_deletes_on') }}">
        @endif
    @endcan --}}
    
@stop


@section('content')
    <div class="page-content edit-add container-fluid">
        <div class="row">
            <div class="col-md-7">
                <div class="panel panel-bordered" style="padding:20px; color: #333; box-shadow: 0 0.5rem 1rem rgb(0 0 0 / 15%) !important;" >
                    <div class="panel-heading" style="border-bottom:0; display: flex; align-items: center; justify-content: space-between">
                       <div class="brand" style="display: flex; align-items: center;">
                           <p style="margin-bottom: 0px"><img src="{{ asset('storage/users/logo1.png')}}" alt="logo" width="30"></p>
                           <h3 class="panel-title" style="font-weight:800; padding-left: 7px; "> Reservation #{{ $dataTypeContent->id }}</h3>
                       </div>
                       <div class="d-flex" style="display: flex;">
                            <p style="margin-bottom: 0; margin-right: 40px;"><small>Date:</small> {{ $dataTypeContent->formatCreatedAt() }}</p>
                       </div>
                    </div><hr>
                    <div class="panel-body text-dark">
                        <div class="row">
                            <div class="col-md-5">
                                <h5 class="pb-3" style="font-weight:800;">From</h5>
                            </div>
                            <div class="col-md-7"> 
                                {{ $dataTypeContent->customer_name }} {{ $dataTypeContent->customer_lname }} <br>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-5">
                                <h5 style="font-weight:800;">Contact</h5> 
                            </div>
                            <div class="col-md-7">
                                {{ $dataTypeContent->email }} <br>
                                0{{ $dataTypeContent->phone }} <br>
                                {{ $dataTypeContent->address }} <br>
                                {{ $dataTypeContent->city }} &nbsp; {{ $dataTypeContent->province }} &nbsp; ({{ $dataTypeContent->postal }})<br>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-md-5">
                                <h5 style="font-weight:800;">Service</h5> 
                            </div>
                            <div class="col-md-7">
                                {{ $dataTypeContent->name }} ({{ $dataTypeContent->details }})<br>
                                {{ $dataTypeContent->menu }}<br>
                                {{ $dataTypeContent->guests }}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-5">
                                <h5 style="font-weight:800;">Location</h5> 
                            </div>
                            <div class="col-md-7">
                                {{ $dataTypeContent->location }}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-5">
                                <h5 class="pb-3" style="font-weight:800;">Requested Date</h5> 
                            </div>
                            <div class="col-md-7">
                                <div style="display: flex;">
                                    <p style="padding-right: 10px;">{{ $dataTypeContent->formatDate() }}</p> 
                                    {{ $dataTypeContent->formatTime() }} <span style="padding-right: 10px; padding-left: 10px;">to</span> {{ $dataTypeContent->formatEndTime() }} 
                                </div>
                            </div>
                        </div>

                        @if (!$dataTypeContent->additional_info == null)
                            <hr>

                            <div class="row">
                                <div class="col-md-5">
                                    <h5 class="pb-3" style="font-weight:800;">Additional Info</h5> 
                                </div>
                                <div class="col-md-7">
                                    <div style="display: flex;">
                                        <p style="padding-right: 10px;">{{ $dataTypeContent->additional_info }}</p> 
                                        
                                    </div>
                                </div>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
            <div class="col-md-3" style="color: #333;">
                <div class="panel panel-bordered edit-reserve" style="box-shadow: 0 0.5rem 1rem rgb(0 0 0 / 15%) !important;">
                    <!-- form start -->
                    <form role="form"
                            class="form-edit-add"
                            action="{{ $edit ? route('voyager.'.$dataType->slug.'.update', $dataTypeContent->getKey()) : route('voyager.'.$dataType->slug.'.store') }}"
                            method="POST" enctype="multipart/form-data">
                        <!-- PUT Method if we are editing -->
                        @if($edit)
                            {{ method_field("PUT") }}
                        @endif

                        <!-- CSRF TOKEN -->
                        {{ csrf_field() }}

                        <div class="panel-body">

                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <!-- Adding / Editing -->
                            @php
                                $dataTypeRows = $dataType->{($edit ? 'editRows' : 'addRows' )};
                            @endphp

                            @foreach($dataTypeRows as $row)
                                <!-- GET THE DISPLAY OPTIONS -->
                                @php
                                    $display_options = $row->details->display ?? NULL;
                                    if ($dataTypeContent->{$row->field.'_'.($edit ? 'edit' : 'add')}) {
                                        $dataTypeContent->{$row->field} = $dataTypeContent->{$row->field.'_'.($edit ? 'edit' : 'add')};
                                    }
                                @endphp
                                @if (isset($row->details->legend) && isset($row->details->legend->text))
                                    <legend class="text-{{ $row->details->legend->align ?? 'center' }}" style="background-color: {{ $row->details->legend->bgcolor ?? '#f0f0f0' }};padding: 5px;">{{ $row->details->legend->text }}</legend>
                                @endif

                                <div class="form-group @if($row->type == 'hidden') hidden @endif col-md-{{ $display_options->width ?? 4 }} {{ $errors->has($row->field) ? 'has-error' : '' }}" @if(isset($display_options->id)){{ "id=$display_options->id" }}@endif>
                                    {{ $row->slugify }}
                                    <label class="control-label" for="name">{{ $row->getTranslatedAttribute('display_name') }}</label>
                                    @include('voyager::multilingual.input-hidden-bread-edit-add')
                                    @if (isset($row->details->view))
                                        @include($row->details->view, ['row' => $row, 'dataType' => $dataType, 'dataTypeContent' => $dataTypeContent, 'content' => $dataTypeContent->{$row->field}, 'action' => ($edit ? 'edit' : 'add'), 'view' => ($edit ? 'edit' : 'add'), 'options' => $row->details])
                                    @elseif ($row->type == 'relationship')
                                        @include('voyager::formfields.relationship', ['options' => $row->details])
                                    @else
                                        {!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}
                                    @endif

                                    @foreach (app('voyager')->afterFormFields($row, $dataType, $dataTypeContent) as $after)
                                        {!! $after->handle($row, $dataType, $dataTypeContent) !!}
                                    @endforeach
                                    @if ($errors->has($row->field))
                                        @foreach ($errors->get($row->field) as $error)
                                            <span class="help-block">{{ $error }}</span>
                                        @endforeach
                                    @endif
                                </div>
                            @endforeach

                        </div><!-- panel-body -->

                        <div class="panel-footer" style="margin-left: 15px;">
                            @section('submit-buttons')
                                <button type="submit" class="btn btn-primary save" style="width: 100%">{{ __('voyager::generic.save') }}</button>
                            @stop
                            @yield('submit-buttons')

                            
                        </div>


                    </form>

                    <iframe id="form_target" name="form_target" style="display:none"></iframe>
                    <form id="my_form" action="{{ route('voyager.upload') }}" target="form_target" method="post"
                            enctype="multipart/form-data" style="width:0;height:0;overflow:hidden">
                        <input name="image" id="upload_file" type="file"
                                 onchange="$('#my_form').submit();this.value='';">
                        <input type="hidden" name="type_slug" id="type_slug" value="{{ $dataType->slug }}">
                        {{ csrf_field() }}
                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade modal-danger" id="confirm_delete_modal">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><i class="voyager-warning"></i> {{ __('voyager::generic.are_you_sure') }}</h4>
                </div>

                <div class="modal-body">
                    <h4>{{ __('voyager::generic.are_you_sure_delete') }} '<span class="confirm_delete_name"></span>'</h4>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
                    <button type="button" class="btn btn-danger" id="confirm_delete">{{ __('voyager::generic.delete_confirm') }}</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Delete File Modal -->
@stop

@section('javascript')
    <script>
        var params = {};
        var $file;

        function deleteHandler(tag, isMulti) {
          return function() {
            $file = $(this).siblings(tag);

            params = {
                slug:   '{{ $dataType->slug }}',
                filename:  $file.data('file-name'),
                id:     $file.data('id'),
                field:  $file.parent().data('field-name'),
                multi: isMulti,
                _token: '{{ csrf_token() }}'
            }

            $('.confirm_delete_name').text(params.filename);
            $('#confirm_delete_modal').modal('show');
          };
        }

        $('document').ready(function () {
            $('.toggleswitch').bootstrapToggle();

            //Init datepicker for date fields if data-datepicker attribute defined
            //or if browser does not handle date inputs
            $('.form-group input[type=date]').each(function (idx, elt) {
                if (elt.hasAttribute('data-datepicker')) {
                    elt.type = 'text';
                    $(elt).datetimepicker($(elt).data('datepicker'));
                } else if (elt.type != 'date') {
                    elt.type = 'text';
                    $(elt).datetimepicker({
                        format: 'L',
                        extraFormats: [ 'YYYY-MM-DD' ]
                    }).datetimepicker($(elt).data('datepicker'));
                }
            });

            @if ($isModelTranslatable)
                $('.side-body').multilingual({"editing": true});
            @endif

            $('.side-body input[data-slug-origin]').each(function(i, el) {
                $(el).slugify();
            });

            $('.form-group').on('click', '.remove-multi-image', deleteHandler('img', true));
            $('.form-group').on('click', '.remove-single-image', deleteHandler('img', false));
            $('.form-group').on('click', '.remove-multi-file', deleteHandler('a', true));
            $('.form-group').on('click', '.remove-single-file', deleteHandler('a', false));

            $('#confirm_delete').on('click', function(){
                $.post('{{ route('voyager.'.$dataType->slug.'.media.remove') }}', params, function (response) {
                    if ( response
                        && response.data
                        && response.data.status
                        && response.data.status == 200 ) {

                        toastr.success(response.data.message);
                        $file.parent().fadeOut(300, function() { $(this).remove(); })
                    } else {
                        toastr.error("Error removing file.");
                    }
                });

                $('#confirm_delete_modal').modal('hide');
            });
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
@stop
