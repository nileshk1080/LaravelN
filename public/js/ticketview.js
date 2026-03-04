let inputUsername = "";
let inputPriority = "";
let inputStatus = "";

let rowsUsername = document.querySelectorAll("table tbody tr .uf");
let rowsPriority = document.querySelectorAll("table tbody tr .pf");
let rowsStatus = document.querySelectorAll("table tbody tr .sf");

let rows = document.querySelectorAll("table tbody tr ");

document.getElementById("InputUser").addEventListener("input",function(){ 

    let inputUsername1 = this.value.toLowerCase(); 
    inputUsername = inputUsername1;
    out();
});

document.getElementById("priority").addEventListener("change",function(){ 

    let inputPriority1 = this.value;
    inputPriority = inputPriority1;
    out();
});

document.getElementById("status").addEventListener("change",function(){ 

    let inputStatus1 = this.value;
    inputStatus = inputStatus1;
    out();
});

function out() {
    for (let i = 0; i < rows.length; i++) {

        if (rowsUsername[i].innerText.includes(inputUsername) && 
            ((rowsPriority[i].innerText.includes(inputPriority)) || ("All".includes(inputPriority))) &&
            ((rowsStatus[i].innerText.includes(inputStatus)) || ("All".includes(inputStatus)))
        ) {
            rows[i].style.display = "";
        } else {
            rows[i].style.display = "none";
        }
    }
}
