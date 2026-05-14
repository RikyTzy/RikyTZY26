<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('categories.create') }}">Add Categories</a>
                </div>
                <div class="table-responsive">
                    <table class="datatable display">
                        <thead>
                            <tr>
                                <th class="text-center w-10">No</th>
                                <th class="text-center w-20">Categories</th>
                                <th class="text-center w-20">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 1;
                            @endphp
                            @forelse($data as $i)
                            <tr>
                                <td class="text-center">{{$no++}}</td>
                                <td class="text-wrap">{{$i->name}}</td>
                                <td class="text-center">
                                    <button type="button" class="flex bg-amber-200 hover:bg-amber-700 hover:bg-amber-500 text-amber-600 hover:text-white inline-flex rounded-full" data-id="{{$i->id}}"
                                        data-modal-target="sourceModal" data-name="{{ $i->name }}"
                                        onclick="editSourceModal(this)">
                                        <div class="bg-amber-100 text-amber-600 w-8 h-8 items-center justify-center flex rounded-full">
                                            <i class="fas fa-edit text-sm"></i>
                                        </div>
                                        <div>
                                            <div
                                                class="flex items-center justify-between  font-medium rounded-full pl-2 pr-6 py-2 text-xs transition-all duration-300">
                                                <span>Edit</span>
                                            </div>
                                        </div>
                                    </button>

                                    <button type="button" class="flex bg-red-200 hover:bg-red-700 hover:bg-red-500  text-red-600 hover:text-white inline-flex rounded-full" onclick="return categoriesDelete('{{$i->id}}','{{$i->name}}')">
                                        <div class="bg-red-100 text-red-600 w-8 h-8 items-center justify-center flex rounded-full">
                                            <i class="fas fa-trash text-sm"></i>
                                        </div>
                                        <div>
                                            <div
                                                class="flex items-center justify-between font-medium rounded-full pl-2 pr-6 py-2 text-xs transition-all duration-300">
                                                <span>Hapus</span>
                                            </div>
                                        </div>
                                    </button>
                                </td>
                            </tr>
                            @empty
                            <div class="bg-gray-500 text-white p-3 rounded shadow-sm mb-3">
                                Data Belum Tersedia!
                            </div>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
