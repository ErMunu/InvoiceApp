<?php require 'partials/head.php' ?>
<style>
.form-control{
    color: #fff!important;
}</style>

<div class="container" style="margin-top: 100px">
        <h1>Edit Invoices # <?= $invoice[0] -> id; ?></h1>
        <form method="post" action="">
            <fieldset>
                <div class="form-group">
                    <label for="email1" class="form-label mt-4">Email address</label>
                    <input required type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" value="<?= $invoice[0] -> email; ?>" placeholder="Customer email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="phone" class="form-label mt-4">Phone Number</label>
                    <input required type="number" name="phone" class="form-control" id="exampleInputPassword1" value="<?= $invoice[0] -> phone; ?>" placeholder="Customer Phone Number">
                </div>
                <div class="form-group">
                    <label for="name" class="form-label mt-4">Name</label>
                    <input required type="text" name="name" class="form-control" id="exampleInputPassword1" value="<?= $invoice[0] -> name; ?>" placeholder="Customer Name">
                </div>
                <div class="form-group">
                    <label for="name" class="form-label mt-4">Address</label>
                    <input required type="text" name="address" class="form-control" id="exampleInputPassword1" value="<?= $invoice[0] -> address; ?>" placeholder="Customer Address">
                </div>
            </fieldset>
            <fieldset>
                <div class="form-group row mb-3" >
                    <label for="name" class="form-label mt-4">Product Details</label>

                    <!--products list fetching from database-->

                    <div id="add0">

                        <?php
                        $num = 0;

                        foreach($products as $product) : ?>
                        <div class="form-group row">
                            <div class="col-8">
                                <input required="" type="text" class="form-control" name="product['name'][]" id="pname<?= $num ?>" value="<?= $product -> name ?>" placeholder="Product Name">
                            </div>
                            <div class="col-4"> <div class="input-group mb-3">
                                    <span class="input-group-text">₹</span>
                                    <input required="" type="number" class="form-control" name="product['amount'][]" id="pamount<?= $num ?>" value="<?= $product -> price ?>" oninput="totall()" aria-label="Amount" placeholder="Price">
                                </div>
                            </div>
                        </div>
                        <div id="add<?= $num?>">
                           <script>i++;</script>
                        <?php
                    $num++;
                    endforeach;?>
                            <script>
                                i--;
                            </script>

                    </div>
                    <!--products list fetched from database-->


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
                            <input required type="number" name="total" readonly class="form-control" value="<?= $invoice[0] -> total; ?>" id="total" style="color: #000!important;">
                        </div>
                    </div>


                    <div class="btn btn-outline-dark mb-3 col-sm-12 col-md-4" style="text-align: center;">
                        Paid
                        <div class="input-group">
                            <span class="input-group-text">₹</span>
                            <input required type="number" name="paid" oninput='pay()' class="form-control" value="<?= $invoice[0] -> paid; ?>" id="paid">
                        </div>
                    </div>



                    <div class="btn btn-outline-dark mb-3 col-sm-12 col-md-4 " style="text-align: center;">
                        Balance
                        <div class="input-group">
                            <span class="input-group-text">₹</span>
                            <input required type="number" readonly class="form-control" value="<?= $invoice[0] -> balance; ?>" id="balance" style="color: #000!important;">
                        </div>
                    </div>
                </div>
            </fieldset>

            <div class="form-group mb-3">
                <label for="name" class="form-label">Remarks</label>
                <textarea class="form-control" name="remarks" id="remarks" rows="2"><?= $invoice[0] -> note; ?></textarea>
            </div>
            <input hidden type="number" id="i" name="i" >
            <input hidden type="number"  name="id" value="<?= $invoice[0] -> id; ?>" >
            <div class="form-group row">
                <button type="submit" name="editinvoice" class="btn btn-primary col-6">Update</button>
                <button type="button" onclick="if(confirm('Cancel Updating Invoice'))window.location.href=''" class="btn btn-danger col-6">Cancel</button>
            </div>

        </form>
    </div>
<script> document.getElementById('i').value=i;</script>





<?php require 'partials/footer.php' ?>