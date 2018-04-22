<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="public_html/css/style_menu.css"/>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&amp;subset=latin-ext" rel="stylesheet">
  </head>
  <body>
    <div id="up">
      <?php if( isset($_SESSION['online']) && !empty($_SESSION['online']) ) { ?> 
          <a href="logout.php">
            <div id="logout">Wyloguj się</div> 
          </a> <?php } ?>
    </div>
    <div id="menubar">
      <a href="index.php">
      <div id="logo">
        <img src="public_html/media/images/logo.png" alt="Gym" height="85px">
      </div>
      <div id="option-adress">SANDOMIERSKA 7</div> </a>
      <a href="club.php"><div class="option">KLUB</div></a>
      <a href="grafik.php"><div class="option">GRAFIK</div></a>
      <a href="price.php"><div class="option">CENNIK</div></a>
      <a href="kontakt.php"><div class="option">KONTAKT</div></a>
      <a href="log.php"> <div class="option-log">
          KARNET ONLINE
      </div> </a>
    </div>
  </body>