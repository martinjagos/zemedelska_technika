<?=$this->extend("layout/master-komponenty");?>

<?=$this->section("content");?>
<?php
echo '<div class="row d-flex justify-content-center">';
echo '<h1 class="my-font text-center mb-5">'.$title.'</h1>';


foreach($seznam as $radek){
    echo '<div class="card m-2" style="width: 18rem;">';
    $echo_karta = '<img src="'.base_url('assets/komponenty/komponenty/').'/'.$radek -> pic.'" class="card-img-top p-3" style="height: 200px; object-fit: contain;"><div class="card-body"><h5 class="card-title my-font h5 text-black">'.$radek -> nazev.'</h5><p class="card-text my-font text-muted">ID: <span class="text-muted">'.$radek -> id.'</span></p></div></div>';
    echo anchor("komponent/".$radek -> id, $echo_karta, 'class="text-decoration-none"');
}
echo '</div>';
echo '<div class="d-flex justify-content-center m-5">';
echo $pager->links();
echo '</div>';
?>
<?=$this->endSection();?>