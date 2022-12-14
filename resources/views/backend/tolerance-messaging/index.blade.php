@extends('backend.layouts.app')

@section('title')
    {{ __($module_action) }} {{ __($module_title) }}
@endsection

@section('breadcrumbs')
    <x-backend-breadcrumbs>
        <x-backend-breadcrumb-item type="active" icon='{{ $module_icon }}'>{{ __($module_title) }}
        </x-backend-breadcrumb-item>
    </x-backend-breadcrumbs>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <x-backend.section-header>
                <i class="{{ $module_icon }}"></i> {{ __($module_title) }} <small
                    class="text-muted">{{ __($module_action) }}</small>

                <x-slot name="subtitle">
                    @lang(':module_name Management Dashboard', ['module_name' => Str::title($module_name)])
                </x-slot>
                <x-slot name="toolbar">

                    <a class="btn btn-info btn-md" href="{{ route('backend.tolerance-messaging.import') }}"
                        data-toggle="tooltip" title="{{ __('Import') }} {{ ucwords(Str::singular($module_name)) }}"> <i
                            class="fas fa-upload"></i></a>
                    <x-buttons.create route='{{ route("backend.$module_name.create") }}'
                        title="{{ __('Create') }} {{ ucwords(Str::singular($module_name)) }}" />
                </x-slot>
            </x-backend.section-header>

            <div class="mt-4 row">
                <div class="col">
                    <table class="table table-hover table-responsive-sm">
                        @if ($tolerance_messages->isNotEmpty())
                            <thead>
                                <tr>
                                    <th>Message</th>
                                    <th class="text-end">{{ __('labels.backend.action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tolerance_messages as $message)
                                    <tr>
                                        <td>
                                            <div id="message_row{{ $message->id }}"
                                                onmouseover='fullMessage("{{ $message->message }}","{{ $message->id }}")'>
                                                {{ Str::limit($message->message, 50) }}
                                            </div>
                                        </td>
                                        <td class="text-end">
                                            @can('edit_' . $module_name)
                                                <x-buttons.edit
                                                    route="{{ route('backend.tolerance-messaging.edit', $message->id) }}"
                                                    title="{{ __('Edit') }} {{ ucwords(Str::singular($module_name)) }}"
                                                    small="true" />
                                            @endcan
                                            <x-buttons.show
                                                route="{{ route('backend.tolerance-messaging.show', $message->id) }}"
                                                title="{{ __('Show') }} {{ ucwords(Str::singular($module_name)) }}"
                                                small="true" />
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        @else
                            <span
                                class="font-semibold p-3 text-red-900 bg-red-200 rounded-md flex justify-start items-start"
                                role="alert">No
                                Data Found!
                            </span>
                        @endif
                    </table>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-7">
                    <div class="float-left">
                        {{ count($tolerance_messages) }} {{ __('labels.backend.total') }}
                    </div>
                </div>
                <div class="col-5">
                    <div class="float-end">
                        {{ $tolerance_messages->links() }}
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@push('after-scripts')
    <script>
        function fullMessage(text, msg_id) {
            const message = document.getElementById('message_row' + msg_id);
            console.log(message);

            // message.innerHTML = text;
        }
    </script>
@endpush
