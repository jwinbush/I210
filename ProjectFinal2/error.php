<?php

require_once ('includes/database.php');
require_once ('includes/header.php');
$page_title = "Search Results Error";

$error='Default error.';
if (filter_has_var(INPUT_GET, "m")) {
    $error = filter_input(INPUT_GET, 'm', FILTER_SANITIZE_STRING);
}
?>

<section class="main-section section-padding">
    <div class="page-navigation"></div>
    <h2>Error</h2>

    <table style="width: 100%; border: none">
        <tr>
            <td style="vertical-align: middle; text-align: center; width:100px">
                <img src='www/img/error.png' style="width: 80px; border: none"/>
            </td>
            <td style="text-align: left; vertical-align: top;">
                <h3>Sorry, but an error has occurred.</h3>
                <div style="color: red">
                    <?= $error ?>
                </div>
                <br>
            </td>
        </tr>
    </table>
    <br><br><br><br><br>
</section>
<?php
require_once ('includes/footer.php')
?>