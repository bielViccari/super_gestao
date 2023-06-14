<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                Editar Funcionário - {{ $funcionario->name }}
                            </h2>
                    
                            <p class="mt-1 text-sm text-gray-600">
                                {{ __("Atualize as informações correspondentes do funcionário.") }}
                            </p>
                        </header>
                    
                        <!--Form to update the employee informations-->
                        <form method="POST" action="{{route('funcionario.update', $funcionario->id)}}" class="mt-6 space-y-6">
                            @csrf
                            @method('PUT')
                            
                            <div>
                                <x-input-label for="name" :value="__('Nome')" />
                                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" value="{{ $funcionario->name }}" />
                            </div>
                    
                            <div>
                                <x-input-label for="section" :value="__('Setor')" />
                                <x-text-input id="section" name="section" type="text" class="mt-1 block w-full" value="{{ $funcionario->section }}" />
                            </div>

                            <div>
                                <x-input-label for="function" :value="__('Função')" />
                                <x-text-input id="function" name="function" type="text" class="mt-1 block w-full" value="{{ $funcionario->function }}" />
                            </div>

                            <div>
                                <select class="'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" name="status" id="status">
                                    <option hidden>Status</option>
                                    <option value="a">Ativo</option>
                                    <option value="v">Férias</option>
                                    <option value="d">Desativado</option>
                                </select>
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