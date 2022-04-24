<?php
$conn = mysqli_connect("localhost", "root", "", "task_sub");

function select($conn, $table, $columns)
{
    $query = "SELECT $columns FROM $table";
    $result = mysqli_query($conn, $query);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}
$names = select($conn, 'users', 'id,name');

?>

<?php include 'layouts/head.php'; ?>
<?php include 'layouts/navbar.php'; ?>

<form action="conacte/post.php" method="POST" enctype="multipart/form-data">

    <div class="form-group">
        <label for="user_id">User Name </label>
        <select name="user_id" id="user_id" class="form-control">
            <?php foreach ($names as $name) : ?>
                <option value="<?= $name['id'] ?>">
                    <?= $name['name'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="text" class="form-label">Title</label>
        <input type="text" class="form-control" id="text" aria-describedby="text" name="title">
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Image</label>
        <input type="file" class="form-control" id="image" aria-describedby="emailHelp" name="image" id="image" multiple>
    </div>

    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Text</label>
        <input type="text" class="form-control" id="exampleInputPassword1" name="text">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>





<?php include 'layouts/foot.php'; ?>