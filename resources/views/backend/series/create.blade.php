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
            </x-backend.section-header>

            <hr>
            <div class="mt-4 row">
                <div class="col">

                    <form action="{{ route('backend.series.store') }}" method="POST">
                        @csrf
                        <div class="col-12">
                            <div class="form-group">
                                <label for="" class="from-label">Name / Title</label><span
                                    class="text-red-500">*</span>
                                <input type="text" class="form-control" name="name" placeholder="Name / Title"
                                    required>
                            </div>
                        </div>
                        <div class="col-12 mt-2">
                            <div class="form-group">
                                <label for="" class="from-label">Description</label><span
                                    class="text-red-500">*</span>
                                <textarea class="form-control" rows="5" name="description" placeholder="Description" required></textarea>
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-6">
                                <div class="form-group">
                                    <x-buttons.create
                                        title="{{ __('Create') }} {{ ucwords(Str::singular($module_name)) }}">
                                        {{ __('Create') }}
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
