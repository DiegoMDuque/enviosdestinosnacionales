<?php

    class Invoice{

        public static function AddInvoice(){
            foreach($_POST as $key => $val){
                $_POST[$key] = noCurrency($val);
            }
            $data = Core::retrumOBJ($_POST);
            query("INSERT INTO invoices(
                id_envio,
                manejo,
                servicios,
                costo_envio,
                descuento,
                rtfuente,
                subtotal,
                iva,
                total,
                fecha
                ) VALUES (
                    '$data->id',
                    '$data->total_manejo',
                    '$data->total_servicios',
                    '$data->total_costo_envio',
                    '$data->total_descuento',
                    '$data->total_rtfuente',
                    '$data->total_subtotal',
                    '$data->total_iva',
                    '$data->total_total',
                    '$data->fecha'
                )
            ");
        }

        public static function getInvoiceByShipment($shipment){

            $result  = query("SELECT * FROM invoices WHERE id_envio = '$shipment'");
            
            return (object) array(
                'manejo'      => currency($result->manejo),
                'servicios'   => currency($result->servicios),
                'costo_envio' => currency($result->costo_envio),
                'descuento'   => currency($result->descuento),
                'rtfuente'    => currency($result->rtfuente),
                'subtotal'    => currency($result->subtotal),
                'iva'         => currency($result->iva),
                'total'       => currency($result->total)
            );
        }

        public static function PrintInvoice($shipment){
            $shipment = Envios::GetShipmentsFull($shipment);

            $plantilla = getTemplate('factura', 'html');
            $arr = (object) array(

                '[FACTURA]'      => $shipment->id,
                '[LOGO]'         => URL .'assets/img/logo-3.jpg',
                '[ID]'           => $shipment->id,
                '[FECHA]'        => $shipment->fecha,
                '[NAME_R]'       => $shipment->sender->name,
                '[NAME_D]'       => $shipment->receiver->name,
                '[CEDULA_R]'     => $shipment->sender->dni,
                '[CEDULA_D]'     => $shipment->receiver->dni,
                '[PHONE_R]'      => $shipment->sender->phone,
                '[PHONE_D]'      => $shipment->receiver->phone,
                '[CITY_R]'       => $shipment->origen,
                '[CITY_D]'       => $shipment->destino,
                '[ENVIO]'        => $shipment->invoice->costo_envio,
                '[MANEJO]'       => $shipment->invoice->manejo,
                '[SERVISIOS]'    => $shipment->invoice->servicios,
                '[DESCUENTO]'    => $shipment->invoice->descuento,
                '[RTFUENTE]'     => $shipment->invoice->rtfuente,
                '[SHOP]'         => $shipment->servicios->total->shop,
                '[SHOP_QS]'      => $shipment->servicios->total->shop_q,
                '[PICKUP]'       => $shipment->servicios->total->pickup,
                '[PICKUP_QS]'    => $shipment->servicios->total->pick_q,
                '[SUBTOTAL]'     => $shipment->invoice->subtotal,
                '[IVA]'          => $shipment->invoice->iva,
                '[TOTAL]'        => $shipment->invoice->total,
                '[BARCODE]'      => $shipment->barcode,
                '[PACK]'         => $shipment->packages[0]->quanty,
                '[valor_declarado]' => $shipment->packages[0]->valor_declarado,
                '[DESCRIPCION]'     => $shipment->packages[0]->description,


            );
            
            foreach($arr as $key => $val){
                $plantilla = str_replace($key, $val, $plantilla);
            }
            Core::PrintPDF($plantilla, 'factura', array(
                'margin_top'    => 5,
                'margin_bottom' => 120,
                )
            );
        }
    }