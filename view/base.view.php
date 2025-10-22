<?php
function render(callable $content, array $data): string
{
    return "<!doctype html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport'
          content='width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0'>
    <meta http-equiv='X-UA-Compatible' content='ie=edge'>
    <title>Document</title>
</head>
<body>
<div>
    <div>Department</div>
    <div>
        <ul>
            <li><a href='/department/create'>create</a></li>
            <li><a href='/department/read'>show</a></li>

        </ul>
    </div>
</div>
<div>Employees</div>
<div>
    <ul>
        <li><a href='/employee/create'>create</a></li>
        <li><a href='/employee/read'>show</a></li>
    </ul>
</div>
<div>" . $content($data) . "



</div>

</body>
</html>";


}