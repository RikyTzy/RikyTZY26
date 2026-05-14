<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('products.create') }}">Add Product</a>
                </div>
                             <div class="table-responsive">
                    <table class="datatable display">
                        <thead>
                            <tr>
                                <th class="text-center w-10">No</th>
                                <th class="text-center w-20">Brand</th>
                                <th class="text-center">Category</th>
                                <th class="text-center">Description</th>
                                <th class="text-center">Best Price</th>
                                <th class="text-center">Is Active</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 1;
                            @endphp
                            @forelse($data as $i)
                            <tr>
                                <td class="text-center">{{$no++}}</td>
                                <td class="text-wrap">{{$i->brand->name}}</td>
                                <td class="text-wrap">{{$i->category->name}}</td>
                                <td class="text-wrap">{{$i->description}}</td>
                                <td class="text-wrap">{{$i->base_price}}</td>
                                <td class="text-wrap">{{$i->is_active}}</td>
                                <td class="text-center">

                                     <button type="button" class="flex bg-blue-200 hover:bg-blue-700 hover:bg-blue-500  text-blue-600 hover:text-white inline-flex rounded-full" onclick="return ('{{$i->id}}','{{$i->name}}')">
                                        <div class="bg-blue-100 text-blue-600 w-8 h-8 items-center justify-center flex rounded-full">
                                            <i class="fas fa-trash text-sm"></i>
                                        </div>
                                        <div>
                                            <div
                                                class="flex items-center justify-between font-medium rounded-full pl-2 pr-6 py-2 text-xs transition-all duration-300">
                                                <a href="{{ route('products.show', $i->id) }}">Details</a>
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
            </div>
        </div>
    </div>
</x-app-layout>
