<?php require 'partials/head.php' ?>


    <div class="container" style="margin-top: 100px">
        <h1>All Invoices</h1>
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($invoices as $invoice) : ?>
                    <tr class="table-active">
                        <td><?= $invoice -> id; ?> </td>
                        <td><?= $invoice -> name; ?></td>
                        <td class="row">
                            <form action="/view/invoice" method="post" class="col-4">
                                <button type="submit" value="<?= $invoice -> id; ?>" name="id" class="badge rounded-pill bg-success col-12">View</button>
                            </form>
                            <form action="/edit/invoice" method="post" class="col-4">
                                <button type="submit" value="<?= $invoice -> id; ?>" name="id" class="badge rounded-pill bg-info col-12">Update</button>
                            </form>
                            <form action="/delete/invoice" method="post" class="col-4">
                                <button type="submit" value="<?= $invoice -> id; ?>" name="id" class="badge rounded-pill bg-danger col-12">Delete</button>
                            </form>
                        </td>
                    </tr>
            <?php endforeach; ?>


            </tbody>
        </table>
    </div>


<?php require 'partials/footer.php' ?>