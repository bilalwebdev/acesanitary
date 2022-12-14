<div>

    <div class="mt-4 row">
        <div class="col">
            <form action="" wire:submit.prevent="store">
                <div class="row">
                    <div class="col-12">
                        <div class="mb-2 row">
                            <div class="mt-2 col-6">
                                <div class="form-group">
                                    <label for="" class="from-label">Category</label><span
                                        class="text-red-500">*</span>
                                    <select wire:model="category" id="" class="form-select" required>
                                        <option value="">--Select Category--</option>
                                        <option value="Collar">Collar</option>
                                        <option value="Nut">Nut</option>
                                        <option value="Step_Up">Step Up</option>
                                    </select>
                                </div>
                                @error('category')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-12 col-md-6 ">
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
                            <div class="mt-2 col-6">
                                <div class="form-group">
                                    <label for="" class="from-label">Size</label><span
                                        class="text-red-500">*</span>
                                    <select wire:model="size" id="" class="form-select" required>
                                        <option value="">--Select Size--</option>
                                        @foreach ($allSizes as $size)
                                            <option value="{{ $size->size }}">{{ $size->size }} "</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('size')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mt-2 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="" class="from-label">Price</label><span
                                        class="text-red-500">*</span>
                                    <input type="text" class="form-control" wire:model="price" placeholder="Price"
                                        required>
                                </div>
                                @error('price')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
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

            {{ html()->form()->close() }}
        </div>
    </div>
</div>
