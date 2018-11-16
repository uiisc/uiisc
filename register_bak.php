<?php
  define('IN_SYS', true);
  require_once ("core.php");
   $security_id = md5(rand(6000,getrandmax())); // $security_id = md5(rand(6000,PHP_INT_MAX));
?>
<!DOCTYPE html>
<html lang="<?php echo $current_language; ?>">
<head>
    <meta charset="utf-8">
    <title><?php echo $title; ?> - <?php echo $LANG['register']; ?></title>
    <?php include ("headmate.php"); ?>
</head>

<body>
<?php include ("nav.php"); ?>

<div class="container">
    <div class="form-group form-horizontal form-account">
        <input type="hidden" name="plan_name" value="free webhosting">
        <div class="form-group">
            <label for="inputUsername" class="control-label"><?php echo $LANG['username']; ?></label>
            <input type="text" name="username" class="form-control" id="inputUsername" placeholder="<?php echo $LANG['input_username']; ?>" value="<?php if (isset($_GET['username'])) { echo $_GET['username']; }?>">
        </div>
        <div class="form-group">
            <label for="inputDomain" class="control-label"><?php echo $LANG['domain']; ?></label>
            <input type="text" name="domain" class="form-control" id="inputDomain" placeholder="<?php echo $LANG['input_domain']; ?>" value="<?php if (isset($_GET['domain'])) { echo $_GET['domain']; }?>">
        </div>
        <div class="form-group">
            <label for="inputPassword" class="control-label"><?php echo $LANG['password']; ?></label>
            <input type="password" name="password" class="form-control" id="inputPassword" placeholder="<?php echo $LANG['input_password']; ?>">
        </div>
        <div class="form-group">
            <label for="inputEmail" class="control-label"><?php echo $LANG['email']; ?></label>
            <input type="email" name="email" class="form-control" id="inputEmail" placeholder="<?php echo $LANG['input_email']; ?>" value="<?php if (isset($_GET['email'])) { echo $_GET['email']; }?>">
        </div>
        <div class="form-group">
            <label for="inputCategory" class="control-label"><?php echo $LANG['site_category']; ?></label>
            <select class="form-control" name="website_category" id="inputCategory">
                <option><?php echo $LANG['choose_from_below']; ?></option>
                <option><?php echo $LANG['personal']; ?></option>
                <option><?php echo $LANG['business']; ?></option>
                <option><?php echo $LANG['hobby']; ?></option>
                <option><?php echo $LANG['forum']; ?></option>
                <option><?php echo $LANG['dating']; ?></option>
                <option><?php echo $LANG['software_download']; ?></option>
            </select>
        </div>
        <div class="form-group">
            <label for="inputLanguage" class="control-label"><?php echo $LANG['site_language']; ?></label>
            <select class="form-control" name="website_language" id="inputLanguage">
                <option><?php echo $LANG['choose_from_below']; ?></option>
                <!-- <option data-i18n="english">English</option> -->
                <!-- <option data-i18n="non_english">Non-English</option> -->
                <option selected="selected" value="English">Auto: English</option>
                <option>Afrikaans</option>
                <option>Albanian</option>
                <option>Amharic</option>
                <option>Arabic</option>
                <option>Armenian</option>
                <option>Azeerbaijani</option>
                <option>Basque</option>
                <option>Belarusian</option>
                <option>Bengali</option>
                <option>Bosnian</option>
                <option>Bulgarian</option>
                <option>Burmese</option>
                <option>Catalan</option>
                <option>Cebuano</option>
                <option>Chichewa</option>
                <option>Chinese_simplified</option>
                <option>Chinese_traditional</option>
                <option>Corsican</option>
                <option>Croatian</option>
                <option>Czech</option>
                <option>Danish</option>
                <option>Dutch</option>
                <option>English</option>
                <option>Esperanto</option>
                <option>Estonian</option>
                <option>Farsi</option>
                <option>Filipino</option>
                <option>Finnish</option>
                <option>French</option>
                <option>Frisian</option>
                <option>Galician</option>
                <option>Georgian</option>
                <option>German</option>
                <option>Greek</option>
                <option>Gujarati</option>
                <option>Haitian Creole</option>
                <option>Hausa</option>
                <option>Hawaiian</option>
                <option>Hebrew</option>
                <option>Hindi</option>
                <option>Hmong</option>
                <option>Hungarian</option>
                <option>Icelandic</option>
                <option>Igbo</option>
                <option>Indonesian</option>
                <option>Irish</option>
                <option>Italian</option>
                <option>Japanese</option>
                <option>Javanese</option>
                <option>Kannada</option>
                <option>Kazakh</option>
                <option>Khmer</option>
                <option>Korean</option>
                <option>Kurdish</option>
                <option>Kyrgyz</option>
                <option>Lao</option>
                <option>Latin</option>
                <option>Latvian</option>
                <option>Lithuanian</option>
                <option>Luxembourgish</option>
                <option>Macedonian</option>
                <option>Malagasy</option>
                <option>Malay</option>
                <option>Malayalam</option>
                <option>Maltese</option>
                <option>Maori</option>
                <option>Marathi</option>
                <option>Mongolian</option>
                <option>Nepali</option>
                <option>Norwegian</option>
                <option>Pashto</option>
                <option>Persian</option>
                <option>Polish</option>
                <option>Portuguese</option>
                <option>Punjabi</option>
                <option>Romanian</option>
                <option>Russian</option>
                <option>Samoan</option>
                <option>Scots Gaelic</option>
                <option>Serbian</option>
                <option>Sesotho</option>
                <option>Shona</option>
                <option>Sindhi</option>
                <option>Sinhala</option>
                <option>Slovak</option>
                <option>Slovenian</option>
                <option>Somali</option>
                <option>Spanish</option>
                <option>Sundanese</option>
                <option>Swahili</option>
                <option>Swedish</option>
                <option>Tajik</option>
                <option>Tamil</option>
                <option>Telugu</option>
                <option>Thai</option>
                <option>Turkish</option>
                <option>Ukrainian</option>
                <option>Urdu</option>
                <option>Uzbek</option>
                <option>Vietnamese</option>
                <option>Welsh</option>
                <option>Xhosa</option>
                <option>Yiddish</option>
                <option>Yoruba</option>
                <option>Zulu</option>
            </select>
        </div>
        <div class="form-group">
            <label for="inputID" class="control-label"><?php echo $LANG['security_code']; ?></label>
            <img width="90px" height="25px" src="./security_code.php?id=<?=$security_id?>">
            <input type="hidden" name="id" class="form-control" id="inputID" value="<?=$security_id?>">
        </div>
        <div class="form-group">
            <label for="inputSecurityCode" class="control-label"><?php echo $LANG['input_security_code']; ?></label>
            <input type="text" name="number" class="form-control" id="inputSecurityCode" placeholder="<?php echo $LANG['input_security_code_above']; ?>">
        </div>
        <div class="form-group">
            <button type="submit" name="submit" class="btn btn-lg btn-primary"><?php echo $LANG['register']; ?></button>
        </div>
    </div>
</div>
<?php include ("footer.php"); ?>
</body>
</html>