<x-layout>
    <x-breadcrumbs class="mb-4"
                   :links="['My openings' => '#']" />
    <div class="mb-8 text-right">
        <x-link-button href="{{ route('my_openings.create') }}">Add new</x-link-button>
    </div>
    @forelse($openings as $opening)
        <x-opening-card :$opening>
            <div class="flex space-x-2">
                <x-link-button href="{{ route('my_openings.edit', $opening) }}">Edit</x-link-button>
                <form action="{{ route('my_openings.destroy', $opening) }}" method="post">
                    @csrf
                    @method('delete')
                    <x-button>Delete</x-button>
                </form>
            </div>

            <div class="my-4">
                Applications for this opening
            </div>
            <div class="text-sm  text-slate-500">
                @forelse($opening->openingApplications as $application)
                    <div class="mb-4 flex justify-between items-end">
                        <div>
                            <div>{{ $application->user->name }}</div>
                            <div>{{ $application->created_at->diffForHumans() }}</div>
                            <div>{{ 'CV' }}</div>
                        </div>
                        <div> Expected Salary: ${{ number_format($application->expected_salary) }}</div>
                    </div>

                @empty
                    <div class="my-4 rounded-md border border-l-4 border-amber-400 bg-amber-50 p-2 shadow-sm" role="alert">
                        <p class="text-amber-800 font-semibold">No applications for this opening yet</p>
                    </div>
                @endforelse

            </div>

        </x-opening-card>
    @empty
        <div class="my-4 rounded-md border border-l-4 border-amber-400 bg-amber-50 p-2 shadow-sm" role="alert">
            <p class="text-amber-800 font-semibold">No openings were found</p>
            <p class="text-amber-800 ">Post your first job opening
                <a class="text-indigo-600 hover:underline" href="{{ route('my_openings.create') }}">here!</a></p>
        </div>
    @endforelse

</x-layout>
