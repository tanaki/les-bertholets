<div class="block block-post-content page-content">
    <div class="block-inside">
        <?php the_content(); ?>
    </div>
</div>
<?php  
    get_template_part('template-parts/common/block-content', null, [
        "title" => "Valeurs et vision",
        "content" => "<p><strong>Respect du patrimoine</strong> </p>
        <p>Des objets d’art, de leur histoire, et du travail des conservateurs.</p>
        <p><strong>Transmission & pédagogie</strong></p>
        <p>Engagement fort dans la formation, les échanges interprofessionnels et l’enseignement (INP, journées interprofessionnelles...).</p>
        <p><strong>Justesse & excellence</strong></p>
        <p>une recherche constante d’équilibre entre technicité, éthique, et pertinence des choix.</p>
        <p><strong>Harmonie</strong></p>
        <p>une approche sensible, presque sacrée, du temps, des matériaux, et de la restauration.</p>",
        "className" => "bg-purple-light bg-has-circles"
    ]);
?>