<x-layout>
    <x-breadcrumbs class="mb-4"
    :links="['My Applications'=>'#']"/>
    @forelse($applications as $application)
        <x-opening-card :opening="$application->opening">
            <div class="flex items-center justify-between text-sm text-slate-500">
                <div>
                    <p>Applied: {{ $application->created_at->diffForHumans() }}</p>
                    <p>Other {{Str::plural('applicant', $application->opening->opening_applications_count -1 ).': '. number_format($application->opening->opening_applications_count -1) }}</p>
                    <p>Your expected salary: ${{ number_format( $application->expected_salary )}}</p>
                    <p>Average asked salary: ${{ number_format( $application->opening->opening_applications_avg_expected_salary )}}</p>
                </div>
                <div>2</div>
            </div>
        </x-opening-card>

    @empty
        <div class="my-8 rounded-md border-l-8 border-slate-300 bg-slate-100 text-slate-700 p-4 shadow-sm" role="alert">
            <p class="font-bold">Notice:</p>
            <p>You haven't applied for Any opening yet.</p>
        </div>
    @endforelse
</x-layout>
