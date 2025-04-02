<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier</title>
    <style>
        /* Général */
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to right,rgb(0, 0, 0),rgb(73, 73, 73));
            color: #ecf0f1; /* Texte clair pour contraster */
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            color: #f1c40f; /* Or doré pour le titre */
            font-size: 36px;
            margin-top: 30px;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            background: linear-gradient(to right,rgb(3, 0, 0),rgb(73, 73, 73));
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.5);
        }

        /* Style pour le select */
        select {
            width: 100%;
            padding: 12px;
            border-radius: 8px;
            border: 2px solid #f1c40f; /* Bordure dorée */
            background-color: #2c3e50;
            color: #ecf0f1;
            font-size: 16px;
            margin-bottom: 20px;
        }

        button {
            background-color: #f1c40f; /* Or doré */
            color: #2c3e50; /* Texte sombre pour contraste */
            padding: 12px 25px;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
        }

        button:hover {
            background-color: #e67e22; /* Or plus foncé sur hover */
            transform: scale(1.05); /* Effet de zoom pour le bouton */
        }

        /* Table Panier */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th, table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #7f8c8d; /* Bordures légères de couleur gris clair */
        }

        table th {
            background-color: #34495e;
            color: #f1c40f; /* Or doré pour les titres des colonnes */
            font-size: 18px;
        }

        table td {
            background-color: #2c3e50;
            color: #ecf0f1;
            font-size: 16px;
        }

        /* Total */
        #tot {
            font-size: 22px;
            font-weight: bold;
            color: #f1c40f; /* Or doré pour le total */
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 14px;
            color: #95a5a6; /* Gris clair pour la mention */
        }

    </style>
</head>

<script> 
function Produit(id, designation, prix) {
  	this.id= id;
  	this.prix= prix;
  	this.designation= designation;
  	this.toString= function() {
		return this.designation + " "+ prix;
  	}
}

var catalogue= new Array();
catalogue.push(new Produit(1, "ordinateur", 200));
catalogue.push(new Produit(2, "souris", 20));
catalogue.push(new Produit(3, "uniter centrale", 620));
var panier= new Array();


function remplirCatalogue() {
    var cat= document.getElementById('cat');
    for (var i in catalogue) {
        var e= document.createElement("option");
        e.value=i;
        var txt= document.createTextNode(catalogue[i].designation);
        e.appendChild(txt);
        cat.appendChild(e);
    }
}

function ajouterCase(parent, txt) {
    var e= document.createElement("td");
    e.appendChild(document.createTextNode(txt));
    parent.appendChild(e);
}

function calculerTotal() {
    var tot= 0;
    for (var p in panier) {
        tot+= panier[p].prix;
    }
    return tot;
}

function ajouter() {
    var cat= document.getElementById('cat');
    var sel= cat.options[cat.selectedIndex].value;
    var prod= catalogue[sel];
    panier.push(prod);
    var ligne= document.createElement("tr");
    ajouterCase(ligne,prod.designation);
    ajouterCase(ligne,prod.prix);
    document.getElementById("pan").appendChild(ligne);
    document.getElementById("tot").innerHTML= calculerTotal();
}
</script>

<body>
    <div class="container">
        <h1>Votre Panier</h1>
        
        <label for="cat">Choisissez un produit :</label>
        <select id="cat" multiple></select>
        
        <button onclick="ajouter();">Ajouter au Panier</button>
        
        <table id="pan">
            <tr><th>désignation</th><th>prix</th></tr>
        </table>
        
        <p>Total: <span id="tot">0</span> €</p>
    </div>
    <div class="footer">
        <p>&copy; 2025 Panier en ligne</p>
    </div>

    <script>
        remplirCatalogue();
    </script>
</body>
</html>
