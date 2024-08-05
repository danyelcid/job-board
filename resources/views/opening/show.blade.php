<x-layout>
    <x-breadcrumbs class="mb-4"
       :links="['Openings' => route('openings.index'), $opening->title => '#']" />
    <x-opening-card :$opening>
        <p class="text-sm text-slate-500 mb-4">{!! nl2br(e($opening->description)) !!}</p>
    </x-opening-card>
</x-layout>
