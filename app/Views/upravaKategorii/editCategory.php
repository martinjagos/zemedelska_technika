<?=$this->extend("layout/master-komponenty");?>

<?=$this->section("content");?>
<?php
helper('form'); 
?>
<form method="post" action="upravitKategorii" enctype="multipart/form-data">
<input type="hidden" name="_method" value="PUT"> 
<div class="mb-3 col-lg-8 col-xxl-5 col-md-10 col-sm-12">
<label for="nazevKategorie" class="my-font">Název kategorie</label><br>
<input type="text" class="form-control my-font" id="nazevKategorie" name="nazevKategorie" value="<?=$seznamKat[0]->typKomponent;?>"><br>
</div>

<div class="mb-3 col-lg-8 col-xxl-5 col-md-10 col-sm-12">
<label for="urlKategorie" class="my-font">URL kategorie</label><br>
<input type="text" class="form-control my-font" id="urlKategorie" name="urlKategorie" value="<?=$seznamKat[0]->url;?>"><br>
</div>

<input type="hidden" name="id" value="<?=$seznamKat[0]->idKomponent?>"> 

<div>
<input type="submit" class="btn btn-dark my-font" value="Odeslat">
</div>

</form>
<?=$this->endSection();?>