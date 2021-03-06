<h2>
    Rooms
    <?php
    if (\App\Models\User::isLoggedIn()): ?>
        <a href="<?php
        echo BASE_URL; ?>/rooms/create" class="btn btn-primary btn-sm">New</a>
    <?php
    endif; ?>
</h2>

<table class="table table-striped">
    <thead>
    <th>#</th>
    <th>RNr.</th>
    <th>Thumbnail</th>
    <th>Name</th>
    <th>Location</th>
    <th>Actions</th>
    </thead>
    <?php
    /**
     * Alle Räume durchgehen und eine List ausgeben.
     */
    foreach ($rooms as $room): ?>

        <tr>
            <td><?php
                echo $room->id; ?></td>
            <td><?php
                echo $room->room_nr; ?></td>
            <td>
                <?php
                if ($room->hasImages()): ?>
                    <img src="<?php
                    echo BASE_URL . $room->getImages()[0]; ?>" class="thumbnail--table">
                <?php
                endif; ?>
            </td>
            <td><?php
                echo $room->name; ?></td>
            <td><?php
                echo $room->location; ?></td>
            <td>
                <?php
                if (\Core\Middlewares\AuthMiddleware::isAdmin()): ?>
                    <a href="<?php
                    echo BASE_URL . "/rooms/$room->id"; ?>" class="btn btn-primary">Edit</a>

                    <a href="<?php
                    echo BASE_URL . "/rooms/$room->id/delete"; ?>" class="btn btn-danger">Delete</a>
                <?php
                endif; ?>

                <?php
                if (\Core\Middlewares\AuthMiddleware::isLoggedIn()): ?>
                    <a href="<?php
                    echo BASE_URL . "/rooms/$room->id/booking/time"; ?>" class="btn btn-success">Book</a>
                <?php
                endif; ?>
            </td>
        </tr>

    <?php
    endforeach; ?>
</table>
