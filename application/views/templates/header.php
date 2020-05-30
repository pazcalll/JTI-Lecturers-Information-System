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
<nav class="navbar navbar-expand-lg navbar-dark bg-success sticky-top" >
  <a class="navbar-brand ml-md-4" href="<?=base_url();?>/project">JTI Information System</a>
  <button class="navbar-toggler float-right" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <ul class="float-right ml-auto mr-2 navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="<?=base_url();?>/project">Home</a>
      </li>
      <li class="nav-item ">
        <div class="btn-group">
          <button type="button" style="color:white; margin-top:2px; opacity: 50%;" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            CSV Control
          </button>
          <div class="dropdown-menu dropdown-menu-right">
            <?php if(isset($banned)){?>
              <a class="dropdown-item" href="<?=base_url();?>export/<?=$export?>">Export csv</a>
              <a class="dropdown-item" href="" onclick="return alert('Import is not available for this table')">Import csv</a>
            <?php }elseif(isset($export)){?>
              <a class="dropdown-item" href="<?=base_url();?>export/<?=$export?>">Export csv</a>
              <a class="dropdown-item" href="<?=base_url();?>import/<?=$export?>">Import csv</a>
            <?php } else{?>
              <a class="dropdown-item" href="" onclick="return alert('Please choose the table firstly!')">Export csv</a>
              <a class="dropdown-item" href="" onclick="return alert('Please choose the table firstly!')">Import csv</a>
            <?php }?>
            <!-- <button class="dropdown-item" type="button">Something else here</button> -->
          </div>
        </div>
        
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=base_url()?>/login/logout">Logout</a>
      </li>
      <li class="nav-item">
        <?php
          if (isset($add) && $add=="addstudyprogramlist") {
            # code...?>
            <a class="nav-link btn btn-success" style="background-color: green; padding-right:20px;padding-left: 20px;" 
            onclick="return alert('Not available for this data')" href="">+</a>
        <?php }
          elseif (isset($add)) {?>
            <a class="nav-link btn btn-success" style="background-color: green; padding-right:20px;padding-left: 20px;" 
            href="<?=base_url();?>addrow/<?=$add?>" >+</a>  
        <?php  }
          else{?>
            <a class="nav-link btn btn-success" style="background-color: green; padding-right:20px;padding-left: 20px;" 
            href="#" onclick="return alert('Please choose the table before add more data!')">+</a>  
        <?php }?>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li> -->
    </ul>
    <!-- <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form> -->
  </div>
</nav>    
