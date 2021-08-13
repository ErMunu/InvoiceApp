<?php require 'partials/head.php' ?>
<style>
.form-control{
    color: #fff!important;
}
</style>

<div class="container" style="margin-top: 100px">
        <h1>Create New Invoices</h1>
    <form method="post" action="">
        <fieldset>
            <div class="form-group">
                <label for="email1" class="form-label mt-4">Email address</label>
                <input required type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Customer email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="phone" class="form-label mt-4">Phone Number</label>
                <input required type="number" name="phone" class="form-control" id="exampleInputPassword1" placeholder="Customer Phone Number">
            </div>
        <div class="form-group">
            <label for="name" class="form-label mt-4">Name</label>
            <input required type="text" name="name" class="form-control" id="exampleInputPassword1" placeholder="Customer Name">
        </div>
        <div class="form-group">
            <label for="name" class="form-label mt-4">Address</label>
            <input required type="text" name="address" class="form-control" id="exampleInputPassword1" placeholder="Customer Address">
        </div>
        </fieldset>
        <fieldset>
        <div class="form-group row mb-3" >
            <label for="name" class="form-label mt-4">Product Details</label>
            <div class="col-8">
                <input required type="text" class="form-control" name="product['name'][]" id="pname0" placeholder="Product Name">
            </div>
            <div class="col-4">
                <div class="input-group mb-3">
                    <span class="input-group-text">₹</span>
                    <input required type="number" oninput='totall()' name="product['amount'][]" class="form-control" id="pamount0" aria-label="Amount" placeholder="Price">
                </div>
            </div>
            <div id="add0">

            </div>
        </div>
        </fieldset>

            <div class="form-group row mb-3">

            <div class="form-group col-6">
                <button type="button" class="btn btn-success col-12" onclick='add()'>Add More</button>
            </div>
            <div class="form-group col-6">
                <button type="button" class="btn btn-danger col-12" onclick='del()'>Delete</button>
            </div>
            </div>

        <fieldset>
            <div class="form-group row mb-3">
            <div class="btn btn-outline-dark mb-3 col-sm-12 col-md-4 " style="text-align: center;">
                Total Amount
                <div class="input-group">
                    <span class="input-group-text">₹</span>
                    <input required type="number" name="total" readonly value="0" class="form-control" id="total" style="color: #000!important;">
                </div>
            </div>


                <div class="btn btn-outline-dark mb-3 col-sm-12 col-md-4" style="text-align: center;">
                    Paid
                    <div class="input-group">
                        <span class="input-group-text">₹</span>
                        <input required type="number" name="paid" oninput='pay()' class="form-control" id="paid">
                    </div>
                </div>



            <div class="btn btn-outline-dark mb-3 col-sm-12 col-md-4 " style="text-align: center;">
                Balance
                <div class="input-group">
                    <span class="input-group-text">₹</span>
                    <input required type="number" readonly value="0" class="form-control" id="balance" style="color: #000!important;">
                </div>
            </div>
            </div>
        </fieldset>

        <div class="form-group mb-3">
            <label for="name" class="form-label">Remarks</label>
            <textarea class="form-control" name="remarks" id="remarks" rows="2"></textarea>
        </div>
        <input hidden type="number" id="i" name="i" >
        <div class="form-group">
            <button type="submit" name="newinvoice" class="btn btn-primary col-12">Submit</button>
        </div>

    </form>
    </div>
<?php require 'partials/footer.php' ?>