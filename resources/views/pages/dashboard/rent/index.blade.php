<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Sewa') }}
        </h2>
    </x-slot>

    <x-slot name="script">
        <script>
            //AJAX Datatable

            var datatable = $('#crudTable').DataTable({
                ajax: {
                    url: '{!! url()->current() !!}'
                },
                columns: [
                    { data: 'id', name: 'id', width: '5%'},
                    { data: 'users_id' , name: 'users_id'},
                    { data: 'products_id' , name: 'products_id'},
                    { data: 'tanggal_sewa' , name: 'tanggal_sewa'},
                    { data: 'lama_sewa' , name: 'lama_sewa'},
                    { data: 'total_harga' , name: 'total_harga'},
                    { data: 'status' , name: 'status'},
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        width: '25%'
                    }

                ]

            })
        </script>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="mb-10">
                <a href="{{  route('dashboard.rent.create') }}" class="px-4 py-2 font-bold text-white bg-green-500 rounded shadow-lg hover:bg-green-700">
                    + Create Rent
                </a>
            </div>
            <div class="overflow-hidden shadow sm-rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <table id="crudTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Penyewa</th>
                                <th>Mobil</th>
                                <th>Tanggal Sewa</th>
                                <th>Lama Sewa</th>
                                <th>Total Harga</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
        </div>
    </div>
</x-app-layout>
