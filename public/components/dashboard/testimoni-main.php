<?php
if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
    die('Direct Access Not Allowed.');
    exit();
    }

    require_once(getcwd() . "/module/connection.php");
    $query = "SELECT * FROM testimonies";
    $result_query = mysqli_query($connection,$query);

    $result_rows=[];
    while($result_single_row = mysqli_fetch_assoc($result_query)){
        $result_rows []=$result_single_row;
    }

    mysqli_close($connection);
?>
<div class="testimoni">
    <div class="container">
        <div class="row mb-2">
            <div class="col-12">
                <h1><b>Welcome Back, Administrator</b></h1>
            </div>
        </div>

        <?php
        require_once('navigator.php');
        ?>

        <div class="row mt-4">
            <div class="col-12">
                <a href="<?php echo $base_url . "index.php?page=dashboard&section=testi-new" ?>" 
                class="btn btn-primary">Create New</a>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <table class="responsive">
                    <tr>
                        <th>No.</th>
                        <th>Photo</th>
                        <th>Details</th>
                        <th>Action</th>
                    </tr>

                    <?php
                    foreach ($result_rows as $key => $value) {
                        echo
                            '<tr>
                        <td class="text-center">1</td>
                        <td class="text-center"><img src="assets/upload/testimoni/' . $value["photo_testimoni"] . '" alt=""></td>
                        <td class="pl-1">
                            <p class="mb-1">Nama:'.$value["title_testimoni"].'</a></p>
                            <p class="mb-1">Testimoni:'.$value["description_testimoni"].'</a></p>
                        </td>
                        
                        <td class="text-center">
                            <a href="" class="btn btn-sm btn-primary ml-1">Edit</a>
                        <a href="" class="btn btn-sm btn-danger">Hapus</a></td>
                    </tr>';
                    }
                    ?>
                
            
            
                </table>
            </div>
        </div>
    </div>
</div>