<?php include 'layouts/head.php'; ?>
<?php include 'layouts/navbar.php'; ?>

<form action="conacte/createUser.php" method="POST">
    <div class="mb-3">
        <label for="text" class="form-label">Name</label>
        <input type="text" class="form-control" id="text" aria-describedby="text" name="user">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
    </div>

    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" name="password">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>





<?php include 'layouts/foot.php'; ?>