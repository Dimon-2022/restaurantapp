<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="container">
        <div class="row" id="table-detail"></div>
        <div class="row justify-content-center">
            <div class="col-md-5">
                <button class="btn btn-primary btn-block" id="btn-show-tables">View All Table</button>
            </div>
            <div class="col-md-7"></div>
        </div>
    </div>
    <script>
        window.addEventListener('load', function () {
            $(function () {
                $("#btn-show-tables").click(function () {
                    $.get('/cashier/getTable', function (data){
                        $("#table-detail").html(data);
                    })
                })
            });
        });
    </script>
</x-app-layout>
