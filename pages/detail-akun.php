<?php 
if ($q->login === false) {
    header("Location: index.php?type=danger&msg=Halaman tidak bisa diakses.");
}
?>

<section id="detail">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body text-center">
                        <img src="assets/images/logo-tjkt.png" class="img-profile" alt="">
                        <p class="lead mt-2 mb-1 fs-5 fw-bold">rzlam | Moderator</p>
                        <p class="lead mt-0 fs-6">Salsa Dwi Kumalasari</p>
                        <a href="index.php?page=logout" onclick="del();" class="btn btn-primary">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>

    function del() {

        if (confirm("Anda yakin ingin menghapus data ini?.") === false) {
            event.preventDefault();
        }
    }
</script>