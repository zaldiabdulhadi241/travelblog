<?php include "../../controllers/koneksi.php" ?>
<?php if (!isset($_GET['page'])) {
    header("Location:1");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Travelblog - Articles</title>
    <link rel="stylesheet" href="../../css/global.css">
    <link rel="icon" type="image/x-icon" href="../../assets/icon/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../../css/styles.css" rel="stylesheet" />
</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="../../">TravelBlog</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="../../">Home</a></li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="../about/">About</a></li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="">Articles</a></li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="https://travelbook.co.id/hubungi-kami" target="_blank">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Page Header-->
    <header class="masthead" style="background-image: url('assets/img/about-bg.jpg')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="page-heading">
                        <h1>Articles</h1>
                        <span class="subheading">Present a lot of articles</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main Content-->
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <?php $limit = 4 ?>
                <?php $count = counter("articles") ?>
                <?php $page = (isset($_GET['page']) ? $_GET['page'] - 1 : 0) ?>
                <?php $pagination = $count / $limit + 1 ?>
                <?php $offset = $limit  * $page ?>
                <?php foreach (showAll("articles", "LIMIT $limit OFFSET $offset") as $row) : ?>
                    <!-- Post preview-->
                    <div class="post-preview">
                        <a href="../detail/<?= $row['id_article'] ?>">
                            <img src="../../assets/img/<?= $row['gambar'] ?>" width="350px" height="230px" alt="">
                            <h2 class="post-title fs-2"><?= $row['judul'] ?></h2>
                            <h3 class="post-subtitle fs-4 article-description" style="text-overflow: ellipsis; overflow: hidden;"><?= nl2br($row['deskripsi']) ?>a</h3>
                        </a>
                        <p class="post-meta">
                            Posted by
                            <a href=""><?= $row['author'] ?></a>
                            on <?= date('F d Y', strtotime($row['postedAt'])) ?>
                        </p>
                    </div>
                    <!-- Divider-->
                    <hr class="my-4" />
                <?php endforeach ?>

                <!-- Pagination -->
                <nav aria-label="Page navigation">
                    <ul class="pagination d-flex justify-content-end">
                        <?php if ($page > 0) : ?>
                            <li class="page-item"><a class="page-link" href="<?= $_GET['page'] - 1 ?>">Previous</a></li>
                        <?php endif ?>
                        <?php for ($i = 1; $i <= $pagination; $i++) : ?>
                            <li class="page-item"><a class="page-link" href="<?= $page = $i ?>"><?= $i ?></a></li>
                        <?php endfor ?>
                        <?php if ($_GET['page'] < 3) : ?>
                            <li class="page-item"><a class="page-link" href="<?= $_GET['page'] + 1 ?>">Next</a></li>
                        <?php endif ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <!-- Footer-->
    <footer class="border-top">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <ul class="list-inline text-center">
                        <li class="list-inline-item">
                            <a href="https://www.instagram.com/travelbook.co.id/" target="_blank">
                                <span class="fa-stack fa-lg">
                                    <i class="fas fa-circle fa-stack-2x"></i>
                                    <i class="fab fa-instagram fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                    </ul>
                    <div class="small text-center text-muted fst-italic">Copyright &copy; TravelBlog 2023</div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>