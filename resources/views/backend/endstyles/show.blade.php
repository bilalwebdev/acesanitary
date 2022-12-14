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
                    <x-buttons.edit route='{!! route("backend.$module_name.edit", $endstyle) !!}'
                        title="{{ __('Edit') }} {{ ucwords(Str::singular($module_name)) }}" class="ms-1" />
                </x-slot>
            </x-backend.section-header>

            <div class="mt-4 row">
                <div class="col-md-8 col-sm-12">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <tr>
                                <th>Model</th>
                                <td>{{ $endstyle->model }}</td>
                            </tr>
                            <tr>
                                <th>Part Number</th>
                                <td>{{ $endstyle->part_number }}</td>
                            </tr>
                            <tr>
                                <th>Name / Title</th>
                                <td>{{ $endstyle->name }}</td>
                            </tr>
                            <tr>
                                <th>Size</th>
                                <td>{{ $endstyle->size }} "</td>
                            </tr>
                            <th>Price</th>
                            <td>{{ $endstyle->price }}$</td>
                            </tr>
                            <tr>
                                <th>Step Up Supported</th>
                                @if ($endstyle->step_up_supported == 0)
                                    <td>No</td>
                                @else
                                    <td>Yes</td>
                                @endif
                            </tr>

                            <tr>
                                <th>Created at</th>
                                <td>{{ $endstyle->created_at }}<br><small>({{ $endstyle->created_at->diffForHumans() }})</small>
                                </td>
                            </tr>

                            <tr>
                                <th>Updated at</th>
                                <td>{{ $endstyle->updated_at }}<br /><small>({{ $endstyle->updated_at->diffForHumans() }})</small>
                                </td>
                            </tr>

                        </table>
                    </div>
                    <!--table-responsive-->
                </div>
                <div class="col-md-4 col-sm-6">
                    @if (isset($endstyle->image))
                        <img src="{{ asset('storage/' . $endstyle->image) }}" alt="" hight="30%" width="70%"
                            style="margin: 30% 20%" class="p-6 bg-gray-300 rounded-md">
                    @endif
                </div>
                <!--/.col-->
            </div>
            <!--/.row-->
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col">
                    <small class="float-end text-muted">
                        Updated: {{ $endstyle->updated_at->diffForHumans() }},
                        Created at: {{ $endstyle->created_at->isoFormat('LLLL') }}
                    </small>
                </div>
            </div>
        </div>
    </div>
@endsection
