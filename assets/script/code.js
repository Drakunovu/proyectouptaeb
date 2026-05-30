const loginCardCedula = document.getElementsByName("cedula")

loginCardCedula.forEach(inputCedula => {
    inputCedula.addEventListener("input", (event) => {
        const cedulaValue = event.target.value
        if (cedulaValue.length < 7 || cedulaValue.length > 8) {
            inputCedula.style.border = "2px red solid"
        }
    
        else {
            inputCedula.style.border = "2px green solid"
        }
    })
});
