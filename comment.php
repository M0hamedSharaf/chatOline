<?php
$conn = mysqli_connect("localhost", "root", "", "task_sub");

function select($conn, $table, $columns)
{
    $query = "SELECT $columns FROM $table";
    $result = mysqli_query($conn, $query);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}
$names = select($conn, 'users', 'id,name');
$posts = select($conn, 'posts', 'id,title');
$comments = select($conn, 'comments', '*');




?>
<?php include 'layouts/head.php'; ?>
<?php include 'layouts/navbar.php'; ?>



<form action="./conacte/comment.php" method="POST">

    <div class="form-group">
        <label for="parent_id "> Choose Parent Comment </label>
        <select name="parent_id" id="parent_id " class="form-control">
            <option value="0">no null</option>
            <?php foreach ($comments as $comment) : ?>
                <option value="<?= $comment['id'] ?>">
                                <?= $comment['comment'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="text" class="form-label">Comment</label>
        <input type="text" class="form-control" id="text" aria-describedby="text" name="comment">
    </div>
    <div class="mb-3">
        <label for="date_added" class="form-label">Add Date</label>
        <input type="time" class="form-control" id="date_added" aria-describedby="date_added" name="date_added">
    </div>

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

    <div class="form-group">
        <label for="post_id ">Post Name </label>
        <select name="post_id" id="post_id " class="form-control">
            <?php foreach ($posts as $post) : ?>
                <option value="<?= $post['id'] ?>">
                    <?= $post['title'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>


    <br>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>






<?php include 'layouts/foot.php'; ?>