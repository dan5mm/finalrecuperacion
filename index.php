<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
    <?php
    //abrir la coneccion a la base datos
    $pdo_options[PDO::ATTR_ERRMODE]=PDO::ERRMODE_EXCEPTION;
    $conexion = new PDO('mysql:host=localhost;dbname=recuperacion_0907-23-22920','root','',$pdo_options);
    
  
    //ejecutamos la consulta
    $select = $conexion->query("SELECT Codigo, Nombre, Precio, Existencia From productos");
   ?>
   <div class= "tabla"> 
  <table border="3">
   <thead>
    <tr>
      <th>Codigo</th>
      <th>Nombre</th>
      <th>Precio</th>
      <th>Existencia</th>
</div>

</tr>
<?php foreach($select ->fetchAll() as $productos) { ?>
    <tr>
      <td> <?php echo$productos ["Codigo"] ?> </td>
      <td> <?php echo$productos ["Nombre"] ?> </td>
      <td> <?php echo$productos ["Precio"] ?> </td>
      <td> <?php echo$productos ["Existencia"] ?> </td>
      <td> <form method="POST">
        </form>
     <?php } ?>

     
    <h1>Crear Productos</h1>
    
    <form method="POST">
        <label for="codigo">Código:</label>
        <input type="text" name="codigo" id="codigo" required>
        
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required>
        
        <label for="precio">Precio:</label>
        <input type="number" name="precio" id="precio" step="0.01" required>
        
        <label for="existencia">Existencia:</label>
        <input type="number" name="existencia" id="existencia" required>
        
        <button type="submit">Agregar Producto</button>
    </form>
    
    <?php if (!empty($productos)) : ?>
        <h2>Listado de Productos</h2>
        <table>
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Existencia</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($select ->fetchAll() as $productos) : ?>
                    <tr>
                        <td><?php echo $producto['codigo']; ?></td>
                        <td><?php echo $producto['nombre']; ?></td>
                        <td><?php echo $producto['precio']; ?></td>
                        <td><?php echo $producto['existencia']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
    <script>
    // Función para agregar el producto a la tabla
    function agregarProducto() {
      var codigo = document.getElementById("codigo").value;
      var nombre = document.getElementById("nombre").value;
      var precio = document.getElementById("precio").value;
      var existencia = document.getElementById("existencia").value;

      var tabla = document.getElementById("tabla");
      var fila = tabla.insertRow(-1);

      var celdaCodigo = fila.insertCell(0);
      celdaCodigo.className = "codigo";
      celdaCodigo.innerHTML = codigo;

      var celdaNombre = fila.insertCell(1);
      celdaNombre.innerHTML = nombre;

      var celdaPrecio = fila.insertCell(2);
      celdaPrecio.className = "precio";
      celdaPrecio.innerHTML = precio;

      var celdaExistencia = fila.insertCell(3);
      celdaExistencia.className = "existencia";
      celdaExistencia.innerHTML = existencia;

      // Limpiar los campos del formulario
      document.getElementById("codigo").value = "";
      document.getElementById("nombre").value = "";
      document.getElementById("precio").value = "";
      document.getElementById("existencia").value = "";
    }

</head>
<tbody>
    </tbody>
  </table>
</body>
</html>