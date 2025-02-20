const concs = document.querySelectorAll("#searchConc trJ");
const searchTarget = document.getElementById("search");

searchTarget.addEventListener("input", (e) => {
    console.log(e.currentTarget.value);
    for(let i=0; i < concs.length; i++) {
        console.log(concs[i].textContent)
        if(concs[i].textContent.toLowerCase().includes(e.currentTarget.value.toLowerCase())) {
            concs[i].classList.remove("d-none");
        }else{
            concs[i].classList.add("d-none");
        }
    }
});