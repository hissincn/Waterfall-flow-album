<?php
$servername="localhost";
$username="";
$password="";
$dbname = "";



function getall($sql_order)
{
    global $servername,$username,$password,$dbname;
    $conn=mysqli_connect($servername,$username,$password,$dbname);
    $sql_result = mysqli_fetch_all(mysqli_query($conn,$sql_order));
    return $sql_result;
}
function getarray($sql_order)
{
    global $servername,$username,$password,$dbname;
    $conn=mysqli_connect($servername,$username,$password,$dbname);
    $sql_result = mysqli_fetch_array(mysqli_query($conn,$sql_order));
    return $sql_result;
}
function getsql($sql_order)
{
    global $servername,$username,$password,$dbname;
    $conn=mysqli_connect($servername,$username,$password,$dbname);
    $sql_result = mysqli_query($conn,$sql_order);
    return $sql_result;
}
function getrow($sql_order)
{
    global $servername,$username,$password,$dbname;
    $conn=mysqli_connect($servername,$username,$password,$dbname);
    $sql_result =mysqli_fetch_row(mysqli_query($conn,$sql_order));
    return $sql_result;
}
function getassoc($sql_order)
{
    global $servername,$username,$password,$dbname;
    $conn=mysqli_connect($servername,$username,$password,$dbname);
    $sql_result =mysqli_fetch_assoc(mysqli_query($conn,$sql_order));
    return $sql_result;
}
function getfield($sql_order)
{
    global $servername,$username,$password,$dbname;
    $conn=mysqli_connect($servername,$username,$password,$dbname);
    $sql_result =mysqli_fetch_field(mysqli_query($conn,$sql_order));
    return $sql_result;
}
