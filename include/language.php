<?php
// $languages = array();
// $languages['zh-CN']['name'] = 'china';
// $languages['zh-CN']['image'] = 'flag1.jpg';
// $languages['en-US']['name'] = 'english';
// $languages['en-US']['image'] = 'flag2.jpg';
$languages = array(
  'en-US'  => 'English',
  'zh-CN'  => '简体中文',
  'zh-HK'  => '繁體中文（香港）',
  'zh-TW'  => '繁體中文（台湾）'
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
  /* 
  取得翻译文件的绝对路径 
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
  /* 
  取得当前使用语言的文件夹 
  */
  public function getLanguageDir()
  {
    return $this->language_dir;
  }
  /* 
  初始化语言文件夹 
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
  /* 
  初始化默认语言 
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
  /* 
  从cookie中导入语言种类 
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
  /*
  把当前的语言种类放到cookie中 
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
