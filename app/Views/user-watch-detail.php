
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  
  <title>Hello, world!</title>
  <style>
  .error-jumlah {

    display: none;
    color : red;
  }
  .error-ket {
    display: none;
    color : red;
  }
  
  </style>
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
      <div class="col-md-6">
        <img src="/images/<?php echo $item->image ?>" alt="" style="width: 100%;">
      </div>
      <div class="col-md-6 d-flex flex-column justify-content-between " >
        <table class=" w-100">

          <tr style="border-bottom: 1px solid grey;">
            <td style="width : 40%">
              <h5>Panganan</h5>
            </td>
            <td style="width : 5%">:</td>
            <td>
              <h3 class="fw-bolder"><?= $item->name ?></h3>
            </td>
          </tr>
          <tr style="border-bottom: 1px solid grey;">
            <td style="width : 40%">
              <h5>Rega</h5>
            </td>
            <td>:</td>
            <td>
              <h3 class="fw-bolder">Rp. <?= $item->price ?></h3>
            </td>
          </tr>
          <tr style="border-bottom: 1px solid grey;">
            <td style="width : 40%">
              <h5>Kategori</h5>
            </td>
            <td>:</td>
            <td>
              <h3 class=""><?= $item->category ?></h3>
            </td>
          </tr>
          <tr style="border-bottom: 1px solid grey;">
            <td style="width : 40%">
              <h5>Jumlah</h5>
            </td>
            <td>:</td>
            <td>
              <h3 class="fw-bolder"><input style="background-color: #E9EBEF;" type="number" class="form-control jumlah"></h3>
              <p class="error-jumlah">Required</p>
            </td>
          </tr>
          <tr >
            <td style="width : 40%">
              <h5>Katrangan</h5>
            </td>
            <td>:</td>
            <td>
              <h3 class="fw-bolder"><textarea style="background-color: #E9EBEF;"  class="form-control ket"></textarea></h3>
              <p class="error-ket">Required</p>
            </td>
          </tr>
          


        </table>
          <button class="btn btn-primary submit">Pesan</button>

      </div>
    </div>
  </div>
  <script>
    let submit = document.querySelector('.submit')
    let ket = document.querySelector('.ket')
    let jumlah = document.querySelector('.jumlah')
    let pesanan = JSON.parse(localStorage.getItem('pesanan'))
    
   
    submit.addEventListener('click', () => {
     
      if(ket.value !== '' && jumlah.value !== ''){
        document.querySelector('.error-ket').style.display = 'none';
        document.querySelector('.error-jumlah').style.display = 'none';
          let array = [];
          array.push('<?= $item->id ?>')
          array.push('<?= $item->name ?>')
          array.push('<?= $item->image ?>')
          array.push('<?= $item->category ?>')
          array.push(Number('<?= $item->price ?>') * Number(jumlah.value))
          array.push(jumlah.value)
          array.push(ket.value)
          

          if(pesanan === null){
            let pesanan = []
            pesanan.push(array)
            localStorage.setItem('pesanan', JSON.stringify(pesanan))
          } else {
            
            pesanan.push(array)
            localStorage.setItem('pesanan', JSON.stringify(pesanan))
            
          }

          location.href = "<?= base_url('/user-keranjang') ?>"
      }  else {
        document.querySelector('.error-ket').style.display = 'block';
        document.querySelector('.error-jumlah').style.display = 'block';
      }
    })
    let logout = () => {
            localStorage.removeItem('pesanan');
            localStorage.removeItem('username');
            localStorage.removeItem('nomeja');
            location.href = '<?= base_url('/') ?>'
        }
  </script>
  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>