<html>
    <head> 
        <title>Eshop - <?= $title ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?= $this->include("layout/assets-komponenty");?> 
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;700&display=swap');
            .my-font{
                font-family: 'Josefin Sans', sans-serif;
                font-weight: 400;
            }
            .my-font2{
                font-family: 'Josefin Sans', sans-serif;
                font-weight: 700;
            }
            .leftForm {
                float:left;
                margin:5px;
            }
        </style>
 </head> 
 <body>
 <div style="min-height: 92.5%;">
 <?= $this->include("layout/navbar-komponenty");?>
 <!--Dynamický obsah -->
 <div class="container mt-5"><?= $this->renderSection("content"); ?></div>
 </div>
 <div class="my-font"><?= $this->include("layout/footer-komponenty");?></div>
</body>
</html>