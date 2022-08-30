<?php

ob_start();

$role = $roleQuery -> fetch();

?>

<h2>Role Owners</h2>

<h3 class="titleInDetails"><?= $role['nom_role']?></h3>


    
<table class="table-style specified-table-style">
    <tr>
        <th>Acteur</th>
    <th>Film</th>
</tr>

<tbody>
    
    <?php foreach($roleOwners->fetchAll() as $roleOwner){?>
        
        <tr class="trbody">
            
            <td>
                <a class="link" href="index.php?action=actorDetails&id=<?=$roleOwner['id_acteur']?>">    
                    <?= $roleOwner['prenom'] . " " . $roleOwner['nom']?>
                </a>
            </td>
            <td>
                <a class="link" href="index.php?action=filmDetails&id=<?=$roleOwner['id_film']?>">
                    <?= $roleOwner['titre']?>
                </a>
            </td>
        </tr>
        
        <?php }?>
        <tr><td colspan="4" class="count-elements"><?= $roleOwners -> rowCount(); ?> acteurs</td></tr>
    </tbody>
</table>



<?php

$content = ob_get_clean();
require "view/template.php";

?>