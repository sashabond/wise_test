const http = require('http');

const html = `
    <!DOCTYPE html>
    <html lang="ru">
    <head>
        <meta charset="UTF-8">
        <title>Апельсин</title>
        <link rel="stylesheet" type="text/css" href="app.css">
    </head>
    <body>
        <div class="list">
            <ul>
                
                <li>Апельсин</li>
                <li>Авокадо</li>
                <li>Ананас</li>
                <li>Манго</li>
                <li>Маракуйя</li>
                <li>Ківі</li>
                <li>Кокос</li>
            </ul>
        </div>
    </body>
    </html>
`; 
const css = ` 
.list{
    position: absolute;
    top:250px;
    left:1000px;
    height:250px;
    width: 165px;
    background-color: rgb(245,253,111);
    border: 1px solid green;
    
}
li{color:red;}
`;

const requestListener = function (req, res) {
    switch(req.url) {
        case '/':
            res.writeHead(200, {'Content-Type' : 'text/html'});
            res.end(html);
            break;

        case '/css':
            res.writeHead(200, {'Content-Type' : 'text/css'});
            res.end(css);
            break;

        default:
            res.writeHead(404, {'Content-Type' : 'text/plain'});
            res.end("error");
            break;
    }
  
}

const server = http.createServer(requestListener);
server.listen(8080);