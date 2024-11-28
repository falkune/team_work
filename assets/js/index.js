const selectuser = document.getElementById("user");

selectuser.addEventListener('change', () => {
    let user = selectuser.value;
    let users = document.getElementById("users");

    let listUser = users.value.split(',');

    if(users.value == ""){
        users.value=user;
    }else if(!listUser.includes(user)){
        users.value=users.value + "," + user;
    }
});