<div class="">
    <div class="">
        <div>
            <p class="date"><?= get_field('date') ?></p>
            <p><?= get_field('name_journal') ?></p>
        </div>
        <a href="<?= get_field('pdf') ?>" target="_blank" class="">
            <?= the_title(); ?>
            <svg id="vuesax_outline_export" data-name="vuesax/outline/export" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14">
                <g id="vuesax_outline_export-2" data-name="vuesax/outline/export">
                    <g id="export">
                        <path id="Vector" d="M.127,5.529a.44.44,0,0,1,0-.618L4.91.127a.437.437,0,0,1,.618.618L.745,5.529a.437.437,0,0,1-.618,0Z" transform="translate(7.147 1.197)" fill="#292d32"/>
                        <path id="Vector-2" data-name="Vector" d="M2.8,3.238V.875H.438A.441.441,0,0,1,0,.438.441.441,0,0,1,.438,0h2.8a.441.441,0,0,1,.438.438v2.8a.438.438,0,1,1-.875,0Z" transform="translate(9.595 0.729)" fill="#292d32"/>
                        <path id="Vector-3" data-name="Vector" d="M4.521,12.542C1.353,12.542,0,11.188,0,8.021v-3.5C0,1.353,1.353,0,4.521,0H5.688a.441.441,0,0,1,.438.438.441.441,0,0,1-.437.438H4.521C1.832.875.875,1.832.875,4.521v3.5c0,2.689.957,3.646,3.646,3.646h3.5c2.689,0,3.646-.957,3.646-3.646V6.854a.438.438,0,1,1,.875,0V8.021c0,3.168-1.353,4.521-4.521,4.521Z" transform="translate(0.729 0.729)" fill="#292d32"/>
                        <path id="Vector-4" data-name="Vector" d="M14,0V14H0V0Z" fill="none" opacity="0"/>
                    </g>
                </g>
            </svg>
        </a>
    </div>
</div>