

    const sku = document.querySelector("#sku")
    const name = document.querySelector("#name")
    const price = document.querySelector("#price")
    const saveBtn = document.querySelector("#saveBtn")
    const productForm = document.querySelector("#product_form")
    const dvdSection = document.querySelector("#DVD")
    const bookSection = document.querySelector("#Book")
    const furnitureSection = document.querySelector("#Furniture")
    let selectedSection = null


    function productTypeChanged(item){

    if(selectedSection)
    selectedSection.classList.remove("selected")


    selectedSection = document.querySelector(`.controls-${item}`)

    if(selectedSection)
    selectedSection.classList.add("selected")

    validateFields()
}

    saveBtn.addEventListener("click", function (){

    if(!validateFields()) {
    alert("Please, submit required data")
    return
}

    productForm.submit()
})

    function validateFields(){
    const selectedSection =  document.querySelector(".selected")

    if(!selectedSection || sku.value === "" || price.value === "" || name.value === "" )
    return false

    const inputs = selectedSection.querySelectorAll("input")


    for (let input of inputs){

    if (input.value === "")
    return false
}

    return  true
}

