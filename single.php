<?php

get_header();

if (have_posts())
{
    while (have_posts())
    {
        the_post();

        ?>
        <div class="container mt-5">
            <div class="row">
                <div class="col">
                    <h1>
                    <?php
                    the_title();
                    ?>
                    </h1>
                </div>
            </div>
        </div>
        <div class="container mt-2 mb-5">
            <div class="row">
                <div class="col">
                    <?php
                    the_content();
                    ?>
                </div>
            </div>
        </div>
        <?php
    }
}

get_footer();

?>