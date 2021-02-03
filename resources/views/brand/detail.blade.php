
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
                 <td>{{$product->sales->where('product_status_id','<>',1)->count()}}</td>
                 <td>{{$product->orders->where('product_status_id','<>',1)->count()}}</td>
                 <td>

                   <div class="btn-group">
                   	<button type="button" class="btn btn-labeled btn-labeled-right dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><b><i class="fas fa-user-tie"></i></b>  Ver proveedores</button>
                   	<div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-38px, 36px, 0px);">
                         @forelse ($product->suppliers as $supplier)
                           <a href="{!! route('supplier-edit',compact('supplier')) !!}" class="dropdown-item"><i class="fas fa-user"></i> {{$supplier->name}}</a>
                         @empty
                           <a href="" class="dropdown-item">No hay proveedores para este producto</a>
                         @endforelse
         						</div>

         					</div>
                 </td>
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
