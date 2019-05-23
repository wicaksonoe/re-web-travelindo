<?php
$dir_upload = "files/";
$uploadfile = $dir_upload . $_FILES['file']['name'];

if (is_uploaded_file($_FILES['file']['tmp_name'])) {

    $kirim = move_uploaded_file ($_FILES['file']['tmp_name'], $uploadfile);

    if ($kirim) {

            echo "File berhasil diupload ke server pada folder <b>$uploadfile</b>";

    } else {
        echo "File gagal diupload";
        echo "error : ". $_FILES['file']['error'];
    }
}else {
    echo "error : ". $_FILES['file']['error'];
}
?>
