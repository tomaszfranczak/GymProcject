<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="public_html/css/club.css"/>
    <link rel="stylesheet" type="text/css" href="public_html/css/style.css"/>
    <link rel="stylesheet" type="text/css" href="public_html/css/fontello.css"/>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&amp;subset=latin-ext" rel="stylesheet">
  </head>
  <body>
    <?php 
      include "$_SERVER[DOCUMENT_ROOT]/obiektowo/tamplates/menu.php"; ?>
      <section class="image" style="background-image: url(public_html/media/images/img2.jpg);"></section>

        <section class="text">
            <div class="container">
                <div class="icon">
                    <span class="fa fa-arrows-h"></span>
                </div>
                <div class="content">
                    <h2>Najnowszy sprzęt</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a tempor orci. Sed sed odio nisi. Pellentesque maximus ut nisi ac efficitur. Nunc tempor eros sollicitudin lobortis varius. Proin non nulla efficitur, elementum lectus et, rhoncus sem. Quisque ullamcorper, est sed euismod suscipit, risus est sodales ante, ut posuere tellus enim porttitor leo. </p>
                    <p>Cras cursus purus nunc, in laoreet nisi accumsan nec. Mauris laoreet nunc vulputate vulputate blandit. Proin ipsum turpis, convallis sed leo sit amet, scelerisque mattis dolor. Mauris hendrerit ut purus quis posuere. Vivamus consequat libero vitae quam consequat, quis rhoncus ligula molestie. Pellentesque rutrum, justo a egestas vestibulum, quam nunc lobortis est, at maximus enim leo eget nisi. Nam malesuada justo sit amet rhoncus imperdiet.</p>
                    <p>Sed porta lorem est, eget hendrerit nibh pretium vel. Vivamus fringilla quis velit finibus malesuada. Curabitur mattis risus sed ipsum laoreet suscipit. Integer mi mi, ullamcorper eleifend diam non, ultricies tincidunt lectus. </p>
                </div>
            </div>
        </section>

        <section class="image" style="background-image: url(public_html/media/images/img1.jpg);"></section>

        <section class="text">
        <div class="container">
            <div class="icon">
                <span class="fa fa-group"></span>
            </div>
            <div class="content">
                <h2>Różnorodne zajęcia grupowe</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a tempor orci. Sed sed odio nisi. Pellentesque maximus ut nisi ac efficitur. Nunc tempor eros sollicitudin lobortis varius. Proin non nulla efficitur, elementum lectus et, rhoncus sem. Quisque ullamcorper, est sed euismod suscipit, risus est sodales ante, ut posuere tellus enim porttitor leo. </p>
                <p>Cras cursus purus nunc, in laoreet nisi accumsan nec. Mauris laoreet nunc vulputate vulputate blandit. Proin ipsum turpis, convallis sed leo sit amet, scelerisque mattis dolor. Mauris hendrerit ut purus quis posuere. Vivamus consequat libero vitae quam consequat, quis rhoncus ligula molestie. Pellentesque rutrum, justo a egestas vestibulum, quam nunc lobortis est, at maximus enim leo eget nisi. Nam malesuada justo sit amet rhoncus imperdiet.</p>
                <p>Sed porta lorem est, eget hendrerit nibh pretium vel. Vivamus fringilla quis velit finibus malesuada. Curabitur mattis risus sed ipsum laoreet suscipit. Integer mi mi, ullamcorper eleifend diam non, ultricies tincidunt lectus. </p>
            </div>
        </div>
    </section>

        <section class="image" style="background-image: url(public_html/media/images/img3.jpg);"></section>

        <section class="text">
            <div class="container">
                <div class="icon">
                    <span class="fa fa-graduation-cap"></span>
                </div>
                <div class="content">
                    <h2>Wykwalifikowana kadra</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a tempor orci. Sed sed odio nisi. Pellentesque maximus ut nisi ac efficitur. Nunc tempor eros sollicitudin lobortis varius. Proin non nulla efficitur, elementum lectus et, rhoncus sem. Quisque ullamcorper, est sed euismod suscipit, risus est sodales ante, ut posuere tellus enim porttitor leo. </p>
                    <p>Cras cursus purus nunc, in laoreet nisi accumsan nec. Mauris laoreet nunc vulputate vulputate blandit. Proin ipsum turpis, convallis sed leo sit amet, scelerisque mattis dolor. Mauris hendrerit ut purus quis posuere. Vivamus consequat libero vitae quam consequat, quis rhoncus ligula molestie. Pellentesque rutrum, justo a egestas vestibulum, quam nunc lobortis est, at maximus enim leo eget nisi. Nam malesuada justo sit amet rhoncus imperdiet.</p>
                    <p>Sed porta lorem est, eget hendrerit nibh pretium vel. Vivamus fringilla quis velit finibus malesuada. Curabitur mattis risus sed ipsum laoreet suscipit. Integer mi mi, ullamcorper eleifend diam non, ultricies tincidunt lectus. </p>
                </div>
            </div>
        </section>

        <section class="image" style="background-image: url(public_html/media/images/imglog.jpg);"></section>
        <?php include "$_SERVER[DOCUMENT_ROOT]/obiektowo/tamplates/break.php"; 
              include "$_SERVER[DOCUMENT_ROOT]/obiektowo/tamplates/footer.php"; ?>
  </body>
</html>