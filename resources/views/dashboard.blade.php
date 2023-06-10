<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                   <div class="flex flex-row fustify-center items-center pb-3">
                       <p class="text-dark-1000 font-bold w-3/4">Tabela de funcionários</p>
                      <a class="flex justify-center items-center w-1/4 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150" href="{{route('funcionario.create')}}">{{ __('Adicionar') }}</a>
                   </div>
<hr class="pb-3">
                    <!--Table for list employees-->
                    <ul role="list" class="divide-y divide-gray-100">
                    @foreach ($funcionarios as $funcionario)
                      <li class="flex justify-between gap-x-6 py-5 hover:cursor-pointer">
                        <div class="flex gap-x-4">
                          <img class="h-12 w-12 flex-none rounded-full bg-gray-50" src="{{asset('images/user.png')}}" alt="">
                          <div class="min-w-0 flex-auto">
                            <p class="text-sm font-semibold leading-6 text-gray-900"><a href="{{route('funcionario.show',$funcionario->id)}}">{{$funcionario->name}}</a></p>
                            <p class="mt-1 truncate text-xs leading-5 text-gray-500">{{$funcionario->section}}</p>
                          </div>
                        </div>
                        <div class="hidden sm:flex sm:flex-col sm:items-end">
                          <p class="text-sm leading-6 text-gray-900">{{$funcionario->function}}</p>
                          <div class="mt-1 flex items-center gap-x-1.5">
                            <!--switch to verify and show what status is selected-->
                            @switch($funcionario->status)
                            @case('a')
                            <div class="mt-1 flex items-center gap-x-1.5">
                            <div class="flex-none rounded-full bg-emerald-500/20 p-1">
                              <div class="h-1.5 w-1.5 rounded-full bg-emerald-500"></div>
                            </div>
                           <p class="text-xs leading-5 text-gray-500">ativo</p>
                          </div>
                                @break
                            @case('v')
                            <div class="mt-1 flex items-center gap-x-1.5">
                              <div class="flex-none rounded-full bg-amber-500/20 p-1">
                                <div class="h-1.5 w-1.5 rounded-full bg-amber-500"></div>
                              </div>
                          <p class="mt-1 text-xs leading-5 text-gray-500">Férias</p>
                        </div>
                                @break
                            @case('d')
                            <div class="mt-1 flex items-center gap-x-1.5">
                              <div class="flex-none rounded-full bg-red-500/20 p-1">
                                <div class="h-1.5 w-1.5 rounded-full bg-red-500"></div>
                              </div>
                             <p class="mt-1 text-xs leading-5 text-gray-500">Desativado</p>
                          </div>
                              @break
                            @default       
                        @endswitch   
                          </div>
                        </div>
                      </li>  
                    @endforeach
                      </ul>
                      

                    <!--Pagination styles for table-->

                    <div class="flex items-center justify-between border-t border-gray-200 bg-white px-4 py-3 sm:px-6">
                        <div class="flex flex-1 justify-between sm:hidden">
                          <a href="#" class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Previous</a>
                          <a href="#" class="relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Next</a>
                        </div>
                        <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
                          <div>
                            <p class="text-sm text-gray-700">
                              Mostrando de
                              <span class="font-medium">1</span>
                              a
                              <span class="font-medium">10</span>
                              de
                              <span class="font-medium">97</span>
                              resultados encontrados ...
                            </p>
                          </div>
                          <div>
                            <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
                              <a href="#" class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                                <span class="sr-only">Previous</span>
                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                  <path fill-rule="evenodd" d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z" clip-rule="evenodd" />
                                </svg>
                              </a>
                              <!-- Current: "z-10 bg-indigo-600 text-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600", Default: "text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:outline-offset-0" -->
                              <a href="#" aria-current="page" class="relative z-10 inline-flex items-center bg-gray-800 px-4 py-2 text-sm font-semibold text-white focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">1</a>
                              <a href="#" class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">2</a>
                              <a href="#" class="relative hidden items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0 md:inline-flex">3</a>
                              <span class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-700 ring-1 ring-inset ring-gray-300 focus:outline-offset-0">...</span>
                              <a href="#" class="relative hidden items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0 md:inline-flex">8</a>
                              <a href="#" class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">9</a>
                              <a href="#" class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">10</a>
                              <a href="#" class="relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                                <span class="sr-only">Next</span>
                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                  <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                                </svg>
                              </a>
                            </nav>
                          </div>
                        </div>
                      </div>
                      
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
