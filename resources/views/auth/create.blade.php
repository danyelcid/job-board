<x-layout>
    <h1 class="text-2xl my-8 text-center font-medium text-slate-600" >
        Sing in into your account
    </h1>
    <x-card class="py-8 px-16">
        <form action="{{ route('auth.store') }}" method="post">
            @csrf
            <div class="mb-8">
                <x-label for="email" :required="true">E-mail</x-label>
                <x-text-input name="email" placeholder="Type you e-mail"/>
            </div>
            <div class="mb-8">
                <x-label for="password" :required="true">Password</x-label>
                <x-text-input name="password" type="password" placeholder="Type your password"/>
            </div>
            <div class="mb-8 flex justify-between text-xs font-medium">
                <div class="flex items-center space-x-2">
                    <input type="checkbox" class="rounded-sm border border-slate-400" name="remember" id="remember">
                    <label for="remember" class="">Remember me</label>
                </div>
                <div>
                    <a href="#" class="text-indigo-600 hover:underline">Forgot password?</a>
                </div>
            </div>
            <div class="mb-8 flex justify-between text-xs font-medium">
                <x-button class="w-full bg-green-100"> Login</x-button>
            </div>
        </form>
    </x-card>
</x-layout>
