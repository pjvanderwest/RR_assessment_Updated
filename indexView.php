<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping List</title>
    <link rel="stylesheet" href="./Assets/main.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>
<body class="body_wrapper">
<main>
    <h1>Shopping List</h1>
    <form method="post" action="">
    <form method="post" action="">
        <label for="newItem">Add Item:</label>
        <input type="text" id="newItem" name="newItem" required>
        <button type="submit" name="addItem">Add</button>
    </form>
    </form>
    <ul>
    <?php foreach ($shoppingList as $item): ?>        
        <li class="<?php echo $item['done'] ? 'done' : ''; ?> shopping_item">           
            <form method="post" action="" id="toggleForm">                          
                <input type="checkbox" name="toggleDone" value="<?php echo $item['id']; ?>" <?php echo $item['done'] ? 'checked' : ''; ?>>                
                <?php if (!isset($_POST['editItem']) || $_POST['editItem'] != $item['id']): ?>
                    <span><?php echo htmlspecialchars($item['item']); ?></span>
                    <button type="submit" name="editItem" value="<?php echo $item['id']; ?>">Edit</button>
                <?php else: ?>
                    <input type="text" name="editedItem" value="<?php echo htmlspecialchars($item['item']); ?>" required>
                    <button type="submit" name="saveItem" value="<?php echo $item['id']; ?>">Save</button>
                <?php endif; ?>
                <button type="submit" name="deleteItem" value="<?php echo $item['id']; ?>">Delete</button>
            </form>     
        </li>
        <?php endforeach; ?>      
    </ul>
</main>
<script>    
    document.addEventListener('DOMContentLoaded', function() {
        var checkboxes = document.querySelectorAll('input[name="toggleDone"]');
        
        checkboxes.forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                toggleDone(this.value);
                
            });
        });
    });

    function toggleDone(id) {
        var form = document.getElementById('toggleForm');
        var input = document.createElement('input');

        input.type = 'hidden';
        input.name = 'toggleDone';
        input.value = id;

        form.appendChild(input);
        form.submit();
    }
</script>
</body>
</html>