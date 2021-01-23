<?php
include 'fungsi/keamanan.php';
include 'includes/header.php';
include 'includes/navbar.php';
?>

<div class="container-fluid">

<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Edit Dokter </h6>
	</div>
	<div class="card-body">

		<?php

if (isset($_POST['edit_btn'])) {
    $id = $_POST['edit_id'];

    $query = "SELECT * FROM dokter WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);

    if (isset($_SESSION['success']) && $_SESSION['success'] != '') {
        echo '<h4> ' . $_SESSION['success'] . ' </h4>';
        unset($_SESSION['success']);
    }

    if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
        echo '<h4 class="bg-info"> ' . $_SESSION['status'] . ' </h4>';
        unset($_SESSION['status']);
    }

    foreach ($query_run as $data) {
        ?>

		<form action="fungsi/doktercode.php" method="post">
				<input type="hidden" name="edit_id" value="<?php echo $data['id'] ?>">
				<div class="form-group">
					<label> Nama </label>
					<input type="text" name="edit_nama" value="<?php echo $data['nama'] ?>" class="form-control" placeholder="Enter Nama">
				</div>
                <div class="form-group">
					<label>Alamat</label>
					<input type="text" name="edit_alamat" value="<?php echo $data['alamat'] ?>" class="form-control" placeholder="Enter Alamat">
				</div>
                <div class="form-group">
                <label>Rumah Sakit</label>
                <input list="anggotas" name="edit_id_rs" value="<?php echo $data['id_rs'] ?>" class="form-control" placeholder="Enter ID RS">
                <datalist id="anggotas">
<?php

$anggotas = "SELECT * FROM rs";
$anggotas_run = mysqli_query($connection,$anggotas);

?>

                <?php
                foreach($anggotas_run as $row){
                ?>
                <option value="<?php echo $row['id']; ?>"><?php echo $row['nama']; ?></option>
                <?php } ?>
                </datalist>
            </div>
				<button type="submit" name="updatebtn" class="btn btn-primary">Update</button>
				<a href="dokter.php" class="btn btn-danger">Cancel</a>

		</form>

        <?php
}

}
?>

	</div>
</div>
</div>

<?php
include 'includes/scripts.php';
include 'includes/footer.php';
?>