<!--------------------------------------------HEAD------------------------------------------------------>
<head>
    <link rel="shortcut icon" href="img/fav.png"><!--favicon du site-->
    <meta charset ="utf_8"><!--Encodage universel-->
    <link href="../main/css/main.css" rel="stylesheet"><!--lien vers feuille de style avec le nom de celle-ci-->
    <title>Flx Cars</title><!--Titre de la page web-->
</head>

<!------------------------------------------INCLUDES---------------------------------------------------->

<?php include '../includesHeaderFooter/header.php'; ?>

<!----------PATH---------->
<div class="pathButtons">
        <a class="boutonPathActual">Accueil</a>
</div>
<!----------PATH---------->

<!---------------------------------------------MAIN----------------------------------------------------->
<main>

<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4" aria-label="Slide 5"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active" style="background-image: url('../../library/imgFioritures/pexels-jae-park-3770875.jpg')">
        <div class="carousel-caption">
            <h5></h5>
          <p class="pCarousel">Good parking.</p>
        </div>
      </div>
      <div class="carousel-item" style="background-image: url('../../library/imgFioritures/pexels-tyler-clemmensen-8376563.jpg')">
        <div class="carousel-caption">
         <h5></h5>
          <p class="pCarousel">BMW M2.</p>
        </div>
      </div>
      <div class="carousel-item" style="background-image: url('../../library/imgFioritures/pexels-leif-bergerson-9582590.jpg')">
        <div class="carousel-caption">
          <h5></h5>
          <p class="pCarousel">Audi Quattro S1.</p>
        </div>
      </div>
      <div class="carousel-item" style="background-image: url('../../library/imgFioritures/white-sedan-driving-on-the-highway-accross-the-forest.jpg')">
        <div class="carousel-caption">
          <h5></h5>
          <p class="pCarousel">Audi RS7.</p>
        </div>
      </div>
      <div class="carousel-item" style="background-image: url('../../library/imgFioritures/pexels-mike-noga-3541743.jpg')">
        <div class="carousel-caption">
          <h5></h5>
          <p class="pCarousel">Audi RS7.</p>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
</div>

<div class="bloc-index">
    
</div>


</main>
<div class="bloc-index-info">
    
</div>
<br><br><br><br><br><br>
<script src="//code.jquery.com/jquery-3.4.1.min.js"></script>
<?php require '../includesHeaderFooter/footer.php' ; ?>