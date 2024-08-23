const sku = document.querySelector("#sku")
const name = document.querySelector("#name")
const price = document.querySelector("#price")
const saveBtn = document.querySelector("#saveBtn")
const productForm = document.querySelector("#product_form")
const productType = document.querySelector("#productType")
const dvdSection = document.querySelector("#DVD")
const bookSection = document.querySelector("#Book")
const furnitureSection = document.querySelector("#Furniture")
const controlsSection = document.querySelector("#controls-section")
let selectedSection = null


const productMap = {
    "Book" : `  <div id="Book" class="controls">
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Weight (KG)</label>
            <div class="col-sm-3">
                <input name="weight"  type="number" class="form-control"  id="weight" >
                <strong>Please, provide weight in KG</strong>
            </div><br>
        </div>
    </div>`,
    "DVD" : `<div id="DVD" class="controls" >
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Size (MB)</label>
            <div class="col-sm-3">
                <input name="size"  type="number" class="form-control"  id="size"><br>
                <strong>Please, provide disc space in MB</strong>
            </div>
        </div>
    </div>`,
    "Furniture":   `<div for="Dimensions" name="dimensions" id="Furniture" class="controls" >
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Height (CM)</label>
            <div class="col-sm-3">
                <input n  type="number" class="form-control" id="height" name ="height">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Width (CM)</label>
            <div class="col-sm-3">
                <input type="number" class="form-control" id="width" name ="width">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Length (CM)</label>
            <div class="col-sm-3">
                <input  type="number" class="form-control" id="length" name ="length" ><br>
                <strong>Please, provide dimensions</strong>
            </div><br>
        </div>
    </div>`
}

function productTypeChanged(item) {

    selectedSection = item

    controlsSection.innerHTML = ""

    controlsSection.insertAdjacentHTML("afterbegin" , productMap[item])


}

productType.addEventListener("change",function(){
    productTypeChanged(this.value)
})

saveBtn.addEventListener("click", function () {

    if (!validateFields()) {
        alert("Please, submit required data")
        return
    }

    createProduct()

})

function validateFields() {





    if (!productMap[selectedSection] || sku.value === "" || price.value === "" || name.value === "")
        return false


    const inputs = controlsSection.querySelectorAll("input")


    for (let input of inputs) {

        if (input.value === "")
            return false
    }

    return true
}


async function createProduct() {
    try {



        const formData = new FormData(productForm);


        const data = {};
        formData.forEach((value, key) => {
            data[key] = value;
        });
        const response = await fetch('/addproduct', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        });

        const result = await response.json();

        if (result.success) {

            window.location.href = '/';
        } else {

            for (const key in result.errors) {
                if (result.errors.hasOwnProperty(key)) {
                    const error = document.querySelector(`#${key}-error`)
                    if(error){
                        error.innerText = result.errors[key].join(",")
                    }

                }
            }

            //alert('Failed to create product: ' + result.message);
        }
    } catch (error) {
        console.error('Error:', error);
        alert('An error occurred while creating the product.');
    }
}


