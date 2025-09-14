wp.domReady( function() {
    // Variante : gauche 3/5, droite 2/5
    wp.blocks.registerBlockVariation(
        'core/columns',
        {
            name: 'col-fluid-3-2',
            title: 'RH - Block Media',
            description: 'Colonne gauche 3/5 et colonne droite 2/5 en desktop (50/50 large écran, 100% mobile).',
            icon: 'columns',
            attributes: {
                className: 'is-style-col-fluid',
            },
            innerBlocks: [
                [ 'core/column', { className: 'col-3-5' } ],
                [ 'core/column', { className: 'col-2-5' } ],
            ],
            scope: [ 'inserter' ],
        }
    );

    // Variante : gauche 2/5, droite 3/5
    wp.blocks.registerBlockVariation(
        'core/columns',
        {
            name: 'col-fluid-2-3',
            title: 'RH - Block Texte',
            description: 'Colonne gauche 2/5 et colonne droite 3/5 en desktop (50/50 large écran, 100% mobile).',
            icon: 'columns',
            attributes: {
                className: 'is-style-col-fluid',
            },
            innerBlocks: [
                [ 'core/column', { className: 'col-2-5' } ],
                [ 'core/column', { className: 'col-3-5' } ],
            ],
            scope: [ 'inserter' ],
        }
    );
});
