<?php
$title = 'HTML Cheat Sheet';
$name = 'htmlsyntax';
$login = true;
require('view/Hydrogen/header.php');

function _htmlt($code, $desc, $usage){
    echo "<tr><td><code>&lt;$code&gt;</code></td><td>$desc</td><td><code>&lt;$code&gt;$usage&lt;/$code&gt;</code></td></tr>";
}
?>

    <div id="fh5co-main">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h2>
                        <?php echo $title; ?>
                    </h2>
                    <div class="fh5co-spacer fh5co-spacer-sm"></div>
                    <form action="lib/handlers/login.php" method="post">
                        <div class="row">
                            <div class="col-xl-4">
                                The article text editor supports the following HTML codes:
                                <br>
                                <br>
                                <div class="col-xl-4">
                                    <table style="width:100%">
                                        <tr>
                                            <th>Code</th>
                                            <th>Description</th>
                                            <th>Usage</th>
                                        </tr>
                                        <?php 
                                            _htmlt('b', 'Makes the text bold', 'This text is bold!');
                                        ?>
                                    </table>
                                </div>
                            </div>
                    </form>

                    </div>

                </div>
            </div>
        </div>

        <?php
require('view/Hydrogen/footer.php');
?>