<!--
//ETML
// Auteur : Colin Brand
// Date : 26.01.16
// Description :Page pour ajouter une recette
-->
<?php
// Connexion à la base de données
$connector= new PDO('mysql:host=localhost;dbname=db_recipe;charset=utf8','root','');
$idReceipt = $_GET['idRecipe'];
// Créer une requête
$strSQLRequest =  "SELECT * FROM receipt WHERE idReceipt = '$idReceipt'";

$query = $connector->prepare($strSQLRequest);
$query->execute();

$results = $query->fetchAll(PDO::FETCH_ASSOC);
//var_dump($results);

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Ajout de recettes</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body data-spy="scroll" data-target="#navbar" data-offset="0">
<header id="header" role="banner" style="background-color: #ffffff">
    <div class="container">
        <div id="navbar" class="navbar navbar-default">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html"></a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="AllRecipes.php">Toutes les recettes</a></li>
                    <li><a href="AddRecipe.php">Ajouter une recette</a></li>
                    <li><a href="Contact.html">Contact</a></li>
                </ul>
            </div>
        </div>
    </div>
</header><!--/#header-->
<section class="container">
    <br><br><br><br><br><br><br><br>
    <?php
        echo "<tr>";
        foreach($results as $line){
            echo "<label>Nom de la recette</label>";
            echo "<input class=\"form-control\" type='text' value='" . $line["name"] . "' disabled = disabled><br><br>";

            echo "<label>Publiée par</label>";
            echo "<input class=\"form-control\" type='text' value='" . $line["author"] . "' disabled = disabled><br><br>";

            echo "<label>Temps de préparation (HH//MM//SS)</label>";
            echo "<input class=\"form-control\" type='text' value='" . $line["prepTime"] . "' disabled = disabled><br><br>";

            echo "<label>Ingrédients</label>";
            echo "<textarea rows = 15 class=\"form-control\" disabled = disabled>" . $line["ingredients"] . "</textarea><br><br>";

            echo "<label>Réalisation de la recette</label>";
            echo "<textarea rows = 30 class=\"form-control\" disabled = disabled>" . $line["steps"] . "</textarea><br><br>";
        }
        echo "</tr>";
    ?>
    <br><br><br><br><br><br><br><br>

</section>
<footer id="footer" style="background-color: lightslategray">
    <div class="container">
        <div class="row">
            <div class="col-sm-6" style="color: white">
                &copy; 2016 Cin2a réalisé avec le template <a style="color: white" target="_blank" href="http://shapebootstrap.net/" title="Free Twitter Bootstrap WordPress Themes and HTML templates">ShapeBootstrap</a>.
            </div>
        </div>
    </div>
</footer><!--/#footer-->

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.isotope.min.js"></script>
<script src="js/jquery.prettyPhoto.js"></script>
</body>
</html>