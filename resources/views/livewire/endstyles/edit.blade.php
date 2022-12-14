<div>

    <div class="mt-4 row">
        <div class="col">


            <form action="" wire:submit.prevent="edit">
                <div class="row">
                    <div class="col-md-8 col-sm-12">
                        <div class="mb-2 row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="" class="from-label">Model</label>
                                    <span class="text-red-500">*</span>
                                    <input type="text" class="form-control" wire:model="endstyle.model"
                                        placeholder="Model" required>
                                </div>
                                @error('endstyle.model')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="" class="from-label">Name</label>
                                    <span class="text-red-500">*</span>
                                    <input type="text" class="form-control" wire:model="endstyle.name"
                                        placeholder="Name" required>
                                </div>
                                @error('endstyle.name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mt-2 col-6">
                                <div class="form-group">
                                    <label for="" class="from-label">Part Number</label>
                                    <span class="text-red-500">*</span>
                                    <input type="text" class="form-control" wire:model="endstyle.part_number"
                                        placeholder="Part Number" required>
                                </div>
                                @error('endstyle.part_number')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mt-2 col-6">
                                <div class="form-group">
                                    <label for="" class="from-label">Size</label>
                                    <span class="text-red-500">*</span>
                                    <select wire:model="endstyle.size" id="" class="form-select" required>
                                        <option value="">--Select Size--</option>
                                        @foreach ($allSizes as $size)
                                            <option value="{{ $size->size }}">{{ $size->size }} "</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('endstyle.size')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mt-2 col-6">
                                <div class="form-group">
                                    <label for="" class="from-label">Step Up Supported</label>
                                    <span class="text-red-500">*</span>
                                    <select wire:model="endstyle.step_up_supported" id="" class="form-select"
                                        required>
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                                @error('endstyle.step_up_supported')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mt-2 col-6">
                                <div class="form-group">
                                    <label for="" class="from-label">Price</label>
                                    <span class="text-red-500">*</span>
                                    <input type="text" class="form-control" wire:model="endstyle.price"
                                        placeholder="Price" required>
                                </div>
                                @error('endstyle.price')
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
                                        <img src="{{ asset('storage/' . $oldImage) }}" hight="550px" width="200px">
                                    @endif
                                </div>

                            </label>
                        </div>
                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to
                                change image</span> or drag and drop</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG </p>
                        <input type="file" wire:model="image" class="hidden" id="image-upload">
                        @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <x-backend.buttons.save />
                        </div>
                    </div>

                    <div class="col-8">
                        <div class="float-end">
                            <x-deleteEntity :id="$endstyle->id" :module="$module_name" />
                            <x-backend.buttons.return-back>Cancel</x-backend.buttons.return-back>
                        </div>
                    </div>
                </div>

            </form>

            {{ html()->form()->close() }}
        </div>
    </div>
</div>
