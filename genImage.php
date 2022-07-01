<?php

function genImage($img)
    {
        $folderPath = "img/";
        $image_parts = explode(";base64,", $img);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $file = $folderPath . uniqid() . '.png';
        $converstion = file_put_contents($file, $image_base64);
        if($converstion) {
            return true;
        }
        else {
           return false;
        }
    }
$postimage = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHgAAAAyCAMAAACgee/qAAAAP1BMVEUAAABGdA+ItlGfzWhtmzZkki2GtE+fzWi86oWNu1al026Esk1IdhFQfhk5ZwKm1G83ZQChz2qbyWShz2qItlFoaDiWAAAAAXRSTlMAQObYZgAAAdBJREFUeJzUmIvO8jAIhnlnosYm1Xj/F/vnnzswCmthq+Zr8h2cLc8LBdaN/uR4/Ir7OIMcsXEK9xT1IXLDnNQLfq9wUyN5ICIQ0My918hNZjAMA0Ag+vxuIbPVTQtULmFY/ke728uKILZYtwN3Td6nGquskKMQMlrIXmxEkTDw/yfnTM0JUg2RkeX84gymPAU9GPiCrEYcKxZcB6jBnVZdqh1sjIgZu5Zd4TDnTlaksb3EcWCNEmJmdsEyISrKqkqxFrDJFbkGfrGZXEqBnsW8EngKgHHjvW5CLA4IQVIi2K7oaaGO1y552zLVKPJwO3b59bLIq3rhjzrNy9U9zszAzFe5253wBHoZb87N8z0Ba/IYnQZlQfm47w2ZmYLVKWW1JSUXW8jWF1PDlubW+pm54ynspLsIp2+ahZZGH4+jBwcDu5Ahy0vIix9ZDLQW8qKreZv14JRgcKnoIzXu4CJzsLzgA/s8trmR22IQLGpn/JC6gxU2gJSSxD4/fy5HadeSzj8k6e/zOZIvl4Pk61WSa6OXx18YhzVHuUd3KU7+EXcdlZcF/bi11xT9yL0Bt8MWYs3zdjtKjh4JfuXxV4b5INObaz7IdCcT0b8AAAD//90iBTsVRhe1AAAAAElFTkSuQmCC';
    
echo genImage($postimage);
