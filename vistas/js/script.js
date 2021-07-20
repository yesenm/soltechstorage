$(document).ready(function(){
    
    $(document).on('click','#btn_addOrder', function(){

        //Conseguir que los datos de la tabla "inventario" se agregen en los input según el select
        $('.id_').change(function(){
            var productid = this.value;
            var tr=$(this).parent().parent();
            $.ajax({ 
                type:"POST",
                data:{id:productid},
                url:"../llenarFormProducto.php",
                success:function(r){
                    dato=jQuery.parseJSON(r);
                    
                    tr.find('.quantity_product').removeAttr('disabled');

                    tr.find(".codigoi_").val(dato["codigoi"]);
                    tr.find(".descripcioni_").val(dato["descripcioni"]);
                    tr.find(".existenciasi_").val(dato["existenciasi"]);
                    tr.find(".pnetoi_").val(dato["pnetoi"]);

                    tr.find(".quantity_product").val(0);
                    tr.find(".iva_product").val(0);
                    tr.find(".producttotal").val(0);
                    calculate(0,0);
                }
                
            });
        });
        
    //Calcular total de un solo select
        $('.quantity_product').keyup(function(e) {
            e.preventDefault();
            
            var tr=$(this).parent().parent();

            //Calcula el precio x cantidad
            var precio_cant = tr.find(this).val() * tr.find('.pnetoi_').val();
            tr.find('.producttotal').val(precio_cant);
            calculate(0,0);

            tr.find('.id_').change(function(e){
                e.preventDefault();
                
                tr.find('.quantity_product').val(0);
                tr.find('.iva_product').val(0);
                tr.find('.producttotal').val(0);
                tr.find("#paid").val(0);

                
            });
            //Existencia
            var existencia = parseInt( tr.find('.existenciasi_').val());
            if ((tr.find(this).val() < 0) || isNaN(tr.find(this).val()) || tr.find(this).val() > existencia){
                alert("La cantidad no puede ser menor a 1 ni debe exceder al valor del stock ");
                tr.find('.quantity_product').val(0);
                tr.find('.producttotal').val(0);
                tr.find("#total").val(0);
                tr.find("#due").val(0);
                tr.find("#paid").val(0);
            }else {
                tr.find('.iva_product').removeAttr('disabled');
                
                //Sacar el IVA
                tr.find('.iva_product').keyup(function(e) {
                    e.preventDefault();

                    
                    var iva = tr.find('.iva_product').val()*0.01; //Iva se convierte a decimal
                    var ivadeprecio = tr.find('.pnetoi_').val() * iva; //Se saca cuanto es el Iva de cierto precio
                    var ivatotal = tr.find('.quantity_product').val() *ivadeprecio; //Multiplica el Iva de cierto precio x cantidad
                    var total = precio_cant + ivatotal; //Suma precio de cantidad + precio de iva total
                    tr.find('.producttotal').val(total);
                    calculate(0,0);
                    
                    tr.find('.id_').change(function(e){
                        e.preventDefault();
                        
                        tr.find('.quantity_product').val(0);
                        tr.find('.iva_product').val(0);
                        tr.find('.producttotal').val(0);
                        tr.find("#paid").val(0);

                        
                    });
                    
                    tr.find('.quantity_product').keyup(function(e){
                        e.preventDefault();
                        
                        tr.find('.iva_product').val(0);
                        tr.find("#paid").val(0);

                    });
                    
                });
            }  
        });     
    });
    
    //Permite quitar productos de la compra
    $(document).on('click','.btn-remove', function(){
        $(this).closest('tr').remove();
        calculate(0,0);
        $("#paid").val(0);
    });
    
    //Calcula en total  y el cambio
    function calculate(paid){
        var net_total = 0;
        var paid = paid;
        
        $(".producttotal").each(function(){
            net_total = net_total + ($(this).val()*1);
        })
        
        due = net_total - paid;
        
        $("#total").val(net_total);
        $("#due").val(due);
    }
    
    
    $("#paid").keyup(function(){
        var paid = $(this).val();
        calculate(paid);
    })
    
    
});