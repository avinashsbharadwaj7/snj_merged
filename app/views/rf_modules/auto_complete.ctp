<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<ul>
<?php
if (!empty($names)) {
    foreach ($names as $name) {
        echo "<li>" .$name['RfEngineerList']['full_name'] . "</li>";
    }
} else {
    echo '<li>No results</li>';
}
?>
</ul>