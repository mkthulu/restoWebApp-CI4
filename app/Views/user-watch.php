<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
<nav class="navbar navbar-light d-flex" style="background-color: #9E39FF;">
        <div class="container d-flex justify-content-start">
            <h1 class="navbar-brand text-white fw-bolder ">Nguntal</h1>
            <a class="nav-link text-white" href="/user-watch">home</a>
            <span class=" badge bg-primary" onclick="logout()" style="justify-self: flex-end;">logout</span>
            <span class="badge bg-warning"><a class="text-white" style="text-decoration: none;" href="/user-keranjang">keranjang</a></span>
            <span class="badge bg-success"><a class="text-white" style="text-decoration: none;" href="/admin-watch">admin</a></span>
        </div>
    </nav>
    <div class="container">
        <div class="row mt-5">
            <div class="col d-flex justify-content-center">
                <img src="/images/hero.png" alt="" style="width: 90%;">
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-12">
                <h4 class="fw-bolder">Available Menu : </h4>
                <hr>
            </div>
        </div>
        <div class="row ">

            <?php foreach ($items->getResult() as $item) { ?>
                <div class="col-md-4 d-flex flex-column justify-content-between" style="height: 350px;box-shadow: 0px 1px 0px rgba(17,17,26,0.1), 0px 8px 24px rgba(17,17,26,0.1), 0px 16px 48px rgba(17,17,26,0.1); box-sizing : border-box; padding: 1rem;">
                    <img src="/images/<?php echo $item->image ?>" alt="" style="width: 100%;
  height: 200px;
  object-fit: cover;
  object-position: center;">
                    <h5 class="fw-bolder"><?php echo $item->name ?></h5>
                    <h5 class="fw-bolder">Rp. <?php echo $item->price ?></h5>
                    <a href="/user-watch/<?php echo $item->id ?>" style="width: 100%;"><button class="w-100 rounded-3 border-0 py-2 text-white fw-bolder" style="background-color: #9E39FF;">Pesan</button></a>
                </div>


            <?php } ?>

        </div>
        <div class="row mb-5">

        </div>

    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script>
        let logout = () => {
            localStorage.removeItem('pesanan');
            localStorage.removeItem('username');
            localStorage.removeItem('nomeja');
            location.href = '<?= base_url('/') ?>'
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>