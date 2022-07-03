<x-app-layout>
       <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Orders') }}
        </h2>
    </x-slot>

    {{-- <div class="py-2">
        <table class="table-auto  mx-auto">
            <thead>
              <tr>
                <th>id</th>
                <th>Product</th>
                <th>price</th>
                <th>Quantity</th>
                <th>status</th>
                <th>Ordered Date</th>
              </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
              <tr>
                <td>{{ $order->id}}</td>
                <td>{{ $order->product->title}}</td>
                <td>{{ $order->product->price}}</td>
                <td>{{ $order->quantity}}</td>
                <td>{{ $order->status}}</td>
                <td>{{ $order->created_at}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
    </div> --}}
    <div class="mx-5 mt-4">

        <div class="shadow-md sm:rounded-lg mx-auto" style="width: 80%">
            <table class="w-full text-left text-gray-500 dark:text-gray-400">
                <thead class="text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Product name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            description
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Price
                        </th>
                        <th scope="col" class="px-6 py-3">
                            quantity
                        </th>
                        <th scope="col" class="px-6 py-3">
                            status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Order date
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                            {{ $order->title}}
                        </th>
                        <td class="px-6 py-4">
                            {{ $order->description}}
                        </td>
                        <td class="px-6 py-4">
                            {{ $order->price}}
                        </td>
                        <td class="px-6 py-4">
                            {{ $order->quantity}}
                        </td>

                        <td class="px-6 py-4">
                            {{ $order->status}}
                        </td>


                        <td class="px-6 py-4">
                            {{ $order->created_at}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
