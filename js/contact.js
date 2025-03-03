(() => {
    const form = document.querySelector('#contact-form');
    const feedBack = document.querySelector('#feedback');

    function regForm(event){
        event.preventDefault(); 
        console.log("is this working");

        const thisform = event.currentTarget;
        const url = "send_mail.php";
        const formdata = `lname=${thisform.querySelector('#lname').value}&fname=${thisform.querySelector('#fname').value}&email=${thisform.querySelector('#email').value}&message=${thisform.querySelector('#message').value}`;

        console.log(formdata); 

        fetch(url, {
            method: "POST",
            headers: {
                "Content-Type":"application/x-www-form-urlencoded"
            },
            body: formdata
        })
        .then(response => response.json())
        .then(response => {
            console.log(response); // Debugging - Check what response is returned
            feedBack.innerHTML = ""; // Clear previous feedback

            if(response.errors) {
                response.errors.forEach(error => {
                    const errorElement = document.createElement("p");
                    errorElement.textContent = error;
                    feedBack.appendChild(errorElement);
                });

            } else {
                form.reset();
                const messageElement = document.createElement("p");
                messageElement.textContent = response.message;
                feedBack.appendChild(messageElement);
            }

            feedBack.scrollIntoView({behavior: 'smooth', block: 'end'});
        }) 
        .catch(error => {
            console.log(error);
            const errorMessage = document.createElement("p");
            errorMessage.textContent = "Oopsie, something went wrong. Please try again later.";
            feedBack.appendChild(errorMessage);
        });
    }

    form.addEventListener("submit", regForm);

})();
