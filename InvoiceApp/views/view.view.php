<?php require 'partials/head.php';?>


<div class="container" style="margin-top: 100px">
    <h1>View Invoice # <?= $invoice[0] -> id; ?></h1>
    <div class="col-12" id="invoice">
        <div class="container">
            <div class="container p-3 my-3 border bg-white text-black-50">

                    <table class="table table-hover table-dark" style="text-align: center">
                        <thead class="border-dark">
                        <tr>
                            <th scope="col" colspan="4" ><h1>Company Name</h1></th>
                        </tr>
                        <tr>
                            <td colspan="4">Address of this company, where company is located - 123456</td>
                        </tr>

                        <tr>
                            <th scope="col" colspan="2" style="text-align: left">
                               Name: <?= $invoice[0] -> name; ?>
                            </th>
                            <td scope="col" colspan="2" style="text-align: right">
                                Date: <?=  date('Y-m-d h:i a', strtotime($invoice[0] -> date)) ?>
                            </td>
                        </tr>
                        <tr>
                            <td scope="col" colspan="4" style="text-align: left">
                                Address: <?= $invoice[0] -> address; ?>
                            </td>
                        </tr>
                        <tr>
                            <td scope="col" colspan="2" style="text-align: left">
                                Email: <?= $invoice[0] -> email; ?>
                            </td>
                            <td scope="col" colspan="2" style="text-align: left">
                                Phone: <?= $invoice[0] -> phone; ?>
                            </td>
                        </tr>

                        </thead>
                        <tbody>
                        <tr>
                            <th colspan="1">#</th>
                            <th colspan="2">Product Name</th>
                            <th colspan="1">Price</th>
                        </tr>
                        <?php
                        
                        $num = 1;
                        $total = 0;
                     	foreach($products as $product) :
                      
                            ?>
                            <tr>
                                <td colspan="1"><?= $num?></td>
                                <td colspan="1" style="text-align: left"><?= $product -> name; ?></td>
                                <td colspan="2"><?= $product -> price; ?></td>
                            </tr>

                        <?php
                            $total += $product -> price;
                            $num++;
                       		endforeach;
                        ?>
                        </tbody>
                        <tbody>
                        <tr>
                            <td colspan="3">Total</td>
                            <td colspan="1"><?php echo $total ?></td>
                        </tr>
                        <tr>
                            <td colspan="3">Paid</td>
                            <td colspan="1"><?= $invoice[0] -> paid; ?></td>
                        </tr>
                        <tr>
                            <td colspan="3">Balance</td>
                            <td colspan="1"><?= $total - $invoice[0] -> paid?></td>
                        </tr>
                        </tbody>
                        <tbody >
                        <tr><td colspan="4">Remarks</td></tr>
                        <tr>
                            <td colspan="4" style="text-align: left"><?= $invoice[0] -> note; ?></td>
                        </tr>
                        </tbody>

                    </table>
            </div>
        </div>
    </div>
    <div class="row">
        <form class="col-4">
        <button type="button" onclick="printDiv('invoice')" class="btn btn-success col-12">Print</button>
        </form>
        <form action="/edit/invoice" method="post" class="col-4">
            <button type="submit" value="<?= $invoice[0] -> id; ?>" name="id" class="btn btn-info col-12">Update</button>
        </form>
        <form action="/delete/invoice" method="post" class="col-4">
            <button type="submit" value="<?= $invoice[0] -> id; ?>" name="id" class="btn  btn-danger col-12">Delete</button>
        </form>
    </div>
</div>



<?php require 'partials/footer.php' ?>