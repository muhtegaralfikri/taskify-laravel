<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        Buat Task Baru
                    </h2>
                    
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        Apa rencanamu hari ini?
                    </p>

                    <form method="POST" action="{{ route('tasks.store') }}" class="mt-6 space-y-6">
                        @csrf <div>
                            <label for="title" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Task</label>
                            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" required autofocus autocomplete="off" />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        <div class="flex items-center gap-4">
                            <button type="submit" 
                            class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-200 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-800 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150">
                            Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">
                    Daftar Task Kamu
                </h2>
                
                <div class="flex flex-col space-y-4"> 
                    
                    @forelse ($tasks as $task)
                        
                        <div class="p-4 bg-white dark:bg-gray-700 rounded-lg shadow flex flex-col sm:flex-row justify-between items-start sm:items-center space-y-2 sm:space-y-0">
                            
                            <span @class([
                                'text-gray-900 dark:text-gray-100',
                                'line-through text-gray-500 dark:text-gray-400' => $task->status === 'completed',
                            ])>
                                {{ $task->title }}
                            </span>
                            
                            <div class="flex space-x-2">
                                
                                <form method="POST" action="{{ route('tasks.update', $task) }}">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" 
                                            @class([
                                                'px-3 py-1 text-xs font-medium text-white rounded',
                                                'bg-green-600 hover:bg-green-700' => $task->status === 'pending',
                                                'bg-yellow-500 hover:bg-yellow-600' => $task->status === 'completed',
                                            ])>
                                        {{ $task->status === 'pending' ? 'Selesai' : 'Batal' }}
                                    </button>
                                </form>

                                <form method="POST" action="{{ route('tasks.destroy', $task) }}" onsubmit="return confirm('Yakin ingin menghapus task ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="px-3 py-1 text-xs font-medium text-white bg-red-600 hover:bg-red-700 rounded">
                                        Hapus
                                    </button>
                                </form>
                            </div>

                        </div> @empty
                        <p class="text-gray-500 dark:text-gray-400">Kamu belum memiliki task.</p>
                    @endforelse

                </div>
            </div>

        </div>
    </div>
</x-app-layout>
