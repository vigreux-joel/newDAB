<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package District_Aisne_de_Billard
 */

 /* Inclusion du script qui permets de formatter le numero de tel */
require_once __DIR__ . '\dependancies\phoneFormat.php';

?>

	<footer>
		<?php
			/* Récupérer les informations de la page contact */ 
			$postalDatas = get_field( "postal_infos", get_page_by_title('contact')->ID);
			$contactDatas = get_field( "contact", get_page_by_title('contact')->ID);
		?>
		<ul>
			<li><h3>Coordonnées du District: </h3></li>
			<li><a href="mailto:<?= $contactDatas['email']?>"><?= $contactDatas['email']?></a></li>
			<li><a href="tel:<?= phoneFormat($contactDatas['tel'])?>"><?= $contactDatas['tel']?></a></li>
		</ul>

		<ul>
			<li><h3>Siège social: </h3></li>
			<li><?= $postalDatas['address'] ?></li>
			<li><?= $postalDatas['postal_code']?>&nbsp;-&nbsp;<?=$postalDatas['city']?></li>
		</ul>

		<div class="site-info">
			<p>&#169;&nbsp;<?= date("Y") ?>&nbsp;-&nbsp;District&nbsp;Aisne&nbsp;de&nbsp;Billard.</p>
		</div><!-- .site-info -->
	</footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
