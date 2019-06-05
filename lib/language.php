<?php
if (!defined('IN_SYS')) {
    // exit('禁止访问');
    header("Location: ../index.php");
    exit;
}

$languages = array(
    'en-US' => array('English', 'English'),
    'zh-CN' => array('简体中文', 'Chinese_simplified'),
    'zh-SG' => array('简体中文（新加坡）', 'Chinese_simplified'),
    'zh-HK' => array('繁體中文（香港）', 'Chinese_traditional'),
    'zh-TW' => array('繁體中文（台湾）', 'Chinese_traditional'),
    'af' => array('Afrikaans', 'Afrikaans'),
    'sq' => array('የአልባኒያ', 'Albanian'),
    'am' => array('Amharic', 'Amharic'),
    'ar' => array('Arabic', 'Arabic'),
    'hy' => array('Armenian', 'Armenian'),
    'az' => array('Azərbaycan', 'Azeerbaijani'),
    'eu' => array('Basque', 'Basque'),
    'be' => array('Belarusian', 'Belarusian'),
    'bn' => array('Bengali', 'Bengali'),
    'bs' => array('Bosnian', 'Bosnian'),
    'bg' => array('Bulgarian', 'Bulgarian'),
    'my' => array('Burmese', 'Burmese'),
    'ca' => array('Catalan', 'Catalan'),
    'ce' => array('Cebuano', 'Cebuano'), // 宿务语
    'ch' => array('Chichewa', 'Chichewa'),
    'co' => array('Corsican', 'Corsican'),
    'hr' => array('Croatian', 'Croatian'),
    'cs' => array('Czech', 'Czech'),
    'da' => array('Danish', 'Danish'),
    'nl' => array('Dutch', 'Dutch'),
    'eo' => array('Esperanto', 'Esperanto'),
    'et' => array('Estonian', 'Estonian'),
    'fa' => array('Farsi', 'Farsi'),
    'fil' => array('Filipino', 'Filipino'),
    'fi' => array('Finnish', 'Finnish'),
    'fr' => array('français', 'French'),
    'fy' => array('Frisian', 'Frisian'),
    'gl' => array('Galician', 'Galician'),
    'ka' => array('Georgian', 'Georgian'),
    'de' => array('Deutsch', 'German'),
    'el' => array('Greek', 'Greek'),
    'gu' => array('Gujarati', 'Gujarati'),
    'ko' => array('Haitian Creole', 'Haitian Creole'),
    'ha' => array('Hausa', 'Hausa'),
    'haw' => array('Hawaiian', 'Hawaiian'),
    'he' => array('Hebrew', 'Hebrew'),
    'hi' => array('Hindi', 'Hindi'),
    'hm' => array('Hmong', 'Hmong'),
    'hu' => array('Hungarian', 'Hungarian'),
    'is' => array('Icelandic', 'Icelandic'),
    'ig' => array('Igbo', 'Igbo'),
    'id' => array('Indonesian', 'Indonesian'),
    'ga' => array('Irish', 'Irish'),
    'it' => array('Italian', 'Italian'),
    'jp' => array('日本語', 'Japanese'),
    'jv' => array('Wong Jawa', 'Javanese'),
    'kn' => array('Kannada', 'Kannada'),
    'kk' => array('Kazakh', 'Kazakh'),
    'kh' => array('Khmer', 'Khmer'),
    'ko' => array('한국의', 'Korean'),
    'ku' => array('Kurdish', 'Kurdish'),
    'kz' => array('Kyrgyz', 'Kyrgyz'),
    'lo' => array('ພາສາລາວ', 'Lao'),
    'la' => array('Latinae', 'Latin'),
    'lv' => array('Latvian', 'Latvian'),
    'lt' => array('Lithuanian', 'Lithuanian'),
    'lu' => array('Luxembourgish', 'Luxembourgish'),
    'mk' => array('Macedonian', 'Macedonian'),
    'ma' => array('Malagasy', 'Malagasy'),
    'ms' => array('Malay', 'Malay'),
    'ml' => array('Malayalam', 'Malayalam'),
    'mt' => array('Maltese', 'Maltese'),
    'ma' => array('Maori', 'Maori'),
    'mr' => array('Marathi', 'Marathi'),
    'mn' => array('Mongolian', 'Mongolian'),
    'ne' => array('Nepali', 'Nepali'),
    'no' => array('Norwegian', 'Norwegian'),
    'pa' => array('Pashto', 'Pashto'),
    'pe' => array('Persian', 'Persian'),
    'po' => array('Polish', 'Polish'),
    'pg' => array('Português', 'Portuguese'),
    'pu' => array('Punjabi', 'Punjabi'),
    'ro' => array('Romanian', 'Romanian'),
    'ru' => array('Russian', 'Russian'),
    'sa' => array('Samoan', 'Samoan'),
    'gd' => array('Scots Gaelic', 'Scots Gaelic'),
    'sr' => array('Serbian', 'Serbian'),
    'se' => array('Sesotho', 'Sesotho'),
    'sh' => array('Shona', 'Shona'),
    'si' => array('Sindhi', 'Sindhi'),
    'sin' => array('Sinhala', 'Sinhala'),
    'sk' => array('Slovak', 'Slovak'),
    'sl' => array('Slovenian', 'Slovenian'),
    'so' => array('Somali', 'Somali'),
    'es' => array('Spanish', 'Spanish'),
    'su' => array('Sundanese', 'Sundanese'),
    'sw' => array('Swahili', 'Swahili'),
    'sv' => array('Swedish', 'Swedish'),
    'tj' => array('Tajik', 'Tajik'),
    'ta' => array('Tamil', 'Tamil'),
    'te' => array('Telugu', 'Telugu'),
    'ts' => array('Thai', 'Thai'),
    'tu' => array('Turkish', 'Turkish'),
    'uk' => array('Ukrainian', 'Ukrainian'),
    'ur' => array('Urdu', 'Urdu'),
    'uz' => array('Uzbek', 'Uzbek'),
    'vi' => array('Vietnamese', 'Vietnamese'),
    'we' => array('Welsh', 'Welsh'),
    'xh' => array('Xhosa', 'Xhosa'),
    'yi' => array('Yiddish', 'Yiddish'),
    'yo' => array('Yorùbá', 'Yoruba'),
    'zu' => array('Zulu', 'Zulu')
);

