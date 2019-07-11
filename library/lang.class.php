<?php

class Language
{
    public $language_area; // area
    public $language_country; // country
    public $language_dir;
    public $languages; // languages enabled
    public $dir;

    public function __construct($language_root, $languages, $lang_default = "en-US")
    {
        $this->dir = $language_root;
        $this->language_area = $lang_default;
        $this->languages = $languages;
        $this->initDefaultLanguage();
        if (empty($this->language_country) && !empty($this->language_area)) {
            $this->language_country = substr($this->language_area, 0, strpos($this->language_area, "-"));
        }
        $this->initLanguageDir();
        echo $this->getFileDir('language.php');
        echo $this->language_country;
        include $this->getFileDir('language.php');
        $this->LANG = $LANG;
    }

    function I18N($key = "")
    {
        // global $LANG;
        return isset($key) ? isset($this->LANG[$key]) ? $this->LANG[$key] : $key : "";
    }

    /**
     * get absolute path of language file
     */
    public function getFileDir($file)
    {
        if (file_exists($this->language_dir . $file)) {
            return $this->language_dir . $file;
        } else {
            echo '-----';
            if (file_exists($this->dir . $this->language_area . "/" . $file)) {
                return $this->dir . $this->language_area . "/" . $file;
            } else {
                if (file_exists($this->dir . $this->language_country . "/" . $file)) {
                    return $this->dir . $this->language_country . "/" . $file;
                } else {
                    return $this->dir . "en-US/" . $file;
                }
            }
        }
    }

    /**
     * get current language directory
     */
    private function initLanguageDir()
    {
        if (file_exists($this->dir . $this->language_area) && !empty($this->language_area)) {
            $this->language_dir = $this->dir . $this->language_area . '/';
        } else {
            if (file_exists($this->dir . $this->language_country) && !empty($this->language_country)) {
                $this->language_dir = $this->dir . $this->language_country . '/';
            } else {
                $this->language_dir = $this->dir . 'en-US/';
            }
        }
    }

    /**
     * get the default language
     */
    public function initDefaultLanguage()
    {
        if ($this->get_cookie_lang()) {
            return;
        }
        $language = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
        preg_match_all("/[\\w-]+/", $language, $language);
        $this->language_area = $language[0][0];
        @($this->language_country = $language[0][1]);
        $this->setCookieLanguage();
    }
    /**
     * get lang form cookie
     */
    public function get_cookie_lang()
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

    /**
     * return current language directory
     */
    public function get_language_dir()
    {
        return $this->language_dir;
    }

    public function get_lang()
    {
        if (array_key_exists($this->language_area, $this->languages)) {
            return $this->language_area;
        } else if (array_key_exists($this->language_country, $this->languages)) {
            return $this->language_country;
        }
    }

    public function get_languages_tags()
    {
        $tags = '';
        foreach ($this->languages as $k => $value) {
            $actived = $k == $this->get_lang() ? ' class="active"' : '';
            $tags .= '<li' . $actived . '><a class="language-change-click" data-language="' . $k . '" href="javascript://">' . $this->languages[$k][0] . '</a></li>';
        }
        return $tags;
    }

    public function get_language_name()
    {
        return $this->languages[$this->get_lang()][0];
    }

    public function get_languages_options()
    {
        $options = '';
        foreach ($this->languages as $k => $value) {
            $selected = $k == $this->get_lang() ? ' selected="selected"' : '';
            $options .= '<option value="' . $value[1] . '"' . $selected . '>' . $value[0] . '</option>';
        }
        return $options;
    }
}
