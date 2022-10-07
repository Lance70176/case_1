function fake_404(is_spider) {
    if(is_spider == '') {
        $('title').html('404 Not Found');
        $('body').html('<!DOCTYPE html>\n' +
            '<html lang="en">\n' +
            '<head>\n' +
            '    <meta charset="UTF-8">\n' +
            '    <meta name="viewport" content="width=device-width, initial-scale=1.0">\n' +
            '    <title>404</title>\n' +
            '    <style> * { max-width: initial !important; } </style>\n' +
            '</head>\n' +
            '<body style="margin: 0;padding: 0;">\n' +
            '    <div style="width: 100%;height: 100%;">\n' +
            '        <img src="./images/404_16.jpg" alt="" style="background-size: 100% 100%;background-repeat: no-repeat;width: 100%;height: 100%;">\n' +
            '    </div>\n' +
            '</body>\n' +
            '</html>');
    }
}
