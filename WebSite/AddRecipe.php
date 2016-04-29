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
$strSQLRequest =  "SELECT * FROM category";

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
<br>
<br>
<br>
<br>
<div class="container">
<div class="row">
    <form action="registerRecipe.php"  method="post">
        <div class="col-lg-6">
            <br>
            <br>
                <label>Nom de la recette</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="recipeName" id="recipeName" required>
                    <span class="input-group-addon"></span>
                </div>
            <br>
            <br>
                <label>Auteur de la recette</label>
                <div class="input-group">
                    <input class="form-control" id="author" name="author" type="text" required>
                    <span class="input-group-addon"></span>
            </div>
            <br>
            <br>
                <label>Catégorie</label>
                <?php
                echo "<div class='input-group'>";
                    echo "<select type='text'' class='form-control' name='category' id='InputCategory' required>";
                        foreach($results as $line) {
                            echo("<OPTION>". $line["name"]);
                        }
                    echo "</select>";
                    echo "<span class='input-group-addon'></span>";
                echo "</div>";
                ?>
            <br>
            <br>
                <label>Description</label>
                <div class="input-group">
                    <textarea name="description" id="InputDescription" class="form-control" rows="5" required></textarea>
                    <span class="input-group-addon"></span>
                </div>
            <br>
            <br>
                <label>Temps de préparation</label>
                <div class="input-group">
                    <input class="form-control" id="time" name="prepTime" type="time" required>
                </div>
            <br>
            <br>
                <label>Liste d'ingrédients</label>
                <div class="input-group">
                        <textarea name="ingredients" id="InputIngredients" class="form-control" rows="5" required></textarea>
                    <span class="input-group-addon"></span>
                </div>
            <br>
            <br>
                <label>Marche à suivre</label>
                <div class="input-group">
                    <textarea name="steps" id="InputSteps" class="form-control" rows="10" required></textarea>
                    <span class="input-group-addon"></span>
                </div>
            <input type="submit" name="submit" id="submit" style="width: 155px;px" value="Enregistrer la recette" class="btn btn-info pull-right">
        </div>
    </form>
</div>
</div>
<br>
<br>
<br>
<a> </a>

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