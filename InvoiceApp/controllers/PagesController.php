<?php

class PagesController
{
    public function home()
    {
        $invoices = App::get('database')->selectAll('invoice');

        return view('index', compact('invoices'));


    }
    public function view()
    {
        if(!isset($_POST['id']))
        {
            header("Location: /");
            exit();
        } else {
            $invoice = App::get('database')->selectID('invoice',$_POST['id']);
            $products = App::get('database')->selectProduct('products',$_POST['id']);


            return view('view', compact('invoice','products'));
        }

    }

    public function create()
    {

        if(isset($_POST['newinvoice']))
        {
           $last_id = App::get('database')->insert('invoice', 
                [
                    'email' => $_POST['email'],
                    'phone' => $_POST['phone'],
                    'name' => $_POST['name'],
                    'address' => $_POST['address'],
                    'paid' =>$_POST['paid'],
                    'total' => $_POST['total'],
                    'note' => $_POST['remarks'],
                    'balance' => $_POST['total']-$_POST['paid']
                ]); 

            $arr = array_chunk($_POST['product'], 1);
            $length = count($arr[1][0]);
            for($i = 0; $i < $length; $i++)
            {
                App::get('database')->insert('products', 
                [
                    'invoice' => $last_id,
                    'name' => $arr[0][0][$i],
                    'price' => $arr[1][0][$i],
                ]);

            }
            return redirect('');
            } 
            
        return view('create');

    }

    public function delete()
    {
        
        if(!isset($_POST['id'])){
        return redirect('');
      
        } else {
        App::get('database')->delete('invoice','id',$_POST['id']);
        App::get('database')->delete('products','invoice',$_POST['id']);
        return redirect('');
        }
    }

    public function update()
    {
        if (!isset($_POST['id']))
        {
            header("Location: /");
            exit();
        } else if (isset($_POST['editinvoice']))
        {

            App::get('database')->update('invoice', 
                [
                    'email' => $_POST['email'],
                    'phone' => $_POST['phone'],
                    'name' => $_POST['name'],
                    'address' => $_POST['address'],
                    'paid' =>$_POST['paid'],
                    'total' => $_POST['total'],
                    'note' => $_POST['remarks'],
                    'balance' => $_POST['total']-$_POST['paid']
                ],$_POST['id']);
            App::get('database')->delete('products','invoice',$_POST['id']);
             $arr = array_chunk($_POST['product'], 1);
            $length = count($arr[1][0]);
            for($i = 0; $i < $length; $i++)
            {
                App::get('database')->insert('products', 
                [
                    'invoice' => $_POST['id'],
                    'name' => $arr[0][0][$i],
                    'price' => $arr[1][0][$i],
                ]);

            }

            echo "<script> alert('Data Updated Successfully');</script>";

            
        }

            $invoice = App::get('database')->selectID('invoice', $_POST['id']);
            $products = App::get('database')->selectProduct('products',$_POST['id']);

            return view('update', compact('invoice','products'));
    }
}