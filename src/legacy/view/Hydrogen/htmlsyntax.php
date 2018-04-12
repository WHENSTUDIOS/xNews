<?php
$title = 'HTML Cheat Sheet';
$name = 'htmlsyntax';
$login = true;
$level = 2;
require('view/Hydrogen/header.php');

function _html($code, $desc, $usage){
    echo "<tr><td><code>&lt;$code&gt;</code></td><td>$desc</td><td><code>&lt;$code&gt;$usage&lt;/$code&gt;</code></td></tr>";
}
function _htmls($code, $desc, $usage){
    echo "<tr><td><code>&lt;$code&gt;</code></td><td>$desc</td><td><code>&lt;$code $usage&lt;/$code></code></td></tr>";
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
                                            _html('b', 'Makes the text <b>bold</b>', 'This text is bold!');
                                            _html('i', 'Makes the text <i>italic</i>', 'This text is italic!');
                                            _html('u', '<u>Underlines</u> the text', 'Is this underlined?');
                                            _html('h3', 'Creates a large header', 'Big text!');
                                            _htmls('a', 'Adds a <a>link</a>', 'href="https://google.com/">Off to Google!');
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