
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Órdenes del proveedor {{$supplier->name}}
      </h1>
    </section>

    <!-- Main content -->
   <section class="content">

     <div class="box">
       <div class="box-header">

       </div>
       <!-- /.box-header -->
       <div class="box-body">
         <table id="myTable" class="table table-bordered table-hover display nowrap" style="width:100%">
           <thead>
           <tr>
             <th>#</th>
             <th>Fecha</th>
             <th>Cantidad de productos</th>
             <th>Total</th>
             {{-- <th>Proveedores</th> --}}
           </tr>
           </thead>
           <tbody>
             @foreach ($supplier->orders as $order)
               <tr>
                 <td>{{$order->id}} </td>
                 <td>{{$order->created_at->format('d/m/Y h:m')}} </td>
                 <td>{{$order->products->count()}} </td>
                 <td>{{$order->totalAmount()}}</td>

               </tr>
             @endforeach
           </tbody>
           <tfoot>
           <tr>
             <th>Código</th>
             <th>Nombre</th>
             <th>Descrip.</th>
             <th>Stock</th>
             <th># Ventas</th>
             <th># Pedidos</th>
             {{-- <th>Proveedores</th> --}}
           </tr>
           </tfoot>
         </table>

       </div>
       <!-- /.box-body -->
     </div>



   </section>
