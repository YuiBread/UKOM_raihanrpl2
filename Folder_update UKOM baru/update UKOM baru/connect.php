<?php
$connect = mysqli_connect("localhost","root","","database_UKOM");
                        // "hostname","username","password","nama database"

// if( !$connect){
//     die("koneksi tidak tersambung :" .mysqli_connect_error());
// }
if(mysqli_connect_errno()){
    echo "koneksi tidak tersambung" . mysqli_connect_error();
}
?>