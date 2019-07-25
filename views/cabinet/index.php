<?php include "views/layouts/header.php" ?>;

<section style="padding-bottom: 100px"><!--form-->
  <div class="container">
      <div class="row">
          <div class="col-sm-4">
              <h1>Кабинет ползователя</h1>
              <h2>Привет <?php echo $user['name']; ?></h2>
          </div>
      </div>
      <div class="row">
          <div class="col-sm-4">
              <a href="/cabinet/edit">Редактировать данные</a>
          </div>
      </div>
      <div class="row">
          <div class="col-sm-4">
              <a href="">Список покупок</a>
          </div>
      </div>
  </div>
</section><!--/form-->

<?php include "views/layouts/footer.php" ?>;