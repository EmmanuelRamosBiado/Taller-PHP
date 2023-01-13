<form>
    <button type="submit" name="orden" value="Nuevo"> Cliente Nuevo </button><br>
</form>
<br>

<table>
    <tr>
        <th>id
            <form>
                <button type="submit" name="ordenacion" value="id-Asc"> ASC </button>
                <button type="submit" name="ordenacion" value="id-Desc"> DES </button>
            </form>
        </th>
        <th>first_name
            <form>
                <button type="submit" name="ordenacion" value="nom-Asc"> ASC </button>
                <button type="submit" name="ordenacion" value="nom-Desc"> DES </button>
            </form>
        </th>
        <th>email
            <form>
                <button type="submit" name="ordenacion" value="email-Asc"> ASC </button>
                <button type="submit" name="ordenacion" value="email-Desc"> DES </button>
            </form>
        </th>
        <th>gender
            <form>
                <button type="submit" name="ordenacion" value="gen-Asc"> ASC </button>
                <button type="submit" name="ordenacion" value="gen-Desc"> DES </button>
            </form>
        </th>
        <th>ip_address
            <form>
                <button type="submit" name="ordenacion" value="ip-Asc"> ASC </button>
                <button type="submit" name="ordenacion" value="ip-Desc"> DES </button>
            </form>
        </th>
        <th>teléfono
            <form>
                <button type="submit" name="ordenacion" value="tel-Asc"> ASC </button>
                <button type="submit" name="ordenacion" value="tel-Desc"> DES </button>
            </form>
        </th>
    </tr>
    <?php foreach ($tvalores as $valor) : ?>
        <tr>
            <td><?= $valor->id ?></td>
            <td><?= $valor->first_name ?> </td>
            <td><?= $valor->email ?> </td>
            <td><?= $valor->gender ?> </td>
            <td><?= $valor->ip_address ?> </td>
            <td><?= $valor->telefono ?> </td>
            <td><a href="#" onclick="confirmarBorrar('<?= $valor->first_name ?>',<?= $valor->id ?>);">Borrar</a></td>
            <td><a href="?orden=Modificar&id=<?= $valor->id ?>">Modificar</a></td>
            <td><a href="?orden=Detalles&id=<?= $valor->id ?>">Detalles</a></td>

        <tr>
        <?php endforeach ?>
</table>

<form>
    <br>
    <button type="submit" name="nav" value="Primero">
        << </button>
            <button type="submit" name="nav" value="Anterior">
                < </button>
                    <button type="submit" name="nav" value="Siguiente"> > </button>
                    <button type="submit" name="nav" value="Ultimo"> >> </button>
</form>