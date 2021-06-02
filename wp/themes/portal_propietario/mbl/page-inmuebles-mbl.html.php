<?php
/**
 * Template Name: page-inmuebles-mbl.html
 * The template for displaying inmuebles-mbl.html
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package portal_propietario
 */
require_once __DIR__ . "/../self/security.php";

function myCss() {
    echo '<link rel="stylesheet" type="text/css" href="'.get_bloginfo('stylesheet_directory').'/assets/css/inmuebles-mbl.css">';
}
add_action('wp_head', 'myCss');


get_header();
?>

<main id="primary" class="site-main">
    <div class="main">
        <div class="inm-mbl">
            <h2>Ofertas Recibidas <i class="fas fa-house-user"></i></h2>
            <hr>
            <div class="espacio-caja">
                <button type="button" class="collapsible">INMUEBLE 1</button>
                <div class="content">
                    <table>
                        <tbody>
                            <tr>
                                <th>Dirección:</th>
                                <td>C/Marineros</td>
                            </tr>
                            <tr>
                                <th>Metros:</th>
                                <td>150 m2</td>
                            </tr>
                            <tr>
                                <th>Oferta:</th>
                                <td>Alquiler</td>
                            </tr>
                            <tr>
                                <th>Precio:</th>
                                <td>750€</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="funciones">
                        <!-- popup al pulsar el checke mostando las opciones aceptar denegar o contraoferta -->
                        <a id="descripcion" href="#"><i class="far fa-address-card"></i></a>
                        <!-- popup calendario para modificar feche de cita -->
                        <a id="edit-img" href="#"><i class="far fa-images"></i></a>
                    </div>
                </div>
            </div>
            <div class="espacio-caja">
                <button type="button" class="collapsible">INMUEBLE 2</button>
                <div class="content">
                    <table>
                        <tbody>
                            <tr>
                                <th>Dirección:</th>
                                <td>C/Pescadores</td>
                            </tr>
                            <tr>
                                <th>Metros:</th>
                                <td>50 m2</td>
                            </tr>
                            <tr>
                                <th>Oferta:</th>
                                <td>Compra</td>
                            </tr>
                            <tr>
                                <th>Precio:</th>
                                <td>85.000€</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="funciones">
                        <!-- popup al pulsar el checke mostando las opciones aceptar denegar o contraoferta -->
                        <a id="descripcion" href="#"><i class="far fa-address-card"></i></a>
                        <!-- popup calendario para modificar feche de cita -->
                        <a id="edit-img" href="#"><i class="far fa-images"></i></a>
                    </div>
                </div>
            </div>
            <div class="espacio-caja">
                <button type="button" class="collapsible">INMUEBLE 3</button>
                <div class="content">
                    <table>
                        <tbody>
                            <tr>
                                <th>Dirección:</th>
                                <td>Av.Hellin</td>
                            </tr>
                            <tr>
                                <th>Metros:</th>
                                <td>80 m2</td>
                            </tr>
                            <tr>
                                <th>Oferta:</th>
                                <td>Alquiler</td>
                            </tr>
                            <tr>
                                <th>Precio:</th>
                                <td>900€</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="funciones">
                        <!-- popup al pulsar el checke mostando las opciones aceptar denegar o contraoferta -->
                        <a id="descripcion" href="#"><i class="far fa-address-card"></i></a>
                        <!-- popup calendario para modificar feche de cita -->
                        <a id="edit-img" href="#"><i class="far fa-images"></i></a>
                    </div>
                </div>
            </div>
            <div class="espacio-caja">
                <button type="button" class="collapsible">INMUEBLE 4</button>
                <div class="content">
                    <table>
                        <tbody>
                            <tr>
                                <th>Dirección:</th>
                                <td>C/Las Musas</td>
                            </tr>
                            <tr>
                                <th>Metros:</th>
                                <td>75 m2</td>
                            </tr>
                            <tr>
                                <th>Oferta:</th>
                                <td>Compra</td>
                            </tr>
                            <tr>
                                <th>Precio:</th>
                                <td>100.000€</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="funciones">
                        <!-- popup al pulsar el checke mostando las opciones aceptar denegar o contraoferta -->
                        <a id="descripcion" href="#"><i class="far fa-address-card"></i></a>
                        <!-- popup calendario para modificar feche de cita -->
                        <a id="edit-img" href="#"><i class="far fa-images"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pop ups para las diferentes funciones -->

        <div class="descripcion">
            <div class="perfil-inmueble">
                <h2>Perfil Inmueble</h2>
                <h3>INFORMACIÓN DEL INMUEBLE</h3>
                <hr>
                <div class="inmueble">
                    <div class="fila">
                        <div>
                            <label for="tipo-de-inmueble">Tipo de inmueble</label>
                            <input type="text" id="inmueble" name="tipo-inmueble" placeholder="Tipo de inmueble">
                        </div>
                        <div>
                            <label for="disponibilidad">Disponibilidad</label>
                            <input type="text" id="disponibilidad" name="disponibilidad" placeholder="valor">
                        </div>
                        <div>
                            <label for="Estado">Estado</label>
                            <input type="text" id="estado" name="estado" placeholder="Estado">
                        </div>
                        <div>
                            <label for="valor">Valor</label>
                            <input type="text" id="valor" name="valor" placeholder="valor">
                        </div>
                        <div>
                            <label for="habitaciones">Habitaciones</label>
                            <input type="text" id="habitaciones" name="habitaciones" placeholder="habitaciones">
                        </div>
                        <div>
                            <label for="baños">Baños</label>
                            <input type="text" id="baños" name="baños" placeholder="baños">
                        </div>
                        <div>
                            <label for="salones">Salones</label>
                            <input type="text" id="salones" name="salones" placeholder="salones">
                        </div>
                        <div>
                            <label for="terrazas">Terrazas</label>
                            <input type="text" id="terrazas" name="terrazas" placeholder="terrazas">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="localizacion">
                    <h3>Localización</h3>
                    <hr>
                    <div class="fila">
                        <div>
                            <label for="pais">Pais</label>
                            <input type="text" id="pais" name="pais" placeholder="pais">
                        </div>
                        <div>
                            <label for="provincia">Provincia</label>
                            <input type="text" id="provincia" name="provincia" placeholder="provincia">
                        </div>
                        <div>
                            <label for="municipio">Municipio</label>
                            <input type="text" id="municipio" name="municipio" placeholder="municipio">
                        </div>
                        <div>
                            <label for="poblacion">Población</label>
                            <input type="text" id="poblacion" name="poblacion" placeholder="población">
                        </div>
                        <div>
                            <label for="via">Tipo de Via</label>
                            <input type="text" id="tipo-de-via" name="via" placeholder="Tipo de via">
                        </div>
                        <div class="direccion">
                            <label for="direccion">Dirección</label>
                            <input type="text" id="direccion" name="direccion" placeholder="direccion">
                        </div>
                        <div>
                            <label for="codigo-postal">Codigo Postal</label>
                            <input type="text" id="codigo-postal" name="codigo-postal" placeholder="codigo postal">
                        </div>
                        <div>
                            <label for="numero">Numero</label>
                            <input type="text" id="numero" name="numero" placeholder="numero">
                        </div>
                        <div>
                            <label for="escalera">Escalera</label>
                            <input type="text" id="escalera" name="escalera" placeholder="escalera">
                        </div>
                        <div>
                            <label for="piso-planta">Piso-planta</label>
                            <input type="text" id="piso-planta" name="piso-planta" placeholder="piso/planta">
                        </div>
                        <div>
                            <label for="puerta">Puerta</label>
                            <input type="text" id="puerta" name="puerta" placeholder="puerta">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="superficie">
                    <h3>Superficie</h3>
                    <hr>
                    <div class="fila">
                        <div>
                            <label for="superficie-util">Superficie Util</label>
                            <input type="text" id="superficie-util" name="superficie-util" placeholder="superficie util">
                        </div>
                        <div>
                            <label for="superficie-construida">Superficie Construida</label>
                            <input type="text" id="superficie-construida" name="superficie-construida" placeholder="superficie construida">
                        </div>
                        <!-- div class terreno solo si es un chalet de cualquiera de los 3 tipos -->
                        <div class="terreno">
                            <label for="superficie-parcela">Superficie Parcela</label>
                            <input type="text" id="superficie-parcela" name="superficie-parcela" placeholder="superficie parcela">
                        </div>
                    </div>
                </div>

                <hr>
                <div class="descripcion">
                    <h3>Descripción Del Inmueble</h3>
                    <hr>
                    <div class="fila descripcion">
                        <textarea>Describa su Inmueble</textarea>
                    </div>
                </div>
                <hr>
                <div class="caracteristicas">
                    <h3>Caracteristicas de la Zona</h3>
                    <hr>
                    <div class="fila">
                        <div>
                            <input type="checkbox" id="cbox1" name="cbox1"><label for="cbox1">Garaje</label>
                        </div>
                        <div>
                            <input type="checkbox" id="cbox2" name="cbox2"><label for="cbox2">Ascensor</label>
                        </div>
                        <div>
                            <input type="checkbox" id="cbox3" name="cbox3"><label for="cbox3">Transporte publico</label>
                        </div>
                        <div>
                            <input type="checkbox" id="cbox4" name="cbox4"><label for="cbox4">Centro Urbano</label>
                        </div>
                        <div>
                            <input type="checkbox" id="cbox5" name="cbox5"><label for="cbox5">Comercio</label>
                        </div>
                        <div>
                            <input type="checkbox" id="cbox6" name="cbox6"><label for="cbox6">farmacia</label>
                        </div>
                        <div>
                            <input type="checkbox" id="cbox7" name="cbox7"><label for="cbox7">Parques y Jardines</label>
                        </div>
                        <div>
                            <input type="checkbox" id="cbox8" name="cbox8"><label for="cbox8">Escuelas</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-slider">
            <div class="slider">
                <ul>
                    <li>
                        <img src="<?php echo get_template_directory() . '/assets/img/'?>casa1.jpg" alt="">
                    </li>
                    <li>
                        <img src="<?php echo get_template_directory() . '/assets/img/'?>casa2.jpg" alt="">
                    </li>
                    <li>
                        <img src="<?php echo get_template_directory() . '/assets/img/'?>casa3.jpg" alt="">
                    </li>
                    <li>
                        <img src="<?php echo get_template_directory() . '/assets/img/'?>casa4.jpg" alt="">
                    </li>
                </ul>
            </div>
        </div>
    </div>
</main><!-- #main -->

<?php
get_footer();