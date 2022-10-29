<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingresar datos</title>

    <!-- Hoja de estilos general  -->
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>

<div class="contenedor_">
    <form name="form" class="contenedor_form" action="index.php" method="post">
    
    <h1>ABCC de producto</h1>
    
    <div class="grupo_campo_form">
        <div>
        <label>sku</label><input type="text" name="skuvalor" placeholder="Ingresa SKU para validar">
        </div>
        <div>
        <input type="submit" class="btn_primary" name="boton" value="Buscar">
        </div>
    </div>
        <?php   

    include("conexion.php");
    $conexion = conectar();

    $btn = $_POST["boton"];
    $sku = $_POST['skuvalor'];


    $consulta = "SELECT * FROM producto where sku=$sku";
    $resultado = mysqli_query($conexion, $consulta);
    
    if ($btn == 'registrar'){

    $skus = $_POST['sku'];
    $articulo = $_POST['articulo'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $departamento = $_POST['departamento'];
    $clase = $_POST['clase'];
    $familia = $_POST['familia'];
    $fechaalta = date('Y-m-d');
    $stock = $_POST['stock'];
    $cantidad = $_POST['cantidad'];
    $descontinuado = 0;
    $fechabaja = '1900-01-01';

    $sql = "INSERT INTO producto (sku, articulo, marca, modelo, departamento, clase, familia, fecha_alta, stock, cantidad, descontinuado, fecha_baja) 
    VALUES 
    ($skus, '$articulo', '$marca', '$modelo', $departamento, $clase, $familia, '$fechaalta', $stock, $cantidad, $descontinuado, '$fechabaja');";

    if (mysqli_query($conexion, $sql)) {
   
        echo "Registro exitoso";
         ?>
        
        
        <div class="grupo_campo_form">
                    <div>
                    <label>SKU</label><input type="text" name="sku" value="<?php echo $sku ?>">
                    </div>
                    <div>
                    <label>Descontinuado</label><input type="text" name="descontinuado" disabled>
                    </div>
        </div>

        <div class="campo_form">
                <label>Artículo</label><input type="text" name="articulo">
                </div>
    
                <div class="campo_form">
                    <label>Marca</label><input type="text" name="marca">
                </div>
    
                <div class="campo_form">
                    <label>Modelo</label><input type="text" name="modelo">
                </div>















   <?php
      } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
      }
      mysqli_close($conexion);

       }else{
        if(mysqli_num_rows($resultado)!=null){
            echo "El SKU $sku ya existe en la Base de Datos";
            while ($mostrar = mysqli_fetch_array($resultado)){
                ?>
            
                <div class="grupo_campo_form">
                    <div>
                    <label>SKU</label><input type="text" name="sku" value="<?php echo $mostrar['sku'] ?>" disabled>
                    </div>
                    <div>
                    <label>Descontinuado</label><input type="text" name="descontinuado" value="<?php echo $mostrar['descontinuado'] ?>">
                    </div>
                </div>
            
                <div class="campo_form">
                    <label>Artículo</label><input type="text" name="articulo" value="<?php echo $mostrar['articulo'] ?>">
                </div>
            
                <div class="campo_form">
                    <label>Marca</label><input type="text" name="marca" value="<?php echo $mostrar['marca'] ?>">
                </div>
            
                <div class="campo_form">
                    <label>Modelo</label><input type="text" name="modelo" value="<?php echo $mostrar['modelo'] ?>">
                </div>
            
                <!-- SE OBTIENEN LOS DATOS DE DEPARTAMENTO -->
                <div class="campo_form">
                    <label>Departamento</label><select name="departamento">
                    <option value=""><?php echo $mostrar['departamento'] ?></option>
                    </select>
                </div>
            
                <!-- SE OBTIENEN LOS DATOS DE CLASE -->
                <div class="campo_form">
                    <label>Clase</label><select name="clase">
                    <option value=""><?php echo $mostrar['clase'] ?></option>
                    </select>
                </div>
            
                 <!-- SE OBTIENEN LOS DATOS DE FAMILIA -->
                 <div class="campo_form">
                    <label>Familia</label><select name="familia">
                    <option value=""><?php echo $mostrar['familia'] ?></option>
                    </select>
                </div>
            
                <div class="grupo_campo_form">
                    <div>
                    <label>Stock</label><input type="text" name="stock" value="<?php echo $mostrar['stock'] ?>">
                    </div>
                    <div>
                    <label>Cantidad</label><input type="text" name="cantidad" value="<?php echo $mostrar['cantidad'] ?>">
                    </div>
                </div>
            
                <div class="grupo_campo_form">
                    <div>
                    <label>Fecha alta</label><input type="text" name="fechaalta" value="<?php echo $mostrar['fecha_alta'] ?>" disabled>
                    </div>
                    <div>
                    <label>Fecha baja</label><input type="text" name="fechabaja" value="<?php echo $mostrar['fecha_baja'] ?>" disabled>
                    </div>
                </div>
            
                <div class="boton_der">
                <input type="submit" class="btn_primary" name="boton" value="Modificar">
                <input type="submit" class="btn_primary" name="boton" value="Eliminar">
                </div>
            
                    <?php
                    }
                }else{
                    echo "El SKU $sku no existe en la Base de Datos, puedes usarlo";
                    ?>
    
                <div class="grupo_campo_form">
                    <div>
                    <label>SKU</label><input type="text" name="sku" value="<?php echo $sku ?>">
                    </div>
                    <div>
                    <label>Descontinuado</label><input type="text" name="descontinuado" disabled>
                    </div>
                </div>
    
                <div class="campo_form">
                <label>Artículo</label><input type="text" name="articulo">
                </div>
    
                <div class="campo_form">
                    <label>Marca</label><input type="text" name="marca">
                </div>
    
                <div class="campo_form">
                    <label>Modelo</label><input type="text" name="modelo">
                </div>
    
                <!-- SE OBTIENEN LOS DATOS DE DEPARTAMENTO -->
        <div class="campo_form">
            <label>Departamento</label><select name="departamento">
            <option value="null">Selecciona el departamento</option>
            <?php   
        
        $conexion = conectar();
    
        $consulta = "SELECT * FROM departamento";
        $resultado = mysqli_query($conexion, $consulta);
    
        while ($mostrar = mysqli_fetch_array($resultado)){
        ?>
    
            <option value="<?php echo $mostrar['id_departamento'] ?>">
            <?php echo $mostrar['nombre_departamento'] ?></option>
    
        <?php
        }
        ?>
            </select>
        </div>
    
        <!-- SE OBTIENEN LOS DATOS DE CLASE -->
        <div class="campo_form">
            <label>Clase</label><select name="clase">
            <option value="null">Selecciona la clase</option>
            <?php   
        
       
        $conexion = conectar();
    
        $consulta = "SELECT * FROM clase";
        $resultado = mysqli_query($conexion, $consulta);
    
        while ($mostrar = mysqli_fetch_array($resultado)){
        ?>
    
            <option value="<?php echo $mostrar['id_clase'] ?>">
            <?php echo $mostrar['nombre_clase'] ?></option>
    
        <?php
        }
        ?>
            </select>
        </div>
    
         <!-- SE OBTIENEN LOS DATOS DE FAMILIA -->
         <div class="campo_form">
            <label>Familia</label><select name="familia">
            <option value="null">Selecciona la familia</option>
            <?php   
        
       
        $conexion = conectar();
    
        $consulta = "SELECT * FROM familia";
        $resultado = mysqli_query($conexion, $consulta);
    
        while ($mostrar = mysqli_fetch_array($resultado)){
        ?>
    
            <option value="<?php echo $mostrar['id_familia'] ?>">
            <?php echo $mostrar['nombre_familia'] ?></option>
    
        <?php
        }
        ?>
    
        </select>
        </div>
    
        <div class="grupo_campo_form">
            <div>
            <label>Stock</label><input type="text" name="stock">
            </div>
            <div>
            <label>Cantidad</label><input type="text" name="cantidad">
            </div>
        </div>
    
        <div class="grupo_campo_form">
            <div>
            <label>Fecha alta</label><input type="text" name="fechaalta" disabled>
            </div>
            <div>
            <label>Fecha baja</label><input type="text" name="fechabaja" disabled>
            </div>
        </div>
    
        <div class="boton_der">
        <input type="submit" class="btn_primary" name="boton" value="registrar">
        </div>

    

    

                <?php
                }
            }
                ?>

    

    


</form>
</div>
    
</body>
</html>