<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>
<div class="demo-2">
    <div class="page-view">
        <?php foreach ($rows as $id => $row): ?>
            <?php print $row; ?>
        <?php endforeach; ?>
        <nav class="arrows">
            <div class="arrow previous">
                <svg viewBox="208.3 352 4.2 6.4">
                    <polygon class="st0" points="212.1,357.3 211.5,358 208.7,355.1 211.5,352.3 212.1,353 209.9,355.1"/>
                </svg>
            </div>
            <div class="arrow next">
                <svg viewBox="208.3 352 4.2 6.4">
                    <polygon class="st0" points="212.1,357.3 211.5,358 208.7,355.1 211.5,352.3 212.1,353 209.9,355.1"/>
                </svg>
            </div>
        </nav>
    </div>
</div>