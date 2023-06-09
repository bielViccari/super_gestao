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
                    
                    
                        <form class="mt-6 space-y-6">
                            <div>
                                <x-input-label for="name" :value="__('Nome')" />
                                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" />
                            </div>
                    
                            <div>
                                <x-input-label for="section" :value="__('Setor')" />
                                <x-text-input id="section" name="section" type="text" class="mt-1 block w-full"/>
                            </div>

                            <div>
                                <x-input-label for="function" :value="__('Função')" />
                                <x-text-input id="function" name="function" type="text" class="mt-1 block w-full"/>
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
                                <x-primary-button>{{ __('Salvar') }}</x-primary-button>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
    </div>
</x-app-layout>