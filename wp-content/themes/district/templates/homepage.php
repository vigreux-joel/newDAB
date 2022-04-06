<?php
/**
 * Template Name: Accueil
 * The template for displaying the homepage
 */

/* Inclusion du fichier qui permets de récupérer les events depuis l'agenda du district */
require_once(__DIR__."\..\dependancies\google-calendar-api/quickstart.php");

/* Inclusion du script qui permets de convertir une date en Français */
require_once __DIR__ . '\..\dependancies\dateToFrench.php'; 

get_header();

?>

	<main>

        <section>
            <h1><?= the_field( "main_heading" ) ?></h1>
            <div><?= the_field( "main_desc" ) ?></div>
        </section>

        <section class="lastArticles">
            <h2>Dernières actualités</h2>

            <?php 
                $articles = wp_get_recent_posts(array(
                    'posts_per_page' => 4, /* Affiche max 4 articles par page */
                    'post_type' => 'post', // De type article
                    'post_status' => 'publish', // Qui est publié
                ));

                foreach($articles as $single):
            ?>

            <article>
                <?php if(the_post_thumbnail_url() && the_post_thumbnail_caption()): ?>
                    <img src="<?= the_post_thumbnail_url() ?>" alt="<?= the_post_thumbnail_caption() ?>">
                <?php else: ?>
                    <img src="<?= get_template_directory_uri().'/assets/img/missing.png' ?>" alt="Illustration manquante">
                <?php endif; ?>
                
                <h3><?= $single["post_title"] ?></h3>
                
                <time datetime="<?= $single["post_date"] ?>">
                    <?= dateToFrench($single["post_date"],'l j F Y') ?>
                </time>
                
                <p><?= $single["post_content"] ?></p>
            </article><!-- single article -->
            
            
            <?php endforeach; ?>
        </section><!-- lastArticles -->

        <section class="upcomingEvents">
            <h2>Compétitions à venir</h2>

            <?php foreach($eventsArray as $event): ?>

                <div class="calendarEvent">
                    <h3><?= $event["title"] ?></h3>

                    <?php if($event["dateTime"]): ?>
                        <time datetime="<?= $event["dateTime"] ?>">
                            <?= $event["date"] ?>
                        </time>
                    <?php else: ?>
                        <p>Date et horaires à spécifier.</p>
                    <?php endif; ?>
                    
                    <a class="basicCTA" href="#">S'inscrire</a>
                </div>
            <?php endforeach; ?>

        </section><!-- upcomingEvents -->

	</main><!-- main -->

<?php

get_footer();