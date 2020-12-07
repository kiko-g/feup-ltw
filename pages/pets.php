<?php require '../templates/head.html' ?>

<body>
  <?php require '../templates/navbar.html' ?>
  <article class="row"> <!-- row-padding -->
    <section class="side">
    </section>

    <section class="main">
      <div class="col w25 w50">
        <div class="container">
          <div class="inside-container">
            <img src="/assets/img/dog.jpg" class="display-pet">
            <div class="display-topleft display-hover">
              <button class="button-heart"><i class="fa fa-heart"></i></button>
            </div>
            <div class="display-bottomright display-hover">
              <button class="button-cart"> <i class="fa fa-shopping-cart"></i></button>
            </div>
          </div>
          <p>Doggo 1<br><b>€29.99</b></p>
        </div>
      </div>
      <div class="col w25 w50">
        <div class="container">
          <div class="inside-container">
            <img src="/assets/img/dog.jpg" class="display-pet">
            <div class="display-topleft display-hover">
              <button class="button-heart"><i class="fa fa-heart"></i></button>
            </div>          
            <div class="display-bottomright display-hover">
              <button class="button-cart"> <i class="fa fa-shopping-cart"></i></button>
            </div>
          </div>
          <p>Doggo 2<br><b>€39.99</b></p>
        </div>
      </div>
      <div class="col w25 w50">
        <div class="container">
          <div class="inside-container">
            <img src="/assets/img/dog.jpg" class="display-pet">
            <div class="display-topleft display-hover">
              <button class="button-heart"><i class="fa fa-heart"></i></button>
            </div>
            <div class="display-bottomright display-hover">
              <button class="button-cart"> <i class="fa fa-shopping-cart"></i></button>
            </div>
          </div>
          <p>Doggo 3<br><b>€49.99</b></p>
        </div>
      </div>
      <div class="col w25 w50">
        <div class="container">
          <div class="inside-container">
            <img src="/assets/img/dog.jpg" class="display-pet">
            <div class="display-topleft display-hover">
              <button class="button-heart"><i class="fa fa-heart"></i></button>
            </div>
            <div class="display-bottomright display-hover">
              <button class="button-cart"> <i class="fa fa-shopping-cart"></i></button>
            </div>
          </div>
          <p>Doggo 4<br><b>€59.99</b></p>
        </div>
      </div>
    </section>
  </article>
</body>

<?php require '../templates/footer.html' ?>

</html>