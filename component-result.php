<article class="result">
    <a href="<?php the_permalink(); ?>" class="result__title">
        <h1 class="result__title"><?php the_title(); ?></h1>
    </a>
    <p><?php echo excerpt(25); ?></p>
    <a href="<?php the_permalink(); ?>" class="result__link">Vai alla pagina&nbsp;→</a>
    <hr>
</article>