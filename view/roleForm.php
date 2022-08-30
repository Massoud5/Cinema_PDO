<?php

ob_start();

?>

<h2>Add Role</h2>

<form class="form" action="index.php?action=addRole" method="post">

    <label for="role">
        <span>Role:</span>
        <input class="input" type="text" id="role" name="role" required>
    </label><br>

    <button class="submit_btn" type="submit" name="submitRole">SUBMIT</button>
    
</form>



<?php

$content = ob_get_clean();
require "view/template.php";

?>