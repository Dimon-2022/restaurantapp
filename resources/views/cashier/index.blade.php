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
                $("#table-detail").hide();
                $("#btn-show-tables").click(function () {
                    if($("#table-detail").is(":hidden")) {
                        $.get('/cashier/getTable', function (data){
                            $("#table-detail").html(data);
                            $("#table-detail").slideDown('fast');
                            $("#btn-show-tables").html("Hide Tables").removeClass("btn-primary").addClass("btn-danger");
                        })
                    }
                    else{
                        $("#table-detail").slideUp('fast');
                        $("#btn-show-tables").html("View All Tables").removeClass("btn-danger").addClass("btn-primary");
                    }
                })
            });
        });
    </script>
</x-app-layout>
