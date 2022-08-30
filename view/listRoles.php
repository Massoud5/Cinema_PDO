<?php

ob_start();

?>

<h2>All Roles</h2>

<table class="table-style roles-table-style">

    <tr>
        <th></th>
        <th class="th-roles">Roles</th>

    </tr>
    <tbody>

        <?php 

            while($role = $roles -> fetch()){
        ?>
            
            <tr class="trbody trbody-roles">
                
                <td><a href="index.php?action=deleteRole&id=<?=$role['id_role']?>"><img class="icon-delete" src="./public/images/icon_delete.png" alt="icon_delete"></a></td>
                <td><a href="index.php?action=roleOwners&id=<?= $role['id_role']?>"><?= $role['nom_role']?></a></td>

            </tr>
        <?php }?>

        <tr><td colspan="4" class="count-elements"><?= $roles -> rowCount(); ?> rôles</td></tr>
    </tbody>

</table>
<a class="link-showForm" href="index.php?action=showRoleForm">Ajouter role</a>

<?php

$content = ob_get_clean();
require "view/template.php";

?>