<!doctype html>
<html lang="en">
  <head>
    <title>BeePakk Food Products</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="<?php echo base_url('css/style.css'); ?>" />
  </head>
  <body>

  <div class="container">
    <div class="row">
      
    <nav class="navbar navbar-expand-sm navbar-light bg-light mb-3 w-100">
      <a class="navbar-brand" href="/">BeePakk Food</a>
      <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
          aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="/"><i class="fa fa-home fa-lg" aria-hidden="true"></i> <span class="sr-only">(current)</span></a>
          </li>
          <!--<li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
            <div class="dropdown-menu" aria-labelledby="dropdownId">
              <a class="dropdown-item" href="#">Action 1</a>
              <a class="dropdown-item" href="#">Action 2</a>
            </div>
          </li-->
        </ul>
        <form class="form-inline my-2" action="<?php echo site_url() ?>" method="POST">
          <input class="form-control mr-sm-2" type="text" name="search" placeholder="Search" value="<?php echo getPropVal($_POST, "search"); ?>">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search" aria-hidden="true"></i> Search</button>
        </form>
      </div>
    </nav>

  </div>
</div><!-- .container -->

<?php if (!empty($error)) : ?>
<div class="container">

  <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
    <!--div class="card-header">Hiba</div-->
    <div class="card-body p-2">
      <p class="card-text"><i class="fa fa-exclamation-triangle fa-lg" aria-hidden="true"></i> <?php echo $error; ?></p>
    </div>
  </div>

</div><!-- .container -->
<?php endif; ?>

<?php if (!empty($success)) : ?>
<div class="container">
  <div class="row">
    <div class="col-md-6 offset-md-3">
    
      <div class="card text-white bg-success mb-3">
        <!--div class="card-header">Hiba</div-->
        <div class="card-body p-2">
          <p class="card-text"><i class="fa fa-exclamation-triangle fa-lg" aria-hidden="true"></i> <?php echo $success; ?></p>
        </div>
      </div>
      
    </div>
  </div>

</div><!-- .container -->
<?php endif; ?>
