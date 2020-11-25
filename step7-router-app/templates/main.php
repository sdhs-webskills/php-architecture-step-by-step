<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>아이디로 조회</h2>
    <form action="" name="frm1">
        <ul>
            <li><input type="text" name="userId" placeholder="아이디"></li>
            <li><button type="submit">조회</button></li>
        </ul>
    </form>
    <pre id="userById"></pre>

    <h2>이메일로 조회</h2>
    <form action="" name="frm2">
        <ul>
            <li><input type="text" name="userEmail" placeholder="아이디"></li>
            <li><button type="submit">조회</button></li>
        </ul>
    </form>
    <pre id="userByEmail"></pre>

    <h2>회원 추가</h2>
    <form action="" name="frm3">
        <ul>
            <li><input type="text" name="name" placeholder="이름"></li>
            <li><input type="text" name="email" placeholder="이메일"></li>
            <li><button type="submit">추가</button></li>
        </ul>
    </form>

    <h2>전체 회원 정보</h2>
    <pre id="users"></pre>

    <script>const BASE_URI = '<?php echo BASE_URI?>';</script>
    <script src="<?php echo BASE_URI ?>/static/js/app.js"></script>
</body>
</html>