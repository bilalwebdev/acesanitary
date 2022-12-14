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
                <form action="" wire:submit.prevent="update">
                    <div class="row" x-show="tab === 'tab1'">
                        <div class="col-md-8 col-sm-12">
                            <div class="mb-2 row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="" class="from-label">Model</label><span
                                            class="text-red-500">*</span>
                                        <select wire:model="hose.model" id="" class="form-select" required>
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
                                    @error('hose.model')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="" class="from-label">Part Number</label><span
                                            class="text-red-500">*</span>
                                        <input type="text" class="form-control" wire:model="part_number"
                                            placeholder="Part Number" required>
                                    </div>
                                    @error('part_number')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mt-2 col-12">
                                    <div class="form-group">
                                        <label for="" class="from-label">Name / Title</label><span
                                            class="text-red-500">*</span>
                                        <input type="text" class="form-control" wire:model="hose.name"
                                            placeholder="Name / Title" required>
                                    </div>
                                    @error('hose.name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mt-2 col-6">
                                    <div class="form-group">
                                        <label for="" class="from-label">Series</label><span
                                            class="text-red-500">*</span>
                                        <select wire:model="hose.series_id" id="" class="form-select" required>
                                            <option value="">--Select Series--</option>
                                            @if (isset($series))

                                                @foreach ($series as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    @error('hose.series')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mt-2 col-6">
                                    <div class="form-group">
                                        <label for="" class="from-label">Material</label><span
                                            class="text-red-500">*</span>
                                        <select wire:model="hose.material_id" id="" class="form-select"
                                            required>
                                            <option value="">--Select Material--</option>
                                            @foreach ($materials as $material)
                                                <option value="{{ $material->id }}">{{ $material->name }}</option>
                                            @endforeach
                                        </select>
                                        </select>
                                    </div>
                                    @error('hose.material')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mt-2 col-6">
                                    <div class="form-group">
                                        <label for="" class="from-label">Inner Diameter</label><span
                                            class="text-red-500">*</span>
                                        <select wire:model="hose.inner_diameter" class="form-select" required>
                                            <option value="">--Select Inner Diameter--</option>
                                            @foreach ($sizes as $size)
                                                <option value="{{ $size->size }}">{{ $size->size }} "</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('hose.inner_diameter')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mt-2 col-6">
                                    <div class="form-group">

                                        <label for="" class="from-label">Outer Diameter</label>
                                        <input type="text" wire:model="outer_diameter" id=""
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="mt-2 col-12">
                                    <div class="form-group">
                                        <label for="" class="from-label">Application Type</label><span
                                            class="text-red-500">*</span>
                                        <select wire:model="hose.app_type" class="form-select" required>
                                            <option value="" selected>Application Type</option>
                                            @foreach ($app_types as $type)
                                                <option value="{{ $type->name }}" selected>{{ $type->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('hose.app_type')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mt-2 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="" class="from-label">Max Cleaning Temprature</label><span
                                            class="text-red-500">*</span>
                                        <input type="text" class="form-control"
                                            wire:model="hose.max_cleaning_temprature" placeholder="Max Temprature"
                                            required>
                                    </div>
                                    @error('hose.max_cleaning_temprature')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mt-2 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="" class="from-label">Min Cleaning Temprature</label><span
                                            class="text-red-500">*</span>
                                        <input type="text" class="form-control"
                                            wire:model="hose.min_cleaning_temprature" placeholder="Min Temprature"
                                            required>
                                    </div>
                                    @error('hose.min_cleaning_temprature')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mt-2 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="" class="from-label">Max Process Temprature</label><span
                                            class="text-red-500">*</span>
                                        <input type="text" class="form-control"
                                            wire:model="hose.max_process_temprature" placeholder="Max Temprature"
                                            required>
                                    </div>
                                    @error('hose.max_process_temprature')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mt-2 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="" class="from-label">Min Process Temprature</label><span
                                            class="text-red-500">*</span>
                                        <input type="text" class="form-control"
                                            wire:model="hose.min_process_temprature" placeholder="Max Temprature"
                                            required>
                                    </div>
                                    @error('hose.min_process_temprature')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mt-2 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="" class="from-label">Deration</label><span
                                            class="text-red-500">*</span>
                                        <input type="text" class="form-control" wire:model="hose.deration"
                                            placeholder="Deration" required>
                                    </div>
                                    @error('hose.deration')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mt-2 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="" class="from-label">Max Cleaning Pressure</label><span
                                            class="text-red-500">*</span>
                                        <input type="text" class="form-control"
                                            wire:model="hose.max_cleaning_pressure"
                                            placeholder="Max Supported Pressure" required>
                                    </div>
                                    @error('hose.max_cleaning_pressure')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mt-2 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="" class="from-label">Min Cleaning Pressure</label><span
                                            class="text-red-500">*</span>
                                        <input type="text" class="form-control"
                                            wire:model="hose.min_cleaning_pressure"
                                            placeholder="Max Supported Pressure" required>
                                    </div>
                                    @error('hose.min_cleaning_pressure')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mt-2 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="" class="from-label">Max Process Pressure</label><span
                                            class="text-red-500">*</span>
                                        <input type="text" class="form-control"
                                            wire:model="hose.max_process_pressure" placeholder="Process Pressure"
                                            required>
                                    </div>
                                    @error('hose.max_process_pressure')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mt-2 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="" class="from-label">Min Process Pressure</label><span
                                            class="text-red-500">*</span>
                                        <input type="text" class="form-control"
                                            wire:model="hose.min_process_pressure" placeholder="Min Process Pressure"
                                            required>
                                    </div>
                                    @error('hose.min_process_pressure')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mt-2 col-6">
                                    <div class="form-group">
                                        <label for="" class="from-label">Price</label><span
                                            class="text-red-500">*</span>
                                        <input type="text" class="form-control" wire:model="hose.price"
                                            placeholder="Price" required>
                                    </div>
                                    @error('hose.price')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mt-2 col-6">
                                    <div class="form-group">
                                        <label for="" class="from-label">Unit of Measure</label><span
                                            class="text-red-500">*</span>
                                        <select wire:model="hose.unit_of_measure" id="" class="form-select"
                                            required>
                                            <option value="">--Select Unit of Measure--</option>
                                            <option value="FT">FT</option>
                                            <option value="IN">IN</option>
                                        </select>
                                    </div>
                                    @error('hose.unit_of_measure')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mt-2 col-6">
                                    <div class="form-group">
                                        <label for="" class="from-label">Full Coil OAL</label><span
                                            class="text-red-500">*</span>
                                        <input type="text" class="form-control" wire:model="hose.full_coil_oal"
                                            placeholder="Full Coil OAL" required>
                                    </div>
                                    @error('hose.full_coil_oal')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mt-2 col-12">
                                    <div class="form-group">
                                        <label for="" class="from-label">Short Description</label><span
                                            class="text-red-500">*</span>
                                        <textarea type="text" class="form-control" wire:model="hose.description" placeholder="Short Description"
                                            rows="5" required></textarea>
                                    </div>
                                    @error('hose.description')
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
                                        <select wire:model="hose.factory_assembly" id="" class="form-select"
                                            required>
                                            <option value="0">No</option>
                                            <option value="1">Yes</option>
                                        </select>
                                    </div>
                                    @error('hose.factory_assembly')
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
                                    <div class="" style="">
                                        @if (isset($image))
                                            <img src="{{ $image->temporaryUrl() }}" alt="" hight="550px"
                                                width="200px">
                                        @else
                                            <img src="{{ asset('storage/' . $oldImage) }}" hight="550px"
                                                width="200px">
                                        @endif
                                    </div>

                                </label>
                            </div>
                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click
                                    to
                                    change image</span> or drag and drop</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG </p>
                            <input type="file" wire:model="image" class="hidden" id="image-upload">
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row" x-show="tab === 'tab2'">
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
                                                <option value="{{ $item->part_number }}">{{ $item->model }}
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
                                                <option value="{{ $item->part_number }}">{{ $item->model }}
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
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="" class="from-label">Collar Part</label><span
                                    class="text-red-500">
                                    *</span>
                                <select wire:model="hose.collar_id" id="" class="form-select" required>
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
                            @error('hose.collar_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="" class="from-label">Max Length</label><span
                                    class="text-red-500">
                                    *</span>
                                <input type="text" class="form-control" wire:model="hose.max_length"
                                    placeholder="Max Length" required>
                            </div>
                            @error('hose.max_length')
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
                    </div>
                    <div class="mt-2 row">
                        <div class="col-4">
                            <div class="form-group">
                                <x-backend.buttons.save />
                            </div>
                        </div>

                        <div class="col-8">
                            <div class="float-end">
                                <x-deleteEntity :id="$hose->id" :module="$module_name" />
                                <x-backend.buttons.return-back>Cancel</x-backend.buttons.return-back>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
