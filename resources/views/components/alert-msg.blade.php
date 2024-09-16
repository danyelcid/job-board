<div role="alert"
    @class(['my-8 rounded-md border-l-4 border p-4 shadow-md flex items-center text-slate-700',
        'border-green-400 bg-green-50' => $type==='success',
        'border-red-400 bg-red-50' => $type==='error',
        'border-indigo-400 bg-indigo-50' => $type==='info',
        'border-amber-400 bg-amber-50' => $type==='warning',])>
    <div class="mr-4">
        @switch($type)
            @case('success')
                <ion-icon name="checkmark-done" size="large"></ion-icon>
                @break
            @case('error')
                <ion-icon name="bug" size="large"></ion-icon>
                @break
            @case('info')
                <ion-icon name="information-circle" size="large"></ion-icon>
                @break
            @case('warning')
                <ion-icon name="warning" size="large"></ion-icon>
                @break
            @default
                <ion-icon name="warning" size="large"></ion-icon>
        @endswitch
    </div>
    <div>
        <p class="font-bold">{{ $title }}</p>
        <p > {{ $message }}</p>
    </div>
</div>


