<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Transaction &raquo; #{{ $transaction->id }} {{ $transaction->name }}
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
                    { data: 'product.name', name: 'product.name'},
                    { data: 'product.price', name: 'product.price'}
                ]

            })
        </script>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

            {{-- ini kotakan untuk Transaction Details --}}
            <h2 class="mb-5 text-lg font-semibold leading-tight text-gray-800">
                Transaction Item
            </h2>
            <div class="mb-10 overflow-hidden bg-white shadow sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="w-full table-auto">
                        <tbody>
                            <tr>
                                <th class="px-4 py-6 text-right border">Name</th>
                                <td class="px-4 py-6 border">{{ $transaction->name }}</td>
                            </tr>
                            <tr>
                                <th class="px-4 py-6 text-right border">Email</th>
                                <td class="px-4 py-6 border">{{ $transaction->email }}</td>
                            </tr>
                            <tr>
                                <th class="px-4 py-6 text-right border">Address</th>
                                <td class="px-4 py-6 border">{{ $transaction->address }}</td>
                            </tr>
                            <tr>
                                <th class="px-4 py-6 text-right border">Phone</th>
                                <td class="px-4 py-6 border">{{ $transaction->phone }}</td>
                            </tr>
                            <tr>
                                <th class="px-4 py-6 text-right border">Courier</th>
                                <td class="px-4 py-6 border">{{ $transaction->courier }}</td>
                            </tr>
                            <tr>
                                <th class="px-4 py-6 text-right border">Payment</th>
                                <td class="px-4 py-6 border">{{ $transaction->payment }}</td>
                            </tr>
                            <tr>
                                <th class="px-4 py-6 text-right border">Payment URL</th>
                                <td class="px-4 py-6 border">{{ $transaction->payment_url }}</td>
                            </tr>
                            <tr>
                                <th class="px-4 py-6 text-right border">Total Price</th>
                                <td class="px-4 py-6 border">{{ number_format($transaction->total_price) }}</td>
                            </tr>
                            <tr>
                                <th class="px-4 py-6 text-right border">Status</th>
                                <td class="px-4 py-6 border">{{ $transaction->status }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- ini kotakan untuk Transaction Items --}}
            <h2 class="mb-5 text-lg font-semibold leading-tight text-gray-800">
                Transaction Item
            </h2>
            <div class="overflow-hidden shadow sm-rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <table id="crudTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Produk</th>
                                <th>Harga</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
        </div>
    </div>
</x-app-layout>
