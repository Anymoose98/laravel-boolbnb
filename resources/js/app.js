import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])
const deleteButtons = document.querySelectorAll(".btn-danger");


deleteButtons.forEach((button) => {
    button.addEventListener("click", function(){
        let id = button.getAttribute("data-id");
    
        let url = `${window.location.origin}/apartments/${id}`;
        console.log(url)

        let form_delete = document.getElementById("form_delete");

        form_delete.setAttribute("action", url)
        


    });

});
