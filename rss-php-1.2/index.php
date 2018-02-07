<?php require_once "baglan.php"; ?>
<!doctype html>
<html lang="en">
  <head>
    <title>Blog Tasarımı -Bootsrap</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="keywords" content ="bootstrap,deneme,ilk site">
    <meta name="author" content="Ertuğrul Deniz">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>

  <body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-info">

          
          <div class="container">
            
              <a  href="index.html" class="navbar-brand">Ertuğrul Deniz</a>
              
              <button class="navbar-toggler" type="button" data-toogle="collapse" data-target="#menuac">
                
                <span class="navbar-toggler-icon"></span>

              </button>

              <div class="collapse navbar-collapse" id="menuac">
                
                <ul class="navbar-nav ml-auto">
                  <li class="nav-item active"><a href="#" class="nav-link"><i class="fa fa-home" aria-hidden="true"></i> Anasayfa</a></li>
                  <li class="nav-item"><a href="#" class="nav-link"><i class="fa fa-apple" aria-hidden="true"></i> Hakkımızda</a></li>
                  <li class="nav-item"><a href="#" class="nav-link"><i class="fa fa-rebel" aria-hidden="true"></i> Kategoriler</a></li>
                  <li class="nav-item"><a href="#" class="nav-link"><i class="fa fa-fire" aria-hidden="true"></i> Haberler</a></li>

                  <li class="nav-item"><a href="#" class="nav-link"><i class="fa fa-meetup" aria-hidden="true"></i> İletişim</a></li>
                </ul>

              </div>
          </div>

      
    </nav>



      <div class="container">
      
          <div class="row mt-4">
     
            <div class="col-md-8">

              <h1>Öne Çıkan Makaleler</h1> <hr class="bg-info">


                <?php

                $query = $db->prepare("SELECT * FROM haberler");
                $query->execute();
                while ($cek=$query->fetch(PDO::FETCH_ASSOC)){ ?>

                    <div class="card mb-4">
                        <img src="http://via.placeholder.com/750x300" class="card-mg-top">
                        <div class="card-body">
                            <h2 class="card-title"><?php echo $cek['baslik']; ?></h2>

                            <p class="card-text"><?php

                                echo $cek['icerik']; ?></p>
                            <a href="#" class="btn btn-info">Devamını gör <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                        </div>
                        <div class="card-footer text-muted">
                            <span>Paylaşılma Tarihi: <?php echo $cek['tarih'] ;?></span>
                        </div>
                    </div>
                <?php }


                ?>


                
                <nav aria-label="...">
                  <ul class="pagination justify-content-end">
                    <li class="page-item disabled">
                      <a class="page-link" href="#" tabindex="-1">Previous</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item active">
                      <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                      <a class="page-link" href="#">Next</a>
                    </li>
                  </ul>
                </nav>





            </div>


            <div class="col-md-4">

              <div class="card mb-4" >
                  <h6 class="card-header bg-info text-white"> Arama Alanı</h6>
                   <div class="card-body">
                      <form class="form-inline">
                        <input class="form-control mr-sm-2" type="search" placeholder="Aradığınız Kelime" aria-label="Search">
                        <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Ara</button>
                      </form>
                  </div>
              </div>



              <!--KATEGORİLER -->

              <div class="card mb-4" >
                  <h6 class="card-header bg-info text-white">Kategoriler</h6>
                   <div class="card-body">
                          <ul class="list-group">
                            <li class="list-group-item list-group-item-success">Android</li>
                            <li class="list-group-item list-group-item-info">Java </li>
                            <li class="list-group-item list-group-item-warning">Php</li>
                            <li class="list-group-item list-group-item-danger">Javascript</li>
                            <li class="list-group-item list-group-item-secondary">Bootsrap</li>
                            <li class="list-group-item list-group-item-dark">Python</li>
                            <li class="list-group-item list-group-item-light">Linux/Gnu</li>
                    
                            
                            
                          </ul>
                    
                  </div>
              </div>

              <!--KATEGORİLER BİTİŞ-->

               <!--REKLAM ALANI -->

              <div class="card mb-4" >
                  <h6 class="card-header bg-info text-white">REKLAM ALANI</h6>
                   <div class="card-body">
                       <img src="http://via.placeholder.com/300x270" class="card-mg-top">
                  </div>
              </div>

              <!--REKLAM ALANI BİTİŞ-->


            </div>

          </div>


      </div>

      <footer class="container-fluid text-center" style="background-color:rgba(129,212,250 ,1)" >

        <div class="container bg-grey">
          <div class="row">
            <div class="col-sm-5 mt-4">
              <p>Bize günün her saatinde ulaşabilirsiniz.</p>
              <p><i class="fa fa-envira"></i>  Ankara, TR</p>
              <p><i class="fa fa-angellist"></i>  +09053499999</p>
              <p><i class="fa fa-envelope"></i>  eertugruldeniz@gmail.com</p>
            </div>
            <div class="col-sm-7">
              <div class="row mt-4">
                <div class="col-sm-6 form-group">
                  <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
                </div>
                <div class="col-sm-6 form-group">
                  <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
                </div>
              </div>
              <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea><br>
              <div class="row">
                <div class="col-sm-12 form-group">
                  <button class="btn btn-default pull-right" type="submit">Send</button>
                </div>
              </div> 
            </div>
          </div>
        </div>
  
      </footer>






    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>
</html>