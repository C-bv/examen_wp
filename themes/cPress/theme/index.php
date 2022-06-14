<?php get_header(); ?>
<main>
    <section id="landingPage">
        <div id="landingText">
            <h1>Welcome to SpaceX</h1>
            <p>Making life multiplanetary</p>
        </div>
    </section>
    <section id="moonSection">
        <div id='moonMission'>
            <h2>Mission</h2>
            <h1>Moon</h1>
            <p>RETURNING HUMANS TO OUR LUNAR NEIGHBOR</p>
            <a id="learnMore" href="https://www.spacex.com/human-spaceflight/moon/index.html" target="_blank" rel="noopener noreferrer">Learn More</a>
        </div>
    </section>
    <section id="issSection">
        <div id='issMission'>
            <h2>Transportation</h2>
            <h1>ISS</h1>
            <p>TRANSPORTING HUMANS TO THE ORBITING LABORATORY IN THE SKY</p>
            <?php echo do_shortcode('[metaslider id="40"]'); ?>
        </div>
    </section>
    <section id="rockets">
        <?php echo do_shortcode('[showRocketsData]'); ?>
    </section>
    <?php get_footer(); ?>
</main>