class Language
{
    public $language_area;
    public $language_country;
    public $language_dir;
    public $dir;
    public function __construct()
    {
        $this->dir = str_replace("\\", "/", dirname(__FILE__)) . "/language/";
        $this->initDefaultLanguage();
        if (empty($this->language_country) && !empty($this->language_area)) {
            $this->language_country = substr($this->language_area, 0, strpos($this->language_area, "-"));
        }
        $this->initLanguageDir();
    }
    /**
     * get absolute path of language file
     */
    public function getFileDir($file)
    {
        $dir = $this->dir;
        if (file_exists($this->getLanguageDir() . $file)) {
            return $this->getLanguageDir() . $file;
        } else {
            if (file_exists($dir . $this->language_area . "/" . $file)) {
                return $dir . $this->language_area . "/" . $file;
            } else {
                if (file_exists($dir . $this->language_country . "/" . $file)) {
                    return $dir . $this->language_country . "/" . $file;
                } else {
                    // if (file_exists($dir . "en-US/" . $file)) {
                    return $dir . "en-US/" . $file;
                    // } else {
                    //   return false;
                    // }
                }
            }
        }
    }
    /**
     * return current language directory
     */
    public function getLanguageDir()
    {
        return $this->language_dir;
    }

    /**
     * get current language directory
     */
    private function initLanguageDir()
    {
        $dir = $this->dir;
        if (file_exists($dir . $this->language_area) && !empty($this->language_area)) {
            $this->language_dir = $dir . $this->language_area . '/';
        } else {
            if (file_exists($dir . $this->language_country) && !empty($this->language_country)) {
                $this->language_dir = $dir . $this->language_country . '/';
            } else {
                $this->language_dir = $dir . 'en-US/';
            }
        }
    }

    /**
     * get the default language
     */
    public function initDefaultLanguage()
    {
        if ($this->getCookieLanguage()) {
            return;
        }
        $language = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
        preg_match_all("/[\\w-]+/", $language, $language);
        $this->language_area = $language[0][0];
        @($this->language_country = $language[0][1]);
        $this->setCookieLanguage();
    }
    /**
     * get language form cookie
     */
    public function getCookieLanguage()
    {
        if (!@empty($_COOKIE['lang'])) {
            $language = $_COOKIE['lang'];
            if (strpos($language, "-")) {
                $this->language_area = $language;
            } else {
                $this->language_country = $language;
            }
            return true;
        }
        return false;
    }
    /**
     * set current language to cookie
     */
    public function setCookieLanguage($lang = "")
    {
        if (empty($lang)) {
            $lang = $this->language_area;
        }
        if (empty($lang)) {
            $lang = $this->language_country;
        }
        if (empty($lang)) {
            return false;
        }
        setcookie("lang", $lang, time() + 365 * 24 * 3600, "/", $this->getDomain());
        return true;
    }

    /**
     * get current domain
     */
    public function getDomain()
    {
        if (empty($this->domain)) {
            $domain = $_SERVER['SERVER_NAME'];
            if (strcasecmp($domain, "localhost") === 0) {
                $this->domain = $domain;
                return $this->domain;
            }
            if (preg_match("/^(\\d+\\.){3}\\d+\$/", $domain, $domain_temp)) {
                $this->domain = $domain_temp[0];
                return $this->domain;
            }
            preg_match_all("/\\w+\\.\\w+\$/", $domain, $domain);
            $this->domain = $domain[0][0];
            return $this->domain;
        } else {
            return $this->domain;
        }
    }
}

$lang = new Language();
// print_r($lang->language_area);
$current_lang = getCurrentLanguage();
// print_r($current_lang);
function getCurrentLanguage()
{
    global $lang, $languages;
    if (array_key_exists($lang->language_area, $languages)) {
        return $lang->language_area;
    } else if (array_key_exists($lang->language_country, $languages)) {
        return $lang->language_country;
    } else {
        return 'en-US';
    }
}

include $lang->getFileDir('language.php');

function I18N($key = "")
{
    global $LANG;
    return isset($key) ? isset($LANG[$key]) ? $LANG[$key] : $key : "";
}
