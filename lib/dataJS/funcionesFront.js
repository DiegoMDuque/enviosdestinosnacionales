export class Front{
    addFailInputById(id, msg){
        $('#'+id).addClass('error');
        $('#'+id).after('<span id="fv-'+id+'-error" class="invalid">'+msg+'.</span>');
    }
    KeyUpRemoveErrorById(id){
        $('#'+id).removeClass('error')
        $('#fv-'+id+'-error').remove()
    }
    RemoveErrorInputByForm(form, funcion){

        $(form).find(':input').each(function(){
            funcion($(this).attr('id'))
        })
    }
    Swal(val = {}, funcion){
        var Param = {'icon': '', 'timer': 2500, 'reload': false, allowOutsideClick: false, showConfirmButton: false}

        Object.keys(val).forEach((element)=> {
           var key    = element
           var value  = val[element]
           Param[key] = value
        });
        
        Swal.fire(Param).then((result) =>{
            if(funcion){
                funcion(result)
            }
        })
    }
}