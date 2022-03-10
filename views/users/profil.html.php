<?php 

if ( empty ( $user)) {
    header('location: login');
} else {
?>
    <h2>Vos informations personnelles</h2>
    <form action="" method="post">
        <label for="email">E-mail * (facturation)</label></br>
        <input id="email" type="email" name="email" value="<?= $user['email'] ?>"></br>

        <label for="surname">Prénom *</label></br>
        <input id="surname" type="text" name="surname" value="<?= $user['prenom'] ?>"></br>

        <label for="name">Nom *</label></br>
        <input id="name" type="text" name="name" value="<?= $user['nom'] ?>"></br>
        
        <input type="submit" name="submit" value="Modifier infos">
    </form>

    <form action="" method="post" style="display: <?= $display1 ?>">
        <label for="oldPassword">Ancien mot de passe *</label></br>
        <input id="oldPassword" type="password" name="oldPassword" placeholder="******"></br>
        <span><?= $error_old_password ?></span></br>
        <input type="submit" name="subPassword" value="Confirmer password">
    </form>

    <form action="" method="post" style="display: <?= $display2 ?>">
        <label for="newPassword">Nouveau mot de passe *</label></br>
        <input id="newPassword" type="password" name="newPassword" placeholder="******"></br>
        <span><?= $error_new_password ?></span></br>

        <label for="validPassword">Valider mot de passe *</label></br>
        <input id="validPassword" type="password" name="validPassword" placeholder="Confirmer mot de passe"></br>
        <span><?= $error_validPassword ?></span></br>
        <input type="submit" name="subNewPassword" value="Modifier password">
    </form>

    <h2>Vos dernières commandes</h2>*

<?php 

    

    foreach ($userCommands as $userCommand)
    {
       
        $numCommands = explode(",",$userCommand['id_command']);
        foreach (array_unique($numCommands) as $num)
        {
        ?>
            <article class="userCommand">
                <p>N° de commande : <?= $num ?></p>
            
        <?php
        }

        $names = explode(",",$userCommand['product_name']);
        foreach ($names as $name)
        {
        ?>
            <div class="nameQuantityPrice">
                <p><?= $name ?></p>
        <?php
        }

        $quantities = explode(",",$userCommand['quantity_product']);
        foreach ($quantities as $quantity)
        {
            $quant[] = $quantity;
            ?>
            <p>x <?= $quantity ?></p>
            <?php
            
        }
        
        $prices = explode(",",$userCommand['price']);
        foreach ($prices as $price)
        {   
    
            ?>
            <p><?= $price ?>€ / u</p>
            <?php
        }

        $total_prices = explode(",",$userCommand['total_price']);
        foreach($total_prices as $total_price)
        {
            ?>
            <p>= <?= $total_price ?>€</p>
            </div>
            <?php
        }

        $commandPrice = array_sum($total_prices);
            
       

        $promos = explode(",",$userCommand['promo']);

        $calculPromo = intval($promos[0]) / 100;
        $promo = $commandPrice * $calculPromo;
        $commandPricePromo = $commandPrice - $promo;
        foreach(array_unique($promos) as $promo)
        {
            
            if ( $promo === "")
            {
                ?>
                <p>Prix total : <?= $commandPrice ?>€</p>
                <p>Pas de promo</p>
                <?php

            } else {

                ?>
                <p>Prix total : <?= $commandPrice ?>€</p>
                <p>promo : <?= $promo ?>%</p>
                <p>Prix total : <?= $commandPricePromo ?>€</p>
                <?php
            }
        }


        $dates = explode(",",$userCommand['date']);

        foreach (array_unique($dates) as $date)
        {   
            ?>
            <p>Commandé le : <?= $date ?></p>
            </div>
            <?php
        }
        
        $livraisons = explode(",",$userCommand['adresse_livraison']);
        foreach ( array_unique($livraisons) as $livraison)
        {
            ?>
            <p>Adresse de livraison : <?= $livraison ?></p>
            <?php
        }


        $facturations = explode(",",$userCommand['adresse_facturation']);
        foreach ( array_unique($facturations) as $facturation)
        {
            ?>
            <p>Adresse de facturation : <?= $facturation ?></p>
            <?php
        }
    }
    ?>

    <h2>Vos commentaires</h2>

    <?php

        foreach( $userComments as $comment) 
        {
        
    ?>
        <article class="userComment">
            <a href="<?= url ?>products/<?= $comment['id_product'] ?>"><?= $comment['name'] ?></a>
            <p><?= $comment['comment'] ?></p>
        
        <?php
            $i = 0;
            while ( $i < $comment['note'])
            {
        ?>
                <label for="">★</label>
        <?php

            $i++;
            }
        ?>
            <i class="fa-solid fa-trash-can"></i>
            <p>Commenter le : <?= $comment['datefr'] ?> à <?= $comment['heurefr'] ?></p>

        </article>
        <form action="" method="post">
            <input type="hidden" name="id_comment" value="<?= $comment['id']?>">
            <button type="submit" name="deleteComment"><i class="fa-solid fa-trash"></i></button>
        </form>

    <?php
        }
    ?>

<?php
}
?>