<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
  <body>
    <div class="container">
    <br>
    <div class="row">
        <div class="col-10">
          <br>
          <a class="link-underline link-underline-opacity-0" href="<?= $this->Url->build('admin'); ?>"><h1>Dashboard</h1></a>
        </div>
        <div class="col border">
        <?php if(true) : ?>
            <p>Вы вошли как: <i></i></p>
            <a href="/logout">Выйти</a>
        <?php endif; ?>
        </div>
      </div>
    <hr>
        <!-- Here's where I want my views to be displayed -->
        <?= $this->fetch('content') ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
