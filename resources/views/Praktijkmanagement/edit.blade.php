<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <h1>{{ $title }}</h1>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('praktijkmanagement.update', $user->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                            <div>
                                <label for="naam" class="block font-medium text-sm text-gray-700">Naam</label>
                                <input id="naam" name="naam" type="text" class="form-input mt-1 block w-full" value="{{ old('naam', $user->naam) }}">
                                <x-input-error :messages="$errors->get('naam')" class="mt-2" />
                            </div>

                            <div>
                                <label for="email" class="block font-medium text-sm text-gray-700">E-mail</label>
                                <input id="email" name="email" type="email" class="form-input mt-1 block w-full" value="{{ old('email', $user->email) }}">
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <div class="md:col-span-2">
                                <label for="rol" class="block font-medium text-sm text-gray-700">Rol</label>
                                <select name="rol" id="rol" class="form-select mt-1 block w-full">
                                    <option value="">--- Kies rol ---</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->name }}" @selected($user->roles->pluck('name')->contains($role->name))>{{ $role->name }}</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('rol')" class="mt-2" />
                            </div>

                        </div>

                        <div class="mt-6 flex items-center gap-3">
                            <button type="submit" class="btn btn-primary">Opslaan</button>
                            <a href="{{ route('praktijkmanagement.index') }}" class="btn btn-secondary">Annuleren</a>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
