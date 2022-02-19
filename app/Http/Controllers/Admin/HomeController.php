<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Cliente;
use App\Models\Producto;
use App\Models\Venta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        $clientes = Cliente::all();
        $categorias = Categoria::all();
        $productos = Producto::all();
        $ventas = Venta::all();
        #$comprasmes=DB::select('SELECT month(c.purchase_date) as mes, sum(c.total) as totalmes from purchases c where c.status="VALID" group by month(c.purchase_date) order by month(c.purchase_date) desc limit 12');
        $ventasmes=DB::select('SELECT det.venta_id,((sum(det.total)*ven.igv)/100)+(sum(det.total))total_venta,
        month(ven.fecha_venta)as mes
        FROM detalle_ventas det
        INNER JOIN ventas ven
        ON det.venta_id = ven.id
        group by month(ven.fecha_venta)
        order by month(ven.fecha_venta) desc limit 12');


        // $comprasmes=DB::select('SELECT monthname(c.purchase_date) as mes, sum(c.total) as totalmes from purchases c where c.status="VALID" group by monthname(c.purchase_date) order by month(c.purchase_date) desc limit 12');
        // $ventasmes=DB::select('SELECT monthname(v.sale_date) as mes, sum(v.total) as totalmes from sales v where v.status="VALID" group by monthname(v.sale_date) order by month(v.sale_date) desc limit 12');

        #$ventasdia=DB::select('SELECT DATE_FORMAT(v.sale_date,"%d/%m/%Y") as dia, sum(v.total) as totaldia from sales v where v.status="VALID" group by v.sale_date order by day(v.sale_date) desc limit 15');
        #$totales=DB::select('SELECT (select ifnull(sum(c.total),0) from purchases c where DATE(c.purchase_date)=curdate() and c.status="VALID") as totalcompra, (select ifnull(sum(v.total),0) from sales v where DATE(v.sale_date)=curdate() and v.status="VALID") as totalventa');
        #$productosvendidos=DB::select('SELECT p.code as code, 
        #sum(dv.quantity) as quantity, p.name as name , p.id as id , p.stock as stock from products p 
        #inner join sale_details dv on p.id=dv.product_id 
        #inner join sales v on dv.sale_id=v.id where v.status="VALID" 
        #and year(v.sale_date)=year(curdate()) 
        #group by p.code ,p.name, p.id , p.stock order by sum(dv.quantity) desc limit 10');
       
        $meses =[1=>"Ene",2=>"Feb",3=>"Mar",4=>"Abr",5=>"May",6=>"Jun",7=>"Jul",8=>"Ago",9=>"Sep",10=>"Oct",11=>"Nov",12=>"Dic"];
        #return view('home', compact( 'comprasmes', 'ventasmes', 'ventasdia', 'totales', 'productosvendidos'));
        return view('admin.index',compact('clientes','categorias','productos','ventas','ventasmes','meses'));
    }
}
