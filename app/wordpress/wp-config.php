<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'test-wp-woocom-application');

/** Имя пользователя MySQL */
define('DB_USER', 'user');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', '123');

/** Имя сервера MySQL */
define('DB_HOST', 'docker_mysql');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8mb4');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         ' NIOy@OxgCY}-ti>xa)N`*XQJ.B}k<QNetabn,f)-f)^Y{6+jn?2}0J<:83csTbT');
define('SECURE_AUTH_KEY',  'C<M*sV7/yD2xQ%||=3Svn@xL_#18/H,L&eXoSmC<6x1Okb&C/77dT1.qdpbXATpy');
define('LOGGED_IN_KEY',    'z#0kByTc1*2fpIU}iD*3[WW&0-C9n=:6fZ3*0A:~v`^8-B`>np1{JN/?|Y1Ee=_L');
define('NONCE_KEY',        '1MgKrjx3N_C6N0RB`XKoRtwnfHF$Qv|jKJp{dJ~C6#ZOS90H7e}}VbF,OOr:{oKd');
define('AUTH_SALT',        ' ,s`?p_ 2t<43PNbrN`BBYw>NdlYVRUa8y>u-`DMZm`LUUS gBH,1sMV ACmqRM@');
define('SECURE_AUTH_SALT', '[TU1FA!SO+jV|O^<+ -j~<y4Uvq5%w<Bi`rA_2$<3;SftF#[5q.$zXh$RExolV([');
define('LOGGED_IN_SALT',   'dn;1<%5|{Sf2:G$oObQcp1;-|0Jl5Cu[&Nh/$M#MatWu?t0Z8`C[D.KB9r]m_[p+');
define('NONCE_SALT',       '@FvYCS 477b3~PBEnr8]$o=ZdsrTW:lVr+/<,u+ck~}mAd*n$O` 0WJhCZ4a~}+-');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
