<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
   
         return [
        'title' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'featured_description' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'slug' => $faker->slug,
        'body' => '<p>For those of us who want to say thank you to our moms, it&rsquo;s not always easy to put those big feelings in words. Which is where Dribbble comes in.</p>

<p>These eight shots crystallize the hard work moms put into keeping their kids alive, happy, and healthy. They might give you the inspiration you need for filling out that card&mdash;or stand alone for your mom&rsquo;s interpretation.</p>

<p><img alt="img" src="http://localhost/blog/public/images/posts/1568212876.jpg" /></p>

<p>Drawn for an insurance company</p>

<p>Moms are the ones who bandage our boo-boos when we&rsquo;re little and continue to take care of us as we get older&mdash;often sacrificing their own needs so they can help with ours. Cruising on a bike to help heal our injuries is the most mom thing one can do.</p>

<p><a href="#"><img alt="add one" src="http://localhost/blog/public/images/posts/1568212876.jpg" /></a></p>

<blockquote>
<p>If you&rsquo;ve been waiting for an invitation, this calligraphy is it. Commissioned by Facebook, this is a hand-lettered design for a poster. Quote is Facebook Building 8 VP&rsquo;s Regina Dugan&mdash;and mine.</p>
</blockquote>

<p>Moms are the ones who bandage our boo-boos when we&rsquo;re little and continue to take care of us as we get older&mdash;often sacrificing their own needs so they can help with ours. Cruising on a bike to help heal our injuries is the most mom thing one can do.</p>

<p>They&rsquo;re the ones we rely on for playdates and emotional support, homework help and babysitting. Moms are the ultimate dependable support. Like, hopefully, the button on your jeans.</p>

<h3>Here Come The Moms In Space</h3>

<ul>
	<li><img alt="img" src="http://localhost/blog/public/images/posts/1568212876.jpg" />
	<p>Drawn for an insurance company</p>
	</li>
	<li><img alt="img" src="http://localhost/blog/public/images/posts/1568212876.jpg" />
	<p>Drawn for an insurance company</p>
	</li>
</ul>
<!-- End of .gallery -->

<p>Moms are like&hellip;buttons? Moms are like glue. Moms are like pizza crusts. Moms are the ones who make sure things happen&mdash;from birth to school lunch.</p>

<p>They&rsquo;re the ones we rely on for playdates and emotional support, homework help and babysitting. Moms are the ultimate dependable support. Like, hopefully, the button on your jeans.</p>

<p>My hero when I was a kid was my mom. Same for everyone I knew. Moms are untouchable. They&rsquo;re elegant, smart, beautiful, kind&hellip;everything we want to be. At 29 years old, my favorite compliment is being told that I look like my mom. Seeing myself in her image, like this daughter up top, makes me so proud of how far I&rsquo;ve come, and so thankful for where I come from.</p>

<h3>Want To See More Dribbble Shots?</h3>

<p>Moms are like&hellip;buttons? Moms are like glue. Moms are like pizza crusts. Moms are the ones who make sure things happen&mdash;from birth to school lunch.</p>

<p>They&rsquo;re the ones we rely on for playdates and emotional support, homework help and babysitting. Moms are the ultimate dependable support. Like, hopefully, the button on your jeans.</p>

<p>My hero when I was a kid was my mom. Same for everyone I knew. Moms are untouchable. They&rsquo;re elegant, smart, beautiful, kind&hellip;everything we want to be. At 29 years old, my favorite compliment is being told that I look like my mom. Seeing myself in her image, like this daughter up top, makes me so proud of how far I&rsquo;ve come, and so thankful for where I come from.</p>

<p>Drawn for an insurance company</p>

<p>Mother&rsquo;s Day is this Sunday, folks!</p>

<p>These eight shots crystallize the hard work moms put into keeping their kids alive, happy, and healthy. They might give you the inspiration you need for filling out that card&mdash;or stand alone for your mom&rsquo;s interpretation.</p>

<ul>
	<li>
	<p><img alt="" src="assets/images/single-masonry-gallery/gallery-1.png" /></p>
	</li>
	<li>
	<p><img alt="" src="assets/images/single-masonry-gallery/gallery-2.png" /></p>
	</li>
	<li>
	<p><img alt="" src="assets/images/single-masonry-gallery/gallery-3.png" /></p>
	</li>
	<li>
	<p><img alt="" src="assets/images/single-masonry-gallery/gallery-4.png" /></p>
	</li>
</ul>
<!-- End of .gallery -->

<p>For those of us who want to say thank you to our moms, it&rsquo;s not always easy to put those big feelings in words. Which is where Dribbble comes in.</p>

<h3>Moms On The Move</h3>

<p>Drawn for an insurance company, this animation of a mom with a first-aid kit and a flashing red light exemplifies the mother&rsquo;s job.</p>

<p>Moms are the ones who bandage our boo-boos when we&rsquo;re little and continue to take care of us as we get older&mdash;often sacrificing their own needs so they can help with ours. Cruising on a bike to help heal our injuries is the most mom thing one can do.</p>

<p>Moms are the ones who bandage our boo-boos when we&rsquo;re little and continue to take care of us as we get older&mdash;often sacrificing their own needs so they can help with ours. Cruising on a bike to help heal our injuries is the most mom thing one can do.</p>

<blockquote>
<p>If you&rsquo;ve been waiting for an invitation, this calligraphy is it. Commissioned by Facebook, this is a hand-lettered design for a poster. Quote is Facebook Building 8 VP&rsquo;s Regina Dugan&mdash;and mine.</p>
</blockquote>

<p>Moms are like&hellip;buttons? Moms are like glue. Moms are like pizza crusts. Moms are the ones who make sure things happen&mdash;from birth to school lunch.</p>

<p>Drawn for an insurance company</p>

<p>They&rsquo;re the ones we rely on for playdates and emotional support, homework help and babysitting. Moms are the ultimate dependable support. Like, hopefully, the button on your jeans.</p>

<h3>Unordered List Style?</h3>

<ul>
	<li>The refractor telescope uses a convex lens to focus the light on the eyepiece.</li>
	<li>The reflector telescope has a concave lens which means it bends in. It uses mirrors to focus the image that you eventually see.</li>
	<li>Collimation is a term for how well tuned the telescope is to give you a good clear image of what you are looking at. You want your telescope to have good collimation so you are not getting a false image of the celestial body.</li>
	<li>Aperture is a fancy word for how big the lens of your telescope is. But it&rsquo;s an important word because the aperture of the lens is the key to how powerful your telescope is. Magnification has nothing to do with it, its all in the aperture.</li>
	<li>Focuser is the housing that keeps the eyepiece of the telescope, or what you will look through, in place. The focuser has to be stable and in good repair for you to have an image you can rely on.</li>
	<li>Mount and Wedge. Both of these terms refer to the tripod your telescope sits on. The mount is the actual tripod and the wedge is the device that lets you attach the telescope to the mount.</li>
</ul>

<p>Moms are like&hellip;buttons? Moms are like glue. Moms are like pizza crusts. Moms are the ones who make sure things happen&mdash;from birth to school lunch.</p>

<p>They&rsquo;re the ones we rely on for playdates and emotional support, homework help and babysitting. Moms are the ultimate dependable support. Like, hopefully, the button on your jeans.</p>

<p>Drawn for an insurance company</p>

<p>My hero when I was a kid was my mom. Same for everyone I knew. Moms are untouchable. They&rsquo;re elegant, smart, beautiful, kind&hellip;everything we want to be. At 29 years old, my favorite compliment is being told that I look like my mom. Seeing myself in her image, like this daughter up top, makes me so proud of how far I&rsquo;ve come, and so thankful for where I come from.</p>

<h3>Want To See More Dribbble Shots?</h3>

<p>Moms are like&hellip;buttons? Moms are like glue. Moms are like pizza crusts. Moms are the ones who make sure things happen&mdash;from birth to school lunch.</p>

<p>They&rsquo;re the ones we rely on for playdates and emotional support, homework help and babysitting. Moms are the ultimate dependable support. Like, hopefully, the button on your jeans.</p>

<p>Your browser does not support the audio element.</p>

<h3>Want To See More Dribbble Shots?</h3>

<p>My hero when I was a kid was my mom. Same for everyone I knew. Moms are untouchable. They&rsquo;re elegant, smart, beautiful, kind&hellip;everything we want to be. At 29 years old, my favorite compliment is being told that I look like my mom. Seeing myself in her image, like this daughter up top, makes me so proud of how far I&rsquo;ve come, and so thankful for where I come from.</p>

<blockquote>
<p><img alt="image" src="http://localhost/blog/public/images/posts/1568212876.jpg" /></p>

<p>If you&rsquo;ve been waiting for an invitation, this calligraphy is it. Commissioned by Facebook, this is a hand-lettered design for a poster. Quote is Facebook Building 8 VP&rsquo;s Regina Dugan&mdash;and mine.</p>
</blockquote>',
        'views' => $faker->numberBetween($min=20,$max=100),
        'user_id' => '1',
        'images' => 'dummy.png',
        'status' => 'active',
        'is_approved' => '1',
        'created_at' => now(),
    ];
   
});
