@extends('Admin.master')
@section('admin-content')
<div class="main-panel">
    <div class="content-wrapper" style="background-color: rgb(38, 38, 41);">
        <div class="row">
            <div class="d-flex justify-content-center" style="width: 600px;height:300px;background-color: rgb(119, 119, 204);left:200px;">
                <form action="/updatecatagory" method="POST">
                    <div class="col-md">
                        <label for="validationCustom01" class="form-label text-light">From Time</label>
                        <input type="time" name="fromtime" class="form-control" value={{ $catagory->fromtime }} id="validationCustom01">
                        <span style="display: none" id="producterror"></span>
                    </div>
                    <div class="col-md">
                        <label for="validationCustom02" class="form-label text-light">To Time</label>
                        <input type="time" name="totime" value={{ $catagory->totime }} class="form-control" id="validationCustom02">
                        <span style="display: none" id="producterror"></span>
                    </div>
                    <br>
                    <div class="col-md-12 text-center">
                        <button class="btn btn-primary" type="submit">Update</button>
                    </div>
                    <input type="hidden" name="cat_id" value="{{ $catagory->id }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form>
            </div>
        </div>
    </div>
</div>

    <script>
        document.getElementById("discountprsentid").addEventListener("input", function() {
            var price = document.getElementById("actualpriceid").value;

            if (document.getElementById("discountprsentid").value > 100) {
                document.getElementById("discountprsentid").value = 100;

            }
            var discountpersentage = document.getElementById("discountprsentid").value;

            var fprice = (price * discountpersentage) / 100;
            var discountedprice = price - fprice;
            // alert(price);
            document.getElementById("Finalpriceid").value = discountedprice;
        });


        function showSubCatagories(catagory) {
            var subCatagorySelect = document.getElementById("validationCustom08");
            subCatagorySelect.innerHTML = ""; // Clear existing options

            if (catagory === "mens") {
                var options = ["shirts", "pants", "inners"];
            } else if (catagory === "womens") {
                var options = ["tops", "pants", "inners"];
            } else if (catagory === "babies") {
                var options = ["topwear", "bottomwear"];
            }

            options.forEach(function(option) {
                var optionElement = document.createElement("option");
                optionElement.textContent = option;
                subCatagorySelect.appendChild(optionElement);
            });
        }



        // validation
        // var productname = document.getElementById("validationCustom01").value;
        // if (productname.value.trim() === '') {
        //     document.getElementById("validationCustom01").style.border = "5px solid red";
        //     document.getElementById("producterror").value = "please enter product name";
        //     document.getElementById("producterror").style.display = "block";
        // }
        // else{
        //     document.getElementById("validationCustom01").style.border = "5px solid red";
        //     document.getElementById("producterror").value = "please enter product name";
        //     document.getElementById("producterror").style.display = "block";

        // }
    </script>
@endsection
