<div>

    <div class="mt-4 row">
        <div class="col">


            <form action="" wire:submit.prevent="store">
                <div class="mb-2 row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="" class="from-label">Item</label><span class="text-red-500">*</span>
                            <input type="text" class="form-control" wire:model="item" placeholder="Item" required>
                        </div>
                        @error('item')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="" class="from-label">Qty</label><span class="text-red-500">*</span>
                            <input type="text" class="form-control" wire:model="qty" placeholder="Qty" required>
                        </div>
                        @error('qty')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mt-2 col-6">
                        <div class="form-group">
                            <label for="" class="from-label">Unit Price List</label><span
                                class="text-red-500">*</span>
                            <input type="text" class="form-control" wire:model="unit_price"
                                placeholder="Unit Price List" required>
                        </div>
                        @error('unit_price')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mt-2 col-6">
                        <div class="form-group">
                            <label for="" class="from-label">Unit of Measure</label><span
                                class="text-red-500">*</span>
                            <select wire:model="unit_of_measure" id="" class="form-select" required>
                                <option value="">--Select Unit of Measure--</option>
                                <option value="FT">FT</option>
                                <option value="IN">IN</option>
                            </select>
                        </div>
                        @error('unit_of_measure')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mt-2 col-12">
                        <div class="form-group">
                            <label for="" class="from-label">Description</label><span
                                class="text-red-500">*</span>
                            <input type="text" class="form-control" wire:model="description"
                                placeholder="Description" required>
                        </div>
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mt-2 col-6">
                        <div class="form-group">
                            <label for="" class="from-label">Bulk Price</label><span
                                class="text-red-500">*</span>
                            <input type="text" class="form-control" wire:model="bulk_price" placeholder="Bulk Price"
                                required>
                        </div>
                        @error('bulk_price')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mt-2 col-6">
                        <div class="form-group">
                            <label for="" class="from-label">Bulk Unit of Measure</label><span
                                class="text-red-500">*</span>
                            <select wire:model="bulk_unit_of_measure" id="" class="form-select" required>
                                <option value="">--Select Unit of Measure--</option>
                                <option value="FT">FT</option>
                                <option value="IN">IN</option>
                            </select>
                        </div>
                        @error('bulk_unit_of_measure')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mt-2 col-6">
                        <div class="form-group">
                            <label for="" class="from-label">Coil Length</label><span
                                class="text-red-500">*</span>
                            <input type="text" class="form-control" wire:model="coil_length"
                                placeholder="Coil Length" required>
                        </div>
                        @error('coil_length')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mt-2 col-6">
                        <div class="form-group">
                            <label for="" class="from-label">Factory Assembly Only?</label><span
                                class="text-red-500">*</span>
                            <select wire:model="factory_assembly" id="" class="form-select" required>
                                <option value="0" selected>No</option>
                                <option value="1">Yes</option>
                            </select>
                        </div>
                        @error('factory_assembly')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mt-2 col-6">
                        <div class="form-group">
                            <label for="" class="from-label">Assembly Charge</label>
                            <input type="text" class="form-control" wire:model="assembly_charge"
                                placeholder="Assembly Charge">
                        </div>
                    </div>
                    <div class="mt-2 col-6">
                        <div class="form-group">
                            <label for="" class="from-label">Net Price</label><span
                                class="text-red-500">*</span>
                            <input type="text" class="form-control" wire:model="net_price"
                                placeholder="Net Price" required>
                        </div>
                        @error('net_price')
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

            {{ html()->form()->close() }}
        </div>
    </div>
</div>
