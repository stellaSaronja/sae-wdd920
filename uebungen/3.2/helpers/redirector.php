<?php

/**
 * Wir starten hier eine Session, weil die redirector.php nicht über das index.php File geladen wird, das auch eine
 * Session startet.
 *
 * Dadurch wird eine neue Session begonnen oder eine alte wiederaufgenommen.
 */
session_start();

/**
 * Nun holen wir uns die URL, auf die weitergeleitet werden soll, aus der URL und entschlüsseln sie.
 */
$url = urldecode($_GET['url']);

/**
 * Dann prüfen wir, ob es schon einen Array "urls" in der Session gibt oder nicht. Wenn nicht, dann erstellen wir ein
 * leeres Array.
 * @todo: comment
 */
if (!isset($_SESSION['counter'])) {
    $_SESSION['counter'] = [];
}

/**
 * Steht die URL nicht bereits in der Session, so schreiben wir sie hinein. Damit verhindern wir, dass die URL mehrmals
 * in die Session geschrieben wird.
 * @todo: comment
 */
if (array_key_exists($url, $_SESSION['counter'])) {
    $_SESSION['counter'][$url]++;
} else {
    $_SESSION['counter'][$url] = 1;
}

/**
 * Nun erstellen wir mit der header()-Funktionen einen Location-Header. Sieht der Browser einen Location-Header, leitet
 * er auf die URL weiter, die im Location-Header angegeben ist.
 * Nach einem Redirect wird oft ein exit angegeben, das dafür sorgt, dass nach dem header()-Aufruf kein weiterer Code
 * ausgeführt wird.
 */
header("Location: $url");
exit;
