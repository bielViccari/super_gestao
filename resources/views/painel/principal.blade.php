<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                   <div class="flex flex-row justify-center items-center pb-3">
                       <p class="text-dark-1000 font-bold w-3/4">Tabela de funcionários</p>
                       
                       <form class="pl-20 flex justify-center items-center" action="{{ route('painel.index') }}" method="get">
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
                      @foreach ($usuarios as $user)
                      @if ($user->id === 1 && $user->admin === 1 || Auth::user()->id === $user->id)
                      <!--Admin Master, it can't be editted -->
                      <li class="flex justify-between gap-x-6 py-5">
                          <div class="flex gap-x-4">
                            <img class="h-12 w-12 flex-none rounded-full bg-gray-50" src="{{asset('images/user.png')}}" alt="">
                            <div class="min-w-0 flex-auto">
                              <p class="text-sm font-semibold leading-6 text-gray-900">{{$user->name}}</p>
                              <p class="mt-1 truncate text-xs leading-5 text-gray-500">{{$user->email}}</p>
                            </div>
                          </div>
                          <div class="hidden sm:flex sm:flex-col sm:items-end">
                            <p class="text-sm leading-6 text-gray-900">{{$user->created_at}}</p>
                            <div class="mt-1 flex items-center gap-x-1.5">                              
                            </div>
                          </div>
                      </li>  
                      @else 
                            <li class="flex justify-between gap-x-6 py-5">
                              <a class="no-underline focus:outline-none" href="{{ route('painel.edit',$user->id) }}">
                                <div class="flex gap-x-4">
                                  <img class="h-12 w-12 flex-none rounded-full bg-gray-50" src="{{asset('images/user.png')}}" alt="">
                                  <div class="min-w-0 flex-auto">
                                      <p class="text-sm font-semibold leading-6 text-gray-900">{{$user->name}}</p>
                                      <p class="mt-1 truncate text-xs leading-5 text-gray-500">{{$user->email}}</p>
                                  </div>
                                </div>
                                <div class="hidden sm:flex sm:flex-col sm:items-end">
                                  <p class="text-sm leading-6 text-gray-900">{{$user->created_at}}</p>
                                  <p class="text-sm leading-6 text-amber-600"><a href="{{ route('painel.edit',$user->id) }}">Editar</a></p>
                                  <div class="mt-1 flex items-center gap-x-1.5"> 
                                  </div>
                                </div>
                              </a>
                            </li>  
                      @endif
                    @endforeach
                      </ul>

                      {{$usuarios->appends(['search' => isset($search) ? $search : ''])->links('vendor.pagination.tailwind')}}
                      
                    <!--Pagination styles for table-->
                      
                </div>
            </div>
        </div>
    </div>
</x-app-layout>