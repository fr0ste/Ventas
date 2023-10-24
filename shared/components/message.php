<?php
class AlertComponent {
    public static function mostrarAlerta($tipo, $mensaje) {
        echo '<div class="alert alert-' . $tipo . ' alert-dismissible" role="alert">';
        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
        echo '<span aria-hidden="true">&times;</span></button>';
        echo $mensaje;
        echo '</div>';
    }
}
?>