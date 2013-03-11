<?php
/**
 * Podstawowa konfiguracja WordPressa.
 *
 * Ten plik zawiera konfiguracje: ustawień MySQL-a, prefiksu tabel
 * w bazie danych, tajnych kluczy, używanej lokalizacji WordPressa
 * i ABSPATH. Więćej informacji znajduje się na stronie
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Kodeksu. Ustawienia MySQL-a możesz zdobyć
 * od administratora Twojego serwera.
 *
 * Ten plik jest używany przez skrypt automatycznie tworzący plik
 * wp-config.php podczas instalacji. Nie musisz korzystać z tego
 * skryptu, możesz po prostu skopiować ten plik, nazwać go
 * "wp-config.php" i wprowadzić do niego odpowiednie wartości.
 *
 * @package WordPress
 */

// ** Ustawienia MySQL-a - możesz uzyskać je od administratora Twojego serwera ** //
/** Nazwa bazy danych, której używać ma WordPress */
define('DB_NAME', 'bollo_naopak');

/** Nazwa użytkownika bazy danych MySQL */
define('DB_USER', 'root');

/** Hasło użytkownika bazy danych MySQL */
define('DB_PASSWORD', '');

/** Nazwa hosta serwera MySQL */
define('DB_HOST', 'localhost');

/** Kodowanie bazy danych używane do stworzenia tabel w bazie danych. */
define('DB_CHARSET', 'utf8');

/** Typ porównań w bazie danych. Nie zmieniaj tego ustawienia, jeśli masz jakieś wątpliwości. */
define('DB_COLLATE', '');

/**#@+
 * Unikatowe klucze uwierzytelniania i sole.
 *
 * Zmień każdy klucz tak, aby był inną, unikatową frazą!
 * Możesz wygenerować klucze przy pomocy {@link https://api.wordpress.org/secret-key/1.1/salt/ serwisu generującego tajne klucze witryny WordPress.org}
 * Klucze te mogą zostać zmienione w dowolnej chwili, aby uczynić nieważnymi wszelkie istniejące ciasteczka. Uczynienie tego zmusi wszystkich użytkowników do ponownego zalogowania się.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'vsAeEl*8P[Bzp=tPH#w<ws[flo5}!,9LpW!d9.GVrIRSPz<6#G@=r{7YS:_)-u$E');
define('SECURE_AUTH_KEY',  '2PHZ%W|xRh0U3iVx]I,4.a*&l^;W_zd:twV84PDBpIaZr|r&?J~AO6K0?25-;2g&');
define('LOGGED_IN_KEY',    '[MR**T&M.]BX(~&L~j>coccm:|>pkxXFpCvamUe_a{(+_%.$iy:)f~=s`B`&Nth ');
define('NONCE_KEY',        'S%eP1C`o}T=(+NL&X-=&Rw=+r:$+^NvfD?::[,lsW=%W<;rEpH<ppyS-j2B{xL4H');
define('AUTH_SALT',        'c8!CwY[2~?0^)u2v*}g}yeYV/0?|d::g.u2@GNX_=-R7}]E`c6cKr nj`%+g1+w]');
define('SECURE_AUTH_SALT', 'S=5Mwy,H]$.%KjlCU3m%aH^Z!J:K]-mD+Z=|sDXYi+bv--*uD6w95=&;>j!9 pDh');
define('LOGGED_IN_SALT',   'B`*>p}4kevIlpvZV2;:?g@p8n)7B7}Cb^@DLU:`znmj[=9#PQi$puLRQ#|5[m88H');
define('NONCE_SALT',       '7T:pJ,~WhG.@MufajX;y]+am,Je^)Wx~J%>^n+&>m,h%;WzD%sW6- &OhPhd!U#N');

/**#@-*/

/**
 * Prefiks tabel WordPressa w bazie danych.
 *
 * Możesz posiadać kilka instalacji WordPressa w jednej bazie danych,
 * jeżeli nadasz każdej z nich unikalny prefiks.
 * Tylko cyfry, litery i znaki podkreślenia, proszę!
 */
$table_prefix  = 'wpp_';

/**
 * Kod lokalizacji WordPressa, domyślnie: angielska.
 *
 * Zmień to ustawienie, aby włączyć tłumaczenie WordPressa.
 * Odpowiedni plik MO z tłumaczeniem na wybrany język musi
 * zostać zainstalowany do katalogu wp-content/languages.
 * Na przykład: zainstaluj plik de_DE.mo do katalogu
 * wp-content/languages i ustaw WPLANG na 'de_DE', aby aktywować
 * obsługę języka niemieckiego.
 */
define('WPLANG', 'pl_PL');

/**
 * Dla programistów: tryb debugowania WordPressa.
 *
 * Zmień wartość tej stałej na true, aby włączyć wyświetlanie ostrzeżeń
 * podczas modyfikowania kodu WordPressa.
 * Wielce zalecane jest, aby twórcy wtyczek oraz motywów używali
 * WP_DEBUG w miejscach pracy nad nimi.
 */
define('WP_DEBUG', false);

/* To wszystko, zakończ edycję w tym miejscu! Miłego blogowania! */

/** Absolutna ścieżka do katalogu WordPressa. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Ustawia zmienne WordPressa i dołączane pliki. */
require_once(ABSPATH . 'wp-settings.php');
