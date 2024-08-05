@php use App\Models\Opening; @endphp

<x-layout>
    <x-breadcrumbs class="mb-4"
                   :links="['Openings' => route('openings.index')]"/>
    <x-card class="mb-4 text-sm " x-data="">
        <form x-ref="filters" action="{{ route('openings.index') }}" method="get" id="filters">

            <div class="grid grid-cols-2 gap-3">
                <div>
                    <div class="mb-2 font-semibold">Search:</div>
                    <x-text-input name="search" value="{{ request('search') ?? '' }}" placeholder="Type your search"
                                  form-ref="filters"/>
                </div>
                <div>
                    <div class="mb-2 font-semibold">Salary:</div>
                    <div class="flex space-x-2">
                        <x-text-input name="min_salary" value="{{ request('min_salary') ?? '' }}" placeholder="From"
                                      form-ref="filters"/>
                        <x-text-input name="max_salary" value="{{ request('max_salary') ?? '' }}" placeholder="To"
                                      form-ref="filters"/>

                    </div>
                </div>
                <div>
                    <div class="mb-2 font-semibold">Experience:</div>
                    <x-radio-group
                        name="experience"
                        :options="array_combine(
                                    array_map('ucfirst', Opening::$experience),
                                                Opening::$experience)"/>
                </div>
                <div>
                    <div class="mb-2 font-semibold">Category:</div>
                    <x-radio-group
                        name="category"
                        :options="Opening::$category"/>
                </div>
            </div>
            <div class="flex justify-center">
                <x-button type="submit" class="w-full">Filter</x-button>
            </div>
        </form>
    </x-card>

    {{-- every opening--}}
    @foreach($openings as $opening)
        <x-opening-card class="mb-4" :$opening>
            <div>
                <x-link-button :href="route('openings.show', $opening)">
                    Show
                </x-link-button>
            </div>
        </x-opening-card>
    @endforeach
</x-layout>
