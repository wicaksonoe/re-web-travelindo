<?php
if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
    die('Direct Access Not Allowed.');
    exit();
}
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
                <a href="" class="btn btn-primary">Create New</a>
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

                    <tr>
                        <td class="text-center">1</td>
                        <td class="text-center"><img src="<?php echo $base_url . 'assets/images/testimoni/111.png'; ?>"></td>
                        <td class="pl-1">
                            <p class="mb-1">Nama : Lorem Ipsum</p>
                            <p>Testimoni</p>
                            <p>Disini</p>
                        </td>
                        <td class="text-center"><a href=" " class="btn btn-sm btn-primary">Edit</a>
                            <a href="" class="btn btn-sm btn-danger ml-2">Hapus</a></td>
                    </tr>

                    <tr>
                        <td class="text-center">1</td>
                        <td class="text-center"><img src="<?php echo $base_url . 'assets/images/testimoni/111.png'; ?>"></td>
                        <td class="pl-1">
                            <p class="mb-1">Nama : Lorem Ipsum</p>
                            <p>Testimoni</p>
                            <p>Disini</p>
                        </td>
                        <td class="text-center"><a href="" class="btn btn-sm btn-primary">Edit</a>
                            <a href="" class="btn btn-sm btn-danger ml-2">Hapus</a></td>
                    </tr>

                    <tr>
                        <td class="text-center">1</td>
                        <td class="text-center"><img src="<?php echo $base_url . 'assets/images/testimoni/111.png'; ?>"></td>
                        <td class="pl-1">
                            <p class="mb-1">Nama : Lorem Ipsum</p>
                            <p>Testimoni</p>
                            <p>Disini</p>
                        </td>
                        <td class="text-center"><a href="" class="btn btn-sm btn-primary">Edit</a>
                            <a href="" class="btn btn-sm btn-danger ml-2">Hapus</a></td>
                    </tr>

                    <tr>
                        <td class="text-center">1</td>
                        <td class="text-center"><img src="<?php echo $base_url . 'assets/images/testimoni/111.png'; ?>"></td>
                        <td class="pl-1">
                            <p class="mb-1">Nama : Lorem Ipsum</p>
                            <p>Testimoni</p>
                            <p>Disini</p>
                        </td>
                        <td class="text-center"><a href="" class="btn btn-sm btn-primary">Edit</a>
                            <a href="" class="btn btn-sm btn-danger ml-2">Hapus</a></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>