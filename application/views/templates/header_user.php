<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title?></title>
    <!-- <?php var_dump($semesters);?> -->

    <!-- css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <script type="text/javascript" src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <style>
      body{
        font-family: 'Montserrat',sans-serif;
        /* font: renner; */
      }
      .container{
        max-width: 100%;
        min-width: 00px;
        position: relative; min-height: 70vh; padding-bottom: 2.5rem;
      }
      table{
        overflow-x: scroll;
        /* display: block; */
        /* white-space: nowrap; */
        /* scroll-behavior: hide; */
      }
      
    </style>

</head>
<body>
<nav class="navbar navbar-expand-sm navbar-dark bg-success sticky-top" >
  <a class="navbar-brand ml-md-4" href="<?=base_url();?>user/index">User Information System</a>
  <button class="navbar-toggler float-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="float-right ml-auto mr-2 navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="<?=base_url();?>user/index">Home</a>
      </li>
      <li class="nav-item ">
        <!-- <a class="nav-link" href="" onclick="return alert('Update Csv is comingsoon!')">Update csv</a> -->
      </li>
      <li class="nav-item">
        <div class="dropdown show">
          <a class="btn btn-success dropdown-toggle border-0" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 18 18"><path d="M9 1C4.58 1 1 4.58 1 9s3.58 8 8 8 8-3.58 8-8-3.58-8-8-8zm0 2.75c1.24 0 2.25 1.01 2.25 2.25S10.24 8.25 9 8.25 6.75 7.24 6.75 6 7.76 3.75 9 3.75zM9 14.5c-1.86 0-3.49-.92-4.49-2.33C4.62 10.72 7.53 10 9 10c1.47 0 4.38.72 4.49 2.17-1 1.41-2.63 2.33-4.49 2.33z"/></svg>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
            <!-- <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a> -->
            <a class="dropdown-item" href="<?=base_url();?>contractcontroller/index">Contracts</a>
            <a class="dropdown-item" href="<?=base_url();?>user/userdetail">User info</a>
            <a class="dropdown-item" href="<?=base_url().'login/logout';?>">Logout</a>
          </div>
        </div>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li> -->
    </ul>
    <!-- <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form> -->
  </div>
</nav>    
