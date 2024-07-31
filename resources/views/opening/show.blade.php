<x-layout>
    <x-breadcrumbs class="mb-4"
       :links="['Openings' => route('openings.index'), $opening->title => '#']" />
    <x-opening-card :$opening/>
</x-layout>
