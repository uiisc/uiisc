// theme Selector Switcher
linkLoader(getTheme());

function themeSelectorClicked() {
    var next = nextTheme(getTheme());
    linkLoader(next);
    saveTheme(next);
    this.className = getThemeClasses(next);
}

// This function loads a css file according to the value of its parameter
function linkLoader(param) {
    var link = document.getElementById('theme');
    if (param == 'light') {
        link.removeAttribute('href');
    } else if (param == 'dark') {
        link.setAttribute('href', location.origin + '/assets/theme.switcher/css/dark.css');
    } else {
        link.setAttribute('href', location.origin + '/assets/theme.switcher/css/auto.css');
    }
    document.getElementsByTagName("head")[0].appendChild(link);
}

function getTheme() {
    try {
        var theme = localStorage.getItem('theme');
        if (!theme) {
            return 'auto';
        }
        return theme;
    } catch {
        return 'auto';
    }
}

function getThemeClasses(theme) {
    if (theme == 'light') {
        return 'fa fa-sun fa-fw"';
    } else if (theme == 'dark') {
        return 'fa fa-moon fa-fw';
    } else {
        return 'fa fa-adjust fa-fw';
    }
}

function nextTheme(current) {
    if (current == 'light') {
        return 'dark';
    } else if (current == 'dark') {
        return 'auto';
    } else {
        return 'light';
    }
}

function saveTheme(theme) {
    try {
        localStorage.setItem('theme', theme);
    } catch (e) {
        console.log(e);
    }
}
