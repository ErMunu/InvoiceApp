<?php

$router -> get('','PagesController@home');

$router -> post("view/invoice",'PagesController@view');
$router -> get("view/invoice",'PagesController@view');

$router -> get('create/invoice', 'PagesController@create');
$router -> post('create/invoice', 'PagesController@create');

$router -> post('delete/invoice','PagesController@delete');

$router -> get('edit/invoice','PagesController@update');
$router -> post('edit/invoice','PagesController@update');

