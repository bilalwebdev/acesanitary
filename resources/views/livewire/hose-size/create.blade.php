<div>

    <div class="mt-4  row">
        <div class="col">

            <form wire:submit.prevent="store">
                @csrf
                <div class="col-12">
                    <div class="form-group">
                        <label for="" class="from-label">Size</label><span class="text-red-500">*</span>
                        <input type="text" class="form-control" wire:model="size" placeholder="Size" required>
                    </div>
                    @error('size')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="row mt-2">
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
