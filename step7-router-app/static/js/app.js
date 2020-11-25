function getUsers() {
    fetch('./api/users')
        .then(res => res.json())
        .then(json => {
            document.querySelector('#users').innerHTML = JSON.stringify(json, null, 4);
        })
}

function getUserById(id) {
    fetch(`./api/user/${id}`)
        .then(res => res.json())
        .then(json => {
            document.querySelector('#userById').innerHTML = JSON.stringify(json, null, 4);
        })
}

function getUserByEmail(email) {
    fetch(`./api/user?email=${email}`)
        .then(res => res.json())
        .then(json => {
            document.querySelector('#userByEmail').innerHTML = JSON.stringify(json, null, 4);
        })
}

function addUser(form) {
    const formData = new FormData(form);
    fetch('./api/user', {method: 'post', body: formData})
        .then(() => getUsers());
}

document.forms.frm1.addEventListener('submit', e => {
    e.preventDefault();
    getUserById(e.target.userId.value);
})

document.forms.frm2.addEventListener('submit', e => {
    e.preventDefault();
    getUserByEmail(e.target.userEmail.value);
})

document.forms.frm3.addEventListener('submit', e => {
    e.preventDefault();
    addUser(e.target);
})

getUsers();