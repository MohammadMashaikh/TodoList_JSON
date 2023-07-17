<?php
$todos = [];
if (file_exists('index.json')) {
    $json = file_get_contents('index.json');
    $todos = json_decode($json, true);
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Todo List App</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

</head>
<style>
    .todo-item {
        background-color: #07ffc8;
        width: 25%;
        padding: 10px;
        /* You can adjust the padding value as needed */
        margin-bottom: 5px;
        /* You can adjust the margin value as needed */
        box-sizing: border-box;
        align-items: center;
        display: flex;
        justify-content: space-between;
    }
</style>

<body class="container my-5">
    <h1 class="text-center mb-3">Todo JSON App</h1>

    <form method="POST" action="sendData.php">
        <div class="d-flex justify-content-center">
            <div class="input-group mb-3 w-25">
                <input type="text" id="todoItem" name="todoItem" class="form-control" placeholder="Enter your Todo...">
                <button class="btn btn-primary" type="submit" id="add">
                    <i class="fa-solid fa-plus"></i>
                </button>
            </div>
        </div>
    </form>

    <div id="items-container" class="d-flex flex-column justify-content-center align-items-center">
        <?php foreach ($todos as $todoName => $todo) : ?>
            <div class="todo-item">
                <form method="POST" action="change_status.php">
                    <input type="hidden" name="todo_name" value="<?= $todoName ?>">
                    <input type="checkbox" <?= $todo['completed'] ? 'checked' : '' ?>>
                    <span class="text-center"><?= $todoName ?></span>
                </form>
                <form method="POST" action="delete.php">
                    <input type="hidden" name="delete-item" value="<?= $todoName ?>">
                    <button type="submit" class="btn btn-link delete-todo float-right p-0"><i class="fa-solid fa-trash text-black"></i></button>
                </form>
            </div>
        <?php endforeach; ?>
    </div>


    <script>
        const checkboxes = document.querySelectorAll('input[type=checkbox]');
        checkboxes.forEach(ch => {
            ch.onclick = function() {
                this.parentNode.submit();
            };
        })
    </script>
</body>

</html>