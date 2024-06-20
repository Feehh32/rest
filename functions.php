<!-- https://github.com/CMB2/CMB2/wiki/Field-Types - tipos de campos -->

<?php 


function get_field($key, $page_id = 0){
    $id = $page_id !== 0 ? $page_id : get_the_id();
    return get_post_meta($id, $key, true );
}

function the_field($key, $page_id = 0){
    echo get_field($key, $page_id);
}

// funções de campo da página Home/Menu da semana 
add_action('cmb2_admin_init', 'cmb2_fields_home');
function cmb2_fields_home() {
    // adiciona um bloco
   $cmbBox = new_cmb2_box([
        'id' => 'home_box', //id deve ser único
        'title' => 'Menu da Semana',
        'object_types' => ['page'],
        'show_on' => [
            'key' => 'page-template',
            'value' => 'page-home.php',
        ],// modelo da página
    ]);

    //  adiciona um campo ao bloco criado
    $cmbBox->add_field([
        'name' => 'Comida',
        'id' => 'comida',
        'type' => 'text',
    ]);
}

// Funções de campo da pógina Sobre
add_action('cmb2_admin_init', 'cmb2_fields_sobre');
function cmb2_fields_sobre() {
    $cmbBox = new_cmb2_box([
        'id' => 'sobre_box',
        'title' => 'Sobre',
        'object_types' => ['page'],
        'show_on' => [
            'key' => 'page-template',
            'value' => 'page-sobre.php',
        ],
    ]);

    $cmbBox->add_field([
        'name' => 'Foto Rest',
        'id' => 'foto_rest',
        'type' => 'file',
        'options' => [
            'url' => false,
        ],
    ]); 
}
?>