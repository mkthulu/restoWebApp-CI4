<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="viewport" content="initial-scale=1, maximum-scale=1" />
    <!-- site metas -->
    <title>Resto Anyar</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!-- site icon -->
    <link rel="icon" href="/images/fevicon.png" type="image/png" />
    <!-- bootstrap css -->
    <link rel="stylesheet" href="/css/bootstrap.min.css" />
    <!-- site css -->
    <link rel="stylesheet" href="/style.css" />
    <!-- responsive css -->
    <link rel="stylesheet" href="/css/responsive.css" />
    <!-- color css -->
    <link rel="stylesheet" href="/css/colors.css" />
    <!-- select bootstrap -->
    <link rel="stylesheet" href="/css/bootstrap-select.css" />
    <!-- scrollbar css -->
    <link rel="stylesheet" href="/css/perfect-scrollbar.css" />
    <!-- custom css -->
    <link rel="stylesheet" href="/css/custom.css" />
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        html,
        body {
            color: black;
        }

        .card-img-top {
            max-width: 10000px;
            max-height: 8000px;
            width: 100%;
            height: 100%;
        }

        <?php if ($_SESSION['curPage'] == 'login') : ?>html,
        body {
            background-image: url(<?= base_url('//images/logo/background.jpg'); ?>);
            background-repeat: no-repeat;
            background-size: cover;
            min-height: 100vh;
        }

        <?php endif; ?>
    </style>
</head>

<body>

    <!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body> -->