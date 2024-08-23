<x-layout>
    <x-breadcrumbs class="mb-4"
       :links="['Openings' => route('openings.index'), $opening->title => '#']" />
    <x-opening-card :$opening>
        <p class="text-sm text-slate-500 mb-4">{!! nl2br(e($opening->description)) !!}</p>

        @auth()
            @can('apply', $opening)
                <x-link-button :href=" route('opening.application.create', $opening)">Apply!</x-link-button>
            @else
                <div class=" text-center text-sm text-slate-500">
                    You already applied for this Opening
                </div>
            @endcan
        @else
            <div class=" text-center text-sm text-slate-500">
                You need to <a class="font-semibold hover:underline" href="{{ route('auth.create') }}">Sing in</a> before applying.
            </div>
        @endauth

        @can('apply', $opening)
            <x-link-button :href=" route('opening.application.create', $opening)">Apply!</x-link-button>
        @endcan

    </x-opening-card>
    <x-card class="mb-4">
        <h2 class="mb-4 text-lg font-medium">
            More openings from {{ $opening->employer->company_name }}
        </h2>
        <div class="text-sm text-slate-500">
            @foreach($opening->employer->openings as $job)
                <div class="mb-4 flex justify-between">
                    <div>
                        <a href="{{ route('openings.show', $job) }}">{{$job->title}}</a>
                        <p class="text-xs">{{ $job->created_at->diffForHumans() }}</p>
                    </div>
                    <div>
                       $ {{ number_format( $job->salary) }}
                    </div>
                </div>
            @endforeach
        </div>
    </x-card>
</x-layout>
