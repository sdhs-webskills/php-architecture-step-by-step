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
    <h2>회원정보 조회</h2>
    <a href="./api/users">/api/users</a>
    <pre id="users"></pre>

    <h2>회원 추가</h2>
    <form action="" onsubmit="return addUser(this)">
        <ul>
            <li><input type="text" name="name" placeholder="이름"></li>
            <li><input type="text" name="email" placeholder="이메일"></li>
            <li><button type="submit">추가</button></li>
        </ul>
    </form>
    <script>
        function getUsers() {
            fetch('/api/users')
                .then(res => res.json())
                .then(json => {
                    document.querySelector('#users').innerHTML = JSON.stringify(json, null, 4);
                })
        }
        function addUser(form) {
            const formData = new FormData(form);
            fetch('./api/user', { method: 'post', body: formData })
                .then(() => getUsers());
            return false;
        }
        getUsers();
    </script>
</body>
</html>