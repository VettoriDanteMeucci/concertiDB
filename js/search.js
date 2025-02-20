let concs = document.querySelectorAll("#searchConc tr:not(:first-child)");
const searchTarget = document.getElementById("search");

searchTarget.addEventListener("input", (e) => {
    console.log(e.currentTarget.value);
    for(let i=0; i < concs.length; i++) {
        if(concs[i].textContent.toLowerCase().includes(e.currentTarget.value.toLowerCase())) {
            concs[i].classList.remove("d-none");
        }else{
            concs[i].classList.add("d-none");
        }
    }
});