<section>

    <div class="row">
        <div class="input-field col s3 offset-s2">
            <input disabled value="<?= $user->name ?>" id="disabled" type="text" class="validate">
            <label for="disabled">User Name</label>
        </div>

        <?php if ($user->email !== 'guest'): ?>
            <div class="input-field col s3 offset-s2">
                <input disabled value="<?=$user->email?>" id="disabled" type="text" class="validate">
                <label for="disabled">Email</label>
            </div>
        <?php endif; ?>

    </div>

    <div class="row">
        <form class="col s8 offset-s2" method="post", action="/edit/update">
            <div class="row">
                <div class="input-field col s12">
                    <input id="title" type="text" class="validate" value="<?= $item->title ?>" name="title">
                    <label for="title">Name Todo</label>
                </div>
                <div class="input-field col s12">
                    <textarea id="textarea1" class="materialize-textarea" name="content"><?= $item->content ?></textarea>
                    <label for="textarea1">Content Todo</label>
                </div>
                <div class="input-field col s12">
                    <input type="hidden" name="user_id" value="<?= $user->id ?>">
                    <input type="hidden" name="id" value="<?= $item->id ?>">
                    <input type="hidden" name="status" value="<?= $item->status ?>">
                    <button class="btn waves-effect waves-light add-button pink darken-4" type="submit">
                        Update
                        <i class="material-icons right">edit</i>
                    </button>
                </div>
            </div>
        </form>
    </div>

    <div class="row">
        <div class="col s3 offset-s2">
            <a href="/" class="btn-floating btn-large waves-effect waves-light pink darken-4"><i class="material-icons">arrow_back</i></a>
        </div>
    </div>


</section>
