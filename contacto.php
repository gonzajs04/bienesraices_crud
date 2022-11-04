<?php require 'includes/funciones.php';

incluirTemplate('header');
?>

<section class="contacto">

    <h1>Contacto</h1>
    <picture>
        <source srcset="/build/img/destacada3.jpg" type="image/jpeg">
        <source srcset="/build/img/destacada3.webp" type="image/webp">
        <img loading ="lazy" src="/build/img/destacada3.jpg" alt="imagen contacto">
    </picture>

    <h2>Llene el formulario de contacto</h2>

    <form action="" class="formulario">

        <fieldset><legend>Informacion Personal</legend>
      
        <label for="nombre">Nombre</label>
        <input placeholder = "Tu nombre" type="text" name="nombre" id="nombre">

        <label for="mail">Email</label>
        <input placeholder = "Tu email" type="mail" name="mail" id="mail">
        
        <label for="telefono">Telefono</label>
        <input  placeholder = "Tu telefono" type="tel" name="telefono" id="telefono">
        <label for="mensaje">Mensaje</label>
        <textarea name="" id="mensaje" cols="30" rows="10"></textarea>

        
        
        </fieldset>


        <fieldset><legend>Informacion sobre la propiedad</legend>
        <label for="opciones">Vende o compra</label>
            <select name="" id="opciones">
                <option value="" disabled selected>--Seleccione--</option>
                <option value="Compra">Compra</option>
                <option value="Vende">Vende</option>
            </select>
            
        <label for="presupuesto">Precio o Presupuesto</label>
        <input placeholder ="Tu presupuesto" type="number" name="presupuesto" id="presupuesto">
            
        </fieldset>


        <fieldset><legend>Informacion sobre usted</legend>
        <label for="contacto">Como desea ser contactado?</label>
        <div class="forma-contacto">
            <label for="contactar-telefono">Telefono</label>
            <input name="contacto" type="radio" value="telefono" id="contactar-telefono">
            <label for="contactar-email">Email</label>
            <input type="radio"  name="contacto" value="email" id="contactar-email">
        </div>

        <p>Si eligio telefono, elija fecha y hora</p>
        <label for="fecha">Fecha:</label>
        <input type="date" name="fecha" id="fecha">

        <label for="hora">Hora:</label>
        <input type="time" id="hora" min="09:00" max="18:00">


        
        </fieldset>

        <input  type="submit" value="Enviar formulario" class="enviar-form boton-verde">

    </form>

</section>
<?php     incluirTemplate('footer');?>

</body>
</html>