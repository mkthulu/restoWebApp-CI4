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
            <div class="col">
                <h2 class="fw-bold">Keranjang :</h2>

            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table table-borderless" style="text-align : center">
                    <tr style="border-bottom: 1px solid grey">
                        <td>Nama</td>
                        <td>Gambar</td>
                        <td>Jumlah</td>
                        <td>Total Harga</td>
                        <td></td>

                    </tr>
                </table>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        let pesanan = JSON.parse(localStorage.getItem('pesanan'))
        let total = 0
        let menu = 0
        let user = localStorage.getItem('username')
        let nomeja = localStorage.getItem('nomeja')
        if (pesanan !== null) {

            for (let [i, item] of pesanan.entries()) {
                menu += Number(item[5])
                total += Number(item[4])
                document.querySelector('.table').innerHTML += `
                    <tr style="border-bottom: 1px solid grey">
                        <td>${item[1]}</td>
                        <td style="width : 15%"><img style="width : 100%" src="/images/${item[2]}" /></td>
                        <td style="text-align : center">${item[5]}</td>
                        <td style="text-align : center" class="fw-bold">Rp.${item[4]}</td>
                        <td><a ><button class="btn btn-danger delete" id="${i}" >delete</button></a></td>
                    </tr>
                    
                    `
            }
            document.querySelector('.table').innerHTML += `
                    <tr style="border-bottom: 1px solid grey"> 
                        <td colspan="3" style="text-align : end" class="fw-bold">Pemesan</td>
                        <td style="width : 10%">:</td>
                        <td  style="text-align : end; width : 10%" class="fw-bold">${user}</td>
                    </tr>
                    <tr style="border-bottom: 1px solid grey"> 
                        <td colspan="3" style="text-align : end" class="fw-bold">Nomer meja</td>
                        <td style="width : 10%">:</td>
                        <td  style="text-align : end" class="fw-bold">${nomeja}</td>
                    </tr>
                    <tr style="border-bottom: 1px solid grey"> 
                        <td colspan="3" style="text-align : end" class="fw-bold">Total Menu</td>
                        <td style="width : 10%">:</td>
                        <td  style="text-align : end" class="fw-bold">${menu}</td>
                    </tr>
                    <tr style="border-bottom: 1px solid grey"> 
                        <td colspan="3" style="text-align : end" class="fw-bold">Total Harga</td>
                        <td style="width : 10%">:</td>
                        <td  style="text-align : end" class="fw-bold total">Rp. ${total}</td>
                    </tr>
                    <tr>
                    <td colspan="7" style="text-align : end"><button class="btn btn-warning pesan">Pesan</button></td>
                    </tr>
                
                `

        }




        let btnpesan = document.querySelector('.pesan')
        let btndel = document.getElementsByClassName('delete');
        [...btndel].forEach(e => {
            e.addEventListener('click', () => {

                pesanan.splice(e.id, 1)

                localStorage.setItem('pesanan', JSON.stringify(pesanan))
                location.href = '<?= base_url('/user-keranjang') ?>'
            })
        })


        async function send() {

            const res = await axios.post('<?= base_url('/user-pesan') ?>', {
                pesanan,
                user,
                nomeja,
                total
            })
            console.log(res)
            if (res.status == 200) {
                localStorage.removeItem('pesanan');
                localStorage.removeItem('username');
                localStorage.removeItem('nomeja');
                swal("Matur Suwun", "Pesanan Anda Akan Segera Datang", "success").then(e => {
                    if (e) {

                        location.href = '<?= base_url('/') ?>'
                    }
                })



            }
        }
        btnpesan.addEventListener('click', async () => {
            await send();
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