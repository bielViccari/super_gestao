<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Cadastro de Funcionário') }}
                            </h2>
                    
                            <p class="mt-1 text-sm text-gray-600">
                                {{ __("Adicione as informações correspondentes do funcionário.") }}
                            </p>
                        </header>
                    
                        <form method="POST" action="{{route('funcionario.store')}}" class="mt-6 space-y-6">
                            @csrf
                            <div>
                                <x-input-label for="name" :value="__('Nome')" />
                                @if($errors->has('name'))
                                <input id="name" name="name" type="text" class="mt-1 block w-full border-red-500/50 text-gray-700 focus:border-gray-800 focus:ring-gray-800 rounded-md shadow-sm" />
                                {{ $errors->first('name') }}
                                @else
                                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" />
                                @endif
                            </div>
                    
                            <div>
                                <x-input-label for="section" :value="__('Setor')" />
                                @if($errors->has('section'))
                                <input id="section" name="section" type="text" class="mt-1 block w-full border-red-500/50 text-gray-700 focus:border-gray-800 focus:ring-gray-800 rounded-md shadow-sm" />
                                {{ $errors->first('section') }}
                                @else
                                <x-text-input id="section" name="section" type="text" class="mt-1 block w-full"/>
                                @endif
                            </div>

                            <div>
                                <x-input-label for="function" :value="__('Função')" />
                                @if($errors->has('function'))
                                <input id="function" name="function" type="text" class="mt-1 block w-full border-red-500/50 text-gray-700 focus:border-gray-800 focus:ring-gray-800 rounded-md shadow-sm" />
                                {{ $errors->first('function') }}
                                @else
                                <x-text-input id="function" name="function" type="text" class="mt-1 block w-full"/>
                                @endif
                            </div>

                            <div>
                                @if ($errors->has('status'))
                                    <select class="'border-red-300 focus:border-red-500 focus:ring-red-500 rounded-md shadow-sm" name="status" id="status">
                                        <option hidden>Status</option>
                                        <option value="a">Ativo</option>
                                        <option value="v">Férias</option>
                                        <option value="d">Desativado</option>
                                    </select>
                                    {{ $errors->first('status') }}
                                @else
                                    <select class="'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" name="status" id="status">
                                        <option hidden>Status</option>
                                        <option value="a">Ativo</option>
                                        <option value="v">Férias</option>
                                        <option value="d">Desativado</option>
                                    </select>
                                @endif
                            </div>
                    
                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Salvar') }}</x-primary-button>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
        
        </div>    
    </div>
</x-app-layout>