import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])
const deleteButtons = document.querySelectorAll(".btn-danger");

/* event listener legato al bottone rosso "Elimina", non al bottone interno della modale */
deleteButtons.forEach((button) => {
    button.addEventListener("click", function(){
        let id = button.getAttribute("data-id");
        let type = button.getAttribute("data-type")
        let url = `${window.location.origin}/${type}/${id}`;
      
        let form_delete = document.getElementById("form_delete");
        
        form_delete.setAttribute("action", url)
    });

});

