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

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Payment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h3 class="totalAmount"></h3>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                        </div>
                        <input type="number" id="received-amount" class="form-control">
                    </div>
                    <h3 class="changeAmount"></h3>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary btn-save-payment" disabled>Save Payment</button>
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
                $.get("/cashier/getSaleDetailsByTable/"+selectedTableId, function (data){
                    $("#order-detail").html(data);
                });
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

            $("#order-detail").on('click', '.btn-confirm-order', function () {
                var saleId = $(this).data('id');
                $.ajax({
                    type: "POST",
                    data: {
                        "_token": $('meta[name="csrf-token"]').attr('content'),
                        "sale_id": saleId,
                    },
                    url: "/cashier/confirmOrderStatus",
                    success: function (data) {
                        $("#order-detail").html(data);
                    }
                });
                }
            );

            $("#order-detail").on('click', '.btn-delete-saledetail', function(){
                 var saleDetailId = $(this).data('id');
                 $.ajax({
                     type: "POST",
                     data: {
                        "_token": $('meta[name="csrf-token"]').attr('content'),
                         "saleDetail_id": saleDetailId,
                     },
                     url: "/cashier/deleteDaleDetail",
                     success: function (data){
                         $("#order-detail").html(data);

                     }
                 })
            })

            $("#order-detail").on("click", ".btn-payment", function(){
                var totalAmount = $(this).data('totalAmount');
                $(".totalAmount").html("Total Amount " + totalAmount);
                $("#recieved-amount").val('');
                $(".changeAmount").html('');
            });

            $("#received-amount").keyup(function () {
               var totalAmount = $(".btn-payment").data('totalAmount');
               var receivedAmount = $(this).val();
               var changeAmount = receivedAmount - totalAmount;

               if(changeAmount >= 0){
                   $(".btn-save-payment").attr("disabled", false);
               } else {
                   $(".btn-save-payment").attr("disabled", true);
               }

               $(".changeAmount").html("Change Amount " + changeAmount);

            });

        });
    </script>
</x-app-layout>
