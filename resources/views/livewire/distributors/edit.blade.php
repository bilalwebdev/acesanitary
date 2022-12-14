<div>

    <div class="mt-4 row">
        <div class="col">


            <form action="" wire:submit.prevent="edit">
                <div class="mb-2 row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="" class="from-label">Name</label><span class="text-red-500">*</span>
                            <input type="text" class="form-control" wire:model="distributor.name" placeholder="Name"
                                required>
                        </div>
                        @error('distributor.name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="" class="from-label">Email</label><span class="text-red-500">*</span>
                            <input type="email" class="form-control" wire:model="email" placeholder="Email" required>
                        </div>
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mt-2 col-6">
                        <div class="form-group">
                            <label for="" class="from-label">Phone</label><span class="text-red-500">*</span>
                            <input type="text" class="form-control" wire:model="distributor.phone"
                                placeholder="Phone" required>
                        </div>
                        @error('distributor.phone')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mt-2 col-6">
                        <div class="form-group">
                            <label for="" class="from-label">Site Url</label><span class="text-red-500">*</span>
                            <input type="url" class="form-control" wire:model="distributor.site_url"
                                placeholder="Site Url" required>
                        </div>
                        @error('distributor.site_url')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mt-2 col-6">
                        <div class="form-group">
                            <label for="" class="from-label">Distributor Margin</label><span
                                class="text-red-500">*</span>
                            <input type="text" class="form-control" wire:model="distributor.distributor_margin"
                                placeholder="Distributor Margin" required>
                        </div>
                        @error('distributor.distributor_margin')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mt-2 col-6">
                        <div class="form-group">
                            <label for="" class="from-label">Distributor Multiplier</label><span
                                class="text-red-500">*</span>
                            <input type="text" class="form-control" wire:model="distributor.distributor_multiplier"
                                placeholder="Distributor Multiplier" required>
                        </div>
                        @error('distributor.distributor_multiplier')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mt-2 col-12">
                        <div class="form-group">
                            <label for="" class="from-label">Address</label><span class="text-red-500">*</span>
                            <textarea type="text" class="form-control" wire:model="distributor.address" placeholder="Address" rows="5"
                                required></textarea>
                        </div>
                        @error('distributor.address')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mt-2 form-group">
                        <div class="row">
                            <div class="col-1">
                                <label for="" class="from-label">Status</label>
                            </div>
                            <div class="col-6">
                                <input type="checkbox" class="" wire:model="distributor.status">Active
                            </div>

                        </div>
                    </div>

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
                    <x-deleteEntity :id="$distributor->id" :module="$module_name" />
                    <x-backend.buttons.return-back>Cancel</x-backend.buttons.return-back>
                </div>
            </div>
        </div>


        </form>


    </div>
</div>
</div>
