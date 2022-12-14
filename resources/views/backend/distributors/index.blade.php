@extends ('backend.layouts.app')

@section('title')
    {{ __($module_title) }}
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
                    <x-buttons.create route='{{ route("backend.$module_name.create") }}'
                        title="{{ __('Create') }} {{ ucwords(Str::singular($module_name)) }}" />
                </x-slot>
            </x-backend.section-header>

            <hr>

            <div class="mt-4 row">
                <div class="col">
                    <table class="table table-hover table-responsive-sm">
                        @if ($distributors->isNotEmpty())
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Store Url</th>
                                    <th>Margin</th>
                                    <th>Multiplier</th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>
                            <?php

                            $i = 1;

                            ?>
                            <tbody>
                                @foreach ($distributors as $distributor)
                                    <tr>
                                        <td>
                                            {{ $i++ }}
                                        </td>
                                        <td>
                                            <strong>
                                                {{ $distributor->name }}
                                            </strong>
                                        </td>
                                        <td>
                                            {{ $distributor->address }}
                                        </td>
                                        <td>
                                            {{ $distributor->email }}
                                        </td>
                                        <td>
                                            {{ $distributor->phone }}
                                        </td>
                                        <td>
                                            {{ $distributor->site_url }}
                                        </td>
                                        <td>
                                            {{ $distributor->distributor_margin }}
                                        </td>
                                        <td>
                                            {{ $distributor->distributor_multiplier }}
                                        </td>
                                        <td class="text-end">
                                            @can('edit_' . $module_name)
                                                <x-buttons.edit
                                                    title="{{ __('Edit') }} {{ ucwords(Str::singular($module_name)) }}"
                                                    small="true"
                                                    route="{{ route('backend.distributors.edit', $distributor->id) }}" />
                                            @endcan
                                            <x-buttons.show route=''
                                                title="{{ __('Show') }} {{ ucwords(Str::singular($module_name)) }}"
                                                small="true"
                                                route="{{ route('backend.distributors.show', $distributor->id) }}" />
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        @else
                            <span
                                class="font-semibold p-3 text-red-900 bg-red-200 rounded-md flex justify-start items-start"
                                role="alert">No
                                Data Found!
                            </span>
                        @endif

                    </table>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <div class="row">
                <div class="col-7">
                    <div class="float-left">
                        {{ count($distributors) }} {{ __('labels.backend.total') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
