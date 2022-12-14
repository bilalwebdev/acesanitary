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
                    <x-backend.buttons.return-back />
                    <x-buttons.edit route='{!! route("backend.$module_name.edit", $accessory) !!}'
                        title="{{ __('Edit') }} {{ ucwords(Str::singular($module_name)) }}" class="ms-1" />
                </x-slot>
            </x-backend.section-header>

            <div class="mt-4 row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <tr>
                                <th>Part Number</th>
                                <td>{{ $accessory->part_number }}</td>
                            </tr>
                            <tr>
                                <th>Category</th>
                                <td>{{ $accessory->category }}</td>
                            </tr>
                            <tr>
                                <th>Size</th>
                                <td>{{ $accessory->size }}"</td>
                            </tr>
                            <th>Price</th>
                            <td>{{ $accessory->price }}$</td>
                            </tr>
                            <tr>
                                <th>Created at</th>
                                <td>{{ $accessory->created_at }}<br><small>({{ $accessory->created_at->diffForHumans() }})</small>
                                </td>
                            </tr>

                            <tr>
                                <th>Updated at</th>
                                <td>{{ $accessory->updated_at }}<br /><small>({{ $accessory->updated_at->diffForHumans() }})</small>
                                </td>
                            </tr>

                        </table>
                    </div>
                    <!--table-responsive-->
                </div>
                <!--/.col-->
            </div>
            <!--/.row-->
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col">
                    <small class="float-end text-muted">
                        Updated: {{ $accessory->updated_at->diffForHumans() }},
                        Created at: {{ $accessory->created_at->isoFormat('LLLL') }}
                    </small>
                </div>
            </div>
        </div>
    </div>
@endsection
