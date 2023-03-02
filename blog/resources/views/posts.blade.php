<!DOCTYPE html>
<title>My blog</title>
<link rel="stylesheet" href="/app.css">
{{--<script src="/app.js"></script>--}}

<body>
    <?php foreach ($posts as $post) : ?> // posts is an array of all post files as objects, we loop over and build the homepage
        <article>
            <h1>
                <a href="/posts/<?= $post->slug; ?>" > // accessing a value from the Post Class object
                    <?= $post->title; ?>
                </a>
            </h1>

            <div>
                    <?= $post->excerpt; ?>
            </div>
        </article>
    <?php endforeach; ?>
</body>
