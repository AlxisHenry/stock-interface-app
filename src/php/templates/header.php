<?php function returnHeader($title):string {

    $html = "<!DOCTYPE html><html><head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta http-equiv='content-type' content='text/html' charset='utf-8' />
    <title>$title</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css'>
    <link rel='icon' href='/assets/favicon.ico'>
    <link href='../../css/main.css' media='all' rel='stylesheet' type='text/css'/>
    </head><body>";

    return  $html;

}