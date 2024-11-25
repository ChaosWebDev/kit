$(() => {
    const themeToggle = $("#theme-toggle");

    themeToggle.on('click', function (e) {
        const currentTheme = document.documentElement.getAttribute('data-theme');
        const newTheme = currentTheme === 'light' ? 'dark' : 'light';
        document.documentElement.setAttribute('data-theme', newTheme);
    });
});
