
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Productos de la marca {{$brand->name}}
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
             <th>Código</th>
             <th>Nombre</th>
             <th>Descrip.</th>
             <th>Stock</th>
             <th># Ventas</th>
             <th># Pedidos</th>
             {{-- <th>Proveedores</th> --}}
           </tr>
           </thead>
           <tbody>
             @foreach ($brand->products as $product)
               <tr>
                 <td>{{$product->id}} </td>
                 <td>{{$product->name}} </td>
                 <td>{{$product->description}} </td>
                 <td>{{$product->stock}}</td>
                 <td>{{$product->timesSold()}}</td>
                 <td>{{$product->timesOrdered()}}</td>
                 {{-- <td>
                 @foreach ($product->suppliers as $supplier)

                   <span class="badge badge-dark">{{$supplier->name}}</span>
                 @endforeach
                 </td> --}}
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
