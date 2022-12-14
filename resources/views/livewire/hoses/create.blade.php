<div>
    @if ($errors->any())
        <div class="bg-red-100 rounded-lg">
            <div class="flex items-center w-full px-6 text-base rounded-lg alert alert-dismissible fade show"
                role="alert">
                <strong class="mr-1 text-red-700">Ooops! </strong> <span class="text-red-700">You should check in on some
                    of those fields below.</span>
                <button type="button"
                    class="w-4 ml-auto text-red-900 border-none rounded-none opacity-50 btn-close focus:shadow-none focus:outline-none focus:opacity-100 hover:text-red-900 hover:opacity-75 hover:no-underline"
                    data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif
    <div class="pt-2 mb-4 border-gray-200 dark:border-gray-700" x-data="{ tab: 'tab1' }">
        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center">
            <li class="mr-2" role="presentation">
                <button x-on:click="tab = 'tab1'"
                    class="inline-block p-2 font-semibold text-blue-600 border-b-2 border-blue-600 rounded-t-lg text-md hover:text-blue-400 hover:border-blue-400"
                    type="button" role="tab" :class="{ 'text-white bg-blue-600': tab == 'tab1' }">Basic
                    Info</button>
            </li>
            <li class="mr-2" role="presentation">
                <button x-on:click="tab = 'tab2'"
                    class="inline-block p-2 font-semibold text-blue-600 border-b-2 border-blue-600 rounded-t-lg text-md hover:text-blue-400 hover:border-blue-400"
                    type="button" role="tab" :class="{ 'text-white bg-blue-600': tab == 'tab2' }">End
                    Styles</button>
            </li>
            <li class="mr-2" role="presentation">
                <button x-on:click="tab = 'tab3'"
                    class="inline-block p-2 font-semibold text-blue-600 border-b-2 border-blue-600 rounded-t-lg text-md hover:text-blue-400 hover:border-blue-400"
                    type="button" role="tab" :class="{ 'text-white bg-blue-600': tab == 'tab3' }">Restrictions &
                    Regulations</button>
            </li>
        </ul>
        <div class="mt-4 row">
            <div class="col">
                <form action="" wire:submit.prevent="store" enctype="multipart/form-data">
                    <div class="row" x-show="tab === 'tab1'">
                        <div class="col-md-8 col-sm-12">
                            <div class="mb-2 row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="" class="from-label">Model</label><span
                                            class="text-red-500">*</span>
                                        <select wire:model="model" id="" class="form-select" required>
                                            <option value="">--Select Model--</option>

                                            @if (isset($models))
                                                @foreach ($models as $item)
                                                    <option value="{{ $item->name }}">
                                                        {{ $item->name }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    @error('model')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="" class="from-label">Part Number</label><span
                                            class="text-red-500">*</span>
                                        <input type="text" class="form-control" wire:model="part_number"
                                            placeholder="Part Number">
                                    </div>
                                    @error('part_number')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mt-2 col-12">
                                    <div class="form-group">
                                        <label for="" class="from-label">Name / Title</label><span
                                            class="text-red-500">*</span>
                                        <input type="text" class="form-control" wire:model="name"
                                            placeholder="Name / Title">
                                    </div>
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mt-2 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="" class="from-label">Series</label><span
                                            class="text-red-500">*</span>
                                        <select wire:model="series_id" id="" class="form-select" required>
                                            <option value="">--Select Series--</option>
                                            @if (isset($series))

                                                @foreach ($series as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    @error('series_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mt-2 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="" class="from-label">Material</label><span
                                            class="text-red-500">*</span>
                                        <select wire:model="material_id" id="" class="form-select" required>
                                            <option value="">--Select Material--</option>
                                            @foreach ($materials as $material)
                                                <option value="{{ $material->id }}">{{ $material->name }}</option>
                                            @endforeach
                                        </select>
                                        </select>
                                    </div>
                                    @error('material_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mt-2 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="" class="from-label">Inner Diameter</label><span
                                            class="text-red-500">*</span>
                                        <select wire:model="inner_diameter" class="form-select" required>
                                            <option value="">--Select Inner Diameter--</option>
                                            @foreach ($sizes as $size)
                                                <option value="{{ $size->size }}" selected>{{ $size->size }} "
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('inner_diameter')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mt-2 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="" class="from-label">Outer Diameter</label>
                                        <input type="text" wire:model="outer_diameter" id=""
                                            class="form-control">
                                    </div>
                                    @error('outer_diameter')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mt-2 col-12">
                                    <div class="form-group">
                                        <label for="" class="from-label">Application Type</label><span
                                            class="text-red-500">*</span>
                                        <select wire:model="application_type" class="form-select" required>
                                            <option value="" selected>Application Type</option>
                                            @foreach ($app_types as $type)
                                                <option value="{{ $type->name }}" selected>{{ $type->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('application_type')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>
                                <div class="mt-2 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="" class="from-label">Max Cleaning Temprature</label><span
                                            class="text-red-500">*</span>
                                        <input type="text" class="form-control"
                                            wire:model="max_cleaning_temprature" placeholder="Max Temprature">
                                    </div>
                                    @error('max_cleaning_temprature')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mt-2 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="" class="from-label">Min Cleaning Temprature</label><span
                                            class="text-red-500">*</span>
                                        <input type="text" class="form-control"
                                            wire:model="min_cleaning_temprature" placeholder="Min Temprature">
                                    </div>
                                    @error('min_cleaning_temprature')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mt-2 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="" class="from-label">Max Process Temprature</label><span
                                            class="text-red-500">*</span>
                                        <input type="text" class="form-control"
                                            wire:model="max_process_temprature" placeholder="Max Temprature">
                                    </div>
                                    @error('max_process_temprature')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mt-2 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="" class="from-label">Min Process Temprature</label><span
                                            class="text-red-500">*</span>
                                        <input type="text" class="form-control"
                                            wire:model="min_process_temprature" placeholder="Max Temprature">
                                    </div>
                                    @error('min_process_temprature')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mt-2 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="" class="from-label">Deration</label><span
                                            class="text-red-500">*</span>
                                        <input type="text" class="form-control" wire:model="deration"
                                            placeholder="Deration">
                                    </div>
                                    @error('deration')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mt-2 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="" class="from-label">Max Cleaning Pressure</label><span
                                            class="text-red-500">*</span>
                                        <input type="text" class="form-control" wire:model="max_cleaning_pressure"
                                            placeholder="Max Supported Pressure">
                                    </div>
                                    @error('max_cleaning_pressure')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mt-2 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="" class="from-label">Min Cleaning Pressure</label><span
                                            class="text-red-500">*</span>
                                        <input type="text" class="form-control" wire:model="min_cleaning_pressure"
                                            placeholder="Max Supported Pressure">
                                    </div>
                                    @error('min_cleaning_pressure')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mt-2 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="" class="from-label">Max Process Pressure</label><span
                                            class="text-red-500">*</span>
                                        <input type="text" class="form-control" wire:model="max_process_pressure"
                                            placeholder="Max Process Pressure">
                                    </div>
                                    @error('max_process_pressure')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mt-2 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="" class="from-label">Min Process Pressure</label><span
                                            class="text-red-500">*</span>
                                        <input type="text" class="form-control" wire:model="min_process_pressure"
                                            placeholder="Min Process Pressure">
                                    </div>
                                    @error('min_process_pressure')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mt-2 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="" class="from-label">Price</label><span
                                            class="text-red-500">*</span>
                                        <input type="text" class="form-control" wire:model="price"
                                            placeholder="Price">
                                    </div>
                                    @error('price')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mt-2 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="" class="from-label">Unit of Measure</label><span
                                            class="text-red-500">*</span>
                                        <select wire:model="unit_of_measure" id="" class="form-select"
                                            required>
                                            <option value="">--Select Unit of Measure--</option>
                                            <option value="FT">FT</option>
                                            <option value="IN">IN</option>
                                        </select>
                                    </div>
                                    @error('unit_of_measure')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mt-2 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="" class="from-label">Full Coil OAL</label><span
                                            class="text-red-500">*</span>
                                        <input type="text" class="form-control" wire:model="full_coil_oal"
                                            placeholder="Full Coil OAL">
                                    </div>
                                    @error('full_coil_oal')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mt-2 col-12">
                                    <div class="form-group">
                                        <label for="" class="from-label">Short Description</label><span
                                            class="text-red-500">*</span>
                                        <textarea type="text" class="form-control" wire:model="description" placeholder="Short Description"
                                            rows="5"></textarea>
                                    </div>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <div class="mt-2 form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" wire:model="requirments"
                                                value="grounding" id="requirmnet1">
                                            <label class="form-check-label">
                                                Requires Grounding
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" wire:model="requirments"
                                                id="requirmnet2" value="static_dissipation" checked>
                                            <label class="form-check-label">
                                                Requires Static dissipation
                                            </label>
                                        </div>
                                        @error('requirments')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="mt-2 col-12">
                                    <div class="form-group">
                                        <label for="" class="from-label">Factory Assembly Only?</label><span
                                            class="text-red-500">*</span>
                                        <select wire:model="factory_assembly" id="" class="form-select"
                                            required>
                                            <option value="0">No</option>
                                            <option value="1">Yes</option>
                                        </select>
                                    </div>
                                    @error('factory_assembly')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>
                        </div>
                        <div class="col-md-3 col-sm-8">

                            <div class="image-panel">
                                <label for="image-upload" class="from-label">
                                    <div class="text-center" wire:loading wire:target='image'>

                                        <div id="loader">
                                            <div
                                                style="display: flex; justify-content: center; align-items:center; background-color:black; position:fixed; top: 0px; left:0px; z-index: 9999; width:100%; height:100%; opacity:.75;">
                                                <div class="lds-facebook">
                                                    <div></div>
                                                    <div></div>
                                                    <div></div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    @if ($image && $isUploaded)
                                        <img wire:durationchange.2000ms src="{{ $image->temporaryUrl() }}"
                                            alt="" height="200px" width="180px">
                                    @else
                                        <div class="" wire:loading.remove wire:target='image'>
                                            <?xml version="1.0" encoding="iso-8859-1"?>
                                            <!-- Generator: Adobe Illustrator 19.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                                            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" style="height: 70px"
                                                viewBox="0 0 58 58" style="enable-background:new 0 0 58 58;"
                                                xml:space="preserve">
                                                <path
                                                    d="M57,6H1C0.448,6,0,6.447,0,7v44c0,0.553,0.448,1,1,1h56c0.552,0,1-0.447,1-1V7C58,6.447,57.552,6,57,6z M16,17
                                        c3.071,0,5.569,2.498,5.569,5.569c0,3.07-2.498,5.568-5.569,5.568s-5.569-2.498-5.569-5.568C10.431,19.498,12.929,17,16,17z
                                         M52.737,35.676c-0.373,0.406-1.006,0.435-1.413,0.062L40.063,25.414l-9.181,10.054l4.807,4.807c0.391,0.391,0.391,1.023,0,1.414
                                        s-1.023,0.391-1.414,0L23.974,31.389L7.661,45.751C7.471,45.918,7.235,46,7,46c-0.277,0-0.553-0.114-0.751-0.339
                                        c-0.365-0.415-0.325-1.047,0.09-1.412l17.017-14.982c0.396-0.348,0.994-0.329,1.368,0.044l4.743,4.743l9.794-10.727
                                        c0.179-0.196,0.429-0.313,0.694-0.325c0.264-0.006,0.524,0.083,0.72,0.262l12,11C53.083,34.636,53.11,35.269,52.737,35.676z" />

                                            </svg>
                                        </div>
                                    @endif
                                </label>
                            </div>
                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click
                                    to upload image</span> or drag and drop</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG </p>
                            <input type="file" wire:model="image" class="hidden" id="image-upload">
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="" x-show="tab === 'tab2'">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="p-2 card">
                                    <div class="" wire:ignore>
                                        <label for="" class="from-label">End Style 1:</label><span
                                            class="text-red-500">*</span>
                                        <select wire:model="endstyle1" name="endstyle1" id="select-role" multiple
                                            style="width: 100%;">
                                            <option value="">--Select--</option>
                                            @if (isset($end_styles))
                                                @foreach ($end_styles as $item)
                                                    <option value="{{ $item->part_number }}">{{ $item->part_number }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @error('endstyle1')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mt-1">
                                        @if (!empty($endstyle1))
                                            <label for="" class="from-label">Part Number:</label>
                                            <div class="p-2 bg-gray-100 rounded-sm">
                                                @foreach ($endstyle1 as $i)
                                                    <span
                                                        class="p-1 m-1 border-2 border-gray-300 rounded-sm">{{ $i }}
                                                    </span>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>

                                    <div class="mt-1">
                                        <label for="" class="from-label">Connection Size:</label><span
                                            class="text-red-500">*</span>
                                        <div class="grid grid-cols-4">
                                            @foreach ($sizes as $size)
                                                <div class="form-check">
                                                    <input type="checkbox" wire:model="connection_size_1"
                                                        value="{{ $size->size }}" class="form-check-input"><span
                                                        class="m-2">{{ $size->size }}"</span>
                                                </div>
                                            @endforeach
                                        </div>
                                        @error('connection_size_1')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="p-2 card">
                                    <div class="" wire:ignore>
                                        <label for="" class="from-label">End Style 2:</label><span
                                            class="text-red-500">*</span>
                                        <select wire:model="endstyle2" name="endstyle2" id="select-role2" multiple
                                            style="width: 100%;">
                                            <option value="">--Select--</option>
                                            @if (isset($end_styles))
                                                @foreach ($end_styles as $item)
                                                    <option value="{{ $item->part_number }}">{{ $item->part_number }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @error('endstyle2')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mt-1">
                                        @if (!empty($endstyle2))
                                            <label for="" class="from-label">Part Number:</label>
                                            <div class="p-2 bg-gray-100 rounded-sm">
                                                @foreach ($endstyle2 as $i)
                                                    <span
                                                        class="p-1 m-1 border-2 border-gray-300 rounded-sm">{{ $i }}
                                                    </span>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                    <div class="mt-1 ">
                                        <label for="" class="from-label">Connection
                                            Size:</label><span class="text-red-500">*</span>
                                        <div class="grid grid-cols-4">
                                            @foreach ($sizes as $size)
                                                <div class="form-check">
                                                    <input type="checkbox" wire:model="connection_size_2"
                                                        value="{{ $size->size }}" class="form-check-input"><span
                                                        class="m-2">{{ $size->size }}"</span>
                                                </div>
                                            @endforeach
                                        </div>
                                        @error('connection_size_2')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="" class="from-label">Collar Part</label><span
                                    class="text-red-500">
                                    *</span>
                                <select wire:model="collar_id" id="" class="form-select" required>
                                    <option value="">--Select Collars Part--</option>
                                    @if ($collars->isNotEmpty())

                                        @foreach ($collars as $item)
                                            <option value="{{ $item->id }}">{{ $item->part_number }}</option>
                                        @endforeach
                                    @else
                                        <option value="" selected>No Matching Collar!</option>
                                    @endif
                                </select>
                            </div>
                            @error('collar_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="" class="from-label">Max Length</label><span
                                    class="text-red-500">
                                    *</span>
                                <input type="text" class="form-control" wire:model="max_length"
                                    placeholder="Max Length" required>
                            </div>
                            @error('max_length')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>

                    <div class="" x-show="tab == 'tab3'">
                        <div class="col-12">
                            <div class="form-group">
                                @foreach ($allRegulations as $regulation)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" wire:model="regulations"
                                            id="" value="{{ $regulation->name }}">
                                        <label class="form-check-label">
                                            {{ $regulation->name }}
                                        </label>
                                    </div>
                                @endforeach

                            </div>
                            @error('regulations')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                        <div class="mt-2 row">
                            <div class="col-md-6 col-sm-12">

                                <div class="form-group">
                                    <x-buttons.create
                                        title="{{ __('Create') }} {{ ucwords(Str::singular($module_name)) }}">
                                        {{ __('Create') }}
                                    </x-buttons.create>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-12">
                                <div class="float-end">
                                    <div class="form-group">
                                        <x-buttons.cancel />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('after-scripts')
    <script>
        // new TomSelect('#select-role', {
        //     plugins: ['remove_button'],
        //     maxItems: 3,
        // });
        $('#select-role').multiselect({
            columns: 1,
            placeholder: 'Select Languages'
        });
    </script>
@endpush
