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
                <div id="selected-table"></div>
                <div id="order-detail"></div>
            </div>
            <div class="col-md-7">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        @foreach ($categories as $category)
                            <a class="nav-item nav-link" data-id="{{$category->id}}" data-toggle="tab">
                                {{$category->name}}
                            </a>
                        @endforeach
                    </div>
                </nav>
                <div id="list-menu" class="row mt-2">
                </div>
            </div>
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

            $(".nav-link").click(function () {
                $.get("/cashier/getMenuByCategory/" + $(this).data('id'), function (data) {
                    $("#list-menu").hide();
                    $("#list-menu").html(data);
                    $("#list-menu").fadeIn('fast');
                })
            })

            var selectedTableId = "";
            var selectedTableName = "";

            $("#table-detail").on('click', ".btn-table", function () {
                selectedTableId = $(this).data('id');
                selectedTableName = $(this).data('name');
                $("#selected-table").html("<br><h3>Selected Table: " + selectedTableName + "</h3><hr>");
            })

            $("#list-menu").on('click', ".btn-menu", function () {
                if(selectedTableId == "") {
                    alert("Please select a table first");
                }else{
                    var menuId = $(this).data('id');
                    $.ajax({
                        type: "POST",
                        data: {
                            "_token": $('meta[name="csrf-token"]').attr('content'),
                            "table_id": selectedTableId,
                            "menu_id": menuId,
                            "table_name": selectedTableName,
                            "quantity": 1,
                        },
                        url: "/cashier/orderFood/",
                        success: function (data) {
                            $("#order-detail").html(data);
                        }
                    })
                }
            })
        });
    </script>
</x-app-layout>
