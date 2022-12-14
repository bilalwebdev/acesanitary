<div>

    <div class="mt-4 row">
        <div class="col">
            <form action="" wire:submit.prevent="store">
                <div class="row">
                    <div class="col-md-8 col-sm-12">
                        <div class="mb-2 row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="" class="from-label">Model</label>
                                    <span class="text-red-500">*</span>
                                    <input type="text" class="form-control" wire:model="model" placeholder="Model"
                                        required>
                                </div>
                                @error('model')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="" class="from-label">Name</label>
                                    <span class="text-red-500">*</span>
                                    <input type="text" class="form-control" wire:model="name" placeholder="Name"
                                        required>
                                </div>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mt-2 col-6">
                                <div class="form-group">
                                    <label for="" class="from-label">Part Number</label>
                                    <span class="text-red-500">*</span>
                                    <input type="text" class="form-control" wire:model="part_number"
                                        placeholder="Part Number" required>
                                </div>
                                @error('part_number')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mt-2 col-6">
                                <div class="form-group">
                                    <label for="" class="from-label">Size</label>
                                    <span class="text-red-500">*</span>
                                    <select wire:model="size" id="" class="form-select" required>
                                        <option value="">--Select Size--</option>
                                        @foreach ($hose_sizes as $size)
                                            <option value="{{ $size->size }}">{{ $size->size }} "</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('size')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mt-2 col-6">
                                <div class="form-group">
                                    <label for="" class="from-label">Step Up Supported</label>
                                    <span class="text-red-500">*</span>
                                    <select wire:model="step_up_supported" id="" class="form-select" required>
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                                @error('step_up_supported')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mt-2 col-6">
                                <div class="form-group">
                                    <label for="" class="from-label">Price</label>
                                    <span class="text-red-500">*</span>
                                    <input type="text" class="form-control" wire:model="price" placeholder="Price"
                                        required>
                                </div>
                                @error('price')
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
                                @if (isset($image))
                                    <img src="{{ $image->temporaryUrl() }}" alt=""hight="450px" width="180px">
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
                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to
                                upload image</span> or drag and drop</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG </p>
                        <input type="file" wire:model="image" class="hidden" id="image-upload">
                        @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                </div>

                <div class="row">
                    <div class="col-6">

                        <div class="form-group">
                            <x-buttons.create title="{{ __('Create') }} {{ ucwords(Str::singular($module_name)) }}">
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
</div>
