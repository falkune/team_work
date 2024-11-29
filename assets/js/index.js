// const selectuser = document.getElementById("user");
const selectTeam = document.getElementById("team");

// console.log(selectTeam);

// selectuser.addEventListener('change', () => {
//     let user = selectuser.value;
//     let users = document.getElementById("users");

//     let listUser = users.value.split(',');
//     if(user != ""){
//         if(users.value == ""){
//             users.value=user;
//         }else if(!listUser.includes(user)){
//             users.value=users.value + "," + user;
//         }
//     }
// });

// rafrechir la liste des user par rapport a la team selectionnee
selectTeam.addEventListener('change', () => {
    let team = document.getElementById("team").value;

    fetch("http://localhost/team_work/?url=userTeam&id="+team)
    .then(response => response.json())
    .then(data => console.log(data))
    .catch(error => console.log(error))

});



