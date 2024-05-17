
import Swal from "sweetalert2";

export default {
    methods: {
        fireSwal(title, type){
           return Swal.fire({
                title: title,
                text: "",
                icon: "success"
              });
              
        }
    }
}