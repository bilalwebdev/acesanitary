<div>
    <h4>"{{ $hose->model[0] ?? '' }}" Series - {{ $hose->model ?? '' }} </h4>
    <div class="mt-4 row">
        <div class="col">

            <table class="table table-hover table-responsive-sm">
                <thead>
                    <tr>
                        <th>Media</th>
                        <th>{{ $material->name }}</th>
                        <th class="text-end">{{ __('labels.backend.action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $value = 0;
                    @endphp
                    @foreach ($media as $item)
                        <tr>


                            <td>
                                <strong>
                                    {{ $item->name }}
                                </strong>
                            </td>

                            <td>
                                <div class="col-2">

                                    @if ($mediaId == $item->id)
                                        <select wire:model="compatibility" id="" class="rounded-lg" required>
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="X">X</option>
                                            <option value="-">-</option>
                                        </select>
                                    @else
                                        @php
                                            $comp_media_list = $item->compatibilityInfo()->get();
                                        @endphp
                                        @if (count($comp_media_list) > 0)
                                            @php
                                                foreach ($comp_media_list as $list) {
                                                    if ($list->series_id == $series_id && $list->hoseMaterial == $material->name) {
                                                        $value = $list->compatibility;
                                                    }
                                                }
                                                if ($value) {
                                                    echo "$value";
                                                    $value = 0;
                                                } else {
                                                    echo '<select wire:model="compatibility"
                                                    disabled>
                                                    <option  >A</option>
                                                    <option >B</option>
                                                    <option >X</option>
                                                    <option >-</option>
                                                </select>';
                                                }

                                            @endphp
                                        @else
                                            <select wire:model="compatibilityy" id="" disabled
                                                class="bg-gray-200 rounded-lg">
                                                <option value="A">A</option>
                                                <option value="B">B</option>
                                                <option value="X">X</option>
                                                <option value="-">-</option>
                                            </select>
                                        @endif
                                    @endif


                                </div>
                            </td>

                            <td class="text-end">
                                @if ($mediaId == $item->id)
                                    @can('edit_' . $module_name)
                                        <button class="btn btn-primary"
                                            wire:click="save({{ $item->id }})">Save</i></button>
                                    @endcan
                                @else
                                    @can('edit_' . $module_name)
                                        <button class="btn btn-primary"
                                            wire:click="edit({{ $item->id }})">Edit</i></button>
                                    @endcan
                                @endif


                                <a type="button" title="{{ __('labels.backend.delete') }}"
                                    class="btn btn-danger btn-md" data-bs-toggle="modal"
                                    data-bs-target="#exampleModalCenter-{{ $item->id }}">
                                    <i class="fas fa-trash-alt"></i></a>



                                <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
                                    id="exampleModalCenter-{{ $item->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalCenterTitle" aria-modal="true" role="dialog">
                                    <div class="modal-dialog modal-dialog-centered relative w-auto pointer-events-none">
                                        <div
                                            class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                                            <div
                                                class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
                                                <h5 class="text-xl font-medium leading-normal text-gray-800"
                                                    id="exampleModalScrollableLabel">
                                                    Delete this {{ ucwords(Str::title(Str::singular($module_name))) }}?
                                                </h5>
                                                <button type="button"
                                                    class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body flex justify-start items-start relative p-4">
                                                <p>Are you sure you want to delete this?</p>
                                            </div>
                                            <div
                                                class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
                                                <button type="button"
                                                    class="inline-block px-6 py-2.5 bg-purple-600 text-white font-medium text-md  leading-tight rounded shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out"
                                                    data-bs-dismiss="modal">
                                                    Cancel
                                                </button>
                                                <a type="button"
                                                    href="{{ route('backend.chemical-compatibility.destroy', [
                                                        'hose_id' => $this->hose->id,
                                                        'media' => $item->id,
                                                    ]) }}"
                                                    class="inline-block px-6 py-2.5 bg-red-600 text-white font-medium text-md  leading-tight rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out ml-1">
                                                    Delete
                                                </a>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @error('compatibility')
                <span class="text-danger">Error: {{ $message }}</span>
            @enderror

        </div>
    </div>

</div>
<div class="card-footer">
    <div class="row">
        <div class="col-7">
            <div class="float-left">
                {{ count($media) }} {{ __('labels.backend.total') }}
            </div>
        </div>
        <div class="col-5">
            <div class="float-end">
                {{ $media->links() }}
            </div>
        </div>
    </div>
</div>
