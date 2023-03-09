<?php 
if ($q->login === false) {
    header("Location: index.php?type=danger&msg=Halaman tidak bisa diakses.");
}

if (empty($_GET["u"])) {
    header("Location: index.php");
} else {
    $u = $_GET["u"];
    $q->select("SELECT * FROM tbl_users WHERE md5(username) = '$u'");
    $row = mysqli_fetch_object($q->result);
    
}


?>

<section id="detail">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body text-center">
                        <img src="assets/feather/user.svg" class="img-profile" alt="User icon profile">
                        <p class="lead mt-2 mb-1 fs-5 fw-bold"><?=$row->username?> | <?=$row->role?></p>
                        <p class="lead mt-0 fs-6"><?=$row->name?></p>
                        <a href="index.php?page=logout" onclick="del();" class="btn btn-primary">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>

    function del() {

        if (confirm("Anda yakin ingin logout?.") === false) {
            event.preventDefault();
        }
    }
</script>