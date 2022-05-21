<?php
/*
Plugin Name: cPress
description: cPress allows you to display SpaceX rockets in your WordPress site.
*/
add_action('wp_footer', 'my_footer_scripts');
function my_footer_scripts()
{

    wp_register_style('css', plugins_url('/css/style.css', __FILE__));
    wp_enqueue_style('css');
    wp_register_script('js', plugins_url('/js/script.js', __FILE__));
    wp_enqueue_script('js');
}

if (!function_exists('cP_getRockets')) :
    function cP_getRockets()
    {
        // fetch data from SpaceX API
        $url = 'https://api.spacexdata.com/v4/rockets';
        $response = wp_remote_get($url);
        $body = wp_remote_retrieve_body($response);
        $data = json_decode($body);
        $rockets = $data;
        return $rockets;
    }
endif;
?>

<?php function rocketsData()
{ ?>
    <?php $content = null ?>
    <div class="container">
        <h2>Rockets</h2>
        <div id="rocketCardContainer">
            <div id="commands">
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>
            <?php $rockets = cP_getRockets();
            foreach ($rockets as $rocket) {
                ob_start();
            ?>
                <div class="rocketCard">
                    <div class="rocketCardBody">
                        <div class="cardLeft">
                            <div class="rocketCardImageContainer">
                                <img class="rocketImg" src="<?php echo $rocket->flickr_images[0] ?>" alt="<?php echo $rocket->name ?>">
                                <div class="rocketImgAfter" style="background-image: url(<?php echo $rocket->flickr_images[0] ?>)"></div>
                            </div>
                            <h3><?php echo $rocket->name ?></h3>
                        </div>
                        <div class="cardRight">
                            <div class="rocketCardDescription">
                                <p><?php echo $rocket->description ?></p>
                            </div>
                            <div class="rocketCardDetails">
                                <div>
                                    <p>First Flight: <?php echo $rocket->first_flight ?></p>
                                    <p>Cost: <?php echo $rocket->cost_per_launch ?> $</p>
                                    <p>Success Rate: <?php echo $rocket->success_rate_pct ?>%</p>
                                </div>
                                <div>
                                    <p>Height: <?php echo $rocket->height->meters ?> m</p>
                                    <p>Diameter: <?php echo $rocket->diameter->meters ?> m</p>
                                    <p>Mass: <?php echo $rocket->mass->kg ?> kg</p>
                                    <p>Engine(s): <?php echo $rocket->engines->number . ' ' . $rocket->engines->type . ' ' . $rocket->engines->version ?></p>
                                </div>
                            </div>
                            <a class="link" href="<?php echo $rocket->wikipedia ?>">Click to learn more</a>
                        </div>
                    </div>
                </div>
                <?php $content = ob_get_contents() ?>
            <?php } ?>
        </div>
        <?php ob_end_clean() ?>
        <?php return $content ?>
    </div>
<?php } ?>

<?php
add_shortcode('showRocketsData', 'rocketsData');
?>