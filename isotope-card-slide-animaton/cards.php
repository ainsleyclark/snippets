<?php 

//Variables

//! MAY not need
$team_cards_content = get_sub_field('content');

?>

<!-- =====================
    Team Cards
    ===================== -->
<section class="team-cards bg-white">
    <div class="container">
    
        <!-- Title -->
        <div class="row mb-5">
            <div class="col-tab-8 col-desk-5">
                <?php //if($team_cards_content) echo $team_cards_content; ?>
            </div><!-- /Col --> 
        </div><!-- /Row -->

        <!-- Isotope Grid -->
        <div class="row team-card-row">
            <!-- Size for Isotope -->
            <div class="grid-sizer col-tab-6 col-desk-4 col-hd-3"></div>
            <?php  
                $terms = get_terms('vacancy_department', array('hide_empty' => false)); 
                foreach( $terms as $term ) { 
                    $image = get_field('image', $term); 
                    ?>
                    <!-- Team Card -->
                    <article class="team-card col-tab-6 col-desk-4 col-hd-3">
                        <div class="team-card-cont">
                            <!-- Front -->
                            <div class="team-card-front">
                                <picture class="team-card-image-cont">
                                    <source class="team-card-image lazy"  media="(max-width: 767px)" data-srcset="<?php echo $image['sizes']['mobile-image']; ?>">
                                    <img class="team-card-image lazy" data-src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>">
                                </picture>
                                <h4 class="team-card-title"><?php if($term->name) echo $term->name; ?></h4>
                                <button class="btn btn-white btn-with-hover">
                                    <h6 class="btn-text">Learn More</h6>
                                    <?php get_template_part('/partials/button-svg'); ?>
                                </button>
                            </div><!-- /Front -->
                            <!-- Back -->
                            <div class="team-card-back">
                                <img class="team-card-close" src="<?php echo ASSETS; ?>/svg/close.svg" alt="">
                                <h4><?php if($term->name) echo $term->name; ?></h4>
                                <p><?php if($term->description) echo $term->description; ?></p>
                                <?php if($term->count != 0) : ?>
                                    <a href="<?php echo get_permalink( get_page_by_title( 'vacancies' ) ) ?>?deparment=<?php echo $term->slug; ?>" class="btn btn-red btn-with-hover">
                                        <h6 class="btn-text"><?php echo $term->count; ?> Position<?php if($term->count > 1) echo 's'; ?></h6>
                                        <?php get_template_part('/partials/button-svg'); ?>
                                    </a>
                                <?php endif ?>
                            </div><!-- /Back -->
                        </div><!-- /Cont -->
                    </article><!-- /Card --> 
                <?php } ?>
        </div><!-- /Row -->
        
    </div><!-- /Container --> 
</section>