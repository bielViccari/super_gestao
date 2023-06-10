<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!--image-->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class=" text-gray-900 flex justify-center items-center">
                    <img width="300px" height="300px" class="block fill-current" src="{{asset('images/curriculum-vitae.gif')}}" alt="">
                </div>
                <!--content-->
                <div>
                    <div class="py-12">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-gray-200/50 overflow-hidden shadow-sm sm:rounded-lg p-4 flex flex-col justify-center items-center">
                            <h1 class="font-black text-2xl">Informações sobre o funcionário</h1>
                            <p class="font-black text-lg">{{$funcionario->name}}</p>
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
                          <p>{{$funcionario->section}}</p>
                          <p>{{$funcionario->function}}</p>
                        </div>
                    </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>      
</x-app-layout>