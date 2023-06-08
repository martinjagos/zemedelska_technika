<!DOCTYPE html>
<html>
    <head>
<style>
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
}
</style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light bg-faded fs-3 text-uppercase shadow-sm">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
    <ul class="navbar-nav ms-3">
      <li class="nav-item me-5 my-font">
      <?=anchor('komponenty','Domů', "class='nav-link'");?>
            <span class="visually-hidden">(current)</span>
      </li>
      <li class="nav-item me-5 my-font">
      <?=anchor('komponenty/prehledKategorii','Přehled kategorií', "class='nav-link'");?>
      </li>
      <li class="nav-item my-font">
      <?=anchor('komponenty/prehledKomponent','Přehled komponent', "class='nav-link'");?>
      </li>
    </ul>
  </div>
</nav>
</body>
</html>
