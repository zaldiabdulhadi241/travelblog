<?php
$koneksi = mysqli_connect("localhost", "root", "", "travelblog");

function showAll($tableName, $limit = null)
{
    global $koneksi;
    $query = mysqli_query($koneksi, "SELECT * FROM $tableName $limit");
    $rows = array();

    while ($row = mysqli_fetch_array($query)) {
        $rows[] = $row;
    }

    return $rows;
}

function showBy($id)
{
    global $koneksi;
    $query = mysqli_query($koneksi, "SELECT * FROM articles WHERE id_article = '$id'");

    while ($row = mysqli_fetch_object($query)) {
        $rows[] = $row;
    }

    return $rows;
}

function showQuotes($tableName, $id)
{
    global $koneksi;
    $query = mysqli_query($koneksi, "SELECT * FROM $tableName WHERE id_quotes = '$id'");
    $rows = array();
    while ($row = mysqli_fetch_array($query)) {
        $rows[] = $row;
    }

    return $rows;
}

function counter($tableName)
{
    global $koneksi;
    $query = mysqli_query($koneksi, "SELECT * FROM $tableName");
    $count = mysqli_num_rows($query);

    return $count;
}
