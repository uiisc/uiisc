<?php
namespace lib;

class Language
{

    public $language_current;
    public $language_cached;
    public $language_default;
    public $language_root;
    public $language_file;
    private $languages = [
        'en-US' => ['English', 'English'],
        'zh-CN' => ['简体中文', 'Chinese_simplified'],
        'zh-SG' => ['简体中文（新加坡）', 'Chinese_simplified'],
        'zh-HK' => ['繁體中文（香港）', 'Chinese_traditional'],
        'zh-TW' => ['繁體中文（台湾）', 'Chinese_traditional'],
        'af' => ['Afrikaans', 'Afrikaans'],
        'sq' => ['የአልባኒያ', 'Albanian'],
        'am' => ['Amharic', 'Amharic'],
        'ar-AR' => ['Arabic', 'Arabic'],
        'hy' => ['Armenian', 'Armenian'],
        'az' => ['Azərbaycan', 'Azeerbaijani'],
        'eu' => ['Basque', 'Basque'],
        'be' => ['Belarusian', 'Belarusian'],
        'bn' => ['Bengali', 'Bengali'],
        'bs' => ['Bosnian', 'Bosnian'],
        'bg-BG' => ['Bulgarian', 'Bulgarian'],
        'my' => ['Burmese', 'Burmese'],
        'ca' => ['Catalan', 'Catalan'],
        'ce' => ['Cebuano', 'Cebuano'], // 宿务语
        'ch' => ['Chichewa', 'Chichewa'],
        'co' => ['Corsican', 'Corsican'],
        'hr' => ['Croatian', 'Croatian'],
        'cs' => ['Czech', 'Czech'],
        'da' => ['Danish', 'Danish'],
        'nl' => ['Dutch', 'Dutch'],
        'eo' => ['Esperanto', 'Esperanto'],
        'et' => ['Estonian', 'Estonian'],
        'fa' => ['Farsi', 'Farsi'],
        'fil' => ['Filipino', 'Filipino'],
        'fi' => ['Finnish', 'Finnish'],
        'fr-FR' => ['français', 'French'], // 法语
        'fy' => ['Frisian', 'Frisian'],
        'gl' => ['Galician', 'Galician'],
        'ka' => ['Georgian', 'Georgian'],
        'de' => ['Deutsch', 'German'],
        'el' => ['Greek', 'Greek'],
        'gu' => ['Gujarati', 'Gujarati'],
        'ko' => ['Haitian Creole', 'Haitian Creole'],
        'ha' => ['Hausa', 'Hausa'],
        'haw' => ['Hawaiian', 'Hawaiian'],
        'he' => ['Hebrew', 'Hebrew'],
        'hi' => ['Hindi', 'Hindi'],
        'hm' => ['Hmong', 'Hmong'],
        'hu' => ['Hungarian', 'Hungarian'],
        'is' => ['Icelandic', 'Icelandic'],
        'ig' => ['Igbo', 'Igbo'],
        'id' => ['Indonesian', 'Indonesian'],
        'ga' => ['Irish', 'Irish'],
        'it-IT' => ['Italian', 'Italian'],
        'ja-JP' => ['日本語', 'Japanese'],
        'jv' => ['Wong Jawa', 'Javanese'],
        'kn' => ['Kannada', 'Kannada'],
        'kk' => ['Kazakh', 'Kazakh'],
        'kh' => ['Khmer', 'Khmer'],
        'ko-KR' => ['한국의', 'Korean'],
        'ku' => ['Kurdish', 'Kurdish'],
        'kz' => ['Kyrgyz', 'Kyrgyz'],
        'lo' => ['ພາສາລາວ', 'Lao'],
        'la' => ['Latinae', 'Latin'],
        'lv' => ['Latvian', 'Latvian'],
        'lt' => ['Lithuanian', 'Lithuanian'],
        'lu' => ['Luxembourgish', 'Luxembourgish'],
        'mk' => ['Macedonian', 'Macedonian'],
        'ma' => ['Malagasy', 'Malagasy'],
        'ms' => ['Malay', 'Malay'],
        'ml' => ['Malayalam', 'Malayalam'],
        'mt' => ['Maltese', 'Maltese'],
        'ma' => ['Maori', 'Maori'],
        'mr' => ['Marathi', 'Marathi'],
        'mn' => ['Mongolian', 'Mongolian'],
        'ne' => ['Nepali', 'Nepali'],
        'no' => ['Norwegian', 'Norwegian'],
        'pa' => ['Pashto', 'Pashto'],
        'pe' => ['Persian', 'Persian'],
        'po' => ['Polish', 'Polish'],
        'pg' => ['Português', 'Portuguese'],
        'pu' => ['Punjabi', 'Punjabi'],
        'ro-RO' => ['Romanian', 'Romanian'],
        'ru-RU' => ['Russian', 'Russian'],
        'sa' => ['Samoan', 'Samoan'],
        'gd' => ['Scots Gaelic', 'Scots Gaelic'],
        'sr' => ['Serbian', 'Serbian'],
        'se' => ['Sesotho', 'Sesotho'],
        'sh' => ['Shona', 'Shona'],
        'si' => ['Sindhi', 'Sindhi'],
        'sin' => ['Sinhala', 'Sinhala'],
        'sk' => ['Slovak', 'Slovak'],
        'sl' => ['Slovenian', 'Slovenian'],
        'so' => ['Somali', 'Somali'],
        'es' => ['Spanish', 'Spanish'],
        'su' => ['Sundanese', 'Sundanese'],
        'sw' => ['Swahili', 'Swahili'],
        'sv' => ['Swedish', 'Swedish'],
        'tj' => ['Tajik', 'Tajik'],
        'ta' => ['Tamil', 'Tamil'],
        'te' => ['Telugu', 'Telugu'],
        'ts' => ['Thai', 'Thai'],
        'tu' => ['Turkish', 'Turkish'],
        'uk' => ['Ukrainian', 'Ukrainian'],
        'ur' => ['Urdu', 'Urdu'],
        'uz-UZ' => ['Uzbek', 'Uzbek'],
        'vi' => ['Vietnamese', 'Vietnamese'],
        'we' => ['Welsh', 'Welsh'],
        'xh' => ['Xhosa', 'Xhosa'],
        'yi' => ['Yiddish', 'Yiddish'],
        'yo' => ['Yorùbá', 'Yoruba'],
        'zu' => ['Zulu', 'Zulu'],
    ];
    private $LANG;
    private $domain;

