<x-card class="mb-4">

    <div class="flex justify-between mb-1">
        <h2 class="text-lg font-medium">{{$opening->title}}</h2>
        <div class="text-slate-500">
            $ {{number_format( $opening->salary )}}
        </div>
    </div>
    <div class="mb-4 flex justify-between text-sm text-stone-500 items-center">
        <div class="flex">
            <div class="flex space-x-4">
                <p>{{ $opening->employer->company_name }}</p>
                <p>{{$opening->location}}</p>
            </div>
        </div>
        <div class="flex space-x-1 text-xs">
            <x-tag >
                <a href="{{ route('openings.index', ['experience' => $opening->experience]) }}">
                    {{Str::ucfirst($opening->experience)}}</a>
            </x-tag>
            <x-tag>
                <a href="{{ route('openings.index', ['category' => $opening->category]) }}">
                        {{$opening->category}}</a>
            </x-tag>
        </div>
    </div>
    {{ $slot }}
</x-card>
