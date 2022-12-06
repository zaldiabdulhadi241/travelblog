<?php
$koneksi = mysqli_connect("localhost", "root", "", "travelblog");

function showAll()
{
    global $koneksi;
    $query = mysqli_query($koneksi, "SELECT * FROM articles");

    while ($row = mysqli_fetch_object($query)) {
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
