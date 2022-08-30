<?php

ob_start();

?>

<h2>Add Actor</h2>

<form class="form" action="index.php?action=addActor" method="post">

    <label for="prenom">
        <span>Prenom:</span>
        <input class="input" type="text" id="prenom" name="prenom" required>
    </label><br>
    
    <label for="nom">
        <span>Nom:</span>
        <input class="input" type="text" id="nom" name="nom" required>
    </label><br>

    <label for="sexe">
        <span>Sex:</span>
        <select class="input centerInput" id="sexe" name="sexe" required>
            <option value="0" disabled selected hidden>Choisir sex</option>
            <option value="Femme">Femme</option>
            <option value="Homme">Homme</option>
        </select>

    </label><br>

    <label for="date-naissance">
        <span>Date de naissance:</span>
        <input class="input centerInput" type="date" id="date-naissance" name="date_naissance" required>
    </label><br>

    <button class="submit_btn" type="submit" name="submitActor">SUBMIT</button>
    
</form>


<?php

$content = ob_get_clean();
require "view/template.php";

?>