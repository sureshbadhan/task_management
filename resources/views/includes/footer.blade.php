<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"> </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>

<script type="text/javascript">
setTimeout(() => {
let get = document.querySelector('.alert');
get.remove();
}, 4000);

$(document).ready(function () {
    $(".create_task").validate({
        rules: {
            name: {
                required: true
            },
            description: {
                required: true
            },
            priority: {
                required: true
            },
            assigned_to: {
                required: true
            },
            status: {
                required: true
            },
           
        },
       
    });
    $(".create_user").validate({
        rules: {
            name: {
                required: true
            },
            email:{
                required:true,
                email: true   
            },
            password:{
                required:true
            } 
        },
    });
    $(".edit_user").validate({
        rules: {
            name: {
                required: true
            },
            email:{
                required:true,
                email: true   
            }
        },
    });
});
</script>