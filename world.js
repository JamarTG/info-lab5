window.onload = () => {
    const countryInput = document.getElementById("country");
    const lookUpBtn = document.getElementById("lookup");
    const result = document.getElementById("result");
    
    lookUpBtn.addEventListener("click" , async () => {
        const response = await (await fetch(`world.php?name=${countryInput.value}`)).text();
        console.log(response)
        result.innerHTML = response;
    })
    
}



