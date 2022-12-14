@extends ("backend.layouts.app")

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
            <div class="row mt-4">
                <div class="col">

                    <form action="{{ route('backend.material.update', $$module_name_singular->id) }}" method="POST">
                        @csrf
                        <div class="col-12">
                            <div class="form-group">
                                <label for="" class="from-label">Name / Title</label><span
                                    class="text-red-500">*</span>
                                <input type="text" class="form-control" value="{{ $$module_name_singular->name }}"
                                    name="name" placeholder="Name / Title" required>
                            </div>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-12 mt-2">
                            <div class="form-group">
                                <label for="" class="from-label">Description</label><span
                                    class="text-red-500">*</span>
                                <textarea class="form-control" rows="5" name="description" placeholder="Description" required>{{ $$module_name_singular->description }}</textarea>
                            </div>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="row my-2">
                            <div class="col-4">
                                <div class="form-group">
                                    <x-backend.buttons.save />
                                </div>
                            </div>

                            <div class="col-8">
                                <div class="float-end">
                                    <x-deleteEntity :id="$$module_name_singular->id" :module="$module_name" />
                                    <x-backend.buttons.return-back>Cancel</x-backend.buttons.return-back>
                                </div>
                            </div>
                        </div>

                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col">
                            <small class="float-end text-muted">
                                Updated: {{ $$module_name_singular->updated_at->diffForHumans() }},
                                Created at: {{ $$module_name_singular->created_at->isoFormat('LLLL') }}
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
