<?php 
get_header();
?>
<main class="site-content">
    <section class="hero bg-dark">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="headline">Headline</h1>
                    <span class="subheadline">Subheadline</span>
                </div>
                <div class="col">
                    <? get_template_part('includes/content-parts/content','get-started-form'); ?>
                </div>
            </div>
        </div>
    </section>
    <section class="problem">
        <div class="problem__problem bg-light row">
            <div class="container">
                <h2 class="headline">The Problem with most Fad Diets</h2>
            </div>
        </div>
        <div class="problem__success row">
            <div class="container">
                <h2 class="headline">With a macro coach, you can...</h2>
            </div>
        </div>
    </section>
    <aside class="testimonials bg-dark">
        <? get_template_part('includes/content-parts/content','testimonials'); ?>
    </aside>
    <section class="plan">
        <div class="container">
            <div class="row">
                <h2 class="headline">The Benefits of One-on-One Macro Coaching</h2>
            </div>
        </div>
    </section>
    <section class="about bg-dark">
        <div class="container">
            <div class="row">
                <div class="col bg-light">
                    <h2 class="headline">About Me</h2>
                </div>
                <div class="col">
                    <figure><img src="" alt=""></figure>
                </div>
            </div>
        </div>
    </section>
    <aside class="instagram">
        <div class="container">
            <h2 class="headline">Follow Me</h2><span class="subheadline">@idreamofmacros on Instagram</span>Instagram
        </div>
    </aside>
    <aside class="get-started bg-light">
        <div class="container">
            <div class="row">
                <? get_template_part('includes/content-parts/content','get-started-form'); ?>
            </div>
        </div>
    </aside>
</main>
<?php get_footer();?>