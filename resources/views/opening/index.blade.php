<x-layout>
    @foreach($openings as $opening)
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
                        <p>Company Name</p>
                        <p>{{$opening->location}}</p>
                    </div>
                </div>
                <div class="flex space-x-1 text-xs">
                    <x-tag >{{Str::ucfirst($opening->experience)}}</x-tag>
                    <x-tag>{{$opening->category}}</x-tag>
                </div>
            </div>
            <p class="text-sm text-slate-500">{!! nl2br(e($opening->description)) !!}</p>
        </x-card>

    @endforeach
</x-layout>
