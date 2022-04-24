<?php
$conn = mysqli_connect("localhost", "root", "", "task_sub");

$query = "select users.name, posts.title, posts.image, comments.comment ,comments.parent_id, comments.id ,posts.text 
    from comments
    
    join posts
    on comments.post_id = posts.id
    
    join users 
    on comments.user_id = users.id";

$result = mysqli_query($conn, $query);
$comments = mysqli_fetch_all($result, MYSQLI_ASSOC);


$newComment = [];
foreach ($comments as $comment) {
    $newComment[$comment['parent_id']][] = $comment;
}






function getImage(string $path)
{
    return "image/$path";
}

?>
<?php include 'layouts/head.php'; ?>
<?php include 'layouts/navbar.php'; ?>



<!-- Main Body -->
<section>
    <div class="container">
        <div class="row">
            <h1 style="text-align: center;">Comments</h1>
            <?php function make_tree_comments($parents)
            {

                global $newComment;

            ?>

                <ol>
                    <?php foreach ($parents as $parent) : ?>
                        <li>
                        
                            <div class="col-sm-15 col-md-15 col-12 pb-4">
                               
                            <br>
                            <br>
                                <div class="comment mt-6 text-justify">

                                    <img src="<?= getImage($parent['image']) ?>" alt="" class="rounded-circle" width="50" height="40">
                                    <h4> Name :  <?= $parent['name']; ?></h4>
                                    <br>
                                    <span> Title :   <?= $parent['title']; ?></span>
                                    <br>
                                    <span> Text :  <?= $parent['text']; ?></span>
                                    <br>
                                    <p> Comment :  <?=  $parent['comment']; ?></p>


                                </div>
                            </div>
                            <?php if (isset($newComment[$parent['id']]))
                                make_tree_comments($newComment[$parent['id']]); ?>
                        </li>
                        <br>
                    <?php endforeach; ?>
                </ol>
        </div>
    </div>
</section>
<?php
            }
            make_tree_comments($newComment[0]);
?>


<?php include 'layouts/foot.php'; ?>