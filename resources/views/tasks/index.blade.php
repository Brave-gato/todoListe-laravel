<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('tasks.store') }}" class="flex flex-col space-y-4 text-gray-500">

                        @csrf

                        <div>
                            <x-input-label for="name" :value="__('Nom')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                :value="old('name')" autofocus />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <div class="flex justify-end">
                            <x-primary-button type="submit">
                                {{ __('Ajouter') }}
                            </x-primary-button>
                        </div>
                    </form>




                    <h1>Liste des tâches</h1>
                    <ul>
                        @foreach ($tasks as $task)
                            <li>{{ $task->name }}</li>

                            <form method="POST" action="{{ route('tasks.status', $task) }}">
                                @csrf
                                @method('PATCH')
                                <input type="checkbox" name="is_done" {{ $task->is_done ? 'checked' : '' }}
                                    onchange="this.form.submit()">
                                <label for="is_done">{{ $task->is_done ? 'Completed' : 'Incomplete' }}</label>
                            </form>
                        @endforeach
                    </ul>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
