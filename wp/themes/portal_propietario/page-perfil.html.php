<?php
/**
 * Template Name: page-perfil.html
 * The template for displaying perfil.html
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package portal_propietario
 */


require_once "self/security.php";

$inmueble = get_posts(array(
    'post_type' => 'inmueble',
    'author' => get_current_user_id()
))[0];
if (current_user_can('administrator') && !empty($_GET['user'])) {
  $inmueble = get_posts(array(
    'post_type' => 'inmueble',
    'author' => $_GET['user']
  ))[0];
}


if ($_SERVER['REQUEST_METHOD'] == 'POST' || $inmueble) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && !$inmueble) {
      $user_id = get_current_user_id();
      if (current_user_can('administrator') && !empty($_GET['user'])) {
        $user_id = $_GET['user'];
      } else if (empty($_GET['user'])) {
        $user_id = wp_create_user( $_POST['inmueble-owner-email'], '1', '' );
        $_GET['user'] = $user_id;
        $display_name = '';
        if ( isset( $_POST['inmueble-owner-name'] ) ) {
          $display_name .= $_POST['inmueble-owner-name'];
        }
        if ( isset( $_POST['inmueble-owner-lastname'] ) ) {
          $display_name .= ' ' . $_POST['inmueble-owner-lastname'];
        }
        if ( isset( $_POST['inmueble-owner-lastname2'] ) ) {
          $display_name .= ' ' . $_POST['inmueble-owner-lastname2'];
        }

        $userdata = array(
          'ID'           => $user_id,
          'display_name' => $display_name,
        );
        wp_update_user( $userdata );
      }
      
        $inmueble_id = wp_insert_post(array(
            'post_type' => 'inmueble',
            'post_title' => 'inmueble-' . $user_id,
            'post_status' => 'publish',
            'post_author' => $user_id
        ));
    
        foreach ($_POST as $key => $value) {
            update_post_meta($inmueble_id, 'meta-' . $key, $value);
        }
    }
    
    require('page-perfil2.html.php');

} else {
function myCss() {
    echo '<link rel="stylesheet" type="text/css" href="'.get_bloginfo('stylesheet_directory').'/assets/css/perfil.css">';
    //echo '<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/base.min.css">';
    echo '<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css">';
    echo '<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>';
}
add_action('wp_head', 'myCss');


get_header();
?>

<main id="primary" class="site-main">

    
    <div class="main">

    <?php
if (current_user_can('administrator')) {
    ?>
    <div class="admin-perfil">
      <h4>Eres administrador, si rellenas el formulario, crearás un nuevo usuario e irás a su perfil, o podrás crearlo si aún no lo tiene.</h4>

      <p>Si quieres ver el perfil de un usuario creado, usa este selector</p>
      <select class="js-choice" onchange="window.location.href = '/perfil?user=' + this.value">
        <option value=""></option>

      <?php
foreach (get_users(array('role__in' => array( 'subscriber' ))) as $user) {
  if ( $_GET['user'] == $user->ID) {

      ?>
        <option selected value="<?php echo $user->ID ?>"><?php echo $user->display_name ?></option>
      <?php
  } else {
      ?>
          <option value="<?php echo $user->ID ?>"><?php echo $user->display_name ?></option>
      <?php
  }
}
      ?>
      </select>
    </div>
    <?php
}
    ?>
    <form id="regForm" method="POST">
        <h1>Perfil:</h1>
        <!-- One "tab" for each step in the form: -->
        <div class="tab">Nombre:
          <p><input placeholder="Nombre..." oninput="this.className = ''" name="inmueble-owner-name"></p>
          <p><input placeholder="Primer Apellido..." oninput="this.className = ''" name="inmueble-owner-lastname"></p>
          <p><input placeholder="Segundo Apellido..." oninput="this.className = ''" name="inmueble-owner-lastname2"></p>
          <p>
            <select class="js-choice" name="inmueble-owner-tipodocumento">
              <option value="">Tipo de documento</option>
              <option value="DNI">DNI</option>
              <option value="NIE">NIE</option>           
            </select>
          </p>
          <p><input placeholder="Numero del documento y Letra..." oninput="this.className = ''" name="inmueble-owner-numdocumento"></p>

        </div>
        <div class="tab">Contacto:
          <p><input placeholder="E-mail..." type="email" oninput="this.className = ''" name="inmueble-owner-email"></p>
          <p><input placeholder="Telefono..." type="tel" oninput="this.className = ''" name="inmueble-owner-phone"></p>
        </div>
        <div class="tab">Fecha de Nacimiento:
          <p><input placeholder="Dia" oninput="this.className = ''" name="inmueble-owner-birth-day" type="number"  min="1" max="31"></p>
          <p><input placeholder="Mes" oninput="this.className = ''" name="inmueble-owner-birth-month" type="number"  min="1" max="12"></p>
          <p><input placeholder="Año" oninput="this.className = ''" name="inmueble-owner-birth-year" type="number"  min="1950" max="2020"></p>
        </div>
        <div class="tab">Localización Inmueble:
          <p><input placeholder="Provincia..." oninput="this.className = ''" name="inmueble-provincia"></p>
          <p><input placeholder="Municipio..." oninput="this.className = ''" name="inmueble-municipio"></p>
          <p><input placeholder="Población..." oninput="this.className = ''" name="inmueble-poblacion"></p>
          <p><input placeholder="Codigo postal..." oninput="this.className = ''" name="inmueble-codigopostal" type="number"></p>
          <p><input placeholder="Dirección..." oninput="this.className = ''" name="inmueble-direccion"></p>
        </div>
        <div class="tab">Superficie inmueble:
          <p><input placeholder="Habitaciones..." oninput="this.className = ''" name="inmueble-habitaciones" type="number" min="1" max="10"></p>
          <p><input placeholder="Metros2 Construidos..." oninput="this.className = ''" name="inmueble-m2construidos" type="number"></p>
          <p><input placeholder="Metros2 Utiles..." oninput="this.className = ''" name="inmueble-m2utiles" type="number"></p>
        </div>
        <div class="tab" >Situación Inmueble:
          <p><select class="js-choice" name="inmueble-tipo">
            <option value="">Tipo de inmueble</option>
            <option value="Piso">Piso</option>
            <option value="Casa">Casa</option> 
            <option value="Atico">Atico</option>          
            <option value="Chalet Independiente">Chalet Independiente</option>
            <option value="Chalet Pareado">Chalet Pareado</option>
            <option value="Chalet Adosado">Chalet Adosado</option>
            <option value="Garaje">Garaje</option>
            <option value="Trastero">Trastero</option>
            </select></p>
          <p><select class="js-choice" name="inmueble-estado">
            <option value="">Estado Inmueble</option>
            <option value="Entrar a vivir">Entrar a vivir</option>
            <option value="Recién reformado">Recién reformado</option>           
            <option value="Regular">Regular</option>
            <option value="Deficiente">Deficiente</option>
            <option value="Ruinoso">Ruinoso</option>
            </select></p>
            <p>
            <input placeholder="Otros..." class="not-required" name="inmueble-otros"></p>
        </div>
        <div class="tab">Precio deseado
          <p><input placeholder="Precio deseado..." oninput="this.className = ''" name="inmueble-preciodeseado" type="number"></p>
        </div>
        <div style="overflow:auto;">
          <div style="float:right;">
            <button type="button" id="prevBtn" onclick="nextPrev(-1)">Anterior</button>
            <button type="button" id="nextBtn" onclick="nextPrev(1)">Siguiente</button>
          </div>
        </div>
        <!-- Circles which indicates the steps of the form: -->
        <div style="text-align:center;margin-top:40px;">
          <span class="step"></span>
          <span class="step"></span>
          <span class="step"></span>
          <span class="step"></span>
          <span class="step"></span>
          <span class="step"></span>
          <span class="step"></span>
        </div>
      </form>
    </div>
</main><!-- #main -->
<script src="<?php echo get_bloginfo('stylesheet_directory').'/assets/js/perfil.js'; ?>"></script>
<script>
  var choicesObjs = document.querySelectorAll('.js-choice');
  var choices = [];
  for (var i = 0; i < choicesObjs.length; i++) {
    choices.push(new Choices(choicesObjs[i], {
      itemSelectText: 'Click para seleccionar',
      searchEnabled: false
    }));
  }
</script>
<?php
get_footer();
}