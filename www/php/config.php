<?php
///// INICIAR VARIABLES DE BBDD
		$OPENSHIFT_MYSQL_DB_HOST=(getenv('OPENSHIFT_MYSQL_DB_HOST')!="")? getenv('OPENSHIFT_MYSQL_DB_HOST'):'localhost';
		$OPENSHIFT_MYSQL_DB_PORT=(getenv('OPENSHIFT_MYSQL_DB_PORT')!="")? getenv('OPENSHIFT_MYSQL_DB_PORT'):'3306';
		$OPENSHIFT_MYSQL_DB_USERNAME=(getenv('OPENSHIFT_MYSQL_DB_USERNAME')!="")? getenv('OPENSHIFT_MYSQL_DB_USERNAME'):'admin9VnNBsw';
		$OPENSHIFT_MYSQL_DB_PASSWORD=(getenv('OPENSHIFT_MYSQL_DB_PASSWORD')!="")? getenv('OPENSHIFT_MYSQL_DB_PASSWORD'):'8TIPXnt7N9KL';
		
// MySQL database details 'mysql:'.getenv('OPENSHIFT_MYSQL_DB_HOST').';port='.getenv('OPENSHIFT_MYSQL_DB_PORT').';dbname=laburatordb', mysql://$OPENSHIFT_MYSQL_DB_HOST:$OPENSHIFT_MYSQL_DB_PORT/
$conf['db_hostname'] = $OPENSHIFT_MYSQL_DB_HOST;//'5498bcfd5973ca60e800001c-lbt1.rhcloud.com';////'53e121535973ca37fb000149@main-lbt1.rhcloud.com';////'127.9.76.129';// implode("<br>", array_keys($_ENV));
$conf['db_username'] = $OPENSHIFT_MYSQL_DB_USERNAME;////'adminPQeYdgE'; // MySQL username
$conf['db_password'] = $OPENSHIFT_MYSQL_DB_PASSWORD;// 'BZusAv4VpTbW';//// MySQL password
$conf['db_port'] = $OPENSHIFT_MYSQL_DB_PORT;// MySQL port '3306';//
$conf['db_name'] = 'coming_soon'; // MySQL database name
$conf['db_table_subscribers'] = 'subscribers'; // MySQL table to store emails
$conf['db_table_settings'] = 'settings'; // MySQL table to store emails


// Logo image
$conf['logo_file'] = 'images/logo_tripas.png';
$conf['logo_width'] = '202';
$conf['logo_height'] = '47';
$conf['logo_alt_text'] = 'Laburator TRIPAS';


// Colours
$conf['colour_background'] = '#FFFFFF';
$conf['colour_font'] = '#333333';
$conf['colour_main'] = '#D13A7A';
$conf['colour_block'] = '#F2F2F2';
$conf['colour_progressbar'] = '#D13A7A';
$conf['colour_progressbar_background'] = '#F0F0F0';
$conf['colour_progressbar_font'] = '#333333';


// Website name
$conf['website_name'] = 'Laburator'; // Name of the Website as it appear on page and emails


// Countdown
$conf['countdown_activated'] = TRUE; // Show or hide the countdown with TRUE or FALSE
$conf['countdown_day'] = 0;
$conf['countdown_month'] = 0;
$conf['countdown_year'] = 0;
$conf['countdown_hour'] = 0; // (0-24)
$conf['countdown_min'] = 0; // (0-60)
$conf['countdown_sec'] = 0; // (0-60)
$conf['countdown_millisec'] = 0; // (0-1000)
$conf['countdown_timer'] = "20:00:00:00"; // dd:hh:mm:ss


// Progress bar
$conf['progressbar_activated'] = TRUE;
$conf['progressbar_percent'] = 20; // Percentage of the prgress bar


// Newsletter
$conf['newsletter_activated'] = TRUE;
$conf['newsletter_email'] = 'newsletter@localhost';


// Social networks
$conf['facebook'] = '';//https://facebook.com'; // Remove or leave empty if do not used
$conf['twitter'] = '';//'https://twitter.com'; // Remove or leave empty if do not used
$conf['googleplus'] = '';//'https://plus.google.com'; // Remove or leave empty if do not used
$conf['linkedin'] = '';//'https://linkedin.com'; // Remove or leave empty if do not used


// Google map
$conf['map_activated'] = TRUE;
$conf['map_latitude'] = 43.948220;
$conf['map_longitude'] = 4.802000;
$conf['map_markertitle'] = "Tandem";
$conf['map_infowindow_title'] = '<b>Tandem</b>'; // HTML formated, used in Google Map & Contact
$conf['map_infowindow_address'] = '<p>6 bis rue Saint Thomas d\'Aquin,<br />84000 Avignon, France</p>'; // HTML formated, used in Google Map & Contact

// Contact
$conf['contact_activated'] = TRUE; // Show or hide the contact form
$conf['phone_fax'] = '<p>Tel : 	+33 490 825 097<br />Fax : +33 490 824 119</p>' ;


// Email address used to send emails
$conf['email_address'] = 'contact@localhost'; // Email address sending all the emails messages
$conf['email_from_name'] = 'Fantastic Coming Soon Landing Page'; // Email from 


