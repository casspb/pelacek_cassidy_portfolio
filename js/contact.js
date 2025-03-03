(() => {
    const form = document.querySelector('.contact-form');
    const feedBack = document.querySelector('.feedback');
    
    function regForm(event){
        event.preventDefault(); 

        const thisform = event.currentTarget;
        const url = "send_mail.php";
        const formdata = `lname=${thisform.elements.lname.value}&fname=${thisform.elements.fname.value}&email=${thisform.elements.email.value}&message=${thisform.elements.message.value}`;
        
        fetch(url, {
            method: "POST",
            headers: {
                "Content-Type":"application/x-www-form-urlencoded"
            },
            body: formdata
        })
        .then(response => response.json())
        .then(response => {
            console.log(response);
            feedBack.innerHTML = "";
            if(response.errors) {
                response.errors.forEach(error => {
                    const errorElement = document.createElement("p");
                    errorElement.textContent = error;
                    feedBack.appendChild(errorElement);
                })

            }

            else {
                form.reset();
                const messageElement = document.createElement("p");
                messageElement.textContent = response.message;
                feedBack.appendChild(messageElement);
            }
          
            feedBack.scrollIntoView({behavior: 'smooth', block: 'end'})
        }) 
        .catch(error => {
            console.log(error);
            const errorMessage = document.createElement("p");
            errorMessage.textcontent = "oopsie not working cause of a browser or internet issue";
            feedBack.appendChild(errorMessage);
        });
    }

    form.addEventListener("submit", regForm);

	
})();
