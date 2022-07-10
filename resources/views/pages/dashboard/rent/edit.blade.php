<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Sewa &raquo; Edit
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
            <form action="{{ route('dashboard.rent.update', $item->id) }}" class="w-full" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                {{-- form User --}}
                <div class="flex flex-wrap mb-6 -mx-3">
                    <div class="w-full px-3">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">Nama Penyewa</label>
                        <select name="users_id" class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-700 rounded focus:outline-none focus:bg-white focus:border-gray-500">
                            <option value="{{ $item->users_id }}">{{ $item->user['name'] }}</option>
                        </select>
                    </div>
                </div>
                {{-- Form Mobil --}}
                <div class="flex flex-wrap mb-6 -mx-3">
                    <div class="w-full px-3">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">Nama Mobil</label>
                        <select name="products_id" class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-700 rounded focus:outline-none focus:bg-white focus:border-gray-500">
                            <option value="{{ $item->products_id }}">{{ $item->product['name'] }}</option>
                            <option disabled>---------------------</option>
                            @foreach ($products as $item)
                                <option value="{{ $item->id }}" {{ old('products_id') == $item->id ? 'selected' : null }}>{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                {{-- form tanggal sewa --}}
                <div class="flex flex-wrap mb-6 -mx-3">
                    <div class="w-full px-3">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">Tanggal Sewa</label>
                        <input type="date" value="" name="tanggal_sewa" placeholder="Tanggal Sewa" class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-700 rounded focus:outline-none focus:bg-white focus:border-gray-500">
                    </div>
                </div>
                {{-- form lama sewa --}}
                <div class="flex flex-wrap mb-6 -mx-3">
                    <div class="w-full px-3">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">Lama Sewa (dalam hari)</label>
                        <input type="number" value="{{ old('lama_sewa') ?? $item->lama_sewa }}" name="lama_sewa" placeholder="Lama Sewa" class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-700 rounded focus:outline-none focus:bg-white focus:border-gray-500">
                    </div>
                </div>
                {{-- form status --}}
                <div class="flex flex-wrap mb-6 -mx-3">
                    <div class="w-full px-3">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">Status</label>
                        <select name="status" class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-700 rounded focus:outline-none focus:bg-white focus:border-gray-500">
                            <option value="">Pilih Status</option>
                            <option disabled>---------------------</option>
                            <option value="COMPLETED">COMPLETED</option>
                            <option value="PENDING">PENDING</option>
                            <option value="FAILED">FAILED</option>
                        </select>
                    </div>
                </div>
                <div class="flex flex-wrap mb-6 -mx-3">
                    <div class="w-full px-3">
                        <button type="submit" class="px-4 py-2 font-bold text-white bg-green-500 rounded shadow-lg hover:bg-green-700">
                            Update Rent
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
