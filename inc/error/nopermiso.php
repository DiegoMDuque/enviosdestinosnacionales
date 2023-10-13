<?php

    Template::GetHeader();
    Template::GetFoot();
?>
<script>
    Swal.fire({
        showConfirmButton: false,
        allowOutsideClick: false,
        title: "No cuentas con permisos  apropiados",
        imageUrl: 'assets/img/denied.gif',
    })
    console.log(window.location)
</script>