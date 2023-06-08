<?=$this->extend("layout/master-komponenty");?>

<?=$this->section("content");?>
<?php
helper('form'); 
?>
<form method="post" action="vytvoritKomponent" enctype="multipart/form-data">
<div class="mb-3 col-lg-8 col-xxl-5 col-md-10 col-sm-12">
<label for="nazevKomponenty" class="my-font">Název komponenty</label><br>
<input type="text" class="form-control my-font text-secondary" id="nazevKomponenty" name="nazevKomponenty"><br>
</div>

<div class="mb-3 col-lg-8 col-xxl-5 col-md-10 col-sm-12">
<label for="vyrobceId" class="my-font">ID výrobce</label><br>
<input type="text" class="form-control my-font text-secondary" id="vyrobceId" name="vyrobceId"><br>
</div>

<div class="mb-3 col-lg-8 col-xxl-5 col-md-10 col-sm-12">
<label for="typKomponentId" class="my-font">Kategorie</label><br>
<input type="text" class="form-control my-font text-secondary" id="typKomponentId" name="typKomponentId"><br>
</div>

<div class="mb-3 col-lg-8 col-xxl-5 col-md-10 col-sm-12">
<label for="odkaz" class="my-font">Odkaz</label><br>
<input type="text" class="form-control my-font text-secondary" id="odkaz" name="odkaz"><br>
</div>

<div class="mb-3 col-lg-8 col-xxl-5 col-md-10 col-sm-12">
<label for="pic" class="my-font">Obrázek</label><br>
<input type="file" class="form-control my-font text-secondary" id="pic" name="pic"><br>
</div>


<div>
<input type="submit" class="btn btn-dark my-font" value="Odeslat">
</div>

</form>
<?=$this->endSection();?>