const deleteForm  = document.querySelector("#massDeleteForm")


async function executeMassDelete() {
    try {



        const formData = new FormData(deleteForm);


        console.log(formData)

        const response = await fetch('/massDelete', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({"ids" : formData.getAll("ids[]")})
        });

        const result = await response.json();

        if (result.success) {
            console.log("ennnn")
            // Redirect to the home route
            window.location.href = '/';
        } else {
            // Handle the failure case
            console.error(result.message);
            alert('Failed to create product: ' + result.message);
        }
    } catch (error) {
        console.error('Error:', error);
        alert('An error occurred while creating the product.');
    }
}
