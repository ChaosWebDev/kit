$(document).ready(function () {
    $('#theme-toggle').on('click', function () {
        let currentTheme = $('html').attr('data-theme');
        let newTheme = currentTheme === 'dark' ? 'light' : 'dark';

        $.ajax({
            url: '/ajax/theme',
            type: 'POST',
            data: { theme: newTheme },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Add CSRF token
            },
            success: function (response) {
                $('html').attr('data-theme', newTheme);
                console.log(response.message);
            },
            error: function (xhr) {
                console.error('Error:', xhr.responseJSON);
            }
        });
    });
});
