<div>

    <div class="mt-4  row">
        <div class="col">

            <form wire:submit.prevent="update">
                @csrf
                <div class="col-12">
                    <div class="form-group">
                        <label for="" class="from-label">Name</label><span class="text-red-500">*</span>
                        <input type="text" class="form-control" wire:model="model.name" placeholder="Name" required>
                    </div>
                    @error('model.name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="row mt-2">
                    <div class="col-4">
                        <div class="form-group">
                            <x-backend.buttons.save />
                        </div>
                    </div>

                    <div class="col-8">
                        <div class="float-end">
                            <x-deleteEntity :id="$model->id" :module="$module_name" />
                            <x-backend.buttons.return-back>Cancel</x-backend.buttons.return-back>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
