<?=$this->extend("layout/master-komponenty");?>

<?=$this->section("content");?>
<?php
helper('form'); 
echo "<div class='row justify-content-center pt-3'>";
echo "<div class='col-lg-8 col-xxl-5 col-md-10 col-sm-12'>";
echo '<div class="mb-5 text-center">';
echo anchor("komponenty/novaKategorie", "Přidat kategorii", 'class="text-decoration-none my-font btn btn-dark"');
echo '</div>';
echo '<div class="table-responsive">';
$table = new \CodeIgniter\View\Table();
$pole = array('ID', 'Název kategorie', '', '');
$table->setHeading($pole);
$template = array(
    'table_open'=> '<table class="table my-font align-middle">',
    'thead_open'=> '<thead>',
    'thead_close'=> '</thead>',
    'heading_row_start'=> '<tr>',
    'heading_row_end'=>' </tr>',
    'heading_cell_start'=> '<th>',
    'heading_cell_end' => '</th>',
    'tbody_open' => '<tbody>',
    'tbody_close' => '</tbody>',
    'row_start' => '<tr>',
    'row_end'  => '</tr>',
    'cell_start' => '<td class="align-middle">',
    'cell_end' => '</td>',
    'row_alt_start' => '<tr>',
    'row_alt_end' => '</tr>',
    'cell_alt_start' => '<td class="align-middle">',
    'cell_alt_end' => '</td>',
    'table_close' => '</table>'
    );
    
    $table->setTemplate($template);
foreach($seznamKat as $radek){
    $editBtn = anchor("komponenty/upravitKategorie/".$radek->url, "Upravit", 'class="btn my-font"');
    $delBtn = form_open("komponenty/smazatKategorii/".$radek->url,'class="align-middle mb-0"').'<input type="hidden" name="_method" value="DELETE" class="align-middle"> <button type="submit" class="btn my-font align-middle">Odstranit</button></form>';
    $table->addRow($radek -> idKomponent, $radek -> typKomponent, $editBtn, $delBtn);
}
echo $table->generate();
echo "</div>";
echo "</div>";
echo "</div>";
?>
<?=$this->endSection();?>