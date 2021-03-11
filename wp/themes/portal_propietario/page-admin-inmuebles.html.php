<?php
/**
 * Template Name: page-usuarios-admin.html
 * The template for displaying usuarios-admin.html
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package portal_propietario
 */

function myCss() {    
    echo '<link rel="stylesheet" type="text/css" href="'.get_bloginfo('stylesheet_directory').'/assets/css/admin-inmuebles.css">';
    echo '<link rel="stylesheet" type="text/css" href="'.get_bloginfo('stylesheet_directory').'/assets/css/popup.css?cb=' . generate_random_string() . '">';
    echo '<script src="https://unpkg.com/micromodal/dist/micromodal.min.js"></script>';
    echo '<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css">';
    echo '<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>';
    echo '<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" type="text/css">';
    echo '<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" type="text/javascript"></script>';
}
add_action('wp_head', 'myCss');

if ( ! function_exists( 'getAllUsersForAdmin' ) ) require_once( get_template_directory() . '/self/users-stuff.php' );
get_header();
?>

<main id="primary" class="site-main">
    <div class="main">
<?php
foreach (getAllUsersForAdmin() as $user) {
    echo json_encode(getInmueblesOfUser($user));
?>
        <button type="button" class="collapsible"><?php echo $user->display_name; ?>
            <div class="funciones">
                <i class="fas fa-edit"></i>
                <i class="fas fa-folder"></i>
                <i class="fas fa-money-check-alt"></i>
                <i class="fas fa-calendar-alt"></i>
                <i class="fas fa-trash-alt"></i>
            </div>
        </button>
        <div class="content">
            <div class="main-up-inmuebles">
                <div class="card-wrapper">
                    <button>
                        <a href="perfil-inmueble.html">
                            <img src="../casa1.jpg" alt="Avatar" style="width:100%">
                            <h3>SE ALQUILA <i class="fas fa-edit"></i> <i class="fas fa-ban"></i></h3>
                            <h4><b>145.000€</b></h4>
                            <p>Casa moderna con piscina, zona ajardina, garaje con 3 plazas.</p>
                        </a>
                    </button>
                </div>
            </div>

        </div>
<?php
}
?>
    <script>

MicroModal.init();

var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.display === "block") {
      content.style.display = "none";
    } else {
      content.style.display = "block";
    }
  });
}

    </script>
</main><!-- #main -->

<?php
get_footer();