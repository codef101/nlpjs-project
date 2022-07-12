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
            @include('layouts.admin_nav')
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
