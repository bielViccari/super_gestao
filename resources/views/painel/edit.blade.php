<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                Editar Usuário - {{ $user->name }}
                            </h2>
                    
                            <p class="mt-1 text-sm text-gray-600">
                                {{ __("Atualize as informações correspondentes do usuário.") }}
                            </p>
                        </header>
                    
                        <!--Form to update the employee informations-->
                        <form method="POST" action="{{route('painel.update', $user->id)}}" class="mt-6 space-y-6">
                            @csrf
                            @method('PUT')

                            <div>
                                <x-input-label for="name" :value="__('Nome')" />
                                @if($errors->has('name'))
                                <input id="name" name="name" type="text" class="mt-1 block w-full border-red-500/50 text-gray-700 focus:border-red-800 focus:ring-red-800 rounded-md shadow-sm" />
                                <small class="text-red-700">{{ $errors->first('name') }}</small>
                                @else
                                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" value="{{ $user->name }}"/>
                                @endif
                            </div>

                            <div>
                                <x-input-label for="email" :value="__('Email')" />
                                @if($errors->has('email'))
                                <input id="email" name="email" type="text" class="mt-1 block w-full border-red-500/50 text-gray-700 focus:border-gray-800 focus:ring-gray-800 rounded-md shadow-sm" />
                                <small class="text-red-700">{{ $errors->first('email') }}</small>
                                @else
                                <x-text-input id="email" name="email" type="text" class="mt-1 block w-full" value="{{ $user->email }}"/>
                                @endif
                            </div>

                            <div>
                                <label for="select-admin" class="text-gray-700 flex flex-col">
                                Tornar administrador ?
                                <small class="text-red-700">* tenha certeza antes de tornar o usuário administrador do sistema, ele terá acesso a todas funcionalidades do sistema !</small>
                                    <select class="max-w-min mt-2 border-gray-500/50 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" name="admin" id="admin">
                                        <option value="0">não</option>
                                        <option value="1">sim</option>
                                    </select>
                                </label>
                            </div>
                    
                            <div class="flex items-center gap-4">
                                <button class="inline-flex items-center px-4 py-2 bg-amber-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-amber-700 focus:bg-amber-700 active:bg-amber-600 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2 transition ease-in-out duration-150">{{ __('Salvar Alterações') }}</button>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
        
        </div>    
    </div>
</x-app-layout>