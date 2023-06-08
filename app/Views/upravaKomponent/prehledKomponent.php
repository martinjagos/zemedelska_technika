<?=$this->extend("layout/master-komponenty");?>

<?=$this->section("content");?>
<?php
helper('form'); 

echo('
<p id="cisla"></p>
<div class="row">
<div class="col-auto">
<h3 class="my-font">Přidat novou komponentu</h3>
</div>
<div class="col-1">
<input type="number" class="form-control" id="cislo">
</div>

<div class="col-5">
<button class="my-font btn btn-dark m-0" onclick="addMore()">Přidat</button>
</div>

<div class="col-auto" id="butto">
</div>

</div>
');
$pridatForm = '
<div id="prvni">
<form method="post" action="vytvoritKomponent" enctype="multipart/form-data">
<table>
<td>
<div class="p-3">
<label for="nazevKomponenty" class="my-font mb-1">Název komponenty</label><br>
<input type="text" class="form-control my-font text-secondary" id="nazevKomponenty" name="nazevKomponenty" required><br>
</div>
</td>
<td>
<div class="p-3">
<label for="vyrobceId" class="my-font mb-1">ID výrobce</label><br>
<input type="text" class="form-control my-font text-secondary" id="vyrobceId" name="vyrobceId" required><br>
</div>
</td>

<td>
<div class="p-3">
<label for="typKomponentId" class="my-font mb-1">Kategorie</label><br>
<input type="text" class="form-control my-font text-secondary" id="typKomponentId" name="typKomponentId" required><br>
</div>
</td>

<td>
<div class="p-3">
<label for="odkaz" class="my-font mb-1">Odkaz</label><br>
<input type="text" class="form-control my-font text-secondary" id="odkaz" name="odkaz" required><br>
</div>
</td>

<td>
<div class="p-3">
<label for="pic" class="my-font mb-1">Obrázek</label><br>
<input type="file" class="form-control my-font text-secondary" id="pic" name="pic" required><br>
</div>
</td>

<td>
<div>
<input type="submit" class="btn btn-dark my-font" value="Odeslat">
</div>
</td>
</form>
</table>
</div>
';
echo '<div id="gg">'.$pridatForm.'</div>';
echo "<div class='row justify-content-center pt-3'>";
echo "<div class='col-lg-8 col-xxl-5 col-md-10 col-sm-12'>";
echo '<div class="row mb-5 text-center">';
echo '<div class="col">';
echo anchor("komponenty/novaKomponenta", "Přidat", 'class="text-decoration-none my-font btn btn-dark m-1"');
echo anchor("komponenty/prehledKomponent/#", "Smazat", 'class="text-decoration-none my-font btn btn-dark m-1"');
echo '<button class="text-decoration-none my-font btn btn-dark m-1" onclick="editComponent()">Upravit</button>';
//echo anchor("", "Upravit", 'class="text-decoration-none my-font btn btn-dark m-1" onclick="edit()"');
echo '</div>';
echo '</div>';
echo '<div class="table-responsive">';
echo '<form>';
echo '<div class="form-check">';
$table = new \CodeIgniter\View\Table();
$pole = array('<input type="checkbox" class="form-check-input m-0 p-0" id="check-all">', 'ID', 'Název kategorie', '', '');
$table->setHeading($pole);
$template = array(
    'table_open'=> '<table class="table my-font align-middle" id="tabulka">',
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
$pocetCheckBoxu = -1;
foreach($seznam as $radek){
    $pocetCheckBoxu++;
    //$editBtn = anchor("komponenty/upravitKategorie/".$radek->url, "Upravit", 'class="btn my-font"');
    //$delBtn = form_open("komponenty/smazatKategorii/".$radek->url,'class="align-middle mb-0"').'<input type="hidden" name="_method" value="DELETE" class="align-middle"> <button type="submit" class="btn my-font align-middle">Odstranit</button></form>';
    $checkBox = '<input type="checkbox" class="form-check-input m-0 p-0" id="check-'.$pocetCheckBoxu.'" value="'.$radek -> id.'">';
    $table->addRow($checkBox, $radek -> id, $radek -> nazev, "Upravit", "Smazat");
}
echo $table->generate();
echo "</div>";
echo "</div>";
echo "</div>";
?>
<script type="text/javascript">
    pocet = 0;
    vybraneCisla = [];
    let jedenPrvek = '<form method="post" action="vytvoritKomponent" enctype="multipart/form-data" id="formular"><table><td><div class="p-3"><label for="nazevKomponenty" class="my-font mb-1">Název komponenty</label><br><input type="text" class="form-control my-font text-secondary" id="nazevKomponenty" name="nazevKomponenty" required><br></div></td><td><div class="p-3"><label for="vyrobceId" class="my-font mb-1">ID výrobce</label><br><input type="text" class="form-control my-font text-secondary" id="vyrobceId" name="vyrobceId" required><br></div></td><td><div class="p-3"><label for="typKomponentId" class="my-font mb-1">Kategorie</label><br><input type="text" class="form-control my-font text-secondary" id="typKomponentId" name="typKomponentId" required><br></div></td><td><div class="p-3"><label for="odkaz" class="my-font mb-1">Odkaz</label><br><input type="text" class="form-control my-font text-secondary" id="odkaz" name="odkaz" required><br></div></td><td><div class="p-3"><label for="pic" class="my-font mb-1">Obrázek</label><br><input type="file" class="form-control my-font text-secondary" id="pic" name="pic" required><br></div></td></form></table>';
    let but = '<div class="d-flex justify-content-end"><button class="my-font btn btn-dark m-0" onclick="send()">Odeslat vše</button></div>';
    function addMore(){
        cislo = document.getElementById("cislo").value;
        document.getElementById("gg").innerHTML = "";
        for(let i = 0; i < cislo; i++){
            document.getElementById("gg").innerHTML += jedenPrvek;
            document.getElementById("formular").id = "form"+i;
            pocet++;
        }
        document.getElementById("gg").innerHTML += but;
    }
    function send(){
        for(let i = 0; i < pocet; i++){
            document.getElementById("form"+i).submit();
        }
    }
    function editComponent(){
        var count = '<?php Print($pocetCheckBoxu); ?>'+1;
        //document.getElementById("cisla").innerHTML += count;
        cisloCheck = 0;
        vybraneCisla = [];
        for(let i = 0; i < count; i++){
            if(document.getElementById("check-"+cisloCheck).checked == true){
                vybraneCisla.push(document.getElementById("check-"+cisloCheck).value)
                document.getElementById("cisla").innerHTML = vybraneCisla;
            }
            cisloCheck++;
        }
        
    }
</script>
<?=$this->endSection();?>