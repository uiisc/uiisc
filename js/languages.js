jQuery.i18n.properties({
  name: 'lang',
  path: './locales/',
  mode: 'both',
  // language: 'zh_CN',
  checkAvailableLanguages: true,
  async: true,
  cache: true,
  callback: function () {
    jQuery("html").attr("lang", jQuery.i18n.normaliseLanguageCode());
    $("[data-i18n]").each(function () {
      var elem = $(this), localizedValue = jQuery.i18n.map[elem.data("i18n")];
      if (elem.is("input[type=text]") || elem.is("input[type=password]") || elem.is("input[type=email]")) {
        elem.attr("placeholder", localizedValue);
      } else if (elem.is("input[type=button]") || elem.is("input[type=submit]")) {
        elem.attr("value", localizedValue);
      } else {
        elem.text(localizedValue);
      }
    });
    if (window.location.pathname == "/login.php") {
      jQuery("input[name=language]").attr("value", jQuery.i18n.map["language"])
    }
  }
});