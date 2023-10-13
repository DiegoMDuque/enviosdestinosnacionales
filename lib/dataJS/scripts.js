import {funct} from '../dataJS/function.js?v=1.2';
import {Front} from '../dataJS/funcionesFront.js?v=1.1';
function deletePackByAdd(element){
    element.remove()
}
var Function = new funct;
var front    = new Front
$('.nk-menu-trigger').click(function(){
   // console.log(this)
    if($('.nk-nav-compact', this).hasClass('compact-active')){
        localStorage.setItem('sidebar-compact', 'true')
    }else{
        localStorage.setItem('sidebar-compact', 'false')
    }
})
if(localStorage.getItem('sidebar-compact') == 'true'){
    $('.nk-sidebar').addClass('is-compact')
    $('.nk-nav-compact').addClass('compact-active')
}
$('.input-type-peso').each(function(){
    $(this).keypress(function(e){
        $(this).keypress(function(e){
            var ExpRegSoloNumeros = /^[0-9]+$/
            if(!e.key.match(ExpRegSoloNumeros)){
                e.preventDefault()
            }
        })
    })
})
$('.delete-customer-tabla').each(function(){
    $(this).click(function(){

        var data = {
            id_customer: $(this).attr('data')
        }
        
        front.Swal({
            timer: 0,
            showCancelButton: true,
            showConfirmButton: true,
            confirmButtonText: 'SI',
            cancelButtonText: 'NO',
            
            title: '¿Quieres Eliminar este cliente?',

        }, function(_response){
            if(_response.isConfirmed){
                Function.ajax({
                    url: 'deleteCustomer',
                    data: data,
                }, function(){
                    front.Swal({
                        icon: 'success',
                        title: 'Se eliminó cliente',
                    }, function(_response){
                        location.reload()
                    })
                })
            }
        })
    })
})
$('.cancel-shipments').click(function(){
    var guia = $(this).attr('data-guia');
    front.Swal({
        title: '¿Quieres cancelar la guía '+guia+' ? ',
        timer: 0,
        showConfirmButton: true,
        showCancelButton: true,
        confirmButtonText: 'SI',
        cancelButtonText: 'NO',
    }, function(_response){
        if(_response.isConfirmed){
            Function.ajax({
                url: 'ChangeStatuShipments',
                data: {guia: guia, status: 3},
            }, function (){
                front.Swal({
                    icon: 'success',
                    title: 'Se canceló la guía ' + guia
                }, function(){
                    window.location.reload();
                })
            })
        }
    })
        
})
$(document).ready(function () {
    Function.ventasdiasrias({
        desde: $('#sale-date-desde').val(),
        hasta: $('#sale-date-hasta').val(),
        sede:  $('#sede').val()
    });
    $('.reportes').each(function(e){
        var element = this
        Function.ShartFunction(this);
        Function.ChangeElement(
            {
                element: this,
                config: { attributeFilter: [ "data-day", "data-type", "data-asesor", "data-sede" ],},
                function: function(_response){
                    setTimeout(function(){
                        var obj = {
                            guias_date:   $('#guias').attr('data-day'),
                            guias_sede:   $('#guias').attr('data-sede'),
                            guias_asesor: $('#guias').attr('data-asesor'),

                            recaudo_date:   $('#recaudo').attr('data-day'),
                            recaudo_sede:   $('#recaudo').attr('data-sede'),
                            recaudo_asesor: $('#recaudo').attr('data-asesor'),
                        }
                        var shearch = Function.objToSearch(obj)
                        var url  = window.location.href.split('?')
                        var hash = '#' + element.id
                        console.log(hash)
                        window.location.href = url[0] + '?' + shearch + hash
                    }, 4)
                    
                }
            }
        )
    })

    $('.change-password').click(function(){
        front.Swal({
            title: 'Cambiar contraseña',
            timer: 0,
            showConfirmButton: true,
            showCancelButton: true,
            confirmButtonText: 'Cambiar contraseña',
            cancelButtonText: 'Cancelar',
            input: 'password',
            inputAttributes: {
                autocapitalize: 'off',
                placeholder: 'Nueva contraseña',
                class: 'form-control',
                name: 'new_password',
                id: 'new_password',
            },
        }, function(_response){
            console.log(_response)
            if(_response.isConfirmed){
                if(Boolean(_response.value)){
                    Function.ajax({
                        url: 'ChangePassword',
                        data: {new_password: _response.value}
                    }, function(_response){
                        if(_response.success){
                            Function.hidenLoader()
                            front.Swal({
                                icon: 'success',
                                title: 'Se cambio contraseña correctamente '
                            })
                        }
                    })
                }else{
                    alert('Nueva contraseña está en blanco intente de nuevo')
                }
            }
        })
    })
    $('.change-password-admin').click(function(){
        var urlOBJ = window.location.href.split('/')
        var id = urlOBJ[urlOBJ.length - 1]
        console.log(id)
        front.Swal({
            title: 'Cambiar contraseña',
            timer: 0,
            showConfirmButton: true,
            showCancelButton: true,
            confirmButtonText: 'Cambiar contraseña',
            cancelButtonText: 'Cancelar',
            input: 'password',
            inputAttributes: {
                autocapitalize: 'off',
                placeholder: 'Nueva contraseña',
                class: 'form-control',
                name: 'new_password',
                id: 'new_password',
            },
        }, function(_response){
            console.log(_response)
            if(_response.isConfirmed){
                if(Boolean(_response.value)){
                    Function.ajax({
                        url: 'ChangePassword',
                        data: {new_password: _response.value, id_user: id}
                    }, function(_response){
                        if(_response.success){
                            Function.hidenLoader()
                            front.Swal({
                                icon: 'success',
                                title: 'Se cambio contraseña correctamente '
                            })
                        }
                    })
                }else{
                    alert('Nueva contraseña está en blanco intente de nuevo')
                }
            }
        })
    })
    
    $('.cancel-dispatched').click(function(){
        var dispatched = $(this).attr('data-dispatched');
        front.Swal({
            title: '¿Quieres cancelar el despacho ' + dispatched+' ? ',
            timer: 0,
            showConfirmButton: true,
            showCancelButton: true,
            confirmButtonText: 'SI',
            cancelButtonText: 'NO',
        }, function(_response){
            if(_response.isConfirmed){
                Function.ajax({
                    url: 'cancelDispatched',
                    data: {id: dispatched, status: 2},
                }, function (){
                    front.Swal({
                        icon: 'success',
                        title: 'Se canceló despacho ' + dispatched
                    }, function(){
                        window.location.reload();
                    })
                })
            }
        })
            
    })

    //standar
    $(document).find(':input').each(function(){
        $(this).keyup(() => {
            front.KeyUpRemoveErrorById(this.id)
        })
    })
    $(document).find('form').each(function(){
        $(this).change(function(){
            $(this).find(':submit').each(function(){
                $(this).removeAttr('disabled');
            })
        })
    })
    $('.gen-pass').each(function(){
        $(this).click(function(){
            Function.genPassword($(this).attr('data'))
        })
    })
    $('.phone-select').each(function(){
        $(this).keypress(function(e){
            var ExpRegSoloNumeros = /^[0-9+-]+$/
            if(!e.key.match(ExpRegSoloNumeros)){
                e.preventDefault()
            }
        })
        var input = this
        var iti = intlTelInput(input, {
            utilsScript: "assets/js/utils.js",
        });

        $(this).blur(function(){
            $(this).val(iti.getNumber())
        })
    })
    $('.formato-peso').each(function(){
        $(this).keypress(function(e){
            var ExpRegSoloNumeros = /^[0-9]+$/
            if(!e.key.match(ExpRegSoloNumeros)){
                e.preventDefault()
            }
        })
        $(this).blur(function(e){
            var value = $(this).val()
            value = value.replace('NaM', '')
            value = value.replace('$', '')
            value = value.replace(' ', '')
            value = value.replace(/\./g, '')
            value = value.replace(',', '.')
            value = Function.FormatPesosColombianos(value);
            $(this).val(value)
            
        })
        
        /*
        $(this).keyup(function(){
            Function.FormatoPesosColombianos($(this));
        })
        $(this).blur(function(){
            Function.FormatoPesosColombianos($(this), "blur");
        })
        */

    })
    
    //login
    $('#formLogin').on('submit', function (e) {
        e.preventDefault()
        Function.Login(this)
        
    });

    //HomePage
    //Shart
    $('.shart-envio-for-user').each(function(){
        
        $(this).find('canvas').each(function(){
            const myChart = new Chart($('#shart'), {
                type: 'line',
                data: {
                    labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                    datasets: [{
                        data: [12, 19, 3, 5, 2, 3],
                        backgroundColor: '#8094ae42',
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }],
                },
                options: {
                    plugins: {
                        legend: {
                            display: true,
                            labels: {
                                color: 'rgb(255, 99, 132)'
                            }
                        }
                    }
                }
            });
        })
    })

    //user
    $('#user-avatar-form').each(function(){
        $(this).click(function(){
            Function.UpdateImgAvatar($(this).attr('data'))
        })
    })
    $('#avatar').change(function(){
        Function.viewAvatatForm(this, $(this).attr('data'))
    })
    $('#addNewUser').on('submit', function (e) {
        e.preventDefault()
        Function.addNewUser(this)
    });
    $('#editUser').on('submit', function (e) {
        e.preventDefault()
        Function.ajaxFile('editUser', this, Function.editUserComplete);
    });
    // end user

    //Customer
    $('.btn-dropdown-edit-sede').each(function(){
        $(this).click(function(){
            var ModalID = '#editSede'
            var id_sede = $(this).attr('sede')
            var _Sede = {};
            $('#data-sede-' + id_sede).find('td').each(function(){
                var key     = $(this).attr('key')
                var value   = $(this).attr('data')
                var type    = $(this).attr('type-inp')
                _Sede[key]  = {'type': type, 'val': value};
            })
            _Sede['code'] = {type: '', val: id_sede}
            Object.keys(_Sede).forEach((key) =>{
                Function.editSedeModal(key, _Sede[key]);
            })
            console.log(_Sede)
            $(ModalID).modal('show')
        })
    })
    $('#FormEditSedeModal').on('submit', function(e){
        e.preventDefault()
        Function.editSede(this)
    })
    $('#FormAddSedeModal').on('submit', function(e){
        e.preventDefault()
        if(Boolean($('#code_new').val())){
            $('#addSede').modal('hide')
            Function.ajax({
                url: 'addSede',
                data: $(this).serialize(),
            }, function(_response){
                Function.hidenLoader();
                front.Swal({
                    icon: 'success',
                    title: 'Se agregó la Sede',
                }, function(){
                    location.reload()
                })
            })
        }else{
            Select2Erro('code');
        }
    })
    $('.btn-delete-sede-tabla').each(function(){
        $(this).click(function(){
            var id_sede = $(this).attr('data')
            front.Swal({
                timer: 0,
                showCancelButton: true,
                showConfirmButton: true,
                confirmButtonText: 'SI',
                cancelButtonText: 'NO',
                
                title: '¿Quieres Eliminar esta Sede?',

            }, function(_response){
                if(_response.isConfirmed){
                    Function.ajax(
                        {
                           data: {id_sede: id_sede},
                           url:  'deleteSede'
                        }, function(){
                            front.Swal({
                                icon: 'success',
                                title: 'Se eliminó la Sede',
                            }, function(){
                                location.reload()
                            })
                        }
                    )
                }
            })
        })
    })
    $('#addCustomer').on('submit', function (e) {
        e.preventDefault()
        Function.addNewCustomer(this)
    });
    
    $('#editCustomer').on('submit', function (e) {
        e.preventDefault()
        Function.editCustomer(this)
    });

    //envios
    $('.volumen-input-type').each(function(){
        $(this).keypress(function(e){
            var ExpRegSoloNumeros = /^[0-9,.]+$/
            if(!e.key.match(ExpRegSoloNumeros)){
                e.preventDefault()
            }
        })
    })
    $('.select2Service').each(function(){
        var placeholder = $(this).attr('placeholder')
        var typeService = $(this).attr('type-service')
        Function.mySelect2(
            {
                select: this,
                placeholder: placeholder,
                multiple: true,
                ajax: {
                    url: Function.RequestAjax('list/getService'),
                    dataType: 'json',
                    type: 'POST',
                    data: function (params, a) {
                        var data = {
                            type: typeService,
                            text: params.term, // search term
                            page: params.page
                        };
                        return data;
                    },
                }
            }
        )
    })

    $('.active-serives').each(function(){
        var option = {option: { duration: 400, easing: 'swing' }}
        $(this).change(function(){
            var form = $(this).attr('data')
            if($(this).is(':checked')){
                $(form).show(option)
            }else{
                $(form).hide(option)
            }
        })
    })

    $('#shop_service').change(function(){
        var form = $(this).attr('data')
        if($(this).is(':checked')){
            $(form).show({
                option: {
                    duration: 400,
                    easing: 'swing'
                }
            })
        }else{
            $(form).hide({
                option: {
                    duration: 400,
                    easing: 'swing'
                }
            })
        }
    })


    //Filtro de envios
    $('.dateTimer-filt').each(function(){
        Function.dateInputForm(
            {
                input: this,
                dateFormat: 'yyyy-mm-dd'
            }
        );
    })
    $('#sale-date').datepicker({
        format: 'dd/mm/yyyy',
        autoclose: true,
    })
    $('.class-sale-date').each(function(){
        $(this).change(function(){
            var valores = {
                desde: $('#sale-date-desde').val(),
                hasta: $('#sale-date-hasta').val(),
                sede:  $('#sede').val()
            }
            Function.loaderVentasDiasrias()
            Function.ventasdiasrias(valores)
        })
    })
    
    $('.filt-select2-asesor').each(function(){
        Function.mySelect2({
            select: this,
            placeholder: 'Asesor',
            dropdownParent: $('#filterShippingModal .modal-body'),
            ajax: {
              url: Function.RequestAjax('list/getAsesores'),
              dataType: 'json',
              type: 'POST',
              data: function (params) {
                return {
                  text: params.term, // search term
                  page: params.page
                };
              },
            }
        })
    })
    $('.filt-select2-sedes').each(function(){
        Function.mySelect2({
            select: this,
            placeholder: 'Sedes',
            dropdownParent: $('#filterShippingModal .modal-body'),
            ajax: {
              url: Function.RequestAjax('list/getSedes'),
              dataType: 'json',
              type: 'POST',
              data: function (params) {
                return {
                  text: params.term, // search term
                  page: params.page
                };
              },
            }
        })
    })
    $('#formFilterShippingModal').on('submit', function(e){
        e.preventDefault();

        var filter = {dateStart: '', dateEnd: '', asesor: '%', sede: '%'};

        var inputDateEnd   = $('#date_end').val()

        if(!$('#date_start').val() == ''){
            filter['dateStart'] = $('#date_start').val()
        }
        if(!$('#date_end').val() == ''){
            filter['dateEnd'] = $('#date_end').val()
        }

        if(Boolean($('#filt_asesor').val())){
            filter['asesor'] = $('#filt_asesor').val()
        }
        if(Boolean($('#filt_asesor').val())){
            filter['asesor'] = $('#filt_asesor').val()
        }
        if(Boolean($('#filt_sede').val())){
            filter['sede'] = $('#filt_sede').val()
        }
        
        location.replace('?filter=1&dateStart=' + filter.dateStart + '&dateEnd=' + filter.dateEnd + '&asesor=' + filter.asesor + '&sede=' + filter.sede)

        //console.log(10);
    })
    //envios tabla
    $('#print-guias-list').click(function(){
        var guias =  $(this).attr('result-json')
        Function.ajax({
            url:  'ExportGuias',
            data: {'text': guias}
        }, function(_response){
            Function.hidenLoader()

            window.open('ExportGuias/' + _response.id, '_blank');
        })
    })
    
    //Add Envio
    $('.dniGetInfomation').each(function(){
        $(this).blur(function(){
            var name = $(this).attr('inset-name')
            var phone = $(this).attr('inset-phone');
            Function.ajax({
                url: 'list/getCustomerByDNI',
                data: {dni: this.value}
            }, function(_response){
                Function.hidenLoader();
                if(_response.customer){
                    $(name).val(_response.customer.name)
                    $(phone).val(_response.customer.phone)
                }
            })
        })
    })
    $('.select2-city').each(function(){
        var placeholder = $(this).attr('placeholder')
        Function.mySelect2(
            {
                select: this,
                placeholder: placeholder,
                ajax: {
                    url: Function.RequestAjax('list/getCity'),
                    dataType: 'json',
                    type: 'POST',
                    data: function (params) {
                      return {
                        text: params.term, // search term
                        page: params.page
                      };
                    },
                }
            }
        )
    })
    $('.select2-embalaje').each(function(){
        var placeholder = $(this).attr('placeholder')
        Function.mySelect2(
            {
                select: this,
                placeholder: placeholder,
                ajax: {
                    url: Function.RequestAjax('list/getPackaging'),
                    dataType: 'json',
                    type: 'POST',
                    data: function (params) {
                      return {
                        text: params.term, // search term
                        page: params.page
                      };
                    },
                }
            }
        )
    })
    $('.select2EmpresaDeMensajería').each(function(){
        var placeholder = $(this).attr('placeholder')
        Function.mySelect2(
            {
                select: this,
                placeholder: placeholder,
                ajax: {
                    url: Function.RequestAjax('list/getCurierSelect2'),
                    dataType: 'json',
                    type: 'POST',
                    data: function (params) {
                      return {
                        text: params.term, // search term
                        page: params.page
                      };
                    },
                }
            }
        )
    })
    $('#formAddNewPackaging').on('submit', function(e){
        e.preventDefault()
        var _form = $(this)
        Function.ajax({
            url: 'addNewPackaging',
            data: $(this).serialize(),
        }, function(_response){
            front.RemoveErrorInputByForm(_form, front.KeyUpRemoveErrorById);
            if(_response.error){
                front.Swal({
                    icon: 'error',
                    title: 'Verifique todos los campos',
                    showConfirmButton: true,
                    
                }, function(){
                    setTimeout(function(){
                       $('#' + _response.error[0].key).focus() 
                    }, 500);
                    
                })
                $(_response.error).each(function(){
                    if(this.key == 'phone_sender' || this.key == 'phone_receiver' || this.key == 'destino'){

                        if(this.key == 'phone_sender' || this.key == 'phone_receiver'){
                            $('#' + this.key).addClass('error')
                        }
                        
                    }else{
                        front.addFailInputById(this.key, this.msg)
                    }
                    
                })
            }
            if(_response.success){
                front.Swal({
                    imageUrl: 'assets/img/success.gif',
                    title: 'Se agregó envío correctamente',
                    imageWidth: 157,
                }, function(){
                    window.location.href = 'ver_guia/' + _response.id;
                })
            }
        })
    })
    $('#formAddNewPackaging').change(function(){

        var datos = Function.calculatarTotal();

        $('#total_manejo').val(Function.FormatPesosColombianos(datos.majeno))
        $('#total_servicios').val(Function.FormatPesosColombianos(datos.servicios))
        $('#total_costo_envio').val(Function.FormatPesosColombianos(datos.envio))
        $('#total_subtotal').val(Function.FormatPesosColombianos(datos.subtotal))
        $('#total_descuento').val(Function.FormatPesosColombianos(datos.descuentos))
        $('#total_rtfuente').val(Function.FormatPesosColombianos(datos.RTFuente))
        $('#total_iva').val(Function.FormatPesosColombianos(datos.iva))
        $('#total_total').val(Function.FormatPesosColombianos(datos.total))

    })
    $('#addSectionPack').click(function(e){
        let random = Math.random();
        random = random * 100 + 1;
        random = Math.trunc(random);
        $('#areas_pack').append(
            '<tr id="areapack_'+random+'" class="pack-volumen-element" data-volumen-element="'+random+'" >'+
                '<td class="col-4" ><div class="m-2 p-1 bg-gray-100"><input class="form-control volumen-input-type valumen-high"   name="high[]"   id="high-'+random+'" value="0" ></div></td>'+
                '<td class="col-4" ><div class="m-2 p-1 bg-gray-100"><input class="form-control volumen-input-type volumen-width"  name="width[]"  id="width-'+random+'" value="0" ></div></td>'+
                '<td class="col-4" ><div class="m-2 p-1 bg-gray-100"><input class="form-control volumen-input-type volumen-length" name="length[]" id="length-'+random+'" value="0" ></div></td>'+
                '<td><em class="pointer-on text-danger icon fa-solid fa-trash-can delete-section-pack" data-section-pack1="#areapack_'+random+'"></em></td>'+
            '</tr>'
        );
        $('.volumen-input-type').each(function(){
            $(this).keypress(function(e){
                var ExpRegSoloNumeros = /^[0-9,.]+$/
                if(!e.key.match(ExpRegSoloNumeros)){
                    e.preventDefault()
                }
            })
        })
        $('.delete-section-pack').each(function(){
            $(this).click(function(){
                var section = $(this).attr('data-section-pack1')
                console.log(section)
                $(section).remove()

                var datos = Function.calculatarTotal();

                $('#total_manejo').val(Function.FormatPesosColombianos(datos.majeno))
                $('#total_servicios').val(Function.FormatPesosColombianos(datos.servicios))
                $('#total_costo_envio').val(Function.FormatPesosColombianos(datos.envio))
                $('#total_subtotal').val(Function.FormatPesosColombianos(datos.subtotal))
                $('#total_descuento').val(Function.FormatPesosColombianos(datos.descuentos))
                $('#total_rtfuente').val(Function.FormatPesosColombianos(datos.RTFuente))
                $('#total_iva').val(Function.FormatPesosColombianos(datos.iva))
                $('#total_total').val(Function.FormatPesosColombianos(datos.total))
            })
        })
    })
    //calculadora
    $('#calculadora').change(function(){
         
        setTimeout(function(){
            var datos = Function.calculatarTotal();

            $('#total_manejo').val(Function.FormatPesosColombianos(datos.majeno))
            $('#total_servicios').val(Function.FormatPesosColombianos(datos.servicios))
            $('#total_costo_envio').val(Function.FormatPesosColombianos(datos.envio))
            $('#total_subtotal').val(Function.FormatPesosColombianos(datos.subtotal))
            $('#total_descuento').val(Function.FormatPesosColombianos(datos.descuentos))
            $('#total_rtfuente').val(Function.FormatPesosColombianos(datos.RTFuente))
            $('#total_iva').val(Function.FormatPesosColombianos(datos.iva))
            $('#total_total').val(Function.FormatPesosColombianos(datos.total))
        }, 1) 
    })
    $('#calculadora').on('submit',function(e){
        e.preventDefault();
        
        var pick_up_service = '';
        var shop_service = '';

        var shop_service_select = '';
        var pick_up_service_select = '';

        if($('#pick_up_service').is(':checked')){
            var pick_up_service = '&pick_up_service=true';
            $('#select_pick_up_service').find('option').each(function(){
            if($(this).is(':selected')){
                pick_up_service_select =  pick_up_service_select + '&pick_up_service_select=' + this.value;
            }
        })
        }
        if($('#shop_service').is(':checked')){
            var shop_service = '&shop_service=true';
            $('#select_shopping_service').find('option').each(function(){
                if($(this).is(':selected')){
                    shop_service_select =  shop_service_select + '&shop_service_select=' + this.value;
                }
            })
        }
        
        

        location.replace('addEnvio?calculadora=' + true +

        '&valorDeclarado=' + $('#valor_declarado').val() +
        '&weight=' + $('#weight').val() +
        '&high=' + $('#high').val() +
        '&width=' + $('#width').val() +
        '&length=' + $('#length').val() +  
        pick_up_service + 
        shop_service +
        pick_up_service_select +
        shop_service_select

        );
    })
    //general Config
    Function.tabSettings();

    $('#generalConfig').on('submit', function(e){
        e.preventDefault()
        var data = $(this).serialize()
        Function.ajax(
            {
                url: 'updateGeneralConfig',
                data: data
            },
            function(_response){
                Function.hidenLoader()
                front.Swal(
                    {
                        icon: 'success',
                        title: 'Se actualizó correctamente las configuraciones generales'
                    }, function(_response){
                        location.reload()
                })
        })
    })
    //ciudades
    $('.switch-admin-city').each(function(){
        $(this).change(function(){
            var data = {}

            data['city'] = $(this).attr('city')
            data['row']  = $(this).attr('row')

            if($(this).is(':checked')){
                data['val']  =  1
            }else{
                data['val']  =  0
            }
            Function.ajax(
                {
                    url: 'editCity',
                    data: data
                },function(){
                    Function.hidenLoader()
                })
        })
    })

    $('.btn-delete-city').each(function(){
        $(this).click(function(){
            var city_id = $(this).attr('data')
            front.Swal({
                timer: 0,
                title: '¿Quieres eliminar esta ciudad?',
                showConfirmButton: true,
                showCancelButton: true,
                confirmButtonText: 'SI',
                cancelButtonText: 'NO',
            }, function(_response){
                if(_response.isConfirmed){
                    Function.ajax(
                        {
                            url: 'deleteCity',
                            data: {city_id: city_id}
                        }, function(){
                            Function.hidenLoader()
                            $('#tr-city-' + city_id).hide('slow')
                        }
                    )
                }
            })
        })
    })
    $('#FormAddCityModal').on('submit', function(e){
        e.preventDefault()
        Function.ajax({
            url: 'addCity',
            data: $(this).serialize()
        }, function(){
            front.Swal({
                icon: 'success',
                title: 'Se agregó la ciudad correctamente'
            }, function(){
                location.reload()
            })
        })
    })

    //typePack
    $('.switch-admin-typePack').each(function(){
        $(this).change(function(){
            var data = {}

            data['id_type_pack'] = $(this).attr('data')

            if($(this).is(':checked')){
                data['val']  =  1
            }else{
                data['val']  =  0
            }
            Function.ajax(
                {
                    url: 'editTypePack',
                    data: data
                },function(){
                    Function.hidenLoader()
                })
        })
    })
    $('.btn-delete-typepack').each(function(){
        $(this).click(function(){
            var city_id = $(this).attr('data')
            front.Swal({
                timer: 0,
                title: '¿Quieres eliminar este tipo de paquete?',
                showConfirmButton: true,
                showCancelButton: true,
                confirmButtonText: 'SI',
                cancelButtonText: 'NO',
            }, function(_response){
                if(_response.isConfirmed){
                    Function.ajax(
                        {
                            url: 'deleteTypePack',
                            data: {type_pack_id: city_id}
                        }, function(){
                            Function.hidenLoader()
                            $('#tr-type-pack-' + city_id).hide('slow')
                        }
                    )
                }
            })
        })
    })
    $('#FormAddTypePackModal').on('submit', function(e){
        e.preventDefault()
        Function.ajax({
            url: 'addTipePack',
            data: $(this).serialize()
        }, function(){
            front.Swal({
                icon: 'success',
                title: 'Se agregó tipo de embalaje correctamente'
            }, function(){
                location.reload()
            })
        })
    })

    //descuentos
    $('.switch-admin-descuento').each(function(){
        $(this).change(function(){
            var data = {}

            data['id_descuento'] = $(this).attr('data')

            if($(this).is(':checked')){
                data['val']  =  1
            }else{
                data['val']  =  0
            }
            Function.ajax(
                {
                    url: 'editStatusDescuento',
                    data: data
                },function(){
                    Function.hidenLoader()
                })
        })
    })
    $('.btn-delete-descuento').each(function(){
        $(this).click(function(){
            var id = $(this).attr('data')
            front.Swal({
                timer: 0,
                title: '¿Quieres eliminar este descuento?',
                showConfirmButton: true,
                showCancelButton: true,
                confirmButtonText: 'SI',
                cancelButtonText: 'NO',
            }, function(_response){
                if(_response.isConfirmed){
                    Function.ajax(
                        {
                            url: 'deleteDescuento',
                            data: {descuento_id: id}
                        }, function(){
                            Function.hidenLoader()
                            $('#tr-descuento-' + id).hide('slow')
                        }
                    )
                }
            })
        })
    })
    $('#FormAddDescuentoModal').on('submit', function(e){
        e.preventDefault()
        $('#addDescuentoModal').modal('hide')
        Function.ajax({
            url: 'addDescuento',
            data: $(this).serialize()
        }, function(){
            front.Swal({
                icon: 'success',
                title: 'Se agregó descuento correctamente'
            }, function(){
                location.reload()
            })
        })
    })

    //convenios
    $('.switch-status-convenio').each(function(){
        $(this).change(function(){
            var data = {}

            data['id_convenio'] = $(this).attr('data')

            if($(this).is(':checked')){
                data['val']  =  1
            }else{
                data['val']  =  0
            }
            Function.ajax(
                {
                    url: 'editConvenio',
                    data: data
                },function(){
                    Function.hidenLoader()
                })
        })
    })
    $('.btn-delete-convenio').each(function(){
        $(this).click(function(){
            var id = $(this).attr('data')
            front.Swal({
                timer: 0,
                title: '¿Quieres eliminar este Convenio?',
                showConfirmButton: true,
                showCancelButton: true,
                confirmButtonText: 'SI',
                cancelButtonText: 'NO',
            }, function(_response){
                if(_response.isConfirmed){
                    Function.ajax(
                        {
                            url: 'deleteConvenio',
                            data: {convenio_id: id}
                        }, function(){
                            Function.hidenLoader()
                            $('#tr-convenio-' + id).hide('slow')
                        }
                    )
                }
            })
        })
    })
    $('#FormAddConvenioModal').on('submit', function(e){
        e.preventDefault()
        $('#addDescuentoModal').modal('hide')
        Function.ajax({
            url: 'addConvenio',
            data: $(this).serialize()
        }, function(){
            front.Swal({
                icon: 'success',
                title: 'Se agregó convenio correctamente'
            }, function(){
                location.reload()
            })
        })
    })

    //shop services
    $('.switch-status-service').each(function(){
        $(this).change(function(){
            var data = {}

            data['id']   = $(this).attr('data')
            data['type'] = $(this).attr('type_services')

            if($(this).is(':checked')){
                data['val']  =  1
            }else{
                data['val']  =  0
            }
            Function.ajax(
                {
                    url: 'editServices',
                    data: data
                },function(){
                    Function.hidenLoader()
                })
        })
    })
    $('.btn-delete-services').each(function(){
        $(this).click(function(){
            var id = $(this).attr('data')
            var type = $(this).attr('type-services')
            front.Swal({
                timer: 0,
                title: '¿Quieres eliminar este Servicio?',
                showConfirmButton: true,
                showCancelButton: true,
                confirmButtonText: 'SI',
                cancelButtonText: 'NO',
            }, function(_response){
                if(_response.isConfirmed){
                    Function.ajax(
                        {
                            url: 'deleteService',
                            data: {id: id, type: type}
                        }, function(){
                            Function.hidenLoader()
                            $('#tr-'+type+'-' + id).hide('slow')
                        }
                    )
                }
            })
        })
    })
    $('#FormAdd-pick_up_service-Modal').on('submit', function(e){
        e.preventDefault()
        $('#addServiceModalModal').modal('hide')
        Function.ajax({
            url: 'addServices',
            data: $(this).serialize()
        }, function(){
            front.Swal({
                icon: 'success',
                title: 'Se agregó servicio correctamente'
            }, function(){
                location.reload()
            })
        })
    })
    $('.FormAdd-service-Modal').each(function(){
        $(this).on('submit', function(e){
            e.preventDefault()
            $('#addServiceModalModal').modal('hide')
            Function.ajax({
                url: 'addServices',
                data: $(this).serialize()
            }, function(){
                front.Swal({
                    icon: 'success',
                    title: 'Se agregó servicio correctamente'
                }, function(){
                    location.reload()
                })
            })
        })
    })
    
    $('#InputBarcodeGuia').keyup(function (e) {
        var element = $(this)
        if(e.keyCode == 13){
            Function.ajax({
                data: {'code': $(this).val()},
                url: 'shipments',
            }, function (_response) {
                $(element).val('')
                if(_response.success){
                    Function.hidenLoader()
                    if(!$('#guia-' +_response.id).length > 0){
                        $('tbody').append(
                            '<tr id="guia-'+_response.id+'" >'+
                                '<td class="tb-col">'+_response.guia+'</td>'+
                                '<td class="tb-col-ip"><span class="sub-text">'+_response.origen+' / ' + _response.destino+ '</span></td>'+
                                '<td class="tb-col-time"><span class="sub-text">'+_response.remitente+' / ' + _response.destinatario+ '</span></td>'+
                                '<td class="tb-col-action ">'+
                                    '<a class="link-cross me-sm-n1 pointer-on" onclick="btnDeleteDispatched('+_response.id+')" ><em class="icon ni ni-cross"></em></a>'+
                                    '<input type="hidden" name="guia[]" value="'+_response.id+'" >'+
                                '</td>'+
                            '</tr>'
                                );
                            }
                            var count = $('tbody tr').length
                            if(count > 0) {
                                $('.btn-sunmit-form-add-dispatched').removeAttr('disabled')
                            }else{
                                $('.btn-sunmit-form-add-dispatched').attr('disabled', true)
                            }

                }else{
                    front.Swal({
                        icon: 'error',
                        timer: 0,
                        title: 'No se encontró guía',
                        showConfirmButton: true,
                    })
                }
            })
        }
    });
    $('#formAddDispatched').on('submit', function(e){
        e.preventDefault();
        Function.ajax({
            url: 'addDispatched',
            data: $(this).serialize()
        }, function(_response){
            Function.hidenLoader();
            if(_response.success){
                window.location.href = 'PrintDispatched/'+_response.success.id
            }
        })
    })
    $('.nav-item-date').each(function(){
        var element = $(this).attr('data-report')
        $(this).click(function(){
            $(document).find('.nav-link').each(function(){
                $(this).removeClass('active')
            })
            $(this).addClass('active')
            $(element).attr('data-day', $(this).attr('data-day'))
        })

        
    })
    $('.reportes-sedes').each(function(){
        var element = $(this).attr('data-report')
        $(this).click(function(){
            $(element).attr('data-sede', $(this).attr('data'))
        })
    })
    $('.reportes-asesor').each(function(){
        var element = $(this).attr('data-report')
        $(this).click(function(){
            $(element).attr('data-asesor', $(this).attr('data'))
        })
    })
    $('#show_arqueo').click(function(){
        Function.ajax(
            {
                url: 'getArqueo',
                data: true,

            }, function(_response){
                Function.hidenLoader()

                front.Swal(
                    {
                        title: _response.total,
                        timer: 0,
                        showConfirmButton: true,
                        confirmButtonText: 'Cerrar',

                    }
                )
            }
        )
    })
});