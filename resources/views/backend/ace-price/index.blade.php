@extends('backend.layouts.app')

@section('title')
    {{ __($module_action) }} {{ __($module_title) }}
@endsection

@section('breadcrumbs')
    <x-backend-breadcrumbs>
        <x-backend-breadcrumb-item type="active" icon='{{ $module_icon }}'>{{ __($module_title) }}
        </x-backend-breadcrumb-item>
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

            <div class="mt-4 row">
                <div class="col">
                    <table class="table table-hover table-responsive-sm">
                        @if ($ace_price_list->isNotEmpty())
                            <thead>
                                <tr>
                                    <th>Item</th>
                                    <th>Qty</th>
                                    <th>Unit Price List</th>
                                    <th>U of M</th>
                                    <th>Coil Length</th>
                                    <th>Factory Assembly Only</th>
                                    <th>Assembly Charge</th>
                                    <th class="text-end">{{ __('labels.backend.action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ace_price_list as $item)
                                    <tr>
                                        <td>
                                            {{ $item->item }}

                                        </td>
                                        <td>
                                            {{ $item->qty }}
                                        </td>
                                        <td>
                                            {{ $item->unit_price }}
                                        </td>
                                        <td>
                                            {{ $item->unit_of_measure }}
                                        </td>
                                        <td>
                                            {{ $item->coil_length }}
                                        </td>
                                        <td>
                                            @if ($item->factory_assembly == 1)
                                                Yes
                                            @else
                                                No
                                            @endif
                                        </td>
                                        <td>
                                            {{ $item->assembly_charge }}
                                        </td>
                                        <td class="text-end">
                                            @can('edit_' . $module_name)
                                                <x-buttons.edit route="{{ route('backend.ace-price.edit', $item->id) }}"
                                                    title="{{ __('Edit') }} {{ ucwords(Str::singular($module_name)) }}" />
                                            @endcan


                                            <x-deleteEntity :id="$item->id" :module="$module_name" />
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
                        {{ count($ace_price_list) }} {{ __('labels.backend.total') }}
                    </div>
                </div>
                <div class="col-5">
                    <div class="float-end">
                        {{ $ace_price_list->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
