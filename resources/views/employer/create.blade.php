<x-layout>
    <x-card>
        <form action="{{ route('employer.store') }}" method="post">
            @csrf
            <div class="mb-4">
                <p>In order to become and employer, please provide the information below</p>
            </div>
            <div class="mb-4">
                <x-label for="company_name" :required="true">
                    Company Name:
                </x-label>
                <x-text-input type="text" name="company_name"/>
            </div>
            <x-button class="w-full bg-green-100"> Submit </x-button>

        </form>
    </x-card>
</x-layout>