// About
$conf['about_activated'] = TRUE; // Show or hide the about page with TRUE or FALSE


// Google analytics
 $conf['google_analytics'] = 'UA-57306283-1'; //.enter the Google Analytics identification UA-XXXX-Y, leave it empty or remove this line if you do not want the use it


// Admin access
$conf['admin_username'] = 'admin'; // Administrator username
$conf['admin_password'] = 'polvoron'; // Administrator password
$conf['admin_cookie'] = 'Coming Soon Landing Page'; // Administrator cookie identification


// Admin pagination
$conf['rows_per_page'] = '100'; // Number of rows per page
$conf['show_page_numbers'] = TRUE; // Hide / show page numbers button
$conf['show_prev_next'] = TRUE; // Hide / show previous and next button


// Language used in this installation
$conf['current_language'] = 'es'; // Select a language in the /languages/ directory
// Edit the language file in the /languages/ folder to adjust content to your specific needs


// activate the multilingual functionality
$conf['multilingual'] = FALSE; // Use TRUE to activate the multiligual functionality, use FALSE to deactivate 


// IF YOU DO NOTE USE THE MULTILINGUAL FUNCTIONALITY you can stop editing here.


// adress of the pages for all the available languages
$language = array (
	'en' => 'http://localhost', // repeat for all the needed languages 
	'fr' => 'http://localhost/fr/',
);


// 2 characters code list of all languages 
$lang_code = array (
	'ab' => 'Abkhazian',
	'af' => 'Afrikaans',
	'an' => 'Aragonese',
	'ar' => 'Arabic',
	'as' => 'Assamese',
	'az' => 'Azerbaijani',
	'be' => 'Belarusian',
	'bg' => 'Bulgarian',
	'bn' => 'Bengali',
	'bo' => 'Tibetan',
	'br' => 'Breton',
	'bs' => 'Bosnian',
	'ca' => 'Catalan / Valencian',
	'ce' => 'Chechen',
	'co' => 'Corsican',
	'cs' => 'Czech',
	'cu' => 'Church Slavic',
	'cy' => 'Welsh',
	'da' => 'Danish',
	'de' => 'German',
	'el' => 'Greek',
	'en' => 'English',
	'eo' => 'Esperanto',
	'es' => 'Spanish / Castilian',
	'et' => 'Estonian',
	'eu' => 'Basque',
	'fa' => 'Persian',
	'fi' => 'Finnish',
	'fj' => 'Fijian',
	'fo' => 'Faroese',
	'fr' => 'French',
	'fy' => 'Western Frisian',
	'ga' => 'Irish',
	'gd' => 'Gaelic / Scottish Gaelic',
	'gl' => 'Galician',
	'gv' => 'Manx',
	'he' => 'Hebrew',
	'hi' => 'Hindi',
	'hr' => 'Croatian',
	'ht' => 'Haitian; Haitian Creole',
	'hu' => 'Hungarian',
	'hy' => 'Armenian',
	'id' => 'Indonesian',
	'is' => 'Icelandic',
	'it' => 'Italian',
	'ja' => 'Japanese',
	'jv' => 'Javanese',
	'ka' => 'Georgian',
	'kg' => 'Kongo',
	'ko' => 'Korean',
	'ku' => 'Kurdish',
	'kw' => 'Cornish',
	'ky' => 'Kirghiz',
	'la' => 'Latin',
	'lb' => 'Luxembourgish Letzeburgesch',
	'li' => 'Limburgan Limburger Limburgish',
	'ln' => 'Lingala',
	'lt' => 'Lithuanian',
	'lv' => 'Latvian',
	'mg' => 'Malagasy',
	'mk' => 'Macedonian',
	'mn' => 'Mongolian',
	'mo' => 'Moldavian',
	'ms' => 'Malay',
	'mt' => 'Maltese',
	'my' => 'Burmese',
	'nb' => 'Norwegian (Bokmål)',
	'ne' => 'Nepali',
	'nl' => 'Dutch',
	'nn' => 'Norwegian (Nynorsk)',
	'no' => 'Norwegian',
	'oc' => 'Occitan (post 1500); Provençal',
	'pl' => 'Polish',
	'pt' => 'Portuguese',
	'rm' => 'Raeto-Romance',
	'ro' => 'Romanian',
	'ru' => 'Russian',
	'sc' => 'Sardinian',
	'se' => 'Northern Sami',
	'sk' => 'Slovak',
	'sl' => 'Slovenian',
	'so' => 'Somali',
	'sq' => 'Albanian',
	'sr' => 'Serbian',
	'sv' => 'Swedish',
	'sw' => 'Swahili',
	'tk' => 'Turkmen',
	'tr' => 'Turkish',
	'ty' => 'Tahitian',
	'uk' => 'Ukrainian',
	'ur' => 'Urdu',
	'uz' => 'Uzbek',
	'vi' => 'Vietnamese',
	'vo' => 'Volapuk',
	'yi' => 'Yiddish',
	'zh' => 'Chinese',
);

