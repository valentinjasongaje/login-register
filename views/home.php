<?php include 'header.php'; ?>
<div class="max-w-2xl text-center mx-auto">
    <div class="flex flex-row space-x-10">
        <?php $posts = Post::getPost(); ?>
        <?php foreach ($posts as $post): ?>
        <div class="bg-amber-300 p-4 my-10 space-y-5 text-2xl basis-1/4">
            <div class="font-mono p-3">
                <?php echo $post[2] ?>
            </div>
            <div class="font-sans">
                <?php echo $post[3] ?>
            </div>
        </div>
        <?php endforeach ?>
    </div>
</div>


<?php include 'footer.php' ?>