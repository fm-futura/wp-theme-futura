<?php get_header(); ?>

<div class="container-fluid">

    <div id="content" class="clearfix row-fluid">

        <div id="main" class="programacion span8 clearfix" role="main">
            <ul class="semana span12">
                <li data-dia="1">Lunes</li>
                <li data-dia="2">Martes</li>
                <li data-dia="3">Miércoles</li>
                <li data-dia="4">Jueves</li>
                <li data-dia="5">Viernes</li>
                <li data-dia="6">Sábado</li>
                <li data-dia="7">Domingo</li>                
            </ul>
            <ul class="semana reduced span12">
                <li data-dia="1">Lun</li>
                <li data-dia="2">Mar</li>
                <li data-dia="3">Mié</li>
                <li data-dia="4">Jue</li>
                <li data-dia="5">Vie</li>
                <li data-dia="6">Sáb</li>
                <li data-dia="7">Dom</li>
            </ul>
            <ul id="listado_programas">                            
                <?php
                $query = query_programacion();
                if ($query->have_posts()) {
                    while ($query->have_posts()) {
                        $query->the_post();
                        $pod = pods('programas', get_the_ID());
                        $dias = '';
                        
                        if (is_array($pod->field('dia'))) {
                            foreach ($pod->field('dia') as $dia) {
                                $dias .= $dia.',';
                            }
                        }else{                            
                            foreach ($pod->field('dia') as $dia) {
                                $dias .= $dia.',';
                            }                            
                        }
                        
                        ?>
                        <li data-dia="<?php echo $dias; ?>" data-content="<?php if(get_the_content()){echo true;} ?>">
                            <header class="info_container">
                                <div>
                                    <h2><?php the_title(); ?></h2>
                                    <div class="meta">
                                        <span class="transm"><?php echo $pod->field('transmisiones'); ?></span><?php echo $pod->display('horario_inicio') ?> a <?php echo $pod->display('horario_finalizacion') ?> hs / <?php echo $pod->field('categoria') ?>
                                    </div>
                                </div>
                                <?php if(get_the_content()){
                                    ?>
                                <div class="plus_button">
                                    <a class="mdi mdi-plus"></a>
                                </div>
                                        <?php
                                } ?>
                            </header>
                            <article class="programa_info" class="true">
                                <?php the_content(); ?>
                            </article>
                        </li>
                        <?php
                    }
                }
                ?>
            </ul>
            <ul class="programas span12" data-dia="1"></ul>
            <ul class="programas span12" data-dia="2"></ul>
            <ul class="programas span12" data-dia="3"></ul>
            <ul class="programas span12" data-dia="4"></ul>
            <ul class="programas span12" data-dia="5"></ul>
            <ul class="programas span12" data-dia="6"></ul>
            <ul class="programas span12" data-dia="7"></ul>
        </div> <!-- end #main -->

        <?php get_sidebar(); // sidebar 1 ?>

    </div> <!-- end #content -->
</div>

<?php get_footer(); ?>

