@extends ('backend.layouts.app')

@section('title')
    {{ __($module_action) }} {{ __($module_title) }}
@endsection

@section('breadcrumbs')
    <x-backend-breadcrumbs>
        <x-backend-breadcrumb-item route='{{ route("backend.$module_name.index") }}' icon='{{ $module_icon }}'>
            {{ __($module_title) }}
        </x-backend-breadcrumb-item>
        <x-backend-breadcrumb-item type="active">{{ __($module_action) }}</x-backend-breadcrumb-item>
    </x-backend-breadcrumbs>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <x-backend.section-header>
                <i class="{{ $module_icon }}"></i> {{ __($module_title) }} <small
                    class="text-muted">{{ __($module_action) }}</small>

                <x-slot name="subtitle">
                    @lang(':module_name Management Dashboard', ['module_name' => Str::title($module_name)])
                </x-slot>
                <x-slot name="toolbar">
                    <a href="{{ route('backend.series.download') }}" class="btn btn-primary"><i class="fa fa-download"></i>
                        Download Sample File</a>
                </x-slot>
            </x-backend.section-header>

            <hr>
            <div>
                <div id='loader'></div>
                <div class="mt-4 row">
                    <div class="col">
                        <form action="{{ url('admin/series/import-series') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-2 row">
                                        <div class="col-sm-12 ">
                                            <div class="form-group">
                                                <label for="" class="from-label">Import File(.csv)</label>
                                                <input type="file" class="form-control" name="file" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">

                                    <div class="form-group">
                                        <x-buttons.create
                                            title="{{ __('Create') }} {{ ucwords(Str::singular($module_name)) }}">
                                            {{ __('Import') }}
                                        </x-buttons.create>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="float-end">
                                        <div class="form-group">
                                            <x-buttons.cancel />
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

        </div>

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    <small class="float-end text-muted">

                    </small>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('after-scripts')
    <script>
        $(function() {
            $("form").submit(function() {
                $('#loader').show();
            });
        });
    </script>
@endpush
