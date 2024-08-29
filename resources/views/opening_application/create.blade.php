<x-layout>
    <x-breadcrumbs class="mb-4"
           :links="['Openings' => route('openings.index'),
                    $opening->title => route('openings.show', $opening),
                     'Apply' => '#']" />

    <x-opening-card  :$opening />
    <x-card>
        <h2 class="mb-4 text-lg font-medium">
            Your Opening Application
        </h2>
        <form action="{{ route('opening.application.store', $opening) }}"
              method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <x-label for="expected_salary" :required="true"> Expected salary</x-label>
                <x-text-input type="number" name="expected_salary"/>
            </div>
            <div class="mb-4">
                <x-label for="cv" :required="true">
                    Upload your CV
                </x-label>
                <x-text-input type="file" name="cv"/>
            </div>
            <x-button class="w-full bg-green-100"> Apply </x-button>
        </form>
    </x-card>
</x-layout>
