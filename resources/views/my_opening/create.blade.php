<x-layout>
    <x-breadcrumbs class="mb-4"
                   :links="['My openings' => route('my_openings.index'),
                    'Create' => '#']" />
    <x-card class="mb-4">
        <form action="{{ route('my_openings.store') }}" method="post">
            @csrf
            <div class="mb-4 grid grid-cols-2 gap-4">
                <div>
                    <x-label for="title" :required="true">
                        Opening Title
                    </x-label>
                    <x-text-input name="title" />
                </div>
                <div>
                    <x-label for="location" :required="true">
                        Opening location
                    </x-label>
                    <x-text-input name="location" />
                </div>
                <div class="col-span-2">
                    <x-label for="salary" :required="true">
                        Opening Title
                    </x-label>
                    <x-text-input name="salary" />
                </div>
            </div>
        </form>

    </x-card>
</x-layout>
