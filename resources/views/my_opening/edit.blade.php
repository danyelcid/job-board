<x-layout>
    <x-breadcrumbs class="mb-4"
                   :links="['My openings' => route('my_openings.index'),
                    'Edit opening '. $opening->title => '#']" />
    <x-card class="mb-4">
        <form action="{{ route('my_openings.update', $opening) }}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-4 grid grid-cols-2 gap-4">
                <div>
                    <x-label for="title" :required="true">Opening Title</x-label>
                    <x-text-input name="title" :value="old('title') ?? $opening->title"/>
                </div>
                <div>
                    <x-label for="location" :required="true">Opening location</x-label>
                    <x-text-input name="location"  :value="old('location') ?? $opening->location"/>
                </div>
                <div class="col-span-2">
                    <x-label for="salary" :required="true">Salary</x-label>
                    <x-text-input name="salary" type="number" :value="old('salary') ?? $opening->salary"/>
                </div>
                <div class="col-span-2">
                    <x-label for="description" :required="true">Description</x-label>
                    <x-text-input name="description" type="textarea" :value="old('description') ?? $opening->description"/>
                </div>
                <div>
                    <x-label for="experience" :required="true">Experience</x-label>
                    <x-radio-group name="experience" :value="old('experience') ?? $opening->experience"
                                   :all-option="false"
                                   :options="array_combine(
                array_map('ucfirst', \App\Models\Opening::$experience),
                \App\Models\Opening::$experience,
            )" />
                </div>

                <div>
                    <x-label for="category" :required="true">Category</x-label>
                    <x-radio-group name="category" :all-option="false" :value="old('experience') ?? $opening->category"
                                   :options="\App\Models\Opening::$category" />
                </div>
                <div class="col-span-2">
                    <x-button class="w-full"> Edit opening </x-button>
                </div>
            </div>
        </form>

    </x-card>
</x-layout>
