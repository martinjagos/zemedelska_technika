<?=$this->extend("layout/master-komponenty");?>

<?=$this->section("content");?>
<?php
helper('form'); 
?>
<form method="post" action="vytvoritKategorii" enctype="multipart/form-data">
<div class="mb-3 col-lg-8 col-xxl-5 col-md-10 col-sm-12">
<label for="nazevKategorie" class="my-font">Název kategorie</label><br>
<input type="text" class="form-control my-font text-secondary" id="nazevKategorie" name="nazevKategorie"><br>
</div>

<div class="mb-3 col-lg-8 col-xxl-5 col-md-10 col-sm-12">
<label for="urlKategorie" class="my-font">URL kategorie</label><br>
<input type="text" class="form-control my-font text-secondary" id="urlKategorie" name="urlKategorie"><br>
</div>

<div>
<input type="submit" class="btn btn-dark my-font" value="Odeslat">
</div>

</form>
<?=$this->endSection();?>