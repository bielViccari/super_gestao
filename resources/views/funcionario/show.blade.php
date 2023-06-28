<x-app-layout>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                            <h1 class="font-black text-2xl">INFORMAÇÕES SOBRE O FUNCIONÁRIO</h1>
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

                          @if (Gate::allows('editar-funcionario', $funcionario))    
                          <div class="flex flex-row pt-2">
                            <div class="flex items-center gap-4 mr-2">
                                <button class="inline-flex items-center px-4 py-2 bg-amber-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-amber-700 focus:bg-amber-600 active:bg-amber-600 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2 transition ease-in-out duration-150"><a href="{{ route('funcionario.edit',$funcionario->id) }}">Editar</a></button>
                            </div>
                          
                            <form id="deleteForm" method="POST" action="{{route('funcionario.destroy',$funcionario->id)}}">
                                @csrf
                                @method('delete')
                                <button onclick="deleteConfirm(event)" class="inline-flex items-center px-4 py-2 bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:bg-red-700 active:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                  <p class="text-gray-100">Apagar</p>
                                </button>
                            <script type="text/javascript">
                              window.deleteConfirm = function (event) {
                                event.preventDefault();
                                var form = document.getElementById('deleteForm');
                                console.log(form)
                                Swal.fire({
                                  title: 'Tem certeza?',
                                  text: "Você não será capaz de reverter isso !",
                                  icon: 'warning',
                                  showCancelButton: true,
                                  confirmButtonColor: '#3085d6',
                                  cancelButtonColor: '#d33',
                                  confirmButtonText: 'Sim, deletar'
                              }).then((result) => {
                                if (result.isConfirmed) {
                                    form.submit();  
                                }
                              })
                            }
                          </script>
                            </form>
                          </div>
                          @endif
                        </div>
                    </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>      
</x-app-layout>