import { Front } from '../dataJS/funcionesFront.js';
import '../../assets/js/intl-tel-input.js';
function showLoader() {
    Swal.fire({
        background: "none",
        showConfirmButton: false,
        html: '<div class="spinner-grow text-primary" role="status"><span class="visually-hidden">Loading...</span></div>',
        allowOutsideClick: false,
    })
}
function valumenCalculo(){
    var total = 0
    $('.pack-volumen-element').each( function (){
        var element = $(this).attr('data-volumen-element')

        var alto  = Volumen('#high-' + element)
        var ancho = Volumen('#width-' + element)
        var largo = Volumen('#length-' + element)

        var t = (400 * (alto * ancho * largo))
        total = total + Number(t.toFixed(2))
        
    })
    return total;
}
function cutText(string, limit = 0){
    string = (string.length > limit) ? string.substring(0, limit) + '...' : string;

    return string;
}
function alertSwal(val = {}, funcion){
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
var front = new Front
export class funct {

    showLoader() {
        showLoader()
    }
    hidenLoader() {
        Swal.fire({
            background: 'none',
            showConfirmButton: false,
            allowOutsideClick: false,
            timer: 1,
        })
    }
    genPassword(data) {
        var chars = "0123456789abcdefghijklmnopqrstuvwxyz!@#$%^&*()ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        var passwordLength = 6;
        var password = "";
        for (var i = 0; i <= passwordLength; i++) {
            var randomNumber = Math.floor(Math.random() * chars.length);
            password += chars.substring(randomNumber, randomNumber + 1);
        }
        $('.passcode-switch').click()
        $(data).val(password)
    }
    objToSearch(obj){

        var myData = new Array();
        Object.keys(obj).forEach(function(index, num){
            var val = obj[index];

            var valor = index +'='+ val
            myData.push(valor)
        })

        var url = myData.join('&');
        console.log(url)
        return url
    }
    dateInputForm(Param = {}) {
        if (Param.input) {

            var Input = Param.input
            var element = Param

            $(Input).datepicker(element)
        }
    }
    mySelect2(Param = {}) {
        if (Param.select) {

            var select = Param.select
            var element = Param

            $(select).select2(element)
        }
    }
    UpdateImgAvatar(input) {
        $(input).click()
    }
    viewAvatatForm(data, element) {
        if (data.files && data.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $(element).html('<img src="' + e.target.result + '">');
            }
            reader.readAsDataURL(data.files[0]);
        }
    }
    RequestAjax(path) {
        return 'lib/ajax/' + path + '.ajax.php';
    }
    ajax(param = {}, success, error, beforeSend) {

        if (param.url && param.data) {
            param['url'] = this.RequestAjax(param.url)
            var ajaxParam = {
                method: 'POST',
                dataType: 'json',
                beforeSend: function(){
                    if(beforeSend instanceof Function){
                        beforeSend()
                    }else{
                        showLoader()
                    }
                },
                success: (_response) => {
                    success(_response)
                }
            }

            Object.keys(param).forEach((element) => {
                var key = element
                var value = param[element]
                ajaxParam[key] = value
            });

            $.ajax(ajaxParam)
        }else{
            alert()
        }
    }
    ajaxFile(url, data, funcion) {

        front.RemoveErrorInputByForm(data, front.KeyUpRemoveErrorById);
        const Funct = this

        $.ajax({
            url: Funct.RequestAjax(url),
            method: 'POST',
            dataType: 'json',
            data: new FormData(data),
            cache: false,
            processData: false,
            contentType: false,
            beforeSent: this.showLoader(),
            success: (_response) => {
                Funct.hidenLoader()
                funcion(_response)
            }
        })
    }
    Login(form) {
        var data = $(form).serialize()
        this.ajax(
            {
                data: data,
                url: 'Login'
            }, this.LoginSuccess)
    }
    LoginSuccess(_response) {
        if (_response.fail) {
            _response.fail.forEach((fail) => {
                front.addFailInputById(fail.key, fail.msg)
            })
        } else if ((_response.login_fail)) {
            front.Swal({
                'icon': _response.login_fail.icon,
                'title': _response.login_fail.msg,
                'showConfirmButton': false,
                'timerProgressBar': true,
            })
        } else if (_response.hello_user) {
            location.reload()
        }
    }
    tabSettings(){
        const url = window.location.href.replace(window.location.hash, '')
        const hash = window.location.hash
        if(url.match('settings')){
            $('.nav-link').each(function(){
                $(this).click(function(){
                    var hash = $(this).attr('href')
                    location.replace(url + hash)
                })
            })
            if(Boolean(window.location.hash)){
                $('.nav-link').each(function(){
                    $(this).removeClass('active')
                    if(hash == $(this).attr('href')){
                        $(this).addClass('active');
                        console.log();
                    }
                });
            }
            if(Boolean(window.location.hash)){
                $('.tab-pane').each(function(){
                    $(this).removeClass('active')
                    if(hash.replace('#', '') == $(this).attr('id')){
                        $(this).addClass('active');
                        console.log();
                    }
                });
            }
        }
    }

    addNewUser(form) {
        this.ajax({
            data: new FormData(form),
            url: 'addnewuser',
            cache: false,
            processData: false,
            contentType: false,

        }, function (_response) {
            hidenLoader()
            if (_response.error) {
                _response.error.forEach((error) => {
                    front.addFailInputById(error.key, error.msg);
                })
            }
            if (_response.success) {
                front.Swal({
                    'icon': 'success',
                    'title': 'se agregó usuario correctamente',
                    'showConfirmButton': false,
                }, function () {
                    window.location.href = 'user/' + _response.id;
                })
            }
        })
    }

    addNewUserComplete(_response) {


    }
    editUserComplete(_response) {
        if (_response.error) {
            _response.error.forEach((error) => {
                front.addFailInputById(error.key, error.msg);
            })
        }
        if (_response.success) {
            front.Swal({
                'icon': 'success',
                'title': 'Se editó al usuario correctamente',
                'showConfirmButton': false,
            }, { 'reload': true })


        }
    }
    editSedeModal(key, sede) {

        if(sede.type == 'checkbox'){
            if(sede.val == 1){
                $('#EditSedeModalBody') > $('#' + key).attr('checked', true)
            }
        }else{
            $('#EditSedeModalBody') > $('#' + key).val(sede.val)
        }
    }
    editSede(form) {
        this.ajax({
            url: 'editSede',
            data: $(form).serialize()
        }, this.editSedeSuccess)
    }
    editSedeSuccess() {
        front.Swal({
            showConfirmButton: false,
            icon: 'success',
            title: 'Se modificó correctamente la Sede'
        }, function () {
            location.reload()
        })
    }
    addSedeSuccess() {
        front.Swal({
            showConfirmButton: false,
            icon: 'success',
            title: 'Se agrego sede correctamente',
        }, function () {
            location.reload()
        })
    }
    firstLetter(string) {
        var slice = string.slice(1)
        var fist = string.charAt(0).toUpperCase();

        string = fist + slice

        return string
    }
    addNewCustomer(form) {
        form = $(form).serialize();
        this.ajax({
            url: 'addCustomer',
            data: form,
        }, this.addCustomerComplete)
    }
    addCustomerComplete(_response) {
        if (_response.error) {
            hidenLoader()
            _response.error.forEach((error) => {
                front.addFailInputById(error.key, error.msg);
            })
        }
        if (_response.success) {
            front.Swal({
                'icon': 'success',
                'title': 'Se agregó cliente correctamente',
            }, function () {
                window.location.href = 'customers'
            });
        }
    }
    editCustomer(form) {
        this.ajax({
            data: new FormData(form),
            cache: false,
            processData: false,
            contentType: false,
            url: 'editCustomer',
        }, function (_response) {
            front.Swal(
                {
                    'icon': 'success',
                    'title': 'Se editó cliente correctamente',
                    'showConfirmButton': false,
                }, function () {
                    window.location.href = 'customers'
                }
            );
        })
    }
    editCustomerComplete(_response) {
        if (_response.error) {
            _response.error.forEach((error) => {
                front.addFailInputById(error.key, error.msg);
            })
        }
        if (_response.success) {
            front.Swal(
                {
                    icon: 'success',
                    'title': 'se editó Cliente correctamente',
                    'showConfirmButton': false,
                },
                {
                    'href': 'customers'
                }
            );
        }
    }
    sleep(ms) {
        return new Promise(resolve => setTimeout(resolve, ms));
    }

    FormatoPesosColombianos(input, blur) {
        function formatNumber(n) {
            // format number 1000000 to 1,234,567
            return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ".")
        }
        // appends $ to value, validates decimal side
        // and puts cursor back in right position.

        // get input value
        var input_val = input.val();

        // don't validate empty input
        if (input_val === "") { return; }

        // original length
        var original_len = input_val.length;

        // initial caret position 
        var caret_pos = input.prop("selectionStart");

        // check for decimal
        if (input_val.indexOf(".") >= 0) {

            // get position of first decimal
            // this prevents multiple decimals from
            // being entered
            var decimal_pos = input_val.indexOf(".");

            // split number by decimal point
            var left_side = input_val.substring(0, decimal_pos);
            var right_side = input_val.substring(decimal_pos);

            // add commas to left side of number
            left_side = formatNumber(left_side);

            // validate right side
            right_side = formatNumber(right_side);

            // On blur make sure 2 numbers after decimal
            if (blur === "blur") {
                right_side += "00";
            }

            // Limit decimal to only 2 digits
            right_side = right_side.substring(0, 2);

            // join number by .
            input_val = "$ " + left_side + "," + right_side;

        } else {
            // no decimal entered
            // add commas to number
            // remove all non-digits
            input_val = formatNumber(input_val);
            input_val = "$ " + input_val;

            // final formatting
            if (blur === "blur") {
                input_val += ",00";
            }
        }

        // send updated string to input
        input.val(input_val);

        // put caret back in the right position
        var updated_len = input_val.length;
        caret_pos = updated_len - original_len + caret_pos;
        input[0].setSelectionRange(caret_pos, caret_pos);
    }

    reformatDiner(val){
        
        if(Boolean(val)){
            val = val.replace('$', '')
            val = val.replace(/\./g, '')
            val = val.replace(',', '.')
            val = val.replace(" ", "");
            val = val.replace(/\s+/g, '')
            return val
        }else{
            return 0;
        }
    }
    

    calculatarTotal(){

        var datos = {}
        datos['extra_kilo_cost'] = extra_kilo_cost
        datos['first_kilo_cost'] = first_kilo_cost
        var peso            = $('#weight').val()
       // var alto            = Volumen('.valumen-high')
       // var ancho           = Volumen('.volumen-width')
       // var largo           = Volumen('.volumen-length')
        var valor_declarado = this.reformatDiner($('#valor_declarado').val())
        var RTFuente        = Number($('#rtfuente').val())
        var shop_service    = 0
        var pick_up_service = 0

        datos['peso']  = peso
        //datos['alto']  = alto
       // datos['ancho'] = ancho
       // datos['largo'] = largo
        datos['valor_declarado'] = valor_declarado

       // var volumen     = volumenCalculo();
       // var totalVolumen     = volumen * 400
        var totalVolumen = valumenCalculo();
        //var totalVolumen = totalVolumen.toFixed(2)
        datos['kilos']   = peso
        datos['volumen'] = totalVolumen
        if(totalVolumen > 0){
            if(peso > Number(totalVolumen)){
                var totalPack = peso - 1
                
            }else{
                var totalPack = totalVolumen - 1
            }
            
        }else{
            var totalPack = peso - 1
        }

        datos['totalPack'] = totalPack

        datos['envio'] = totalPack * extra_kilo_cost
        datos['envio'] = datos.envio.toFixed(2)
        datos['envio'] = Number(datos.envio) + Number(first_kilo_cost)

        if(Boolean($('#descuento').val())){
            var descuento = $('#descuento').val()
        }else{
            var descuento = 0
        }

        

        if($('#shop_service').is(':checked')){
            var shop_service = this.CountSelectSumCost('#select_shopping_service option')
        }
        if($('#pick_up_service').is(':checked')){
            var pick_up_service = this.CountSelectSumCost('#select_pick_up_service option')
        }
        datos['servicios']    = shop_service + pick_up_service
        datos['envio']   = separator(datos.envio)
        datos['descuentos']   = datos.envio*(descuento/100)
        if(valor_declarado > maximo_asegurado){
            var ProcentManejo = datos.valor_declarado*(seguro/100)
            datos['majeno']   = ProcentManejo
        }else{
            datos['majeno']   = manejo_fijo;
        }

        datos['subtotal']     = datos.envio + datos.servicios + Number(datos.majeno) - datos.descuentos

        datos['RTFuente']     = RTFuente
        datos['RTFuente']     = datos.subtotal*(datos.RTFuente/100)
        datos['iva']          = datos.subtotal*(iva/100)

        datos['total']        = datos.subtotal + datos.iva - datos.RTFuente

        function separator(numb) {
            var str = numb.toString().split(".");
            str[0] = str[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            str = str.join(".");
            str = parseFloat(str)
            str = Math.round(str)
            return Number(str + '000')
        }

        datos['total']   = datos.total;

        console.log(datos)

        return datos

    }
    FormatPesosColombianos(valor){
        valor = Number(valor)
        var formato = valor.toLocaleString("es-CO", {
            style: "currency",
            currency: "COP"
        });
        formato = formato.replace('COP', '');
        formato = formato.replace('$', '');
        formato = formato.replace(' ', '');

        formato = '$' + formato

        formato = formato.trim();

        return formato
    }
    CountSelectSumCost(element){
        var val = 0;
        $(element).each(function(){
            if($(this).is(':selected')){
                var cost = Number($(this).attr('cost'))
                val = val + cost
            }
        })
        return val
    }
    ChangeElement(prop = {}){
        var observer = new MutationObserver(prop.function)
        observer.observe(prop.element, prop.config)
    }
    ShartFunction(element){

        var dataday  = $(element).attr('data-day') 
        var datatype = $(element).attr('data-type')
        var sede     = $(element).attr('data-sede')
        var asesor   = $(element).attr('data-asesor')
        var datos    = $(element).attr('data-url')

        if(datos == 'recaudo'){
            var option = {
                tooltips: {
                    enabled: true,
                    callbacks: {
                      label: function(tooltipItem, data) {
                        return currency(tooltipItem.value)
                      }
                    }
                },
                onHover: false,
                scales: {
                    yAxes: [{
                        ticks: {
                            callback: function(value, index, values) {
                                return  currency(value)
                            },
                        }
                    }],
                }
            }
        }else{
            var option = {}
        }
        this.ajax({
            url: 'getReport',
            data: {dataday: dataday, datatype: datatype, sede: sede, asesor: asesor, datos: datos},
        }, function(_response){
            hidenLoader();
            const myChart = new Chart(element, {
                type: $(element).attr('chart-type'),
                data: _response,
                options: option,
                
            });
            myChart.destr
        })
    }
    loaderVentasDiasrias(){
        var html = '<tr class="tb-odr-item">'+
        '<td class="tb-odr-info">'+
            '<span class="item-loader tb-odr-id"></span>'+
        '</td>'+
        '<td class="tb-odr-info">'+
            '<span class="item-loader tb-odr-id"></span>'+
        '</td>'+
        '<td class="tb-odr-info">'+
            '<span class="item-loader tb-odr-id"></span>'+
        '</td>'+
        '<td class="tb-odr-info">'+
            '<span class="item-loader tb-odr-id"></span>'+
        '</td>'+
        '<td class="tb-odr-info">'+
            '<span class="item-loader tb-odr-id"></span>'+
        '</td>'+
        '<td class="tb-odr-info">'+
            '<span class="item-loader tb-odr-id"></span>'+
        '</td>'+
        '<td class="tb-odr-info">'+
            '<span class="item-loader tb-odr-id"></span>'+
        '</td>'+
        '<td class="tb-odr-info">'+
            '<span class="item-loader tb-odr-id"></span>'+
        '</td>'+
        '<td class="tb-odr-info">'+
            '<span class="item-loader tb-odr-id"></span>'+
        '</td>'+
        '<td class="tb-odr-info">'+
            '<span class="item-loader tb-odr-id"></span>'+
        '</td>'+
        '<td class="tb-odr-info">'+
            '<span class="item-loader tb-odr-id"></span>'+
        '</td>'+
        '<td class="tb-odr-info">'+
            '<span class="item-loader tb-odr-id"></span>'+
        '</td>'+
    '</tr>';
    for (var i = 0; i < 2; i++) {
        html = html + html
    }
    $('#ventasdiarias-items').html(html)
    }
    ventasdiasrias(data, url = false){
        var url = window.location.href.split('/')
        url = url[url.length-1];

        if(url.match('ventas-diarias')){
            if(data.desde <= data.hasta){
                $('#btn-export-report-excel').attr('href', 'reporte-excel' + '?desde=' +data.desde + '&hasta=' + data.hasta + '&sede=' + data.sede)
            
                this.ajax(
                    {
                        url: 'getventasdiarias',
                        data: data,
                    },function(_response){
                    $('#ventasdiarias-items').html('');
                    $(_response.items).each(function(){
                        var items = '<tr class="tb-odr-item">'+
                                        '<td class="tb-odr-info">'+
                                            '<span class="tb-odr-id"><a href="ver_guia/'+this.guia+'">'+this.guia+'</a></span>'+
                                        '</td>'+
                                        '<td class="tb-odr-info">'+
                                            '<span class="tb-odr-id">'+this.fecha+'</span>'+
                                        '</td>'+
                                        '<td class="tb-odr-info text-center">'+
                                            '<span class="tb-odr-id" title="'+this.sede+'">'+cutText(this.sede, 4)+'</span>'+
                                        '</td>'+
                                        '<td class="tb-odr-info text-center">'+
                                            '<span class="tb-odr-id">'+this.cant+'</span>'+
                                        '</td>'+
                                        '<td class="tb-odr-info text-center">'+
                                            '<span class="tb-odr-id">'+this.tipo+'</span>'+
                                        '</td>'+
                                        '<td class="tb-odr-info text-center">'+
                                            '<span class="tb-odr-id">'+this.shop+'</span>'+
                                        '</td>'+
                                        '<td class="tb-odr-info text-center">'+
                                            '<span class="tb-odr-id">'+this.pick+'</span>'+
                                        '</td>'+
                                        '<td class="tb-odr-info text-center">'+
                                            '<span class="tb-odr-id" title="'+this.descripcion+'">'+cutText(this.descripcion, 8)+'</span>'+
                                        '</td>'+
                                        '<td class="tb-odr-info">'+
                                            '<span class="tb-odr-id" title="'+this.remitente+'">'+cutText(this.remitente, 6)+'</span>'+
                                        '</td>'+
                                        '<td class="tb-odr-info">'+
                                            '<span class="tb-odr-id" title="'+this.destinatario+'">'+cutText(this.destinatario, 8)+'</span>'+
                                        '</td>'+
                                        '<td class="tb-odr-info">'+
                                            '<span class="tb-odr-id" title="'+this.destino+'">'+cutText(this.destino, 7)+'</span>'+
                                        '</td>'+
                                        '<td class="tb-odr-info">'+
                                            '<span class="tb-odr-id">'+this.banco+'</span>'+
                                        '</td>'+
                                    '</tr>'
                        $('#ventasdiarias-items').append(items);
                    })
                },'', function(){

                }
                )
            }else{
                alertSwal({
                    icon: 'error',
                    title: 'Valor de las fechas incorrecto',
                    text: 'fecha inicial no puede ser mayor a la fecha de fin'
                })
            }
        }
        
    }
}