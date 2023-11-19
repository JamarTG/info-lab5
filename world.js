window.onload = () => {
    const searchInput = document.getElementById("search");
    const countryLookUpBtn = document.getElementById("country-lookup");
    const cityLookUpBtn = document.getElementById("city-lookup");
    const result = document.getElementById("result");

    countryLookUpBtn.addEventListener("click" , async () => {
        const response = await (await fetch(`world.php?country=${searchInput.value}`)).text();
        console.log(response)
        result.innerHTML = response;
    })
    cityLookUpBtn.addEventListener("click" , async () => {
        const response = await (await fetch(`world.php?city=${searchInput.value}`)).text();
        console.log(response)
        result.innerHTML = response;
    })
    
}



