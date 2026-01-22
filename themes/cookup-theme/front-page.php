<?php get_header(); ?>

<section class="hero">
    <div class="hero-overlay">
        <div class="hero-content">
            <h1>CookUp - Delicious Recipes</h1>
            <p>Discover easy and tasty meals for every day</p>
            <a href="/recipes" class="hero-cta">View Recipes</a>
        </div>
    </div>
</section>

<div class="home-sections">

    <!-- The latest 3 recipes -->
    <section class="latest-recipes">
        <h2>Latest Recipes</h2>
        <div class="recipe-grid">
            <?php
            $latest = new WP_Query([
                'post_type' => 'post',
                'posts_per_page' => 3
            ]);
            if ($latest->have_posts()):
                while ($latest->have_posts()): $latest->the_post(); ?>
                    <article class="recipe-card">
                        <a href="<?php the_permalink(); ?>">
                            <?php if (has_post_thumbnail()): the_post_thumbnail('medium');
                            endif; ?>
                            <h3><?php the_title(); ?></h3>
                        </a>
                    </article>
                <?php endwhile;
                wp_reset_postdata();
            else: ?>
                <p>No recipes found.</p>
            <?php endif; ?>
        </div>
    </section>

    <!-- Categories -->
    <section class="recipe-categories">
        <h2>Explore by Category</h2>
        <div class="category-grid">
            <?php
            $categories = get_categories([
                'taxonomy'     => 'category',      // Regular post categories
                'hide_empty'   => false,           // Display even if there are no posts
                'number'       => 6,               // Maximum of 6 categories
                'child_of'     => get_cat_ID('Recipes'), // Take only the subcategories of Recipes
                'exclude'      => get_cat_ID('Recipes')  // Exclude the Recipes category itself
            ]);
            foreach ($categories as $cat): ?>
                <a href="<?php echo get_category_link($cat->term_id); ?>" class="category-card">
                    <h3><?php echo $cat->name; ?></h3>
                </a>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- 🔹 Subscribe / Newsletter -->
    <section class="newsletter">
        <h2>Stay Updated</h2>
        <p>Subscribe to get the latest recipes straight to your inbox.</p>

        <?php
        if (isset($_POST['subscribe_email'])) {
            $email = sanitize_email($_POST['subscribe_email']);

            // Check if such an email already exists
            $existing = get_posts([
                'post_type' => 'subscriber',
                'title' => $email,
                'post_status' => 'publish',
                'numberposts' => 1
            ]);

            if ($existing) {
                echo '<p style="color:orange;">You are already subscribed!</p>';
            } else {
                // Create a new post of type subscriber
                $new_subscriber = [
                    'post_title' => $email,
                    'post_type' => 'subscriber',
                    'post_status' => 'publish',
                ];

                $post_id = wp_insert_post($new_subscriber);

                if ($post_id) {
                    // Save the subscription date
                    update_post_meta($post_id, 'subscribe_date', current_time('mysql'));
                    echo '<p style="color:green;">Thank you for subscribing!</p>';
                } else {
                    echo '<p style="color:red;">There was an error. Please try again.</p>';
                }
            }
        }
        ?>

        <form method="post">
            <input type="email" name="subscribe_email" placeholder="Enter your email" required>
            <button type="submit">Subscribe</button>
        </form>
    </section>

</div>

<?php get_footer(); ?>
