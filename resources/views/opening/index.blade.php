<x-layout>
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