    /** 构造函数
     * @param string $language_root 翻译文件根目录
     * @param array $languages 可用语言列表
     * @param string $lang_default 默认语言
     * @return void
     */
    public function __construct($language_root, $lang_default = '')
    {
        $this->language_root = $language_root;
        if (!empty($lang_default) && array_key_exists($lang_default, $this->languages)) {
            $this->language_default = $lang_default;
            $this->language_current = $lang_default;
        } else {
            $this->language_default = 'en-US';
            $this->language_current = 'en-US';
        }
        $this->init_domain();
        $this->init_language();
        $this->init_language_file();
        // echo '<p>'.$this->language_cached.'</p>';
    }

    private function init_domain()
    {
        if (empty($this->domain)) {
            $domain = $_SERVER['SERVER_NAME'];
            if (strcasecmp($domain, 'localhost') === 0) {
                $this->domain = $domain;
            } else if (preg_match("/^(\\d+\\.){3}\\d+\$/", $domain, $domain_temp)) {
                $this->domain = $domain_temp[0];
            } else {
                preg_match_all("/\\w+\\.\\w+\$/", $domain, $domain);
                $this->domain = $domain[0][0];
            }
        }
    }

    private function init_language()
    {
        if (!@empty(trim($_COOKIE['lang']))) {
            // has cached lang
            $this->language_cached = trim($_COOKIE['lang']);
            if (array_key_exists($this->language_cached, $this->languages) && $this->has_language_file($this->language_cached)) {
                $this->language_current = $this->language_cached;
            } else {
                $this->language_current = $this->language_default;
            }
        } else if (!empty($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
            // get browser lang
            $lang_browser = $_SERVER['HTTP_ACCEPT_LANGUAGE']; // zh-CN,zh;q=0.9
            preg_match_all("/[\\w-]+/", $lang_browser, $lang_browser); // [['zh-CN', 'zh']]
            if (array_key_exists($lang_browser[0][0], $this->languages) && $this->has_language_file($lang_browser[0][0])) {
                $this->language_current = $lang_browser[0][0];
            } else if (array_key_exists($lang_browser[0][1], $this->languages) && $this->has_language_file($lang_browser[0][1])) {
                $this->language_current = $lang_browser[0][1];
            } else {
                $this->language_current = $this->language_default;
            }
            $this->language_cached = $this->language_current;
            setcookie("lang", $this->language_current, time() + 365 * 24 * 3600, "/", $this->domain);
        } else {
            $this->language_cached = $this->language_current;
            setcookie("lang", $this->language_current, time() + 365 * 24 * 3600, "/", $this->domain);
        }
    }

    private function has_language_file($lang)
    {
        return !empty($lang) && file_exists($this->language_root . $lang . '/' . 'language.php');
    }

    private function init_language_file()
    {
        if ($this->has_language_file($this->language_current)) {
            $this->language_file = $this->language_root . $this->language_current . '/' . 'language.php';
        } else {
            $this->language_file = $this->language_root . $this->language_default . '/' . 'language.php';
        }
        $this->LANG = require $this->language_file;
    }

    public function get_languages_tags()
    {
        $tags = '';
        foreach ($this->languages as $k => $v) {
            $actived = $k == $this->language_current ? ' class="active"' : '';
            $tags .= '<li' . $actived . '><a class="dropdown-item language-change-click" data-language="' . $k . '" href="javascript://">' . $this->languages[$k][0] . '</a></li>';
        }
        return $tags;
    }

    public function get_language_name()
    {
        return $this->languages[$this->language_current][0];
    }

    public function get_language_value()
    {
        return $this->languages[$this->language_current][1];
    }

    /** 登录下拉框选项
     * language select for login to control panel
     * @return void
     */
    public function get_languages_options()
    {
        $options = '';
        foreach ($this->languages as $k => $v) {
            $selected = $k == $this->language_cached ? ' selected="selected"' : '';
            $options .= '<option value="' . $v[1] . '"' . $selected . '>' . $v[0] . '</option>';
        }
        return $options;
    }

    public function I18N($key = '')
    {
        if (!isset($key)) {
            return '';
        }
        // $k = strtolower($key);
        return isset($this->LANG[$key]) ? $this->LANG[$key] : $key;
    }
}
