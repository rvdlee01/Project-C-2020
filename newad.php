<?php
include 'header.php';
?>
<body>
<?php
if (isset($_SESSION['userId'])) {
    echo '
    <div class="adform">
        <h2>Nieuwe advertentie</h2><br>
        <form action="newad.inc.php" method="post" enctype="multipart/form-data" target="adpagina">
            <label for="pname">Plantnaam:</label><br>
            <input type="text" id="pname" name="pname"><br><br>
            
            <label for="psoort">Plantensoort:</label><br>
            <input type="text" id="psoort" name="psoort"><br><br>
            
            <label>Type advertentie:</label><br>
            <input type="radio" id="stekje" name="type" value="stekje">
            <label for="stekje">Stekje</label><br>
            <input type="radio" id="zaad" name="type" value="zaad">
            <label for="zaad">Zaad</label><br>
            <input type="radio" id="kiemplant" name="type" value="kiemplant">
            <label for="kiemplant">Kiemplant</label><br>
            <input type="radio" id="none" name="type" value="none">
            <label for="none">Weet ik niet</label><br><br>
            
            <label>Hoeveelheid water nodig:</label><br>
            <label>
                <input class="waterlight" type="radio" id="weinig" name="water" value="1">
                <img class="waterlight" src="images/weinigwater.png">
            </label>
            
            <label>
                <input class="waterlight" type="radio" id="gemiddeld" name="water" value="2">
                <img class="waterlight" src="images/gemiddeldwater.png">
            </label>   
                     
            <label>
                <input class="waterlight" type="radio" id="veel" name="water" value="3">
                <img class="waterlight" src="images/veelwater.png">
            </label>
            
            <label>
                <input class="waterlight" type="radio" id="none" name="water" value="0">
                <img class="waterlight" src="images/weetniet.png">
            </label>
            
            <label>Hoeveelheid licht nodig:</label><br>
            <label>
                <input class="waterlight" type="radio" id="weinig" name="water" value="1">
                <img class="waterlight" src="images/weinigwater.png">
            </label>
            
            <label>
                <input class="waterlight" type="radio" id="gemiddeld" name="water" value="2">
                <img class="waterlight" src="images/gemiddeldwater.png">
            </label>   
                     
            <label>
                <input class="waterlight" type="radio" id="veel" name="water" value="3">
                <img class="waterlight" src="images/veelwater.png">
            </label>
            
            <label>
                <input class="waterlight" type="radio" id="none" name="water" value="0">
                <img class="waterlight" src="images/weetniet.png">
            </label>
            
            <br><label for="desc">Beschrijving</label><br>
            <textarea id="desc" name="desc" rows="5" cols="50"></textarea><br>
            Selecteer een foto (max 1MB):
            <input type="file" name="fileToUpload" id="fileToUpload"><br><br>
            <input class="newAdButtons" type="submit" value="Plaatsen!">
        </form>


    </div>
    ';
} else {
    echo '<div class="notloggedin">
            <h4>Om een advertentie te kunnen plaatsen moet u eerst ingelogd zijn. Klik <a href="loginpagina">HIER</a> om in te loggen.</h4>
          </div>';
}
?>

</body>