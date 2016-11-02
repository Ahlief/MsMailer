<!DOCTYPE html>
<html lang="en">
    <head>
            <meta charset="UTF-8">
            <title>recogida correo</title>
        <?php
            require "class.EmailReader.php";	
            $reader = new Email_reader;
            $mensage = $reader->get(13);

            //echo "<pre>". var_export($mensage,true)."</pre>";
        ?>
    </head>
    <body>
        <h2><?php print $mensage['header']->Subject; ?> </h2>
        <?php print $mensage['header']->date; ?>
        <p>De<br>
        <?php print $mensage['header']->fromaddress; ?>
        <p>Para<br>
        <?php print $mensage['header']->toaddress; ?>
        </p>
        <br>
        <p>
            <?php print $mensage['body']; ?>			
        </p>
    </body>
</html>