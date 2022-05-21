<?php get_header(); ?>
<main>
    <section id="landingPage">
        <div id="landingText">
            <h1>Welcome to SpaceX</h1>
            <p>Making life multiplanetary</p>
        </div>
    </section>
    <section id="rockets">
        <?php echo do_shortcode('[showRocketsData]'); ?>
    </section>
    <?php get_footer(); ?>
</main>