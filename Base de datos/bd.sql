create table tienda_online.producto 
(sku int(6) not null,
 articulo varchar(15),
 marca varchar(15),
 modelo varchar(20),
 departamento int(1),
 clase int(1),
 familia int(1),
 fecha_alta date,
 stock int(9),
 cantidad int(9),
 descontinuado int(1),
 fecha_baja date,

PRIMARY KEY (sku),

FOREIGN KEY (departamento)
      REFERENCES departamento(id_departamento)
      ON UPDATE CASCADE ON DELETE RESTRICT,

FOREIGN KEY (clase)
      REFERENCES clase(id_clase)
      ON UPDATE CASCADE ON DELETE RESTRICT,
      
FOREIGN KEY (familia)
      REFERENCES familia(id_familia)
      ON UPDATE CASCADE ON DELETE RESTRICT);


create table tienda_online.departamento
(id_departamento int not null,
 nombre_departamento varchar(30),
 PRIMARY KEY (id_departamento)
 );

 create table tienda_online.clase
(id_clase int not null,
 nombre_clase varchar(30),
 PRIMARY KEY (id_clase)
 );

 create table tienda_online.familia
(id_familia int not null,
 nombre_familia varchar(30),
 PRIMARY KEY (id_familia)
 );

------------------------------------------------

INSERT INTO tienda_online.departamento (id_departamento, nombre_departamento) 
VALUES 
(1, 'Electronica'),
(2, 'Perfumeria'),
(3, 'Ropa'),
(4, 'Bisuteria'),
(5, 'Juguetes');

INSERT INTO tienda_online.clase (id_clase, nombre_clase) 
VALUES 
(1, 'Bocinas'),
(2, 'Carro control'),
(3, 'Playeras'),
(4, 'Pantalones'),
(5, 'Roperos');

INSERT INTO tienda_online.familia (id_familia, nombre_familia) 
VALUES 
(1, 'Television 42p'),
(2, 'Mini bocina'),
(3, 'Playera de niño'),
(4, 'Closet'),
(5, 'Pulseras de mar');

INSERT INTO tienda_online.producto (sku, articulo, marca, modelo, departamento, clase, familia, fecha_alta, stock, cantidad, descontinuado, fecha_baja) 
VALUES 
(251436, 'iPhone 13', 'Apple', 'iPhone 13 Pro', 1, 2, 3, "2014-02-02", 10, 5, 0, "2022-01-02");

-----------
<?php

$server = "localhost";
$user = "root";
$pass = "";
$db = "tienda_online";

$conexion = new mysqli($server, $user, $pass, $db);

if($conexion->connect_errno){
    die("La conexión ha fallado " . $conexion->connect_errno);
}else{
    echo "Conexión exitosa";
}


---------------  $mysqli->close();

<?php
$inc = include("conexion.php");
if($inc){
        $consulta = "SELECT * FROM departamento";
        $resultado = "mysqli_query($conex, $consulta)";

if ($resultado){

    while ($row = $resultado->fetch_array()){
        $id_departamento = $row ['id_departamento'];
        $nombre_departamento = $row ['nombre_departamento'];
        ?>
        
        <div>
        <h2><?php echo $id_departamento; ?></h2>
            <div>
                <p>
                    <b><?php echo $nombre_departamento; ?></b><br>
                </p>
            </div>
        </div>
        <?php
        }
    }
}

?>




----------------



<?php
$conexion = mysqli_connect('localhost', 'root', 'root', 'tienda_online');


?>