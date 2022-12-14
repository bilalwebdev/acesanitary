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
                    <x-buttons.edit route='{!! route("backend.$module_name.edit", $hose) !!}'
                        title="{{ __('Edit') }} {{ ucwords(Str::singular($module_name)) }}" class="ms-1" />
                </x-slot>
            </x-backend.section-header>

            <div class="mt-4 row">
                <div class="col-md-8 col-sm-12">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <tr>
                                <th>Model</th>
                                <td>{{ $hose->model }}</td>
                            </tr>
                            <tr>
                                <th>Part Number</th>
                                <td>{{ $hose->part_number }}</td>
                            </tr>
                            <tr>
                                <th>Name / Title</th>
                                <td>{{ $hose->name }}</td>
                            </tr>
                            <tr>
                                <th>Series</th>
                                <td>{{ $hose->series->name }}</td>
                            </tr>
                            <tr>
                                <th>Material</th>
                                <td>{{ $hose->material->name }}</td>
                            </tr>
                            <tr>
                                <th>Inner Diameter</th>
                                <td>{{ $hose->inner_diameter }} "</td>
                            </tr>
                            @if ($hose->outer_diameter)
                                <tr>
                                    <th>Outer Diameter</th>
                                    <td>{{ $hose->outer_diameter }}</td>
                                </tr>
                            @endif
                            <tr>
                                <th>Application Type</th>
                                <td>{{ $hose->app_type }}</td>
                            </tr>
                            <tr>
                                <th>Max Cleaning Temprature</th>
                                <td>{{ $hose->max_cleaning_temprature }}</td>
                            </tr>
                            <tr>
                                <th>Max Process Temprature</th>
                                <td>{{ $hose->max_process_temprature }}</td>
                            </tr>
                            <tr>
                                <th>Deration</th>
                                <td>{{ $hose->deration }}</td>
                            </tr>
                            <tr>
                                <th>Max Cleaning Pressure</th>
                                <td>{{ $hose->max_cleaning_pressure }}</td>
                            </tr>
                            <tr>
                                <th>Max Process Pressure</th>
                                <td>{{ $hose->max_process_pressure }}</td>
                            </tr>
                            <tr>
                                <th>Price</th>
                                <td>{{ $hose->price }}</td>
                            </tr>
                            <tr>
                                <th>Unit of Measure</th>
                                <td>{{ $hose->unit_of_measure }}</td>
                            </tr>
                            <tr>
                                <th>Full Coil Oal</th>
                                <td>{{ $hose->full_coil_oal }}</td>
                            </tr>
                            <tr>
                                <th>End Style 1</th>
                                <td>
                                    @php
                                        $end_styles_1 = json_decode($hose->end_style_1);
                                        foreach ($end_styles_1 as $key => $style) {
                                            if ($key == 0) {
                                                echo '';
                                            } else {
                                                echo ',';
                                            }
                                            echo " $style";
                                        }
                                    @endphp
                                </td>
                            </tr>
                            <tr>
                                <th>End Style 2</th>
                                <td>
                                    @php
                                        $end_styles_2 = json_decode($hose->end_style_2);
                                        foreach ($end_styles_2 as $key => $style) {
                                            if ($key == 0) {
                                                echo '';
                                            } else {
                                                echo ',';
                                            }
                                            echo " $style";
                                        }
                                    @endphp
                                </td>
                            </tr>
                            <tr>
                                <th>Connection Size 1</th>
                                <td>
                                    @php
                                        $connection_sizes_1 = json_decode($hose->connection_size_1);
                                        foreach ($connection_sizes_1 as $key => $size) {
                                            if ($key == 0) {
                                                echo '';
                                            } else {
                                                echo ',';
                                            }
                                            echo " $size" . "''";
                                        }
                                    @endphp
                                </td>
                            </tr>
                            <tr>
                                <th>Connection Size 2</th>
                                <td>
                                    @php
                                        $connection_sizes_2 = json_decode($hose->connection_size_2);
                                        foreach ($connection_sizes_2 as $key => $size) {
                                            if ($key == 0) {
                                                echo '';
                                            } else {
                                                echo ',';
                                            }
                                            echo " $size" . "''";
                                        }
                                    @endphp
                                </td>
                            </tr>
                            <tr>
                                <th>Max Length</th>
                                <td>{{ $hose->max_length }}
                                    @if ($hose->unit_of_measure == 'FT')
                                        FT
                                    @else
                                        IN
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Collar Part</th>
                                <td>{{ $hose->collar->part_number }}</td>
                            </tr>
                            <tr>
                                <th>Is Factory Assembly Only?</th>
                                @if ($hose->factory_assembly == 0)
                                    <td>No</td>
                                @else
                                    <td>Yes</td>
                                @endif
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td>{{ $hose->description }}</td>
                            </tr>

                            <tr>
                                <th>Created at</th>
                                <td>{{ $hose->created_at }}<br><small>({{ $hose->created_at->diffForHumans() }})</small>
                                </td>
                            </tr>

                            <tr>
                                <th>Updated at</th>
                                <td>{{ $hose->updated_at }}<br /><small>({{ $hose->updated_at->diffForHumans() }})</small>
                                </td>
                            </tr>

                        </table>
                    </div>
                    <!--table-responsive-->
                </div>
                <div class=" col-md-4 col-sm-6">
                    @if (isset($hose->image))
                        <img src="{{ asset('storage/' . $hose->image) }}" alt="" hight="30%" width="70%"
                            style="margin: 50% 20%" class="p-6 bg-gray-300 rounded-md">
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
                        Updated: {{ $hose->updated_at->diffForHumans() }},
                        Created at: {{ $hose->created_at->isoFormat('LLLL') }}
                    </small>
                </div>
            </div>
        </div>
    </div>
@endsection
