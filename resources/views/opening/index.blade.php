<x-layout>
    <x-breadcrumbs class="mb-4"
           :links="['Openings' => route('openings.index')]" />
    <form action="{{ route('openings.index') }}" method="get" id="filters">
        <x-card class="mb-4 text-sm ">
            <div class="grid grid-cols-2 gap-3">
                <div>
                    <div class="mb-2 font-semibold">Search:</div>
                    <x-text-input name="search" value="{{ request('search') ?? '' }}" placeholder="Type your search" form-id="filters"/>
                </div>
                <div>
                    <div class="mb-2 font-semibold">Salary:</div>
                    <div class="flex space-x-2">
                        <x-text-input name="min_salary" value="{{ request('min_salary') ?? '' }}" placeholder="From" form-id="filters"/>
                        <x-text-input name="max_salary" value="{{ request('max_salary') ?? '' }}" placeholder="To" form-id="filters"/>

                    </div>
                </div>
                <div>
                    <div class="mb-2 font-semibold">Experience:</div>
                    <x-radio-group
                        name="experience"
                        :options="array_combine(
                                    array_map('ucfirst', \App\Models\Opening::$experience),
                                                \App\Models\Opening::$experience)"/>
                </div>
                <div>
                    <div class="mb-2 font-semibold">Category:</div>
                    <x-radio-group
                        name="category"
                        :options="\App\Models\Opening::$category"/>
                </div>
            </div>
            <button type="submit" class="w-full">Filter</button>
        </x-card>
    </form>
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
