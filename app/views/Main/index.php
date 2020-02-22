<section>

    <?php if (!empty($_SESSION['error'])): ?>
        <div class="row">
            <div class="col s4 offset-s4 alert text-center pink center-align">
                <i id="closed-btn" class="fas fa-times closed-btn"></i>
                <h6 class="">Error!</h6>
                <?= $_SESSION['error'] ?>
            </div>
        </div>
        <?php if (!empty($_SESSION['error'])) unset($_SESSION['error']) ?>
    <?php endif; ?>

    <?php if (!empty($_SESSION['success'])): ?>
        <div class="row">
            <div class="col s4 offset-s4 alert text-center teal darken-2 center-align">
                <i id="closed-btn" class="fas fa-times closed-btn"></i>
                <h6 class="">Success!</h6>
                <?= $_SESSION['success'] ?>
            </div>
        </div>
        <?php if (!empty($_SESSION['success'])) unset($_SESSION['success']) ?>
    <?php endif; ?>

    <div class="row">
        <form class="col s8 offset-s2" method="post" action="/create">
            <div class="row">
                <div class="input-field col s12">
                    <input id="title" type="text" class="validate" name="title" autocomplete="off"
                           value="<?php if (!empty($_SESSION['remember']['title'])) echo h($_SESSION['remember']['title']) ?>"
                    >
                    <label for="title">Name Todo</label>
                </div>
                <div class="input-field col s12">
                    <textarea id="textarea1" class="materialize-textarea"
                              name="content"><?php if (!empty($_SESSION['remember']['content'])) echo h($_SESSION['remember']['content']) ?></textarea>
                    <label for="textarea1">Content Todo</label>
                </div>
                <div class="input-field col s12">
                    <button class="btn waves-effect waves-light add-button pink darken-4" type="submit">
                        Add
                        <i class="material-icons right">control_point</i>
                    </button>
                </div>
            </div>
        </form>
    </div>
    <?php if (!empty($_SESSION['remember'])) unset($_SESSION['remember']) ?>
</section>

<hr>

<section>

    <?php
    $arrow_action = 'color: #880e4f; font-size: 20px';
    ?>

    <table class="striped centered table-todo-list">
        <thead>
        <tr>
            <th class="table-item-hide">
                Id
                <i class="fas fa-sort-down arrow-sort" data-action="id-down"
                   style="<?= $_SESSION['arrow_action'] === 'id-down' ? $arrow_action : 'color: #90a4ae' ?>">
                </i>
                <i class="fas fa-sort-up arrow-sort" data-action="id-up"
                   style="<?= $_SESSION['arrow_action'] === 'id-up' ? $arrow_action : 'color: #90a4ae' ?>">
                </i>
            </th>
            <th>
                Title
                <i class="fas fa-sort-down arrow-sort" data-action="title-down"
                   style="<?= $_SESSION['arrow_action'] === 'title-down' ? $arrow_action: 'color: #90a4ae' ?>">
                </i>
                <i class="fas fa-sort-up arrow-sort" data-action="title-up"
                   style="<?= $_SESSION['arrow_action'] === 'title-up' ? $arrow_action: 'color: #90a4ae' ?>">
                </i>
            </th>
            <th>
                Role
                <i class="fas fa-sort-down arrow-sort" data-action="role-down"
                   style="<?= $_SESSION['arrow_action'] === 'role-down' ? $arrow_action: 'color: #90a4ae' ?>">
                </i>
                <i class="fas fa-sort-up arrow-sort" data-action="role-up"
                   style="<?= $_SESSION['arrow_action'] === 'role-up' ? $arrow_action: 'color: #90a4ae' ?>">
                </i>
            </th>
            <th class="table-item-hide">
                Email
                <i class="fas fa-sort-down arrow-sort" data-action="email-down"
                   style="<?= $_SESSION['arrow_action'] === 'email-down' ? $arrow_action: 'color: #90a4ae' ?>">
                </i>
                <i class="fas fa-sort-up arrow-sort" data-action="email-up"
                   style="<?= $_SESSION['arrow_action'] === 'email-up' ? $arrow_action: 'color: #90a4ae' ?>">
                </i>
            </th>
            <th>Content</th>
            <th>Action</th>
        </tr>
        </thead>

        <tbody>

        <?php if (!empty($items)): ?>
            <?php foreach ($items as $item): ?>

                <?php
                $status = false;
                if ($item['status'] !== 'process') $status = true;
                ?>

                <tr
                        class="<?= $status ? 'teal darken-2' : '' ?>"
                        style="<?= $status ? 'color: white' : '' ?>"
                >
                    <td class="table-item-hide"><?= h($item['id']) ?></td>
                    <td><?= h($item['title']) ?></td>
                    <td><?= h($item['user_role']) ?></td>
                    <td class="table-item-hide"><?= h($item['email']) ?></td>
                    <td>
                        <a class="btn tooltipped pink darken-4" data-position="bottom"
                           data-tooltip="<?= h($item['content']) ?>"
                        >
                            View
                        </a>
                    </td>
                    <td>
                        <label>
                            <input
                                    type="checkbox" <?= $status ? 'checked' : '' ?>
                                    class="status_checkbox"
                                    data-id="<?= $item['id'] ?>"
                            />
                            <span>Done</span>
                        </label>

                        <?php if ($item['update_admin'] !== 'process'): ?>
                            <label class="dis_box_item">
                                <input type="checkbox" checked="checked" disabled="disabled"/>
                                <span>Update</span>
                            </label>
                        <?php endif; ?>

                    </td>
                    <?php if ($isAdmin): ?>
                        <td>
                            <a href="/edit?id=<?= $item['id'] ?>"
                               class="btn-floating btn-large waves-effect waves-light pink darken-4"><i
                                        class="material-icons">edit</i></a>
                        </td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>

        <?php endif; ?>

        </tbody>
    </table>

    <div class="row" style="margin-top: 2rem">
        <div class="center-align">
            <?= $pagination ?>
        </div>
    </div>


</section>