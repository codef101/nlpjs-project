@extends('layouts.backend')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/json-editor/2.8.0/jsoneditor.js"
    integrity="sha512-pTbu8VcuA+8UrRu/Ax0jcfLn6yVCBtBxy1JjPxz+FK2RIMOj4VBATbaw4R5UHUdQ/EhXmuKjbPr/wpAtpiP++w=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<style type="text/css">
    textarea {
        overflow-y: scroll;
        height: 400px;
    }
</style>

@section('content')
    <noscript>You need to enable JavaScript to run this app.</noscript>
    <div id="root">
        @include('layouts.backend-sidenav')
        <div class="relative md:ml-64 bg-blueGray-50">
            <nav
                class="absolute top-0 left-0 w-full z-10  bg-pink-600 md:flex-row md:flex-nowrap md:justify-start flex items-center p-4">
                <div class="w-full mx-autp items-center flex justify-between md:flex-nowrap flex-wrap md:px-10 px-4">
                    <a class="text-white text-sm uppercase hidden lg:inline-block font-semibold"
                        href="./index.html">Knowledge</a>
                    {{-- <form class="md:flex hidden flex-row flex-wrap items-center lg:ml-auto mr-3">
                        <div class="relative flex w-full flex-wrap items-stretch">
                            <span
                                class="z-10 h-full leading-snug font-normal absolute text-center text-blueGray-300 absolute bg-transparent rounded text-base items-center justify-center w-8 pl-3 py-3"><i
                                    class="fas fa-search"></i></span>
                            <input type="text" placeholder="Search here..."
                                class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 relative bg-white bg-white rounded text-sm shadow outline-none focus:outline-none focus:ring w-full pl-10" />
                        </div>
                    </form> --}}
                    <ul class="flex-col md:flex-row list-none items-center hidden md:flex">
                        <a class="text-blueGray-500 block" href="#pablo" onclick="openDropdown(event,'user-dropdown')">
                            <div class="items-center flex">
                                <span
                                    class="w-12 h-12 text-sm text-white bg-blueGray-200 inline-flex items-center justify-center rounded-full"><img
                                        alt="..." class="w-full rounded-full align-middle border-none shadow-lg"
                                        src="{{ asset('assetsimg/team-1-800x800.jpg') }}" /></span>
                            </div>
                        </a>
                        <div class="hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg mt-1"
                            style="min-width: 12rem;" id="user-dropdown">
                            <div class="h-0 my-2 border border-solid border-blueGray-100"></div>
                            <a href="#pablo"
                                class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">Logout</a>
                        </div>
                    </ul>
                </div>
            </nav>
            <!-- Header -->
            <div class="relative md:pt-32 pb-32 pt-12">
                <div class="px-4 md:px-10 mx-auto w-full">
                    <form action="{{ url('a/update-corpus')}}" method="POST">
                        @csrf
                        <div class="">
                            <button class="bg-primary p-2 px-3 m-4"> Update File</button>
                        </div>
                        <textarea id="json-display" name="corpus" id="" cols="100" rows="40"></textarea>
                    </form>
                    <script type="text/javascript">
                        var el = document.getElementById("json-display");
                        $.ajax({
                            url: "http://localhost:5000/message/corpus",
                            type: 'GET',
                            success: function(res) {
                                el.value = res;
                            }
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
@endsection
