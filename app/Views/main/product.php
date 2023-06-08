<?=$this->extend("layout/master-komponenty");?>

<?=$this->section("content");?>
<?php
echo '<div class="row">';
echo '<div class="col-6 d-flex justify-content-center">';
echo '<img src="'.base_url('assets/komponenty/komponenty/').'/'.$seznam -> pic.'" class="img-fluid" style="width: 70%">';
echo '</div>';
echo '<div class="col-6 p-5">';
echo '<h1 class="my-font">'.$seznam -> nazev.'</h1>';
echo '<p class="my-font">Výrobce: <span class="text-muted">'.$seznamVyr -> vyrobce.'</span></p>';
echo '<p class="my-font">Odkaz: <span class="text-muted">'.$seznam -> odkaz.'</span></p>';
echo '</div>';
echo '</div>';
?>
<?=$this->endSection();?>