<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                   <div class="flex flex-row justify-center items-center pb-3">
                       <p class="text-dark-1000 font-bold w-3/4">Tabela de funcionários</p>
                       
                       <form class="pl-20 flex justify-center items-center" action="{{route('funcionario.index')}}" method="get">
                        @csrf
                        <input value="{{old('search')}}" placeholder="Pesquisar" name="search" id="search" class="flex justify-center items-center inline-flex px-4  bg-gray-300/50 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-300 focus:bg-gray-300 active:bg-gray-300 focus:outline-none  focus:ring-gray-500  transition ease-in-out duration-150" type="text">
                        <button type="submit"><svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-gray-300/50 hover:text-gray-300" viewBox="0 0 20 20" fill="currentColor">
                          <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                      </svg></button> 
                      </form>
                   </div>
<hr class="pb-3">
                    <!--Modal to show message-->
                    @if ($message = Session::get('message'))
                    <script>
                      const Toast = Swal.mixin({
                        toast: true,
                        position: 'top',
                        showConfirmButton: false,
                        timer: 4000,
                        timerProgressBar: true,
                      didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                      }
                    })

                      Toast.fire({
                        icon: 'success',
                        title: '{{ $message }}'
                      })
                    </script>
                    @endif

                    @if ($message = Session::get('error'))
                    <script>
                      const Toast = Swal.mixin({
                        toast: true,
                        position: 'top',
                        showConfirmButton: false,
                        timer: 4000,
                        timerProgressBar: true,
                      didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                      }
                    })

                      Toast.fire({
                        icon: 'error',
                        title: '{{ $message }}'
                      })
                    </script>
                    @endif
                    <!--Table for list employees-->
                    <ul role="list" class="divide-y divide-gray-100">
                      @if($funcionarios)
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
                    @endif
                      </ul>

                      {{$funcionarios->appends(['search' => isset($search) ? $search : ''])->links('vendor.pagination.tailwind')}}
                      
                    <!--Pagination styles for table-->
                      
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
