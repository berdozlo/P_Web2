<!--
//ETML
// Auteur : Colin Brand
// Date : 26.01.16
// Description :Page pour ajouter une recette
-->
<?php
// Connexion à la base de données
$connector= new PDO('mysql:host=localhost;dbname=db_recipe;charset=utf8','root','');

// Créer une requête
$strSQLRequest =  "SELECT * FROM receipt";

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
    <title>Toutes les recettes</title>
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
<br>
<br>
<br>
<br>
<div class="container">
    <div class="container">
        <h2>Toutes les recettes</h2>
        <p>Voilà toutes les recettes disponibles sur notre site</p>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Nom de la recette</th>
                <th>Description</th>
                <th>Temps de préparation (HH // MM // SS)</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
                <?php
                foreach($results as $line)
                {
                    echo "<tr>";
                    echo "<td>" . $line["name"] . "</td>";
                    echo "<td>" . $line["description"] . "</td>";
                    echo "<td>" . $line["prepTime"] . "</td>";
                    echo "<td ><a href='showDetails.php?idRecipe=" . $line["idReceipt"] ."' type='button' name = 'details' id = 'submit' value = 'Détails' class='btn btn-info pull-right' >Détails</a></td >";
                }
                ?>
            </tr>
            </tbody>
        </table>
    </div>
</div>

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