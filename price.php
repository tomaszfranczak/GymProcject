<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="public_html/css/style.css"/>
    <link rel="stylesheet" type="text/css" href="public_html/css/price.css"/>
    <link rel="stylesheet" type="text/css" href="public_html/css/fontello.css"/>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&amp;subset=latin-ext" rel="stylesheet">
  </head>
  <body>
    <?php 
      include "$_SERVER[DOCUMENT_ROOT]/obiektowo/tamplates/menu.php"; ?>
    <div id="containerr">
        <div id="pic">
        <p id="pp">Wybierz karnet dla siebie</p> 
        <button class="b" id="btn2" onclick="UseButton(event, 'open')">OPEN</button>
        <button class="b" id="btn1" onclick="UseButton(event, 'hopen')">half-OPEN</button>
        </div>
        <div id="open" class="przyk" style="text-align: justify"><b style="color:#ec008c;">Karnet OPEN</b> - umożliwia Ci korzystanie z klubu  bez żadnych ograniczeń ilościowych oraz czasowych. W zakres usług wchodzą: siłownie, zajęcia grupowe  , dostępne w klubie. <br><br>Cras cursus purus nunc, in laoreet nisi accumsan nec. Mauris laoreet nunc vulputate vulputate blandit. Proin ipsum turpis, convallis sed leo sit amet, scelerisque mattis dolor. Mauris hendrerit ut purus quis posuere. Vivamus consequat libero vitae quam consequat, quis rhoncus ligula molestie. Pellentesque rutrum, justo a egestas vestibulum, quam nunc lobortis est, at maximus enim leo eget nisi. Nam malesuada justo sit amet rhoncus imperdiet.<br><br>Sed porta lorem est, eget hendrerit nibh pretium vel. Vivamus fringilla quis velit finibus malesuada. Curabitur mattis risus sed ipsum laoreet suscipit. Integer mi mi, ullamcorper eleifend diam non, ultricies tincidunt lectus.</div>
        <div id="hopen" class="przyk" style="text-align: justify"><b style="color:#ec008c;">Karnet HALF OPEN</b> – abonament uprawniający do korzystania bez ograniczeń z wszelkich usług fitness i innych zajęć grupowych znajdujących się w ofercie Klubu oraz dostępu do siłowni Klubu przez okres 30 dni, z tym zastrzeżeniem, że wejście do Klubu musi nastąpić od godziny otwarcia Klubu jednak nie później niż przed godziną 16:00.<br><br>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a tempor orci. Sed sed odio nisi. Pellentesque maximus ut nisi ac efficitur. Nunc tempor eros sollicitudin lobortis varius. Proin non nulla efficitur, elementum lectus et, rhoncus sem. Quisque ullamcorper, est sed euismod suscipit, risus est sodales ante, ut posuere tellus enim porttitor leo.<br><br>Sed porta lorem est, eget hendrerit nibh pretium vel. Vivamus fringilla quis velit finibus malesuada. Curabitur mattis risus sed ipsum laoreet suscipit. Integer mi mi, ullamcorper eleifend diam non, ultricies tincidunt lectus.</div>
    </div>
    <script>
        function UseButton(evt, optionName) {
        var i, przyk, b;
        przyk = document.getElementsByClassName("przyk");
        for (i = 0; i < przyk.length; i++) { przyk[i].style.display = "none"; }
        b = document.getElementsByClassName("b");
        for (i = 0; i < b.length; i++) { b[i].className = b[i].className.replace(" active", "");}
        document.getElementById(optionName).style.display = "block";
        evt.currentTarget.className += " active";
        }
        document.getElementById("btn2").click();
    </script>
  </body>
</html>