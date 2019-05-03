<?php

// BEGIN iThemes Security - Ne modifiez pas ou ne supprimez pas cette ligne
// iThemes Security Config Details: 2
define( 'DISALLOW_FILE_EDIT', true ); // Désactivez l’éditeur de code - iThemes Security > Réglages > Ajustements WordPress > Éditeur de code
// END iThemes Security - Ne modifiez pas ou ne supprimez pas cette ligne

/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'morgannec_wp_theme' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', '' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '@L7n^`B^O*^>)OgX{:>@lKmeA@lQ0a9_g3N85,H&G2= 59$9iFe<@QGp8LG.xj1E' );
define( 'SECURE_AUTH_KEY',  'w+~$WHDu58 1;OY$]Ybw{[oW?=]KX-WEzj,#&gA7@N|7+!P.Medj]P!{t!NR*T42' );
define( 'LOGGED_IN_KEY',    '84S%!mt8.(cjUUc~76;D8p+-0E}[mFGuEe_UpzSH:a~=;e2Z#zOyru_3%c}@K(A9' );
define( 'NONCE_KEY',        '.D|ee9,G { u!hifN<$(%J>B`afH)MH@Y`mb!GnrfDx)doyOza;6d$vR5shXt4&>' );
define( 'AUTH_SALT',        '5L`c&YU6~Zh& OtT0QQl;;IxB{!Pm0&)r>,[AC7hD CZg_f(wjkGMW4NR2tAw%rD' );
define( 'SECURE_AUTH_SALT', '0I(f)bnROl1F|KRTgx]VlgVgYlC~Mjrk@`Y~J;Vu7- h(#GgCIJC/6n=Wm;#ZdIs' );
define( 'LOGGED_IN_SALT',   '1B<+[W[~e~/Jh_[CxdGV^)&Lfm2OgFz$-5V[7*MyJQ:a `MSfh?9U(|F<,H<y|yf' );
define( 'NONCE_SALT',       'xQt$BJi_^Lx);3l<RE76 K)Us%](Tjs-cxq1pK_oE/3&*hhm<OZ 4<-i4Y|$gThR' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');
