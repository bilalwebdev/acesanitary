<div>

    <div class="mt-4 row">
        <div class="col">


            <form action="" wire:submit.prevent="update">
                <div class="mb-2 row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="" class="from-label">Item</label><span class="text-red-500">*</span>
                            <input type="text" class="form-control" wire:model="ace_price.item" placeholder="Item"
                                required>
                        </div>
                        @error('ace_price.item')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="" class="from-label">Qty</label><span class="text-red-500">*</span>
                            <input type="text" class="form-control" wire:model="ace_price.qty" placeholder="Qty"
                                required>
                        </div>
                        @error('ace_price.qty')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mt-2 col-6">
                        <div class="form-group">
                            <label for="" class="from-label">Unit Price List</label><span
                                class="text-red-500">*</span>
                            <input type="text" class="form-control" wire:model="ace_price.unit_price"
                                placeholder="Unit Price List" required>
                        </div>
                        @error('ace_price.unit_price')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mt-2 col-6">
                        <div class="form-group">
                            <label for="" class="from-label">Unit of Measure</label><span
                                class="text-red-500">*</span>
                            <select wire:model="ace_price.unit_of_measure" id="" class="form-select" required>
                                <option value="">--Select Unit of Measure--</option>
                                <option value="FT">FT</option>
                                <option value="IN">IN</option>
                            </select>
                        </div>
                        @error('ace_price.unit_of_measure')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mt-2 col-12">
                        <div class="form-group">
                            <label for="" class="from-label">Description</label><span
                                class="text-red-500">*</span>
                            <input type="text" class="form-control" wire:model="ace_price.description"
                                placeholder="Description" required>
                        </div>
                        @error('ace_price.description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mt-2 col-6">
                        <div class="form-group">
                            <label for="" class="from-label">Bulk Price</label><span
                                class="text-red-500">*</span>
                            <input type="text" class="form-control" wire:model="ace_price.bulk_price"
                                placeholder="Bulk Price" required>
                        </div>
                        @error('ace_price.bulk_price')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mt-2 col-6">
                        <div class="form-group">
                            <label for="" class="from-label">Bulk Unit of Measure</label><span
                                class="text-red-500">*</span>
                            <select wire:model="ace_price.bulk_unit_of_measure" id="" class="form-select"
                                required>
                                <option value="">--Select Unit of Measure--</option>
                                <option value="FT">FT</option>
                                <option value="IN">IN</option>
                            </select>
                        </div>
                        @error('ace_price.bulk_unit_of_measure')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mt-2 col-6">
                        <div class="form-group">
                            <label for="" class="from-label">Coil Length</label><span
                                class="text-red-500">*</span>
                            <input type="text" class="form-control" wire:model="ace_price.coil_length"
                                placeholder="Coil Length" required>
                        </div>
                        @error('ace_price.coil_length')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mt-2 col-6">
                        <div class="form-group">
                            <label for="" class="from-label">Factory Assembly Only?</label><span
                                class="text-red-500">*</span>
                            <select wire:model="ace_price.factory_assembly" id="" class="form-select" required>
                                <option value="0" selected>No</option>
                                <option value="1">Yes</option>
                            </select>
                        </div>
                        @error('ace_price.factory_assembly')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mt-2 col-6">
                        <div class="form-group">
                            <label for="" class="from-label">Assembly Charge</label><span
                                class="text-red-500">*</span>
                            <input type="text" class="form-control" wire:model="assembly_charge"
                                placeholder="Assembly Charge">
                        </div>
                    </div>
                    <div class="mt-2 col-6">
                        <div class="form-group">
                            <label for="" class="from-label">Net Price</label><span
                                class="text-red-500">*</span>
                            <input type="text" class="form-control" wire:model="ace_price.net_price"
                                placeholder="Net Price" required>
                        </div>
                        @error('ace_price.net_price')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="flex justify-between">
                    <div class="col-4">
                        <div class="form-group">
                            <x-backend.buttons.save />
                        </div>
                    </div>
                    <div class="">
                        <x-backend.buttons.return-back>Cancel</x-backend.buttons.return-back>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
