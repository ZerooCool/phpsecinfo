<!-- ## EN ## This is an example page calling the phpsecinfo() function -->
<!-- ## FR ## Ceci est un exemple de page appelant la fonction phpsecinfo() -->

<?php require_once('PhpSecInfo/PhpSecInfo.php'); ?>
<?php phpsecinfo(); ?>

<?php
/* ## EN ##
 * If you want to capture output and/or customize the look and feel,
 * you need to do slightly more work.
 *
 * Example :
 * <code>
 * require_once('PhpSecInfo/PhpSecInfo.php');
 * // Instantiate the class :
 * $psi = new PhpSecInfo();
 *
 * // Load and run all tests :
 * $psi->loadAndRun();
 *
 * // Grab the results as a multidimensional array :
 * $results = $psi->getResultsAsArray();
 * echo "<pre>"; echo print_r($results, true); echo "</pre>";
 *
 * // Grab the standard results output as a string :
 * $html = $psi->getOutput();
 *
 * // Send it to the browser :
 * echo $html;
 * </code>
 */
?>

<?php
/* ## FR ##
 * Si vous souhaitez capturer la sortie et/ou personnaliser l'apparence,
 * vous devez faire un peu plus de travail.
 *
 * Exemple :
 * <code>
 * require_once('PhpSecInfo/PhpSecInfo.php');
 * // Instancie la classe :
 * $psi = new PhpSecInfo();
 *
 * // Charge et exécute tous les tests :
 * $psi->loadAndRun();
 *
 * // Récupère les résultats sous forme de tableau multidimensionnel :
 * $results = $psi->getResultsAsArray();
 * echo "<pre>"; echo print_r($results, true); echo "</pre>";
 *
 * // Récupère les résultats standard sous forme de chaîne :
 * $html = $psi->getOutput();
 *
 * // L'envoyer au navigateur
 * echo $html;
 * </code>
 */
?>
