<hr>
<button onclick="location.href='./'"> Volver </button>
<br><br>
<table>
    <tr>
        <td>id:</td>
        <td><input type="number" name="id" value="<?= $cli->id ?>" readonly> </td>
        <td rowspan="7">
            <?php
            $rutaFoto = '../uploads/0000000' . $cli->id . '.jpg';
            ?>

            <?php if (file_exists($rutaFoto)) : ?>

                <img src="<?= $rutaFoto ?>" alt="Foto">

            <?php else : ?>

                <img src="<?= 'https://robohash.org/' . $cli->id . '.png' ?>" alt="Foto de la persona"></img>

            <?php endif; ?>
        </td>
        <td rowspan="7">
            <img src="https://flagcdn.com/w2560/<?php echo strtolower(codigoPais($cli->ip_address)) ?>.jpg" alt="Bandera">
        </td>
    </tr>
    <tr>
        <td>first_name:</td>
        <td><input type="text" name="first_name" value="<?= $cli->first_name ?>" readonly> </td>
    </tr>
    </tr>
    <tr>
        <td>last_name:</td>
        <td><input type="text" name="last_name" value="<?= $cli->last_name ?>" readonly></td>
    </tr>
    </tr>
    <tr>
        <td>email:</td>
        <td><input type="email" name="email" value="<?= $cli->email ?>" readonly></td>
    </tr>
    </tr>
    <tr>
        <td>gender</td>
        <td><input type="text" name="gender" value="<?= $cli->gender ?>" readonly></td>
    </tr>
    </tr>
    <tr>
        <td>ip_address:</td>
        <td><input type="text" name="ip_address" value="<?= $cli->ip_address ?>" readonly></td>
    </tr>
    </tr>
    <tr>
        <td>telefono:</td>
        <td><input type="tel" name="telefono" value="<?= $cli->telefono ?>" readonly></td>
    </tr>
    </tr>

</table>

<iframe width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q= <?php echo latitud($cli->ip_address).'%20'. longitud($cli->ip_address)?>&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
<p><?php echo longitud($cli->ip_address).'%20'. latitud($cli->ip_address)?></p>
<p><?php echo $cli->ip_address?></p>
<form>
    <input type="hidden" name="id" value="<?= $cli->id ?>">
    <button type="submit" name="nav-detalles" value="Anterior"> Anterior << </button>
            <button type="submit" name="nav-detalles" value="Siguiente"> Siguiente >> </button>
</form>