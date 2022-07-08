<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Product &raquo; Create
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            @if ($errors->any())
                <div class="mb-5" roles="alert">
                    <div class="px-4 py-2 font-bold text-white bg-red-500 rounded-t">
                        There's Something Wrong!
                    </div>
                    <div class="px-4 py-3 text-red-700 bg-red-100 border border-t-0 border-red-400 rounded-b">
                        <p>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </p>
                    </div>
                </div>
            @endif
            <form action="{{ route('dashboard.product.store') }}" class="w-full" method="post" enctype="multipart/form-data">
                @csrf
                {{-- Form Nama --}}
                <div class="flex flex-wrap mb-6 -mx-3">
                    <div class="w-full px-3">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">Name</label>
                        <input type="text" value="{{ old('name') }}" name="name" placeholder="Product Name" class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-700 rounded focus:outline-none focus:bg-white focus:border-gray-500">
                    </div>
                </div>
                {{-- Form Merek --}}
                <div class="flex flex-wrap mb-6 -mx-3">
                    <div class="w-full px-3">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">Merek</label>
                        <select name="merek_id" class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-700 rounded focus:outline-none focus:bg-white focus:border-gray-500">
                            <option value="">Merek Mobil</option>
                            @foreach ($mereks as $item)
                                <option value="{{ $item->id }}" {{ old('merek_id') == $item->id ? 'selected' : null }}>{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                {{-- form Type --}}
                <div class="flex flex-wrap mb-6 -mx-3">
                    <div class="w-full px-3">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">Merek</label>
                        <select name="type_id" class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-700 rounded focus:outline-none focus:bg-white focus:border-gray-500">
                            <option value="">Type Mobil</option>
                            @foreach ($type as $item)
                                <option value="{{ $item->id }}" {{ old('type_id') == $item->id ? 'selected' : null }}>{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                {{-- form deskripsi --}}
                <div class="flex flex-wrap mb-6 -mx-3">
                    <div class="w-full px-3">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">Description</label>
                        <textarea name="description" class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-700 rounded focus:outline-none focus:bg-white focus:border-gray-500">{!! old('description') !!}</textarea>
                    </div>
                </div>
                {{-- form harga --}}
                <div class="flex flex-wrap mb-6 -mx-3">
                    <div class="w-full px-3">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">Price/day</label>
                        <input type="number" value="{{ old('price') }}" name="price" placeholder="Price" class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-700 rounded focus:outline-none focus:bg-white focus:border-gray-500">
                    </div>
                </div>
                <div class="flex flex-wrap mb-6 -mx-3">
                    <div class="w-full px-3">
                        <button type="submit" class="px-4 py-2 font-bold text-white bg-green-500 rounded shadow-lg hover:bg-green-700">
                            Save Product
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'description' );
    </script>
</x-app-layout>
