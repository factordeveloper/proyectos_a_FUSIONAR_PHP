



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">







            <div class="card" style="margin-left: -240px;">
              <div class="card-header">
                <h3 class="card-title">

                  <a href="" class="btn btn-primary" data-toggle="modal" data-target="#AgregarCategorias">Agregar Productos</a>
                  

                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table  class="table table-bordered table-striped tablas" >
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                   

                  </tr>
                  </thead>
                  <tbody>


                    <?php

                    $item = null;
                    $valor = null;

                    $pro = ControladorProductos::ctrMostrarProductos($item,$valor);



                    foreach ($pro as $key => $value) {


                      echo '

                      <tr>

                      <td>'.($key+1).'</td>
                      <td>'.$value["nombre"].'</td>
                      <td>$ '.$value["precio"].'</td>
                      <td>'.$value["fecha"].'</td>
                      <td>


                      <button class="btn btn-primary btnEditarProductos" idProductos="'.$value["id"].'" data-toggle="modal" data-target="#EditarCategorias">Editar</button>

                      <button class="btn btn-danger btnEliminarProductos" idProductos="'.$value["id"].'">Eliminar</button>





                      </td>


                      </tr>


                      ';
                      

                    }


                    ?>
               



                  </tbody>





                 
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->




            
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>





  <div id="AgregarCategorias" class="modal" role="dialog">

    <div class="modal-dialog">

      <div class="modal-content">

        <div class="modal-header">

          <h4 class="modal-title">Agregar Productos</h4>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">

            <span aria-hidden="true">&times;</span>
            
          </button>
          

        </div>


        <form method="post">

          <div class="modal-body">

            <div class="box-body">

              <div class="form-group">

                <div class="input-group">

                  <input class="form-control" type="text" name="nombre" placeholder="Nombre">
                  

                </div>
                

              </div>



               <div class="form-group">

                <div class="input-group">

                  <input class="form-control" type="text" name="precio" placeholder="precio">
                  

                </div>
                

              </div>
              
              

            </div>
            

          </div>


          <div class="modal-footer">

            <button type="submit" class="btn btn-primary">Guardar</button>
            

          </div>
          


        </form>


        <?php


        $p = new ControladorProductos();
        $p->ctrGuardarProductos();



        ?>
        

      </div>
      
    </div>
    

  </div>







  <div id="EditarCategorias" class="modal" role="dialog">

    <div class="modal-dialog">

      <div class="modal-content">

        <div class="modal-header">

          <h4 class="modal-title">Editar Productos</h4>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">

            <span aria-hidden="true">&times;</span>
            
          </button>
          

        </div>


        <form method="post">

          <div class="modal-body">

            <div class="box-body">


               <div class="form-group">

              

                  <input class="form-control" type="hidden" name="idproducto" id="idproducto">
                  

            
                

              </div>

              <div class="form-group">

                <div class="input-group">

                  <input class="form-control" type="text" name="editarnombreproducto" id="editarnombreproducto">
                  

                </div>
                

              </div>



               <div class="form-group">

                <div class="input-group">

                  <input class="form-control" type="text" name="editarprecio" id="editarprecio">
                  

                </div>
                

              </div>
              
              

            </div>
            

          </div>


          <div class="modal-footer">

            <button type="submit" class="btn btn-primary">Editar</button>
            

          </div>
          


        </form>


        <?php


        $p = new ControladorProductos();
        $p->ctrEditarProductos();



        ?>
        

      </div>
      
    </div>
    

  </div>


    <?php


        $p = new ControladorProductos();
        $p->ctrBorrarProductos();



        ?>



