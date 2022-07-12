@extends('layouts.backend')
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

@section('content')
    <noscript>You need to enable JavaScript to run this app.</noscript>
    <div id="root">
        @include('layouts.backend-sidenav')
        <div class="relative md:ml-64 bg-blueGray-50">
            @include('layouts.admin_nav')

            <!-- Header -->
            <div class="relative md:pt-32 pb-32 pt-12 mx-4">
                <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>User</th>
                            <th>order_total</th>
                            <th>Mobile Nubmber</th>
                            <th>Status</th>
                            <th>Create date</th>
                            <th>Update Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->user->name }}</td>
                                <td>{{ $order->order_total }}</td>
                                <td>{{ $order->user->mobile }}</td>
                                <td>
                                    <form action="{{ route('admin.orders.update', ['order' => $order->id]) }}"
                                        method="POST">
                                        @csrf
                                        @method('PUT')
                                        <select name="status" id="status">
                                            <option value="{{ $order->status }}">{{ $order->status }}</option>
                                            <option value="pending">Pending</option>
                                            <option value="confirmed">confirmed</option>
                                            <option value="purchased">purchased</option>
                                            <option value="delivered">delivered</option>
                                        </select>
                                        <button type="submit"
                                            class="py-2 px-4 text-sm font-medium text-blue-900 bg-white rounded-l-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                                            change
                                        </button>
                                    </form>
                                </td>
                                <td>{{ $order->created_at }}</td>
                                <td>{{ $order->updated_at }}</td>
                                <td>
                                    <div class="inline-flex rounded-md shadow-sm" role="group">
                                        <form action="{{ route('admin.orders.destroy',[ 'order' => $order->id])}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="py-2 px-4 text-sm font-medium text-red-900 bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                                                Delete
                                              </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>id</th>
                            <th>User</th>
                            <th>order_total</th>
                            <th>Status</th>
                            <th>Create date</th>
                            <th>Update Date</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
@endsection
